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
   <?php if (!empty($facontech_topbar_switch)): ?>
      <div class="header-top d-none d-lg-block">
         <div class="container">
            <div class="row">
               <div class="col-lg-7">
                  <div class="left-wrapper">
                     <?php if (!empty($facontech_mail_id)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-envelope"></i></span>
                           <span>
                              <?php echo esc_html($facontech_mail_id); ?>
                           </span>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty($facontech_phone_num)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-phone-arrow-up-right"></i></span>
                           <span>
                              <?php echo esc_html($facontech_phone_num); ?>
                           </span>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty($facontech_address)): ?>
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
                     <?php if (!empty($facontech_office_hour)): ?>
                        <div class="item">
                           <span class="theme-color"><i class="fa-solid fa-timer"></i></span>
                           <span>
                              <?php echo esc_html__("Office Hours:", "facontech") ?>
                              <?php echo esc_html($facontech_office_hour); ?>
                           </span>
                        </div>
                     <?php endif; ?>
                     <div class="item social">
                        <?php if (!empty($facontech_topbar_fb_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_fb_url); ?>"><i
                                 class="fa-brands fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_twitter_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_twitter_url); ?>"><i
                                 class="fa-brands fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_linkedin_url)): ?>
                           <a href="<?php echo esc_url($facontech_topbar_linkedin_url); ?>"><i
                                 class="fa-brands fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_instagram_url)): ?>
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


<!-- <header>
   <div id="header-sticky" class="header__area header__transparent">
      <div class="header__bottom">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xxl-8 col-xl-9 col-lg-10 col-md-6 col-6">
                  <div class="header__bottom-left d-flex align-items-center">
                     <div class="logo">
                        <?php facontech_header_logo(); ?>
                     </div>
                     <div class="main-menu main-menu-2 main-menu-border ml-30 pl-30">
                        <nav id="mobile-menu">
                           <?php facontech_header_menu(); ?>
                        </nav>
                     </div>
                  </div>
               </div>
               <?php if (!empty($facontech_header_right)): ?>
                  <div class="col-xxl-4 col-xl-3 col-lg-2 col-md-6 col-6">
                     <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                        <?php if (!empty($facontech_acc_button_link)): ?>
                           <div class="header__action d-none d-xl-block">
                              <ul>
                                 <li>
                                    <a href="<?php echo esc_html($facontech_acc_button_link); ?>">
                                       <svg width="15" height="20" viewBox="0 0 15 20" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path
                                             d="M7.1466 8.96416C7.05493 8.95499 6.94493 8.95499 6.8441 8.96416C4.66243 8.89083 2.92993 7.10333 2.92993 4.90333C2.92993 2.65749 4.74493 0.833328 6.99993 0.833328C9.24576 0.833328 11.0699 2.65749 11.0699 4.90333C11.0608 7.10333 9.32826 8.89083 7.1466 8.96416Z"
                                             stroke="#0C140F" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                          <path
                                             d="M2.56341 12.3467C0.345075 13.8317 0.345075 16.2517 2.56341 17.7275C5.08424 19.4142 9.21841 19.4142 11.7392 17.7275C13.9576 16.2425 13.9576 13.8225 11.7392 12.3467C9.22758 10.6692 5.09341 10.6692 2.56341 12.3467Z"
                                             stroke="#0C140F" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        <?php endif; ?>

                        <?php if (!empty($facontech_search)): ?>
                           <div class="header__search header__search-2 d-none d-xl-block">
                              <form action="<?php print esc_url(home_url('/')); ?>">
                                 <div class="header__search-input">
                                    <input type="text" name="s" value="<?php print esc_attr(get_search_query()) ?>"
                                       placeholder="<?php print esc_attr__('Search...', 'facontech'); ?>">
                                    <button class="header__search-btn" type="submit">
                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <path
                                             d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z"
                                             stroke="#3E8454" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                          <path d="M17 17L13.1333 13.1333" stroke="#3E8454" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" />
                                       </svg>
                                    </button>
                                 </div>
                              </form>
                           </div>
                        <?php endif; ?>
                        <div class="header__hamburger ml-50 d-xl-none">
                           <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal"
                              class="hamurger-btn">
                              <span></span>
                              <span></span>
                              <span></span>
                           </button>
                        </div>
                     </div>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</header> -->


<?php get_template_part('template-parts/header/header-side-info'); ?>