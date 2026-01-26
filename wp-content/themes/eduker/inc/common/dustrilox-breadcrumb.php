<?php

/**
 * Breadcrumbs for DUSTRILOX theme.
 *
 * @package     DUSTRILOX
 * @author      Theme_Pure
 * @copyright   Copyright (c) 2022, Theme_Pure
 * @link        https://weblearnbd.net
 * @since       DUSTRILOX 1.0.0
 */


function dustrilox_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;


    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'dustrilox'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'dustrilox'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'dustrilox'));
    } elseif (is_single() && 'courses' == get_post_type()) {
        $title = esc_html__('Course Details', 'dustrilox');
    } elseif ('courses' == get_post_type()) {
        $title = esc_html__('Courses', 'dustrilox');
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'dustrilox') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'dustrilox');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'dustrilox'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }



    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $dustrilox_breadcrumb_shape_switch = get_theme_mod('dustrilox_breadcrumb_shape_switch', true);
        $breadcrumb_info_switch = get_theme_mod('breadcrumb_info_switch', true);
        $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true);


        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>




        <!-- page title area start -->
        <?php if (!empty($breadcrumb_switch)): ?>

            <section
                class="d-none breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay <?php print esc_attr($breadcrumb_class); ?>"
                data-background="<?php print esc_attr($bg_img); ?>">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($breadcrumb_info_switch)): ?>
                            <div class="col-xxl-12">
                                <div class="breadcrumb__content text-center p-relative z-index-1">
                                    <h3 class="breadcrumb__title"><?php echo wp_kses_post($title); ?></h3>
                                    <div class=" breadcrumb__list">
                                        <?php if (function_exists('bcn_display')) {
                                            bcn_display();
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
                data-background="assets/img/bg/page-bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="page__title-wrapper mt-100">
                                <div class="breadcrumb-menu">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><span>FAQ</span></li>
                                    </ul>
                                </div>
                                <h3 class="page__title mt-20">FAQ Page</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- page title area end -->
    <?php
    }
}

add_action('dustrilox_before_main_content', 'dustrilox_breadcrumb_func');

// dustrilox_search_form
function dustrilox_search_form()
{
    ?>
    <div class="search-wrapper p-relative transition-3 d-none">
        <div class="search-form transition-3">
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>"
                    placeholder="<?php print esc_attr__('Enter Your Keyword', 'dustrilox'); ?>">
                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
            </form>
            <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
        </div>
    </div>
<?php
}

add_action('dustrilox_before_main_content', 'dustrilox_search_form');
