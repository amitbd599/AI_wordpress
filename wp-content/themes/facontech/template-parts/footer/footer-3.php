<?php

/**
 * Template part for displaying footer layout three
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
$footer_copyright_switch = get_theme_mod('footer_copyright_switch', false);

// bg image
$bg_img = !empty ($facontech_footer_bg_url_from_page['url']) ? $facontech_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty ($facontech_footer_bg_color_from_page) ? $facontech_footer_bg_color_from_page : $footer_bg_color;

// footer_columns
$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets + 1; $num++) {
    if (is_active_sidebar('footer-3-' . $num)) {
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
        $footer_class[1] = 'col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-3 col-sm-5';
        $footer_class[4] = 'col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-7';
        break;
    case '5':
        $footer_class[1] = 'col-xl-2 col-lg-2 col-md-3 col-sm-4';
        $footer_class[2] = 'col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6';
        $footer_class[3] = 'col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6';
        $footer_class[4] = 'col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6';
        $footer_class[5] = 'col-xl-4 col-lg-4 col-md-8 col-sm-8';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
}

?>

<footer>
    <div class="footer-area black-bg-2  fix " data-background="<?php print esc_url($bg_img); ?>">
        <?php if (is_active_sidebar('footer-3-1') or is_active_sidebar('footer-3-2') or is_active_sidebar('footer-3-3') or is_active_sidebar('footer-3-4') or is_active_sidebar('footer-3-5')): ?>
            <div class="border-b pt-100">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4">';
                            dynamic_sidebar('footer-3-1');
                            print '</div>';

                            print '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">';
                            dynamic_sidebar('footer-3-2');
                            print '</div>';

                            print '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">';
                            dynamic_sidebar('footer-3-3');
                            print '</div>';

                            print '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">';
                            dynamic_sidebar('footer-3-4');
                            print '</div>';

                            print '<div class="col-xl-4 col-lg-4 col-md-8 col-sm-8">';
                            dynamic_sidebar('footer-3-5');
                            print '</div>';

                        } else {
                            for ($num = 1; $num <= $footer_columns + 1; $num++) {
                                if (!is_active_sidebar('footer-3-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-3-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>


                </div>
            </div>
        <?php endif; ?>
        <div class="container">

            <div class="footer__copyright white-bg ">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer__copyright-text">
                            <p>
                                <?php echo facontech_copyright_text(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer__copyright-links text-sm-end">
                            <?php facontech_footer_menu(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer__shape-1">
            <img src="assets/img/footer/footer-shape-1.png" alt="">
        </div>
        <div class="footer__shape-2">
            <img src="assets/img/footer/footer-shape-2.png" alt="">
        </div>
    </div>
</footer>