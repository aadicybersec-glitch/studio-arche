<?php
/**
 * Template Name: Studio Arche — Portfolio
 * Immersive portfolio showcase with horizontal scroll gallery
 */
get_header();
get_template_part('header-arche');

$img = get_stylesheet_directory_uri() . '/assets/images/';
?>

<!-- ====================================================================
     SECTION 1 — PORTFOLIO HERO (Light)
     ==================================================================== -->
<section class="sa-section sa-section--full sa-portfolio-hero">
  <div class="sa-container">

    <span class="sa-subtitle" data-reveal="fade">OUR WORK</span>

    <h1 class="sa-hero-heading sa-mt-sm sa-mb-lg sa-reveal-text" data-reveal="chars">Portfolio</h1>

    <p class="sa-body-lg sa-mt-md sa-portfolio-hero__intro" data-reveal="fade">
      A curated collection of bespoke interiors — each project a dialogue between 
      space, light, and the lives that inhabit them. From penthouse residences to 
      landmark hospitality venues, every commission is a singular expression of craft.
    </p>

    <!-- Category Filter Tabs -->
    <div class="sa-portfolio-filters sa-mt-md" data-reveal="fade">
      <button class="sa-filter-tab is-active" data-filter="all">All</button>
      <button class="sa-filter-tab" data-filter="residential">Residential</button>
      <button class="sa-filter-tab" data-filter="commercial">Commercial</button>
      <button class="sa-filter-tab" data-filter="hospitality">Hospitality</button>
    </div>

  </div>
</section>


<!-- ====================================================================
     SECTION 2 — HORIZONTAL SCROLL GALLERY (Dark, Pinned)
     ==================================================================== -->
<section class="sa-section--dark sa-horizontal-section" id="portfolio-gallery">
  <div class="sa-horizontal-pin">

    <!-- Slide 1 -->
    <div class="sa-horizontal-slide" data-category="residential">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-residential.png'); ?>"
               alt="The Voss Residence — Luxury residential interior in Milan"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Residential</span>
        <h3 class="sa-horizontal-slide__title">The Voss Residence</h3>
        <span class="sa-horizontal-slide__meta">Milan, 2024</span>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="sa-horizontal-slide" data-category="hospitality">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-commercial.png'); ?>"
               alt="The Grand Atrium — Hospitality interior in Dubai"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Hospitality</span>
        <h3 class="sa-horizontal-slide__title">The Grand Atrium</h3>
        <span class="sa-horizontal-slide__meta">Dubai, 2023</span>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="sa-horizontal-slide" data-category="residential">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-kitchen.png'); ?>"
               alt="Marble & Brass — Kitchen interior in London"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Residential</span>
        <h3 class="sa-horizontal-slide__title">Marble &amp; Brass</h3>
        <span class="sa-horizontal-slide__meta">London, 2023</span>
      </div>
    </div>

    <!-- Slide 4 -->
    <div class="sa-horizontal-slide" data-category="residential">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-bedroom.png'); ?>"
               alt="Serene Retreat — Bedroom interior in Paris"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Residential</span>
        <h3 class="sa-horizontal-slide__title">Serene Retreat</h3>
        <span class="sa-horizontal-slide__meta">Paris, 2022</span>
      </div>
    </div>

    <!-- Slide 5 -->
    <div class="sa-horizontal-slide" data-category="commercial">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-office.png'); ?>"
               alt="The Executive Suite — Office interior in New York"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Commercial</span>
        <h3 class="sa-horizontal-slide__title">The Executive Suite</h3>
        <span class="sa-horizontal-slide__meta">New York, 2021</span>
      </div>
    </div>

    <!-- Slide 6 -->
    <div class="sa-horizontal-slide" data-category="residential">
      <div class="sa-horizontal-slide__image" data-tilt="4" data-cursor-label="VIEW">
        <div class="sa-img-wrap sa-img-wrap--hover">
          <img src="<?php echo esc_url($img . 'portfolio-bathroom.png'); ?>"
               alt="Spa Sanctuary — Bathroom interior in Tokyo"
               loading="lazy">
        </div>
      </div>
      <div class="sa-horizontal-slide__info">
        <span class="sa-horizontal-slide__category">Residential</span>
        <h3 class="sa-horizontal-slide__title">Spa Sanctuary</h3>
        <span class="sa-horizontal-slide__meta">Tokyo, 2024</span>
      </div>
    </div>

  </div><!-- /.sa-horizontal-pin -->

  <!-- Progress indicator -->
  <div class="sa-horizontal-progress">
    <div class="sa-horizontal-progress__bar"></div>
  </div>

