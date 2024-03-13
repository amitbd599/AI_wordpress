<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$facontech_blog_btn = get_theme_mod('facontech_blog_btn', 'Read More');
$facontech_blog_btn_switch = get_theme_mod('facontech_blog_btn_switch', true);

?>

<?php if (!empty($facontech_blog_btn_switch)): ?>
    <div class="postbox__read-more">
        <a href="<?php the_permalink(); ?>" class="tp-btn">
            <?php print esc_html($facontech_blog_btn); ?>
        </a>
    </div>
<?php endif; ?>