<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$footer_bg_img = get_theme_mod('facontech_footer_bg');
$facontech_footer_logo = get_theme_mod('facontech_footer_logo');
$facontech_footer_top_space = function_exists('get_field') ? get_field('facontech_footer_top_space') : '0';
$facontech_copyright_center = $facontech_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$facontech_footer_bg_url_from_page = function_exists('get_field') ? get_field('facontech_footer_bg') : '';
$facontech_footer_bg_color_from_page = function_exists('get_field') ? get_field('facontech_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('facontech_footer_bg_color');
$footer_top_space = get_theme_mod('facontech_footer_top_space');
$footer_copyright_switch = get_theme_mod('footer_copyright_switch', false);

// bg image
$bg_img = !empty($facontech_footer_bg_url_from_page['url']) ? $facontech_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty($facontech_footer_bg_color_from_page) ? $facontech_footer_bg_color_from_page : $footer_bg_color;



$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-2-' . $num)) {
        $footer_columns++;
    }
}

switch ($footer_columns) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xl-3 col-lg-6 col-md-12 col-sm-12';
        $footer_class[2] = 'col-xl-3 col-lg-6 col-md-6 col-sm-6';
        $footer_class[3] = 'col-xl-3 col-lg-6 col-md-6 col-sm-6';
        $footer_class[4] = 'col-xl-3 col-lg-6 col-md-8 col-sm-12';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
}

?>

<!-- footer area start -->


<footer>
    <div class="footer__area-2 " data-bg-color="<?php print esc_attr($bg_color); ?>"
        data-background="<?php print esc_url($bg_img); ?>">
        <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')): ?>
            <div class="pt-100 border-b">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">';
                            dynamic_sidebar('footer-2-1');
                            print '</div>';

                            print '<div class=col-xl-3 col-lg-6 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-2-2');
                            print '</div>';

                            print '<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-2-3');
                            print '</div>';

                            print '<div class="col-xl-3 col-lg-6 col-md-8 col-sm-12">';
                            dynamic_sidebar('footer-2-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <div class="footer__copyright-2 black-bg pt-25 pb-25 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer__copyright-text">
                            <p>
                                <?php echo facontech_copyright_text(); ?> footer_2
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer__copyright-links text-sm-end">
                            <?php facontech_footer_social_profiles(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<footer class="d-none">
    <div class="footer__area">
        <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')): ?>
            <div class="footer__top grey-bg-4 pt-95 pb-45" data-top-space="<?php print esc_attr($footer_top_space); ?>"
                data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7">';
                            dynamic_sidebar('footer-2-1');
                            print '</div>';

                            print '<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5">';
                            dynamic_sidebar('footer-2-2');
                            print '</div>';

                            print '<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5">';
                            dynamic_sidebar('footer-2-3');
                            print '</div>';

                            print '<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7">';
                            dynamic_sidebar('footer-2-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-2-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-2-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer__bottom grey-bg-4">
            <div class="container">
                <div class="footer__bottom-inner">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="footer__copyright text-center">
                                <p>
                                    <?php print facontech_copyright_text(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>