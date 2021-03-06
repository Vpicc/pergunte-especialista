<?php
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
	$fonte = 'https://fonts.googleapis.com/css?family=' . str_replace(' ','+',get_theme_mod('pe_font_select'));
	wp_register_style('et-googleFonts', $fonte);
  wp_enqueue_style( 'et-googleFonts');
}
add_action('wp_print_styles', 'pe_load_fonts');

// Adiciona Customizacao de Menu
function pergunteEspecialista_customize_menu($wp_customize){
	// Seção de tamanho de menu
	$wp_customize->add_section('pe_menu_section', array(
    'title' => __('Tamanho de Menu', 'Pergunte a um Especialista'),
  ));

  // Margin top menu principal
  $wp_customize->add_setting('pe_margin_top_select', array(
    'default'=> '0',
  ));

	// Controle
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_margin_top_control', array(
     'label'=> 'Margin Top menu Principal',
     'section'=> 'pe_menu_section',
     'settings'=> 'pe_margin_top_select'
   )));

   // Margin top botao pesquisa
   $wp_customize->add_setting('pe_search_margin_top_select', array(
     'default'=> '0',
   ));

  // Controle
   $wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'pe_search_margin_top_control', array(
      'label'=> 'Margin Top Botão de Pesquisa',
      'section'=> 'pe_menu_section',
      'settings'=> 'pe_search_margin_top_select'
    )));

   // Width menu principal
   $wp_customize->add_setting('pe_width_select', array(
     'default'=> '150',
   ));

 	// Controle
   $wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'pe_width_control', array(
      'label'=> 'Width menu Principal',
      'section'=> 'pe_menu_section',
      'settings'=> 'pe_width_select'
    )));

	// Padding top
	$wp_customize->add_setting('pe_padding_top_select', array(
    'default'=> '40',
  ));

	// Controle
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_padding_top_control', array(
     'label'=> 'Padding Top',
     'section'=> 'pe_menu_section',
     'settings'=> 'pe_padding_top_select'
   )));

   // Padding bottom
   $wp_customize->add_setting('pe_padding_bottom_select', array(
      'default'=> '40',
    ));

   // Controle
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
     'pe_padding_bottom_control', array(
       'label'=> 'Padding bottom',
       'section'=> 'pe_menu_section',
       'settings'=> 'pe_padding_bottom_select'
     )));

   // Padding Side
   $wp_customize->add_setting('pe_padding_side_select', array(
      'default'=> '18',
    ));

   // Controle
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
     'pe_padding_side_control', array(
       'label'=> 'Padding Side',
       'section'=> 'pe_menu_section',
       'settings'=> 'pe_padding_side_select'
     )));


     // Margin top de submenu
     $wp_customize->add_setting('pe_menu_margin_top_select', array(
        'default'=> '64',
      ));

     // Controle
      $wp_customize->add_control(new WP_Customize_Control($wp_customize,
       'pe_menu_margin_top_control', array(
         'label'=> 'Margin Top de Submenu',
         'section'=> 'pe_menu_section',
         'settings'=> 'pe_menu_margin_top_select'
       )));

       // Padding vertical de submenu
     	$wp_customize->add_setting('pe_padding_vertical_submenu_select', array(
         'default'=> '10',
       ));

     	// Controle
       $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'pe_padding_vertical_submenu_control', array(
          'label'=> 'Padding Vertical de Submenu',
          'section'=> 'pe_menu_section',
          'settings'=> 'pe_padding_vertical_submenu_select'
        )));

       // Tamanho de fonte de botao de pesquisa
       $wp_customize->add_setting('pe_font_size_menu_select', array(
          'default'=> '16',
        ));

       // Controle
        $wp_customize->add_control(new WP_Customize_Control($wp_customize,
         'pe_font_size_menu_control', array(
           'label'=> 'Tamanho de fonte de menu',
           'section'=> 'pe_menu_section',
           'settings'=> 'pe_font_size_menu_select'
         )));

     	// Padding top de botao de pesquisa
     	$wp_customize->add_setting('pe_padding_top_search_select', array(
         'default'=> '14',
       ));

     	// Controle
       $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'pe_padding_top_search_control', array(
          'label'=> 'Padding Top de botao de pesquisa',
          'section'=> 'pe_menu_section',
          'settings'=> 'pe_padding_top_search_select'
        )));

      // Padding bottom de botao de pesquisa
      $wp_customize->add_setting('pe_padding_bottom_search_select', array(
         'default'=> '14',
       ));

      // Controle
       $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'pe_padding_bottom_search_control', array(
          'label'=> 'Padding bottom de botao de pesquisa',
          'section'=> 'pe_menu_section',
          'settings'=> 'pe_padding_bottom_search_select'
        )));

        // Padding side de botao de pesquisa
        $wp_customize->add_setting('pe_padding_side_search_select', array(
           'default'=> '5',
         ));

        // Controle
         $wp_customize->add_control(new WP_Customize_Control($wp_customize,
          'pe_padding_side_search_control', array(
            'label'=> 'Padding side de botao de pesquisa',
            'section'=> 'pe_menu_section',
            'settings'=> 'pe_padding_side_search_select'
          )));

          // Tamanho de fonte de botao de pesquisa
          $wp_customize->add_setting('pe_font_size_search_select', array(
             'default'=> '50',
           ));

          // Controle
           $wp_customize->add_control(new WP_Customize_Control($wp_customize,
            'pe_font_size_search_control', array(
              'label'=> 'Tamanho de botao de pesquisa',
              'section'=> 'pe_menu_section',
              'settings'=> 'pe_font_size_search_select'
            )));

}

