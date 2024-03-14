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

// social 
$facontech_topbar_fb_url = get_theme_mod('facontech_topbar_fb_url', __('#', 'facontech'));
$facontech_topbar_twitter_url = get_theme_mod('facontech_topbar_twitter_url', __('#', 'facontech'));
$facontech_topbar_linkedin_url = get_theme_mod('facontech_topbar_linkedin_url', __('#', 'facontech'));
$facontech_topbar_instagram_url = get_theme_mod('facontech_topbar_instagram_url', __('#', 'facontech'));

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
            <?php facontech_header_logo() ?>
         </div>
         <?php if (!empty($facontech_search)): ?>
            <div class="sidebar__search mb-25">
               <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                  <input type="text" name="s" placeholder="<?php echo esc_attr__("Search here...", "facontech") ?>?"
                     value="<?php echo esc_attr(get_search_query()) ?> ">
                  <button type="submit"><i class="far fa-search"></i></button>
               </form>
            </div>
         <?php endif; ?>
         <div class="mobile-menu fix"></div>
         <?php if (!empty($facontech_side_hide)): ?>

            <div class="mobile-footer">
               <?php if (!empty($facontech_topbar_fb_url) || !empty($facontech_topbar_twitter_url) || !empty($facontech_topbar_linkedin_url) || !empty($facontech_topbar_linkedin_url) || !empty($facontech_topbar_instagram_url)): ?>
                  <div class="follow">
                     <div class="title">
                        <h3>Follow Us:</h3>
                     </div>
                     <div class="social one">
                        <?php if (!empty($facontech_topbar_fb_url)): ?>
                           <a href="#">
                              <i class="fa-brands fa-facebook-f"></i>
                           </a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_twitter_url)): ?>
                           <a href="#">
                              <i class="fa-brands fa-twitter"></i>
                           </a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_linkedin_url)): ?>
                           <a href="#">
                              <i class="fa-brands fa-linkedin-in"></i>
                           </a>
                        <?php endif; ?>
                        <?php if (!empty($facontech_topbar_instagram_url)): ?>
                           <a href="#">
                              <i class="fa-brands fa-instagram"></i>
                           </a>
                        <?php endif; ?>
                     </div>
                  </div>
               <?php endif; ?>
               <?php if (!empty($facontech_extra_address) || !empty($facontech_extra_phone)): ?>
                  <div class="contact">
                     <?php if (!empty($facontech_contact_title)): ?>
                        <div class="title">
                           <h3>
                              <?php echo esc_html($facontech_contact_title); ?>
                           </h3>
                        </div>
                     <?php endif; ?>
                     <ul>
                        <?php if (!empty($facontech_extra_address)): ?>
                           <li>
                              <i class="fa-sharp fa-solid fa-location-dot"></i>
                              <?php echo esc_html($facontech_extra_address); ?>
                           </li>
                        <?php endif; ?>
                        <?php if (!empty($facontech_extra_email)): ?>
                           <li>
                              <i class="fa-solid fa-envelope"></i>
                              <?php echo esc_html($facontech_extra_email); ?>
                           </li>
                        <?php endif; ?>
                        <?php if (!empty($facontech_extra_phone)): ?>
                           <li>
                              <i class="fa-solid fa-phone"></i>
                              <?php echo esc_html($facontech_extra_phone); ?>
                           </li>
                        <?php endif; ?>

                     </ul>
                  </div>
               <?php endif; ?>

            </div>
         <?php endif; ?>

      </div>
   </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>