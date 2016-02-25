<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="pagesite">
  <div class="header"><a href="<?php echo home_url('/'); ?>"><h1><?php bloginfo('name'); ?></h1></a><p id="description"><?php bloginfo('description'); ?></p></div>
  <?php wp_nav_menu( array ( 'theme_location' => 'header-navi' ) ); ?>
