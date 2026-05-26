# Home Page Design Blueprint: STUDIO ARCHE

The homepage is the first visual handshake. It must feel like an online gallery—minimalist, high-contrast, editorial, and visually dramatic. 

This guide details how to construct the page in Elementor using our custom child theme's luxury CSS classes.

---

## Section 1: Cinematic Hero
* **Purpose:** High-impact editorial branding and immediate premium feeling.
* **Layout:** 1-column section, full height.

### Elementor Settings:
1. **Layout > Height:** Set to `Fit to Screen` (forces `100vh`).
2. **Style > Background:** 
   * Choose **Classic** and upload a dark, moody architectural photo (high contrast, clean shadows).
   * **Position:** Center Center, **Attachment:** Scroll, **Repeat:** No-repeat, **Size:** Cover.
3. **Style > Background Overlay:**
   * Color: `#0F0F0F` (Obsidian)
   * Opacity: `0.55` (ensures readability of overlay text).
4. **Layout > Content Position:** Middle, **Align:** Center.

### Content Widgets (Nested in Column):
1. **Spacer Widget:** Height `10vh`.
2. **Heading Widget (Subtitle Caps):**
   * Text: `Minimal Architecture & Luxury Interiors`
   * HTML Tag: `span`
   * CSS Classes (in Advanced > Layout > CSS Classes): `arche-subtitle-caps`
3. **Heading Widget (Main Headline):**
   * Text: `Sculpting Space,<br>Light & Silence.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, `300` weight, set color to `#FFFFFF`.
   * Alignment: Center.
4. **HTML Widget (Luxury CTA Buttons):**
   * Insert this clean HTML code:
     ```html
     <div style="display: flex; gap: 20px; justify-content: center; margin-top: 2.5rem;">
         <a href="/portfolio" class="arche-btn-outline" style="color: #FFFFFF; border-color: #FFFFFF;">Explore Works</a>
         <a href="/contact" class="arche-btn-underline" style="color: #FFFFFF;">Get in Touch</a>
     </div>
     ```

---

## Section 2: Narrative & Architectural Stats
* **Purpose:** Establish brand authority and high-end positioning.
* **Layout:** 2-column section. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding` (enforces uniform `7.5vw` padding).

### Column 1 (Left - 7 Cols / span 7):
1. **Heading Widget (Subtitle):**
   * Text: `01 / Design Philosophy`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget (Narrative Headline):**
   * Text: `We design spaces that breathe, speaking in details rather than noise.`
   * HTML Tag: `h2`
   * Typography: Serif, Obsidian Black.
3. **Text Editor Widget (Lead Paragraph):**
   * Text: `At Studio Arche, we believe that luxury lies in restraint. By balancing monolithic forms with natural materials and architectural lighting, we construct physical frames for silence and peace.`
   * CSS Classes: `arche-lead`

### Column 2 (Right - 5 Cols / span 5):
We will build our high-end, responsive statistics grid directly enlisting our CSS layout tokens.
1. **HTML Widget (Editorial Stats Grid):**
   * Insert this HTML to render the statistics grid:
     ```html
     <div class="arche-stats-grid" style="margin-top: 2rem;">
         <div class="arche-stat-card">
             <div class="arche-stat-number"><span class="accent">12</span></div>
             <div class="arche-stat-label">Years Expertise</div>
         </div>
         <div class="arche-stat-card">
             <div class="arche-stat-number"><span class="accent">140</span>+</div>
             <div class="arche-stat-label">Luxury Projects</div>
         </div>
     </div>
     <div class="arche-stats-grid" style="border-top: none;">
         <div class="arche-stat-card">
             <div class="arche-stat-number"><span class="accent">26</span></div>
             <div class="arche-stat-label">Design Awards</div>
         </div>
         <div class="arche-stat-card">
             <div class="arche-stat-number"><span class="accent">100</span>%</div>
             <div class="arche-stat-label">Bespoke Detail</div>
         </div>
     </div>
     ```

---

## Section 3: Bespoke Before/After Interactive Slider
* **Purpose:** Demonstrate powerful high-end transformation capabilities (e.g. raw site concrete vs. finished luxury penthouse) without heavy page-speed bloating.
* **Layout:** 1-column section, full-width or elegant boxed container.
* **Section Spacing:** CSS Class `arche-section-padding`.

To build this interactive component in **Elementor Free**, simply add an **HTML Widget** inside a 1-column section and paste the following custom snippet:

```html
<div class="arche-before-after-container" id="arche-slider-1">
    <!-- The "After" finished luxury image -->
    <div class="arche-ba-image arche-ba-after" id="ba-after-img" style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&q=80');">
        <div class="arche-ba-label arche-ba-after-label">After: Atelier Penthouse</div>
    </div>
    
    <!-- The "Before" raw skeletal structure image -->
    <div class="arche-ba-image arche-ba-before" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1600&q=80');">
        <div class="arche-ba-label arche-ba-before-label">Before: Skeletal Concrete</div>
    </div>
    
    <!-- Drag Handle -->
    <div class="arche-ba-handle" id="ba-handle">
        <div class="arche-ba-handle-circle">║</div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("arche-slider-1");
    const afterImage = document.getElementById("ba-after-img");
    const handle = document.getElementById("ba-handle");
    let isDragging = false;

    function moveSlider(x) {
        const rect = container.getBoundingClientRect();
        let position = ((x - rect.left) / rect.width) * 100;
        
        // Bounds locking
        if (position < 0) position = 0;
        if (position > 100) position = 100;
        
        afterImage.style.clipPath = `polygon(0 0, ${position}% 0, ${position}% 100%, 0 100%)`;
        handle.style.left = `${position}%`;
    }

    // Mouse events
    container.addEventListener("mousedown", (e) => {
        isDragging = true;
        moveSlider(e.clientX);
    });
    
    window.addEventListener("mouseup", () => {
        isDragging = false;
    });
    
    window.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        moveSlider(e.clientX);
    });

    // Touch events for mobile responsiveness
    container.addEventListener("touchstart", (e) => {
        isDragging = true;
        moveSlider(e.touches[0].clientX);
    });
    
    window.addEventListener("touchend", () => {
        isDragging = false;
    });
    
    window.addEventListener("touchmove", (e) => {
        if (!isDragging) return;
        moveSlider(e.touches[0].clientX);
    });
});
</script>
```

---

## Section 4: Featured Asymmetric Portfolio
* **Purpose:** Modern architectural grid displaying core interior masterpieces.
* **Layout:** 1-column section utilizing our enqueued CSS asymmetric grid layouts.
* **Section Spacing:** CSS Class `arche-section-padding`.

Add an **HTML Widget** or structured text columns utilizing the grid system:

```html
<div class="arche-grid-container">
    <!-- Project 1: Asymmetric Left Column -->
    <div class="arche-grid-col-7">
        <div class="arche-image-wrapper" style="aspect-ratio: 16/10;">
            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80" alt="Villa Noir">
        </div>
        <div style="margin-top: 1.5rem;">
            <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.5rem;">Residential — 2025</span>
            <h3 style="font-size: 2rem; margin-bottom: 0.5rem;">Villa Noir, Switzerland</h3>
            <a href="/portfolio" class="arche-btn-underline">View Project</a>
        </div>
    </div>

    <!-- Project 2: Asymmetric Right Column (Offset Downward for High-End Feel) -->
    <div class="arche-grid-col-5 arche-offset-top">
        <div class="arche-image-wrapper" style="aspect-ratio: 3/4;">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="Atelier Alabaster">
        </div>
        <div style="margin-top: 1.5rem;">
            <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.5rem;">Bespoke Interior — 2026</span>
            <h3 style="font-size: 2rem; margin-bottom: 0.5rem;">Atelier Alabaster</h3>
            <a href="/portfolio" class="arche-btn-underline">View Project</a>
        </div>
    </div>