add_action('customize_register', 'pergunteEspecialista_customize_menu');



// Saida de customizacao de CSS
function pergunteEspecialista_customize_css(){ ?>

    <style type="text/css">
			/* Cor de fundo e fonte */
			body{
				background-color: <?php echo get_theme_mod('pe_background_color'); ?>;
				font-family: <?php echo get_theme_mod('pe_font_select'); ?>, sans-serif;
				font-size: <?php echo get_theme_mod('pe_font_size'); ?>px;
			}

      p{
        font-size: <?php echo get_theme_mod('pe_font_size'); ?>px;
      }

      #front_content{
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
				-webkit-transition: color 0.3s ease-in-out;
				color: <?php echo get_theme_mod('pe_menu_text_color');?>;
			}

      /* Cor de botoes */
      div.hd-search #searchsubmit{
        background-color: <?php echo get_theme_mod('pe_button_color');?>;
      }

      #pe_search_button{
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

      #pe_search_button:hover{
        background-color: <?php echo get_theme_mod('pe_highlightbtn_color');?>;
      }

			.btn:hover{
				background-color: <?php echo get_theme_mod('pe_highlightbtn_color');?>;
			}

			/* Cor de Footer */

			.site-footer{
			  background-color: <?php echo get_theme_mod('pe_footer_color');?>;
			}

      .footer-widgets{
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

      .footer-callout{
        background-color: <?php echo get_theme_mod('pe_footer_callout_background_color');?>;
      }

      .footer-callout-text{
        color: <?php echo get_theme_mod('pe_footer_callout_text_color');?>;
      }

      /* Margin de Menu */

      .site-header nav{
        margin-top: <?php echo get_theme_mod('pe_margin_top_select');?>px;
      }

      button#pe_search_button{
        margin-top: <?php echo get_theme_mod('pe_search_margin_top_select');?>px;
      }

      /* Width de Menu */

      .site-header nav ul li{
        width: <?php echo get_theme_mod('pe_width_select');?>px;
      }

      .site-header nav ul ul li{
        width: <?php echo get_theme_mod('pe_width_select');?>px;
      }

      .site-header nav ul ul ul ul{
        margin-left: <?php echo get_theme_mod('pe_width_select');?>px;
      }

      .site-header nav ul ul ul{
        margin-left: <?php echo get_theme_mod('pe_width_select');?>px;
      }

      /* Padding de Menu */

      .site-header nav ul li a:link,
      .site-header nav ul li a:visited{
        padding-top: <?php echo get_theme_mod('pe_padding_top_select');?>px;
        padding-bottom: <?php echo get_theme_mod('pe_padding_bottom_select');?>px;
        padding-left: <?php echo get_theme_mod('pe_padding_side_select');?>px;
        padding-right: <?php echo get_theme_mod('pe_padding_side_select');?>px;
      }

      /* Tamanho de fonte de Menu */

      .site-header nav ul li a:link,
      .site-header nav ul li a:visited{
        font-size: <?php echo get_theme_mod('pe_font_size_menu_select');?>px;
      }


      /* Margin de submenu */

      .site-header ul ul {
        margin-top: <?php echo get_theme_mod('pe_menu_margin_top_select');?>px;
      }

      /* Padding de submenu */

      .site-header ul ul li a:link,
      .site-header ul ul li a:visited{
      	padding-top: <?php echo get_theme_mod('pe_padding_vertical_submenu_select');?>px;
      	padding-bottom:<?php echo get_theme_mod('pe_padding_vertical_submenu_select');?>px;
      }

      /* Botao de pesquisa */
      #pe_search_button{
        padding-top: <?php echo get_theme_mod('pe_padding_top_search_select');?>px;
        padding-bottom: <?php echo get_theme_mod('pe_padding_bottom_search_select');?>px;
        padding-right: <?php echo get_theme_mod('pe_padding_side_search_select');?>px;
        padding-left:<?php echo get_theme_mod('pe_padding_side_search_select');?>px;
        font-size: <?php echo get_theme_mod('pe_font_size_search_select');?>px;
      }

      /* Imagem de fundo */

      body{
        background-image: url("<?php echo wp_get_attachment_url(get_theme_mod('pe_background_image_setting')); ?>") !important;
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
     'label'=> 'Exibir Callout no Footer do Website?',
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

      // Cor de fundo

      $wp_customize->add_setting('pe_footer_callout_background_color', array(
    		'default'=> '#DDD',
    		'transport'=> 'refresh',
    	));

    	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_footer_callout_background_color_control', array(
    		'label'=> __('Cor do fundo','Pergunte a um Especialista'),
    		'section'=> 'pe_footer_callout_section',
    		'settings'=> 'pe_footer_callout_background_color',
    	)));

    	// Cor de texto de callout de footer
    	$wp_customize->add_setting('pe_footer_callout_text_color', array(
    		'default'=> '#000',
    		'transport'=> 'refresh',
    	));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pe_footer_callout_text_color_control', array(
      	'label'=> __('Cor do texto','Pergunte a um Especialista'),
      	'section'=> 'pe_footer_callout_section',
      	'settings'=> 'pe_footer_callout_text_color',
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
   'pe_logo_display_control', array(
     'label'=> 'Exibir Logo do Website?',
     'section'=> 'pe_logo_section',
     'settings'=> 'pe_logo_display',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Top'=>'Em cima', 'Side'=> 'Ao lado')
  )));

  // Imagem

  $wp_customize->add_setting('pe_logo_top_image');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
  	'pe_logo_image_top_control', array(
    'label'=> 'Imagem',
    'section'=> 'pe_logo_section',
    'settings'=> 'pe_logo_top_image',
    'width'=> 1200,
    'height' => 150,
    'flex_width' => true,
    'flex_height' => true
  )));


}

