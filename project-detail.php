<?php
require_once __DIR__ . '/includes/config.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$project = find_by_slug($projects, $slug);

if (!$project) {
    http_response_code(404);
    $page_title = 'Project not found | Godavari Consultants';
    require_once __DIR__ . '/includes/header.php';
    echo '<main id="main" class="section"><div class="container"><h1>Project not found</h1><p>The requested project could not be located.</p><a class="btn btn-primary" href="' . e(url('projects.php')) . '">Back to projects</a></div></main>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$page_title = $project['title'] . ' | Projects | Godavari Consultants';
$page_description = $project['summary'];
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span>
        <a href="<?php echo e(url('projects.php')); ?>">Projects</a><span>/</span>
        <span><?php echo e($project['title']); ?></span>
      </nav>
      <h1><?php echo e($project['title']); ?></h1>
      <p><?php echo e($project['summary']); ?></p>
    </div>
  </section>

  <section class="section">
    <div class="container detail-layout">
      <article class="detail-main reveal">
        <div class="detail-hero-img">
          <img src="<?php echo e(asset('images/' . $project['image'])); ?>" alt="<?php echo e($project['title']); ?>">
        </div>
        <div class="meta">
          <span class="chip"><?php echo e($project['category']); ?></span>
          <span><?php echo e($project['date']); ?></span>
          <span><?php echo e($project['location']); ?></span>
        </div>
        <div class="prose">
          <p><?php echo e($project['description']); ?></p>
        </div>
      </article>
      <aside class="detail-side reveal">
        <h3>Discuss a similar requirement</h3>
        <p>Planning a cluster DPR, industrial incentive file, or institutional registration? Our team can outline the process.</p>
        <a class="btn btn-primary" href="<?php echo e(url('contact.php')); ?>">Enquire now</a>
        <h3 style="margin-top:1.75rem;">More projects</h3>
        <ul class="side-list">
          <?php foreach (array_slice($projects, 0, 6) as $other): ?>
            <?php if ($other['slug'] === $project['slug']) continue; ?>
            <li><a href="<?php echo e(url('project-detail.php?slug=' . urlencode($other['slug']))); ?>"><?php echo e($other['title']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </aside>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
