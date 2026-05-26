<p align="center">
  <img src="screenshots/home.png" alt="Studio Arche — Home" width="720" />
</p>

<h1 align="center">STUDIO ARCHE</h1>
<p align="center"><strong>Minimal Architecture &amp; Luxury Interiors</strong></p>
<p align="center">
  <a href="https://studio-arche.page.gd/">🌐 Live Site</a> &nbsp;·&nbsp;
  <a href="#-visual-showcase">📸 Screenshots</a> &nbsp;·&nbsp;
  <a href="#%EF%B8%8F-technical-stack">🛠️ Stack</a> &nbsp;·&nbsp;
  <a href="#-setup">🚀 Setup</a>
</p>

---

## ✨ Overview

An award-winning, hand-coded luxury WordPress child theme designed for modern architectural ateliers and high-end interior design studios. Every pixel is intentional — from the animated CSS noise grain texture to the kinetic AJAX page transitions with 5-column obsidian curtain wipes.

Built with **zero page builders for layout** — pure PHP templates, vanilla CSS design tokens, and orchestrated GSAP timelines on top of a lightweight Hello Elementor canvas.

---

## 📸 Visual Showcase

### Home
> Cinematic parallax hero · Philosophy section · Curated project cards · Stats counter band · Before/After slider · Testimonial marquee · CTA footer

<p align="center">
  <img src="screenshots/home.png" alt="Home Page" width="720" />
</p>

---

### About
> Fluid hero typography · Origin story with tilt imagery · Three Pillars grid · Team atelier cards with staggered offsets · Milestone timeline

<p align="center">
  <img src="screenshots/about.png" alt="About Page" width="720" />
</p>

---

### Services
> Dark gradient hero · Interactive accordion with image reveals · Numbered process steps · Consultation CTA

<p align="center">
  <img src="screenshots/services.png" alt="Services Page" width="720" />
</p>

---

### Portfolio
> Horizontal scroll gallery with ScrollTrigger pinning · Filter tabs · Case study deep-dive · Progress bar indicator

<p align="center">
  <img src="screenshots/portfolio.png" alt="Portfolio Page" width="720" />
</p>

---

### Contact
> Radial glow hero · Floating label form with GSAP shake validation · Embedded map · Business hours grid

<p align="center">
  <img src="screenshots/contact.png" alt="Contact Page" width="720" />
</p>

---

## 🛠️ Technical Stack

| Layer | Technology |
|---|---|
| **Parent Theme** | Hello Elementor (lightweight canvas) |
| **Templates** | Hand-coded PHP (`page-home.php`, `page-about.php`, `page-services.php`, `page-portfolio.php`, `page-contact.php`) |
| **Styling** | Vanilla CSS with custom HSL design tokens, `clamp()` fluid typography |
| **Animation** | GSAP Core 3.12.5 + ScrollTrigger 3.12.5 |
| **Scroll** | Lenis Smooth Scroll 1.1.18 |
| **Typography** | Cormorant Garamond (display) · Plus Jakarta Sans (body) · Syne (accents) |
| **Diagnostics** | Custom `error-logger.php` with `window.onerror` JS hook |

---

## 🎨 Design System

### Color Palette

| Token | Hex | Usage |
|---|---|---|
| `--sa-obsidian` | `#0F0F0F` | Dark sections, overlays, preloader |
| `--sa-cream` | `#F7F5F0` | Light backgrounds, body canvas |
| `--sa-champagne` | `#C5A880` | Accents, buttons, cursor, gold highlights |
| `--sa-white` | `#FFFFFF` | Pure headings on dark backgrounds |
| `--sa-muted` | `#8A8A85` | Secondary labels, stat counters |
| `--sa-warm-grey` | `#B5B0A8` | Body text on dark sections |

### Visual Textures
- **Noise Grain Overlay** — High-frequency animated SVG turbulence at `0.018` opacity for an organic, paper-like aesthetic
- **Architectural Wire Grid** — Vertical champagne columns at `0.04` opacity simulating draftsman precision lines

### Key CSS Classes

