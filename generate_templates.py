import json
import os
import uuid

# Helper to generate unique Elementor IDs
def gen_id():
    return str(uuid.uuid4())[:8]

# Helper to build a standard Elementor flex container
def make_container(direction="column", justify="flex-start", align="stretch", css_class="", bg_type="", bg_color="", bg_img="", padding=None):
    container_id = gen_id()
    settings = {
        "content_width": "full",
        "flex_direction": direction,
        "flex_justify_content": justify,
        "flex_align_items": align,
    }
    
    if css_class:
        settings["css_classes"] = css_class
        
    if bg_type == "classic":
        settings["background_background"] = "classic"
        if bg_color:
            settings["background_color"] = bg_color
        if bg_img:
            settings["background_image"] = {
                "url": bg_img,
                "id": "",
                "source": "external"
            }
            settings["background_position"] = "center center"
            settings["background_repeat"] = "no-repeat"
            settings["background_size"] = "cover"
            
    if padding:
        settings["padding"] = padding
        settings["padding_tablet"] = padding
        settings["padding_mobile"] = padding
        
    return {
        "id": container_id,
        "elType": "container",
        "settings": settings,
        "elements": []
    }

# Helper to build standard Elementor widgets
def make_heading(text, tag="h2", align="left", css_class=""):
    settings = {
        "title": text,
        "header_size": tag,
        "align": align
    }
    if css_class:
        settings["css_classes"] = css_class
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "heading",
        "settings": settings,
        "elements": []
    }

def make_text(text, css_class=""):
    settings = {
        "editor": text
    }
    if css_class:
        settings["css_classes"] = css_class
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "text-editor",
        "settings": settings,
        "elements": []
    }

def make_spacer(height="50px"):
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "spacer",
        "settings": {
            "space": {
                "unit": "px",
                "size": int(height.replace("px", "").replace("vh", ""))
            }
        },
        "elements": []
    }

def make_html(code):
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "html",
        "settings": {
            "html": code
        },
        "elements": []
    }

# Ensure output directory exists
templates_dir = "elementor-templates"
if not os.path.exists(templates_dir):
    os.makedirs(templates_dir)

# ==========================================================================
# 1. GENERATE HOME TEMPLATE
# ==========================================================================
home_template = {
    "title": "Studio Arche Home",
    "type": "page",
    "content": []
}

# Section 1: Hero
hero = make_container(justify="center", align="center", bg_type="classic", bg_color="#0F0F0F", bg_img="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1920&q=80")
# Add a custom semi-transparent overlay in settings
hero["settings"]["background_overlay_background"] = "classic"
hero["settings"]["background_overlay_color"] = "#0F0F0F"
hero["settings"]["background_overlay_opacity"] = {"unit": "px", "size": 0.55}
hero["settings"]["min_height"] = {"unit": "vh", "size": 100}

hero_inner = make_container(justify="center", align="center")
hero_inner["elements"].append(make_heading("Minimal Architecture & Luxury Interiors", "span", "center", "arche-subtitle-caps"))
hero_inner["elements"].append(make_heading("Sculpting Space,<br>Light & Silence.", "h1", "center", "arche-reveal-text"))
hero_inner["elements"].append(make_html('''
<div style="display: flex; gap: 20px; justify-content: center; margin-top: 2.5rem;">
    <a href="/portfolio" class="arche-btn-outline" style="color: #FFFFFF; border-color: #FFFFFF;">Explore Works</a>
    <a href="/contact" class="arche-btn-underline" style="color: #FFFFFF;">Get in Touch</a>
</div>
'''))

hero["elements"].append(hero_inner)
home_template["content"].append(hero)

# Section 2: Narrative & Stats
narrative_section = make_container(direction="row", css_class="arche-section-padding")
# Left Column
left_col = make_container(align="flex-start")
left_col["settings"]["width"] = {"unit": "%", "size": 55}
left_col["elements"].append(make_heading("01 / Design Philosophy", "span", "left", "arche-subtitle-caps"))
left_col["elements"].append(make_heading("We design spaces that breathe, speaking in details rather than noise.", "h2", "left", "arche-reveal-text"))
left_col["elements"].append(make_text("At Studio Arche, we believe that luxury lies in restraint. By balancing monolithic forms with natural materials and architectural lighting, we construct physical frames for silence and peace.", "arche-lead arche-reveal-text"))

