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
	wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );
	// style.css
  wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bxslider');
	wp_enqueue_script('bxslider');

}

//adiciona style e bootstrap
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
  add_image_size( 'small-thumbnail', 360, 240, true );
  add_image_size('banner-image', 1200, 210, array('left','top'));
	// Imagens de Slider
	add_image_size('slides', 1200, 400, true);
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

// Opcoes para customizar cores
function pergunteEspecialista_customize_register($wp_customize){

  // Cor de links
  $wp_customize->add_setting('pe_link_color', array(
    'default'=> '#006ec3',
    'transport'=> 'refresh',
  ));

  $wp_customize->add_section('pe_standard_colors', array(
    'title'=> __('Cores Padrão', 'Pergunte a um Especialista'),
    'priority'=> 30,
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_link_color_control', array(
    'label'=> __('Cores de Links','Pergunte a um Especialista'),
    'section'=> 'pe_standard_colors',
    'settings'=> 'pe_link_color',
  )));

  // Cor de botoes
  $wp_customize->add_setting('pe_button_color', array(
    'default'=> '#006ec3',
    'transport'=> 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_button_color_control', array(
    'label'=> __('Cores de Botões','Pergunte a um Especialista'),
    'section'=> 'pe_standard_colors',
    'settings'=> 'pe_button_color',
  )));

  // Cor de Highlight de botoes
  $wp_customize->add_setting('pe_highlightbtn_color', array(
    'default'=> '#0046a3',
    'transport'=> 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_highlightbtn_color_control', array(
    'label'=> __('Cor de Hover em Botão','Pergunte a um Especialista'),
    'section'=> 'pe_standard_colors',
    'settings'=> 'pe_highlightbtn_color',
  )));


}

add_action('customize_register', 'pergunteEspecialista_customize_register');

// Saida de customizacao de CSS
function pergunteEspecialista_customize_css(){ ?>

    <style type="text/css">
      /* Cor de links */
      a:link,
      a:visited{
          color: <?php echo get_theme_mod('pe_link_color'); ?>
      }
      .site-header nav ul li.current_page_item a:link,
      .site-header nav ul li.current_page_item a:visited,
      .site-header nav ul li.current-menu-item a:link,
      .site-header nav ul li.current-menu-item a:visited,
      .site-header nav ul li.current-page-ancestor a:link,
      .site-header nav ul li.current-page-ancestor a:visited{
        background-color: <?php echo get_theme_mod('pe_link_color'); ?>;
      }

      /* Cor de botoes */
      div.hd-search #searchsubmit{
        background-color: <?php echo get_theme_mod('pe_button_color');?>;
      }

      /* Cor de Highlight de botao*/
      div.hd-search #searchsubmit:hover{
        background-color: <?php echo get_theme_mod('pe_highlightbtn_color');?>;
      }


    </style>

<?php }

add_action('wp_head', 'pergunteEspecialista_customize_css');

// Adiciona Customizacao de footer callout
function pergunteEspecialista_footer_callout($wp_customize){
  $wp_customize->add_section('pe_footer_callout_section', array(
    'title' => __('Chamada no Footer', 'Pergunte a um Especialista'),
  ));

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_footer_callout_display', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_footer_callout_display_control', array(
     'label'=> 'Exibir a chamada no Footer?',
     'section'=> 'pe_footer_callout_section',
     'settings'=> 'pe_footer_callout_display',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  // Titulo
  $wp_customize->add_setting('pe_footer_callout_headline', array(
    'default'=> 'Exemplo de título',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_footer_callout_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_footer_callout_section',
     'settings'=> 'pe_footer_callout_headline'
   )));

   // Texto

   $wp_customize->add_setting('pe_footer_callout_text', array(
     'default'=> 'Exemplo de texto',
   ));

   $wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'pe_footer_callout_text_control', array(
      'label'=> 'Título',
      'section'=> 'pe_footer_callout_section',
      'settings'=> 'pe_footer_callout_text',
      'type'=> 'textarea'
    )));

    // Link
    $wp_customize->add_setting('pe_footer_callout_link');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
     'pe_footer_callout_link_control', array(
       'label'=> 'Link',
       'section'=> 'pe_footer_callout_section',
       'settings'=> 'pe_footer_callout_link',
       'type'=> 'dropdown-pages'
     )));

     // Imagem
     $wp_customize->add_setting('pe_footer_callout_image');

     $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
      'pe_footer_callout_image_control', array(
        'label'=> 'Imagem',
        'section'=> 'pe_footer_callout_section',
        'settings'=> 'pe_footer_callout_image',
        'width'=> 750,
        'height'=> 500
      )));
}

add_action('customize_register', 'pergunteEspecialista_footer_callout');

// Tipos de posts customizados

function pergunteEspecialista_custom_post_type(){

	$labels = array(
		'name' => 'Slider',
		'singular_name' => 'Slider',
		'add_new' => 'Adicionar Nova Imagem',
		'all_items' => 'Todas as Imagens',
		'add_new_item' => 'Adicionar Nova Imagem',
		'edit_item' => 'Editar Item',
		'new_item' => 'Novo Item',
		'view_item' => 'Ver Item',
		'search_item' => 'Procurar Slider',
		'not_found' => 'Não foi encontrado nenhum item',
		'not_found_in_trash' => 'Não foi encontrado nenhum item na lixeira',
		'parent_item_colon' => 'Item Parente'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'supports' => array(
			'thumbnail',
			'title'
		),
		'menu_position' => 5,
		'exclude_from_search' => true
	);
	register_post_type('slider', $args);
}

add_action('init','pergunteEspecialista_custom_post_type');




?>
