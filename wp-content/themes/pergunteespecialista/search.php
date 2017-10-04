<?php
get_header();


  if(have_posts()){ ?>
    <h2>Resultados da Pesquisa: <?php the_search_query(); ?></h2>

    <?php
    while(have_posts()){the_post();
      if( 'contact-pergunta' != $post->post_type ){
        get_template_part('content', get_post_format());
      } else{
        get_template_part('content-contact-pergunta', get_post_format());
      }
    ?>

<?php }
  echo paginate_links();
} else { ?>
    <h2>
      Não foi encontrado nenhum post para a pesquisa: <?php the_search_query(); ?>
    </h2>
<?php  }

get_footer();

 ?>
