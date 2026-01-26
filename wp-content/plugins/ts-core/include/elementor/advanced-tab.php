<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Advanced_Tab extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'advanced-tab';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Advanced Tab', 'TScore' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ts-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'TScore' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'TScore' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

        // layout Panel
        $this->start_controls_section(
            'TS_layout',
            [
                'label' => esc_html__('Design Layout', 'TScore'),
            ]
        );
        $this->add_control(
            'TS_design_style',
            [
                'label' => esc_html__('Select Layout', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'TScore'),
                    'layout-2' => esc_html__('Layout 2', 'TScore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
            '_section_price_tabs',
            [
                'label' => __('Advanced Tabs', 'TScore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'TScore'),
                'default' => __('Tab Title', 'TScore'),
                'placeholder' => __('Type Tab Title', 'TScore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'active_tab',
            [
                'label' => __('Is Active Tab?', 'TScore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'TScore'),
                'label_off' => __('No', 'TScore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'template',
            [
                'label' => __('Section Template', 'TScore'),
                'placeholder' => __('Select a section template for as tab content', 'TScore'),

                'type' => Controls_Manager::SELECT2,
                'options' => get_elementor_templates()
            ]
        );

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{title}}',
                'default' => [
                    [
                        'title' => 'Tab 1',
                    ],
                    [
                        'title' => 'Tab 2',
                    ]
                ]
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'TScore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'TScore' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'TScore' ),
					'uppercase' => __( 'UPPERCASE', 'TScore' ),
					'lowercase' => __( 'lowercase', 'TScore' ),
					'capitalize' => __( 'Capitalize', 'TScore' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget ouTSut on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>


		<?php if ( $settings['TS_design_style']  == 'layout-2' ):
            $this->add_render_attribute('title_args', 'class', 'title');
        ?>

	    <section class="feature" id="ts-features">
	      <div class="container">
	        <div class="row">
	          <div class="col-12">
	            <div class="featureTab">
	              <ul class="nav nav-tabs" id="myTab" role="tablist">
	              	<?php foreach ($settings['tabs'] as $key => $tab):
                        $active = ($key == 0) ? 'active' : '';
                    ?>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link <?php echo esc_attr($active); ?>" id="home-tab-<?php echo esc_attr($key); ?>" data-bs-toggle="tab" data-bs-target="#home-<?php echo esc_attr($key); ?>" type="button" role="tab" aria-controls="home-<?php echo esc_attr($key); ?>" aria-selected="true"><?php echo TS_kses($tab['title']); ?></button>
	                </li>
	                <?php endforeach; ?>
	              </ul>
	              <div class="tab-content" id="myTabContent">
					<?php foreach ($settings['tabs'] as $key => $tab):
                        $active = ($key == 0) ? 'show active' : '';
                    ?>
	                <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="home-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="home-tab-<?php echo esc_attr($key); ?>">
	                  <div class="featureTab__box pt-90">
	                    <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
	                  </div>
	                </div>
	                <?php endforeach; ?>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>


		<?php else:
            if ( !empty($settings['TS_image']['url']) ) {
                $TS_image = !empty($settings['TS_image']['id']) ? wp_get_attachment_image_url( $settings['TS_image']['id'], $settings['TS_image_size_size']) : $settings['TS_image']['url'];
                $TS_image_alt = get_post_meta($settings["TS_image"]["id"], "_wp_attachment_image_alt", true);
            }
			$this->add_render_attribute('title_args', 'class', 'sectionTitle__big');
		?>
		<div class="mvv">
	        <div class="container">
	          <div class="row">
	            <div class="col-12">
	              <div class="mvvTabs">
	                <div class="mvvTabs__wrapper d-flex align-items-start">
	                  <div class="nav nav-pills mb-30" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<?php foreach ($settings['tabs'] as $key => $tab):
                        	$active = ($key == 0) ? 'active' : '';
                        ?>
	                    <button class="mvvTabs__button nav-link <?php echo esc_attr($active); ?>" id="v-pills-home-tab-<?php echo esc_attr($key); ?>" data-bs-toggle="pill" data-bs-target="#v-pills-home-<?php echo esc_attr($key); ?>" type="button" role="tab" aria-controls="v-pills-home-<?php echo esc_attr($key); ?>" aria-selected="true"><?php echo TS_kses($tab['title']); ?></button>
	                    <?php endforeach; ?>
	                  </div>
	                  <div class="tab-content mb-30" id="v-pills-tabContent">
						<?php foreach ($settings['tabs'] as $key => $tab):
                            $active = ($key == 0) ? 'show active' : '';
                        ?>
	                    <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="v-pills-home-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="v-pills-home-tab-<?php echo esc_attr($key); ?>">
	                      <div class="mvvTabs__content">
	                        <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
	                      </div>
	                    </div>
	                    <?php endforeach; ?>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>

	    <?php endif; ?>

		<?php
	}

}
$widgets_manager->register( new TS_Advanced_Tab() );