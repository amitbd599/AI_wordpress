<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$categories = get_the_terms($post->ID, 'category');
$facontech_blog_date = get_theme_mod('facontech_blog_date', true);
$facontech_blog_comments = get_theme_mod('facontech_blog_comments', true);
$facontech_blog_author = get_theme_mod('facontech_blog_author', true);
$facontech_blog_cat = get_theme_mod('facontech_blog_cat', false);

?>


<div class="intro">

    <?php if (!empty($facontech_blog_author)): ?>
        <div class="item">
            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                class="date d-flex gap-2 align-items-center">
                <i class="fa-solid fa-user"></i>
                <span>
                    <?php print get_the_author(); ?>
                </span>
            </a>
        </div>
    <?php endif; ?>

    <?php if (!empty($facontech_blog_cat)): ?>
        <?php if (!empty($categories[0]->name)): ?>
            <div class="item">
                <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"
                    class="date d-flex gap-2 align-items-center">
                    <i class="fa fa-tag"></i>
                    <span>
                        <?php echo esc_html($categories[0]->name); ?>
                    </span>
                </a>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!empty($facontech_blog_date)): ?>
        <div class="item">
            <div class="date d-flex gap-2 align-items-center">
                <span>
                    <i class="fa-solid fa-calendar-days"></i>
                </span>
                <span>
                    <?php the_time(get_option('date_format')); ?>
                </span>
            </div>
        </div>
    <?php endif; ?>


    <?php if (!empty($facontech_blog_comments)): ?>
        <div class="item">
            <a href="<?php comments_link(); ?>" class="date d-flex gap-2 align-items-center">
                <i class="fa-solid fa-comment"></i>
                <span>
                    <?php comments_number(); ?>
                </span>
            </a>
        </div>
    <?php endif; ?>
</div>