# Right Column
right_col = make_container(align="stretch")
right_col["settings"]["width"] = {"unit": "%", "size": 40}
right_col["elements"].append(make_html('''
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
'''))

narrative_section["elements"].extend([left_col, right_col])
home_template["content"].append(narrative_section)

# Section 3: Before-After Image Slider
ba_section = make_container(css_class="arche-section-padding")
ba_section["elements"].append(make_heading("02 / Spatial Transformations", "span", "center", "arche-subtitle-caps"))
ba_section["elements"].append(make_html('''
<div class="arche-before-after-container" id="arche-slider-1" style="max-width: 1100px; margin: 0 auto;">
    <div class="arche-ba-image arche-ba-after" id="ba-after-img" style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&q=80');">
        <div class="arche-ba-label arche-ba-after-label">After: Atelier Penthouse</div>
    </div>
    <div class="arche-ba-image arche-ba-before" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1600&q=80');">
        <div class="arche-ba-label arche-ba-before-label">Before: Skeletal Concrete</div>
    </div>
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
        if (position < 0) position = 0;
        if (position > 100) position = 100;
        afterImage.style.clipPath = `polygon(0 0, ${position}% 0, ${position}% 100%, 0 100%)`;
        handle.style.left = `${position}%`;
    }

    container.addEventListener("mousedown", (e) => {
        isDragging = true;
        moveSlider(e.clientX);
    });
    window.addEventListener("mouseup", () => isDragging = False);
    window.addEventListener("mousemove", (e) => { if (isDragging) moveSlider(e.clientX); });

    container.addEventListener("touchstart", (e) => {
        isDragging = true;
        moveSlider(e.touches[0].clientX);
    });
    window.addEventListener("touchend", () => isDragging = False);
    window.addEventListener("touchmove", (e) => { if (isDragging) moveSlider(e.touches[0].clientX); });
});
</script>
'''))
home_template["content"].append(ba_section)

# Section 4: Asymmetric Portfolio Grid
portfolio_section = make_container(css_class="arche-section-padding")
portfolio_section["elements"].append(make_heading("03 / Curated Index", "span", "center", "arche-subtitle-caps"))
portfolio_section["elements"].append(make_html('''
<div class="arche-grid-container">
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
'''))
home_template["content"].append(portfolio_section)

# Section 5: Process Timeline
process_section = make_container(direction="row", css_class="arche-section-padding arche-dark-section")
# Left
p_left = make_container(align="flex-start")
p_left["settings"]["width"] = {"unit": "%", "size": 40}
p_left["elements"].append(make_heading("04 / Our Method", "span", "left", "arche-subtitle-caps"))
p_left["elements"].append(make_heading("A structured journey toward silence.", "h2", "left", "arche-reveal-text"))
# Right
p_right = make_container()
p_right["settings"]["width"] = {"unit": "%", "size": 55}
p_right["elements"].append(make_html('''
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
        <h3 style="color: #FFFFFF; font-size: 1.6rem; margin: 0 0 0.5rem 0;">Materiality & Palette Curation</h3>
        <p style="color: #8E8C87; margin: 0;">Sourcing tactile specimens—calacatta marble, brushed bronze, raw oak, and hand-woven bouclé textiles.</p>
    </div>
    <div class="arche-process-item">
        <div class="arche-process-step"></div>
        <span class="arche-process-number">Phase 03</span>
        <h3 style="color: #FFFFFF; font-size: 1.6rem; margin: 0 0 0.5rem 0;">Sartorial Realization</h3>
        <p style="color: #8E8C87; margin: 0;">Physical execution, artisan assembly, and spatial curation, resulting in your premium finished sanctuary.</p>
    </div>
</div>
'''))
process_section["elements"].extend([p_left, p_right])
home_template["content"].append(process_section)

# Section 6: Dark CTA
cta_section = make_container(justify="center", align="center", css_class="arche-section-padding arche-dark-section")
cta_section["elements"].append(make_heading("Let us carve your sanctuary.", "h2", "center", "arche-reveal-text"))
cta_section["elements"].append(make_html('''
<div style="display: flex; justify-content: center; margin-top: 2rem;">
    <a href="/contact" class="arche-btn-outline" style="color: #FFFFFF; border-color: #EAE3D8; padding: 1.2rem 3rem;">Initiate Commission</a>
</div>
'''))
home_template["content"].append(cta_section)

