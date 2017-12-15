<?php
get_header();

global $wpdb;?>

  <?php

  //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  $searchword = esc_sql($_GET['s']);
  $output = htmlentities($_GET['s'], 0, "UTF-8");
  if ($output == "") {
      $output = htmlentities(utf8_encode($_GET['s']), 0, "UTF-8");
  }
  $searchwordHTML = esc_sql($output);

 $querystr = "
    (SELECT DISTINCT $wpdb->posts.*
    FROM $wpdb->posts, $wpdb->postmeta
    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
    AND (($wpdb->postmeta.meta_key = '_respostas_editor'
    AND $wpdb->postmeta.meta_value LIKE '%$searchword%')
    OR ($wpdb->postmeta.meta_key = '_perguntas_editor'
    AND $wpdb->postmeta.meta_value LIKE '%$searchword%')
    OR ($wpdb->postmeta.meta_key = '_author_value_key'
    AND $wpdb->postmeta.meta_value LIKE '%$searchword%')
    OR ($wpdb->postmeta.meta_key = '_respostas_editor'
    AND $wpdb->postmeta.meta_value LIKE '%$searchwordHTML%')
    OR ($wpdb->postmeta.meta_key = '_perguntas_editor'
    AND $wpdb->postmeta.meta_value LIKE '%$searchwordHTML%')
    OR ($wpdb->postmeta.meta_key = '_author_value_key'
    AND $wpdb->postmeta.meta_value LIKE '%$searchwordHTML%'))
    AND $wpdb->posts.post_status = 'publish'
    AND $wpdb->posts.post_type = 'contact-pergunta'
    AND $wpdb->posts.post_date < NOW())
    UNION
    (SELECT DISTINCT $wpdb->posts.*
    FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
    AND ($wpdb->posts.post_title LIKE '%$searchword%'
    OR $wpdb->posts.post_title LIKE '%$searchwordHTML%'
    OR $wpdb->posts.post_content LIKE '%$searchword%'
    OR $wpdb->posts.post_content LIKE '%$searchwordHTML%'))
    ORDER BY post_date DESC
 ";

 $pageposts = $wpdb->get_results($querystr);

 $perguntas_array = array();

 if ($pageposts){?>
   <h2>Resultados da Pesquisa: <?php the_search_query(); ?></h2>
   <?php
   global $post;
   foreach ($pageposts as $post){
     setup_postdata($post);
     array_push($perguntas_array, get_the_id());
   }


   $arg2 = array(
   'post_type' => 'any',
   'post__in' => $perguntas_array,
   'orderby' => 'date',
   'posts_per_page' => -1,
   'ignore_sticky_posts' => 1

   );

   $final_query = new WP_Query($arg2);

   while($final_query->have_posts()){$final_query->the_post();
     if( 'contact-pergunta' != $post->post_type ){
       get_template_part('content', get_post_format());
     } else{
       get_template_part('content-contact-pergunta', get_post_format());
     }
   }

  // echo paginate_links();
    wp_reset_postdata();

 }else{ ?>
   <h2>
     Não foi encontrado nenhum post para a pesquisa: <?php the_search_query(); ?>
   </h2>
 <?php }

 get_footer();

 ?>
