<?php
/**
 * Template Name: Studio Arche — Services
 * Description: Immersive service showcase with accordion, process steps, and CTA.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
get_template_part( 'header-arche' );

$img = get_stylesheet_directory_uri() . '/assets/images/';

$services = array(
	array(
		'num'   => '01',
		'title' => 'Interior Architecture',
		'img'   => $img . 'portfolio-residential.png',
		'desc'  => 'We approach every space as a living composition — orchestrating spatial planning, structural design, and interior architecture to create environments that feel both timeless and deeply personal. From initial concept through to execution, our holistic methodology ensures every room flows with intention, balancing proportion, light, and materiality into a seamless whole.',
		'link'  => '#',
	),
	array(
		'num'   => '02',
		'title' => 'Bespoke Furniture',
		'img'   => $img . 'portfolio-kitchen.png',
		'desc'  => 'Each piece we design is born from a dialogue between artisan tradition and contemporary form. Our bespoke furniture atelier crafts statement pieces — from sculptural dining tables to hand-upholstered seating — using only the finest hardwoods, metals, and textiles sourced from heritage workshops across Europe and Japan.',
		'link'  => '#',
	),
	array(
		'num'   => '03',
		'title' => 'Lighting Design',
		'img'   => $img . 'portfolio-bedroom.png',
		'desc'  => 'Light is the invisible architecture that defines mood and dimension. Our lighting concepts layer ambient, task, and accent illumination through custom fixture design, integrated architectural lighting, and smart control systems — sculpting atmospheres that shift gracefully from dawn to dusk.',
		'link'  => '#',
	),
	array(
		'num'   => '04',
		'title' => 'Material Curation',
		'img'   => $img . 'portfolio-bathroom.png',
		'desc'  => 'We curate palettes of extraordinary materials — rare marbles, hand-finished metals, artisanal tiles, and organic textiles — sourced directly from quarries, mills, and ateliers worldwide. Every selection is evaluated for beauty, tactility, and longevity, ensuring each surface tells a story that endures.',
		'link'  => '#',
	),
	array(
		'num'   => '05',
		'title' => 'Project Management',
		'img'   => $img . 'portfolio-office.png',
		'desc'  => 'Our white-glove project management removes every friction from the creative process. We coordinate architects, contractors, and artisans with precision, delivering end-to-end oversight on budget, timeline, and quality — so you experience nothing but the pleasure of watching your vision materialise.',
		'link'  => '#',
	),
	array(
		'num'   => '06',
		'title' => 'Brand Environments',
		'img'   => $img . 'portfolio-commercial.png',
		'desc'  => 'From flagship retail spaces to five-star hospitality interiors, we design commercial environments that embody brand identity through spatial storytelling. Every touchpoint — from the entry threshold to the finest hardware detail — is crafted to create immersive experiences that resonate with guests and customers alike.',
		'link'  => '#',
	),
);
?>

<!-- ============================================================
     SECTION 1 — HERO
     ============================================================ -->
<section class="sa-section sa-section--full sa-services-hero">
	<div class="sa-container">
		<span class="sa-subtitle sa-mb-sm" data-reveal="fade">What We Do</span>
		<h1 class="sa-hero-heading sa-mb-lg sa-reveal-text" data-reveal="chars">Design Services</h1>
		<p class="sa-body-lg sa-services-hero__intro sa-mt-md" data-reveal="fade">
			We offer a comprehensive suite of design services — each shaped by decades of craft, 
			an unwavering eye for detail, and a belief that extraordinary spaces are born from 
			the convergence of art, architecture, and human intuition.
		</p>
	</div>
</section>

<!-- ============================================================
     SECTION 2 — SERVICE ACCORDION
     ============================================================ -->
<section class="sa-section sa-services-accordion-section">
	<div class="sa-container">
		<div class="sa-services-accordion" data-reveal="stagger">
			<?php foreach ( $services as $i => $s ) : ?>
			<div class="sa-accordion-item<?php echo $i === 0 ? ' is-active' : ''; ?>" data-accordion-item>
				<!-- Header (always visible) -->
				<button class="sa-accordion-header" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
					<div class="sa-accordion-header__left">
						<span class="sa-accordion-num"><?php echo esc_html( $s['num'] ); ?></span>
						<h2 class="sa-accordion-title"><?php echo esc_html( $s['title'] ); ?></h2>
					</div>
					<div class="sa-accordion-header__right">
						<span class="sa-accordion-arrow">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								<line x1="12" y1="5" x2="12" y2="19"></line>
								<line x1="5" y1="12" x2="19" y2="12"></line>
							</svg>
						</span>
					</div>
				</button>

				<!-- Body (collapsible) -->
				<div class="sa-accordion-body" aria-hidden="<?php echo $i === 0 ? 'false' : 'true'; ?>">
					<div class="sa-accordion-content">
						<div class="sa-accordion-content__media">
							<div class="sa-img-wrap sa-img-wrap--hover sa-img-wrap--aspect-16-9" data-cursor-label="VIEW">
								<img src="<?php echo esc_url( $s['img'] ); ?>"
								     alt="<?php echo esc_attr( $s['title'] ); ?>"
								     loading="lazy" />
							</div>
						</div>
						<div class="sa-accordion-content__text">
							<p class="sa-body-lg"><?php echo esc_html( $s['desc'] ); ?></p>
							<a href="<?php echo esc_url( $s['link'] ); ?>" class="sa-link sa-mt-md">
								Learn More <span class="sa-btn__arrow">&rarr;</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============================================================
     SECTION 3 — PROCESS (Dark)
     ============================================================ -->
<section class="sa-section sa-section--dark sa-services-process">
	<div class="sa-container">
		<div class="sa-text-center sa-mb-lg">
			<span class="sa-subtitle sa-mb-sm" data-reveal="fade">Our Process</span>
			<h2 class="sa-section-heading" data-reveal="words">From Vision to Reality</h2>
		</div>

		<div class="sa-process-track" data-reveal="stagger">
			<!-- Step 01 -->
			<div class="sa-process-step">
				<span class="sa-process-step__num">01</span>
				<h3 class="sa-process-step__title">Discovery</h3>
				<p class="sa-process-step__desc">
					We listen with intention — immersing ourselves in your world, 
					understanding your aspirations, rituals, and the emotional 
					qualities you seek in a space.
				</p>
			</div>

			<!-- Connector -->
			<div class="sa-process-connector" aria-hidden="true">
				<span></span>
			</div>

			<!-- Step 02 -->
			<div class="sa-process-step">
				<span class="sa-process-step__num">02</span>
				<h3 class="sa-process-step__title">Concept</h3>
				<p class="sa-process-step__desc">
					We distill inspiration into design — crafting mood boards, 
					spatial narratives, and architectural concepts that capture 
					the essence of your vision.
				</p>
			</div>

			<!-- Connector -->
			<div class="sa-process-connector" aria-hidden="true">
				<span></span>
			</div>

			<!-- Step 03 -->
			<div class="sa-process-step">
				<span class="sa-process-step__num">03</span>
				<h3 class="sa-process-step__title">Refinement</h3>
				<p class="sa-process-step__desc">
					We perfect every detail — from material selections and 
					joinery profiles to lighting temperatures and colour 
					harmonies — until nothing is left to chance.
				</p>
			</div>

			<!-- Connector -->
			<div class="sa-process-connector" aria-hidden="true">
				<span></span>
			</div>

			<!-- Step 04 -->
			<div class="sa-process-step">
				<span class="sa-process-step__num">04</span>
				<h3 class="sa-process-step__title">Delivery</h3>
				<p class="sa-process-step__desc">
					We bring it to life — overseeing every phase of construction, 
					installation, and styling to ensure the final space exceeds 
					even the most exacting expectations.
				</p>
			</div>
		</div>
	</div>
</section>

<!-- ============================================================
     SECTION 4 — CTA
     ============================================================ -->
<section class="sa-section sa-services-cta">
	<div class="sa-container sa-text-center">
		<h2 class="sa-section-heading sa-mb-md" data-reveal="words">Let Us Create Together</h2>
		<p class="sa-body-lg sa-services-cta__sub sa-mb-lg" data-reveal="fade">
			Every extraordinary space begins with a conversation.
		</p>
		<a href="<?php echo esc_url( get_page_link( get_page_by_path('contact') ) ); ?>"
		   class="sa-btn" data-magnetic="0.3" data-reveal="fade">
			Book a Consultation <span class="sa-btn__arrow">&rarr;</span>
		</a>
	</div>
</section>

<?php
get_template_part( 'footer-arche' );
get_footer();
?>
