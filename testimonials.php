<?php
$page_title = 'Testimonials | Godavari Consultants & Services';
$page_description = 'Client testimonials for Godavari Consultants & Services Pvt. Ltd., Nashik.';
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>Testimonials</span>
      </nav>
      <h1>Testimonials</h1>
      <p>Feedback from entrepreneurs, associations, NGOs, and institutional partners — as published by the company.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head text-center reveal" style="margin-inline:auto; margin-bottom:1.75rem;">
        <span class="eyebrow">Social proof</span>
        <h2>What clients say</h2>
        <p>Published feedback from entrepreneurs, associations, NGOs, and institutional partners.</p>
      </div>
      <div class="testimonial-slider reveal" style="margin-bottom:2.5rem;">
        <div class="testimonial-track">
          <?php foreach ($testimonials as $item): ?>
            <div class="testimonial-slide">
              <blockquote class="quote-card glass-card">
                <p><?php echo e($item['quote']); ?></p>
                <cite><?php echo e($item['name']); ?><span><?php echo e($item['role']); ?></span></cite>
              </blockquote>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="slider-controls">
          <div class="slider-nav">
            <button type="button" data-slider-prev aria-label="Previous testimonial">‹</button>
            <button type="button" data-slider-next aria-label="Next testimonial">›</button>
          </div>
          <div class="slider-dots" data-slider-dots></div>
        </div>
      </div>
      <div class="testimonial-grid reveal-stagger">
        <?php foreach ($testimonials as $item): ?>
          <blockquote class="quote-card glass-card tilt-card">
            <p><?php echo e($item['quote']); ?></p>
            <cite><?php echo e($item['name']); ?><span><?php echo e($item['role']); ?></span></cite>
          </blockquote>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
