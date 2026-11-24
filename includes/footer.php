<footer class="site-footer">
  <div class="footer-wave" aria-hidden="true"></div>
  <div class="container footer-grid">
    <div class="footer-brand">
      <img
        class="footer-logo brand-logo"
        src="<?php echo e(asset('images/godavari-logo-footer.png')); ?>"
        alt="Godavari Consultants and Services Pvt. Ltd."
        width="315"
        height="199"
        decoding="async"
      >
      <p><?php echo e($company['guidance']); ?></p>
      <p class="footer-motto"><?php echo e(SITE_TAGLINE); ?></p>
      <div class="footer-socials" aria-label="Social media">
        <a class="footer-social" href="<?php echo e(SITE_FACEBOOK); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H9v3h2v7h3v-7h2.5l.5-3H14V9c0-.6.4-1 1-1Z"/></svg>
        </a>
        <a class="footer-social" href="<?php echo e(SITE_INSTAGRAM); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a class="footer-social" href="<?php echo e(SITE_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 9.5H4V20h2.5V9.5ZM5.25 4A1.75 1.75 0 1 0 5.26 7.5 1.75 1.75 0 0 0 5.25 4ZM20 20h-2.5v-5.4c0-1.5-.5-2.5-1.8-2.5-1 0-1.5.7-1.75 1.35-.1.25-.1.6-.1.95V20H11.4s.05-9.1 0-10.05H13.9v1.4c.35-.55 1.2-1.65 3.05-1.65 2.2 0 3.85 1.45 3.85 4.55V20Z"/></svg>
        </a>
      </div>
    </div>

    <div>
      <h3>Explore</h3>
      <ul class="footer-links">
        <li><a href="<?php echo e(url('about.php')); ?>">About Us</a></li>
        <li><a href="<?php echo e(url('services.php')); ?>">Our Services</a></li>
        <li><a href="<?php echo e(url('projects.php')); ?>">Projects</a></li>
        <li><a href="<?php echo e(url('testimonials.php')); ?>">Testimonials</a></li>
        <li><a href="<?php echo e(url('news.php')); ?>">News</a></li>
      </ul>
    </div>

    <div>
      <h3>Services</h3>
      <ul class="footer-links">
        <?php foreach (array_slice($services, 0, 5) as $svc): ?>
          <li><a href="<?php echo e(url('service-detail.php?slug=' . urlencode($svc['slug']))); ?>"><?php echo e($svc['title']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div>
      <h3>Contact</h3>
      <ul class="footer-contact">
        <li><?php echo e(SITE_ADDRESS); ?></li>
        <li><a href="tel:<?php echo e(preg_replace('/\s+/', '', SITE_PHONE_1)); ?>"><?php echo e(SITE_PHONE_1); ?></a></li>
        <li><a href="tel:<?php echo e(preg_replace('/\s+/', '', SITE_PHONE_2)); ?>"><?php echo e(SITE_PHONE_2); ?></a></li>
        <li><a href="mailto:<?php echo e(SITE_EMAIL_PRIMARY); ?>"><?php echo e(SITE_EMAIL_PRIMARY); ?></a></li>
        <li><a href="mailto:<?php echo e(SITE_EMAIL_SECONDARY); ?>"><?php echo e(SITE_EMAIL_SECONDARY); ?></a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom__inner">
      <p>&copy; <?php echo date('Y'); ?> <?php echo e(SITE_NAME); ?> All rights reserved.</p>
      <p>Nashik, Maharashtra</p>
    </div>
  </div>
</footer>

<button type="button" class="back-to-top" id="back-to-top" aria-label="Back to top">
  <span aria-hidden="true">↑</span>
</button>

<script src="<?php echo e(asset('js/script.js')); ?>"></script>
<?php foreach (($extra_js ?? []) as $js_file): ?>
  <script src="<?php echo e(asset($js_file)); ?>"></script>
<?php endforeach; ?>
</body>
</html>
