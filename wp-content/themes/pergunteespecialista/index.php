<?php
get_header();


  if(have_posts()){
    while(have_posts()){the_post();

?>
  <article class="post">
    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a><h2>
    <h3><?php the_content();?></h3>
  </article>

<?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>
