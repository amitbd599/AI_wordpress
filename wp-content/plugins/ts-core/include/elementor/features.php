<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Features extends Widget_Base
{

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
        return __('Features', 'TScore');
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

        $this->end_controls_section();

        // Service group
        $this->start_controls_section(
            'TS_features',
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
            'TS_item_active',
            [
                'label' => esc_html__('Item Active', 'TScore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'TScore'),
                'label_off' => esc_html__('Hide', 'TScore'),
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
                'label' => __('Icon Color', 'TScore'),
            ]
        );

        $repeater->add_control(
            'TS_icon_bg_color',
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
            'TS_icon_color',
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
                'label' => __('Icon Hover Color', 'TScore'),
            ]
        );
        $repeater->add_control(
            'TS_icon_bg_hover_color',
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
            'TS_icon_hover_color',
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
            'TS_features_icon_type',
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
            'TS_features_image',
            [
                'label' => esc_html__('Upload Icon Image', 'TScore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'TS_features_icon_type' => 'image'
                ]

            ]
        );

        if (TS_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'TS_features_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'TS_features_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'TS_features_selected_icon',
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
                        'TS_features_icon_type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'TS_features_title',
            [
                'label' => esc_html__('Title', 'TScore'),
                'description' => TS_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'TScore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'TS_features_description',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => TS_get_allowed_html_desc('intermediate'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'TS_features_list',
            [
                'label' => esc_html__('Services - List', 'TScore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'TS_features_title' => esc_html__('Discover', 'TScore'),
                    ],
                    [
                        'TS_features_title' => esc_html__('Define', 'TScore')
                    ],
                    [
                        'TS_features_title' => esc_html__('Develop', 'TScore')
                    ]
                ],
                'title_field' => '{{{ TS_features_title }}}',
            ]
        );
        $this->add_responsive_control(
            'TS_features_align',
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
                'toggle' => true,
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        // TS_columns_section
        $this->start_controls_section(
            'TS_columns_section',
            [
                'label' => esc_html__('Features - Columns', 'TScore'),
            ]
        );

        $this->add_control(
            'TS_col_for_desktop',
            [
                'label' => esc_html__('Columns for Desktop', 'TScore'),
                'description' => esc_html__('Screen width equal to or greater than 992px', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'TScore'),
                    6 => esc_html__('2 Columns', 'TScore'),
                    4 => esc_html__('3 Columns', 'TScore'),
                    3 => esc_html__('4 Columns', 'TScore'),
                    2 => esc_html__('6 Columns', 'TScore'),
                    1 => esc_html__('12 Columns', 'TScore'),
                ],
                'separator' => 'before',
                'default' => '4',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'TS_col_for_laptop',
            [
                'label' => esc_html__('Columns for Laptop', 'TScore'),
                'description' => esc_html__('Screen width equal to or greater than 768px', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'TScore'),
                    6 => esc_html__('2 Columns', 'TScore'),
                    4 => esc_html__('3 Columns', 'TScore'),
                    3 => esc_html__('4 Columns', 'TScore'),
                    2 => esc_html__('6 Columns', 'TScore'),
                    1 => esc_html__('12 Columns', 'TScore'),
                ],
                'separator' => 'before',
                'default' => '4',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'TS_col_for_tablet',
            [
                'label' => esc_html__('Columns for Tablet', 'TScore'),
                'description' => esc_html__('Screen width equal to or greater than 576px', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'TScore'),
                    6 => esc_html__('2 Columns', 'TScore'),
                    4 => esc_html__('3 Columns', 'TScore'),
                    3 => esc_html__('4 Columns', 'TScore'),
                    2 => esc_html__('6 Columns', 'TScore'),
                    1 => esc_html__('12 Columns', 'TScore'),
                ],
                'separator' => 'before',
                'default' => '6',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'TS_col_for_mobile',
            [
                'label' => esc_html__('Columns for Mobile', 'TScore'),
                'description' => esc_html__('Screen width less than 576px', 'TScore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'TScore'),
                    6 => esc_html__('2 Columns', 'TScore'),
                    4 => esc_html__('3 Columns', 'TScore'),
                    3 => esc_html__('4 Columns', 'TScore'),
                    5 => esc_html__('5 Columns (For Carousel Item)', 'TScore'),
                    2 => esc_html__('6 Columns', 'TScore'),
                    1 => esc_html__('12 Columns', 'TScore'),
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
        $this->TS_section_style_controls('about_section', 'Section', '.ts-el-sec');
        $this->TS_basic_style_controls('heading_title', 'Title', '.ts-el-title');
        $this->TS_basic_style_controls('heading_desc', 'Description', '.ts-el-content');
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <?php if ($settings['TS_design_style'] == 'layout-2'): ?>

            <div class="research__features-wrapper pt-35">
                <?php foreach ($settings['TS_features_list'] as $item): ?>
                    <div
                        class="research__features-item ts-el-sec d-sm-flex align-items-start mb-40 elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                        <div class="research__features-icon mr-25">
                            <?php if ($item['TS_features_icon_type'] !== 'image'): ?>
                                <?php if (!empty($item['TS_features_icon']) || !empty($item['TS_features_selected_icon']['value'])): ?>
                                    <span><?php TS_render_icon($item, 'TS_features_icon', 'TS_features_selected_icon'); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>
                                    <?php if (!empty($item['TS_features_image']['url'])): ?>
                                        <img class="light" src="<?php echo $item['TS_features_image']['url']; ?>"
                                            alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="research__features-content">
                            <?php if (!empty($item['TS_features_title'])): ?>
                                <h4 class="ts-el-title">
                                    <?php echo TS_kses($item['TS_features_title']); ?>
                                </h4>
                            <?php endif; ?>

                            <?php if (!empty($item['TS_features_description'])): ?>
                                <p class="ts-el-content"><?php echo TS_kses($item['TS_features_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>

            <section class="research__area">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['TS_features_list'] as $key => $item):
                            $border_none = ($key == 2) ? '' : 'research__item-border';
                            $active = ($key == 1) ? 'active' : (($item['TS_item_active'] === 'yes') ? 'active' : '');

                            ?>
                            <div
                                class="col-xl-<?php echo esc_attr($settings['TS_col_for_desktop']); ?> col-lg-<?php echo esc_attr($settings['TS_col_for_laptop']); ?> col-md-<?php echo esc_attr($settings['TS_col_for_tablet']); ?> col-<?php echo esc_attr($settings['TS_col_for_mobile']); ?>">
                                <div
                                    class="research__item ts-el-sec <?php echo esc_attr($border_none); ?> <?php echo esc_attr($active); ?> text-center mb-30 transition-3">
                                    <div class="research__thumb mb-35">
                                        <?php if ($item['TS_features_icon_type'] !== 'image'): ?>
                                            <?php if (!empty($item['TS_features_icon']) || !empty($item['TS_features_selected_icon']['value'])): ?>
                                                <span
                                                    class="fea__icon"><?php TS_render_icon($item, 'TS_features_icon', 'TS_features_selected_icon'); ?></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="fea__icon">
                                                <?php if (!empty($item['TS_features_image']['url'])): ?>
                                                    <img class="light" src="<?php echo $item['TS_features_image']['url']; ?>"
                                                        alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="research__content">
                                        <?php if (!empty($item['TS_features_title'])): ?>
                                            <h3 class="research__title ts-el-title">
                                                <?php echo TS_kses($item['TS_features_title']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($item['TS_features_description'])): ?>
                                            <p class="keyFeatureBlock__text ts-el-content "><?php echo TS_kses($item['TS_features_description']); ?></p>
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

$widgets_manager->register(new TS_Features());