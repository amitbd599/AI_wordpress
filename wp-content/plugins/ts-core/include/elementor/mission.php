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
class TS_Mission extends Widget_Base {

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
        return 'ts-mission';
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
        return __( 'Mission', 'TScore' );
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
            'TS_video_url',
            [
                'label' => esc_html__('Video URL', 'TScore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'TScore'),
                'placeholder' => esc_html__('Video url here.', 'TScore'),
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
            'TS_services',
            [
                'label' => esc_html__('Fact List', 'TScore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'TScore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'fact_bg_color',
            [
                'label' => __( 'BG Color', 'tocore' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#7fb432',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}}' => 'background: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'TS_service_icon_type',
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
            'TS_service_image',
            [
                'label' => esc_html__('Upload Icon Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'TS_service_icon_type' => 'image'
                ]

            ]
        );

        if (TS_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'TS_service_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'TS_service_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'TS_service_selected_icon',
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
                        'TS_service_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $repeater->add_control(
            'TS_service_title', [
                'label' => esc_html__('Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('1600', 'TScore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'TS_service_description',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'SOLAR PANEL',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'TS_service_list',
            [
                'label' => esc_html__('Services - List', 'TScore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'TS_service_title' => esc_html__('1600', 'TScore'),
                    ],
                    [
                        'TS_service_title' => esc_html__('289', 'TScore')
                    ],
                    [
                        'TS_service_title' => esc_html__('16k', 'TScore')
                    ],
                    [
                        'TS_service_title' => esc_html__('24mln', 'TScore')
                    ]
                ],
                'title_field' => '{{{ TS_service_title }}}',
            ]
        );
        $this->add_responsive_control(
            'TS_service_align',
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

        $this->add_render_attribute('title_args', 'class', 'sectionTitle__big text-white');
        ?>

        <section class="missionSection missionSection--style1 position-relative" data-bg-image="">
          <div class="sectionShape sectionShape--top">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/shapes/breadcrumb-shape-1.png" alt="Gainioz">
          </div>
          <div class="sectionShape sectionShape--bottom">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/shapes/breadcrumb-shape-2.png" alt="Gainioz">
          </div>
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="missionContent">
                  <!-- Section Heading/Title -->
                  <div class="sectionTitle mb-35">
                    <?php if ( !empty($settings['TS_sub_title']) ) : ?>
                    <span class="sectionTitle__small">
                        <i class="fa-solid fa-heart btn__icon"></i><?php echo TS_kses( $settings['TS_sub_title'] ); ?>
                    </span>
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
                        <p class="aboutContent__text"><?php echo TS_kses( $settings['TS_desctiption'] ); ?></p>
                    <?php endif; ?>
                  </div>
                  <!-- Section Heading/Title End -->
                  <div class="row g-4">
                    <?php foreach ($settings['TS_service_list'] as $item) : ?>
                    <div class="col-lg-6 col-md-6">
                      <div class="missionBlock bgSecondary elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                        <div class="missionBlock__icon">
                            <?php if($item['TS_service_icon_type'] !== 'image') : ?>
                                <?php if (!empty($item['TS_service_icon']) || !empty($item['TS_service_selected_icon']['value'])) : ?>
                                    <div class="ts-sv-icon">
                                        <?php TS_render_icon($item, 'TS_service_icon', 'TS_service_selected_icon'); ?>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="ts-sv-icon">
                                    <?php if (!empty($item['TS_service_image']['url'])): ?>
                                    <img src="<?php echo $item['TS_service_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_service_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="missionBlock__content">
                          <?php if (!empty($item['TS_service_title' ])): ?>
                          <span class="missionBlock__counter"><?php echo TS_kses($item['TS_service_title' ]); ?></span>
                          <?php endif; ?>
                          <?php if (!empty($item['TS_service_description' ])): ?>
                            <p class="missionBlock__title"><?php echo TS_kses($item['TS_service_description']); ?></p>
                            <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <?php if (!empty($settings['TS_video_url' ])): ?>
              <div class="col-lg-6">
                <div class="missionVideo">
                  <div class="mission-video-main">
                    <div class="promo-video">
                      <div class="waves-block">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                      </div>
                    </div>
                    <a href="<?php echo TS_kses($settings['TS_video_url']); ?>" class="video popup-video mfp-iframe"><i
                      class="fa fa-play"></i></a>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </section>

        <?php
    }
}

$widgets_manager->register( new TS_Mission() );