<?php
require_once __DIR__ . '/config.php';
$page_title = $page_title ?? SITE_NAME;
$page_description = $page_description ?? $company['intro'];
$body_class = $body_class ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo e($page_description); ?>">
  <meta name="author" content="<?php echo e(SITE_NAME); ?>">
  <meta name="theme-color" content="#214D98">
  <title><?php echo e($page_title); ?></title>
  <link rel="icon" type="image/png" href="<?php echo e(asset('images/godavari-symbol.png')); ?>">
  <link rel="apple-touch-icon" href="<?php echo e(asset('images/godavari-logo.png')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/animations.css')); ?>">
  <?php foreach (($extra_css ?? []) as $css_file): ?>
    <?php if ($css_file === 'css/animations.css') continue; ?>
    <link rel="stylesheet" href="<?php echo e(asset($css_file)); ?>">
  <?php endforeach; ?>
</head>
<body class="<?php echo e($body_class); ?>">
<div class="page-loader" id="page-loader" aria-hidden="true">
  <div class="page-loader__mark">
    <img src="<?php echo e(asset('images/godavari-logo.png')); ?>" alt="" width="315" height="199" class="brand-logo brand-logo--loader">
  </div>
</div>
<a class="skip-link" href="#main">Skip to content</a>
<?php require __DIR__ . '/navbar.php'; ?>
