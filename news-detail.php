<?php
require_once __DIR__ . '/includes/config.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$item = find_by_slug($news, $slug);

if (!$item) {
    http_response_code(404);
    $page_title = 'News not found | Godavari Consultants';
    require_once __DIR__ . '/includes/header.php';
    echo '<main id="main" class="section"><div class="container"><h1>News not found</h1><p>The requested article could not be located.</p><a class="btn btn-primary" href="' . e(url('news.php')) . '">Back to news</a></div></main>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$page_title = $item['title'] . ' | News | Godavari Consultants';
$page_description = $item['summary'];
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span>
        <a href="<?php echo e(url('news.php')); ?>">News</a><span>/</span>
        <span>Update</span>
      </nav>
      <h1><?php echo e($item['title']); ?></h1>
      <p><?php echo e($item['date']); ?></p>
    </div>
  </section>

  <section class="section">
    <div class="container detail-layout">
      <article class="detail-main reveal">
        <div class="detail-hero-img">
          <img src="<?php echo e(asset('images/' . $item['image'])); ?>" alt="">
        </div>
        <p class="lead"><?php echo e($item['summary']); ?></p>
        <div class="prose">
          <p><?php echo e($item['body']); ?></p>
        </div>
      </article>
      <aside class="detail-side reveal">
        <h3>More updates</h3>
        <ul class="side-list">
          <?php foreach ($news as $other): ?>
            <?php if ($other['slug'] === $item['slug']) continue; ?>
            <li>
              <a href="<?php echo e(url('news-detail.php?slug=' . urlencode($other['slug']))); ?>">
                <?php echo e($other['title']); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <a class="btn btn-outline" href="<?php echo e(url('news.php')); ?>">All news</a>
      </aside>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
