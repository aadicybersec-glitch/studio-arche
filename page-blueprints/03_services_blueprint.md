# Services Page Design Blueprint: STUDIO ARCHE

The Services page details our master capabilities. It should look like an engineering catalog crossed with a premium artistic manifesto. 

To stand out, we avoid generic clip-art icons and instead use architectural typography, professional high-res imagery, and clean CSS layouts.

---

## Section 1: The Spatial Manifesto Header
* **Purpose:** Set the tone of premium craftsmanship and spatial mastery.
* **Layout:** 1-column section, centered layout. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Content Widgets (Nested in Column):
1. **Heading Widget (Subtitle Caps):**
   * Text: `02 / Capabilities`
   * CSS Classes: `arche-subtitle-caps`
   * Alignment: Center.
2. **Heading Widget (Title):**
   * Text: `Sculpting Space into Functional Poetry.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, White.
   * Alignment: Center.
3. **Text Editor Widget (Lead Paragraph):**
   * Text: `We operate at the intersection of architecture, interior styling, and structural engineering. Our services are fully bespoke, providing comprehensive design, drafting, procurement, and physical execution.`
   * CSS Classes: `arche-lead`
   * Alignment: Center.

---

## Section 2: The Architectural Capabilities Matrix
* **Purpose:** Present our 7 premium services in a visually impressive staggered grid using our custom CSS variables.
* **Layout:** Multi-column section using our custom CSS columns to prevent standard Elementor grid boredom.
* **Section Spacing:** CSS Class `arche-section-padding`.

We will construct this layout by inserting a series of beautiful bespoke grids. For each service card, we use clean CSS markup inside an **HTML Widget**. This ensures a layout that looks like a high-budget custom-coded site rather than a basic drag-and-drop template.

### Service Matrix CSS/HTML Markup (Duplicate and customize across the columns):

```html
<div class="arche-grid-container" style="row-gap: 50px;">
    <!-- Service 1: Residential Masterpieces -->
    <div class="arche-grid-col-6">
        <div class="arche-image-wrapper" style="aspect-ratio: 16/10;">
            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1000&q=80" alt="Residential Interiors">
        </div>
        <div style="margin-top: 1.5rem; padding-right: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px solid var(--arche-soft-grey); padding-bottom: 0.5rem; margin-bottom: 1rem;">
                <h3 style="font-size: 1.8rem; margin: 0;">Residential Architecture</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.6rem; color: var(--arche-champagne); margin: 0;">01 / Scope</span>
            </div>
            <p style="color: var(--arche-text-dark); font-weight: 300; font-size: 0.95rem;">Full-scale interior architecture for luxury penthouses, custom villas, and private estates. Includes spatial planning, lighting layout, and electrical mapping.</p>
            <div style="font-family: 'Syne', sans-serif; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--arche-text-muted); display: flex; gap: 20px; margin-top: 1rem;">
                <span>Type: Full-scale</span>
                <span>Timeframe: 16-24 weeks</span>
            </div>
        </div>
    </div>

    <!-- Service 2: Commercial & Retail Spaces -->
    <div class="arche-grid-col-6">
        <div class="arche-image-wrapper" style="aspect-ratio: 16/10;">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1000&q=80" alt="Commercial Interiors">
        </div>
        <div style="margin-top: 1.5rem; padding-right: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px solid var(--arche-soft-grey); padding-bottom: 0.5rem; margin-bottom: 1rem;">
                <h3 style="font-size: 1.8rem; margin: 0;">Commercial & Retail</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.6rem; color: var(--arche-champagne); margin: 0;">02 / Scope</span>
            </div>
            <p style="color: var(--arche-text-dark); font-weight: 300; font-size: 0.95rem;">High-end commercial spaces, luxury boutiques, art galleries, and workspace studios designed to curate user experience and reflect corporate brand identity.</p>
            <div style="font-family: 'Syne', sans-serif; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--arche-text-muted); display: flex; gap: 20px; margin-top: 1rem;">
                <span>Type: Brand Environments</span>
                <span>Timeframe: Variable</span>
            </div>
        </div>
    </div>

    <!-- Service 3: Modular Architectural Kitchens -->
    <div class="arche-grid-col-4">
        <div class="arche-image-wrapper" style="aspect-ratio: 4/5;">
            <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Modular Kitchen">
        </div>
        <div style="margin-top: 1.2rem;">
            <h3 style="font-size: 1.5rem; margin: 0 0 0.5rem 0;">Bespoke Kitchens</h3>
            <p style="color: var(--arche-text-muted); font-size: 0.9rem; font-weight: 300;">Ergonomic German-engineered modular fittings integrated seamlessly with marble slabs and custom hidden cabinetry.</p>
            <span class="arche-subtitle-caps" style="font-size: 0.6rem; margin-top: 0.8rem;">03 / System</span>
        </div>
    </div>

    <!-- Service 4: 3D Visualization & VR BIM -->
    <div class="arche-grid-col-4">
        <div class="arche-image-wrapper" style="aspect-ratio: 4/5;">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="3D Visualization">
        </div>
        <div style="margin-top: 1.2rem;">
            <h3 style="font-size: 1.5rem; margin: 0 0 0.5rem 0;">3D Renderings & BIM</h3>
            <p style="color: var(--arche-text-muted); font-size: 0.9rem; font-weight: 300;">Photorealistic path-traced rendering walkthroughs and BIM blueprints so you can experience your volume before break-ground.</p>
            <span class="arche-subtitle-caps" style="font-size: 0.6rem; margin-top: 0.8rem;">04 / BIM</span>
        </div>
    </div>

    <!-- Service 5: Custom Furniture & Lighting -->
    <div class="arche-grid-col-4">
        <div class="arche-image-wrapper" style="aspect-ratio: 4/5;">
            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=800&q=80" alt="Custom Furniture">
        </div>
        <div style="margin-top: 1.2rem;">
            <h3 style="font-size: 1.5rem; margin: 0 0 0.5rem 0;">Artisan Furniture</h3>
            <p style="color: var(--arche-text-muted); font-size: 0.9rem; font-weight: 300;">Sartorial chairs, bespoke dining slabs, and structural light fixtures drawn in-house and hand-forged by master carpenters.</p>
            <span class="arche-subtitle-caps" style="font-size: 0.6rem; margin-top: 0.8rem;">05 / Atelier</span>
        </div>
    </div>
