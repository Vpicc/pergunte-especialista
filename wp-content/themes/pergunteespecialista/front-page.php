<?php get_header(); ?>

<?php
// adiciona slider
$args = array(
  'post_type' => 'slider',
  'orderby' => 'menu_order',
  'posts_per_page' => -1
);
$slides =new WP_Query($args);
if($slides->have_posts()){ ?>
    <ul class="bxslider">
  <?php while($slides->have_posts()){ $slides->the_post(); ?>
      <li>
        <?php the_post_thumbnail('slides'); ?>
            <div class="textDetail"><p><?php echo get_the_title(); ?></p></div>
      </li>

<?php } ?>
    </ul>
<?php } // fim de slider?>

  <div class="front-page clearfix">
    <?php
    if(have_posts()){
    while(have_posts()){ the_post();
    ?>

    <h2><?php the_title(); ?><h2>
    <p id="front_content"><?php echo get_the_content();?></p>

    <?php }} else {
    echo 'Não foi encontrado nenhum post';
    } ?>

  </div>
  <?php if(get_theme_mod('pe_quick_img_display') == "Yes"){ ?>
  <div class="quick-img container">
    <div class="quick-row row">
      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image1_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image1_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image1_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image1_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image1_text')); ?>

        </div>

      </div>

      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image2_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image2_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image2_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image2_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image2_text')); ?>

        </div>

      </div>

      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image3_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image3_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image3_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image3_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image3_text')); ?>

        </div>

      </div>
    </div>
    <div class="quick-row row">
      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image4_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image4_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image4_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image4_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image4_text')); ?>

        </div>

      </div>

      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image5_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image5_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image5_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image5_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image5_text')); ?>

        </div>

      </div>

      <div class="quick-column col-md-4">
        <div class="quick-img-single">
          <a href="<?php echo get_permalink(get_theme_mod('pe_quick_image6_link')); ?>">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('pe_quick_image6_setting')); ?>"></a>
        </div>
        <div class="quick-img-text">
          <p><a href="<?php echo get_permalink(get_theme_mod('pe_quick_image6_link')); ?>">
            <?php echo get_theme_mod('pe_quick_image6_headline'); ?></a></p>
              <?php echo wpautop(get_theme_mod('pe_quick_image6_text')); ?>
        </div>

      </div>


    </div>

  </div>
  <?php } ?>

  <div class="front-posts">
    <?php // Loop dos ultimos posts
    if ( get_query_var( 'paged' ) ) { $ourCurrentPage = get_query_var( 'paged' ); }
    elseif ( get_query_var( 'page' ) ) { $ourCurrentPage = get_query_var( 'page' ); }
    else { $ourCurrentPage = 1; }


    $allPosts = new WP_Query(array(
      'post_type'=> 'post',
      'posts_per_page'=> 4,
      'paged'=> $ourCurrentPage
    ));
    if($allPosts->have_posts()){
      while($allPosts->have_posts()){ $allPosts->the_post(); ?>

        <?php get_template_part('content', get_post_format()); ?>
      <?php }

      echo paginate_links(array(
        'total'=> $allPosts->max_num_pages,
        'current'=> $ourCurrentPage,
        'prev_next'=> true
      ));

    } else {
        echo 'Não foi encontrado nenhum post';
      }
    wp_reset_postdata();
    ?>  </div>
<?php get_footer(); ?>
