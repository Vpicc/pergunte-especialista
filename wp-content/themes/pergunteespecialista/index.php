<?php
get_header();

query_posts( 'posts_per_page=5' );
  if(have_posts()){
    while(have_posts()){the_post();

?>
  <article class="post">
    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a><h2>
    <?php the_content();?>
  </article>

<?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>
