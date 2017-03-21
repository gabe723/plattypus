<?php
/**
* Template for displaying comments and comment form.
* Include it with comments_template()
*/
//if the post is password protected, exit this file
if ( post_password_required() ){
  return;
}
//split up the comment counts
$comment_count = count( $wp_query->comments_by_type['comment'] );
$pings_count = count( $wp_query->comments_by_type['pings'] );
?>
<section class="comments">
  <?php if ( comments_open() AND $comment_count != 0 ){ ?>
    <h3><?php echo $comment_count == 1 ? '1 Comment' : $comment_count . ' Comments'; ?> on this post</h3>
    <?php } ?>
    <?php if ( comments_open() ){?>
      <a href="#respond">Leave a Comment</a>
      <?php } ?>
      <ol>
        <?php wp_list_comments( array(
          'type' => 'comment', //only real comments, no pings
        ) ); ?>
      </ol>
      <?php if ( get_comment_pages_count() > 1 ) {
        echo '<div class="pagination">';
        paginate_comments_links();
        echo '</div>';
      } ?>
    </section>
    <section class="comments-form">
      <?php comment_form(); ?>
    </section>
    <?php if ( $pings_count != 0 ){ ?>
      <section class="trackbacks">
        <h3><?php echo $pings_count == 1 ? 'One Site links here' : $pings_count . ' Sites link here'; ?></h3>
        <ol>
          <?php wp_list_comments( array(
            'type'       => 'pings', //include trackbacks and pingbacks
            'short_ping' => true,
          ) ); ?>
        </ol>
      </section>
      <?php } ?>
