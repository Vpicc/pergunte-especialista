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

// Adiciona pagina do google analytics
function pergunteEspecialista_add_analytics_page(){

	add_menu_page('Google Analytics', 'Analytics', 'manage_options', 'pergunteespecialista-analytics', 'pergunteEspecialista_theme_create_page');

	add_action('admin_init', 'pergunteEspecialista_custom_analytics');

}

add_action('admin_menu', 'pergunteEspecialista_add_analytics_page');

function pergunteEspecialista_theme_create_page(){
	require_once(get_template_directory() . '/peanalytics-page.php');
}

function pergunteEspecialista_custom_analytics(){
	register_setting('pergunteEspecialista-settings-group', 'Google_code');
	add_settings_section('pergunteEspecialista_analytics_code', 'Codigo do Google', 'pergunteEspecialista_analytics_option', 'pergunteespecialista-analytics');
	add_settings_field( 'analytics-code', 'Codigo', 'pe_analytics_code', 'pergunteespecialista-analytics', 'pergunteEspecialista_analytics_code');
}

function pergunteEspecialista_analytics_option(){
}

function pe_analytics_code(){
	$GAPICode = esc_attr(get_option('Google_code'));
	echo '<input type="text" name="Google_code" value="'. $GAPICode .'" placeholder="Codigo de API do Google" />';
}

// Adiciona o Codigo do Analytics a todos os headers
function pedev_google_analytics() {
	$GAPICode = get_option('Google_code');
	if(@$GAPICode != ''){
?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', '<?php echo $GAPICode; ?>', 'auto');
	ga('send', 'pageview');

	</script>

<?php }}
add_action( 'wp_head', 'pedev_google_analytics', 10 );


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

	// Cor de texto de botoes
  $wp_customize->add_setting('pe_button_textcolor', array(
    'default'=> '#FFF',
    'transport'=> 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_button_textcolor_control', array(
    'label'=> __('Cores de Texto de Botões','Pergunte a um Especialista'),
    'section'=> 'pe_standard_colors',
    'settings'=> 'pe_button_textcolor',
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
	// Cor de menu selecionado
	$wp_customize->add_setting('pe_menu_color', array(
		'default'=> '#006ec3',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_menu_color_control', array(
		'label'=> __('Cor de Menu','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_menu_color',
	)));

	// Cor de menu selecionado
	$wp_customize->add_setting('pe_menu_selected_color', array(
    'default'=> '#00056b',
    'transport'=> 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_menu_selected_color_control', array(
    'label'=> __('Cor de Menu Selecionado','Pergunte a um Especialista'),
    'section'=> 'pe_standard_colors',
    'settings'=> 'pe_menu_selected_color',
  )));

	// Cor de Highlight de menu
	$wp_customize->add_setting('pe_highlightmenu_color', array(
		'default'=> '#0046a3',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_highlightmenu_color_control', array(
		'label'=> __('Cor de Hover em Menu','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_highlightmenu_color',
	)));

	// Cor de texto de menu
	$wp_customize->add_setting('pe_menu_text_color', array(
		'default'=> '#FFF',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_menu_text_color_control', array(
		'label'=> __('Cor de Texto em Menu','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_menu_text_color',
	)));

	// Cor de highlight de texto de menu
	$wp_customize->add_setting('pe_highlightmenu_text_color', array(
		'default'=> '#FFF',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_highlightmenu_text_color_control', array(
		'label'=> __('Cor de Hover de Texto em Menu','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_highlightmenu_text_color',
	)));

	// Cor de header
	$wp_customize->add_setting('pe_header_color', array(
		'default'=> '#006ec3',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_header_color_control', array(
		'label'=> __('Cor do Header','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_header_color',
	)));

	// Cor de footer
	$wp_customize->add_setting('pe_footer_color', array(
		'default'=> '#006ec3',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_footer_color_control', array(
		'label'=> __('Cor do footer','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_footer_color',
	)));

	// Cor de texto de menu de footer
	$wp_customize->add_setting('pe_footermenu_text_color', array(
		'default'=> '#FFF',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_footermenu_text_color_control', array(
		'label'=> __('Cor do texto do menu de footer','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_footermenu_text_color',
	)));

	// Cor de fundo
	$wp_customize->add_setting('pe_background_color', array(
		'default'=> '#F4F5F7',
		'transport'=> 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_background_color_control', array(
		'label'=> __('Cor de fundo','Pergunte a um Especialista'),
		'section'=> 'pe_standard_colors',
		'settings'=> 'pe_background_color',
	)));


}

