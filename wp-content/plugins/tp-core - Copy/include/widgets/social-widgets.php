<?php




// sidebar social widget
class ts_facontech_sidebar_social_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'facontech_sidebar_social_widget',
            __('Facontech: Sidebar Social Icons', 'facontech'),
            ['description' => __('Display sidebar social icons with links', 'facontech')]
        );
    }

    // Frontend Output
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $title  = $instance['title'] ?? 'Follow Us:';
        $facebook  = $instance['facebook'] ?? '#';
        $quora     = $instance['quora'] ?? '#';
        $linkedin  = $instance['linkedin'] ?? '#';
        $instagram = $instance['instagram'] ?? '#';




        echo '<div class="widget-area">';
        echo '<div class="widget widget-follow aos-init aos-animate mt-0">';
        echo '<div class="follow">';
        echo '<div class="title">';
        echo '<h2>' . esc_html($title) . '</h2>';
        echo '</div>';
        echo '<div class="social">';
        echo '<ul class="list-unstyled">';
        echo '<li><a href="' . esc_url($facebook) . '" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>';
        echo '<li><a href="' . esc_url($quora) . '" target="_blank"><i class="fa-brands fa-quora"></i></a></li>';
        echo '<li><a href="' . esc_url($linkedin) . '" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>';
        echo '<li><a href="' . esc_url($instagram) . '" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>';

        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo $args['after_widget'];
    }

    // Admin form
    public function form($instance)
    {
        $title  = $instance['title'] ?? '';
        $facebook  = $instance['facebook'] ?? '';
        $quora     = $instance['quora'] ?? '';
        $linkedin  = $instance['linkedin'] ?? '';
        $instagram = $instance['instagram'] ?? '';

?>

<p>
    <label>Title:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"
        type="text">
</p>
<p>
    <label>Facebook URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>"
        value="<?php echo esc_attr($facebook); ?>" type="text">
</p>

<p>
    <label>Quora URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('quora'); ?>" value="<?php echo esc_attr($quora); ?>"
        type="text">
</p>

<p>
    <label>LinkedIn URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('linkedin'); ?>"
        value="<?php echo esc_attr($linkedin); ?>" type="text">
</p>

<p>
    <label>Instagram URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('instagram'); ?>"
        value="<?php echo esc_attr($instagram); ?>" type="text">
</p>

<?php
    }

    // Save values
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title']  = sanitize_text_field($new_instance['title']);
        $instance['facebook']  = sanitize_text_field($new_instance['facebook']);
        $instance['quora']     = sanitize_text_field($new_instance['quora']);
        $instance['linkedin']  = sanitize_text_field($new_instance['linkedin']);
        $instance['instagram'] = sanitize_text_field($new_instance['instagram']);
        return $instance;
    }
}

// footer social widget
class ts_facontech_footer_social_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'facontech_footer_social_widget',
            __('Facontech: Footer Social Icons', 'facontech'),
            ['description' => __('Display footer social icons with links', 'facontech')]
        );
    }

    // Frontend Output
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $title  = $instance['title'] ?? 'Follow Us:';
        $facebook  = $instance['facebook'] ?? '#';
        $quora     = $instance['quora'] ?? '#';
        $linkedin  = $instance['linkedin'] ?? '#';
        $instagram = $instance['instagram'] ?? '#';

        echo '<div class=" widget" data-aos="fade-up" data-aos-delay="500">';
        echo '<h6>' . esc_html($title) . '</h6>';
        echo '<div class="social one">';
        echo '<a href="' . esc_url($facebook) . '" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>';
        echo '<a href="' . esc_url($quora) . '" target="_blank"><i class="fa-brands fa-quora"></i></a>';
        echo '<a href="' . esc_url($linkedin) . '" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>';
        echo '<a href="' . esc_url($instagram) . '" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
        echo '</div>';
        echo '</div>';

        echo $args['after_widget'];
    }

    // Admin form
    public function form($instance)
    {
        $title  = $instance['title'] ?? '';
        $facebook  = $instance['facebook'] ?? '';
        $quora     = $instance['quora'] ?? '';
        $linkedin  = $instance['linkedin'] ?? '';
        $instagram = $instance['instagram'] ?? '';

    ?>

<p>
    <label>Title:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"
        type="text">
</p>
<p>
    <label>Facebook URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>"
        value="<?php echo esc_attr($facebook); ?>" type="text">
</p>

<p>
    <label>Quora URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('quora'); ?>" value="<?php echo esc_attr($quora); ?>"
        type="text">
</p>

<p>
    <label>LinkedIn URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('linkedin'); ?>"
        value="<?php echo esc_attr($linkedin); ?>" type="text">
</p>

<p>
    <label>Instagram URL:</label>
    <input class="widefat" name="<?php echo $this->get_field_name('instagram'); ?>"
        value="<?php echo esc_attr($instagram); ?>" type="text">
</p>

<?php
    }

    // Save values
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title']  = sanitize_text_field($new_instance['title']);
        $instance['facebook']  = sanitize_text_field($new_instance['facebook']);
        $instance['quora']     = sanitize_text_field($new_instance['quora']);
        $instance['linkedin']  = sanitize_text_field($new_instance['linkedin']);
        $instance['instagram'] = sanitize_text_field($new_instance['instagram']);
        return $instance;
    }
}




add_action('widgets_init', function () {
	register_widget('ts_facontech_sidebar_social_widget');
	register_widget('ts_facontech_footer_social_widget');
});