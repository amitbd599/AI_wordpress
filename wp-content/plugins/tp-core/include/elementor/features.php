<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Features extends Widget_Base
{

    use TP_Style_Trait;
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
        return 'features';
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
        return __('Features', 'tpcore');
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
        return 'tp-icon';
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
        return ['tpcore'];
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
        return ['tpcore'];
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
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'tp_design_style',
            [
                'label' => esc_html__('Select Layout', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tpcore'),
                    'layout-2' => esc_html__('Layout 2', 'tpcore'),
                    'layout-3' => esc_html__('Layout 3', 'tpcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Service group
        $this->start_controls_section(
            'tp_features',
            [
                'label' => esc_html__('Features List', 'tpcore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'tpcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_condition',
            [
                'label' => __('Field condition', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'tpcore'),
                    'style_2' => __('Style 2', 'tpcore'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'tp_item_active',
            [
                'label' => esc_html__('Item Active', 'tpcore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'tpcore'),
                'label_off' => esc_html__('Hide', 'tpcore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'repeater_condition' => 'style_1',
                ],
            ]
        );

        $repeater->start_controls_tabs(
            '_tab_style_member_box_itemr'
        );

        $repeater->start_controls_tab(
            '_tab_cat_normal',
            [
                'label' => __('Icon Color', 'tpcore'),
            ]
        );

        $repeater->add_control(
            'tp_icon_bg_color',
            [
                'label' => __('Icon BG Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#F3F1FF',
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .research__features-icon span' => 'background-color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'tp_icon_color',
            [
                'label' => __('Icon Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#4270FF',
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .research__features-icon span i' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_cat_hover',
            [
                'label' => __('Icon Hover Color', 'tpcore'),
            ]
        );
        $repeater->add_control(
            'tp_icon_bg_hover_color',
            [
                'label' => __('Icon BG Hover Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6151FB',
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.research__features-item:hover span' => 'background-color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'tp_icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.research__features-item:hover span i' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();


        $repeater->add_control(
            'tp_features_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'tpcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'tpcore'),
                    'icon' => esc_html__('Icon', 'tpcore'),
                ],
            ]
        );

        $repeater->add_control(
            'tp_features_image',
            [
                'label' => esc_html__('Upload Icon Image', 'tpcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tp_features_icon_type' => 'image'
                ]

            ]
        );

        if (tp_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tp_features_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'tp_features_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'tp_features_selected_icon',
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
                        'tp_features_icon_type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tp_features_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'tpcore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tp_features_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc('intermediate'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tp_features_list',
            [
                'label' => esc_html__('Services - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tp_features_title' => esc_html__('Discover', 'tpcore'),
                    ],
                    [
                        'tp_features_title' => esc_html__('Define', 'tpcore')
                    ],
                    [
                        'tp_features_title' => esc_html__('Develop', 'tpcore')
                    ]
                ],
                'title_field' => '{{{ tp_features_title }}}',
            ]
        );
        $this->add_responsive_control(
            'tp_features_align',
            [
                'label' => esc_html__('Alignment', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'tpcore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'tpcore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'tpcore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        // tp_columns_section
        $this->start_controls_section(
            'tp_columns_section',
            [
                'label' => esc_html__('Features - Columns', 'tpcore'),
            ]
        );

        $this->add_control(
            'tp_col_for_desktop',
            [
                'label' => esc_html__('Columns for Desktop', 'tpcore'),
                'description' => esc_html__('Screen width equal to or greater than 992px', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'tpcore'),
                    6 => esc_html__('2 Columns', 'tpcore'),
                    4 => esc_html__('3 Columns', 'tpcore'),
                    3 => esc_html__('4 Columns', 'tpcore'),
                    2 => esc_html__('6 Columns', 'tpcore'),
                    1 => esc_html__('12 Columns', 'tpcore'),
                ],
                'separator' => 'before',
                'default' => '4',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'tp_col_for_laptop',
            [
                'label' => esc_html__('Columns for Laptop', 'tpcore'),
                'description' => esc_html__('Screen width equal to or greater than 768px', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'tpcore'),
                    6 => esc_html__('2 Columns', 'tpcore'),
                    4 => esc_html__('3 Columns', 'tpcore'),
                    3 => esc_html__('4 Columns', 'tpcore'),
                    2 => esc_html__('6 Columns', 'tpcore'),
                    1 => esc_html__('12 Columns', 'tpcore'),
                ],
                'separator' => 'before',
                'default' => '4',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'tp_col_for_tablet',
            [
                'label' => esc_html__('Columns for Tablet', 'tpcore'),
                'description' => esc_html__('Screen width equal to or greater than 576px', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'tpcore'),
                    6 => esc_html__('2 Columns', 'tpcore'),
                    4 => esc_html__('3 Columns', 'tpcore'),
                    3 => esc_html__('4 Columns', 'tpcore'),
                    2 => esc_html__('6 Columns', 'tpcore'),
                    1 => esc_html__('12 Columns', 'tpcore'),
                ],
                'separator' => 'before',
                'default' => '6',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'tp_col_for_mobile',
            [
                'label' => esc_html__('Columns for Mobile', 'tpcore'),
                'description' => esc_html__('Screen width less than 576px', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'tpcore'),
                    6 => esc_html__('2 Columns', 'tpcore'),
                    4 => esc_html__('3 Columns', 'tpcore'),
                    3 => esc_html__('4 Columns', 'tpcore'),
                    5 => esc_html__('5 Columns (For Carousel Item)', 'tpcore'),
                    2 => esc_html__('6 Columns', 'tpcore'),
                    1 => esc_html__('12 Columns', 'tpcore'),
                ],
                'separator' => 'before',
                'default' => '12',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }


    protected function style_tab_content()
    {
        $this->tp_section_style_controls('about_section', 'Section', '.tp-el-sec');
        $this->tp_basic_style_controls('heading_title', 'Title', '.tp-el-title');
        $this->tp_basic_style_controls('heading_desc', 'Description', '.tp-el-content');
    }

    /**
     * Render the widget output on the frontend.
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

        <?php if ($settings['tp_design_style'] == 'layout-2'): ?>

            <div class="research__features-wrapper pt-35">
                <?php foreach ($settings['tp_features_list'] as $item): ?>
                    <div
                        class="research__features-item tp-el-sec d-sm-flex align-items-start mb-40 elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                        <div class="research__features-icon mr-25">
                            <?php if ($item['tp_features_icon_type'] !== 'image'): ?>
                                <?php if (!empty($item['tp_features_icon']) || !empty($item['tp_features_selected_icon']['value'])): ?>
                                    <span><?php tp_render_icon($item, 'tp_features_icon', 'tp_features_selected_icon'); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>
                                    <?php if (!empty($item['tp_features_image']['url'])): ?>
                                        <img class="light" src="<?php echo $item['tp_features_image']['url']; ?>"
                                            alt="<?php echo get_post_meta(attachment_url_to_postid($item['tp_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="research__features-content">
                            <?php if (!empty($item['tp_features_title'])): ?>
                                <h4 class="tp-el-title">
                                    <?php echo tp_kses($item['tp_features_title']); ?>
                                </h4>
                            <?php endif; ?>

                            <?php if (!empty($item['tp_features_description'])): ?>
                                <p class="tp-el-content"><?php echo tp_kses($item['tp_features_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>

            <section class="research__area">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['tp_features_list'] as $key => $item):
                            $border_none = ($key == 2) ? '' : 'research__item-border';
                            $active = ($key == 1) ? 'active' : (($item['tp_item_active'] === 'yes') ? 'active' : '');

                            ?>
                            <div
                                class="col-xl-<?php echo esc_attr($settings['tp_col_for_desktop']); ?> col-lg-<?php echo esc_attr($settings['tp_col_for_laptop']); ?> col-md-<?php echo esc_attr($settings['tp_col_for_tablet']); ?> col-<?php echo esc_attr($settings['tp_col_for_mobile']); ?>">
                                <div
                                    class="research__item tp-el-sec <?php echo esc_attr($border_none); ?> <?php echo esc_attr($active); ?> text-center mb-30 transition-3">
                                    <div class="research__thumb mb-35">
                                        <?php if ($item['tp_features_icon_type'] !== 'image'): ?>
                                            <?php if (!empty($item['tp_features_icon']) || !empty($item['tp_features_selected_icon']['value'])): ?>
                                                <span
                                                    class="fea__icon"><?php tp_render_icon($item, 'tp_features_icon', 'tp_features_selected_icon'); ?></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="fea__icon">
                                                <?php if (!empty($item['tp_features_image']['url'])): ?>
                                                    <img class="light" src="<?php echo $item['tp_features_image']['url']; ?>"
                                                        alt="<?php echo get_post_meta(attachment_url_to_postid($item['tp_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="research__content">
                                        <?php if (!empty($item['tp_features_title'])): ?>
                                            <h3 class="research__title tp-el-title">
                                                <?php echo tp_kses($item['tp_features_title']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($item['tp_features_description'])): ?>
                                            <p class="keyFeatureBlock__text tp-el-content "><?php echo tp_kses($item['tp_features_description']); ?></p>
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

$widgets_manager->register(new TP_Features());