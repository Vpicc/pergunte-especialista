<?php
get_header();


  if(have_posts()){
    while(have_posts()){the_post();
      get_template_part('content', get_post_format());
    ?>

<?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>
