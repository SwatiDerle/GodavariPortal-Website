<?php
$page_title = 'Our Services | Godavari Consultants & Services';
$page_description = 'Cluster formation, government subsidies & incentives, licences, NGO support, project finance, and entrepreneurship development services.';
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>Our Services</span>
      </nav>
      <h1>Our Services</h1>
      <p>Integrated support for entrepreneurship development, government schemes, registrations, finance, and industrial cluster initiatives.</p>
    </div>
  </section>

  <section class="section service-list-page">
    <div class="container">
      <div class="section-head reveal" style="margin-bottom:1.75rem;">
        <span class="eyebrow">Practice areas</span>
        <h2>Services designed for enterprise growth</h2>
        <p>Interactive service cards with practical next steps for each consultancy area.</p>
      </div>
      <div class="cards reveal-stagger">
        <?php foreach ($services as $svc): ?>
          <a class="card-link glass-card tilt-card service-card-anim" href="<?php echo e(url('service-detail.php?slug=' . urlencode($svc['slug']))); ?>">
            <div class="card-top">
              <div class="icon-orb" aria-hidden="true"><?php echo service_icon($svc['slug']); ?></div>
              <h3><?php echo e($svc['title']); ?></h3>
            </div>
            <p><?php echo e($svc['summary']); ?></p>
            <span class="more-link">View details</span>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="cta-band reveal mt-2">
        <div>
          <h2>Need help identifying the right scheme or registration path?</h2>
          <p>Tell us about your enterprise — we will recommend a practical next step based on your sector and stage.</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(url('contact.php')); ?>">Request guidance</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
