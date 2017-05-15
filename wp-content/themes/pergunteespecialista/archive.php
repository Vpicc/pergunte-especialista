<?php
get_header();


  if (have_posts()){ ?>

    <h2><?php

    if (is_category()){
      echo 'Categoria: ';
      single_cat_title();
    } elseif (is_tag()){
      echo 'Tag: ';
      single_tag_title();
    } elseif (is_author()){
      the_post();
      echo 'Arquivos do(a) autor(a): ' . get_the_author();
      rewind_posts();
    } elseif (is_day()){
      echo 'Arquivos do dia: ' . get_the_date();
    } elseif (is_month()){
      echo 'Arquivos do Mês: ' . get_the_date('F Y');
    } elseif (is_year()){
      echo 'Arquivos do Ano: ' . get_the_date('Y');
    } else {
      echo 'Arquivo:';
    }

    ?></h2>

    <?php
    while (have_posts()){the_post();

?>
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

    <h3><?php the_excerpt();?></h3>
  </article>

<?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>