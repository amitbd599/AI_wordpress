<?php
	/**
	 * TSCore Sidebar Form Widget
	 *
	 *
	 * @author 		Theme_Pure
	 * @category 	Widgets
	 * @package 	TSCore/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'TS_sidebar_form_widget');
	function TS_sidebar_form_widget() {
		register_widget('TS_sidebar_form_widget');
	}


	class TS_sidebar_form_widget  extends WP_Widget{

		public function __construct(){
			parent::__construct('TS_sidebar_form_widget',esc_html__('TS Sidebar Form','TScore'),array(
				'description' => esc_html__('TS Sidebar Form Widget by Theme_Pure','TScore'),
			));
		}

		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget;

		 	if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>

			<?php if( !empty($TS_form_shortcode) ): ?>
			<div class="sidebar_form_widget">
                <div class="TS_sidebar_form sidebar__contact">
                    <?php print do_shortcode($TS_form_shortcode); ?>
                </div>
            </div>
            <?php endif; ?>

	    	<?php print $after_widget; ?>

		<?php
		}


		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$TS_form_shortcode  = isset($instance['TS_form_shortcode'])? $instance['TS_form_shortcode']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','TScore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Form Shortcode:','TScore'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('TS_form_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('TS_form_shortcode')); ?>" value="<?php print esc_attr($TS_form_shortcode); ?>">

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['subscribe_style'] = ( ! empty( $new_instance['subscribe_style'] ) ) ? strip_tags( $new_instance['subscribe_style'] ) : '';
			$instance['TS_form_shortcode'] = ( ! empty( $new_instance['TS_form_shortcode'] ) ) ? strip_tags( $new_instance['TS_form_shortcode'] ) : '';
			return $instance;
		}
	}