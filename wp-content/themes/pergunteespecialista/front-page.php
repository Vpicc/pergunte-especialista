<?php get_header(); ?>
<?php if(is_active_sidebar('sidebar1')){ ?>
  <div class="front-page clearfix">

    <?php
    if(have_posts()){
    while(have_posts()){the_post();
    ?>

    <h2><?php the_title(); ?><h2>
    <?php the_content();?>

    <?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
    }} ?>

  </div>
<?php get_footer(); ?>
