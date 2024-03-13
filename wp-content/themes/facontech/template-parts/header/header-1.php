<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

// info
$facontech_topbar_switch = get_theme_mod('facontech_topbar_switch', false);
$facontech_phone_num = get_theme_mod('facontech_phone_num', __('(786) 686 350', 'facontech'));

$facontech_mail_id = get_theme_mod('facontech_mail_id', __('info@facontech.com', 'facontech'));
$facontech_address = get_theme_mod('facontech_address', __('Moon ave, New York, 2020 NY US', 'facontech'));
$facontech_address_url = get_theme_mod('facontech_address_url', __('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'facontech'));

// contact button
$facontech_button_text = get_theme_mod('facontech_button_text', __('Contact Us', 'facontech'));
$facontech_button_link = get_theme_mod('facontech_button_link', __('#', 'facontech'));

// acc button
$facontech_acc_button_text = get_theme_mod('facontech_acc_button_text', __('Login', 'facontech'));
$facontech_acc_button_link = get_theme_mod('facontech_acc_button_link', __('#', 'facontech'));

// header right
$facontech_header_right = get_theme_mod('facontech_header_right', false);
$facontech_menu_col = $facontech_header_right ? 'col-xl-7 col-lg-6 col-md-6 col-6' : 'col-xl-10 col-lg-6 col-md-6 col-6 d-flex justify-content-end';



?>


<!-- header-area-start -->
<header id="header-sticky" class="header-area-1">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-2 col-lg-2 col-md-6 col-6">
            <div class="logo-area">
               <div class="logo">
                  <?php facontech_header_logo() ?>
               </div>
            </div>
         </div>
         <div class="<?php echo esc_attr($facontech_menu_col) ?>">
            <div class="menu-area menu-padding">
               <div class="main-menu">
                  <nav id="mobile-menu">
                     <?php facontech_header_menu(); ?>

                  </nav>
               </div>
            </div>
            <div class="side-menu-icon d-lg-none text-end">
               <a href="javascript:void(0)" class="info-toggle-btn f-right sidebar-toggle-btn"><i
                     class="fal fa-bars"></i></a>
            </div>
         </div>
         <?php if (!empty($facontech_header_right)): ?>
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
               <div class="d-adjust justify-content-end d-flex">
                  <div class="header-info ">
                     <?php if (!empty($facontech_phone_num)): ?>
                        <div class="info-item ">
                           <span>
                              <?php echo esc_html__("Phone Number", "facontech") ?>
                           </span>
                           <p class="mb-0"><a href="tel:<?php echo esc_attr($facontech_phone_num); ?>">
                                 <?php echo esc_html($facontech_phone_num); ?>
                              </a></p>
                        </div>
                     <?php endif; ?>
                     <?php if (!empty($facontech_mail_id)): ?>
                        <div class="info-item ">
                           <span>
                              <?php echo esc_html__("Phone Number", "facontech") ?>
                           </span>
                           <p class="mb-0"><a href="tel:<?php echo esc_attr($facontech_mail_id); ?>">
                                 <?php echo esc_html($facontech_mail_id); ?>
                              </a></p>
                        </div>
                     <?php endif; ?>

                  </div>
               </div>

            </div>
         <?php endif; ?>
      </div>
   </div>
</header>
<!-- header-area-end -->



<?php get_template_part('template-parts/header/header-side-info'); ?>