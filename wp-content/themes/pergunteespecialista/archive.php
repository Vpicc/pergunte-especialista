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
      get_template_part( 'content');
?>

<?php }} else {
    echo 'Não foi encontrado nenhum post</p>';
  }

get_footer();

 ?>