add_action('customize_register', 'pergunteEspecialista_logo');

// Imagem de fundo

function pergunteEspecialista_background_image($wp_customize){
  $wp_customize->add_section('pe_background_image_section', array(
    'title' => __('Imagem de fundo', 'Pergunte a um Especialista'),
  ));

  // Imagem

  $wp_customize->add_setting('pe_background_image_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
  	'pe_background_image_control', array(
    'label'=> 'Imagem',
    'section'=> 'pe_background_image_section',
    'settings'=> 'pe_background_image_setting',
    'flex_width' => true,
    'flex_height' => true
  )));


}

add_action('customize_register', 'pergunteEspecialista_background_image');


// Adiciona links rapidos em imagens

function pergunteEspecialista_quick_img($wp_customize){
  $wp_customize->add_section('pe_quick_img_section', array(
    'title' => __('Links Rapidos em Imagens', 'Pergunte a um Especialista'),
  ));

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_quick_img_display1', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display1_control', array(
     'label'=> 'Exibir Link Rapido 1?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display1',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  // Imagem 1

  $wp_customize->add_setting('pe_quick_image1_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
  	'pe_quick_image1_control', array(
    'label'=> 'Imagem 1',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image1_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image1_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image1_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image1_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image1_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image1_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image1_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image1_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image1_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image1_text',
     'type'=> 'textarea'
   )));


  // Imagem 2

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_quick_img_display2', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display2_control', array(
     'label'=> 'Exibir Link Rapido 2?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display2',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  $wp_customize->add_setting('pe_quick_image2_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'pe_quick_image2_control', array(
    'label'=> 'Imagem 2',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image2_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image2_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image2_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image2_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image2_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image2_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image2_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image2_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image2_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image2_text',
     'type'=> 'textarea'
   )));


  // Imagem 3

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_quick_img_display3', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display3_control', array(
     'label'=> 'Exibir Link Rapido 3?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display3',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  $wp_customize->add_setting('pe_quick_image3_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
  	'pe_quick_image3_control', array(
    'label'=> 'Imagem 3',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image3_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image3_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image3_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image3_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image3_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image3_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image3_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image3_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image3_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image3_text',
     'type'=> 'textarea'
   )));


  // Imagem 4

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_quick_img_display4', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display4_control', array(
     'label'=> 'Exibir Link Rapido 4?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display4',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  $wp_customize->add_setting('pe_quick_image4_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'pe_quick_image4_control', array(
    'label'=> 'Imagem 4',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image4_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image4_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image4_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image4_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image4_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image4_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image4_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image4_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image4_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image4_text',
     'type'=> 'textarea'
   )));


  // Imagem 5

  // Pergunta se quer ou nao exibir
  $wp_customize->add_setting('pe_quick_img_display5', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display5_control', array(
     'label'=> 'Exibir Link Rapido 5?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display5',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  $wp_customize->add_setting('pe_quick_image5_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'pe_quick_image5_control', array(
    'label'=> 'Imagem 5',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image5_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image5_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image5_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image5_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image5_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image5_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image5_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image5_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image5_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image5_text',
     'type'=> 'textarea'
   )));


  // Imagem 6

  // Pergunta se quer ou nao exibir

  $wp_customize->add_setting('pe_quick_img_display6', array(
    'default'=> 'No',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_img_display6_control', array(
     'label'=> 'Exibir Link Rapido 6?',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_img_display6',
     'type'=> 'select',
     'choices'=> array('No'=> 'Não', 'Yes'=>'Sim')
  )));

  $wp_customize->add_setting('pe_quick_image6_setting');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'pe_quick_image6_control', array(
    'label'=> 'Imagem 6',
    'section'=> 'pe_quick_img_section',
    'settings'=> 'pe_quick_image6_setting',
    'width' => 100,
    'height' => 100
  )));

  // Titulo
  $wp_customize->add_setting('pe_quick_image6_headline', array(
    'default'=> '',
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image6_headline_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image6_headline'
   )));


  // Link
  $wp_customize->add_setting('pe_quick_image6_link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image6_link_control', array(
     'label'=> 'Link',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image6_link',
     'type'=> 'dropdown-pages'
   )));

  // Texto
  $wp_customize->add_setting('pe_quick_image6_text', array(
    'default'=> '',
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,
   'pe_quick_image6_text_control', array(
     'label'=> 'Título',
     'section'=> 'pe_quick_img_section',
     'settings'=> 'pe_quick_image6_text',
     'type'=> 'textarea'
   )));



}

add_action('customize_register', 'pergunteEspecialista_quick_img');




 ?>
