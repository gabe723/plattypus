<?php get_header(); ?>
<main id="content">
  <?php if( have_posts() ){
    while( have_posts() ){
      the_post();
      ?>
      <article <?php post_class(); ?>>
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
        <?php the_post_thumbnail('medium'); ?>
        <div class="entry-content">
          <?php
          if ( is_singular() ){
            //single post, page, attachents, etc
            the_content();
          }else{
            //not singular : archives, blog, search results
            the_excerpt();
          }
          ?>
        </div>
        <div class="postmeta">
          <span class="author">by: <?php the_author(); ?> </span>
          <span class="date"> <?php the_date(); ?></span>
          <span class="num-comments"> <?php comments_number(); ?> </span>
          <span class="categories"> <?php the_category(); ?></span>
          <span class="tags"><?php the_tags(); ?></span>
        </div>
        <!-- end .postmeta -->
      </article>
      <!-- end .post -->
      <?php
    }//end while
    comments_template();
  }//end if there are posts
  else{
    echo 'Sorry, no posts to show';
  }
  ?>
</main>
<!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
