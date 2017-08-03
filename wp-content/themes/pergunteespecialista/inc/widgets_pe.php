<?php

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
