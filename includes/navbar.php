<header class="site-header" id="site-header">
  <div class="container nav-bar">
    <a class="brand" href="<?php echo e(url('index.php')); ?>" aria-label="<?php echo e(SITE_NAME); ?>">
      <img
        class="brand-logo"
        src="<?php echo e(asset('images/godavari-logo.png')); ?>"
        alt="Godavari Consultants and Services Pvt. Ltd."
        width="315"
        height="199"
        decoding="async"
      >
    </a>

    <button class="nav-toggle" id="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>

    <nav class="primary-nav" id="primary-nav" aria-label="Primary">
      <ul>
        <li><a class="nav-link <?php echo active_page('index.php'); ?>" href="<?php echo e(url('index.php')); ?>">Home</a></li>
        <li><a class="nav-link <?php echo active_page('about.php'); ?>" href="<?php echo e(url('about.php')); ?>">About Us</a></li>
        <li class="has-dropdown">
          <a class="nav-link <?php echo active_page('services.php', 'service-detail.php'); ?>" href="<?php echo e(url('services.php')); ?>">Our Services</a>
          <ul class="dropdown">
            <?php foreach (array_slice($services, 0, 6) as $svc): ?>
              <li><a href="<?php echo e(url('service-detail.php?slug=' . urlencode($svc['slug']))); ?>"><?php echo e($svc['title']); ?></a></li>
            <?php endforeach; ?>
            <li><a href="<?php echo e(url('services.php')); ?>">View all services</a></li>
          </ul>
        </li>
        <li><a class="nav-link <?php echo active_page('associates.php'); ?>" href="<?php echo e(url('associates.php')); ?>">Associates</a></li>
        <li><a class="nav-link <?php echo active_page('projects.php', 'project-detail.php'); ?>" href="<?php echo e(url('projects.php')); ?>">Projects</a></li>
        <li><a class="nav-link <?php echo active_page('testimonials.php'); ?>" href="<?php echo e(url('testimonials.php')); ?>">Testimonials</a></li>
        <li><a class="nav-link <?php echo active_page('news.php', 'news-detail.php'); ?>" href="<?php echo e(url('news.php')); ?>">News</a></li>
        <li><a class="nav-cta <?php echo active_page('contact.php'); ?>" href="<?php echo e(url('contact.php')); ?>">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>
