<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>

  <div id="pe_popout" class="mob-nav">
    <div class="mob-nav-container">
      <div class="mob-nav-scroll">
  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mob-menu' ) ); ?>

      </div>
    </div>
      <a id="pe_closeButton">X</a>
  </div>

  <div class="site-container">


    <!-- site-header -->
    <header class="site-header">
      <?php if(get_theme_mod('pe_logo_display') == "Top"){ ?>
        <div class="site-logo">
          <a href="<?php echo home_url();?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_logo_top_image')); ?>"></a>
        </div>
      <?php } else if(get_theme_mod('pe_logo_display') == "Side"){?>
        <div class="site-logo-side">
          <a href="<?php echo home_url();?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_logo_top_image')); ?>"></a>
        </div>
      <?php } else{ ?>
        <h1><a href="<?php echo home_url();?>"><?php bloginfo('name'); ?></a></h1>
        <h5><?php bloginfo('description'); ?></h5>
      <?php } ?>

      <button id="pe_search_button" class="btn"><div class="looking-glass-rotate">
          &#9906;
        </div>
    </button>



<a  class="btn" id="pe_toggle">&#9776;</a>





      <nav class="site-nav" id="nav-wrap">
        <?php
        $args = array(
          'theme_location' => 'primary',
          'echo' => FALSE,
        );
        $array_menu = wp_nav_menu( $args );
        echo $array_menu;
        ?>
      </nav>
      <div class="hd-search">
        <?php get_search_form(); ?>
      </div>
    </header><!-- /site-header -->
