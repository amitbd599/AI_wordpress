<?php
class ts_Latest_Posts_Footer_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct('TS-latest-posts-footer', 'TS Footer Posts', array(
            'description'    => 'Latest Post Widget by TS'
        ));
    }


    public function widget($args, $instance)
    {
        extract($args);
        extract($instance);

        echo $before_widget;
        if ($instance['title']):
            echo $before_title; ?>
            <?php echo apply_filters('widget_title', $instance['title']); ?>
            <?php echo $after_title; ?>
        <?php endif; ?>



        <div class="footer-wrapper latest_blog_post two mt-4 mt-md-0">
            <div class="inner">
                <ul>
                    <?php
                    $q = new WP_Query(array(
                        'post_type'     => 'post',
                        'posts_per_page' => ($instance['count']) ? $instance['count'] : '3',
                        'order'            => ($instance['posts_order']) ? $instance['posts_order'] : 'DESC',
                        'orderby' => 'comment_count'
                    ));

                    if ($q->have_posts()):
                        while ($q->have_posts()): $q->the_post();
                    ?>



                            <li>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="thumb">
                                        <a class="img-file" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="content">
                                    <a class="title" href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words(get_the_title(), 7, ''); ?>
                                    </a>

                                    <div>
                                        <i class="fa-sharp fa-regular fa-clock"></i>
                                        <span><?php the_time('F d, Y'); ?></span>
                                    </div>
                                </div>
                            </li>


                    <?php endwhile;
                    endif; ?>

                </ul>
            </div>
        </div>


        <?php echo $after_widget; ?>

    <?php
    }



    public function form($instance)
    {
        $title = ! empty($instance['title']) ? $instance['title'] : '';
        $count = ! empty($instance['count']) ? $instance['count'] : esc_html__('3', 'tocores');
        $posts_order = ! empty($instance['posts_order']) ? $instance['posts_order'] : esc_html__('DESC', 'tocores');
        $choose_style = ! empty($instance['choose_style']) ? $instance['choose_style'] : esc_html__('style_1', 'tocores');
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
                id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
            <input type="number" name="<?php echo $this->get_field_name('count'); ?>"
                id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr($count); ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
            <select name="<?php echo $this->get_field_name('posts_order'); ?>"
                id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
                <option value="" disabled="disabled">Select Post Order</option>
                <option value="ASC" <?php if ($posts_order === 'ASC') {
                                        echo 'selected="selected"';
                                    } ?>>ASC</option>
                <option value="DESC" <?php if ($posts_order === 'DESC') {
                                            echo 'selected="selected"';
                                        } ?>>DESC</option>
            </select>
        </p>

<?php }
}




add_action('widgets_init', function () {
    register_widget('ts_Latest_Posts_Footer_Widget');
});
