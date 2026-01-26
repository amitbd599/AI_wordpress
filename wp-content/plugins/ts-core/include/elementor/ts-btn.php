<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Btn extends Widget_Base {

    use TS_Style_Trait;

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
		return 'ts-btn';
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
		return __( 'TS BTN', 'TScore' );
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

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
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
	protected function register_controls_section() {

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

        // TS_btn_button_group
        $this->start_controls_section(
            'TS_btn_button_group',
            [
                'label' => esc_html__('Button', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_btn_button_show',
            [
                'label' => esc_html__( 'Show Button', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'TScore' ),
                'label_off' => esc_html__( 'Hide', 'TScore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'TS_btn_text',
            [
                'label' => esc_html__('Button Text', 'TScore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'TScore'),
                'title' => esc_html__('Enter button text', 'TScore'),
                'label_block' => true,
                'condition' => [
                    'TS_btn_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'TS_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'TS_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'TS_btn_link',
            [
                'label' => esc_html__('Button link', 'TScore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('htTSs://your-link.com', 'TScore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'TS_btn_link_type' => '1',
                    'TS_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'TS_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'TScore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => TS_get_all_pages(),
                'condition' => [
                    'TS_btn_link_type' => '2',
                    'TS_btn_button_show' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'TS_align',
            [
                'label' => esc_html__('Alignment', 'TScore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'TScore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'TScore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'TScore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

	}

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'TS_theme_btn_style_sec',
            [
                'label' => esc_html__('Button Style', 'TScore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'TS_theme_btn_typography',
                'label' => esc_html__('Typhography', 'TScore'),
                'selector' => '{{WRAPPER}} .ts-el-theme-btn',
            ]
        );

        $this->start_controls_tabs(
            'TS_theme_btn_state_tabs',
        );

        // button normal state
        $this->start_controls_tab(
            'TS_theme_btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_theme_btn_color',
            [
                'label' => esc_html__('Text Color', 'TScore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'TS_theme_btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'TScore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'TS_theme_btn_border',
                'selector' => '{{WRAPPER}} .ts-el-theme-btn',
            ]
        );

        $this->add_control(
            'TS_theme_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'TScore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'TS_theme_btn_box_shadow',
                'selector' => '{{WRAPPER}} .ts-el-theme-btn',
            ]
        );

        $this->end_controls_tab();
        // end normal state

        // button hover state
        $this->start_controls_tab(
            'TS_theme_btn_hover_tab',
            [
                'label' => esc_html__('Hover', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_theme_btn_hover_color',
            [
                'label' => esc_html__('Text Color', 'TScore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'TS_theme_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'TScore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'TS_theme_btn_hover_border',
                'selector' => '{{WRAPPER}} .ts-el-theme-btn:hover',
            ]
        );

        $this->add_control(
            'TS_theme_btn_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'TScore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'TS_theme_btn_hover_box_shadow',
                'selector' => '{{WRAPPER}} .ts-el-theme-btn:hover',
            ]
        );

        $this->end_controls_tab();
        // end hover state


        $this->end_controls_tabs();
        // end button state tabs

        $this->add_control(
            'TS_theme_btn_margin',
            [
                'label' => esc_html__('Button Margin', 'TScore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'TS_theme_btn_padding',
            [
                'label' => esc_html__('Button Padding', 'TScore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .ts-el-theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            // Link
            if ('2' == $settings['TS_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['TS_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn ts-btn-border');
            } else {
                if ( ! empty( $settings['TS_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'ts-button-arg', $settings['TS_btn_link'] );
                    $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn ts-btn-border ts-el-theme-btn');
                }
            }
        ?>

        <?php if (!empty($settings['TS_btn_text'])) : ?>
        <div class="ts-custom-btn">
            <a <?php echo $this->get_render_attribute_string( 'ts-button-arg' ); ?>>
                <?php echo $settings['TS_btn_text']; ?>
            </a>
        </div>
        <?php endif; ?>

		<?php else:
            // Link
            if ('2' == $settings['TS_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['TS_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn');
            } else {
                if ( ! empty( $settings['TS_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'ts-button-arg', $settings['TS_btn_link'] );
                    $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn ts-el-theme-btn');
                }
            }
		?>

        <?php if (!empty($settings['TS_btn_text'])) : ?>
        <div class="ts-custom-btn">
            <a <?php echo $this->get_render_attribute_string( 'ts-button-arg' ); ?>>
                <?php echo $settings['TS_btn_text']; ?>
            </a>
        </div>
        <?php endif; ?>

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TS_Btn() );