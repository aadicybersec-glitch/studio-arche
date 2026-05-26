# Testimonials Page Design Blueprint: STUDIO ARCHE

The Testimonials page showcases the lived experience of our architecture. 

To maintain our high-end luxury aesthetic, we avoid loud, bright yellow five-star review widgets. Instead, we use elegant typographic quotes, wide padding, and clean layout grids that convey institutional trust.

---

## Section 1: The Anthological Trust Header
* **Purpose:** Introduce client experiences as curated memoirs.
* **Layout:** 1-column section, centered layout. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Content Widgets (Nested in Column):
1. **Heading Widget (Subtitle Caps):**
   * Text: `04 / Patron Testimonies`
   * CSS Classes: `arche-subtitle-caps`
   * Alignment: Center.
2. **Heading Widget (Title):**
   * Text: `Inhabited Silence.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, White.
   * Alignment: Center.
3. **Text Editor Widget (Lead Paragraph):**
   * Text: `Space is not complete until it is lived in. Read the reflections of our patrons who inhabit the sanctuaries we have carved, ranging from private estate collectors to commercial retail innovators.`
   * CSS Classes: `arche-lead`
   * Alignment: Center.

---

## Section 2: The Patron Memoir Grid
* **Purpose:** Display client reviews in an exquisite staggered layout that feels premium.
* **Layout:** 2-column asymmetric grid container utilizing our custom CSS styles.
* **Section Spacing:** CSS Class `arche-section-padding`.

We will construct this layout by inserting a series of testimonial blocks. For each block, we use clean CSS markup inside an **HTML Widget**. This ensures a layout that looks like a high-budget custom-coded site rather than a basic template.

### Testimonial Card HTML (Duplicate and customize across the columns):

```html
<div class="arche-grid-container" style="row-gap: 40px;">
    
    <!-- Testimonial 1: Villa Noir Client -->
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <!-- Clean, Muted Champagne Stars -->
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">Studio Arche did not just design a house; they shaped a frame for my life. Waking up in Villa Noir and watching the sunrise interact with the raw stone walls is an emotional experience. Their restraint is pure genius.</p>
            </div>
            
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <!-- Typographic Initials Circle (Much cleaner than low-quality customer photos!) -->
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">
                    SR
                </div>
                <div class="arche-author-info">
                    <h4>Stephan & Renée</h4>
                    <p>Patrons, Villa Noir Geneva</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial 2: Retail Boutique Director -->
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">For our Parisian retail salon, we wanted a space that felt like an art gallery rather than a shop. Studio Arche crafted an environment of absolute luxury. Our foot traffic and brand prestige have soared.</p>
            </div>
            
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">
                    ML
                </div>
                <div class="arche-author-info">
                    <h4>Marc Laurent</h4>
                    <p>Creative Director, Maison Noir Paris</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial 3: Penthouse Owner (Kyoto) -->
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">Their attention to detail is staggering. The way the custom bronze joints in the kitchen cabinets slide shut silently is a testament to their obsession with engineering. Absolutely flawless execution.</p>
            </div>
            
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">
                    TK
                </div>
                <div class="arche-author-info">
                    <h4>Takeshi K.</h4>
                    <p>Owner, Brutalist Sanctuary Kyoto</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial 4: Amalfi Villa Patron -->
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">The coordination across international borders was seamless. Studio Arche managed the Italian quarry procurement directly, taking a massive weight off our shoulders. The villa is a masterwork.</p>
            </div>
            
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">
                    AD
                </div>
                <div class="arche-author-info">
                    <h4>Alessia D.</h4>
                    <p>Patron, L'horizon Villa Amalfi</p>
                </div>
            </div>
        </div>
    </div>

</div>
```
