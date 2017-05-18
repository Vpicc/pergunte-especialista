<?php
get_header();


  if(have_posts()){ ?>
    <h2>Resultados da Pesquisa: <?php the_search_query(); ?></h2>
    <?php
    while(have_posts()){the_post();
      get_template_part( 'content', get_post_format());
    ?>


<?php }
  echo paginate_links();
} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>
