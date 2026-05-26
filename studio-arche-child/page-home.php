<?php
/**
 * Template Name: Studio Arche — Home
 */
get_header();
get_template_part('header-arche');
?>

<main class="sa-page-content">
    
    <!-- Section 1: Cinematic Hero -->
    <section class="sa-section sa-section--full sa-section--dark" style="position: relative; overflow: hidden; padding: 0;">
        <div class="sa-img-wrap" data-parallax="15" style="position: absolute; inset: 0; z-index: 0; background: none;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-interior.png" alt="Luxury Interior" style="width: 100%; height: 130%; object-fit: cover;">
        </div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(10,10,10,0.2) 0%, rgba(10,10,10,0.8) 100%); z-index: 1;"></div>
        
        <div class="sa-container sa-text-center" style="position: relative; z-index: 2; margin-top: auto; margin-bottom: 15vh;">
            <span class="sa-subtitle sa-mb-md sa-reveal" data-reveal="fade">ATELIER OF MODERN LIVING</span>
            <h1 class="sa-hero-heading sa-mb-lg sa-reveal-text" data-reveal="words" style="max-width: 1200px; margin-inline: auto;">We Design Spaces That Breathe</h1>
            
            <div class="sa-line-reveal" data-reveal="line" style="margin: 0 auto;"></div>
            
            <div class="sa-scroll-indicator" style="position: absolute; bottom: -10vh; left: 50%; transform: translateX(-50%);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--sa-champagne)" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
            </div>
        </div>
    </section>

    <!-- Section 2: Introduction / Philosophy -->
    <section class="sa-section">
        <div class="sa-container">
            <div class="sa-grid sa-grid--60-40" style="align-items: center;">
                <div>
                    <span class="sa-subtitle sa-mb-md">OUR PHILOSOPHY</span>
                    <h2 class="sa-section-heading sa-mb-lg sa-reveal-text" data-reveal="words">Where Architecture Meets Emotion</h2>
                    <p class="sa-body-lg sa-mb-lg sa-reveal" data-reveal="fade">We believe that a space is not merely a container for life, but a canvas for it. Every material chosen, every line drawn, and every beam of light captured serves a singular purpose: to evoke a profound sense of belonging. Our approach strips away the unnecessary, leaving only the essential, the beautiful, and the timeless.</p>
                    <div class="sa-reveal" data-reveal="fade">
                        <a href="<?php echo esc_url(get_page_link(get_page_by_path('about'))); ?>" class="sa-btn" data-magnetic="0.3">
                            Discover Our Story <span class="sa-btn__arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="sa-img-wrap sa-img-wrap--aspect-4-5" data-parallax="20" data-tilt="6">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-residential.png" alt="Residential Interior">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Featured Projects -->
    <section class="sa-section">
        <div class="sa-container">
            <div class="sa-text-center sa-mb-xl">
                <span class="sa-subtitle sa-mb-sm">SELECTED WORKS</span>
                <h2 class="sa-section-heading sa-reveal-text" data-reveal="words">Curated Interiors</h2>
            </div>
            
            <div class="sa-featured-projects">
                <!-- Card 1 -->
                <a href="<?php echo esc_url(get_page_link(get_page_by_path('portfolio'))); ?>" class="sa-project-card sa-project-card--large sa-reveal" data-reveal="fade">
                    <div class="sa-img-wrap sa-img-wrap--hover" data-parallax="10">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-commercial.png" alt="The Grand Atrium">
                        <div class="sa-project-card__overlay">
                            <span class="sa-project-card__cat">Hospitality</span>
                            <h3 class="sa-project-card__title">The Grand Atrium</h3>
                        </div>
                    </div>
                </a>
                
                <div class="sa-grid sa-grid--40-60 sa-mt-lg">
                    <!-- Card 2 -->
                    <a href="<?php echo esc_url(get_page_link(get_page_by_path('portfolio'))); ?>" class="sa-project-card sa-project-card--offset sa-reveal" data-reveal="fade">
                        <div class="sa-img-wrap sa-img-wrap--hover" data-parallax="15">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-kitchen.png" alt="Marble & Brass">
                            <div class="sa-project-card__overlay">
                                <span class="sa-project-card__cat">Residential</span>
                                <h3 class="sa-project-card__title">Marble & Brass</h3>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Card 3 -->
                    <a href="<?php echo esc_url(get_page_link(get_page_by_path('portfolio'))); ?>" class="sa-project-card sa-reveal" data-reveal="fade">
                        <div class="sa-img-wrap sa-img-wrap--hover" data-parallax="8">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-bedroom.png" alt="Serene Retreat">
                            <div class="sa-project-card__overlay">
                                <span class="sa-project-card__cat">Residential</span>
                                <h3 class="sa-project-card__title">Serene Retreat</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Stats Band -->
    <section class="sa-section sa-section--dark" style="padding: var(--sa-space-xl) 0;">
        <div class="sa-container">
            <div class="sa-stats">
                <div class="sa-stat sa-text-center">
                    <div class="sa-stat__number" data-count="12" data-count-suffix="+">0</div>
                    <div class="sa-stat__label">Years of Excellence</div>
                </div>
                <div class="sa-stat sa-text-center">
                    <div class="sa-stat__number" data-count="200" data-count-suffix="+">0</div>
                    <div class="sa-stat__label">Projects Delivered</div>
                </div>
                <div class="sa-stat sa-text-center">
                    <div class="sa-stat__number" data-count="15">0</div>
                    <div class="sa-stat__label">Design Awards</div>
                </div>
                <div class="sa-stat sa-text-center">
                    <div class="sa-stat__number" data-count="98" data-count-suffix="%">0</div>
                    <div class="sa-stat__label">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Before/After Showcase -->
    <section class="sa-section">
        <div class="sa-container">
            <div class="sa-text-center sa-mb-xl">
                <span class="sa-subtitle sa-mb-sm">TRANSFORMATION</span>
                <h2 class="sa-section-heading sa-reveal-text" data-reveal="words">See the Difference</h2>
            </div>
            
            <div class="sa-compare sa-reveal" data-reveal="fade" data-cursor-label="DRAG">
                <div class="sa-compare__img sa-compare__before" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/before.png');"></div>
                <div class="sa-compare__img sa-compare__after" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/after.png');"></div>
                <div class="sa-compare__handle">
                    <div class="sa-compare__knob">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l6-6-6-6M9 18l-6-6 6-6"/></svg>
                    </div>
                </div>
                <div class="sa-compare__label sa-compare__label--before">Before</div>
                <div class="sa-compare__label sa-compare__label--after">After</div>
            </div>
        </div>
    </section>

    <!-- Section 6: Testimonial Marquee -->
    <section class="sa-section sa-section--dark" style="overflow: hidden; padding: var(--sa-space-xl) 0;">
        <div class="sa-marquee">
            <div class="sa-marquee__track">
                <div class="sa-marquee__item">
                    <div class="sa-testimonial">
                        <div class="sa-testimonial__quote">"A masterclass in modern minimalism. Our home has never felt more serene."</div>
                        <div class="sa-testimonial__author">— Elena Rossi, Milan</div>
                    </div>
                </div>
                <div class="sa-marquee__item">
                    <div class="sa-testimonial">
                        <div class="sa-testimonial__quote">"Studio Arche didn't just design our office; they elevated our entire brand identity."</div>
                        <div class="sa-testimonial__author">— James Chen, CEO</div>
                    </div>
                </div>
                <div class="sa-marquee__item">
                    <div class="sa-testimonial">
                        <div class="sa-testimonial__quote">"Their attention to light and materiality creates spaces that feel truly alive."</div>
                        <div class="sa-testimonial__author">— Sofia Laurent, Paris</div>
                    </div>
                </div>
                <div class="sa-marquee__item">
                    <div class="sa-testimonial">
                        <div class="sa-testimonial__quote">"Impeccable taste, flawless execution. The ultimate luxury experience."</div>
                        <div class="sa-testimonial__author">— Alexander Wright</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: CTA Footer Section -->
    <section class="sa-section sa-section--dark sa-section--full sa-text-center">
        <div class="sa-container">
            <h2 class="sa-mega-heading sa-mb-lg sa-reveal-text" data-reveal="chars">Ready to Transform Your Space?</h2>
            <div class="sa-reveal" data-reveal="fade">
                <a href="<?php echo esc_url(get_page_link(get_page_by_path('contact'))); ?>" class="sa-btn sa-btn--light" data-magnetic="0.3">
                    Start Your Project <span class="sa-btn__arrow">→</span>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_template_part('footer-arche');
get_footer();
?>