with open(os.path.join(templates_dir, "home-template.json"), "w") as f:
    json.dump(home_template, f, indent=2)

# ==========================================================================
# 2. GENERATE ABOUT TEMPLATE
# ==========================================================================
about_template = {
    "title": "Studio Arche About",
    "type": "page",
    "content": []
}

about_hero = make_container(direction="row", css_class="arche-section-padding")
ab_left = make_container(align="flex-start")
ab_left["settings"]["width"] = {"unit": "%", "size": 45}
ab_left["elements"].append(make_heading("01 / Creative Directors", "span", "left", "arche-subtitle-caps"))
ab_left["elements"].append(make_heading("Crafting spatial silence since 2014.", "h1", "left", "arche-reveal-text"))
ab_left["elements"].append(make_text("Founded by architectural visionaries, Studio Arche was born out of a desire to purge interiors of clutter and restore their raw emotional power. We approach spaces as living sculptures.", "arche-lead arche-reveal-text"))
ab_left["elements"].append(make_text("We don't buy off-the-shelf. We curate. We partner with local quarry artisans, master carpenters, and avant-garde lighting designers to ensure that every texture, shadow, and joint is custom engineered to resonate with the occupants."))

ab_right = make_container(align="center", justify="center")
ab_right["settings"]["width"] = {"unit": "%", "size": 50}
ab_right["elements"].append(make_html('''
<div class="arche-image-wrapper" style="aspect-ratio: 4/5; width: 100%;">
    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1000&q=80" alt="Studio Drawing" style="border-radius: 0px;">
</div>
'''))
about_hero["elements"].extend([ab_left, ab_right])
about_template["content"].append(about_hero)

# Philosophy Matrix
phil_section = make_container(direction="row", css_class="arche-section-padding arche-dark-section")
for num, title, desc in [("I", "Tactile Materiality", "We source organic, unprocessed materials that age with dignity. Unpolished travertine, oxidized bronze, raw slate, and porous timber."),
                         ("II", "Architectural Proportion", "Balancing weight, height, and scale to create a fluid, natural flow. Our structures are mathematical, aligning perfectly with human movements."),
                         ("III", "Sculptural Light", "We treat light as a physical material. By designing shadow plays, skylight captures, and soft indirect glows, we carve spatial mood.")]:
    col = make_container(align="flex-start")
    col["settings"]["width"] = {"unit": "%", "size": 30}
    col["elements"].append(make_heading(num, "h2", "left"))
    # Apply raw gold styling to numerals enqueued
    col["elements"][-1]["settings"]["title"] = f'<span style="color: var(--arche-champagne); font-size: 3.5rem;">{num}</span>'
    col["elements"].append(make_heading(title, "h3", "left"))
    col["elements"].append(make_text(desc))
    phil_section["elements"].append(col)
about_template["content"].append(phil_section)

# Team Cards Section
team_section = make_container(css_class="arche-section-padding")
team_section["elements"].append(make_heading("02 / The Guild", "span", "center", "arche-subtitle-caps"))
team_section["elements"].append(make_heading("Our Spatial Visionaries", "h2", "center", "arche-reveal-text"))
team_section["elements"].append(make_html('''
<div class="arche-grid-container" style="margin-top: 3rem;">
    <div class="arche-grid-col-4">
        <div class="arche-luxury-card">
            <div class="arche-card-bg" style="background-image: url('https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80'); filter: grayscale(100%);"></div>
            <div class="arche-card-content">
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.3rem;">Co-Founder & Director</span>
                <h3>Elena Rostova</h3>
                <div class="arche-card-hidden-text">Architectural scholar with 14 years shaping minimal high-end residential interiors.</div>
            </div>
        </div>
    </div>
    <div class="arche-grid-col-4">
        <div class="arche-luxury-card">
            <div class="arche-card-bg" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80'); filter: grayscale(100%);"></div>
            <div class="arche-card-content">
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.3rem;">Lead Architect</span>
                <h3>Julian Vane</h3>
                <div class="arche-card-hidden-text">Bespoke spatial strategist specializing in concrete-timber structural integration.</div>
            </div>
        </div>
    </div>
    <div class="arche-grid-col-4">
        <div class="arche-luxury-card">
            <div class="arche-card-bg" style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=800&q=80'); filter: grayscale(100%);"></div>
            <div class="arche-card-content">
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; margin-bottom: 0.3rem;">Lighting Designer</span>
                <h3>Anya Thorne</h3>
                <div class="arche-card-hidden-text">Master of lumens and shadow structures. Formulating custom spatial mood guides.</div>
            </div>
        </div>
    </div>
</div>
'''))
about_template["content"].append(team_section)

