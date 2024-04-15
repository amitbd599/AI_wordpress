<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package facontech
 */

get_header();
?>

<?php
$facontech_404_bg = get_theme_mod('facontech_404_bg', get_template_directory_uri() . '/assets/img/error/error.png');
$facontech_error_title = get_theme_mod('facontech_error_title', __('Page not found', 'facontech'));
$facontech_error_link_text = get_theme_mod('facontech_error_link_text', __('Back To Home', 'facontech'));
$facontech_error_desc = get_theme_mod('facontech_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'facontech'));
?>

<section class="error-section">
   <div class="container">
      <div class="row">
         <div class="col-12">

            <div class="wrapper">
               <div class="img-file">
                  <img class="img-fluid" src="<?php echo esc_url($facontech_404_bg); ?>"
                     alt="<?php print esc_attr__('Error 404', 'facontech'); ?>">
               </div>
               <div class="text-file">
                  <h4> <?php print esc_html($facontech_error_title); ?></h4>
                  <p> <?php print esc_html($facontech_error_desc); ?></p>
               </div>
               <div class="d-adjust">

                  <a href="<?php print esc_url(home_url('/')); ?>" class="default-btn">
                     <?php print esc_html($facontech_error_link_text); ?>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



<?php
get_footer();
