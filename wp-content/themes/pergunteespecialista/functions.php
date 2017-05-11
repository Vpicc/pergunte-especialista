<?php

function pergunteEspecialista_resources(){

  wp_enqueue_style('style', get_stylesheet_uri());

}


add_action('wp_enqueue_scripts', 'pergunteEspecialista_resources');

// Navigation Menus
register_nav_menus(array(
  'primary' => __( 'Menu primário'),
  'footer' => __('Menu de rodapé'),
));

?>
