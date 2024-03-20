<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

// info
$facontech_topbar_switch = get_theme_mod('facontech_topbar_switch', false);
$facontech_mail_id = get_theme_mod('facontech_mail_id', __('info@facontech.com', 'facontech'));
$facontech_address = get_theme_mod('facontech_address', __('Moon ave, New York, 2020 NY US', 'facontech'));
$facontech_phone_num = get_theme_mod('facontech_phone_num', __('(786) 686 350', 'facontech'));
$facontech_office_hour = get_theme_mod('facontech_office_hour', __('09:00am-6:00pm', 'facontech'));

// social 
$facontech_topbar_fb_url = get_theme_mod('facontech_topbar_fb_url', __('#', 'facontech'));
$facontech_topbar_twitter_url = get_theme_mod('facontech_topbar_twitter_url', __('#', 'facontech'));
$facontech_topbar_linkedin_url = get_theme_mod('facontech_topbar_linkedin_url', __('#', 'facontech'));
$facontech_topbar_instagram_url = get_theme_mod('facontech_topbar_instagram_url', __('#', 'facontech'));


// contact button
$facontech_button_text = get_theme_mod('facontech_button_text', __('Contact Us', 'facontech'));
$facontech_button_link = get_theme_mod('facontech_button_link', __('#', 'facontech'));

// acc button
$facontech_acc_button_text = get_theme_mod('facontech_acc_button_text', __('Login', 'facontech'));
$facontech_acc_button_link = get_theme_mod('facontech_acc_button_link', __('#', 'facontech'));

// header right
$facontech_search = get_theme_mod('facontech_search', false);
$facontech_header_right = get_theme_mod('facontech_header_right', false);
$facontech_menu_col = $facontech_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>

<!-- header-area-start -->
<header class="header-area-2">
   <?php if (!empty ($facontech_topbar_switch)): ?>
      <div class="header-top d-none d-lg-block">
         <div class="container">
            <div class="row">
               <div class="col-lg-7">
                  <div class="left-wrapper">
                     <?php if (!empty ($facontech_mail_id)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-envelope"></i></span>
                           <span>
                              <?php echo esc_html($facontech_mail_id); ?>
                           </span>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty ($facontech_phone_num)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-phone-arrow-up-right"></i></span>
                           <span>
                              <?php echo esc_html($facontech_phone_num); ?>
                           </span>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty ($facontech_address)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-sharp fa-solid fa-location-dot"></i></span>
                           <span>
                              <?php echo esc_html($facontech_address); ?>
                           </span>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
               <div class="col-lg-5">
                  <div class="right-wrapper">
                     <?php if (!empty ($facontech_office_hour)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-timer"></i></span>
                           <span>
                              <?php echo esc_html__("Office Hours:", "facontech") ?>
                              <?php echo esc_html($facontech_office_hour); ?>
                           </span>
                        </div>
                     <?php endif; ?>
                     <div class="item social">
                        <?php if (!empty ($facontech_topbar_fb_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_fb_url); ?>"><i
                                 class="fa-brands fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (!empty ($facontech_topbar_twitter_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_twitter_url); ?>"><i
                                 class="fa-brands fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if (!empty ($facontech_topbar_linkedin_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_linkedin_url); ?>"><i
                                 class="fa-brands fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if (!empty ($facontech_topbar_instagram_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_instagram_url); ?>"><i
                                 class="fa-brands fa-instagram"></i></a>
                        <?php endif; ?>

                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   <?php endif; ?>


   <div class="header-inner" id="header-sticky-2">
      <div class="container">
         <div class="row align-items-center">
            <div class=" col-lg-3 col-md-6 col-6">
               <div class="logo-area">
                  <div class="logo">
                     <?php facontech_header_logo() ?>
                  </div>
               </div>
            </div>
            <div class=" col-lg-7 col-md-6 col-6">
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
            <div class=" col-lg-2 d-none d-lg-block">
               <div class="trigger">
                  <span data-bs-toggle="modal" data-bs-target="#search-modal"><i
                        class="fa-regular fa-magnifying-glass "></i></span>
                  <span class="sidebar-toggle"><i class="fa-solid fa-bars-sort "></i></span>

               </div>

            </div>
         </div>
      </div>
   </div>

</header>
<!-- header-area-end -->





<?php get_template_part('template-parts/header/header-side-info-header-2'); ?>
<?php get_template_part('template-parts/header/header-side-info'); ?>