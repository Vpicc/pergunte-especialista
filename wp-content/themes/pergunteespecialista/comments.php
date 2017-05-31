<?php
if(post_password_required()){
  return;
}
?>

<div id="comments" class="comments-area">

  <?php
    if(have_comments()){
  ?>
  <h2 class="comment-title">
    <?php
      printf(
        esc_html(_nx('Um comentário em &ldquo;%2$s&rdquo;',
        '%1$s comentários em &ldquo;%2$s&rdquo;',
        get_comments_number(),
        'comments title',
        'pergunte-especialista')),
        get_comments_number(),
        '<span>' . get_the_title() . '</span>'
      );
    ?>
  </h2>

    <ol class="comment-list">
      <?php
        wp_list_comments(array(
          'echo' => true
        ));
        ?>
    </ol>
  <?php if(!comments_open() && get_comments_number()){ ?>
    <p>
    <?php esc_html_e( 'Comentários estão fechados.', 'pergunte-especialista'); ?>
    </p>
  <?php } ?>
  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
        <nav id="comment-nav" class="comment-navigation" role="navigation">
          <div class="nav-link">
            <?php echo get_the_comments_pagination(); ?>
          </div>
        </nav>
  <?php } ?>
  <?php } ?>

 <?php comment_form(); ?>
</div><!-- comments-area -->
