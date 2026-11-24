(() => {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const submitBtn = form.querySelector('[data-contact-submit]');

  form.addEventListener('submit', (event) => {
    let valid = true;
    form.querySelectorAll('[required]').forEach((field) => {
      const wrap = field.closest('.field') || field.parentElement;
      const existing = wrap.querySelector('.field-error');
      field.classList.remove('is-invalid');
      if (existing) existing.remove();

      const value = field.value.trim();
      let message = '';
      if (!value) {
        message = 'This field is required.';
      } else if (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
        message = 'Enter a valid email address.';
      } else if (field.type === 'tel' && value.replace(/\D/g, '').length < 10) {
        message = 'Enter a valid phone number.';
      } else if (field.name === 'message' && value.length < 10) {
        message = 'Please enter at least 10 characters.';
      }

      if (message) {
        valid = false;
        field.classList.add('is-invalid');
        const span = document.createElement('div');
        span.className = 'field-error';
        span.textContent = message;
        wrap.appendChild(span);
      }
    });

    if (!valid) {
      event.preventDefault();
      submitBtn?.classList.remove('is-loading');
      submitBtn?.removeAttribute('aria-busy');
      return;
    }

    submitBtn?.classList.add('is-loading');
    submitBtn?.setAttribute('aria-busy', 'true');
  });

  const cards = document.querySelectorAll('.contact-info-card');
  const formCard = document.querySelector('[data-contact-form-card]');
  const formHeading = document.querySelector('.contact-heading--form');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Contact info cards — staggered slide-in (once)
  if (!reduceMotion) {
    cards.forEach((card, index) => {
      card.style.animationDelay = `${0.12 + index * 0.08}s`;
      card.classList.add('is-animated');
    });
  }

  // Enquiry form — premium float entrance once on load
  const markFormReady = () => {
    formCard?.classList.remove('is-form-enter');
    formCard?.classList.add('is-form-ready');
    formHeading?.classList.remove('is-form-enter');
    formHeading?.classList.add('is-form-ready');
  };

  if (!formCard) return;

  if (reduceMotion) {
    markFormReady();
    return;
  }

  requestAnimationFrame(() => {
    formHeading?.classList.add('is-form-enter');
    formCard.classList.add('is-form-enter');
  });

  const onEnterEnd = (event) => {
    if (event.target !== formCard || event.animationName !== 'form-float-enter') return;
    formCard.removeEventListener('animationend', onEnterEnd);
    markFormReady();
  };
  formCard.addEventListener('animationend', onEnterEnd);

  // Safety fallback if animationend is missed
  window.setTimeout(markFormReady, 1600);
})();