</section>


<!-- ====================================================================
     SECTION 3 — FEATURED CASE STUDY (Light)
     ==================================================================== -->
<section class="sa-section sa-case-study">
  <div class="sa-container">

    <span class="sa-subtitle" data-reveal="fade">FEATURED PROJECT</span>

    <h2 class="sa-section-heading sa-mt-sm" data-reveal="words">The Voss Residence</h2>

    <div class="sa-line-reveal sa-mt-md sa-mb-lg" data-reveal="line" data-line-width="100%"></div>

    <!-- Primary Grid: Image + Details -->
    <div class="sa-grid sa-grid--60-40 sa-case-study__primary">

      <!-- Large Hero Image -->
      <div class="sa-img-wrap sa-img-wrap--hover sa-case-study__hero-img" data-parallax="15" data-reveal="fade">
        <img src="<?php echo esc_url($img . 'portfolio-residential.png'); ?>"
             alt="The Voss Residence — Full living room view"
             loading="lazy">
      </div>

      <!-- Project Details -->
      <div class="sa-case-study__details" data-reveal="fade">
        <div class="sa-case-study__meta-grid">
          <div class="sa-case-study__meta-item">
            <span class="sa-case-study__meta-label">Year</span>
            <span class="sa-case-study__meta-value">2024</span>
          </div>
          <div class="sa-case-study__meta-item">
            <span class="sa-case-study__meta-label">Location</span>
            <span class="sa-case-study__meta-value">Milan, Italy</span>
          </div>
          <div class="sa-case-study__meta-item">
            <span class="sa-case-study__meta-label">Area</span>
            <span class="sa-case-study__meta-value">480 m²</span>
          </div>
          <div class="sa-case-study__meta-item">
            <span class="sa-case-study__meta-label">Style</span>
            <span class="sa-case-study__meta-value">Contemporary Minimal</span>
          </div>
        </div>

        <p class="sa-body-lg sa-mt-md">
          A landmark penthouse overlooking the Navigli district, reimagined as a sanctuary 
          of understated opulence. Travertine floors, bespoke bronze fixtures, and floor-to-ceiling 
          glazing dissolve the boundary between interior grandeur and the Milanese skyline.
        </p>

        <p class="sa-body-sm sa-mt-sm">
          The material palette — hand-selected Italian marbles, smoked oak, and brushed brass — 
          creates a tactile narrative that unfolds through each room. Every surface, every join, 
          every shadow is considered.
        </p>

        <a href="#" class="sa-link sa-mt-md" data-magnetic="0.2">
          View Full Case Study
        </a>
      </div>

    </div>

    <!-- Secondary Grid: Two Supporting Images -->
    <div class="sa-grid sa-grid--2 sa-mt-lg sa-case-study__gallery">
      <div class="sa-img-wrap sa-img-wrap--hover sa-img-wrap--aspect-4-3" data-parallax="12" data-reveal="fade">
        <img src="<?php echo esc_url($img . 'portfolio-kitchen.png'); ?>"
             alt="The Voss Residence — Kitchen detail with marble and brass"
             loading="lazy">
      </div>
      <div class="sa-img-wrap sa-img-wrap--hover sa-img-wrap--aspect-4-3" data-parallax="12" data-reveal="fade">
        <img src="<?php echo esc_url($img . 'portfolio-bedroom.png'); ?>"
             alt="The Voss Residence — Master bedroom with soft textiles"
             loading="lazy">
      </div>
    </div>

  </div>
</section>


<!-- ====================================================================
     SECTION 4 — CTA (Dark, Centered)
     ==================================================================== -->
<section class="sa-section sa-section--dark sa-portfolio-cta">
  <div class="sa-container sa-text-center">

    <h2 class="sa-section-heading" data-reveal="words">Have a Project in Mind?</h2>

    <p class="sa-body-lg sa-mt-sm" data-reveal="fade">
      Let's create something extraordinary together.
    </p>

    <div class="sa-mt-md" data-reveal="fade">
      <a href="<?php echo esc_url(get_page_link(get_page_by_path('contact'))); ?>"
         class="sa-btn sa-btn--light"
         data-magnetic="0.3">
        Get in Touch <span class="sa-btn__arrow">→</span>
      </a>
    </div>

  </div>
</section>

<?php
get_template_part('footer-arche');
get_footer();
?>
