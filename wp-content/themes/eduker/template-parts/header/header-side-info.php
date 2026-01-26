<?php

/**
 * Template part for displaying header side information
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dustrilox
 */

$dustrilox_side_hide = get_theme_mod('dustrilox_side_hide', false);
$dustrilox_search = get_theme_mod('dustrilox_search', false);
$dustrilox_side_logo = get_theme_mod('dustrilox_side_logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
$dustrilox_extra_about_text = get_theme_mod('dustrilox_extra_about_text', __('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'dustrilox'));

$dustrilox_extra_map = get_theme_mod('dustrilox_extra_map', __('#', 'dustrilox'));
$dustrilox_contact_title = get_theme_mod('dustrilox_contact_title', __('Contact Info', 'dustrilox'));
$dustrilox_extra_address = get_theme_mod('dustrilox_extra_address', __('12/A, Mirnada City Tower, NYC', 'dustrilox'));
$dustrilox_extra_phone = get_theme_mod('dustrilox_extra_phone', __('088889797697', 'dustrilox'));
$dustrilox_extra_email = get_theme_mod('dustrilox_extra_email', __('support@mail.com ', 'dustrilox'));
?>

<div class="d-none offcanvas__area">
   <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="offcanvas__wrapper">
               <div class="offcanvas__content">
                  <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                     <?php if (!empty($dustrilox_side_logo)): ?>
                        <div class="offcanvas__logo logo">
                           <a href="<?php print esc_url(home_url('/')); ?>">
                              <img src="<?php print esc_url($dustrilox_side_logo); ?>"
                                 alt="<?php echo esc_attr__('logo', 'dustrilox'); ?>">
                           </a>
                        </div>
                     <?php endif; ?>

                     <div class="offcanvas__close">
                        <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                           <i class="fal fa-times"></i>
                        </button>
                     </div>

                  </div>

                  <?php if (!empty($dustrilox_search)): ?>
                     <div class="offcanvas__search mb-25">
                        <form action="<?php print esc_url(home_url('/')); ?>">
                           <input type="text" name="s" value="<?php print esc_attr(get_search_query()) ?>"
                              placeholder="<?php print esc_attr__('What are you searching for?', 'dustrilox'); ?>">
                           <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                     </div>
                  <?php endif; ?>

                  <div class="mobile-menu fix"></div>


                  <?php if (!empty($dustrilox_side_hide)): ?>
                     <?php if (!empty($dustrilox_extra_about_text)): ?>
                        <div class="offcanvas__text d-none d-lg-block">
                           <p><?php echo esc_html($dustrilox_extra_about_text); ?></p>
                        </div>
                     <?php endif; ?>

                     <?php if (!empty($dustrilox_extra_map)): ?>
                        <div class="offcanvas__map d-none d-lg-block mb-15">
                           <iframe src="<?php echo dustrilox_kses($dustrilox_extra_map); ?>"></iframe>
                        </div>
                     <?php endif; ?>

                     <div class="offcanvas__contact mt-30 mb-20">
                        <?php if (!empty($dustrilox_contact_title)): ?>
                           <h4><?php echo esc_html($dustrilox_contact_title); ?></h4>
                        <?php endif; ?>
                        <ul>
                           <?php if (!empty($dustrilox_extra_address)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-map-marker-alt"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo dustrilox_kses($dustrilox_extra_address); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                           <?php if (!empty($dustrilox_extra_phone)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo dustrilox_kses($dustrilox_extra_phone); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                           <?php if (!empty($dustrilox_extra_email)): ?>
                              <li class="d-flex align-items-center">
                                 <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                 </div>
                                 <div class="offcanvas__contact-text">
                                    <?php echo dustrilox_kses($dustrilox_extra_email); ?>
                                 </div>
                              </li>
                           <?php endif; ?>
                        </ul>
                     </div>

                     <div class="offcanvas__social">
                        <?php dustrilox_header_social_profiles(); ?>
                     </div>

                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<!-- sidebar area start -->
<div class="sidebar__area">
   <div class="sidebar__wrapper">
      <div class="sidebar__close">
         <button class="sidebar__close-btn" id="sidebar__close-btn">
            <i class="fal fa-times"></i>
         </button>
      </div>
      <div class="sidebar__content">
         <div class="sidebar__logo mb-40">
            <a href="index.html">
               <img src="assets/img/logo/logo-black.png" alt="logo">
            </a>
         </div>
         <div class="sidebar__search mb-25">
            <form action="#">
               <input type="text" placeholder="What are you searching for?">
               <button type="submit"><i class="far fa-search"></i></button>
            </form>
         </div>
         <div class="mobile-menu fix"></div>
         <div class="sidebar__contact mt-30 mb-20">
            <h4>Contact Info</h4>
            <ul>
               <li class="d-flex align-items-center">
                  <div class="sidebar__contact-icon mr-15">
                     <i class="fal fa-map-marker-alt"></i>
                  </div>
                  <div class="sidebar__contact-text">
                     <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A, Mirnada City Tower, NYC</a>
                  </div>
               </li>
               <li class="d-flex align-items-center">
                  <div class="sidebar__contact-icon mr-15">
                     <i class="far fa-phone"></i>
                  </div>
                  <div class="sidebar__contact-text">
                     <a href="tel:+012-345-6789">088889797697</a>
                  </div>
               </li>
               <li class="d-flex align-items-center">
                  <div class="sidebar__contact-icon mr-15">
                     <i class="fal fa-envelope"></i>
                  </div>
                  <div class="sidebar__contact-text">
                     <a href="mailto:info@gmail.com">info@gmail.com</a>
                  </div>
               </li>
            </ul>
         </div>
         <div class="sidebar__social">
            <ul>
               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
               <li><a href="#"><i class="fab fa-youtube"></i></a></li>
               <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>
<!-- sidebar area end -->