# Press
press_section = make_container(css_class="arche-section-padding", bg_type="classic", bg_color="#EAE3D8")
press_section["elements"].append(make_heading("Featured In", "span", "center", "arche-subtitle-caps"))
press_section["elements"].append(make_html('''
<div style="display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; gap: 40px; margin-top: 1.5rem; opacity: 0.6;">
    <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-style: italic; letter-spacing: -0.02em; font-weight: 300; color: #0F0F0F;">Architectural Digest</span>
    <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 400; text-transform: uppercase; letter-spacing: 0.1em; color: #0F0F0F;">Elle Decor</span>
    <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 700; font-style: italic; letter-spacing: -0.04em; color: #0F0F0F;">FRAME</span>
    <span style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 300; text-transform: lowercase; letter-spacing: 0.05em; color: #0F0F0F;">Wallpaper*</span>
</div>
'''))
about_template["content"].append(press_section)

with open(os.path.join(templates_dir, "about-template.json"), "w") as f:
    json.dump(about_template, f, indent=2)

# ==========================================================================
# 3. GENERATE SERVICES TEMPLATE
# ==========================================================================
services_template = {
    "title": "Studio Arche Services",
    "type": "page",
    "content": []
}

services_hero = make_container(css_class="arche-section-padding")
services_hero["elements"].append(make_heading("02 / Capabilities", "span", "center", "arche-subtitle-caps"))
services_hero["elements"].append(make_heading("Sculpting Space into Functional Poetry.", "h1", "center", "arche-reveal-text"))
services_hero["elements"].append(make_text("We operate at the intersection of architecture, interior styling, and structural engineering. Our services are fully bespoke, providing comprehensive design, drafting, procurement, and physical execution.", "arche-lead arche-reveal-text"))
# Force centered lead paragraph style
services_hero["elements"][-1]["settings"]["align"] = "center"
services_template["content"].append(services_hero)

services_matrix = make_container(css_class="arche-section-padding")
services_matrix["elements"].append(make_html('''
<div class="arche-grid-container" style="row-gap: 50px;">
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
'''))
services_template["content"].append(services_matrix)

# FAQS Accordion Section
faq_section = make_container(direction="row", css_class="arche-section-padding arche-dark-section")
fq_left = make_container(align="flex-start")
fq_left["settings"]["width"] = {"unit": "%", "size": 35}
fq_left["elements"].append(make_heading("04 / Execution FAQ", "span", "left", "arche-subtitle-caps"))
fq_left["elements"].append(make_heading("Resolving our blueprint parameters.", "h2", "left", "arche-reveal-text"))

fq_right = make_container()
fq_right["settings"]["width"] = {"unit": "%", "size": 60}
# We use standard Elementor accordion options
fq_right["elements"].append({
    "id": gen_id(),
    "elType": "widget",
    "widgetType": "accordion",
    "settings": {
        "tabs": [
            {
                "tab_title": "What is your average project lead time?",
                "tab_content": "Typically, a full-scale residential commission requires 16 to 24 weeks from site analysis to spatial reveal."
            },
            {
                "tab_title": "Do you handle contracting and procurement?",
                "tab_content": "Yes, we operate as a full-service turnkey agency. We procure the custom marble slabs, manage architectural contractors, and curate on-site assembly."
            },
            {
                "tab_title": "Can you work with client-specified architects?",
                "tab_content": "Absolutely. We regularly coordinate with executive architects and structural engineers to ensure interior skeletons coordinate perfectly with the exterior envelope."
            }
        ],
        "title_html_tag": "h4",
    },
    "elements": []
})
faq_section["elements"].extend([fq_left, fq_right])
services_template["content"].append(faq_section)

with open(os.path.join(templates_dir, "services-template.json"), "w") as f:
    json.dump(services_template, f, indent=2)

# ==========================================================================
# 4. GENERATE PORTFOLIO TEMPLATE
# ==========================================================================
portfolio_template = {
    "title": "Studio Arche Portfolio",
    "type": "page",
    "content": []
}

