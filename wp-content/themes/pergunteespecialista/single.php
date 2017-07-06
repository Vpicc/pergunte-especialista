<?php
get_header();


  if(have_posts()){
    while(have_posts()){the_post();

?>
<div class="post-body">

  <article class="post">



    <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
      <p class="post-info"><?php
        the_time('j');
        echo " de ";
        the_time('F, Y');
        echo " às ";
        the_time('h:m');
        ?> | Por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a> | Postado em

        <?php $categories = get_the_category();
        $separator = ", ";
        $output = '';

        if($categories){

          foreach($categories as $category){

            $output .= '<a href="' . get_category_link($category->term_id). '">'  . $category->cat_name . '</a>' . $separator;
          }

          echo trim($output, $separator);
        }

         ?>

      </p>

      <!-- post-thumbnail -->
      <div>
        <?php the_post_thumbnail('banner-image'); ?>
      </div><!-- /post-thumbnail -->

      <?php the_content();?>

  </article>

<?php }

if(comments_open()){
  comments_template();
}



} else {
    echo 'Não foi encontrado nenhum post</p>';
  } ?>
</div>

<?php get_footer(); ?>
