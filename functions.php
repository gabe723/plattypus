<?php
//turn on sleeping features
/*featured images*/
add_theme_support('post-thumbnails');
/*post formatting*/
add_theme_support( 'post-formats', array('quote', 'link', 'audio', 'video', 'image', 'gallery', 'aside', 'status') );
/*custom background*/
add_theme_support('custom-background');
//don't forget to show the header image in the header.php file
add_theme_support( 'custom-header', array(
  'width'         => 960,
  'height'        => 700,
  'flex-width'    => true,
  'flex-height'   => true,
  // 'default-image' => get_template_directory_uri() . '/images/default-header.jpg', *google this to figure out why it won't work!!
) );
//don't forget the_custom_logo() to display it in your theme
add_theme_support( 'custom-logo', array(
  'width'         => 180,
  'height'        => 50,
) );
//better RSS feed links, A MUST-MUST have for blog sites
add_theme_support('automatic-feed-links');
//add support for HTML5, improves markup
add_theme_support( 'html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption',) );
//add support for WP dynamic title tag, improves SEO
add_theme_support('title-tag');

/**
* Make the excerpts better- customize the number of words and change the [...]
* @see https://developer.wordpress.org/reference/functions/the_excerpt/
*/
function plattypus_ex_length(){
  if ( is_search() ){
    return 20; //words
  }else{
    return 75; //words
  }
}
add_filter('excerpt_length', 'plattypus_ex_length');

/*read more*/
function platty_readmore(){
  return ' <a href="' .get_permalink() . '" class="read-more" title="read more">Read More</a>';
}
add_filter('excerpt_more', 'platty_readmore');

/**
* Create two menu locations. Display them with wp_nav_menu() in your templates
*/
function platty_menus(){
  register_nav_menus( array(
    'main_menu'   => 'Global Navigation',
    'social_menu' => 'Social Media',
  ) );
}
add_action('init', 'platty_menus');

/**
* Helper function to handle pagination. Call in any template file.
*/
function platty_pagination(){
  if ( ! is_singular() ) {
    //archive pagination
    if ( function_exists('the_posts_pagination') ){
      the_posts_pagination();
    }else{
      echo '<div class="pagination">';
      previous_posts_link('&larr; Newer Posts');
      next_posts_link('Older Posts &rarr;');
      echo '</div>';
    }
  }else{
    echo '<div class="pagination">';
    //single pagination
    previous_post_link('%link', '&larr; %title'); //one older post
    next_post_link('%link', '%title &rarr;'); //one newer post
    echo '</div>';
  }
}

/**
* register Widget Areas(Dynamic Sidebars)
* Call dynamic_sidebar() in your templates to display them
*/
function platty_widget_areas(){
  register_sidebar( array(
    'name'          => 'Blog Sidebar',
    'id'            => 'blog-sidebar',
    'description'   => 'Appears with the blog and archive content',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Footer Area',
    'id'            => 'footer-area',
    'description'   => 'Appears at the bottom of every page',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Home Area',
    'id'            => 'home-area',
    'description'   => 'Appears on the front page',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Page Area',
    'id'            => 'page-area',
    'description'   => 'Appears static pages',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'platty_widget_areas' );
//DO NOT CLOSE PHP
