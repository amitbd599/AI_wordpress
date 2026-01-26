<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Live_Donation extends Widget_Base {

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
		return 'live-donation';
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
		return __( 'Live Donation', 'TScore' );
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // TS_section_title
        $this->start_controls_section(
            'TS_section_title',
            [
                'label' => esc_html__('Title & Content', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_donate_percentage',
            [
                'label' => esc_html__('Percentage', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('80', 'TScore'),
                'placeholder' => esc_html__('Type Percentage Number', 'TScore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'TS_title',
            [
                'label' => esc_html__('Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TS Title Here', 'TScore'),
                'placeholder' => esc_html__('Type Heading Text', 'TScore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'TS_donate_number',
            [
                'label' => esc_html__('Donation Number', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('28,0000', 'TScore'),
                'placeholder' => esc_html__('Type donation number here', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'TScore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'TScore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'TScore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'TScore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'TScore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'TScore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'TScore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'TS_align',
            [
                'label' => esc_html__('Alignment', 'TScore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'TScore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'TScore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'TScore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
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
            <?php if ( !empty($settings['TS_section_title_show']) ) : ?>
            <div class="contact__info">
                <div class="contact__info__icon">
                    <?php if($settings['TS_icon_type'] !== 'image') : ?>
                    <?php if (!empty($settings['TS_icon']) || !empty($settings['TS_selected_icon']['value'])) : ?>
                        <div class="ts-icon">
                            <?php TS_render_icon($settings, 'TS_icon', 'TS_selected_icon'); ?>
                        </div>
                    <?php endif; ?>
                    <?php else : ?>
                        <div class="icon">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'TS_icon_image'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="contact__info__content">
                    <?php if ( !empty($settings['TS_donate_percentage']) ) : ?>
                    <span class="sub-title ts-el-subtitle"><?php echo TS_kses( $settings['TS_donate_percentage'] ); ?></span>
                    <?php endif; ?>

                    <?php
                    if ( !empty($settings['TS_title' ]) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['TS_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            TS_kses( $settings['TS_title' ] )
                            );
                    endif;
                    ?>

                    <?php if ( !empty($settings['TS_donate_number']) ) : ?>
                    <span><?php echo TS_kses( $settings['TS_donate_number'] ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>


		<?php else:
			$this->add_render_attribute('title_args', 'class', 'sponsorsTitle__heading text-uppercase');
		?>

      <div class="featureTab__content p-0">
        <div class="sponsorsTitle sponsorsTitle--style2">
          <span class="sponsorsTitle__line"></span>
          <?php
            if ( !empty($settings['TS_title' ]) ) :
                printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['TS_title_tag'] ),
                    $this->get_render_attribute_string( 'title_args' ),
                    TS_kses( $settings['TS_title' ] )
                    );
            endif;
            ?>
          <span class="sponsorsTitle__line"></span>
        </div>

        <?php if ( !empty($settings['TS_donate_number']) ) : ?>
        <h3 class="featureTab__content__counter"><?php echo TS_kses( $settings['TS_donate_number'] ); ?></h3>
        <?php endif; ?>
        <?php if ( !empty($settings['TS_donate_percentage']) ) : ?>
        <div class="featureBlock__donation__progress">
          <div class="featureBlock__donation__bar">
            <span class="featureBlock__donation__text skill-bar skill-bar--text"
            data-width="<?php echo TS_kses( $settings['TS_donate_percentage'] ); ?>%"><span><?php echo TS_kses( $settings['TS_donate_percentage'] ); ?>%</span></span>
            <div class="featureBlock__donation__line">
              <span class="skill-bars">
              <span class="skill-bars__line skill-bar" data-width="<?php echo TS_kses( $settings['TS_donate_percentage'] ); ?>%"></span>
              </span>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TS_Live_Donation() );