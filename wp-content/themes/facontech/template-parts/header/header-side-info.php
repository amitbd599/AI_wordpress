<?php

/**
 * Template part for displaying header side information
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$facontech_side_hide = get_theme_mod('facontech_side_hide', false);
$facontech_search = get_theme_mod('facontech_search', false);
$facontech_side_logo = get_theme_mod('facontech_side_logo', get_template_directory_uri() . '/assets/img/common/logo-white.png');
$facontech_extra_about_text = get_theme_mod('facontech_extra_about_text', __('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'facontech'));

$facontech_extra_map = get_theme_mod('facontech_extra_map', __('#', 'facontech'));
$facontech_contact_title = get_theme_mod('facontech_contact_title', __('Contact Info', 'facontech'));
$facontech_extra_address = get_theme_mod('facontech_extra_address', __('12/A, Mirnada City Tower, NYC', 'facontech'));
$facontech_extra_phone = get_theme_mod('facontech_extra_phone', __('088889797697', 'facontech'));
$facontech_extra_email = get_theme_mod('facontech_extra_email', __('support@mail.com ', 'facontech'));
?>

<!-- sidebar area start -->
<div class="sidebar__area">
   <div class="sidebar__wrapper">
      <div class="sidebar__close">
         <button class="sidebar__close-btn" id="sidebar__close-btn">
            <i class="fal fa-times"></i>
         </button>
      </div>
      <div class="sidebar__content">
         <div class="sidebar-logo mb-40 mt-40">
            <a href="<?php echo esc_url(home_url("/")) ?>">
               <img src="<?php echo esc_url($facontech_side_logo); ?>"
                  alt="<?php echo esc_attr__("logo", "facontech") ?>">
            </a>
         </div>
         <div class="sidebar__search mb-25">
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
               <input type="text" name="s" placeholder="<?php echo esc_attr__("Search here...", "facontech") ?>?"
                  value="<?php echo esc_attr(get_search_query()) ?> ">
               <button type="submit"><i class="far fa-search"></i></button>
            </form>
         </div>
         <div class="mobile-menu fix"></div>

         <div class="mobile-footer">
            <div class="follow">
               <div class="title">
                  <h3>Follow Us:</h3>
               </div>
               <div class="social one">
                  <a href="#">
                     <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <a href="#">
                     <i class="fa-brands fa-twitter"></i>
                  </a>
                  <a href="#">
                     <i class="fa-brands fa-linkedin-in"></i>
                  </a>
                  <a href="#">
                     <i class="fa-brands fa-instagram"></i>
                  </a>
               </div>
            </div>
            <div class="contact">
               <div class="title">
                  <h3>
                     <?php echo esc_html($facontech_contact_title); ?>
                  </h3>
               </div>
               <ul>
                  <li>
                     <i class="fa-sharp fa-solid fa-location-dot"></i>
                     <?php echo esc_html($facontech_extra_address); ?>
                  </li>
                  <li>
                     <i class="fa-solid fa-envelope"></i>
                     <?php echo esc_html($facontech_extra_email); ?>
                  </li>
                  <li>
                     <i class="fa-solid fa-phone"></i>
                     <?php echo esc_html($facontech_extra_phone); ?>
                  </li>

               </ul>
            </div>

         </div>

      </div>
   </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>

<!-- offcanvas area start -->
<!-- <div class=" offcanvas__area">
   <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="offcanvas__wrapper">
               <div class="offcanvas__content">
                  <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                     <?php if (!empty($facontech_side_logo)): ?>
                        <div class="offcanvas__logo logo">
                           <a href="<?php print esc_url(home_url('/')); ?>">
                              <img src="<?php print esc_url($facontech_side_logo); ?>"
                                 alt="<?php echo esc_attr__('logo', 'facontech'); ?>">
                           </a>
                        </div>
                     <?php endif; ?>

                     <div class="offcanvas__close">
                        <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                           <i class="fal fa-times"></i>
                        </button>
                     </div>

                  </div>

                  <?php if (!empty($facontech_search)): ?>
                     <div class="offcanvas__search mb-25">
                        <form action="<?php print esc_url(home_url('/')); ?>">
                           <input type="text" name="s" value="<?php print esc_attr(get_search_query()) ?>"
                              placeholder="<?php print esc_attr__('What are you searching for?', 'facontech'); ?>">
                           <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                     </div>
                  <?php endif; ?>

                  <div class="mobile-menu fix"></div>


                  <?php if (!empty($facontech_side_hide)): ?>
                     <?php if (!empty($facontech_extra_about_text)): ?>
                        <div class="offcanvas__text d-none d-lg-block">
                           <p>
                              <?php echo esc_html($facontech_extra_about_text); ?>
                           </p>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty($facontech_extra_map)): ?>
                        <div class="offcanvas__map d-none d-lg-block mb-15">
                           <iframe src="<?php echo facontech_kses($facontech_extra_map); ?>"></iframe>
                        </div>
                     <?php endif; ?>

                     <div class="offcanvas__contact mt-30 mb-20">
                        <?php if (!empty($facontech_contact_title)): ?>
                           <h4>
                              <?php echo esc_html($facontech_contact_title); ?>
                           </h4>
                        <?php endif; ?>
                        <ul>
                           <?php if (!empty($facontech_extra_address)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-map-marker-alt"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo facontech_kses($facontech_extra_address); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                           <?php if (!empty($facontech_extra_phone)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo facontech_kses($facontech_extra_phone); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                           <?php if (!empty($facontech_extra_email)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo facontech_kses($facontech_extra_email); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                        </ul>
                     </div>

                     <div class="offcanvas__social">
                        <?php facontech_header_social_profiles(); ?>
                     </div>

                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->
<!-- offcanvas area end -->
<div class="body-overlay"></div>
<!-- offcanvas area end -->