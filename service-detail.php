<?php
require_once __DIR__ . '/includes/config.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$service = find_by_slug($services, $slug);

if (!$service) {
    http_response_code(404);
    $page_title = 'Service not found | Godavari Consultants';
    require_once __DIR__ . '/includes/header.php';
    echo '<main id="main" class="section"><div class="container"><h1>Service not found</h1><p>The requested service could not be located.</p><a class="btn btn-primary" href="' . e(url('services.php')) . '">Back to services</a></div></main>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$page_title = $service['title'] . ' | Godavari Consultants';
$page_description = $service['summary'];
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span>
        <a href="<?php echo e(url('services.php')); ?>">Services</a><span>/</span>
        <span><?php echo e($service['title']); ?></span>
      </nav>
      <h1><?php echo e($service['title']); ?></h1>
      <p><?php echo e($service['summary']); ?></p>
    </div>
  </section>

  <section class="section">
    <div class="container detail-layout">
      <article class="detail-main reveal">
        <p class="lead"><?php echo e($service['description']); ?></p>
        <h2>Included focus areas</h2>
        <ul class="side-list">
          <?php foreach ($service['items'] as $item): ?>
            <li><?php echo e($item); ?></li>
          <?php endforeach; ?>
        </ul>
        <p>We provide complete guidance in representing your case to Government agencies in a scientific manner, leaving you free from hassles — with focus on preparing and progressing applications for maximum eligible benefits.</p>
      </article>
      <aside class="detail-side reveal">
        <h3>Start an enquiry</h3>
        <p>Share your requirement and our team will respond with the relevant process and documentation outline.</p>
        <a class="btn btn-primary" href="<?php echo e(url('contact.php')); ?>">Contact Us</a>
        <h3 style="margin-top:1.75rem;">Other services</h3>
        <ul class="side-list">
          <?php foreach ($services as $other): ?>
            <?php if ($other['slug'] === $service['slug']) continue; ?>
            <li><a href="<?php echo e(url('service-detail.php?slug=' . urlencode($other['slug']))); ?>"><?php echo e($other['title']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </aside>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
