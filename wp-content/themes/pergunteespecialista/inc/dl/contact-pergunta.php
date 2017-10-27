<article class="post <?php if(has_post_thumbnail()){ ?>has-thumbnail <?php } ?>">

  <!-- post-thumbnail -->
  <div class="post-thumbnail">
    <?php
    if(has_post_thumbnail())
      echo 'Imagem destacada:<br><br>';
    the_post_thumbnail('small-thumbnail'); ?>
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

          $output .= $category->cat_name . $separator;
        }

        echo trim($output, $separator);
      }
      echo '<br>ID do Post: ' . get_the_id() . '<br>';
      echo 'Permalink: '. get_the_permalink(get_the_id()) . '<br>';
       ?>

    <blockquote>
      <?php
        $unformatted_pergunta = get_post_meta( get_the_id(), '_perguntas_editor', true);
        $formatted_pergunta = apply_filters('meta_content', $unformatted_pergunta);
        echo $formatted_pergunta;
      ?>
    </blockquote>
    <b><?php echo "Respondido por: " . get_post_meta( get_the_id(), '_author_value_key', true);?> </b>
      <br><br>
      <?php
        $unformatted_resposta = get_post_meta( get_the_id(), '_respostas_editor', true);
        $formatted_resposta = apply_filters('meta_content', $unformatted_resposta);
        echo $formatted_resposta;
        the_content();
      ?>
      <br>


</article>
