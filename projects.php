<?php
$page_title = 'Projects | Godavari Consultants & Services';
$page_description = 'Cluster, industrial, NGO, and SFURTI related project engagements by Godavari Consultants & Services.';
require_once __DIR__ . '/includes/header.php';

$categories = array_values(array_unique(array_map(static fn($p) => $p['category'], $projects)));
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>Projects</span>
      </nav>
      <h1>Projects</h1>
      <p>Selected engagements across cluster formation, industrial support, and NGO / online services — based on published project records.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="filters reveal" role="toolbar" aria-label="Filter projects by category">
        <button type="button" class="filter-btn is-active" data-filter="all">All</button>
        <?php foreach ($categories as $cat): ?>
          <button type="button" class="filter-btn" data-filter="<?php echo e($cat); ?>"><?php echo e($cat); ?></button>
        <?php endforeach; ?>
      </div>

      <div class="project-grid reveal-stagger">
        <?php foreach ($projects as $project): ?>
          <a class="project-card glass-card tilt-card" data-category="<?php echo e($project['category']); ?>" href="<?php echo e(url('project-detail.php?slug=' . urlencode($project['slug']))); ?>">
            <div class="project-card__media media-reveal">
              <img src="<?php echo e(asset('images/' . $project['image'])); ?>" alt="<?php echo e($project['title']); ?>" loading="lazy">
            </div>
            <div class="project-card__body">
              <div class="meta">
                <span class="chip"><?php echo e($project['category']); ?></span>
                <span><?php echo e($project['location']); ?></span>
              </div>
              <h3><?php echo e($project['title']); ?></h3>
              <p><?php echo e($project['summary']); ?></p>
              <span class="more-link">Read more</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