port_hero = make_container(direction="row", css_class="arche-section-padding")
ph_left = make_container(align="flex-start")
ph_left["settings"]["width"] = {"unit": "%", "size": 55}
ph_left["elements"].append(make_heading("03 / Works Index", "span", "left", "arche-subtitle-caps"))
ph_left["elements"].append(make_heading("Built Monuments of Space & Quietude.", "h1", "left", "arche-reveal-text"))

ph_right = make_container()
ph_right["settings"]["width"] = {"unit": "%", "size": 40}
ph_right["elements"].append(make_spacer("40px"))
ph_right["elements"].append(make_text("A retrospective catalog of residential landmarks, retail brand environments, and bespoke modular details sculpted across Europe and Asia between 2018 and 2026.", "arche-lead"))
port_hero["elements"].extend([ph_left, ph_right])
portfolio_template["content"].append(port_hero)

# Filtering UI
filter_sec = make_container()
filter_sec["elements"].append(make_html('''
<div style="display: flex; justify-content: center; gap: 30px; border-top: 1px solid var(--arche-soft-grey); border-bottom: 1px solid var(--arche-soft-grey); padding: 1.5rem 0; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.15em;">
    <a href="#" style="color: var(--arche-obsidian); text-decoration: none; border-bottom: 2px solid var(--arche-champagne); padding-bottom: 5px;">All Projects</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Residential</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Commercial</a>
    <a href="#" style="color: var(--arche-text-muted); text-decoration: none; padding-bottom: 5px; transition: color 0.3s;" onmouseover="this.style.color='var(--arche-obsidian)'" onmouseout="this.style.color='var(--arche-text-muted)'">Atelier Furniture</a>
</div>
'''))
portfolio_template["content"].append(filter_sec)

# Staggered Gallery Grid Upgraded to Horizontal Pinned Slider
gallery_sec = make_container()
gallery_sec["elements"].append(make_html('''
<div class="arche-horizontal-scroll-sec">
    <div class="arche-pin-wrap">
        
        <!-- Slide 1: Introduction Title -->
        <div class="arche-horizontal-item" style="width: 45vw; max-width: 450px; flex-shrink: 0; margin-right: 12vw;">
            <span class="arche-subtitle-caps" style="color: var(--arche-champagne);">03 / Works Gallery</span>
            <h2 class="arche-reveal-text" style="font-size: clamp(3.5rem, 6vw, 6rem); font-weight: 300; margin: 1rem 0 2rem 0; color: #FFFFFF; font-family: 'Cormorant Garamond', serif; line-height: 1.1;">Monuments of Silence.</h2>
            <p style="color: var(--arche-text-muted); font-size: 1.15rem; line-height: 1.7; font-weight: 300; font-family: 'Plus Jakarta Sans', sans-serif;">Scroll vertically to sweep horizontally across our flagships—penthouse projects and seafront estates constructed across Europe and Asia.</p>
        </div>

        <!-- Slide 2: Villa Noir (Geneva, Switzerland) -->
        <div class="arche-horizontal-item" style="width: 75vw; max-width: 800px; flex-shrink: 0; margin-right: 12vw;">
            <div class="arche-image-wrapper" style="aspect-ratio: 16 / 10; width: 100%;">
                <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80" alt="Villa Noir" style="width: 100%; object-fit: cover;">
            </div>
            <div style="margin-top: 1.8rem; display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0; color: #FFFFFF; font-family: 'Cormorant Garamond', serif; font-weight: 300;">Villa Noir</h3>
                    <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Geneva, Switzerland — Residential</span>
                </div>
                <a href="/portfolio" class="arche-btn-outline" style="color: #FFFFFF; border-color: rgba(255, 255, 255, 0.2); padding: 0.8rem 1.8rem; font-size: 0.75rem;">View Commission</a>
            </div>
        </div>

        <!-- Slide 3: Atelier Alabaster (Paris, France) -->
        <div class="arche-horizontal-item" style="width: 55vw; max-width: 600px; flex-shrink: 0; margin-right: 12vw;">
            <div class="arche-image-wrapper" style="aspect-ratio: 3 / 4; width: 100%;">
                <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80" alt="Atelier Alabaster" style="width: 100%; object-fit: cover;">
            </div>
            <div style="margin-top: 1.8rem; color: #FFFFFF;">
                <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0; color: #FFFFFF; font-family: 'Cormorant Garamond', serif; font-weight: 300;">Atelier Alabaster</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Paris, France — Bespoke Penthouse</span>
                <div style="margin-top: 1rem;">
                    <a href="/portfolio" class="arche-btn-underline" style="color: #FFFFFF;">Explore Details</a>
                </div>
            </div>
        </div>

        <!-- Slide 4: The Brutalist Sanctuary (Kyoto, Japan) -->
        <div class="arche-horizontal-item" style="width: 55vw; max-width: 600px; flex-shrink: 0; margin-right: 12vw;">
            <div class="arche-image-wrapper" style="aspect-ratio: 3 / 4; width: 100%;">
                <img src="https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=800&q=80" alt="Brutalist Sanctuary" style="width: 100%; object-fit: cover;">
            </div>
            <div style="margin-top: 1.8rem; color: #FFFFFF;">
                <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0; color: #FFFFFF; font-family: 'Cormorant Garamond', serif; font-weight: 300;">The Brutalist Sanctuary</h3>
                <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Kyoto, Japan — Tea House & Gardens</span>
                <div style="margin-top: 1rem;">
                    <a href="/portfolio" class="arche-btn-underline" style="color: #FFFFFF;">Explore Details</a>
                </div>
            </div>
        </div>

        <!-- Slide 5: L'horizon Villa (Amalfi Coast, Italy) -->
        <div class="arche-horizontal-item" style="width: 75vw; max-width: 800px; flex-shrink: 0; margin-right: 12vw;">
            <div class="arche-image-wrapper" style="aspect-ratio: 16 / 10; width: 100%;">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80" alt="L'horizon Villa" style="width: 100%; object-fit: cover;">
            </div>
            <div style="margin-top: 1.8rem; display: flex; justify-content: space-between; align-items: flex-start; color: #FFFFFF;">
                <div>
                    <h3 style="font-size: 2.2rem; margin: 0 0 0.3rem 0; color: #FFFFFF; font-family: 'Cormorant Garamond', serif; font-weight: 300;">L'horizon Villa</h3>
                    <span class="arche-subtitle-caps" style="font-size: 0.65rem; color: var(--arche-text-muted);">Amalfi Coast, Italy — Seafront Estate</span>
                </div>
                <a href="/portfolio" class="arche-btn-outline" style="color: #FFFFFF; border-color: rgba(255, 255, 255, 0.2); padding: 0.8rem 1.8rem; font-size: 0.75rem;">View Commission</a>
            </div>
        </div>
        
    </div>
</div>
'''))
portfolio_template["content"].append(gallery_sec)

