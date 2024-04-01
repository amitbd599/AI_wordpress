<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$facontech_audio_url = function_exists('get_field') ? get_field('formate_style') : NULL;
if (is_single()):
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('format-audio '); ?>>
        <?php if (!empty($facontech_audio_url)): ?>
            <div class="postbox__thumb postbox__audio w-img p-relative">
                <?php echo wp_oembed_get($facontech_audio_url); ?>
            </div>
        <?php endif; ?>
        <div class="article-content">
            <!-- blog meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <div class="title mt-20">
                <h2>
                    <?php the_title(); ?>
                </h2>
            </div>


            <div class="inner-text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'facontech'),
                    'after' => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after' => '</span>',
                ]);
                ?>
            </div>
            <div class="blog-footer">
                <?php print facontech_get_tag(); ?>

                <!-- social share -->
                <?php get_template_part('template-parts/blog/blog-social-share'); ?>
            </div>
        </div>
    </article>

<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('format-audio'); ?>>
        <?php if (!empty($facontech_audio_url)): ?>
            <div class="postbox__thumb postbox__audio w-img p-relative">
                <?php echo wp_oembed_get($facontech_audio_url); ?>
            </div>
        <?php endif; ?>

        <div class="text-file">
            <!-- blog meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <div class="title">
                <h2><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <p>
                    <?php the_excerpt(); ?>
                </p>
                <!-- blog btn -->
                <?php get_template_part('template-parts/blog/blog-btn'); ?>


            </div>
        </div>
    </article>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-audio mb-50 d-none'); ?>>
        <?php if (!empty($facontech_audio_url)): ?>
            <div class="postbox__thumb postbox__audio w-img p-relative">
                <?php echo wp_oembed_get($facontech_audio_url); ?>
            </div>
        <?php endif; ?>
        <div class="postbox__content">
            <!-- blog meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <h3 class="postbox__title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="postbox__text">
                <?php the_excerpt(); ?>
            </div>

            <!-- blog btn -->
            <?php get_template_part('template-parts/blog/blog-btn'); ?>
        </div>
    </article>
    <?php
endif; ?>