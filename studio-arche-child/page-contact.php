<?php
/**
 * Template Name: Studio Arche — Contact
 * Immersive dark-theater contact experience
 */
get_header();
get_template_part('header-arche');
?>

<!-- ======================================================================
     SECTION 1 — CONTACT HERO (100vh dark theater)
     ====================================================================== -->
<section class="sa-section sa-section--full sa-section--dark sa-contact-hero">
  <div class="sa-container sa-text-center">

    <!-- Eyebrow -->
    <span class="sa-subtitle sa-mb-sm" data-reveal="fade">Get in Touch</span>

    <!-- Mega Heading -->
    <h1 class="sa-mega-heading sa-mb-lg sa-reveal-text" data-reveal="chars">Let's Talk</h1>

    <!-- Gold line separator -->
    <div class="sa-contact-hero__line-wrap sa-mt-md sa-mb-lg">
      <div class="sa-line-reveal" data-reveal="line" style="margin: 0 auto; max-width: 120px;"></div>
    </div>

    <!-- Contact Info Cards -->
    <div class="sa-grid sa-grid--3 sa-contact-cards">

      <!-- Card 1: Visit Us -->
      <div class="sa-contact-card" data-reveal="fade" data-tilt="5">
        <div class="sa-contact-card__icon">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <h3 class="sa-contact-card__title">Visit Us</h3>
        <p class="sa-contact-card__detail">42 Via Montenapoleone,<br>Milan, Italy 20121</p>
      </div>

      <!-- Card 2: Email Us -->
      <div class="sa-contact-card" data-reveal="fade" data-tilt="5">
        <div class="sa-contact-card__icon">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="4" width="20" height="16" rx="2"/>
            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
          </svg>
        </div>
        <h3 class="sa-contact-card__title">Email Us</h3>
        <p class="sa-contact-card__detail">
          <a href="mailto:hello@studioarche.com" class="sa-contact-card__link" data-cursor-label="EMAIL">hello@studioarche.com</a>
        </p>
      </div>

      <!-- Card 3: Call Us -->
      <div class="sa-contact-card" data-reveal="fade" data-tilt="5">
        <div class="sa-contact-card__icon">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
          </svg>
        </div>
        <h3 class="sa-contact-card__title">Call Us</h3>
        <p class="sa-contact-card__detail">
          <a href="tel:+390276014500" class="sa-contact-card__link" data-cursor-label="CALL">+39 02 7601 4500</a>
        </p>
      </div>

    </div><!-- .sa-contact-cards -->

  </div><!-- .sa-container -->

  <!-- Scroll hint -->
  <div class="sa-contact-hero__scroll">
    <span>Scroll</span>
    <div class="sa-contact-hero__scroll-line"></div>
  </div>

</section>


<!-- ======================================================================
     SECTION 2 — CONTACT FORM (charcoal background)
     ====================================================================== -->
<section class="sa-section sa-section--dark sa-contact-form-section" style="background-color: var(--sa-charcoal);">
  <div class="sa-container">

    <div class="sa-grid sa-grid--60-40 sa-contact-form-grid">

      <!-- Left: Form -->
      <div class="sa-contact-form-wrap" data-reveal="stagger">

        <span class="sa-subtitle sa-mb-sm">Start a Conversation</span>
        <h2 class="sa-section-heading sa-mb-lg" data-reveal="words">Tell us about your project</h2>

        <form class="sa-contact-form" id="saContactForm" novalidate>

          <!-- Full Name -->
          <div class="sa-form-group">
            <input type="text" id="saName" name="name" class="sa-form-input" autocomplete="name" required>
            <label for="saName" class="sa-form-label">Full Name</label>
            <span class="sa-form-line"></span>
            <span class="sa-form-error" aria-live="polite"></span>
          </div>

          <!-- Email -->
          <div class="sa-form-group">
            <input type="email" id="saEmail" name="email" class="sa-form-input" autocomplete="email" required>
            <label for="saEmail" class="sa-form-label">Email Address</label>
            <span class="sa-form-line"></span>
            <span class="sa-form-error" aria-live="polite"></span>
          </div>

          <!-- Phone -->
          <div class="sa-form-group">
            <input type="tel" id="saPhone" name="phone" class="sa-form-input" autocomplete="tel">
            <label for="saPhone" class="sa-form-label">Phone</label>
            <span class="sa-form-line"></span>
            <span class="sa-form-error" aria-live="polite"></span>
          </div>

          <!-- Project Type -->
          <div class="sa-form-group sa-form-group--select">
            <select id="saProjectType" name="project_type" class="sa-form-input sa-form-select" required>
              <option value="" disabled selected hidden></option>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
              <option value="hospitality">Hospitality</option>
              <option value="other">Other</option>
            </select>
            <label for="saProjectType" class="sa-form-label">Project Type</label>
            <span class="sa-form-line"></span>
            <span class="sa-form-select-arrow">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"/>
              </svg>
            </span>
            <span class="sa-form-error" aria-live="polite"></span>
          </div>

          <!-- Message -->
          <div class="sa-form-group sa-form-group--textarea">
            <textarea id="saMessage" name="message" class="sa-form-input sa-form-textarea" rows="4" required></textarea>
            <label for="saMessage" class="sa-form-label">Tell us about your vision</label>
            <span class="sa-form-line"></span>
            <span class="sa-form-error" aria-live="polite"></span>
          </div>

          <!-- Submit -->
          <div class="sa-form-submit sa-mt-md">
            <button type="submit" class="sa-btn sa-btn--light" data-magnetic="0.3">
              <span>Send Message</span>
              <span class="sa-btn__arrow">→</span>
            </button>
          </div>

        </form>

        <!-- Success State -->
        <div class="sa-form-success" id="saFormSuccess" aria-hidden="true">
          <div class="sa-form-success__icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--sa-champagne)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
              <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
          </div>
          <h3 class="sa-section-heading" style="font-size: var(--sa-text-2xl);">Message Sent</h3>
          <p class="sa-body-lg sa-mt-sm">Thank you for reaching out. We'll respond within 24 hours.</p>
        </div>

      </div><!-- .sa-contact-form-wrap -->

      <!-- Right: Atmospheric Image -->
      <div class="sa-contact-form-image" data-reveal="fade">
        <div class="sa-img-wrap sa-img-wrap--hover sa-contact-form-image__wrap">
          <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio-commercial.png"
            alt="Studio Arche — Commercial Interior Design"
            loading="lazy"
            data-parallax="15"
          >
        </div>
        <!-- Overlay quote -->
        <blockquote class="sa-contact-form-image__quote" data-reveal="fade">
          <p>"Design is not just what it looks like. Design is how it works."</p>
          <cite>— Steve Jobs</cite>
        </blockquote>
      </div>

    </div><!-- .sa-grid -->

  </div><!-- .sa-container -->