with open(os.path.join(templates_dir, "portfolio-template.json"), "w") as f:
    json.dump(portfolio_template, f, indent=2)

# ==========================================================================
# 5. GENERATE TESTIMONIALS TEMPLATE
# ==========================================================================
testimonials_template = {
    "title": "Studio Arche Testimonials",
    "type": "page",
    "content": []
}

test_hero = make_container(css_class="arche-section-padding")
test_hero["elements"].append(make_heading("04 / Patron Testimonies", "span", "center", "arche-subtitle-caps"))
test_hero["elements"].append(make_heading("Inhabited Silence.", "h1", "center", "arche-reveal-text"))
test_hero["elements"].append(make_text("Space is not complete until it is lived in. Read the reflections of our patrons who inhabit the sanctuaries we have carved, ranging from private estate collectors to commercial retail innovators.", "arche-lead arche-reveal-text"))
test_hero["elements"][-1]["settings"]["align"] = "center"
testimonials_template["content"].append(test_hero)

test_grid = make_container(css_class="arche-section-padding")
test_grid["elements"].append(make_html('''
<div class="arche-grid-container" style="row-gap: 40px;">
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">Studio Arche did not just design a house; they shaped a frame for my life. Waking up in Villa Noir and watching the sunrise interact with the raw stone walls is an emotional experience. Their restraint is pure genius.</p>
            </div>
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">SR</div>
                <div class="arche-author-info">
                    <h4>Stephan & Renée</h4>
                    <p>Patrons, Villa Noir Geneva</p>
                </div>
            </div>
        </div>
    </div>
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">For our Parisian retail salon, we wanted a space that felt like an art gallery rather than a shop. Studio Arche crafted an environment of absolute luxury. Our foot traffic and brand prestige have soared.</p>
            </div>
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">ML</div>
                <div class="arche-author-info">
                    <h4>Marc Laurent</h4>
                    <p>Creative Director, Maison Noir Paris</p>
                </div>
            </div>
        </div>
    </div>
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">Their attention to detail is staggering. The way the custom bronze joints in the kitchen cabinets slide shut silently is a testament to their obsession with engineering. Absolutely flawless execution.</p>
            </div>
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">TK</div>
                <div class="arche-author-info">
                    <h4>Takeshi K.</h4>
                    <p>Owner, Brutalist Sanctuary Kyoto</p>
                </div>
            </div>
        </div>
    </div>
    <div class="arche-grid-col-6">
        <div class="arche-testimonial-card">
            <div>
                <div class="arche-quote-mark">“</div>
                <div style="color: var(--arche-champagne); font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 1.5rem;">★★★★★</div>
                <p class="arche-testimonial-text">The coordination across international borders was seamless. Studio Arche managed the Italian quarry procurement directly, taking a massive weight off our shoulders. The villa is a masterwork.</p>
            </div>
            <div class="arche-testimonial-author" style="margin-top: 2rem;">
                <div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--arche-soft-grey); display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--arche-obsidian);">AD</div>
                <div class="arche-author-info">
                    <h4>Alessia D.</h4>
                    <p>Patron, L'horizon Villa Amalfi</p>
                </div>
            </div>
        </div>
    </div>
</div>
'''))
testimonials_template["content"].append(test_grid)

