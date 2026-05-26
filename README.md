# STUDIO ARCHE — Minimal Architecture & Luxury Interiors

An award-winning, highly customized luxury WordPress child theme designed for modern architectural ateliers and high-end interior design studios. Built with custom page templates, vanilla animations, and a bespoke CSS design system on top of the Hello Elementor parent theme.

---

## 🛠️ Technical Stack & Core Architecture

* **Parent Theme:** Hello Elementor (Lightweight, performance-optimized canvas)
* **Animation Suite:** GSAP Core (3.12.5) & GSAP ScrollTrigger (3.12.5) for high-performance visual timelines
* **Scroll Engine:** Lenis Smooth Scroll (1.1.18) for fluid kinetic scrolling
* **Structure:** Programmatic PHP page templates (`page-home.php`, `page-about.php`, `page-services.php`, `page-portfolio.php`, `page-contact.php`)
* **Style Foundation:** Custom HSL Travertine/Obsidian CSS variables with viewport-based fluid typography using the `clamp()` formula
* **Visual Texture:** Injected high-frequency animated CSS noise grain and architectural wire frames for a physical, tactile grid aesthetic
* **Diagnostic Engine:** Dynamic JS exception tracking hooked directly into an active, server-side `error-logger.php`

---

## 🎨 Luxury Custom CSS Classes

Every element is styled using curated custom styling tokens. You can immediately dress any Elementor container or custom block by adding these classes in the **Advanced > CSS Classes** field:

### Spacing & Spans
* `.arche-section-padding`: Standardizes spacious, responsive vertical breathing room (`7.5vw` desktop, `5vw` tablet, `8vh` mobile).
* `.sa-container`: Curates a centered, wide architectural content alignment box.

### Visual Elements
* `.sa-section--dark`: Drapes the background in Obsidian black (`#0F0F0F`) and applies off-white/champagne text colors.
* `.sa-btn` / `.sa-btn--light`: Bespoke buttons that trigger solid vertical overlay transitions and horizontal arrow offsets on hover.
* `.sa-cursor-dot` / `.sa-cursor-ring`: Premium custom cursor system that reacts dynamically to hover states (`.is-hovering`, `.is-action`, `.is-text`).

---

## 💎 Visual Features

1. **FOUC-Safe Event-Driven Text Reveals:** Hero headings (`.sa-hero-heading`, `.sa-mega-heading`) are hidden instantly at DOMContentLoaded, then animated sequentially using `SA.animateHeroHeadings()` after the preloader completes or on AJAX page transitions.
2. **Kinetic Horizontal Scroll Gallery:** Precisely mapped ScrollTrigger horizontal flex alignment for architectural case studies in `page-portfolio.php`.
3. **Ergonomic Floating Inputs:** Dynamic label hovers and GSAP shake indicators for contact fields.
4. **Instant AJAX Transitions:** Fully customized internal transition sweeps with 5-column Obsidian curtain wipes, asynchronous page fetches, metadata swaps, and active-menu highlighting.

---

## 🚀 Setup & Local Synchronization

1. Zip the `studio-arche-child` folder or locate the prepackaged `studio-arche-child.zip`.
2. Upload via **Appearance > Themes > Add New Theme** in your WordPress dashboard and activate.
3. Configure your pages to use **Elementor Full Width** and set home page to static.
4. Maintain consistency: always synchronize changes in your active Local WP directory back to this child theme path and update the ZIP package.
