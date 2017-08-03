<?php
// styles da pagina
function pergunteEspecialista_resources(){

	// global.js
	wp_register_script('global-js', get_template_directory_uri() . '/lib/js/global.js', array('jquery'), '1.0', true);
	wp_enqueue_script('global-js');
	// bxslider
	wp_register_script('bxslider', get_template_directory_uri() . '/lib/js/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
	wp_register_style('bxslider', get_template_directory_uri() . '/lib/css/jquery.bxslider.min.css', array(), '4.2.12');
	// bootstrap
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/lib/css/bootstrap.css' );
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/lib/js/bootstrap.min.js' );
	// style.css
  wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bxslider');
	wp_enqueue_script('bxslider');

}

// adiciona style e bootstrap
add_action('wp_enqueue_scripts', 'pergunteEspecialista_resources');
?>
