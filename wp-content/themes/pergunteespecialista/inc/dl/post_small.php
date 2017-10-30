<article class="post">
  <h2 class="post-title"><?php the_title(); ?></h2>
      <?php
      echo '<br>ID do Post: ' . get_the_id() . '<br>';
      echo 'Permalink: '. get_the_permalink(get_the_id()) . '<br>';
       ?>
      <br>
      <?php
        $result = $wpdb->get_results('SELECT '. $wpdb->prefix .'post_views.count FROM `'.$wpdb->prefix.'post_views` WHERE id = '. get_the_id() .' AND type = 4');
        if($result){
          echo "Total de Visualizações: ". $result[0]->count;
        }else {
          echo "Total de Visualizações: 0";
        }
      ?>
      <br>
</article>
