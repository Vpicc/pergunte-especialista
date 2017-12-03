<?php
get_header();

$output = htmlentities($_GET['s'], 0, "UTF-8");
if ($output == "") {
    $output = htmlentities(utf8_encode($_GET['s']), 0, "UTF-8");
}

//Query para o campo de perguntas, respostas e autor
  $args = array(
  'post_type'  => array('contact-pergunta'),
  'posts_per_page' => 10,
  'meta_query' => array(
     'relation' => 'OR',
      array(
          'key'     => '_perguntas_editor',
          'value'   => esc_sql($_GET['s']),
          'compare' => 'LIKE'
      ),
      array(
          'key'     => '_respostas_editor',
          'value'   => esc_sql($_GET['s']),
          'compare' => 'LIKE'
      ),
      array(
          'key'     => '_author_value_key',
          'value'   => esc_sql($_GET['s']),
          'compare' => 'LIKE'
      ),
      array(
          'key'     => '_perguntas_editor',
          'value'   => esc_sql($output),
          'compare' => 'LIKE',
    			'type'		=> 'CHAR'
      ),
      array(
          'key'     => '_respostas_editor',
          'value'   => esc_sql($output),
          'compare' => 'LIKE',
    			'type'		=> 'CHAR'
      ),
      array(
          'key'     => '_author_value_key',
          'value'   => esc_sql($output),
          'compare' => 'LIKE',
    			'type'		=> 'CHAR'
      )
  )
);

$search_query = new WP_Query( $args );

if ( $search_query->have_posts() || have_posts() ) {?>

  <h2>Resultados da Pesquisa: <?php the_search_query(); ?></h2>
<?php
  $perguntas_array = array();
  $posts_array = array();
  if($search_query->have_posts()){
    while( $search_query->have_posts() ) {$search_query->the_post();
        array_push($perguntas_array, get_the_id());
    }
  }


// Query para posts e titulos de respostas
  if(have_posts()){ ?>

    <?php
    while(have_posts()){the_post();
      array_push($perguntas_array, get_the_id());
    ?>
<?php }}
  // Une os posts e perguntas, descarta os repetidos e organiza por data
    $mergePosts = array_merge( $perguntas_array, $posts_array );
    $uniquePosts = array_unique($mergePosts);

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $arg2 = array(
    'post_type' => 'any',
    'post__in' => $uniquePosts,
    'paged' => $paged,
    'orderby' => 'date',
    'posts_per_page' => 10,
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

    echo paginate_links(array(
      'total'=> $final_query->max_num_pages,
      'prev_next'=> true));
    wp_reset_postdata();

} else { ?>
    <h2>
      Não foi encontrado nenhum post para a pesquisa: <?php the_search_query(); ?>
    </h2>
<?php  }

get_footer();

 ?>