add_action('customize_register', 'pergunteEspecialista_customize_register');

// Adiciona Customizacao de fonte
function pergunteEspecialista_customize_fonts($wp_customize){
	// Seção de fontes
	$wp_customize->add_section('pe_font_section', array(
    'title' => __('Fonte do Website', 'Pergunte a um Especialista'),
  ));

	// Fonte padrao: Arial
	$wp_customize->add_setting('pe_font_select', array(
    'default'=> '',
  ));

	// Controle de fonte
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_font_control', array(
     'label'=> 'Fonte (Nome no Google Fonts)',
     'section'=> 'pe_font_section',
     'settings'=> 'pe_font_select'
   )));

	 // Controle de tamanho de fonte
	 $wp_customize->add_setting('pe_font_size', array(
     'default'=> '16',
   ));

   $wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'pe_font_size_control', array(
      'label'=> 'Tamanho da fonte',
      'section'=> 'pe_font_section',
      'settings'=> 'pe_font_size'
    )));

		// Controle de tamanho de fonte de titulo de posts
 	 $wp_customize->add_setting('pe_title_font_size', array(
      'default'=> '30',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
     'pe_title_font_size_control', array(
       'label'=> 'Tamanho do título dos posts',
       'section'=> 'pe_font_section',
       'settings'=> 'pe_title_font_size'
     )));

}

add_action('customize_register', 'pergunteEspecialista_customize_fonts');


function pe_load_fonts() {
	$fonte = 'http://fonts.googleapis.com/css?family=' . str_replace(' ','+',get_theme_mod('pe_font_select'));
	wp_register_style('et-googleFonts', $fonte);
  wp_enqueue_style( 'et-googleFonts');
}
add_action('wp_print_styles', 'pe_load_fonts');


// Saida de customizacao de CSS
function pergunteEspecialista_customize_css(){ ?>

    <style type="text/css">
			/* Cor de fundo e fonte */
			body{
				background-color: <?php echo get_theme_mod('pe_background_color'); ?>;
				font-family: <?php echo get_theme_mod('pe_font_select'); ?>, sans-serif;
				font-size: <?php echo get_theme_mod('pe_font_size'); ?>px;
			}
			/* Fonte dos titulos do blog */

			h2.post-title a{
			    font-size: <?php echo get_theme_mod('pe_title_font_size');?>px;
			}

			/* Cor do Header */
			.site-header{
			  background-color: <?php echo get_theme_mod('pe_header_color'); ?>;
			}
      /* Cor de links */
      a:link,
      a:visited{
          color: <?php echo get_theme_mod('pe_link_color'); ?>;
      }
			/* Cor de Menu */
			.site-header nav ul li a:link,
			.site-header nav ul li a:visited{
				-webkit-transition: background-color  0.3s ease-in-out;
				background-color: <?php echo get_theme_mod('pe_menu_color');?>;
			}

			/* Cor de highlight de menu*/

			.site-header nav ul li:hover > a{
				-webkit-transition: background-color  0.3s ease-in-out;
				background-color: <?php echo get_theme_mod('pe_highlightmenu_color');?>;
				-webkit-transition: color  0.3s ease-in-out;
				color: <?php echo get_theme_mod('pe_highlightmenu_text_color');?>;
			}

			/* Cor de Menu Selecionado */
      .site-header nav ul li.current_page_item > a,
      .site-header nav ul li.current_page_item > a:visited,
      .site-header nav ul li.current-menu-item > a,
			.site-header nav ul li.current-menu-item > a:visited,
			.site-header nav ul li.current-menu-ancestor > a,
			.site-header nav ul li.current-menu-parent > a,
			.site-header nav ul li.current-menu-parent li.current_page_item > a,
			.site-header nav ul li.current-menu-parent li.current-menu-item > a{
        background-color: <?php echo get_theme_mod('pe_menu_selected_color'); ?>;
      }

			/* Cor de Texto de Menu */

			.site-header nav ul li a{
				-webkit-transition: color  0.3s ease-in-out;
				color: <?php echo get_theme_mod('pe_menu_text_color');?>;
			}

      /* Cor de botoes */
      div.hd-search #searchsubmit{
        background-color: <?php echo get_theme_mod('pe_button_color');?>;
      }

			.btn{
				background-color: <?php echo get_theme_mod('pe_button_color');?>;
			}

			/* Cor de Texto de botao */
			div.hd-search #searchsubmit{
				color: <?php echo get_theme_mod('pe_button_textcolor');?>;
			}

			.btn{
				color: <?php echo get_theme_mod('pe_button_textcolor');?> !important;
			}

      /* Cor de Highlight de botao*/
      div.hd-search #searchsubmit:hover{
        background-color: <?php echo get_theme_mod('pe_highlightbtn_color');?>;
      }

			.btn:hover{
				background-color: <?php echo get_theme_mod('pe_highlightbtn_color');?>;
			}

			/* Cor de Footer */

			.site-footer{
			  background-color: <?php echo get_theme_mod('pe_footer_color');?>;
			}

			/* Cor de Texto de menu de Footer */

			.footer-menu a{
				color: <?php echo get_theme_mod('pe_footermenu_text_color');?>;
			}

			.footer-text{
				color: <?php echo get_theme_mod('pe_footermenu_text_color');?>;
			}

			.footer-widgets-area{
				color: <?php echo get_theme_mod('pe_footermenu_text_color');?>;
			}
			
			.footer-widgets-area caption{
				color: <?php echo get_theme_mod('pe_footermenu_text_color');?>;
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

// Adiciona Customizacao de Logo
function pergunteEspecialista_logo($wp_customize){
  $wp_customize->add_section('pe_logo_section', array(
    'title' => __('Logo do Site', 'Pergunte a um Especialista'),
  ));

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_logo_display', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_footer_callout_display_control', array(
     'label'=> 'Exibir Logo do Website?',
     'section'=> 'pe_logo_section',
     'settings'=> 'pe_logo_display',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  // Imagem
  $wp_customize->add_setting('pe_logo_image');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
  	'pe_logo_image_control', array(
    'label'=> 'Imagem',
    'section'=> 'pe_logo_section',
    'settings'=> 'pe_logo_image',
    'width'=> 1200,
    'height'=> 150,
  )));
}

