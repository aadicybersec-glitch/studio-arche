# About Page Design Blueprint: STUDIO ARCHE

The About Page should feel like a high-fashion editorial magazine interview. It showcases our visionaries, design ethos, and why we build the way we build.

---

## Section 1: The Monolith Story Header
* **Purpose:** Introduce the creators and design philosophy with high-contrast asymmetric weight.
* **Layout:** 2-column section. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column 1 (Left - 5 Columns):
1. **Heading Widget (Subtitle Caps):**
   * Text: `01 / Creative Directors`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget (Headline):**
   * Text: `Crafting spatial silence since 2014.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, Large Display, Obsidian Black.
3. **Text Editor Widget (Story Lead):**
   * Text: `Founded by architectural visionaries, Studio Arche was born out of a desire to purge interiors of clutter and restore their raw emotional power. We approach spaces as living sculptures.`
   * CSS Classes: `arche-lead`
4. **Text Editor Widget (Extended Story):**
   * Text: `We don't buy off-the-shelf. We curate. We partner with local quarry artisans, master carpenters, and avant-garde lighting designers to ensure that every texture, shadow, and joint is custom engineered to resonate with the occupants.`

### Column 2 (Right - 7 Columns):
1. **Spacer Widget:** Height `2rem` (for responsive breathing space).
2. **Image Widget (High-Fashion Studio Portrait):**
   * Image: Upload a high-contrast black-and-white photo of an architectural office or our directors sketching.
   * CSS Classes: `arche-image-wrapper` (adds our premium zoom-on-hover effect).
   * **Border Radius:** `0px` (avoid round styling; luxury is box-cut and structural).

---

## Section 2: The Philosophy Matrix
* **Purpose:** Detail the three core pillars of our interior design house.
* **Layout:** 3-column section. Set background to Obsidian Black (`.arche-dark-section`).
* **Section Spacing:** CSS Class `arche-section-padding`.

To build this philosophy layout, drag a 3-column structure inside Elementor. For each column, we will use our custom CSS tokens to build highly premium structural text blocks.

### Column 1 (Pillar I: Materiality):
1. **Heading Widget (Pillar Number):**
   * Text: `I` (Roman numeral)
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3.5rem`.
2. **Heading Widget (Pillar Title):**
   * Text: `Tactile Materiality`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `We source organic, unprocessed materials that age with dignity. Unpolished travertine, oxidized bronze, raw slate, and porous timber.`

### Column 2 (Pillar II: Proportion):
1. **Heading Widget (Pillar Number):**
   * Text: `II`
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3.5rem`.
2. **Heading Widget (Pillar Title):**
   * Text: `Architectural Proportion`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `Balancing weight, height, and scale to create a fluid, natural flow. Our structures are mathematical, aligning perfectly with human movements.`

### Column 3 (Pillar III: Light):
1. **Heading Widget (Pillar Number):**
   * Text: `III`
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3.5rem`.
2. **Heading Widget (Pillar Title):**
   * Text: `Sculptural Light`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `We treat light as a physical material. By designing shadow plays, skylight captures, and soft indirect glows, we carve spatial mood.`

---

## Section 3: The Artisan Team
* **Purpose:** Introduce the visionaries with high-end, premium hover effects.
* **Layout:** 1-column section, nesting a 3-column inner section. Light background.
* **Section Spacing:** CSS Class `arche-section-padding`.

Standard Elementor team widgets look incredibly generic. Instead, we will construct our team grid using clean HTML inside **HTML Widgets** in each column. This enables premium, custom card reveals where the black-and-white portraits elegantly tint to our brand color, and details slide up cleanly!

### Team Card HTML (Use one in each column):

```html
<div class="arche-luxury-card" style="aspect-ratio: 3/4;">
    <!-- Profile Background Photo -->
    <div class="arche-card-bg" style="background-image: url('https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80'); filter: grayscale(100%);"></div>
    
    <!-- Hover Text Content -->
    <div class="arche-card-content">
        <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.3rem;">Co-Founder & Director</span>
        <h3>Elena Rostova</h3>
        <div class="arche-card-hidden-text">
            Architectural scholar with 14 years shaping minimal high-end residential interiors.
        </div>
    </div>
</div>
```

*(For Columns 2 and 3, simply duplicate the structure and change the background-image URL and texts. For example, use a photo of a male architect for the lead interior designer).*

---

## Section 4: Press Accolades & Publications
* **Purpose:** Social proof and institutional prestige.
* **Layout:** 1-column section. Light beige background (`var(--arche-soft-grey)`).
* **Section Spacing:** `5vw` padding-top/bottom.

### Content (Nested in Column):
1. **Heading Widget (Center Aligned):**
   * Text: `Featured In`
   * CSS Classes: `arche-subtitle-caps`
   * Alignment: Center.
2. **HTML Widget (Minimalist Press Logo Grid):**
   * Paste this clean HTML layout displaying press links (using gorgeous serif typography instead of generic low-quality logos, which looks far more premium and editorial!):
     ```html
     <div style="display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; gap: 40px; margin-top: 1.5rem; opacity: 0.6;">
         <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-style: italic; letter-spacing: -0.02em; font-weight: 300;">Architectural Digest</span>
         <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 400; text-transform: uppercase; letter-spacing: 0.1em;">Elle Decor</span>
         <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 700; font-style: italic; letter-spacing: -0.04em;">FRAME</span>
         <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 300; text-transform: lowercase; letter-spacing: 0.05em;">Wallpaper*</span>
     </div>
     ```
