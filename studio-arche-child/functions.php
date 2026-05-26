<?php
/**
 * Studio Arche — Award-Winning Child Theme Functions
 * Fully custom page template registration + conditional asset loading
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ==========================================================================
   1. Register Custom Page Templates Programmatically
   ========================================================================== */
function studio_arche_register_templates( $templates ) {
	$templates['page-home.php']      = 'Studio Arche — Home';
	$templates['page-about.php']     = 'Studio Arche — About';
	$templates['page-services.php']  = 'Studio Arche — Services';
	$templates['page-portfolio.php'] = 'Studio Arche — Portfolio';
	$templates['page-contact.php']   = 'Studio Arche — Contact';
	return $templates;
}
add_filter( 'theme_page_templates', 'studio_arche_register_templates' );

/**
 * Point WordPress to our child theme directory for custom templates
 */
function studio_arche_template_include( $template ) {
	global $post;
	if ( $post ) {
		$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
		$custom_templates = array(
			'page-home.php',
			'page-about.php',
			'page-services.php',
			'page-portfolio.php',
			'page-contact.php',
		);
		if ( in_array( $page_template, $custom_templates, true ) ) {
			$file = get_stylesheet_directory() . '/' . $page_template;
			if ( file_exists( $file ) ) {
				return $file;
			}
		}
	}
	return $template;
}
add_filter( 'template_include', 'studio_arche_template_include', 99 );

/* ==========================================================================
   2. Register Custom Navigation Menu
   ========================================================================== */
function studio_arche_register_menus() {
	register_nav_menus( array(
		'arche_primary' => __( 'Studio Arche Primary Menu', 'studio-arche' ),
	) );
}
add_action( 'after_setup_theme', 'studio_arche_register_menus' );

/* ==========================================================================
   3. Enqueue Global Styles
   ========================================================================== */
function studio_arche_enqueue_styles() {
	// Google Fonts — Cormorant Garamond, Plus Jakarta Sans, Syne
	$font_url = 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap';
	wp_enqueue_style( 'studio-arche-fonts', $font_url, array(), null );

	// Global Design System
	wp_enqueue_style( 'studio-arche-global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/global.css' ) );

	// Transitions
	wp_enqueue_style( 'studio-arche-transitions', get_stylesheet_directory_uri() . '/assets/css/transitions.css', array( 'studio-arche-global' ), filemtime( get_stylesheet_directory() . '/assets/css/transitions.css' ) );

	// Conditional per-page CSS
	$template = get_page_template_slug();
	$page_map = array(
		'page-home.php'      => 'home',
		'page-about.php'     => 'about',
		'page-services.php'  => 'services',
		'page-portfolio.php' => 'portfolio',
		'page-contact.php'   => 'contact',
	);
	if ( isset( $page_map[ $template ] ) ) {
		$slug = $page_map[ $template ];
		$css_file = '/assets/css/' . $slug . '.css';
		if ( file_exists( get_stylesheet_directory() . $css_file ) ) {
			wp_enqueue_style( 'studio-arche-' . $slug, get_stylesheet_directory_uri() . $css_file, array( 'studio-arche-global' ), filemtime( get_stylesheet_directory() . $css_file ) );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'studio_arche_enqueue_styles', 20 );

/* ==========================================================================
   4. Enqueue Global + Page-Specific Scripts
   ========================================================================== */
function studio_arche_enqueue_scripts() {
	// GSAP Core
	wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), null, true );

	// GSAP ScrollTrigger
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap-core' ), null, true );

	// Lenis Smooth Scroll
	wp_enqueue_script( 'lenis-scroll', 'https://unpkg.com/lenis@1.1.18/dist/lenis.min.js', array(), null, true );

	// Core Animation Engine
	wp_enqueue_script( 'studio-arche-engine', get_stylesheet_directory_uri() . '/assets/js/engine.js', array( 'gsap-core', 'gsap-scrolltrigger', 'lenis-scroll' ), filemtime( get_stylesheet_directory() . '/assets/js/engine.js' ), true );

	// Conditional per-page JS
	$template = get_page_template_slug();
	$page_map = array(
		'page-home.php'      => 'home',
		'page-about.php'     => 'about',
		'page-services.php'  => 'services',
		'page-portfolio.php' => 'portfolio',
		'page-contact.php'   => 'contact',
	);
	if ( isset( $page_map[ $template ] ) ) {
		$slug = $page_map[ $template ];
		$js_file = '/assets/js/' . $slug . '.js';
		if ( file_exists( get_stylesheet_directory() . $js_file ) ) {
			wp_enqueue_script( 'studio-arche-' . $slug, get_stylesheet_directory_uri() . $js_file, array( 'studio-arche-engine' ), filemtime( get_stylesheet_directory() . $js_file ), true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'studio_arche_enqueue_scripts', 30 );

/* ==========================================================================
   5. SVG Upload Support
   ========================================================================== */
function studio_arche_enable_svg( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'studio_arche_enable_svg' );

/* ==========================================================================
   6. Performance: Remove Emoji Scripts, jQuery Migrate
   ========================================================================== */
function studio_arche_performance_tweaks() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'studio_arche_performance_tweaks' );

/* ==========================================================================
   7. Add Preload Hints for Critical Resources
   ========================================================================== */
function studio_arche_preload_resources() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'studio_arche_preload_resources', 1 );
