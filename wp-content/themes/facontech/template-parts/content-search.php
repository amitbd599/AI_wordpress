<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */

if (is_single()): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('format-standard '); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="blog-image">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
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


    <article id="post-<?php the_ID(); ?>" <?php post_class('format-search'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="img-file">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                </a>
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

<?php endif; ?>