<?php

/**
 * Template part for displaying header side information
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$facontech_side_logo = get_theme_mod('facontech_side_logo', get_template_directory_uri() . '/assets/img/common/logo-black.png');
$facontech_extra_about_title = get_theme_mod('facontech_extra_about_title', __('About FaconTech', 'facontech'));
$facontech_extra_about_text = get_theme_mod('facontech_extra_about_text', __(' Most people focus on the results of AI. For those of us who like to look under the hood, there are four foundational elements to understand: categorization, classification, machine learning, and collaborative filtering. ', 'facontech'));



$facontech_extra_map_title = get_theme_mod('facontech_extra_map_title', __('Need To Location', 'facontech'));
$facontech_extra_map = get_theme_mod('facontech_extra_map', __('https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd', 'facontech'));
$facontech_contact_title = get_theme_mod('facontech_contact_title', __('Contact Info', 'facontech'));
$facontech_extra_address = get_theme_mod('facontech_extra_address', __('12/A, Mirnada City Tower, NYC', 'facontech'));
$facontech_extra_phone = get_theme_mod('facontech_extra_phone', __('088889797697', 'facontech'));
$facontech_extra_email = get_theme_mod('facontech_extra_email', __('support@mail.com ', 'facontech'));
$facontech_gallery = get_theme_mod('facontech_gallery');
?>

<!-- Right Sidebar start -->
<section class="sidebar-right">
   <div class="wrapper">


      <?php if (!empty($facontech_extra_about_text)): ?>
         <div class="intro-text">
            <div class="title-text">
               <h3><?php echo esc_html($facontech_extra_about_title) ?> </h3>
               <p>
                  <?php echo esc_html($facontech_extra_about_text); ?>
               </p>
            </div>

         </div>
      <?php endif; ?>


      <?php if (!empty($facontech_gallery)): ?>
         <div class="intro-text">
            <div class="title-text">
               <h3> <?php echo esc_html__('Gallery', 'facontech') ?> </h3>
            </div>
            <div class="img-file">

               <?php foreach ($facontech_gallery as $image): ?>

                  <img class="img-fluid" src="<?php echo esc_url($image['image_client']) ?>"
                     alt="<?php echo esc_attr__("Gallery Image", "facontech") ?>">

               <?php endforeach; ?>

            </div>
         </div>
      <?php endif; ?>




      <?php if (!empty($facontech_extra_map)): ?>
         <div class="intro-text">
            <div class="title-text">
               <h3>
                  <?php echo esc_html($facontech_extra_map_title) ?>
               </h3>
               <iframe src="<?php echo esc_url($facontech_extra_map); ?>"></iframe>
            </div>

         </div>
      <?php endif; ?>

      <div class="intro-text">
         <div class="title-text">
            <h3>
               <?php echo esc_html($facontech_contact_title); ?>
            </h3>
            <ul>
               <?php if (!empty($facontech_extra_address)): ?>
                  <li>
                     <i class="fa-sharp fa-solid fa-location-dot pe-1"></i>
                     <?php echo esc_html($facontech_extra_address); ?>
                  </li>
               <?php endif; ?>
               <?php if (!empty($facontech_extra_email)): ?>
                  <li><i class="fa-solid fa-envelope pe-1"></i>
                     <?php echo esc_html($facontech_extra_email); ?>
                  </li>
               <?php endif; ?>
               <?php if (!empty($facontech_extra_phone)): ?>
                  <li><i class="fa-sharp fa-solid fa-phone-volume pe-1"></i>
                     <?php echo esc_html($facontech_extra_phone); ?>
                  </li>
               <?php endif; ?>
            </ul>
         </div>

      </div>

      <div class="close-icon sidebar-close">
         <i class="fa-solid fa-xmark"></i>
      </div>
   </div>
</section>
<!-- Right Sidebar end -->
<div class="body-overlay"></div>