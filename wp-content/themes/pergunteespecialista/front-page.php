<?php get_header(); ?>
<?php if(is_active_sidebar('sidebar1')){ ?>
  <div class="front-page clearfix">

    <?php
    if(have_posts()){
    while(have_posts()){ the_post();
    ?>

    <h2><?php the_title(); ?><h2>
    <?php the_content();?>

    <?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
    }} ?>

  </div>

  <div class="front-posts">
    <?php // Loop dos ultimos posts

    $allPosts = new WP_Query('post_type=post&posts_per_page=4');
    if($allPosts->have_posts()){
      while($allPosts->have_posts()){ $allPosts->the_post(); ?>

        <?php get_template_part('content', get_post_format()); ?>

      <?php }} else {
        echo 'Não foi encontrado nenhum post</p>';
      }
    wp_reset_postdata();
    ?>
  </div>
<?php get_footer(); ?>