</div>
```

---

## Section 3: High-End Service Accordion (FAQS)
* **Purpose:** Answer key questions about commissions and timelines while maintaining clean visual aesthetics.
* **Layout:** 2-column section. Set background to Obsidian Black (`.arche-dark-section`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column 1 (Left - 4 Columns):
1. **Heading Widget (Subtitle Caps):**
   * Text: `04 / Execution FAQ`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget:**
   * Text: `Resolving our blueprint parameters.`
   * HTML Tag: `h2`
   * Typography: Cormorant Garamond, White.

### Column 2 (Right - 8 Columns):
Instead of standard clunky accordions, use the **Elementor Accordion Widget**, but customize its styles under **Style**:
1. **Title Styles:**
   * Color: `#FFFFFF`
   * Active Color: `var(--arche-champagne)` (`#C5A880`)
   * Typography: Cormorant Garamond, `20px` size, `400` weight.
2. **Content Styles:**
   * Color: `#8E8C87`
   * Background: Transparent.
   * Border: None.
   * Typography: Inter, `15px` size, `300` weight.
3. **FAQ Questions to Populate:**
   * *What is your average project lead time?* 
     Typically, a full-scale residential commission requires 16 to 24 weeks from site analysis to spatial reveal.
   * *Do you handle contracting and procurement?* 
     Yes, we operate as a full-service turnkey agency. We procure the custom marble slabs, manage architectural contractors, and curate on-site assembly.
   * *Can you work with client-specified architects?* 
     Absolutely. We regularly coordinate with executive architects and structural engineers to ensure interior skeletons coordinate perfectly with the exterior envelope.
