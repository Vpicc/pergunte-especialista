  <footer class="site-footer">

    <?php if(get_theme_mod('pe_footer_callout_display') == "Yes"){?>
    <div class="footer-callout clearfix">
        <div class="footer-callout-image">
          <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_footer_callout_image')); ?>">
        </div>
        <div class="footer-callout-text">
          <h2><a href="<?php echo get_permalink(get_theme_mod('pe_footer_callout_link')); ?>">
            <?php echo get_theme_mod('pe_footer_callout_headline'); ?></a></h2>
            <?php echo wpautop(get_theme_mod('pe_footer_callout_text')); ?>
        </div>
    </div>
    <?php } ?>
    <div class="container">
    <div class="row footer-widgets">


        <div class="col-sm-3 footer-widgets-area">
            <?php if (is_active_sidebar('footer1')){ ?>
              <?php dynamic_sidebar('footer1'); ?>
            <?php } ?>
        </div>



        <div class="col-sm-3 footer-widgets-area">
            <?php if (is_active_sidebar('footer2')){ ?>
              <?php dynamic_sidebar('footer2'); ?>
            <?php } ?>
        </div>



        <div class="col-sm-3 footer-widgets-area">
          <?php if (is_active_sidebar('footer3')){ ?>
            <?php dynamic_sidebar('footer3'); ?>
          <?php } ?>
        </div>



        <div class="col-sm-3 footer-widgets-area">
          <?php if (is_active_sidebar('footer4')){ ?>
            <?php dynamic_sidebar('footer4'); ?>
          <?php } ?>
        </div>


    </div>
  </div>

      <p class="footer-text clearfix"><?php bloginfo('name');?> - &copy; <?php echo date('Y');?></p>

      <?php
      $args = array(
        'theme_location' => 'footer'
      );
      ?>
      <nav class="footer-menu">
        <?php wp_nav_menu( $args ); ?>
      </nav>
  </footer>


</div> <!-- Container -->

<?php wp_footer(); ?>
</body>
</html>