| Class | Effect |
|---|---|
| `.sa-section--dark` | Obsidian background with cream/white text |
| `.sa-btn` / `.sa-btn--light` | Premium button with vertical fill hover animation |
| `.sa-hero-heading` | Fluid hero type scale (`clamp(3.5rem, 8vw, 9rem)`) |
| `.sa-mega-heading` | Ultra-large CTA type (`clamp(5rem, 12vw, 14rem)`) |
| `.sa-reveal` / `.sa-reveal-text` | ScrollTrigger-driven fade/word-split animations |
| `.sa-img-wrap--hover` | Subtle zoom on image hover (`scale(1.08)`) |

---

## 💎 Signature Features

- **FOUC-Safe Text Reveals** — Hero headings hidden at DOMContentLoaded, animated via `SA.animateHeroHeadings()` after preloader or AJAX transition
- **AJAX Page Transitions** — 5-column obsidian curtain wipe, async fetch with cache-busting, DOM swap, ScrollTrigger memory reset
- **Horizontal Scroll Gallery** — ScrollTrigger-pinned flex container with mathematically precise scroll duration mapping
- **Custom Cursor System** — Dot + ring cursor with contextual states (`.is-hovering`, `.is-action`, `.is-text`)
- **Floating Label Forms** — Dynamic focus/filled states with GSAP shake validation feedback
- **Glassmorphic Navigation** — Transparent → frosted glass on scroll with `backdrop-filter: blur(24px)`

---

## 🚀 Setup

1. Install [Local WP](https://localwp.com/) and create a new site named `Studio Arche`
2. Install and activate the **Hello Elementor** parent theme
3. Upload `studio-arche-child.zip` via **Appearance → Themes → Add New → Upload Theme** and activate
4. Create pages (`Home`, `About`, `Services`, `Portfolio`, `Contact`) with **Elementor Full Width** template
5. Set **Settings → Reading → Homepage** to `Home` (static page)
6. Set **Settings → Permalinks** to `Post name`

> See [`STUDIO_ARCHE_SETUP_GUIDE.md`](STUDIO_ARCHE_SETUP_GUIDE.md) for the full walkthrough and [`PERFORMANCE_AND_MOBILE_POLISH.md`](PERFORMANCE_AND_MOBILE_POLISH.md) for optimization guidelines.

---

## 📁 Project Structure

```
studio-arche/
├── studio-arche-child/          # WordPress child theme (deployable)
│   ├── assets/
│   │   ├── css/
│   │   │   ├── global.css       # Design system tokens & components
│   │   │   ├── home.css         # Home page styles
│   │   │   ├── about.css        # About page styles
│   │   │   ├── services.css     # Services page styles
│   │   │   ├── portfolio.css    # Portfolio page styles
│   │   │   ├── contact.css      # Contact page styles
│   │   │   └── transitions.css  # AJAX transition overlays
│   │   ├── js/
│   │   │   ├── engine.js        # Core animation engine (43KB)
│   │   │   └── [page].js        # Per-page init scripts
│   │   └── images/              # Optimized WebP/PNG assets
│   ├── page-home.php            # Home template
│   ├── page-about.php           # About template
│   ├── page-services.php        # Services template
│   ├── page-portfolio.php       # Portfolio template
│   ├── page-contact.php         # Contact template
│   ├── header-arche.php         # Glassmorphic nav + error logger
│   ├── footer-arche.php         # Branded footer
│   ├── functions.php            # Template registration & asset loading
│   ├── error-logger.php         # Server-side JS exception logger
│   └── style.css                # WP child theme declaration
├── page-blueprints/             # Design specifications per page
├── elementor-templates/         # Elementor JSON templates
├── screenshots/                 # Visual showcase images
├── studio-arche-child.zip       # Deployable theme package
├── STUDIO_ARCHE_SETUP_GUIDE.md  # Full setup walkthrough
├── PERFORMANCE_AND_MOBILE_POLISH.md  # Optimization checklist
└── README.md
```

---

<p align="center">
  <sub>Crafted with precision by <strong>Aadinadh</strong> · Powered by obsidian, champagne, and negative space</sub>
</p>
