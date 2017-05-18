<?php

// styles da pagina
function pergunteEspecialista_resources(){

  wp_enqueue_style('style', get_stylesheet_uri());

}

//adiciona style
add_action('wp_enqueue_scripts', 'pergunteEspecialista_resources');



// Pegar o ancestral da pagina
function get_top_ancestor_id() {

  global $post;

  if($post->post_parent){
    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];
  }
  return $post->ID;
}

// Informa se a pagina tem uma pagina crianca
function has_children(){

  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}

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
  add_image_size( 'small-thumbnail', 180, 120, true );
  add_image_size('banner-image', 920, 210, array('left','top'));

  //Adiciona suporte a formato de post
  add_theme_support( 'post-formats', array('aside', 'gallery', 'link'));
}

add_action( 'after_setup_theme','pergunteEspecialista_setup');

// Adiciona localizacao de Widgets

function initWidgets(){

  register_sidebar(array(
      'name'=> 'Barra Lateral',
      'id'=> 'sidebar1',
      'before_widget'=> '<div class="widget-item">',
      'after_widget'=> '</div>',
      'before_title'=> '<h3>',
      'after_title'=> '</h3>'
  ));

  register_sidebar( array(
    'name'=> 'Footer 1',
    'id'=> 'footer1',
    'before_widget'=> '<div class="widget-item">',
    'after_widget'=> '</div>',
    'before_title'=> '<h3>',
    'after_title'=> '</h3>'
  ));

  register_sidebar( array(
    'name'=> 'Footer 2',
    'id'=> 'footer2',
    'before_widget'=> '<div class="widget-item">',
    'after_widget'=> '</div>',
    'before_title'=> '<h3>',
    'after_title'=> '</h3>'
  ));

  register_sidebar( array(
    'name'=> 'Footer 3',
    'id'=> 'footer3',
    'before_widget'=> '<div class="widget-item">',
    'after_widget'=> '</div>',
    'before_title'=> '<h3>',
    'after_title'=> '</h3>'
  ));
  register_sidebar( array(
    'name'=> 'Footer 4',
    'id'=> 'footer4',
    'before_widget'=> '<div class="widget-item">',
    'after_widget'=> '</div>',
    'before_title'=> '<h3>',
    'after_title'=> '</h3>'
  ));
}
add_action('widgets_init', 'initWidgets');

?>
