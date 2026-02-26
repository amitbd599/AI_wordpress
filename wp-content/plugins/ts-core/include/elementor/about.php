<?php

namespace tsCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;


if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ts_About extends Widget_Base
{

    use ts_Style_Trait;

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'about';
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
    public function get_title()
    {
        return __('About', 'TScore');
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
    public function get_icon()
    {
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
    public function get_categories()
    {
        return ['TScore'];
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
    public function get_script_depends()
    {
        return ['TScore'];
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
    protected function register_controls_section()
    {

        // layout Panel
        $this->start_controls_section(
            'ts_layout',
            [
                'label' => esc_html__('Design Layout', 'TScore'),
            ]
        );
        $this->add_control(
            'ts_design_style',
            [
                'label' => esc_html__('Select Layout', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'TScore'),
                    'layout-2' => esc_html__('Layout 2', 'TScore'),
                    'layout-3' => esc_html__('Layout 3', 'TScore'),
                    'layout-4' => esc_html__('Layout 4', 'TScore'),
                    'layout-5' => esc_html__('Layout 5', 'TScore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // ts_section_title
        $this->start_controls_section(
            'ts_section_title',
            [
                'label' => esc_html__('Title & Content', 'TScore'),
            ]
        );



        $this->add_control(
            'ts_sub_title',
            [
                'label' => esc_html__('Sub Title', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ts Sub Title', 'TScore'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'TScore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ts_title',
            [
                'label' => esc_html__('Title', 'TScore'),
                'description' => ts_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ts Title Here', 'TScore'),
                'placeholder' => esc_html__('Type Heading Text', 'TScore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ts_desctiption',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => ts_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('ts section description here', 'TScore'),
                'placeholder' => esc_html__('Type section description here', 'TScore'),
            ]
        );

        $this->add_control(
            'ts_title_tag',
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
            'ts_align',
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

        // Features group
        $this->start_controls_section(
            'ts_features',
            [
                'label' => esc_html__('Features List', 'TScore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'TScore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_condition',
            [
                'label' => __('Field condition', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'TScore'),
                    'style_2' => __('Style 2', 'TScore'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $repeater->add_control(
            'ts_features_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'TScore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'TScore'),
                    'icon' => esc_html__('Icon', 'TScore'),
                ],
            ]
        );

        $repeater->add_control(
            'ts_features_image',
            [
                'label' => esc_html__('Upload Icon Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'ts_features_icon_type' => 'image'
                ]

            ]
        );

        if (ts_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'ts_features_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa-solid fa-check',
                    'condition' => [
                        'ts_features_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'ts_features_selected_icon',
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
                        'ts_features_icon_type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'ts_features_title',
            [
                'label' => esc_html__('Title', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'TScore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'ts_features_description',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Description', 'TScore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ts_features_list',
            [
                'label' => esc_html__('Services - List', 'TScore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'ts_features_title' => esc_html__('Discover', 'TScore'),
                        'ts_features_description' => esc_html__('Features Description', 'TScore'),
                    ],
                    [
                        'ts_features_title' => esc_html__('Define', 'TScore'),
                        'ts_features_description' => esc_html__('Features Description', 'TScore'),
                    ],
                    [
                        'ts_features_title' => esc_html__('Develop', 'TScore'),
                        'ts_features_description' => esc_html__('Features Description', 'TScore'),
                    ]
                ],
                'title_field' => '{{{ ts_features_title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            '_ts_icon',
            [
                'label' => esc_html__('Icon', 'TScore'),
                'condition' => [
                    'ts_design_style' => 'layout-5'
                ],
            ]
        );
        $this->add_control(
            'ts_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'TScore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'TScore'),
                    'icon' => esc_html__('Icon', 'TScore'),
                ],
            ]
        );

        $this->add_control(
            'ts_icon_image',
            [
                'label' => esc_html__('Upload Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'ts_icon_type' => 'image'
                ]

            ]
        );
        if (ts_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'ts_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'ts_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $this->add_control(
                'ts_selected_icon',
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
                        'ts_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $this->end_controls_section();

        // ts_btn_button_group
        $this->start_controls_section(
            'ts_btn_button_group',
            [
                'label' => esc_html__('Button', 'TScore'),
            ]
        );

        $this->add_control(
            'ts_btn_button_show',
            [
                'label' => esc_html__('Show Button', 'TScore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'TScore'),
                'label_off' => esc_html__('Hide', 'TScore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'ts_btn_text',
            [
                'label' => esc_html__('Button Text', 'TScore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'TScore'),
                'title' => esc_html__('Enter button text', 'TScore'),
                'label_block' => true,
                'condition' => [
                    'ts_btn_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'ts_btn_link_type',
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
                    'ts_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'ts_btn_link',
            [
                'label' => esc_html__('Button link', 'TScore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'TScore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'ts_btn_link_type' => '1',
                    'ts_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ts_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'TScore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => ts_get_all_pages(),
                'condition' => [
                    'ts_btn_link_type' => '2',
                    'ts_btn_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

        // _ts_image Thumbnail
        $this->start_controls_section(
            '_ts_image',
            [
                'label' => esc_html__('Thumbnail', 'TScore'),
            ]
        );
        $this->add_control(
            'ts_image',
            [
                'label' => esc_html__('Choose Image', 'TScore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'ts_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'ts_thum_icon_image',
            [
                'label' => esc_html__('Upload Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );

        $this->add_control(
            'ts_about_thum_title',
            [
                'label' => esc_html__('Title', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Impressive Works Since 2010', 'TScore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ts_about_video_title',
            [
                'label' => esc_html__('Video Title', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Watch Intro', 'TScore'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'ts_about_video_title_link',
            [
                'label' => esc_html__('Video Link', 'TScore'),
                'description' => ts_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('https://www.youtube.com/watch?v=Ke90Tje7VS0', 'TScore'),
                'label_block' => true,
            ]
        );





        $this->end_controls_section();
    }

    // style_tab_content
    protected function style_tab_content()
    {
        $this->ts_section_style_controls('about_section', 'Section', '.ts-el-sec');
        $this->ts_basic_style_controls('heading_title', 'Title', '.ts-el-title');
        $this->ts_basic_style_controls('heading_subtitle', 'Subtitle', '.ts-el-subtitle');
        $this->ts_basic_style_controls('heading_desc', 'Description', '.ts-el-content');
        $this->ts_link_controls_style('', 'b_btn1_style', 'Button', '.ts-el-btn');
    }

    /**
     * Render the widget outsut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['ts_design_style']  == 'layout-2'):
            if (!empty($settings['ts_image']['url'])) {
                $ts_image = !empty($settings['ts_image']['id']) ? wp_get_attachment_image_url($settings['ts_image']['id'], $settings['ts_image_size_size']) : $settings['ts_image']['url'];
                $ts_image_alt = get_post_meta($settings["ts_image"]["id"], "_wp_attachment_image_alt", true);
            }
            $this->add_render_attribute('title_args', 'class', 'sectionTitle__big ts-el-title');

            // Link
            if ('2' == $settings['ts_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['ts_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', ' btn btn--styleOne btn--secondary it-btn');
            } else {
                if (! empty($settings['ts_btn_link']['url'])) {
                    $this->add_link_attributes('ts-button-arg', $settings['ts_btn_link']);
                    $this->add_render_attribute('ts-button-arg', 'class', ' btn btn--styleOne btn--secondary it-btn ts-el-btn');
                }
            }

        ?>

            <section class="about ts-el-sec">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 mb-30">
                            <div class="aboutContent aboutContent--style2">
                                <!-- Section Heading/Title -->
                                <div class="sectionTitle mb-20">
                                    <?php if (!empty($settings['ts_sub_title'])) : ?>
                                        <span class="sectionTitle__small ts-el-subtitle">
                                            <i class="fa-solid fa-heart btn__icon"></i>
                                            <?php echo ts_kses($settings['ts_sub_title']); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php
                                    if (!empty($settings['ts_title'])) :
                                        printf(
                                            '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape($settings['ts_title_tag']),
                                            $this->get_render_attribute_string('title_args'),
                                            ts_kses($settings['ts_title'])
                                        );
                                    endif;
                                    ?>
                                </div>
                                <!-- Section Heading/Title End -->
                                <?php if (!empty($settings['ts_desctiption'])) : ?>
                                    <p class="aboutContent__text ts-el-content">
                                        <?php echo ts_kses($settings['ts_desctiption']); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($settings['ts_short_desctiption'])) : ?>
                                    <span class="aboutContent__quote"><?php echo ts_kses($settings['ts_short_desctiption']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($settings['ts_btn_text'])) : ?>
                                    <div class="ts-hero-btn">
                                        <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                            <span class="btn__text"><?php echo $settings['ts_btn_text']; ?></span>
                                            <i class="fa-solid fa-heart btn__icon"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                            <div class="col-lg-5">
                                <div class="aboutThumb">
                                    <div class="aboutThumb__text">
                                        <?php if (!empty($settings['exp_title'])) : ?>
                                            <span class="aboutThumb__text__title"><?php echo ts_kses($settings['exp_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['exp_num'])) : ?>
                                            <span class="aboutThumb__text__year"><?php echo ts_kses($settings['exp_num']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <figure class="aboutThumb__figure m-0">
                                        <img src="<?php echo esc_url($ts_image); ?>" alt="<?php echo esc_attr($ts_image_alt); ?>">
                                    </figure>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['ts_design_style']  == 'layout-3'):
            if (!empty($settings['ts_image']['url'])) {
                $ts_image = !empty($settings['ts_image']['id']) ? wp_get_attachment_image_url($settings['ts_image']['id'], $settings['ts_image_size_size']) : $settings['ts_image']['url'];
                $ts_image_alt = get_post_meta($settings["ts_image"]["id"], "_wp_attachment_image_alt", true);
            }
            $this->add_render_attribute('title_args', 'class', 'sectionTitle__big ts-el-title');
            // Link
            if ('2' == $settings['ts_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['ts_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--primary it-btn');
            } else {
                if (! empty($settings['ts_btn_link']['url'])) {
                    $this->add_link_attributes('ts-button-arg', $settings['ts_btn_link']);
                    $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--primary it-btn ts-el-btn');
                }
            }
        ?>

            <section class="fact fact--layout1 position-relative ts-el-sec">
                <div class="container">
                    <div class="volunteer">
                        <div class="container">
                            <div class="row align-items-center">
                                <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                                    <div class="col-lg-6 mb-30">
                                        <div class="volunteerUser">
                                            <div class="volunteerUser__box">
                                                <div class="volunteerUser__thumb">
                                                    <img class="hero__figure__thumbs" src="<?php echo esc_url($ts_image); ?>"
                                                        alt="<?php echo esc_attr($ts_image_alt); ?>">
                                                </div>
                                                <div class="volunteerUser__profile">
                                                    <ul>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user1.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user2.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user3.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user4.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user5.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/image/users/volunteer-user6.jpg"
                                                                    alt="Gainioz"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-6 mb-30">
                                    <div class="aboutContent aboutContent--style3">
                                        <?php if (!empty($settings['ts_section_title_show'])) : ?>
                                            <!-- Section Heading/Title -->
                                            <div class="sectionTitle mb-20">
                                                <?php if (!empty($settings['ts_sub_title'])) : ?>
                                                    <span class="sectionTitle__small ts-el-subtitle">
                                                        <i class="fa-solid fa-heart btn__icon"></i>
                                                        <?php echo ts_kses($settings['ts_sub_title']); ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php
                                                if (!empty($settings['ts_title'])) :
                                                    printf(
                                                        '<%1$s %2$s>%3$s</%1$s>',
                                                        tag_escape($settings['ts_title_tag']),
                                                        $this->get_render_attribute_string('title_args'),
                                                        ts_kses($settings['ts_title'])
                                                    );
                                                endif;
                                                ?>
                                            </div>
                                            <!-- Section Heading/Title End -->
                                            <?php if (!empty($settings['ts_short_desctiption'])) : ?>
                                                <span
                                                    class="aboutContent__quote text-uppercase"><?php echo ts_kses($settings['ts_short_desctiption']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['ts_desctiption'])) : ?>
                                                <p class="aboutContent__text ts-el-content">
                                                    <?php echo ts_kses($settings['ts_desctiption']); ?>
                                                </p>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['ts_btn_text'])) : ?>
                                            <div class="aboutContent__buttons">
                                                <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                                    <span class="btn__text"><?php echo $settings['ts_btn_text']; ?></span>
                                                    <i class="fa-solid fa-heart btn__icon"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['ts_design_style']  == 'layout-4'):
            if (!empty($settings['ts_image']['url'])) {
                $ts_image = !empty($settings['ts_image']['id']) ? wp_get_attachment_image_url($settings['ts_image']['id'], $settings['ts_image_size_size']) : $settings['ts_image']['url'];
                $ts_image_alt = get_post_meta($settings["ts_image"]["id"], "_wp_attachment_image_alt", true);
            }
            $this->add_render_attribute('title_args', 'class', 'sectionTitle__big ts-el-title');
            // Link
            if ('2' == $settings['ts_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['ts_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--secondary it-btn');
            } else {
                if (! empty($settings['ts_btn_link']['url'])) {
                    $this->add_link_attributes('ts-button-arg', $settings['ts_btn_link']);
                    $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--secondary it-btn ts-el-btn');
                }
            }
        ?>

            <section class="joinSection position-relative overflow-hidden ts-el-sec">
                <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                    <div class="joinSectionThumb d-none d-lg-block">
                        <img src="<?php echo esc_url($ts_image); ?>" alt="<?php echo esc_attr($ts_image_alt); ?>">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6">
                            <div class="joinContent">
                                <?php if (!empty($settings['ts_section_title_show'])) : ?>
                                    <div class="row justify-content-end">
                                        <div class="col-10">
                                            <!-- Section Heading/Title -->
                                            <div class="sectionTitle mb-20">
                                                <?php if (!empty($settings['ts_sub_title'])) : ?>
                                                    <span class="sectionTitle__small justify-content-end ts-el-subtitle">
                                                        <i
                                                            class="fa-solid fa-heart btn__icon"></i><?php echo ts_kses($settings['ts_sub_title']); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php
                                                if (!empty($settings['ts_title'])) :
                                                    printf(
                                                        '<%1$s %2$s>%3$s</%1$s>',
                                                        tag_escape($settings['ts_title_tag']),
                                                        $this->get_render_attribute_string('title_args'),
                                                        ts_kses($settings['ts_title'])
                                                    );
                                                endif;
                                                ?>
                                            </div>
                                            <!-- Section Heading/Title End -->
                                        </div>
                                    </div>

                                    <?php if (!empty($settings['ts_desctiption'])) : ?>
                                        <p class="joinContent__text ts-el-content"><?php echo ts_kses($settings['ts_desctiption']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (!empty($settings['ts_btn_text'])) : ?>
                                    <div class="aboutContent__buttonss">
                                        <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                            <span class="btn__text"><?php echo $settings['ts_btn_text']; ?></span>
                                            <i class="fa-solid fa-heart btn__icon"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['ts_design_style']  == 'layout-5'):
            if (!empty($settings['ts_image']['url'])) {
                $ts_image = !empty($settings['ts_image']['id']) ? wp_get_attachment_image_url($settings['ts_image']['id'], $settings['ts_image_size_size']) : $settings['ts_image']['url'];
                $ts_image_alt = get_post_meta($settings["ts_image"]["id"], "_wp_attachment_image_alt", true);
            }
            $this->add_render_attribute('title_args', 'class', 'sectionTitle__big ts-el-title');
            // Link
            if ('2' == $settings['ts_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['ts_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--primary it-btn');
            } else {
                if (! empty($settings['ts_btn_link']['url'])) {
                    $this->add_link_attributes('ts-button-arg', $settings['ts_btn_link']);
                    $this->add_render_attribute('ts-button-arg', 'class', 'btn btn--styleOne btn--primary it-btn ts-el-btn');
                }
            }
        ?>

            <section class="about gray-bg about--style3 ts-el-sec">
                <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                    <div class="aboutThumb3 d-none d-lg-block">
                        <img src="<?php echo esc_url($ts_image); ?>" alt="<?php echo esc_attr($ts_image_alt); ?>">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row align-items-end justify-content-between">
                        <div class="col-lg-6 mb-30">
                            <div class="aboutContent aboutContent--style2">
                                <!-- Section Heading/Title -->
                                <?php if (!empty($settings['ts_section_title_show'])) : ?>
                                    <div class="sectionTitle mb-20">
                                        <?php if (!empty($settings['ts_sub_title'])) : ?>
                                            <span class="sectionTitle__small ts-el-subtitle">
                                                <i class="fa-solid fa-heart btn__icon"></i><?php echo ts_kses($settings['ts_sub_title']); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php
                                        if (!empty($settings['ts_title'])) :
                                            printf(
                                                '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['ts_title_tag']),
                                                $this->get_render_attribute_string('title_args'),
                                                ts_kses($settings['ts_title'])
                                            );
                                        endif;
                                        ?>
                                    </div>
                                    <!-- Section Heading/Title End -->
                                    <?php if (!empty($settings['ts_desctiption'])) : ?>
                                        <p class="aboutContent__text ts-el-content"><?php echo ts_kses($settings['ts_desctiption']); ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (!empty($settings['ts_short_desctiption'])) : ?>
                                    <span class="aboutContent__quote"><?php echo ts_kses($settings['ts_short_desctiption']); ?></span>
                                <?php endif; ?>


                                <?php if (!empty($settings['ts_btn_text'])) : ?>
                                    <div class="aboutContent__buttons">
                                        <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                            <span class="btn__text"><?php echo $settings['ts_btn_text']; ?></span>
                                            <i class="fa-solid fa-heart btn__icon"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="aboutThumb aboutThumb--style3">
                                <div class="aboutThumb__text d-none d-lg-block">
                                    <?php if (!empty($settings['exp_title'])) : ?>
                                        <span class="aboutThumb__text__title"><?php echo ts_kses($settings['exp_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['exp_num'])) : ?>
                                        <span class="aboutThumb__text__year"><?php echo ts_kses($settings['exp_num']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php else:
            if (!empty($settings['ts_image']['url'])) {
                $ts_image = !empty($settings['ts_image']['id']) ? wp_get_attachment_image_url($settings['ts_image']['id'], $settings['ts_image_size_size']) : $settings['ts_image']['url'];
                $ts_image_alt = get_post_meta($settings["ts_image"]["id"], "_wp_attachment_image_alt", true);
            }



            $this->add_render_attribute('title', 'class', 'section__title ts-el-title');

            // Link
            if ('2' == $settings['ts_btn_link_type']) {
                $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['ts_btn_page_link']));
                $this->add_render_attribute('ts-button-arg', 'target', '_self');
                $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('ts-button-arg', 'class', ' default-btn');
            } else {
                if (! empty($settings['ts_btn_link']['url'])) {
                    $this->add_link_attributes('ts-button-arg', $settings['ts_btn_link']);
                    $this->add_render_attribute('ts-button-arg', 'class', ' default-btn');
                }
            }
        ?>

            <div class="about-section one">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="left-wrapper">

                                <div class="img-file">
                                    <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                                        <img class="img-fluid wow animated fadeInLeft" src="<?php echo esc_url($ts_image); ?>"
                                            alt="<?php echo esc_attr($ts_image_alt); ?>">
                                    <?php endif; ?>



                                    <div class="shape-overlay">
                                        <div class="overlay wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">

                                            <?php if (!empty($settings['ts_thum_icon_image']['url'])) : ?>
                                                <span>
                                                    <img src="<?php echo esc_url($settings['ts_thum_icon_image']['url']); ?>"
                                                        alt="<?php echo get_post_meta($settings["ts_thum_icon_image"]["id"], "_wp_attachment_image_alt", true); ?>" />
                                                </span>
                                            <?php endif; ?>


                                            <?php if (!empty($item['ts_features_image']['url'])): ?>
                                                <img class="light" src="<?php echo $item['ts_features_image']['url']; ?>"
                                                    alt="<?php echo get_post_meta(attachment_url_to_postid($item['ts_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                            <?php endif; ?>

                                            <?php if (!empty($settings['ts_about_thum_title'])) : ?>
                                                <h3>
                                                    <?php echo esc_html($settings['ts_about_thum_title']); ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['ts_about_video_title'])) : ?>

                                                <div class="video-intro">
                                                    <a href="<?php echo $settings['ts_about_video_title_link']; ?>" class="popup-video">
                                                        <span class="icon">
                                                            <i class="fa-solid fa-play"></i>
                                                        </span>
                                                        <span class="text"><?php echo ts_kses($settings['ts_about_video_title']) ?></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-wrapper wow animated fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                <div class="section-title-shape-one">
                                    <?php if (!empty($settings['ts_sub_title'])) : ?>
                                        <h3><?php echo ts_kses($settings['ts_sub_title']); ?></h3>
                                    <?php endif; ?>
                                    <h2>
                                        <?php
                                        if (!empty($settings['ts_title'])) :
                                            printf(
                                                '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['ts_title_tag']),
                                                $this->get_render_attribute_string('title'),
                                                ts_kses($settings['ts_title'])
                                            );
                                        endif;
                                        ?>
                                    </h2>
                                    <?php if (!empty($settings['ts_desctiption'])) : ?>
                                        <p>
                                            <?php echo ts_kses($settings['ts_desctiption']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="inner-list">
                                    <ul>
                                        <?php foreach ($settings['ts_features_list'] as $item) : ?>
                                            <li>
                                                <?php if ($item['ts_features_icon_type'] !== 'image') : ?>
                                                    <?php if (!empty($item['ts_features_icon']) || !empty($item['ts_features_selected_icon']['value'])) : ?>
                                                        <span><?php ts_render_icon($item, 'ts_features_icon', 'ts_features_selected_icon'); ?></span>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <span class="img-file">
                                                        <?php if (!empty($item['ts_features_image']['url'])): ?>
                                                            <img class="light w-100px" src="<?php echo $item['ts_features_image']['url']; ?>"
                                                                alt="<?php echo get_post_meta(attachment_url_to_postid($item['ts_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                                <div>
                                                    <h4><?php echo ts_kses($item['ts_features_title']); ?></h4>
                                                    <p>
                                                        <?php echo ts_kses($item['ts_features_description']); ?>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>

                                </div>
                                <?php if (!empty($settings['ts_btn_text'])) : ?>
                                    <div class="inner-btn">
                                        <div>
                                            <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                                <?php echo $settings['ts_btn_text']; ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-img">
                    <div class="shape-1 poa">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/icon/10_icon.png" alt="" />
                    </div>
                    <div class="shape-2 poa">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/icon/09_icon.png" alt="" />
                    </div>
                    <div class="shape-3 poa">
                        <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/shape/01_shape.svg" alt="" />
                    </div>
                    <div class="shape-4 poa">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/icon/63_icon.png" alt="" />
                    </div>
                    <div class="shape-5 poa">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/icon/66_icon.png" alt="" />
                    </div>
                    <div class="shape-6 poa">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/icon/68_icon.png" alt="" />
                    </div>
                </div>
            </div>

            <section class="about__area p-relative ts-el-sec d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-7 col-lg-7">
                            <div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
                                <div class="about__shape">
                                    <img class="about__shape-1 d-none d-sm-block"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-shape-1.png"
                                        alt="img">
                                    <img class="about__shape-2 d-none d-sm-block"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-shape-2.png"
                                        alt="img">
                                    <img class="about__shape-3"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-shape-3.png"
                                        alt="img">
                                </div>
                                <div class="about__thumb-left mr-10">
                                    <?php if ($settings['ts_image']['url'] || $settings['ts_image']['id']) : ?>
                                        <div class="about__thumb-1 mb-10">
                                            <img src="<?php echo esc_url($ts_image); ?>" alt="<?php echo esc_attr($ts_image_alt); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($settings['ts_image_2']['url'] || $settings['ts_image_2']['id']) : ?>
                                        <div class="about__thumb-1 mb-10 text-end">
                                            <img src="<?php echo esc_url($ts_image_2); ?>"
                                                alt="<?php echo esc_attr($ts_image_2_alt); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($settings['ts_image_3']['url'] || $settings['ts_image_3']['id']) : ?>
                                    <div class="about__thumb-2 mb-10">
                                        <img src="<?php echo esc_url($ts_image_3); ?>" alt="<?php echo esc_attr($ts_image_3_alt); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5">
                            <div class="about__content pl-70 pr-25">
                                <?php if (!empty($settings['ts_section_title_show'])) : ?>

                                    <div class="section__title-wrapper mb-15">
                                        <?php if (!empty($settings['ts_sub_title'])) : ?>
                                            <span class="section__title-pre ts-el-subtitle ">
                                                <?php echo ts_kses($settings['ts_sub_title']); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php
                                        if (!empty($settings['ts_title'])) :
                                            printf(
                                                '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['ts_title_tag']),
                                                $this->get_render_attribute_string('title_args'),
                                                ts_kses($settings['ts_title'])
                                            );
                                        endif;
                                        ?>
                                    </div>

                                    <?php if (!empty($settings['ts_desctiption'])) : ?>
                                        <p class="ts-el-content"><?php echo ts_kses($settings['ts_desctiption']); ?></p>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <div class="about__list mb-40">
                                    <ul>
                                        <?php foreach ($settings['ts_features_list'] as $item) : ?>
                                            <li>
                                                <?php if ($item['ts_features_icon_type'] !== 'image') : ?>
                                                    <?php if (!empty($item['ts_features_icon']) || !empty($item['ts_features_selected_icon']['value'])) : ?>
                                                        <span><?php ts_render_icon($item, 'ts_features_icon', 'ts_features_selected_icon'); ?></span>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <span class="keyFeatureBlock__icon">
                                                        <?php if (!empty($item['ts_features_image']['url'])): ?>
                                                            <img class="light" src="<?php echo $item['ts_features_image']['url']; ?>"
                                                                alt="<?php echo get_post_meta(attachment_url_to_postid($item['ts_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php echo ts_kses($item['ts_features_title']); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <?php if (!empty($settings['ts_btn_text'])) : ?>
                                    <div class="about__btn">
                                        <a <?php echo $this->get_render_attribute_string('ts-button-arg'); ?>>
                                            <?php echo $settings['ts_btn_text']; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new ts_About());
