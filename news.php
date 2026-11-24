<?php
$page_title = 'News & Updates | Godavari Consultants & Services';
$page_description = 'News and announcements from Godavari Consultants & Services and related programmes.';
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>News</span>
      </nav>
      <h1>News &amp; Updates</h1>
      <p>Programme updates, field visits, training events, and community initiatives from published announcements.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head reveal" style="margin-bottom:1.75rem;">
        <span class="eyebrow">Updates</span>
        <h2>Latest announcements</h2>
        <p>Programme updates and field activities from published Godavari announcements.</p>
      </div>
      <div class="news-grid reveal-stagger">
        <?php foreach ($news as $item): ?>
          <a class="news-card glass-card tilt-card" href="<?php echo e(url('news-detail.php?slug=' . urlencode($item['slug']))); ?>">
            <div class="news-card__media media-reveal">
              <img src="<?php echo e(asset('images/' . $item['image'])); ?>" alt="" loading="lazy">
            </div>
            <div class="news-card__body">
              <div class="meta"><span><?php echo e($item['date']); ?></span></div>
              <h3><?php echo e($item['title']); ?></h3>
              <p><?php echo e($item['summary']); ?></p>
              <span class="more-link">Read more</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
