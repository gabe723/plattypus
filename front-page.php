<?php get_header(); ?>
<main id="content">
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      ?>
      <h1 class="page-title">
        <?php the_title(); ?>
      </h1>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <?php
    } // end while
  } // end if
  ?>
</main>
<!-- end #content -->
<?php get_sidebar('home'); //include sidebar-home.php ?>
<?php get_footer(); ?>