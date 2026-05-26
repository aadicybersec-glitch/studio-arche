<?php
/**
 * Template Name: Studio Arche — About
 */
get_header();
get_template_part('header-arche');
?>

<main class="sa-page-content">

    <!-- Section 1: Story Hero -->
    <section class="sa-section" style="padding-top: 20vh; min-height: 80vh;">
        <div class="sa-container">
            <span class="sa-subtitle sa-mb-md">ABOUT US</span>
            <h1 class="sa-hero-heading sa-mb-lg sa-reveal-text" data-reveal="chars">Crafting Timeless<br>Spaces Since 2012</h1>
            
            <p class="sa-body-lg sa-mb-xl sa-reveal" data-reveal="fade" style="max-width: 800px;">
                Studio Arche is an award-winning interior architecture firm based in Milan, 
                with projects spanning the globe. We believe in the power of restraint, 
                the beauty of natural materials, and the profound impact of light.
            </p>
            
            <div class="sa-line-reveal" data-reveal="line"></div>
        </div>
    </section>

    <!-- Section 2: Our Story -->
    <section class="sa-section">
        <div class="sa-container">
            <div class="sa-grid sa-grid--40-60" style="align-items: center;">
                <div class="sa-img-wrap sa-img-wrap--aspect-3-4" data-parallax="20" style="margin-top: -10%;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-residential.png" alt="Our Story">
                </div>
                <div style="padding-left: 5vw;">
                    <h2 class="sa-section-heading sa-mb-md sa-reveal-text" data-reveal="words">Born from a passion for spatial poetry</h2>
                    <p class="sa-body-lg sa-mb-md sa-reveal" data-reveal="fade">
                        What began as a small atelier in the heart of Milan has grown into a globally recognized 
                        design practice. Founded by visionary architects who sought to strip away the superfluous, 
                        Studio Arche was built on a simple premise: a space should feel like a deep exhale.
                    </p>
                    <p class="sa-body-lg sa-reveal" data-reveal="fade">
                        Our journey over the past decade has been one of continuous refinement. We don't just decorate 
                        rooms; we sculpt atmospheres. Every project is an intimate collaboration, a process of discovering 
                        the unique essence of our clients and expressing it through the language of architecture.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Philosophy Cards -->
    <section class="sa-section sa-section--dark" style="padding: var(--sa-space-2xl) 0;">
        <div class="sa-container">
            <div class="sa-text-center sa-mb-xl">
                <span class="sa-subtitle sa-mb-sm">OUR VALUES</span>
                <h2 class="sa-section-heading sa-reveal-text" data-reveal="words">Three Pillars of Design</h2>
            </div>
            
            <div class="sa-grid sa-grid--3" data-reveal="stagger">
                <div class="sa-philosophy-card" data-tilt="5">
                    <div class="sa-philosophy-card__num">01</div>
                    <h3 class="sa-philosophy-card__title">Harmony</h3>
                    <p class="sa-philosophy-card__desc">We seek the perfect equilibrium between form and function, negative space and object, light and shadow.</p>
                </div>
                <div class="sa-philosophy-card" data-tilt="5">
                    <div class="sa-philosophy-card__num">02</div>
                    <h3 class="sa-philosophy-card__title">Materiality</h3>
                    <p class="sa-philosophy-card__desc">We source only the finest natural materials—stone, wood, linen—that age gracefully and tell a story of authenticity.</p>
                </div>
                <div class="sa-philosophy-card" data-tilt="5">
                    <div class="sa-philosophy-card__num">03</div>
                    <h3 class="sa-philosophy-card__title">Light</h3>
                    <p class="sa-philosophy-card__desc">Light is our primary medium. We sculpt spaces to capture, diffuse, and manipulate natural light throughout the day.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: The Team -->
    <section class="sa-section" style="padding: var(--sa-space-2xl) 0;">
        <div class="sa-container">
            <div class="sa-text-center sa-mb-xl">
                <span class="sa-subtitle sa-mb-sm">THE PEOPLE</span>
                <h2 class="sa-section-heading sa-reveal-text" data-reveal="words">Meet Our Atelier</h2>
            </div>
            
            <div class="sa-grid sa-grid--3" data-reveal="stagger">
                <div class="sa-team-card">
                    <div class="sa-img-wrap sa-img-wrap--aspect-3-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-commercial.png" alt="Elena Voss" class="sa-team-card__img">
                    </div>
                    <div class="sa-team-card__info">
                        <h3 class="sa-team-card__name">Elena Voss</h3>
                        <span class="sa-team-card__role">Principal Architect</span>
                    </div>
                </div>
                
                <div class="sa-team-card" style="margin-top: 40px;">
                    <div class="sa-img-wrap sa-img-wrap--aspect-3-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-office.png" alt="Marcus Chen" class="sa-team-card__img">
                    </div>
                    <div class="sa-team-card__info">
                        <h3 class="sa-team-card__name">Marcus Chen</h3>
                        <span class="sa-team-card__role">Design Director</span>
                    </div>
                </div>
                
                <div class="sa-team-card">
                    <div class="sa-img-wrap sa-img-wrap--aspect-3-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-kitchen.png" alt="Sofia Reyes" class="sa-team-card__img">
                    </div>
                    <div class="sa-team-card__info">
                        <h3 class="sa-team-card__name">Sofia Reyes</h3>
                        <span class="sa-team-card__role">Interior Stylist</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Timeline -->
    <section class="sa-section" style="padding-bottom: var(--sa-space-2xl);">
        <div class="sa-container sa-container--narrow">
            <div class="sa-text-center sa-mb-xl">
                <span class="sa-subtitle sa-mb-sm">OUR JOURNEY</span>
                <h2 class="sa-section-heading sa-reveal-text" data-reveal="words">Milestones</h2>
            </div>
            
            <div class="sa-timeline">
                <div class="sa-timeline__item sa-reveal" data-reveal="fade">
                    <div class="sa-timeline__year">2012</div>
                    <div class="sa-timeline__content">
                        <h3 class="sa-timeline__title">Founded in Milan</h3>
                        <p class="sa-timeline__desc">Studio Arche was established by Elena Voss with a vision to redefine luxury through minimalism.</p>
                    </div>
                </div>
                <div class="sa-timeline__item sa-reveal" data-reveal="fade">
                    <div class="sa-timeline__year">2015</div>
                    <div class="sa-timeline__content">
                        <h3 class="sa-timeline__title">First International Award</h3>
                        <p class="sa-timeline__desc">Recognized at the Venice Architecture Biennale for our work on the Alpine Retreat.</p>
                    </div>
                </div>
                <div class="sa-timeline__item sa-reveal" data-reveal="fade">
                    <div class="sa-timeline__year">2019</div>
                    <div class="sa-timeline__content">
                        <h3 class="sa-timeline__title">Expanded to Dubai & London</h3>
                        <p class="sa-timeline__desc">Opened our first international offices to serve a growing global clientele.</p>
                    </div>
                </div>
                <div class="sa-timeline__item sa-reveal" data-reveal="fade">
                    <div class="sa-timeline__year">2024</div>
                    <div class="sa-timeline__content">
                        <h3 class="sa-timeline__title">Studio Arche Atelier Launched</h3>
                        <p class="sa-timeline__desc">Introduced our bespoke furniture line, bringing our architectural philosophy to individual objects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: CTA -->
    <section class="sa-section sa-section--dark sa-text-center" style="padding: var(--sa-space-xl) 0;">
        <div class="sa-container">
            <h2 class="sa-section-heading sa-mb-lg sa-reveal-text" data-reveal="words">Want to join our story?</h2>
            <div class="sa-reveal" data-reveal="fade">
                <a href="<?php echo esc_url(get_page_link(get_page_by_path('contact'))); ?>" class="sa-btn sa-btn--light" data-magnetic="0.3">
                    Get in Touch <span class="sa-btn__arrow">→</span>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_template_part('footer-arche');
get_footer();
?>
