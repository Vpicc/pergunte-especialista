<?php get_header(); ?>

<?php
// adiciona slider
$args = array(
  'post_type' => 'slider',
  'orderby' => 'menu_order',
  'posts_per_page' => -1
);
$slides =new WP_Query($args);
if($slides->have_posts()){ ?>
    <ul class="bxslider">
  <?php while($slides->have_posts()){ $slides->the_post(); ?>
      <li>
        <?php the_post_thumbnail('slides'); ?>
            <div class="textDetail"><p><?php echo get_the_title(); ?></p></div>
      </li>

<?php } ?>
    </ul>
<?php } // fim de slider?>

  <div class="front-page clearfix">
    <?php
    if(have_posts()){
    while(have_posts()){ the_post();
    ?>

    <h2><?php the_title(); ?><h2>
    <?php the_content();?>

    <?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
    } ?>

  </div>

  <div class="front-posts">
    <?php // Loop dos ultimos posts
    if ( get_query_var( 'paged' ) ) { $ourCurrentPage = get_query_var( 'paged' ); }
    elseif ( get_query_var( 'page' ) ) { $ourCurrentPage = get_query_var( 'page' ); }
    else { $ourCurrentPage = 1; }


    $allPosts = new WP_Query(array(
      'post_type'=> 'post',
      'posts_per_page'=> 4,
      'paged'=> $ourCurrentPage
    ));
    if($allPosts->have_posts()){
      while($allPosts->have_posts()){ $allPosts->the_post(); ?>

        <?php get_template_part('content', get_post_format()); ?>
      <?php }

      echo paginate_links(array(
        'total'=> $allPosts->max_num_pages,
        'current'=> $ourCurrentPage,
        'prev_next'=> true
      ));

    } else {
        echo 'Não foi encontrado nenhum post</p>';
      }
    wp_reset_postdata();
    ?>  </div>
<?php get_footer(); ?>
