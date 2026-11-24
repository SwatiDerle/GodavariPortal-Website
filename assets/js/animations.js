(() => {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const root = document.querySelector('[data-contact-circuit]');
  if (!root || reduceMotion) return;

  const layer = root.querySelector('[data-circuit-particles]');
  const paths = Array.from(root.querySelectorAll('[data-circuit-path]'));
  if (!layer || !paths.length) return;

  const isNarrow = window.matchMedia('(max-width: 640px)').matches;
  const isTablet = window.matchMedia('(max-width: 980px)').matches;
  const count = isNarrow ? 3 : isTablet ? 5 : 7;

  // Cache geometry once — avoid getTotalLength() every frame
  const pathCache = paths.map((path) => ({
    path,
    length: path.getTotalLength(),
  }));

  const particles = [];
  for (let i = 0; i < count; i += 1) {
    const cached = pathCache[i % pathCache.length];
    const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    group.setAttribute('class', 'circuit-particle-wrap');

    // Soft glow disc (no CSS filter)
    const glow = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
    glow.setAttribute('r', i % 5 === 0 ? '7' : '5.5');
    glow.setAttribute('class', i % 5 === 0 ? 'circuit-particle-glow circuit-particle-glow--olive' : 'circuit-particle-glow');
    group.appendChild(glow);

    const core = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
    core.setAttribute('r', i % 5 === 0 ? '2.8' : i % 3 === 0 ? '2.4' : '1.9');
    core.setAttribute('class', i % 5 === 0 ? 'circuit-particle circuit-particle--olive' : 'circuit-particle');
    group.appendChild(core);

    layer.appendChild(group);

    // Steady linear speeds for continuous fluid feel (units: progress per ms)
    const dir = i % 2 === 0 ? 1 : -1;
    const speed = dir * (0.00009 + (i % 4) * 0.000028);

    particles.push({
      el: group,
      length: cached.length,
      path: cached.path,
      progress: (i / count) % 1,
      speed,
      lastX: 0,
      lastY: 0,
    });
  }

  // Static ambient sparks only (no per-frame updates)
  const sparksLayer = root.querySelector('[data-circuit-sparks]');
  if (sparksLayer && !isNarrow) {
    const sparkCount = isTablet ? 8 : 12;
    for (let i = 0; i < sparkCount; i += 1) {
      const spark = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
      spark.setAttribute('class', 'circuit-spark');
      spark.setAttribute('r', String(0.7 + (i % 3) * 0.35));
      spark.setAttribute('cx', String(100 + ((i * 137) % 1240)));
      spark.setAttribute('cy', String(80 + ((i * 97) % 740)));
      sparksLayer.appendChild(spark);
    }
  }

  let raf = 0;
  let last = 0;
  let running = false;

  const place = (p, progress) => {
    const point = p.path.getPointAtLength(progress * p.length);
    // Skip tiny sub-pixel updates to reduce SVG churn
    if (Math.abs(point.x - p.lastX) < 0.35 && Math.abs(point.y - p.lastY) < 0.35) {
      return;
    }
    p.lastX = point.x;
    p.lastY = point.y;
    p.el.setAttribute('transform', `translate(${point.x.toFixed(1)} ${point.y.toFixed(1)})`);
  };

  // Seed initial positions
  particles.forEach((p) => place(p, p.progress));

  const tick = (now) => {
    if (!running) return;
    const dt = Math.min(32, now - last);
    last = now;

    for (let i = 0; i < particles.length; i += 1) {
      const p = particles[i];
      p.progress += p.speed * dt;
      if (p.progress >= 1) p.progress -= 1;
      else if (p.progress < 0) p.progress += 1;
      place(p, p.progress);
    }

    raf = requestAnimationFrame(tick);
  };

  const start = () => {
    if (running) return;
    running = true;
    root.classList.remove('is-paused');
    last = performance.now();
    raf = requestAnimationFrame(tick);
  };

  const stop = () => {
    if (!running) return;
    running = false;
    root.classList.add('is-paused');
    if (raf) {
      cancelAnimationFrame(raf);
      raf = 0;
    }
  };

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) start();
        else stop();
      });
    }, { threshold: 0.08 });
    io.observe(root);
  } else {
    start();
  }

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stop();
    else if (root.getBoundingClientRect().height > 0) start();
  });
})();
