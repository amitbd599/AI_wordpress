<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package facontech
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
    $facontech_preloader = get_theme_mod('facontech_preloader', false);
    $facontech_backtotop = get_theme_mod('facontech_backtotop', false);

    $facontech_preloader_logo = get_template_directory_uri() . '/assets/img/favicon.png';

    $preloader_logo = get_theme_mod('preloader_logo', $facontech_preloader_logo);

    ?>

    <?php if (!empty($facontech_preloader)): ?>
        <!-- pre loader area start -->
        <div class="preloader">
            <?php if (!empty($preloader_logo)) : ?>
                <div>
                    <img src="<?php echo esc_url($preloader_logo); ?>"
                        alt="<?php echo esc_attr__('logo', 'facontech'); ?>">
                </div>
            <?php else : ?>

                <div>
                    <div class="semipolar-spinner">
                        <div class="ring"></div>
                        <div class="ring"></div>
                        <div class="ring"></div>
                        <div class="ring"></div>
                        <div class="ring"></div>
                    </div>
                    <div class="loader">
                        <span class="l">L</span>
                        <span class="o">o</span>
                        <span class="a">a</span>
                        <span class="d">d</span>
                        <span class="i">i</span>
                        <span class="n">n</span>
                        <span class="g">g</span>
                        <span class="d1">.</span>
                        <span class="d2">.</span>
                    </div>

                </div>
            <?php endif; ?>
        </div>
        <!-- pre loader area end -->
    <?php endif; ?>



    <?php if (!empty($facontech_backtotop)): ?>
        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->
    <?php endif; ?>


    <!-- header start -->
    <?php do_action('facontech_header_style'); ?>
    <!-- header end -->

    <!-- wrapper-box start -->
    <?php
    do_action('facontech_before_main_content');
    ?>