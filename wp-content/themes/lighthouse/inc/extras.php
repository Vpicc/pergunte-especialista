<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Lighthouse
 *
 * Please browse readme.txt for credits and forking information
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lighthouse_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
add_filter( 'body_class', 'lighthouse_body_classes' );

if ( ! function_exists( 'lighthouse_header_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function lighthouse_header_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;



/**
 * Adds the URL to the top level navigation menu item
 */
function  lighthouse_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'lighthouse_add_top_level_menu_url', 99, 3 );





/** BACKEND **/

add_action( 'admin_menu', 'lighthouse_register_backend' );
function lighthouse_register_backend() {
  add_theme_page( __('About Lighthouse', 'lighthouse'), __('Lighthouse', 'lighthouse'), 'edit_theme_options', 'about-lighthouse.php', 'lighthouse_backend');
}

function lighthouse_backend(){ ?>
<div class="text-centering">
  <div class="backend-css customize-lighthouse">
    <h2><?php echo __( 'Welcome to Lighthouse', 'lighthouse' ); ?></p></h2>
    <p><?php echo __( 'Get started and customize your awesome new blog theme', 'lighthouse' ); ?></p>
    <a href="<?php echo admin_url('/customize.php'); ?>" target="_blank" class="backend_btn"><?php echo __('Customize Theme','lighthouse'); ?></a>
  </div>
</div>

<h2 class="headline-second"><?php echo __( 'Got Questions or Need Help?', 'lighthouse' ); ?></h2>
<div class="text-centering">
 <div class="backend-css customize-lighthouse">
  <p><a href="https://lighthouseseooptimization.github.io/wordpress/lighthouse/#contact" target="_blank"><?php echo __( 'Email us here', 'lighthouse' ); ?></a> or <?php echo __( 'write to us directly at: Beseenseo@gmail.com', 'lighthouse' ); ?></p>
</div>
</div>
<div class="text-centering"><br><br>
  <a href="https://lighthouseseooptimization.github.io/wordpress/lighthouse/" target="_blank">
    <img src="https://raw.githubusercontent.com/lighthouseseooptimization/wordpress/master/lighthouse/img/docimage.png" alt="">
  </a>
</div>
<?php }

