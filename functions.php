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
  'width'         => 200,
  'height'        => 200,
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
//DO NOT CLOSE PHP
