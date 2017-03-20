<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body <?php body_class(); ?>>
  <header role="banner" id="header" style="background-image: url(<?php header_image(); ?>)">
    <div class="header-bar">
      <?php
      //add custom logo if the function 'the_custom_logo'(added in 4.5) is supported
      if ( function_exists('the_custom_logo') ) {
        if ( has_custom_logo() ) {
          the_custom_logo();
        }else{
          //title of the site
          ?>
          <h1 class="site-title"><a href="<?php echo home_url(); ?>">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <?php
      }
    }
    ?>
    <h2><?php bloginfo( 'description' ); ?></h2>
    <?php wp_nav_menu( array(
      'theme_location'  => 'main_menu',
      'container'       => 'nav', //div, nav or false
      'menu_class'      => 'menu', //ul class="menu"
    ) );
    ?>
    <?php get_search_form(); ?>
  </div>
</header>
<div class="wrapper">
