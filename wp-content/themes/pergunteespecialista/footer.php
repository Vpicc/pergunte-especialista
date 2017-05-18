  <footer class="site-footer">
    <div class="footer-widgets">

      <?php if (is_active_sidebar('footer1')){ ?>
        <div class="footer-widgets-area">
        <?php dynamic_sidebar('footer1'); ?>
        </div>
      <?php } ?>

      <?php if (is_active_sidebar('footer2')){ ?>
        <div class="footer-widgets-area">
        <?php dynamic_sidebar('footer2'); ?>
        </div>
      <?php } ?>

      <?php if (is_active_sidebar('footer3')){ ?>
        <div class="footer-widgets-area">
        <?php dynamic_sidebar('footer3'); ?>
        </div>
      <?php } ?>

      <?php if (is_active_sidebar('footer4')){ ?>
        <div class="footer-widgets-area">
        <?php dynamic_sidebar('footer4'); ?>
        </div>
      <?php } ?>

    </div>
      <p><?php bloginfo('name');?> - &copy; <?php echo date('Y');?></p>

      <?php
      $args = array(
        'theme_location' => 'footer'
      );
      ?>
      <nav class="site-nav">
        <?php wp_nav_menu( $args ); ?>
      </nav>
  </footer>


</div> <!-- Container -->

<?php wp_footer(); ?>
</body>
</html>