add_action('customize_register', 'pergunteEspecialista_logo');

// Tipos de posts customizados

function pergunteEspecialista_custom_post_type(){
	// Slider
	$labels = array(
		'name' => 'Slider',
		'singular_name' => 'Slider',
		'add_new' => 'Adicionar Nova Imagem',
		'all_items' => 'Todas as Imagens',
		'add_new_item' => 'Adicionar Nova Imagem',
		'edit_item' => 'Editar Item',
		'new_item' => 'Novo Item',
		'view_item' => 'Ver Item',
		'search_items' => 'Procurar Slider',
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

// Perguntas

// Post type de perguntas
function pergunteEspecialista_perguntas_post_type(){

		$labels = array(
			'name' => 'Perguntas',
			'singular_name' => 'Pergunta',
			'add_new' => 'Adicionar Nova Pergunta',
			'all_items' => 'Todas as Perguntas',
			'add_new_item' => 'Adicionar Nova Pergunta',
			'edit_item' => 'Editar Item',
			'new_item' => 'Novo Item',
			'view_item' => 'Ver Item',
			'search_items' => 'Procurar Pergunta',
			'not_found' => 'Não foi encontrado nenhum item',
			'not_found_in_trash' => 'Não foi encontrado nenhum item na lixeira',
			'parent_item_colon' => 'Item Parente'
		);
		$args = array(
			'labels' => $labels,
			'show_ui' => true,
			'show_in_menu' => true,
			'hierarchical' => false,
			'menu_position' => 26,
			'menu_icon' => 'dashicons-email-alt',
			'capability_type' => 'post',
			'supports' => array(
				'editor',
				'title',
				'author'
			)
		);
		register_post_type('contact-pergunta', $args);
}

// Salva o Form
function pergunteEspecialistaSaveUserContactForm(){

	$title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$job = wp_strip_all_tags($_POST["job"]);
	$message = $_POST["message"];

$args = array(
	'post_title' => $title,
	'post_content' => $message,
	'post_author' => 1,
	'post_type' => 'contact-pergunta',
	'meta_input' => array(
		'_contact_email_value_key' => $email,
		'_contact_job_value_key' => $job
	)

);

	$post_id = wp_insert_post($args);

	echo $post_id;

	die();


}


add_action('wp_ajax_nopriv_pergunteEspecialistaSaveUserContactForm', 'pergunteEspecialistaSaveUserContactForm');
add_action('wp_ajax_pergunteEspecialistaSaveUserContactForm', 'pergunteEspecialistaSaveUserContactForm');


// Gera as colunas do post type
add_action('init','pergunteEspecialista_perguntas_post_type');

function pergunteEspecialista_set_perguntas_columns($columns){

		$newColumns = array();
		$newColumns['title'] = 'Nome Completo';
		$newColumns['message'] = 'Mensagem';
		$newColumns['email'] = 'Email';
		$newColumns['job'] = 'Profissão';
		$newColumns['date'] = 'Data';

		return $newColumns;
}

add_filter('manage_contact-pergunta_posts_columns', 'pergunteEspecialista_set_perguntas_columns');

// Escreve nas colunas
function pergunteEspecialista_perguntas_custom_column($column, $post_id){
	switch($column){

		case 'message':

			echo get_the_excerpt();
			break;

		case 'email':

			$email = get_post_meta( $post_id, '_contact_email_value_key', true);
			echo '<a href="mailto:"'.$email.'">'.$email.'</a>';
			break;

		case 'job':

		$job = get_post_meta( $post_id, '_contact_job_value_key', true);
		echo $job;
		break;
	}
}

add_action('manage_contact-pergunta_posts_custom_column', 'pergunteEspecialista_perguntas_custom_column', 10, 2);

// Adiciona a meta-box para colocar o email do contato
function pergunteEspecialista_pergunta_add_meta_box(){
	add_meta_box('contact_email', 'Email do Usuário', 'pergunteEspecialista_pergunta_email_callback', 'contact-pergunta', 'side');
	add_meta_box('contact_job', 'Profissão do Usuário', 'pergunteEspecialista_pergunta_job_callback', 'contact-pergunta', 'side');
}

add_action('add_meta_boxes', 'pergunteEspecialista_pergunta_add_meta_box');

function pergunteEspecialista_pergunta_email_callback($post){
	wp_nonce_field( 'pergunteEspecialista_save_contact_email_data','pergunteEspecialista_email_meta_box_nonce');

	$value = get_post_meta($post->ID,'_contact_email_value_key', true);

	echo '<label for="pergunteEspecialista_email_field">Email do Usuário</label>';
	echo '<input type="email" id="pergunteEspecialista_email_field" name="pergunteEspecialista_email_field" value="'.esc_attr($value).'"
	size="25"/>';
}

function pergunteEspecialista_pergunta_job_callback($post){
	wp_nonce_field( 'pergunteEspecialista_save_contact_job_data','pergunteEspecialista_job_meta_box_nonce');

	$value = get_post_meta($post->ID,'_contact_job_value_key', true);

	echo '<label for="pergunteEspecialista_job_field">Profissão do Usuário</label>';
	echo '<input type="text" id="pergunteEspecialista_job_field" name="pergunteEspecialista_job_field" value="'.esc_attr($value).'"
	size="25"/>';
}

// Funcao que salva a profissão da pergunta
function pergunteEspecialista_save_contact_job_data($post_id){

	if(!isset($_POST['pergunteEspecialista_job_meta_box_nonce'])){
		return;
	}

	if(!wp_verify_nonce($_POST['pergunteEspecialista_job_meta_box_nonce'],'pergunteEspecialista_save_contact_job_data')){
		return;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post',$post_id)){
		return;
	}

	if(!isset($_POST['pergunteEspecialista_job_field'])){
		return;
	}

	$my_data = sanitize_text_field($_POST['pergunteEspecialista_job_field']);

	update_post_meta($post_id, '_contact_job_value_key', $my_data);

}

add_action('save_post', 'pergunteEspecialista_save_contact_job_data');

// Funcao que salva o email da pergunta
function pergunteEspecialista_save_contact_email_data($post_id){

	if(!isset($_POST['pergunteEspecialista_email_meta_box_nonce'])){
		return;
	}

	if(!wp_verify_nonce($_POST['pergunteEspecialista_email_meta_box_nonce'],'pergunteEspecialista_save_contact_email_data')){
		return;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post',$post_id)){
		return;
	}

	if(!isset($_POST['pergunteEspecialista_email_field'])){
		return;
	}

	$my_data = sanitize_text_field($_POST['pergunteEspecialista_email_field']);

	update_post_meta($post_id, '_contact_email_value_key', $my_data);

}

add_action('save_post', 'pergunteEspecialista_save_contact_email_data');
?>
