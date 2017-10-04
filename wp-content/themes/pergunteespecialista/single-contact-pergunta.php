<?php
get_header();

 if(is_active_sidebar('sidebar1')){ ?>
   <div class="site-content clearfix">
    <div class="main-column">

<?php
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

      <!-- post-thumbnail -->
      <div>
        <?php the_post_thumbnail('banner-image'); ?>
      </div><!-- /post-thumbnail -->

      <blockquote>
        <?php echo get_post_meta( get_the_id(), '_perguntas_editor', true)?>
      </blockquote>
      <b><?php echo "Respondido por: " . get_post_meta( get_the_id(), '_author_value_key', true)?> </b>
        <br><br>
        <?php echo get_post_meta( get_the_id(), '_respostas_editor', true)?>
    </article>

  </article>

<?php }

if(comments_open()){
  comments_template('', true );
}



} else {
    echo 'Não foi encontrado nenhum post</p>';
  } ?>
</div> </div> <?php get_sidebar();?> </div> <?php } else{
  if(have_posts()){
    while(have_posts()){the_post();

  ?><div class="post-body">

    <article class="post">



      <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
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

      <blockquote>
        <?php echo get_post_meta( get_the_id(), '_perguntas_editor', true)?>
      </blockquote>
      <b><?php echo "Respondido por: " . get_post_meta( get_the_id(), '_author_value_key', true)?> </b>
        <br><br>
        <?php echo get_post_meta( get_the_id(), '_respostas_editor', true)?>
    </article>

  <?php }
  if(comments_open()){
    comments_template('', true );
  }



  } else {
      echo 'Não foi encontrado nenhum post</p>';
    } ?>
  </div> <?php } ?>

<?php get_footer(); ?>