</section>


<!-- ======================================================================
     SECTION 3 — MAP & STUDIO HOURS (dark)
     ====================================================================== -->
<section class="sa-section sa-section--dark sa-contact-map-section">
  <div class="sa-container">

    <div class="sa-grid sa-grid--2 sa-contact-map-grid">

      <!-- Left: Dark-styled Map -->
      <div class="sa-contact-map" data-reveal="fade">
        <div class="sa-contact-map__embed">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.1234567890123!2d9.1949!3d45.4688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c6a7a7a7a7a7%3A0x1234567890abcdef!2sVia%20Monte%20Napoleone%2C%2042%2C%2020121%20Milano%20MI%2C%20Italy!5e0!3m2!1sen!2sit!4v1700000000000!5m2!1sen!2sit"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Studio Arche Location — Via Montenapoleone, Milan"
          ></iframe>
        </div>
      </div>

      <!-- Right: Studio Hours & Details -->
      <div class="sa-contact-hours" data-reveal="fade">
        <span class="sa-subtitle sa-mb-sm">Studio Hours</span>
        <h2 class="sa-section-heading sa-mb-md" style="font-size: var(--sa-text-2xl);" data-reveal="words">When to Find Us</h2>

        <div class="sa-hours-list">
          <div class="sa-hours-item">
            <span class="sa-hours-item__day">Monday — Friday</span>
            <span class="sa-hours-item__time">9:00 — 18:00</span>
          </div>
          <div class="sa-hours-item">
            <span class="sa-hours-item__day">Saturday</span>
            <span class="sa-hours-item__time">By Appointment</span>
          </div>
          <div class="sa-hours-item">
            <span class="sa-hours-item__day">Sunday</span>
            <span class="sa-hours-item__time sa-hours-item__time--closed">Closed</span>
          </div>
        </div>

        <div class="sa-contact-hours__divider sa-mt-md sa-mb-md">
          <div class="sa-line-reveal" data-reveal="line" style="max-width: 80px;"></div>
        </div>

        <div class="sa-contact-hours__address">
          <h3 class="sa-contact-hours__heading">Visit Our Studio</h3>
          <p class="sa-body-lg">
            42 Via Montenapoleone<br>
            Milan, Italy 20121
          </p>
          <p class="sa-body-sm sa-mt-sm" style="max-width: 380px;">
            Nestled in the heart of Milan's prestigious Quadrilatero della Moda,
            our studio is a living testament to the transformative power of
            thoughtful design. Book a consultation and experience our philosophy firsthand.
          </p>
        </div>

        <a href="mailto:hello@studioarche.com" class="sa-btn sa-btn--light sa-mt-md" data-magnetic="0.3">
          <span>Book a Visit</span>
          <span class="sa-btn__arrow">→</span>
        </a>
      </div>

    </div><!-- .sa-grid -->

  </div><!-- .sa-container -->
</section>


<?php
get_template_part('footer-arche');
get_footer();
?>
