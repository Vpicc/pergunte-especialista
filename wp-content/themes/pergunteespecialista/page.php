<?php get_header(); ?>
<?php if(is_active_sidebar('sidebar1')){ ?>
  <div class="site-content clearfix">

    <div class="main-column">

    <?php if(have_posts()){
      while(have_posts()){ the_post(); ?>
      <?php get_template_part('content-page', get_post_format()); ?>

    <?php }}
    else{
      echo 'Não foi encontrado nenhum post</p>';
    } ?>
    </div>

    <?php get_sidebar(); ?>

  </div>
  <?php } else{ ?>
  <?php
  if(have_posts()){
  while(have_posts()){the_post();
    get_template_part('content-page', get_post_format());
  ?>

  <?php }} else {
  echo 'Não foi encontrado nenhum post</p>';
  }} ?>

<?php get_footer(); ?>
