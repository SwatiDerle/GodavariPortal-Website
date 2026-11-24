(() => {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const header = document.getElementById('site-header');
  const toggle = document.getElementById('nav-toggle');
  const nav = document.getElementById('primary-nav');
  const backTop = document.getElementById('back-to-top');

  // Page ready / soft load reveal
  const markReady = () => document.body.classList.add('is-ready');
  if (document.readyState === 'complete') {
    requestAnimationFrame(markReady);
  } else {
    window.addEventListener('load', () => requestAnimationFrame(markReady));
    setTimeout(markReady, 400);
  }

  const onScroll = () => {
    const y = window.scrollY || 0;
    if (header) header.classList.toggle('is-scrolled', y > 12);
    if (backTop) backTop.classList.toggle('is-visible', y > 480);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  backTop?.addEventListener('click', (event) => {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });

  // Mobile navigation
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      document.body.classList.toggle('nav-open', open);
      toggle.classList.toggle('is-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    });

    nav.querySelectorAll('.has-dropdown > a').forEach((link) => {
      link.addEventListener('click', (event) => {
        if (window.matchMedia('(max-width: 820px)').matches) {
          const parent = link.parentElement;
          if (parent && !parent.classList.contains('is-open')) {
            event.preventDefault();
            nav.querySelectorAll('.has-dropdown.is-open').forEach((el) => {
              if (el !== parent) el.classList.remove('is-open');
            });
            parent.classList.add('is-open');
          }
        }
      });
    });

    document.addEventListener('click', (event) => {
      if (!nav.contains(event.target) && !toggle.contains(event.target)) {
        nav.classList.remove('is-open');
        toggle.classList.remove('is-open');
        document.body.classList.remove('nav-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // Scroll reveals with stagger support (play once)
  const revealSelector = [
    '.reveal',
    '.anim-fade',
    '.anim-up',
    '.anim-left',
    '.anim-right',
    '.anim-scale',
    '.anim-image',
    '.media-reveal',
    '.section-head',
    '.journey-timeline',
    '.footer-grid',
    '.reveal-stagger > *',
  ].join(', ');
  const revealItems = document.querySelectorAll(revealSelector);
  if (reduceMotion) {
    revealItems.forEach((el) => el.classList.add('is-visible'));
  } else if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const parent = el.parentElement;
        if (parent?.classList.contains('reveal-stagger')) {
          const siblings = Array.from(parent.children);
          const index = siblings.indexOf(el);
          el.style.transitionDelay = `${Math.min(index * 0.08, 0.48)}s`;
        }
        el.classList.add('is-visible');
        io.unobserve(el);
      });
    }, { threshold: 0.14, rootMargin: '0px 0px -8% 0px' });

    revealItems.forEach((el) => io.observe(el));
  } else {
    revealItems.forEach((el) => el.classList.add('is-visible'));
  }

  // Subtle hero / section parallax
  if (!reduceMotion && window.matchMedia('(min-width: 821px)').matches) {
    const parallaxNodes = Array.from(document.querySelectorAll('[data-parallax]'));
    if (parallaxNodes.length) {
      let ticking = false;
      const updateParallax = () => {
        const vh = window.innerHeight || 1;
        parallaxNodes.forEach((node) => {
          const speed = Number(node.getAttribute('data-parallax') || 0.12);
          const rect = node.getBoundingClientRect();
          const progress = (rect.top + rect.height * 0.5 - vh * 0.5) / vh;
          node.style.transform = `translate3d(0, ${(-progress * speed * 80).toFixed(2)}px, 0)`;
        });
        ticking = false;
      };
      window.addEventListener('scroll', () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(updateParallax);
      }, { passive: true });
      updateParallax();
    }
  }

  // Animated counters (verified stats only)
  const counters = document.querySelectorAll('[data-count]');
  const animateCount = (el) => {
    const target = Number(el.getAttribute('data-count') || 0);
    const suffix = el.getAttribute('data-suffix') || '';
    const prefix = el.getAttribute('data-prefix') || '';
    if (reduceMotion) {
      el.textContent = `${prefix}${target}${suffix}`;
      return;
    }
    const duration = 1400;
    const start = performance.now();
    const tick = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = Math.round(target * eased);
      el.textContent = `${prefix}${value}${suffix}`;
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if (counters.length) {
    if ('IntersectionObserver' in window) {
      const counterIo = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          animateCount(entry.target);
          counterIo.unobserve(entry.target);
        });
      }, { threshold: 0.25, rootMargin: '0px 0px -10% 0px' });
      counters.forEach((el) => counterIo.observe(el));
    } else {
      counters.forEach(animateCount);
    }
  }

  // Testimonial slider with pause on interaction
  const track = document.querySelector('.testimonial-track');
  if (track) {
    const slides = Array.from(track.children);
    const dotsWrap = document.querySelector('[data-slider-dots]');
    let index = 0;
    let timer = null;
    let paused = false;

    const renderDots = () => {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = '';
      slides.forEach((_, i) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'slider-dot' + (i === index ? ' is-active' : '');
        btn.setAttribute('aria-label', `Go to testimonial ${i + 1}`);
        btn.addEventListener('click', () => {
          paused = true;
          goTo(i);
          restart();
        });
        dotsWrap.appendChild(btn);
      });
    };

    const goTo = (next) => {
      index = (next + slides.length) % slides.length;
      track.style.transform = `translateX(-${index * 100}%)`;
      if (dotsWrap) {
        dotsWrap.querySelectorAll('.slider-dot').forEach((dot, i) => {
          dot.classList.toggle('is-active', i === index);
        });
      }
    };

    const go = (dir) => goTo(index + dir);

    const restart = () => {
      clearInterval(timer);
      if (reduceMotion || slides.length < 2) return;
      timer = setInterval(() => {
        if (!paused) go(1);
      }, 7000);
    };

    document.querySelector('[data-slider-prev]')?.addEventListener('click', () => {
      paused = true;
      go(-1);
      restart();
    });
    document.querySelector('[data-slider-next]')?.addEventListener('click', () => {
      paused = true;
      go(1);
      restart();
    });

    const slider = document.querySelector('.testimonial-slider');
    slider?.addEventListener('mouseenter', () => { paused = true; });
    slider?.addEventListener('mouseleave', () => { paused = false; });
    slider?.addEventListener('focusin', () => { paused = true; });
    slider?.addEventListener('focusout', () => { paused = false; });

    renderDots();
    restart();
  }

  // Project filters with fade
  const filterButtons = document.querySelectorAll('[data-filter]');
  const projectCards = document.querySelectorAll('[data-category]');
  filterButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      filterButtons.forEach((b) => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      const value = btn.getAttribute('data-filter');
      projectCards.forEach((card) => {
        const match = value === 'all' || card.getAttribute('data-category') === value;
        card.classList.toggle('is-filtered-out', !match);
        card.style.display = match ? '' : 'none';
      });
    });
  });

  // News marquee — pause while pointer/focus is inside
  const newsMarquee = document.querySelector('[data-news-marquee]');
  if (newsMarquee && !reduceMotion) {
    const pause = () => newsMarquee.classList.add('is-paused');
    const resume = () => newsMarquee.classList.remove('is-paused');
    newsMarquee.addEventListener('mouseenter', pause);
    newsMarquee.addEventListener('mouseleave', resume);
    newsMarquee.addEventListener('focusin', pause);
    newsMarquee.addEventListener('focusout', (event) => {
      if (!newsMarquee.contains(event.relatedTarget)) resume();
    });
  }

  // Subtle 3D tilt on premium cards (desktop only)
  if (!reduceMotion && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    document.querySelectorAll('.tilt-card').forEach((card) => {
      const reset = () => {
        card.style.transform = '';
      };
      card.addEventListener('mousemove', (event) => {
        const rect = card.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width;
        const y = (event.clientY - rect.top) / rect.height;
        const tiltX = (0.5 - y) * 6;
        const tiltY = (x - 0.5) * 8;
        card.style.transform = `translateY(-8px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale(1.01)`;
      });
      card.addEventListener('mouseleave', reset);
    });
  }
})();
