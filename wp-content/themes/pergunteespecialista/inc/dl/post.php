<article class="post <?php if(has_post_thumbnail()){ ?>has-thumbnail <?php } ?>">

  <!-- post-thumbnail -->
  <div class="post-thumbnail">
    <?php the_post_thumbnail('small-thumbnail'); ?>
  </div><!-- /post-thumbnail -->

  <h2 class="post-title"><?php the_title(); ?></h2>
    <p class="post-info"><?php
      the_time('j');
      echo " de ";
      the_time('F, Y');
      echo " às ";
      the_time('h:m');
      ?> | Postado em

      <?php $categories = get_the_category();
      $separator = ", ";
      $output = '';

      if($categories){

        foreach($categories as $category){

          $output .= $category->cat_name  . $separator;
        }

        echo trim($output, $separator);
      }

       ?>

    </p>
    <?php
    echo '<br>ID do Post: ' . get_the_id() . '<br>';
    echo 'Permalink: '. get_the_permalink(get_the_id()) . '<br>';
    the_content();
    ?>

</article>
