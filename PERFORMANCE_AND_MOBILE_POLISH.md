# Performance, Mobile Responsiveness & Polish Checklist

A premium interior design website must not only look visually stunning—it must load instantly and respond gracefully to any screen size, whether a client views it on a 27-inch iMac or an iPhone Pro.

---

## 1. Perfect Mobile Responsiveness

By enqueuing our custom design system, you have already automated 80% of responsiveness. Our custom classes utilize CSS fluid typography (using the `clamp()` formula), which recalculates sizes dynamically based on screen width.

### Responsive Spacing Guidelines:
1. **Never use static pixel widths** for columns or margins.
2. For sections, use our custom class `arche-section-padding`. It automatically scales vertical breathing room based on viewport width:
   * **Desktop:** `7.5vw` (feels spacious, premium).
   * **Tablet:** `5vw`.
   * **Mobile:** `8vh` or `40px` (prevents excessive blank gaps).
3. **Column Collapsing:**
   * In Elementor, columns inside a section collapse vertically on mobile by default (stacking 100% wide). 
   * Ensure that text columns collapse *above* image columns, or configure reversing on mobile via **Section Settings > Advanced > Responsive > Reverse Columns (Mobile)**.
4. **Typography Clamp Scale:**
   * Our enqueued CSS variables automatically handle heading scales:
     * `h1`: `clamp(3rem, 6vw, 6.5rem)`
     * `h2`: `clamp(2.2rem, 4vw, 4rem)`
     * `p.arche-lead`: `clamp(1.1rem, 1.5vw, 1.4rem)`
   * If you override headings inside the Elementor typography settings, **always click the Mobile/Tablet device icons** next to the Font Size field to specify separate responsive sizes (e.g. `24px` on mobile, `32px` on tablet, `48px` on desktop) to prevent horizontal layout breaks.
5. **Preventing Overflow Issues:**
   * If you see horizontal scrolling on mobile, a widget is overflowing the screen boundaries. 
   * *Fix:* Select the containing **Section**, go to **Layout**, and set **Overflow** to `Hidden`.

---

## 2. Ultra-Lightweight Speed Optimization

A slow website destroys the luxury experience. To ensure your website loads in **under 1.0 second**, configure these settings:

### Step 1: Optimize Elementor Engine Settings
Elementor has a reputation for bloated HTML output. You can clean this up by activating their advanced developer optimizations:
1. In your WordPress Admin dashboard, go to **Elementor > Settings > Features**.
2. Set the following features to **Active**:
   * **Flexbox Container:** (The modern, CSS-based flex layout engine which replaces heavy table markup).
   * **Grid Container:** (Enables clean CSS Grid layouts).
   * **Optimized Image Loading:** (Enforces modern lazy loading).
   * **Inline Font Icons:** (Stops loading the entire heavy FontAwesome library, saving 120KB of weight).
3. Click **Save Changes**.

### Step 2: Curation of Images
Architectural images are the focal point of the site. If you upload large, raw JPEGs directly from stock sites, your site size will exceed 20MB and take 10 seconds to load!
1. **File Format:** **Never upload PNGs or raw JPEGs** for photographs.
2. **Standard:** Convert all images to **WebP** format. WebP has 70% better compression than JPEG at the same visual quality. (Use free tools like `squoosh.app` or local script converters).
3. **Resolution & Compression Standards:**
   * **Full-Width Heroes:** Maximum width `1920px`, file size `< 250KB`.
   * **Asymmetric Grid Images:** Maximum width `1000px`, file size `< 120KB`.
   * **Portraits / Card Details:** Maximum width `600px`, file size `< 60KB`.
4. **Lazy Loading:** Ensure all images below the hero fold have `loading="lazy"` active (enabled by default in modern WordPress).

### Step 3: Minimalist Plugin Architecture
Avoid the temptation to install "Elementor Addon" plugins. They inject massive, unoptimized CSS and JS files on every single page load. Our custom child theme does all the heavy lifting!

---

## 3. Creative Director's Polish Checklist

Before declaring your Studio Arche build complete, perform these checks:

* [ ] **Negative Space Check:** Does the page feel cramped? If yes, increase your container margins. High-end brands like Apple, Leica, and architectural firms use massive negative space. Space is luxury.
* [ ] **Typographic Consistency:** Are there more than three font families on the screen? (We enqueued `Cormorant Garamond` for headings, `Plus Jakarta Sans` for body, and `Syne` for caps subtitles. Stick strictly to this hierarchy).
* [ ] **Color Contrast Integrity:** Ensure that light text on dark backgrounds uses pure off-white (`#F7F5F0`), and dark text on light backgrounds uses charcoal black (`#0F0F0F`). Avoid pure `#000000` (which feels harsh and digital) or weak gray (which fails accessibility rules).
* [ ] **Interactive Hover Delay:** Hover over all buttons and custom cards. Ensure the transition curves are smooth (`all 0.6s cubic-bezier(0.16, 1, 0.3, 1)`) and do not snap sharply, which feels mechanical.
* [ ] **Form Validation Visuals:** Try submitting the contact form empty. Ensure the error messages align with the minimal typography of the input lines.
