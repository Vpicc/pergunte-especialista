<article class="post <?php if(has_post_thumbnail()){ ?>has-thumbnail <?php } ?>">

  <!-- post-thumbnail -->
  <div class="post-thumbnail">
    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
  </div><!-- /post-thumbnail -->

  <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
    <p class="post-info"><?php
      the_time('j');
      echo " de ";
      the_time('F, Y');
      echo " às ";
      the_time('G:i');
      ?> | Postado em

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

    <p><?php echo get_the_excerpt();?>
      <a href="<?php the_permalink(); ?>">Ler mais&raquo;</a>
    </p>

</article>