with open(os.path.join(templates_dir, "testimonials-template.json"), "w") as f:
    json.dump(testimonials_template, f, indent=2)

# ==========================================================================
# 6. GENERATE CONTACT TEMPLATE
# ==========================================================================
contact_template = {
    "title": "Studio Arche Contact",
    "type": "page",
    "content": []
}

contact_hero = make_container(direction="row", css_class="arche-section-padding")
ch_left = make_container(align="flex-start")
ch_left["settings"]["width"] = {"unit": "%", "size": 40}
ch_left["elements"].append(make_heading("05 / Initiate Commission", "span", "left", "arche-subtitle-caps"))
ch_left["elements"].append(make_heading("Let us craft your space.", "h1", "left", "arche-reveal-text"))
ch_left["elements"].append(make_text("We accept a limited number of residential and commercial commissions annually. Please outline your physical site coordinates, project scope, and aesthetic ambitions, and our directors will initiate contact.", "arche-lead arche-reveal-text"))

ch_right = make_container()
ch_right["settings"]["width"] = {"unit": "%", "size": 55}
ch_right["elements"].append(make_html('''
<div class="arche-form" style="margin-top: 2rem;">
    <form action="#" method="POST" id="arche-commission-form" onsubmit="event.preventDefault(); alert('Commission Inquiry Submitted Successfully. Our curators will contact you within 48 hours.');">
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
'''))
contact_hero["elements"].extend([ch_left, ch_right])
contact_template["content"].append(contact_hero)

# Global Offices
offices_sec = make_container(direction="row", css_class="arche-section-padding arche-dark-section")
for num, title, desc in [("01", "Atelier Geneva", "Rue du Rhône 14,<br>1204 Geneva, Switzerland<br>geneva@studioarche.com"),
                         ("02", "Atelier Paris", "Rue Saint-Honoré 213,<br>75001 Paris, France<br>paris@studioarche.com"),
                         ("03", "Atelier Tokyo", "Minami-Aoyama 5-Chome,<br>Minato-ku, Tokyo, Japan<br>tokyo@studioarche.com")]:
    col = make_container(align="flex-start")
    col["settings"]["width"] = {"unit": "%", "size": 30}
    col["elements"].append(make_heading(num, "h2", "left"))
    col["elements"][-1]["settings"]["title"] = f'<span style="color: var(--arche-champagne); font-size: 3rem;">{num}</span>'
    col["elements"].append(make_heading(title, "h3", "left"))
    col["elements"].append(make_text(desc))
    offices_sec["elements"].append(col)
contact_template["content"].append(offices_sec)

# Inverted Map
map_sec = make_container()
map_sec["elements"].append(make_html('''
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
'''))
contact_template["content"].append(map_sec)

with open(os.path.join(templates_dir, "contact-template.json"), "w") as f:
    json.dump(contact_template, f, indent=2)

print("SUCCESS: Programmatically generated all 6 high-end Elementor JSON templates!")
