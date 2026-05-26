# Contact Page Design Blueprint: STUDIO ARCHE

The Contact page handles spatial commissions. It should feel like writing an inquiry to a high-end luxury fashion atelier. 

We avoid thick, chunky text boxes and instead use minimalist, clean horizontal lines that expand when focused, paired with a customized dark map.

---

## Section 1: The Commission Desk Header
* **Purpose:** Initiate commissions with typographic and spatial authority.
* **Layout:** 2-column section. Light background (`var(--arche-alabaster)`).
* **Section Spacing:** CSS Class `arche-section-padding`.

### Column 1 (Left - 5 Columns):
1. **Heading Widget (Subtitle Caps):**
   * Text: `05 / Initiate Commission`
   * CSS Classes: `arche-subtitle-caps`
2. **Heading Widget (Title):**
   * Text: `Let us craft your space.`
   * HTML Tag: `h1`
   * Typography: Cormorant Garamond, Large Display, Obsidian Black.
3. **Text Editor Widget (Extended Directions):**
   * Text: `We accept a limited number of residential and commercial commissions annually. Please outline your physical site coordinates, project scope, and aesthetic ambitions, and our directors will initiate contact.`

### Column 2 (Right - 7 Columns):
We will build our minimalist, architectural form using our custom `.arche-form` CSS classes enqueued in our child theme.

If using **WPForms** or **Contact Form 7**, you can enclover the form in a wrapper. If you want a perfectly styled custom form immediately without configuring visual plugins, add an **HTML Widget** and paste this clean, robust HTML form (which submits directly to your WP system or forwards via email):

```html
<div class="arche-form" style="margin-top: 2rem;">
    <form action="#" method="POST" id="arche-commission-form">
        <div style="display: flex; gap: 30px; margin-bottom: 2rem;">
            <div style="flex: 1;">
                <label class="arche-subtitle-caps" style="font-size: 0.6rem; display: block; margin-bottom: 5px;">01 / Full Name</label>
                <input type="text" name="client_name" placeholder="E.g., Julian Vane" required>
            </div>
            <div style="flex: 1;">
                <label class="arche-subtitle-caps" style="font-size: 0.6rem; display: block; margin-bottom: 5px;">02 / Email Address</label>
                <input type="email" name="client_email" placeholder="E.g., julian@vane.com" required>
            </div>
        </div>
        
        <div style="display: flex; gap: 30px; margin-bottom: 2rem;">
            <div style="flex: 1;">
                <label class="arche-subtitle-caps" style="font-size: 0.6rem; display: block; margin-bottom: 5px;">03 / Project Typology</label>
                <input type="text" name="project_type" placeholder="E.g., Private Villa / Boutique Retail">
            </div>
            <div style="flex: 1;">
                <label class="arche-subtitle-caps" style="font-size: 0.6rem; display: block; margin-bottom: 5px;">04 / Site Location</label>
                <input type="text" name="project_location" placeholder="E.g., Geneva, Switzerland">
            </div>
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label class="arche-subtitle-caps" style="font-size: 0.6rem; display: block; margin-bottom: 5px;">05 / Spatial Ambitions</label>
            <textarea name="spatial_description" placeholder="Describe the physical dimensions and emotional tone of the volume..." required></textarea>
        </div>

        <div>
            <button type="submit" class="arche-btn-outline" style="border-color: var(--arche-obsidian); padding: 1.2rem 3rem;">
                Submit Commission Inquiry
            </button>
        </div>
    </form>
</div>
```

---

## Section 2: Global Studio Coordinates
* **Purpose:** Showcase physical global presence (Geneva, Paris, Tokyo).
* **Layout:** 3-column section. Set background to Obsidian Black (`.arche-dark-section`).
* **Section Spacing:** CSS Class `arche-section-padding`.

Drag a 3-column inner section and input these coordinates:

### Column 1 (Geneva Office):
1. **Heading Widget (Office Number):**
   * Text: `01`
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3rem`.
2. **Heading Widget (Office Name):**
   * Text: `Atelier Geneva`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `Rue du Rhône 14,<br>1204 Geneva, Switzerland<br>geneva@studioarche.com`

### Column 2 (Paris Office):
1. **Heading Widget (Office Number):**
   * Text: `02`
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3rem`.
2. **Heading Widget (Office Name):**
   * Text: `Atelier Paris`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `Rue Saint-Honoré 213,<br>75001 Paris, France<br>paris@studioarche.com`

### Column 3 (Tokyo Office):
1. **Heading Widget (Office Number):**
   * Text: `03`
   * Typography: Cormorant Garamond, `C5A880` (Champagne Gold), set font-size to `3rem`.
2. **Heading Widget (Office Name):**
   * Text: `Atelier Tokyo`
   * HTML Tag: `h3`
   * Typography: Cormorant Garamond, White.
3. **Text Editor Widget:**
   * Text: `Minami-Aoyama 5-Chome,<br>Minato-ku, Tokyo, Japan<br>tokyo@studioarche.com`

---

## Section 3: The Cinematic Dark Map
* **Purpose:** Visual localization showing professional precision, styled to maintain high-contrast dark aesthetics.
* **Layout:** 1-column section, full-width.

Standard colorful Google maps ruin a luxury minimal site. We can achieve a stunning, architectural blueprint feel using CSS image filters!

### Elementor setup:
1. Add an **HTML Widget** or a **Google Maps Widget** in a 1-column section.
2. In the widget settings, paste the following iframe (which includes an **embedded CSS filter** that desaturates and inverts colors to match our charcoal branding perfectly!):

```html
<div class="arche-map-wrapper" style="width: 100%; height: 450px; overflow: hidden; filter: grayscale(100%) invert(90%) contrast(120%); -webkit-filter: grayscale(100%) invert(90%) contrast(120%);">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.309322232986!2d6.142220315579998!3d46.20439067911685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d852a4073d%3A0x6bd6c747863bf724!2sRue%20du%20Rh%C3%B4ne%2014%2C%201204%20Gen%C3%A8ve%2C%20Switzerland!5e0!3m2!1sen!2sus!4v1655000000000!5m2!1sen!2sus" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
```
