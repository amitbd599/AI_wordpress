<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dustrilox
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <?php if (is_singular() && pings_open(get_queried_object())): ?>
   <?php endif; ?>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

   <?php wp_body_open(); ?>


   <?php
   $dustrilox_preloader = get_theme_mod('dustrilox_preloader', false);
   $dustrilox_backtotop = get_theme_mod('dustrilox_backtotop', false);

   $dustrilox_preloader_logo = get_template_directory_uri() . '/assets/img/favicon.png';

   $preloader_logo = get_theme_mod('preloader_logo', $dustrilox_preloader_logo);

   ?>

   <?php if (!empty($dustrilox_preloader)): ?>
      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <svg id="loader">
                  <path id="corners" d="m 0 12.5 l 0 -12.5 l 50 0 l 0 50 l -50 0 l 0 -37.5" />
               </svg>
               <img src="<?php echo esc_url($preloader_logo); ?>" alt="<?php echo esc_attr__('logo', 'dustrilox'); ?>">
            </div>
         </div>
      </div>
      <!-- pre loader area end -->
   <?php endif; ?>

   <?php if (!empty($dustrilox_backtotops)): ?>
      <!-- back to top start -->
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      <!-- back to top end -->
   <?php endif; ?>


   <!-- header start -->
   <?php do_action('dustrilox_header_style'); ?>
   <!-- header end -->


   <!-- wrapper-box start -->
   <?php do_action('dustrilox_before_main_content'); ?>