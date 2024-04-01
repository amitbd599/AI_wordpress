<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

$gallery_images = function_exists('get_field') ? get_field('gallery_images') : '';


if (is_single()): ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('format-gallery '); ?>>
        <?php if (!empty($gallery_images)): ?>
            <div class="swiper swiper-container gallery-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($gallery_images as $key => $image): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="arrow">
                    <div class="testimonialOne-button-next testimonialOne-button" tabindex="0" role="button"
                        aria-label="Next slide" aria-controls="swiper-wrapper-2f36b79e0f00a63f">
                        <i class="fa-solid fa-chevrons-left"></i>
                    </div>
                    <div class="testimonialOne-button-prev testimonialOne-button" tabindex="0" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-2f36b79e0f00a63f">

                        <i class="fa-solid fa-chevrons-right"></i>
                    </div>

                </div>
                <div class="postbox-nav">
                    <button class="postbox-slider-button-next"><i class="fal fa-arrow-right"></i></button>
                    <button class="postbox-slider-button-prev"><i class="fal fa-arrow-left"></i></button>
                </div>
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

    <article id="post-<?php the_ID(); ?>" <?php post_class('format-gallery'); ?>>
        <?php if (!empty($gallery_images)): ?>
            <div class="swiper swiper-container gallery-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($gallery_images as $key => $image): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="arrow">
                    <div class="testimonialOne-button-next testimonialOne-button" tabindex="0" role="button"
                        aria-label="Next slide" aria-controls="swiper-wrapper-2f36b79e0f00a63f">
                        <i class="fa-solid fa-chevrons-left"></i>
                    </div>
                    <div class="testimonialOne-button-prev testimonialOne-button" tabindex="0" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-2f36b79e0f00a63f">

                        <i class="fa-solid fa-chevrons-right"></i>
                    </div>

                </div>
                <div class="postbox-nav">
                    <button class="postbox-slider-button-next"><i class="fal fa-arrow-right"></i></button>
                    <button class="postbox-slider-button-prev"><i class="fal fa-arrow-left"></i></button>
                </div>
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




    <?php
endif; ?>