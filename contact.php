<?php
$page_title = 'Contact Us | Godavari Consultants & Services';
$page_description = 'Contact Godavari Consultants & Services Pvt. Ltd., Nashik — address, phone, email, and enquiry form.';
$body_class = 'page-contact';
$extra_css = ['css/contact.css'];
$extra_js = ['js/animations.js', 'js/contact.js'];
require_once __DIR__ . '/includes/header.php';
$flash = get_flash();
$map_link = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('Bhabha Nagar, Mumbai Naka, Nashik 422011');
$tel = static function (string $phone): string {
    return preg_replace('/\s+/', '', $phone) ?? $phone;
};
?>

<main id="main" class="contact-page">
  <section class="contact-hero" aria-labelledby="contact-heading">
    <div class="contact-circuit" aria-hidden="true" data-contact-circuit>
      <div class="contact-circuit__glow contact-circuit__glow--a"></div>
      <div class="contact-circuit__glow contact-circuit__glow--b"></div>
      <div class="contact-circuit__glow contact-circuit__glow--c"></div>
      <div class="contact-circuit__grid"></div>

      <svg class="contact-circuit__svg" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" focusable="false">
        <defs>
          <linearGradient id="circuitFlowGrad" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#214D98" stop-opacity="0.2"/>
            <stop offset="45%" stop-color="#00A4DF" stop-opacity="1"/>
            <stop offset="100%" stop-color="#7ecff0" stop-opacity="0.75"/>
          </linearGradient>
          <linearGradient id="circuitFlowGradAlt" x1="100%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="#00A4DF" stop-opacity="0.25"/>
            <stop offset="55%" stop-color="#00A4DF" stop-opacity="0.95"/>
            <stop offset="100%" stop-color="#718F3D" stop-opacity="0.4"/>
          </linearGradient>
        </defs>

        <!-- Soft depth traces (no blur filter) -->
        <g class="contact-circuit__depth circuit-base">
          <path d="M-40 140 H240 L310 210 H520 L590 140 H820 L890 210 H1120 L1190 140 H1480"/>
          <path d="M-40 380 H180 L250 450 H470 L540 380 H780 L850 450 H1080 L1150 380 H1480"/>
          <path d="M-40 640 H280 L350 710 H620 L690 640 H960 L1030 710 H1300 L1370 640 H1480"/>
          <path d="M200 -40 V190 L270 260 V430 L200 500 V720 L270 790 V940"/>
          <path d="M560 -40 V150 L630 220 V400 L560 470 V680 L630 750 V940"/>
          <path d="M920 -40 V180 L990 250 V430 L920 500 V700 L990 770 V940"/>
          <path d="M1240 -40 V210 L1310 280 V470 L1240 540 V730 L1310 800 V940"/>
        </g>

        <!-- Static structural traces -->
        <g class="circuit-base">
          <path d="M-20 170 H230 L300 240 H500 L570 170 H800 L870 240 H1090 L1160 170 H1460"/>
          <path d="M-20 170 H230 L300 240 H500" transform="translate(0 10)"/>
          <path d="M-20 170 H230 L300 240 H500" transform="translate(0 20)"/>
          <path d="M-20 410 H170 L240 480 H470 L540 410 H770 L840 480 H1070 L1140 410 H1460"/>
          <path d="M-20 410 H170 L240 480 H470" transform="translate(0 10)"/>
          <path d="M-20 670 H310 L380 740 H640 L710 670 H970 L1040 740 H1310 L1380 670 H1460"/>
          <path d="M190 -20 V210 L260 280 V440 L190 510 V730 L260 800 V920"/>
          <path d="M190 -20 V210 L260 280 V440" transform="translate(10 0)"/>
          <path d="M190 -20 V210 L260 280 V440" transform="translate(20 0)"/>
          <path d="M540 -20 V150 L610 220 V390 L540 460 V650 L610 720 V920"/>
          <path d="M900 -20 V190 L970 260 V420 L900 490 V670 L970 740 V920"/>
          <path d="M1220 -20 V230 L1290 300 V480 L1220 550 V740 L1290 810 V920"/>
        </g>

        <!-- Continuous flowing light (CSS stroke-dash only — no SVG filters) -->
        <g class="circuit-flow-layer">
          <path class="circuit-flow circuit-flow--fast" d="M-40 180 H250 L320 250 H520 L590 180 H830 L900 250 H1130 L1200 180 H1500"/>
          <path class="circuit-flow" d="M-40 190 H250 L320 260 H520 L590 190 H830 L900 260 H1130 L1200 190 H1500"/>
          <path class="circuit-flow circuit-flow--slow" d="M-40 200 H250 L320 270 H520 L590 200 H830 L900 270 H1130 L1200 200 H1500"/>
          <path class="circuit-flow-reverse" d="M-40 430 H190 L260 500 H490 L560 430 H800 L870 500 H1100 L1170 430 H1500"/>
          <path class="circuit-flow circuit-flow--fast" d="M-40 440 H190 L260 510 H490 L560 440 H800 L870 510 H1100 L1170 440 H1500"/>
          <path class="circuit-flow-reverse circuit-flow--slow" d="M-40 690 H340 L410 760 H670 L740 690 H1000 L1070 760 H1340 L1410 690 H1500"/>
          <path class="circuit-flow" d="M210 -40 V220 L280 290 V450 L210 520 V740 L280 810 V940"/>
          <path class="circuit-flow-reverse circuit-flow--fast" d="M560 -40 V160 L630 230 V400 L560 470 V660 L630 730 V940"/>
          <path class="circuit-flow circuit-flow--slow" d="M920 -40 V200 L990 270 V430 L920 500 V680 L990 750 V940"/>
          <path class="circuit-flow-reverse" d="M1240 -40 V240 L1310 310 V490 L1240 560 V750 L1310 820 V940"/>
        </g>

        <!-- Motion guide paths for JS particles -->
        <g opacity="0" pointer-events="none">
          <path data-circuit-path d="M-40 185 H250 L320 255 H520 L590 185 H830 L900 255 H1130 L1200 185 H1500"/>
          <path data-circuit-path d="M-40 435 H190 L260 505 H490 L560 435 H800 L870 505 H1100 L1170 435 H1500"/>
          <path data-circuit-path d="M-40 695 H340 L410 765 H670 L740 695 H1000 L1070 765 H1340 L1410 695 H1500"/>
          <path data-circuit-path d="M215 -40 V220 L285 290 V450 L215 520 V740 L285 810 V940"/>
          <path data-circuit-path d="M560 -40 V160 L630 230 V400 L560 470 V660 L630 730 V940"/>
          <path data-circuit-path d="M920 -40 V200 L990 270 V430 L920 500 V680 L990 750 V940"/>
          <path data-circuit-path d="M1240 -40 V240 L1310 310 V490 L1240 560 V750 L1310 820 V940"/>
        </g>

        <!-- Central hub -->
        <g transform="translate(720 430)">
          <polygon class="circuit-hub" points="0,-42 36,-21 36,21 0,42 -36,21 -36,-21"/>
          <polygon class="circuit-hub" points="0,-24 21,-12 21,12 0,24 -21,12 -21,-12"/>
          <circle class="circuit-node circuit-node--core" cx="0" cy="0" r="4.5"/>
        </g>

        <!-- Nodes (opacity pulse only) -->
        <g class="circuit-nodes">
          <circle class="circuit-node" cx="320" cy="250" r="3.4"/>
          <circle class="circuit-node" cx="590" cy="180" r="3"/>
          <circle class="circuit-node" cx="900" cy="250" r="3.5"/>
          <circle class="circuit-node" cx="260" cy="500" r="3"/>
          <circle class="circuit-node circuit-node--olive" cx="560" cy="430" r="3.8"/>
          <circle class="circuit-node" cx="870" cy="500" r="3.4"/>
          <circle class="circuit-node" cx="410" cy="760" r="3"/>
          <circle class="circuit-node" cx="740" cy="690" r="3.5"/>
          <circle class="circuit-node circuit-node--olive" cx="1070" cy="760" r="3.2"/>
          <circle class="circuit-node" cx="630" cy="230" r="3.4"/>
          <circle class="circuit-node" cx="1310" cy="310" r="3.5"/>
          <circle class="circuit-node circuit-node--olive" cx="1240" cy="560" r="3.2"/>
        </g>

        <g data-circuit-sparks></g>
        <g data-circuit-particles></g>
      </svg>
    </div>

    <div class="container contact-hero__inner">
      <div class="contact-headings-row reveal">
        <div class="contact-heading contact-heading--page">
          <span class="eyebrow">Get in touch</span>
          <h1 id="contact-heading">Contact Us</h1>
        </div>
        <div class="contact-heading contact-heading--form">
          <span class="eyebrow">Enquiry</span>
          <h2>Send an enquiry</h2>
        </div>
      </div>

      <div class="contact-layout contact-layout--premium">
        <div class="contact-info-panel">
          <p class="contact-intro-copy reveal">Reach the Nashik office for subsidies, clusters, registrations, finance support, and related consultancy. Share your requirement and our team will guide the next steps.</p>

          <div class="contact-info-grid">
            <a class="contact-info-card contact-info-card--address" href="<?php echo e($map_link); ?>" target="_blank" rel="noopener noreferrer">
              <span class="contact-info-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M12 21s-7-4.5-7-10a7 7 0 0 1 14 0c0 5.5-7 10-7 10Z"/><circle cx="12" cy="11" r="2.5"/></svg>
              </span>
              <span class="contact-info-card__label">Address</span>
              <span class="contact-info-card__value"><?php echo e(SITE_ADDRESS); ?></span>
            </a>

            <div class="contact-info-row">
              <div class="contact-info-card contact-info-card--inline">
                <span class="contact-info-card__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M22 16.92v2.1a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h2.1a2 2 0 0 1 2 1.72c.13.96.35 1.9.66 2.8a2 2 0 0 1-.45 2.11L7.09 9.91a16 16 0 0 0 6 6l1.28-1.28a2 2 0 0 1 2.11-.45c.9.31 1.84.53 2.8.66A2 2 0 0 1 22 16.92Z"/></svg>
                </span>
                <span class="contact-info-card__label">Phone</span>
                <span class="contact-info-card__value contact-info-card__value--stack">
                  <a href="tel:<?php echo e($tel(SITE_PHONE_1)); ?>"><?php echo e(SITE_PHONE_1); ?></a>
                  <a href="tel:<?php echo e($tel(SITE_PHONE_2)); ?>"><?php echo e(SITE_PHONE_2); ?></a>
                  <a href="tel:<?php echo e($tel(SITE_PHONE_3)); ?>"><?php echo e(SITE_PHONE_3); ?></a>
                </span>
              </div>

              <div class="contact-info-card contact-info-card--inline">
                <span class="contact-info-card__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg>
                </span>
                <span class="contact-info-card__label">Email</span>
                <span class="contact-info-card__value contact-info-card__value--stack">
                  <a href="mailto:<?php echo e(SITE_EMAIL_PRIMARY); ?>"><?php echo e(SITE_EMAIL_PRIMARY); ?></a>
                  <a href="mailto:<?php echo e(SITE_EMAIL_SECONDARY); ?>"><?php echo e(SITE_EMAIL_SECONDARY); ?></a>
                </span>
              </div>
            </div>

            <div class="contact-info-card contact-info-card--social">
              <span class="contact-info-card__label">Social</span>
              <div class="contact-social-icons" aria-label="Social media">
                <a class="contact-social contact-social--facebook" href="<?php echo e(SITE_FACEBOOK); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H9v3h2v7h3v-7h2.5l.5-3H14V9c0-.6.4-1 1-1Z"/></svg>
                </a>
                <a class="contact-social contact-social--instagram" href="<?php echo e(SITE_INSTAGRAM); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <defs>
                      <linearGradient id="igGradContact" x1="0%" y1="100%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#f58529"/>
                        <stop offset="45%" stop-color="#dd2a7b"/>
                        <stop offset="100%" stop-color="#515bd4"/>
                      </linearGradient>
                    </defs>
                    <rect x="3" y="3" width="18" height="18" rx="5" fill="url(#igGradContact)"/>
                    <circle cx="12" cy="12" r="4.2" fill="none" stroke="#fff" stroke-width="1.8"/>
                    <circle cx="17.2" cy="6.8" r="1.2" fill="#fff"/>
                  </svg>
                </a>
                <a class="contact-social contact-social--linkedin" href="<?php echo e(SITE_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.5 9.5H4V20h2.5V9.5ZM5.25 4A1.75 1.75 0 1 0 5.26 7.5 1.75 1.75 0 0 0 5.25 4ZM20 20h-2.5v-5.4c0-1.5-.5-2.5-1.8-2.5-1 0-1.5.7-1.75 1.35-.1.25-.1.6-.1.95V20H11.4s.05-9.1 0-10.05H13.9v1.4c.35-.55 1.2-1.65 3.05-1.65 2.2 0 3.85 1.45 3.85 4.55V20Z"/></svg>
                </a>
              </div>
            </div>
          </div>

          <div class="map-frame map-frame--premium reveal">
            <iframe
              title="Godavari Consultants office location map"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              src="<?php echo e(SITE_MAPS_EMBED); ?>">
            </iframe>
          </div>
        </div>

        <div class="contact-form-wrap">
          <div class="form-card form-card--glass" data-contact-form-card>
            <div class="form-card__header form-enter-item form-enter-item--header">
              <p>Tell us about your requirement. We respond from the Nashik office using the contact details you share.</p>
            </div>

            <?php if ($flash): ?>
              <div class="alert alert-<?php echo e($flash['type'] === 'success' ? 'success' : 'error'); ?> form-enter-item form-enter-item--alert" role="status">
                <?php echo e($flash['message']); ?>
              </div>
            <?php endif; ?>

            <form id="contact-form" class="contact-form" action="<?php echo e(url('process-contact.php')); ?>" method="post" novalidate>
              <div class="form-grid">
                <div class="field form-enter-item form-enter-item--field">
                  <label for="name">Full name *</label>
                  <input type="text" id="name" name="name" required autocomplete="name" placeholder="Your full name">
                </div>
                <div class="field form-enter-item form-enter-item--field">
                  <label for="email">Email *</label>
                  <input type="email" id="email" name="email" required autocomplete="email" placeholder="name@example.com">
                </div>
                <div class="field form-enter-item form-enter-item--field">
                  <label for="phone">Phone *</label>
                  <input type="tel" id="phone" name="phone" required autocomplete="tel" placeholder="+91">
                </div>
                <div class="field form-enter-item form-enter-item--field">
                  <label for="service">Service interest</label>
                  <select id="service" name="service">
                    <option value="">Select a service</option>
                    <?php foreach ($services as $svc): ?>
                      <option value="<?php echo e($svc['title']); ?>"><?php echo e($svc['title']); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="field full form-enter-item form-enter-item--field">
                  <label for="message">Message *</label>
                  <textarea id="message" name="message" required placeholder="Briefly describe your requirement"></textarea>
                </div>
                <div class="form-actions full form-enter-item form-enter-item--submit">
                  <button class="btn btn-primary btn-arrow contact-submit" type="submit" data-contact-submit>
                    <span class="contact-submit__label">Submit enquiry</span>
                    <span class="contact-submit__loading" aria-hidden="true">Sending…</span>
                    <span aria-hidden="true">→</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
