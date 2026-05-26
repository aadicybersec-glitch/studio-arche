<?php
/**
 * Studio Arche — Custom Footer Template
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<footer class="sa-footer">
  <div class="sa-container">
    <div class="sa-footer__top">
      <div>
        <div class="sa-footer__brand">Studio Arche</div>
        <p class="sa-body-sm sa-mt-sm" style="max-width: 320px;">
          Crafting spaces that breathe life into architecture. Where minimal design meets maximal impact.
        </p>
      </div>

      <div class="sa-footer__links">
        <a href="<?php echo esc_url( get_page_link( get_page_by_path('home') ) ); ?>" class="sa-footer__link">Home</a>
        <a href="<?php echo esc_url( get_page_link( get_page_by_path('about') ) ); ?>" class="sa-footer__link">About</a>
        <a href="<?php echo esc_url( get_page_link( get_page_by_path('services') ) ); ?>" class="sa-footer__link">Services</a>
        <a href="<?php echo esc_url( get_page_link( get_page_by_path('portfolio') ) ); ?>" class="sa-footer__link">Portfolio</a>
        <a href="<?php echo esc_url( get_page_link( get_page_by_path('contact') ) ); ?>" class="sa-footer__link">Contact</a>
      </div>
    </div>

    <div class="sa-footer__bottom">
      <p>&copy; <?php echo date('Y'); ?> Studio Arche. All rights reserved.</p>

      <div class="sa-footer__social">
        <a href="#" aria-label="Instagram">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" aria-label="Pinterest">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.236 2.636 7.855 6.356 9.312-.088-.791-.167-2.005.035-2.868.181-.78 1.172-4.97 1.172-4.97s-.299-.598-.299-1.482c0-1.388.806-2.425 1.808-2.425.853 0 1.265.64 1.265 1.408 0 .858-.546 2.14-.828 3.33-.236.995.5 1.807 1.48 1.807 1.778 0 3.144-1.874 3.144-4.58 0-2.393-1.72-4.068-4.177-4.068-2.845 0-4.515 2.135-4.515 4.34 0 .859.331 1.781.745 2.282a.3.3 0 01.069.288l-.278 1.133c-.044.183-.145.222-.335.134-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.473 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.965-.527-2.291-1.148l-.623 2.378c-.226.869-.835 1.958-1.244 2.621.936.29 1.929.446 2.958.446 5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
        </a>
        <a href="#" aria-label="LinkedIn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
      </div>
    </div>
  </div>
</footer>
