<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/images/nswnma-favicon.png'  ?>" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-slate-500 antialiased overflow-x-hidden'); ?>>

  <?php do_action('tkw_site_before'); ?>

  <div id="page" class="min-h-screen flex flex-col">

    <?php do_action('tkw_header'); ?>

    <?php get_template_part('template-parts/site', 'header'); ?>

    <div id="content" class="site-content flex-grow">

      <?php do_action('tkw_content_start'); ?>

      <main>