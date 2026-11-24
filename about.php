<?php
$page_title = 'About Us | Godavari Consultants & Services';
$page_description = 'Learn about Godavari Consultants & Services Pvt. Ltd., Nashik — vision, mission, expertise, and team.';
require_once __DIR__ . '/includes/header.php';
?>

<main id="main">
  <section class="page-hero">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(url('index.php')); ?>">Home</a><span>/</span><span>About Us</span>
      </nav>
      <h1>About Godavari</h1>
      <p>An experienced consultancy organisation supporting entrepreneurship development, subsidies, clusters, and enterprise growth from Nashik.</p>
    </div>
  </section>

  <section class="section" style="position:relative; overflow:hidden;">
    <span class="float-decor float-decor--a" aria-hidden="true"></span>
    <span class="float-decor float-decor--b" aria-hidden="true"></span>
    <div class="container split">
      <div class="split__media reveal anim-image">
        <div class="media-reveal">
          <img src="<?php echo e(asset('images/team-collab.jpg')); ?>" alt="Godavari team collaboration" loading="lazy">
        </div>
        <div class="split__badge">
          <strong>Since <?php echo e((string) SITE_YEAR_START); ?></strong>
          Incorporated company journey
        </div>
      </div>
      <div class="reveal anim-right">
        <div class="section-head">
          <span class="eyebrow">Company background</span>
          <h2>Recognised consultancy for subsidy, finance &amp; industry development</h2>
        </div>
        <p><?php echo e($company['about_long']); ?></p>
        <p><?php echo e($company['guidance']); ?></p>
        <p><em><?php echo e($company['mother_org_note']); ?></em></p>
      </div>
    </div>
  </section>

  <section class="section section-alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Milestones</span>
        <h2>Company journey</h2>
        <p>Key points drawn from published Godavari company information.</p>
      </div>
      <div class="journey-timeline reveal">
        <article class="journey-item">
          <strong>Mother organisation</strong>
          <p>Success Global Foundation, Nashik provides technical agency support for Central and State Government schemes and cluster success.</p>
        </article>
        <article class="journey-item">
          <strong><?php echo e((string) SITE_YEAR_START); ?> — Incorporation</strong>
          <p>Godavari Consultants &amp; Services Pvt. Ltd. was incorporated to deliver integrated consultancy for entrepreneurship and industry development.</p>
        </article>
        <article class="journey-item">
          <strong>15+ years of consultancy expertise</strong>
          <p>The practice has built recognised experience across industries through bank finance, subsidies, and enterprise support.</p>
        </article>
        <article class="journey-item">
          <strong>200+ business customers supported</strong>
          <p>Assistance across Bank Loan &amp; Finance, Govt Subsidy, MSICDP, MSECDP, SFURTI, Adarshgaon and related sectors.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Direction</span>
        <h2>Vision &amp; Mission</h2>
      </div>
      <div class="why-grid" style="margin-bottom:2rem;">
        <div class="why-panel reveal anim-left glass-card" style="padding:1.4rem;">
          <h2>Our Vision</h2>
          <p><?php echo e($vision); ?></p>
        </div>
        <div class="reveal anim-right">
          <p style="color:var(--ink-soft);"><?php echo e($company['management']); ?></p>
          <p style="margin-top:1rem;"><strong>Motto:</strong> <?php echo e(SITE_TAGLINE); ?></p>
        </div>
      </div>
      <div class="mission-grid reveal-stagger">
        <?php foreach ($mission as $item): ?>
          <article class="mission-card glass-card tilt-card">
            <h3><?php echo e($item['title']); ?></h3>
            <p><?php echo e($item['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section-alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Capabilities</span>
        <h2>Where we focus</h2>
      </div>
      <ul class="checklist reveal-stagger" style="grid-template-columns:repeat(auto-fit,minmax(260px,1fr));">
        <?php foreach ($company['why_choose'] as $point): ?>
          <li><?php echo e($point); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Leadership &amp; team</span>
        <h2>People behind the practice</h2>
        <p>Profiles as published on the company website.</p>
      </div>
      <div class="team-grid reveal-stagger">
        <?php foreach ($team as $member): ?>
          <article class="team-card glass-card tilt-card">
            <h3><?php echo e($member['name']); ?></h3>
            <div class="role"><?php echo e($member['role']); ?></div>
            <p><?php echo e($member['bio']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section-alt">
    <div class="container">
      <div class="cta-band reveal">
        <div>
          <h2>Partner with a team focused on your business objectives</h2>
          <p>Whether you need subsidy guidance, cluster development, or registrations — start a conversation with us.</p>
        </div>
        <a class="btn btn-primary btn-arrow" href="<?php echo e(url('contact.php')); ?>">Contact Us <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
