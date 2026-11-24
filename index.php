<?php
$page_title = 'Godavari Consultants & Services Pvt. Ltd. | Nashik';
$page_description = 'Entrepreneurship development, government subsidies & incentives, cluster formation, registrations, and project finance support in Nashik.';
$body_class = 'page-home';
require_once __DIR__ . '/includes/header.php';

$featured_services = array_slice($services, 0, 6);
$featured_projects = array_slice($projects, 0, 3);
$featured_testimonials = array_slice($testimonials, 0, 6);
$featured_news = $news;
$featured_associates = [];
foreach ($associates as $group) {
    foreach ($group['items'] as $item) {
        $featured_associates[] = $item + ['category' => $group['category']];
        if (count($featured_associates) >= 4) {
            break 2;
        }
    }
}
?>

<main id="main">
  <section class="hero" aria-label="Welcome">
    <div class="hero__media" data-parallax="0.18" role="img" aria-label="Professional consultancy atmosphere"></div>
    <div class="hero__pattern" aria-hidden="true"></div>
    <div class="hero__shapes" aria-hidden="true">
      <span class="shape shape-a"></span>
      <span class="shape shape-b"></span>
      <span class="shape shape-c"></span>
    </div>
    <div class="hero__float-art" aria-hidden="true" data-parallax="0.08">
      <svg viewBox="0 0 280 220" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="28" y="48" width="150" height="98" rx="16" fill="rgba(255,255,255,0.14)" stroke="rgba(0,164,223,0.55)"/>
        <rect x="48" y="68" width="70" height="10" rx="5" fill="rgba(255,255,255,0.55)"/>
        <rect x="48" y="88" width="110" height="8" rx="4" fill="rgba(255,255,255,0.28)"/>
        <rect x="48" y="106" width="92" height="8" rx="4" fill="rgba(255,255,255,0.22)"/>
        <circle cx="198" cy="78" r="34" fill="rgba(0,164,223,0.22)" stroke="rgba(0,164,223,0.7)"/>
        <path d="M186 78h24M198 66v24" stroke="#00A4DF" stroke-width="3" stroke-linecap="round"/>
        <rect x="118" y="132" width="120" height="58" rx="14" fill="rgba(33,77,152,0.35)" stroke="rgba(255,255,255,0.35)"/>
        <path d="M138 162h48M138 174h34" stroke="rgba(255,255,255,0.7)" stroke-width="4" stroke-linecap="round"/>
        <circle cx="214" cy="162" r="10" fill="#718F3D" opacity="0.9"/>
      </svg>
    </div>
    <div class="hero__content">
      <p class="hero-kicker anim-hero" style="--d:.05s">Godavari Consultants &amp; Services Pvt. Ltd.</p>
      <p class="brand-mark anim-hero" style="--d:.15s">Godavari<span>Consultants &amp; Services</span></p>
      <h1 class="anim-hero" style="--d:.28s"><?php echo e(SITE_TAGLINE); ?></h1>
      <p class="anim-hero" style="--d:.42s">Entrepreneurship development, government subsidies &amp; incentives, cluster formation, and enterprise registrations — guided from Nashik.</p>
      <div class="hero-actions anim-hero" style="--d:.58s">
        <a class="btn btn-primary btn-arrow" href="<?php echo e(url('services.php')); ?>">Explore Services <span aria-hidden="true">→</span></a>
        <a class="btn btn-secondary" href="<?php echo e(url('contact.php')); ?>">Talk to Our Team</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container split">
      <div class="split__media reveal anim-image">
        <div class="media-reveal">
          <img src="<?php echo e(asset('images/about-office.jpg')); ?>" alt="Business consultation and planning" loading="lazy">
        </div>
        <div class="split__badge">
          <strong>200+</strong>
          Business customers supported
        </div>
      </div>
      <div class="reveal anim-right">
        <div class="section-head">
          <span class="eyebrow">Who we are</span>
          <h2>Trusted advisors for entrepreneurs and industry development</h2>
          <p><?php echo e($company['guidance']); ?></p>
        </div>
        <p><?php echo e($company['management']); ?></p>
        <div class="hero-actions mt-2">
          <a class="btn btn-primary btn-arrow" href="<?php echo e(url('about.php')); ?>">More About Us <span aria-hidden="true">→</span></a>
          <a class="btn btn-outline" href="<?php echo e(url('associates.php')); ?>">Our Associates</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-bento">
    <div class="container">
      <div class="bento-panel reveal">
        <div class="section-head text-center" style="margin-inline:auto;">
          <span class="eyebrow">What we do</span>
          <h2>Comprehensive Consultancy Services</h2>
          <p>Godavari offers integrated solutions across subsidies, clusters, registrations, and enterprise growth.</p>
        </div>

        <div class="bento-grid reveal-stagger">
          <?php foreach ($featured_services as $i => $svc): ?>
            <?php
              $bentoClass = 'bento-card glass-card tilt-card';
              if ($i === 1) {
                  $bentoClass .= ' bento-card--feature';
              } elseif ($i === 5) {
                  $bentoClass .= ' bento-card--detail';
              } else {
                  $bentoClass .= ' bento-card--compact';
              }
            ?>
            <a class="<?php echo e($bentoClass); ?>" href="<?php echo e(url('service-detail.php?slug=' . urlencode($svc['slug']))); ?>">
              <?php if ($i === 1): ?>
                <div class="bento-card__media" aria-hidden="true">
                  <img src="<?php echo e(asset('images/team-collab.jpg')); ?>" alt="" loading="lazy">
                </div>
                <div class="bento-card__overlay">
                  <div class="icon-orb" aria-hidden="true"><?php echo service_icon($svc['slug']); ?></div>
                  <h3><?php echo e($svc['title']); ?></h3>
                  <span class="more-link">Explore</span>
                </div>
              <?php elseif ($i === 5): ?>
                <div class="icon-orb" aria-hidden="true"><?php echo service_icon($svc['slug']); ?></div>
                <h3><?php echo e($svc['title']); ?></h3>
                <p><?php echo e($svc['summary']); ?></p>
                <span class="more-link">Learn more</span>
              <?php else: ?>
                <div class="icon-orb" aria-hidden="true"><?php echo service_icon($svc['slug']); ?></div>
                <h3><?php echo e($svc['title']); ?></h3>
              <?php endif; ?>
            </a>
          <?php endforeach; ?>
        </div>

        <div class="section-actions">
          <a class="btn btn-outline btn-arrow" href="<?php echo e(url('services.php')); ?>">View all services <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container why-grid">
      <div class="why-panel reveal anim-left" style="position:relative;">
        <span class="float-decor float-decor--a" aria-hidden="true"></span>
        <span class="eyebrow eyebrow-light">Why Godavari</span>
        <h2>Scientific guidance. Long-term partnership.</h2>
        <p><?php echo e($company['management']); ?></p>
      </div>
      <div class="why-cards reveal-stagger">
        <?php foreach ($company['why_choose'] as $i => $point): ?>
          <article class="why-card glass-card tilt-card">
            <div class="why-card__icon" aria-hidden="true"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></div>
            <p><?php echo e($point); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section-stats" aria-label="Company highlights">
    <div class="container">
      <div class="section-head text-center reveal" style="margin-inline:auto;">
        <span class="eyebrow">Impact</span>
        <h2>Verified highlights</h2>
        <p>Figures drawn from published Godavari company information.</p>
      </div>
      <div class="stats-grid reveal-stagger">
        <article class="stat-card glass-card">
          <strong class="stat-value"><span data-count="200" data-suffix="+">0</span></strong>
          <span class="stat-label">Business customers supported</span>
        </article>
        <article class="stat-card glass-card">
          <strong class="stat-value"><span data-count="2018">0</span></strong>
          <span class="stat-label">Year of incorporation</span>
        </article>
        <article class="stat-card glass-card">
          <strong class="stat-value"><span data-count="15" data-suffix="+">0</span></strong>
          <span class="stat-label">Years of consultancy expertise</span>
        </article>
        <article class="stat-card glass-card">
          <strong class="stat-value"><span data-count="<?php echo count($services); ?>">0</span></strong>
          <span class="stat-label">Core service practice areas</span>
        </article>
      </div>
    </div>
  </section>

  <section class="section section-alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Selected work</span>
        <h2>Featured projects</h2>
        <p>Recent cluster, industrial, and institutional engagements drawn from our published project records.</p>
      </div>
      <div class="project-grid reveal-stagger">
        <?php foreach ($featured_projects as $project): ?>
          <a class="project-card glass-card tilt-card" href="<?php echo e(url('project-detail.php?slug=' . urlencode($project['slug']))); ?>">
            <div class="project-card__media media-reveal">
              <img src="<?php echo e(asset('images/' . $project['image'])); ?>" alt="<?php echo e($project['title']); ?>" loading="lazy">
            </div>
            <div class="project-card__body">
              <div class="meta">
                <span class="chip"><?php echo e($project['category']); ?></span>
                <span><?php echo e($project['date']); ?></span>
              </div>
              <h3><?php echo e($project['title']); ?></h3>
              <p><?php echo e($project['summary']); ?></p>
              <span class="more-link">Read more</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="section-actions reveal">
        <a class="btn btn-outline btn-arrow" href="<?php echo e(url('projects.php')); ?>">Browse all projects <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Network</span>
        <h2>Our associates</h2>
        <p>Institutional and business relationships that support programme delivery.</p>
      </div>
      <div class="associate-grid home-associates reveal-stagger">
        <?php foreach ($featured_associates as $item): ?>
          <article class="associate-card glass-card tilt-card">
            <div class="mark" aria-hidden="true"><?php echo e(strtoupper(substr($item['name'], 0, 1))); ?></div>
            <div>
              <h3><?php echo e($item['name']); ?></h3>
              <p><?php echo e($item['role']); ?> · <?php echo e($item['category']); ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="section-actions reveal">
        <a class="btn btn-outline btn-arrow" href="<?php echo e(url('associates.php')); ?>">View all associates <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <section class="section section-alt">
    <div class="container">
      <div class="section-head text-center reveal" style="margin-inline:auto;">
        <span class="eyebrow">Client voices</span>
        <h2>Testimonials from entrepreneurs &amp; institutions</h2>
      </div>
      <div class="testimonial-slider reveal">
        <div class="testimonial-track">
          <?php foreach ($featured_testimonials as $item): ?>
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
      <div class="section-actions reveal">
        <a class="btn btn-outline btn-arrow" href="<?php echo e(url('testimonials.php')); ?>">Read more testimonials <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <section class="section section-news">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Updates</span>
        <h2>News &amp; announcements</h2>
        <p>Programme updates and field activities from published Godavari announcements.</p>
      </div>
    </div>
    <div class="news-marquee reveal" data-news-marquee aria-label="News announcements scrolling list">
      <div class="news-marquee__viewport">
        <div class="news-marquee__track">
          <?php for ($loop = 0; $loop < 2; $loop++): ?>
            <div class="news-marquee__group" <?php echo $loop === 1 ? 'aria-hidden="true"' : ''; ?>>
              <?php foreach ($featured_news as $item): ?>
                <a class="news-card glass-card news-card--marquee" href="<?php echo e(url('news-detail.php?slug=' . urlencode($item['slug']))); ?>" <?php echo $loop === 1 ? 'tabindex="-1"' : ''; ?>>
                  <div class="news-card__media">
                    <img src="<?php echo e(asset('images/' . $item['image'])); ?>" alt="" loading="lazy" decoding="async">
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
          <?php endfor; ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="section-actions reveal">
        <a class="btn btn-outline btn-arrow" href="<?php echo e(url('news.php')); ?>">All news <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cta-band reveal">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div>
          <h2>Ready to progress your subsidy, cluster, or enterprise setup?</h2>
          <p>Share your requirement — our Nashik team will guide you through documentation, representation, and next steps.</p>
        </div>
        <a class="btn btn-secondary btn-arrow" href="<?php echo e(url('contact.php')); ?>">Get in touch <span aria-hidden="true">→</span></a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
