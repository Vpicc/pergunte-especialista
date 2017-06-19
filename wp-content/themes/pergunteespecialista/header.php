<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>

  <div class="container">

    <!-- site-header -->
    <header class="site-header">
      <?php if(get_theme_mod('pe_logo_display') == "Yes"){ ?>
        <div class="site-logo">
          <a href="<?php echo home_url();?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_logo_image')); ?>"></a>
        </div>
      <?php } else { ?>
        <h1><a href="<?php echo home_url();?>"><?php bloginfo('name'); ?></a></h1>
        <h5><?php bloginfo('description'); ?></h5>
      <?php } ?>
      <div class="hd-search">
        <?php get_search_form(); ?>
      </div>

      <nav class="site-nav">
        <?php
        $args = array(
          'theme_location' => 'primary',
          'echo' => FALSE,
        );
        $array_menu = wp_nav_menu( $args );
        echo $array_menu;
        ?>
      </nav>

    </header><!-- /site-header -->
