<?php
$page_title = 'Our Associates | Godavari Consultants & Services';
$page_description = 'Business partners and government institutional associates of Godavari Consultants & Services Pvt. Ltd.';
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>Our Associates</span>
      </nav>
      <h1>Our Associates</h1>
      <p>Institutional and business relationships that support technical capacity and programme delivery.</p>
    </div>
  </section>

  <section class="section">
    <div class="container associate-groups">
      <?php foreach ($associates as $group): ?>
        <div class="reveal">
          <div class="section-head">
            <span class="eyebrow">Network</span>
            <h2><?php echo e($group['category']); ?></h2>
          </div>
          <div class="associate-grid reveal-stagger">
            <?php foreach ($group['items'] as $item): ?>
              <article class="associate-card glass-card tilt-card">
                <div class="mark" aria-hidden="true"><?php echo e(strtoupper(substr($item['name'], 0, 1))); ?></div>
                <div>
                  <h3><?php echo e($item['name']); ?></h3>
                  <p><?php echo e($item['role']); ?></p>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="cta-band reveal">
        <div>
          <h2>Interested in associating with Godavari?</h2>
          <p>Professionals and organisations working in MSME, cluster, and compliance domains can reach out to explore collaboration.</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(url('contact.php')); ?>">Connect with us</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
