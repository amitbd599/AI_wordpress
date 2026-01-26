<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Process extends Widget_Base {

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
		return 'process';
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
		return __( 'Process', 'TScore' );
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
                    'layout-3' => esc_html__('Layout 3', 'TScore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->add_control(
            'TS_section_shape_show',
            [
                'label' => esc_html__( 'Shape ?', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'TScore' ),
                'label_off' => esc_html__( 'Hide', 'TScore' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'TS_section_title_show',
            [
                'label' => esc_html__( 'Section Title & Content', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'TScore' ),
                'label_off' => esc_html__( 'Hide', 'TScore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'TS_sub_title',
            [
                'label' => esc_html__('Sub Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TS Sub Title', 'TScore'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'TScore'),
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
            'TS_desctiption',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('TS section description here', 'TScore'),
                'placeholder' => esc_html__('Type section description here', 'TScore'),
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

        // Service group
        $this->start_controls_section(
            'TS_process',
            [
                'label' => esc_html__('Process List', 'TScore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'TScore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'TS_process_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'TScore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'TScore'),
                    'icon' => esc_html__('Icon', 'TScore'),
                ],
            ]
        );

        $repeater->add_control(
            'TS_process_image',
            [
                'label' => esc_html__('Upload Icon Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'TS_process_icon_type' => 'image'
                ]

            ]
        );

        $repeater->add_control(
            'TS_process_image_white',
            [
                'label' => esc_html__('Upload White Icon Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'TS_process_icon_type' => 'image'
                ]

            ]
        );

        if (TS_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'TS_process_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'TS_process_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'TS_process_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'TS_process_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $repeater->add_control(
            'TS_process_step', [
                'label' => esc_html__('Sub Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Step - 01', 'TScore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'TS_process_title', [
                'label' => esc_html__('Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'TScore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'TS_process_description',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'TS_process_list',
            [
                'label' => esc_html__('Services - List', 'TScore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'TS_process_title' => esc_html__('Discover', 'TScore'),
                    ],
                    [
                        'TS_process_title' => esc_html__('Define', 'TScore')
                    ],
                    [
                        'TS_process_title' => esc_html__('Develop', 'TScore')
                    ],
                    [
                        'TS_process_title' => esc_html__('Deliver', 'TScore')
                    ]
                ],
                'title_field' => '{{{ TS_process_title }}}',
            ]
        );
        $this->add_responsive_control(
            'TS_process_align',
            [
                'label' => esc_html__( 'Alignment', 'TScore' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'TScore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'TScore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'TScore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        // TAB_STYLE
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
        // Link
        if ('2' == !empty($settings['TS_btn_link_type'])) {
            $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['TS_btn_page_link']));
            $this->add_render_attribute('ts-button-arg', 'target', '_self');
            $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('ts-button-arg', 'class', ' btn');
        } else {
        	$this->add_render_attribute('ts-button-arg', 'class', ' btn');
        	$this->add_render_attribute('ts-button-arg', 'data-wow-delay', ' .6s ');
            if (!empty($settings['TS_btn_link']['url'])) {
                $this->add_render_attribute('ts-button-arg', 'href', esc_url($settings['TS_btn_link']['url']));
            }
            if (!empty($settings['TS_btn_link']['is_external'])) {
                $this->add_render_attribute('ts-button-arg', 'target', '_blank');
            }
            if (!empty($settings['TS_btn_link']['nofollow'])) {
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
            }
        }

        // Button
        if (!empty($settings['TS_btn_link']['url']) || isset($settings['TS_btn_link_type'])) {
            // Link
            $button_html = '<a ' . $this->get_render_attribute_string('ts-button-arg') . '>' . $settings['TS_btn_text'] . '</a>';
        }

		?>

		<?php if ( $settings['TS_design_style']  == 'layout-2' ): ?>
		<div class="style-2"></div>

		<?php else:
			$this->add_render_attribute('title_args', 'class', 'title');
            $shape_swtich = ($settings['TS_section_shape_show'] == 'yes' ) ? '' : 'shape-off p-0';
		?>

            <section class="work__process <?php echo esc_attr($shape_swtich); ?>">
                <div class="container">
                    <?php if ( !empty($settings['TS_section_title_show']) ) : ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <?php if ( !empty($settings['TS_sub_title']) ) : ?>
                                <span class="sub-title ts-el-subtitle"><?php echo TS_kses( $settings['TS_sub_title'] ); ?></span>
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

                                <?php if ( !empty($settings['TS_desctiption']) ) : ?>
                                <p class="desc"><?php echo TS_kses( $settings['TS_desctiption'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row work__process__wrap">
                        <?php foreach ($settings['TS_process_list'] as $item) : ?>
                        <div class="col">
                            <div class="work__process__item">
                                <?php if (!empty($item['TS_process_title' ])): ?>
                                <span class="work__process_step"><?php echo TS_kses($item['TS_process_step' ]); ?></span>
                                <?php endif; ?>
                                <div class="work__process__icon">
                                    <?php if($item['TS_process_icon_type'] !== 'image') : ?>
                                        <?php if (!empty($item['TS_process_icon']) || !empty($item['TS_process_selected_icon']['value'])) : ?>
                                            <div class="icon">
                                                <?php TS_render_icon($item, 'TS_process_icon', 'TS_process_selected_icon'); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <div class="icon">
                                            <?php if (!empty($item['TS_process_image']['url'])): ?>
                                            <img class="light" src="<?php echo $item['TS_process_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_process_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                            <?php endif; ?>

                                            <?php if (!empty($item['TS_process_image_white']['url'])): ?>
                                            <img class="dark" src="<?php echo $item['TS_process_image_white']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_process_image_white']['url']), '_wp_attachment_image_alt', true); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="work__process__content">
                                    <?php if (!empty($item['TS_process_title' ])): ?>
                                    <h4 class="title">
                                        <?php echo TS_kses($item['TS_process_title' ]); ?>
                                    </h4>
                                    <?php endif; ?>

                                    <?php if (!empty($item['TS_process_description' ])): ?>
                                    <p><?php echo TS_kses($item['TS_process_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TS_Process() );