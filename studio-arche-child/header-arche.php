<?php
/**
 * Studio Arche — Custom Header Template
 * Glassmorphic fixed navigation with mobile overlay
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Determine current page for active link
$current_template = get_page_template_slug();
$pages = array(
    'page-home.php'      => array( 'label' => 'Home',      'slug' => 'home' ),
    'page-about.php'     => array( 'label' => 'About',     'slug' => 'about' ),
    'page-services.php'  => array( 'label' => 'Services',  'slug' => 'services' ),
    'page-portfolio.php' => array( 'label' => 'Portfolio',  'slug' => 'portfolio' ),
    'page-contact.php'   => array( 'label' => 'Contact',   'slug' => 'contact' ),
);

// Get page URLs by slug
function sa_get_page_url_by_slug( $slug ) {
    $page = get_page_by_path( $slug );
    return $page ? get_permalink( $page ) : '#';
}
?>

<script>
window.onerror = function(message, source, lineno, colno, error) {
  fetch('<?php echo get_stylesheet_directory_uri(); ?>/error-logger.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ message: message, source: source, lineno: lineno, colno: colno, error: error ? error.stack : '' })
  });
};
window.addEventListener('unhandledrejection', function(event) {
  fetch('<?php echo get_stylesheet_directory_uri(); ?>/error-logger.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ message: event.reason ? event.reason.message || event.reason : 'Unhandled Rejection', source: '', lineno: 0, colno: 0, error: event.reason && event.reason.stack ? event.reason.stack : '' })
  });
});
</script>

<!-- Glassmorphic Navigation -->
<nav class="sa-nav" role="navigation" aria-label="Main navigation">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sa-nav__logo">
        STUDIO <span>ARCHE</span>
    </a>

    <div class="sa-nav__links">
        <?php foreach ( $pages as $tpl => $info ) :
            $url = sa_get_page_url_by_slug( $info['slug'] );
            $active = ( $current_template === $tpl ) ? ' is-active' : '';
        ?>
            <a href="<?php echo esc_url( $url ); ?>" class="sa-nav__link<?php echo $active; ?>">
                <?php echo esc_html( $info['label'] ); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <button class="sa-nav__hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<!-- Mobile Full-Screen Overlay Menu -->
<div class="sa-nav__overlay" aria-hidden="true">
    <?php foreach ( $pages as $tpl => $info ) :
        $url = sa_get_page_url_by_slug( $info['slug'] );
    ?>
        <a href="<?php echo esc_url( $url ); ?>" class="sa-nav__overlay-link">
            <?php echo esc_html( $info['label'] ); ?>
        </a>
    <?php endforeach; ?>
</div>