</div>
```

---

## Section 5: The "Archepath" Process Timeline
* **Purpose:** Educates prospective clients on our premium journey from conception to physical reveal.
* **Layout:** 2-column section. Set background to Obsidian Black (`.arche-dark-section`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column 1 (Left - 5 Columns):
1. **Heading Widget (Subtitle Caps):**
   * Text: `02 / Our Method`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget:**
   * Text: `A structured journey toward silence.`
   * HTML Tag: `h2`
   * Typography: Cormorant Garamond, White.

### Column 2 (Right - 7 Columns):
We build an exquisite, responsive line timeline using our pre-written CSS classes:
1. **HTML Widget (Process Timeline):**
   * Insert this HTML to render the interactive timeline path:
     ```html
     <div class="arche-process-wrap">
         <div class="arche-process-item">
             <div class="arche-process-step"></div>
             <span class="arche-process-number">Phase 01</span>
             <h3 style="color: #FFFFFF; font-size: 1.6rem; margin: 0 0 0.5rem 0;">Spatial Resonance & Anatomy</h3>
             <p style="color: #8E8C87; margin: 0;">We analyze light angles, raw concrete dimensions, and acoustics to define the design constraints of your volume.</p>
         </div>
         
         <div class="arche-process-item">
             <div class="arche-process-step"></div>
             <span class="arche-process-number">Phase 02</span>
             <h3 style="color: #FFFFFF; font-size: 1.6rem; margin: 0 0 0.5rem 0;">Materiality & Palette curation</h3>
             <p style="color: #8E8C87; margin: 0;">Sourcing tactile specimens—calacatta marble, brushed bronze, raw oak, and hand-woven bouclé textiles.</p>
         </div>

         <div class="arche-process-item">
             <div class="arche-process-step"></div>
             <span class="arche-process-number">Phase 03</span>
             <h3 style="color: #FFFFFF; font-size: 1.6rem; margin: 0 0 0.5rem 0;">Sartorial Realization</h3>
             <p style="color: #8E8C87; margin: 0;">Physical execution, artisan assembly, and spatial curation, resulting in your premium finished sanctuary.</p>
         </div>
     </div>
     ```

---

## Section 6: Full Bleed Obsidian CTA
* **Purpose:** Drive immediate conversion/contact.
* **Layout:** 1-column. Dark section (`.arche-dark-section`).
* **Section Spacing:** CSS Class `arche-section-padding` with massive text padding.

### Content Widgets:
1. **Heading Widget (Main Serif Display):**
   * Text: `Let us carve your sanctuary.`
   * HTML Tag: `h2`
   * Typography: Cormorant Garamond, `300` weight, centered. Font size clamp is very large here (e.g., `5vw`).
2. **Spacer Widget:** Height `1.5rem`.
3. **HTML Widget (Call to Action Button):**
   * Insert this HTML:
     ```html
     <div style="display: flex; justify-content: center;">
         <a href="/contact" class="arche-btn-outline" style="color: #FFFFFF; border-color: #EAE3D8; padding: 1.2rem 3rem;">Initiate Commission</a>
     </div>
     ```
