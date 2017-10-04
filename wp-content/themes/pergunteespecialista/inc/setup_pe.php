<?php
// Customizar o tamanho dos resumos das paginas
function custom_excerpt_length(){
  return 55;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Setup do tema
function pergunteEspecialista_setup(){

  // Menus de navegacao
  register_nav_menus(array(
    'primary' => __('Menu primário'),
    'footer' => __('Menu de rodapé'),
  ));

  // Adicionar suporte a imagem destacada
  add_theme_support( 'post-thumbnails');
  add_image_size( 'small-thumbnail', 360, 240, true );
  add_image_size('banner-image', 1200, 210, array('left','top'));
	// Imagens de Slider
	add_image_size('slides', 1200, 550, true);
  //Adiciona suporte a formato de post
  add_theme_support( 'post-formats', array('aside', 'gallery', 'link'));
}

add_action( 'after_setup_theme','pergunteEspecialista_setup');

// Função que cria excerpts
function pe_create_excerpt( $text = '' ) {
    $excerpt_length = apply_filters( 'excerpt_length', 55 );
    $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );

    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}

 ?>
