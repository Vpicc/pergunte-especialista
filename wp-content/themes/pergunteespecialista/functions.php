<?php

// styles da pagina
function pergunteEspecialista_resources(){

  wp_enqueue_style('style', get_stylesheet_uri());

}

//adiciona style
add_action('wp_enqueue_scripts', 'pergunteEspecialista_resources');

// Navigation Menus
register_nav_menus(array(
  'primary' => __('Menu primário'),
  'footer' => __('Menu de rodapé'),
));

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
?>
