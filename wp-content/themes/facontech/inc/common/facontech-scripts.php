<?php

/**
 * facontech_scripts description
 * @return [type] [description]
 */
function facontech_scripts()
{

    /**
     * all css files
     */

    wp_enqueue_style('facontech-fonts', facontech_fonts_url(), array(), time());
    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', FACONTECH_THEME_CSS_DIR . 'bootstrap.rtl.min.css', array());
    } else {
        wp_enqueue_style('bootstrap', FACONTECH_THEME_CSS_DIR . 'bootstrap.css', array());
    }
    wp_enqueue_style('meanmenu', FACONTECH_THEME_CSS_DIR . 'meanmenu.css', []);
    wp_enqueue_style('animate', FACONTECH_THEME_CSS_DIR . 'animate.css', []);
    wp_enqueue_style('swiper-bundle', FACONTECH_THEME_CSS_DIR . 'swiper-bundle.css', []);
    wp_enqueue_style('magnific-popup', FACONTECH_THEME_CSS_DIR . 'magnific-popup.css', []);
    wp_enqueue_style('font-awesome-pro', FACONTECH_THEME_CSS_DIR . 'font-awesome-pro.css', []);
    wp_enqueue_style('spacing', FACONTECH_THEME_CSS_DIR . 'spacing.css', []);
    wp_enqueue_style('facontech-core', FACONTECH_THEME_CSS_DIR . 'facontech-core.css', [], time());
    wp_enqueue_style('facontech-unit', FACONTECH_THEME_CSS_DIR . 'facontech-unit.css', [], time());
    wp_enqueue_style('facontech-custom', FACONTECH_THEME_CSS_DIR . 'facontech-custom.css', []);
    wp_enqueue_style('facontech-style', get_stylesheet_uri());



    // all js
    wp_enqueue_script('bootstrap-bundle', FACONTECH_THEME_JS_DIR . 'bootstrap-bundle.js', ['jquery'], '', true);
    wp_enqueue_script('waypoints', FACONTECH_THEME_JS_DIR . 'waypoints.js', ['jquery'], false, true);
    wp_enqueue_script('meanmenu', FACONTECH_THEME_JS_DIR . 'meanmenu.js', ['jquery'], false, true);
    wp_enqueue_script('swiper-bundle', FACONTECH_THEME_JS_DIR . 'swiper-bundle.js', ['jquery'], false, true);
    wp_enqueue_script('magnific-popup', FACONTECH_THEME_JS_DIR . 'magnific-popup.js', ['jquery'], '', true);
    wp_enqueue_script('backtotop', FACONTECH_THEME_JS_DIR . 'backtotop.js', ['jquery'], false, true);
    wp_enqueue_script('counterup', FACONTECH_THEME_JS_DIR . 'counterup.js', ['jquery'], false, true);
    wp_enqueue_script('wow', FACONTECH_THEME_JS_DIR . 'wow.js', ['jquery'], false, true);
    wp_enqueue_script('facontech-main', FACONTECH_THEME_JS_DIR . 'main.js', ['jquery'], time(), true);



    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'facontech_scripts');

/*
Register Fonts
 */
function facontech_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'facontech')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap';
    }
    return $font_url;
}