# Portfolio Page Design Blueprint: STUDIO ARCHE

The Portfolio page is the visual spine of the studio. It must look like a curated index inside a physical high-art book. 

We avoid generic grids and focus heavily on **extreme negative space**, large typographic contrasts, and asymmetrical layouts that allow each project to breathe.

---

## Section 1: The Curated Exhibition Index Header
* **Purpose:** Introduce the masterpieces with editorial authority and high-fashion style.
* **Layout:** 2-column section. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column 1 (Left - 7 Columns):
1. **Heading Widget (Subtitle Caps):**
   * Text: `03 / Works Index`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget (Title):**
   * Text: `Built Monuments of Space & Quietude.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, Large Display, Obsidian Black.

### Column 2 (Right - 5 Columns):
1. **Spacer Widget:** Height `4rem` (visual breathing room).
2. **Text Editor Widget (Curator's Note):**
   * Text: `A retrospective catalog of residential landmarks, retail brand environments, and bespoke modular details sculpted across Europe and Asia between 2018 and 2026.`
   * CSS Classes: `arche-lead`

---

## Section 2: Typographic Filter Navigation
* **Purpose:** Allow prospective clients to sort projects while maintaining strict luxury branding.
* **Layout:** 1-column section, center-aligned. Light background.
* **Section Spacing:** No top padding, `3rem` bottom padding.

### HTML Widget (Minimalist Filter Bar):
Paste this elegant, lightweight inline HTML to create a beautifully styled filter bar (that matches the styling of top-tier design websites):
```html
<div style="display: flex; justify-content: center; gap: 30px; border-top: 1px solid var(--arche-soft-grey); border-bottom: 1px solid var(--arche-soft-grey); padding: 1.5rem 0; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.15em;">
    <a href="#" style="color: var(--arche-obsidian); text-decoration: none; border-bottom: 2px solid var(--arche-champagne); padding-bottom: 5px;">All Projects</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Residential</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Commercial</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Atelier Furniture</a>
</div>
```

---

## Section 3: The Master Asymmetric Staggered Gallery
* **Purpose:** Display our 4 flagship projects with asymmetrical visual weights, forcing the eye to look at each piece in sequence rather than glaze over a uniform grid.
* **Layout:** Staggered 12-column grid using our custom CSS tokens.
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column Setup (Using our CSS Grid Wrapper):
Insert a single **HTML Widget** to deploy our breathtaking, responsive staggered showcase gallery:

```html
<div class="arche-grid-container" style="row-gap: 120px;">
    
    <!-- Project 1: Villa Noir (Geneva, Switzerland) -->
    <!-- Column span: 7 Cols. Left Side -->
    <div class="arche-grid-col-7">
        <div class="arche-image-wrapper" style="aspect-ratio: 16 / 10;">
            <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80" alt="Villa Noir">
        </div>
        <div style="margin-top: 1.8rem; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0;">Villa Noir</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Geneva, Switzerland — Residential</span>
            </div>
            <a href="/portfolio" class="arche-btn-outline" style="padding: 0.8rem 1.8rem; font-size: 0.75rem;">View Commission</a>
        </div>
    </div>

    <!-- Project 2: Atelier Alabaster (Paris, France) -->
    <!-- Column span: 5 Cols. Right Side. Offset Downward by 100px for breathing asymmetry -->
    <div class="arche-grid-col-5 arche-offset-top" style="margin-top: 100px;">
        <div class="arche-image-wrapper" style="aspect-ratio: 3 / 4;">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80" alt="Atelier Alabaster">
        </div>
        <div style="margin-top: 1.8rem;">
            <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0;">Atelier Alabaster</h3>
            <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Paris, France — Bespoke Penthouse</span>
            <div style="margin-top: 1rem;">
                <a href="/portfolio" class="arche-btn-underline">Explore Details</a>
            </div>
        </div>
    </div>

    <!-- Project 3: The Brutalist Sanctuary (Kyoto, Japan) -->
    <!-- Column span: 5 Cols. Left Side -->
    <div class="arche-grid-col-5">
        <div class="arche-image-wrapper" style="aspect-ratio: 3 / 4;">
            <img src="https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=800&q=80" alt="Brutalist Sanctuary">
        </div>
        <div style="margin-top: 1.8rem;">
            <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0;">The Brutalist Sanctuary</h3>
            <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Kyoto, Japan — Tea House & Gardens</span>
            <div style="margin-top: 1rem;">
                <a href="/portfolio" class="arche-btn-underline">Explore Details</a>
            </div>
        </div>
    </div>

    <!-- Project 4: L'horizon Villa (Amalfi Coast, Italy) -->
    <!-- Column span: 7 Cols. Right Side. Offset Downward -->
    <div class="arche-grid-col-7 arche-offset-top" style="margin-top: 80px;">
        <div class="arche-image-wrapper" style="aspect-ratio: 16 / 10;">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80" alt="L'horizon Villa">
        </div>
        <div style="margin-top: 1.8rem; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0;">L'horizon Villa</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Amalfi Coast, Italy — Seafront Estate</span>
            </div>
            <a href="/portfolio" class="arche-btn-outline" style="padding: 0.8rem 1.8rem; font-size: 0.75rem;">View Commission</a>
        </div>
    </div>

</div>
```
