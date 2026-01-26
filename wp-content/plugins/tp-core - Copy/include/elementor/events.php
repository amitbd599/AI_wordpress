<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;

use \Etn\Utils\Helper as Helper;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Event_New_Post extends Widget_Base {
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
    public function get_name() {
        return 'event-test';
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
        return __( 'Event Post', 'tpcore' );
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
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
    public function get_categories() {
        return [ 'tpcore' ];
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
        return [ 'tpcore' ];
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

    public function get_event_category() {
        return Helper::get_event_category();
    }

    public function get_event_tag() {
        return Helper::get_event_tag();
    }

    protected function register_controls_section() {

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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );
        
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TP Sub Title Here', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );       

        $this->add_control(
            'tp_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TP section title here', 'tpcore'),
                'placeholder' => esc_html__('Type section title here', 'tpcore'),
            ]
        );

        $this->add_control(
            'tp_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tpcore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tpcore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tpcore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tpcore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tpcore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tpcore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );
        $this->end_controls_section();



        // Start of event section
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__( 'Eduker Event', 'tpcore' ),
            ]
        );
        $this->add_control(
            'etn_event_cat',
            [
                'label'    => esc_html__( 'Event Category', 'tpcore' ),
                'type'     => Controls_Manager::SELECT2,
                'options'  => $this->get_event_category(),
                'multiple' => true,
            ]
        );
        $this->add_control(
            'etn_event_tag',
            [
                'label'    => esc_html__( 'Event Tag', 'tpcore' ),
                'type'     => Controls_Manager::SELECT2,
                'options'  => $this->get_event_tag(),
                'multiple' => true,
            ]
        );
        $this->add_control(
            'etn_event_count',
            [
                'label'   => esc_html__( 'Event count', 'tpcore' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => '6',
            ]
        );

        $this->add_control(
            'etn_desc_show',
            [
                'label'   => esc_html__( 'Show Description', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'etn_desc_limit',
            [
                'label'   => esc_html__( 'Description Limit', 'tpcore' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 20,
                'condition' => ['etn_desc_show' => 'yes'],
            ]
        );

        $this->add_control(
            'etn_event_col',
            [
                'label'   => esc_html__( 'Event column', 'tpcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '3' => esc_html__( '4 Column ', 'tpcore' ),
                    '4' => esc_html__( '3 Column', 'tpcore' ),
                    '6' => esc_html__( '2 Column', 'tpcore' ),

                ],
                'condition' => ['tp_design_style' => 'layout-2']
            ]
        );

        $this->add_control(
            'filter_with_status',
            [
                'label'     => esc_html__( 'Event status filter By', 'tpcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''        => esc_html__( 'All', 'tpcore' ),
                    'upcoming' => esc_html__( 'upcoming Event', 'tpcore' ),
                    'expire' => esc_html__( 'Expire Event', 'tpcore' ),
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'     => esc_html__( 'Order Event By', 'tpcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'post_date',
                'options'   => [
                    'ID'        => esc_html__( 'Id', 'tpcore' ),
                    'title'     => esc_html__( 'Title', 'tpcore' ),
                    'post_date' => esc_html__( 'Post Date', 'tpcore' ),
                    'etn_start_date' => esc_html__( 'Event Start Date', 'tpcore' ),
                    'etn_end_date' => esc_html__( 'Event End Date', 'tpcore' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Event Order', 'tpcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'tpcore' ),
                    'DESC' => esc_html__( 'Descending', 'tpcore' ),
                ],
            ]
        );
        $this->add_control(
            'show_event_location',
            [
                'label'   => esc_html__( 'Show Event Location', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_parent_event',
            [
                'label'   => esc_html__( 'Show Recurring Parent Events', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => ['tp_design_style' => 'layout-3']
            ]
        );

        $this->add_control(
            'show_child_event',
            [
                'label'   => esc_html__( 'Show Recurring Child Event', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['tp_design_style' => 'layout-3']
            ]
        );
        $this->add_control(
            'show_event_time',
            [
                'label'   => esc_html__( 'Show Event Time', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['tp_design_style' => 'layout-1']
            ]
        );
        $this->add_control(
            'show_event_btn',
            [
                'label'   => esc_html__( 'Show Event Button', 'tpcore' ),
                'type'    => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['tp_design_style' => 'layout-1']
            ]
        );

        $this->end_controls_section();

        // _tp_shape
        $this->start_controls_section(
            '_tp_shape_section',
            [
                'label' => esc_html__('Shape', 'tpcore'),
                'condition' => ['tp_design_style' => ['layout-2', 'layout-3']]
            ]
        );

        $this->add_control(
            'tp_shape_show',
            [
                'label' => esc_html__( 'Section Shape Show', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

         // tp_btn_button_group
         $this->start_controls_section(
            'tp_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                'condition' => ['tp_design_style' => ['layout-3', 'layout-2']]
            ]
        );

        $this->add_control(
            'tp_btn_button_show',
            [
                'label' => esc_html__( 'Show Button', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tp_btn_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'tpcore'),
                'title' => esc_html__('Enter button text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tp_btn_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'tp_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tp_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tp_btn_link',
            [
                'label' => esc_html__('Button link', 'tpcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'tpcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tp_btn_link_type' => '1',
                    'tp_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tp_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tp_btn_link_type' => '2',
                    'tp_btn_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        $this->tp_section_style_controls('about_section', 'Section', '.tp-el-sec');
        $this->tp_basic_style_controls('heading_title', 'Title', '.tp-el-title');
        $this->tp_basic_style_controls('heading_subtitle', 'Subtitle', '.tp-el-subtitle');
        $this->tp_basic_style_controls('heading_event_title', 'Event Title', '.tp-el-ev-title');
        $this->tp_basic_style_controls('heading_event_location', 'Event Location', '.tp-el-ev-location');
        $this->tp_basic_style_controls('heading_event_date', 'Event Date', '.tp-el-ev-date');
        $this->tp_basic_style_controls('heading_event_time', 'Event Time', '.tp-el-ev-time');
        $this->tp_link_controls_style('', 'b_btn1_style', 'Button', '.tp-el-btn');
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
    protected function render() {
        $settings = $this->get_settings_for_display();

        $event_cat          = $settings["etn_event_cat"];
        $event_tag          = $settings["etn_event_tag"];
        $event_count        = $settings["etn_event_count"];
        $etn_event_col      = $settings["etn_event_col"];
        $etn_desc_limit     = $settings["etn_desc_limit"];
        $order              = (isset($settings["order"]) ? $settings["order"] : 'DESC');
        $show_event_location = (isset($settings["show_event_location"]) ? $settings["show_event_location"] : 'yes');
        $show_end_date      = (isset($settings["show_end_date"]) ? $settings["show_end_date"] : 'no');
        $etn_desc_show      = (isset($settings["etn_desc_show"]) ? $settings["etn_desc_show"] : 'yes');
        $orderby            = $settings["orderby"];
        $show_child_event   = $settings["show_child_event"];
        $show_parent_event  = $settings["show_parent_event"];
        $show_event_time  = $settings["show_event_time"];
        $show_event_btn  = $settings["show_event_btn"];

        if ( $orderby == "etn_start_date" || $orderby == "etn_end_date" ) {
            $orderby_meta       = "meta_value";
        } else {
            $orderby_meta       = null;
        }
        $filter_with_status       = $settings['filter_with_status'];
        $post_parent = Helper::show_parent_child( $show_parent_event , $show_child_event  );

        $data           = Helper::post_data_query('etn', $event_count, $order, $event_cat, 'etn_category',
        null, null, $event_tag, $orderby_meta, $orderby, $filter_with_status, $post_parent);

        ?>

<?php if ( $settings['tp_design_style']  == 'layout-2' ): 
            $this->add_render_attribute('title_args', 'class', 'tp-section__title mb-15');
        ?>


<?php else: 
            $this->add_render_attribute('title_args', 'class', 'tp-section__title mb-15');

            // Link
            if ('2' == $settings['tp_btn_link_type']) {
                $this->add_render_attribute('tp-button-arg', 'href', get_permalink($settings['tp_btn_page_link']));
                $this->add_render_attribute('tp-button-arg', 'target', '_self');
                $this->add_render_attribute('tp-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tp-button-arg', 'class', 'tp-btn');
            } else {
                if ( ! empty( $settings['tp_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tp-button-arg', $settings['tp_btn_link'] );
                    $this->add_render_attribute('tp-button-arg', 'class', 'tp-btn');
                }
            }

        ?>

<section class="event__area pt-115">
    <div class="container">

        <div class="row">
            <div class="col-xxl-12">
                <div class="section__title-wrapper-2 text-center mb-60">
                    <?php if(!empty($settings['sub_title'])) : ?>
                    <span class="section__title-pre-2 tp-el-subtitle"><?php echo tp_kses($settings['sub_title']); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($settings['tp_title'])) : ?>
                    <h3 class="section__title-2 tp-el-title"><?php echo tp_kses($settings['tp_title']); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row test-row">
            <div class="col-xxl-12">

            <?php
            if ( !empty( $data ) ) {
            foreach ( $data as $index => $value ) {
                $social             = get_post_meta($value->ID, 'etn_event_socials', true);
                $etn_event_location = get_post_meta($value->ID, 'etn_event_location', true);
                $category           = Helper::cate_with_link($value->ID, 'etn_category');
                $start_date     = get_post_meta( $value->ID, 'etn_start_date', true );
                $end_date       = get_post_meta( $value->ID, 'etn_end_date', true );
                // $etn_start_date_new = Helper::etn_date_new( $start_date );
                $etn_start_date = Helper::etn_date( $start_date );
                $etn_end_date   = Helper::etn_date( $end_date );

                $start_date_digit = date("d", strtotime($start_date));
                $start_date_year_month = date("M, Y", strtotime($start_date));
                
                $event_options  = get_option("etn_event_options");
                
                $data = Helper::single_template_options( $value->ID );
            

            ?>
                <div class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between tp-el-sec">
                    <div class="event__left d-sm-flex align-items-center">
                        <div class="event__date">
                            <?php if(!empty($start_date_digit)) : ?>
                            <h4 class=" tp-el-ev-date" ><?php echo esc_html($start_date_digit); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($start_date_year_month)) : ?>
                            <p><?php echo esc_html($start_date_year_month); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="event__content">

                            <?php if(!empty($etn_event_location) && $show_event_location == 'yes') : 
                                $location = '';
                                $loc_arr = $etn_event_location;

                                if(!empty(is_array($loc_arr) || is_object($loc_arr))) : 
                                foreach ($loc_arr as $key => $loc) {
                                  if ( $key == 'address' ) {
                                    $location .= $loc;
                                  } elseif ( $key == 'custom_url' ) {
                                      $location .= $loc;
                                  }
                                }
                                endif; 
                                if(!empty($location)) : 
                            ?>
                            <div class="event__meta">
                                <ul>
                                    <li>
                                        <a class="tp-el-ev-location"><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.49992 9.51253C9.72047 9.51253 10.7099 8.52308 10.7099 7.30253C10.7099 6.08198 9.72047 5.09253 8.49992 5.09253C7.27937 5.09253 6.28992 6.08198 6.28992 7.30253C6.28992 8.52308 7.27937 9.51253 8.49992 9.51253Z"
                                                    stroke="#5F6160" stroke-width="1.5" />
                                                <path
                                                    d="M2.56416 6.01334C3.95958 -0.120822 13.0475 -0.113738 14.4358 6.02043C15.2504 9.61876 13.0121 12.6646 11.05 14.5488C9.62625 15.9229 7.37375 15.9229 5.94291 14.5488C3.98791 12.6646 1.74958 9.61168 2.56416 6.01334Z"
                                                    stroke="#5F6160" stroke-width="1.5" />
                                            </svg>
                                            <?php echo esc_html($location); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; endif; ?>

                            <h3 class="event__title tp-el-ev-title">
                                <a href="<?php echo get_the_permalink($value->ID); ?>"><?php echo get_the_title($value->ID); ?></a>
                            </h3>

                            <?php
                            if($etn_desc_show =='yes'):
                            ?>
                            <p><?php echo esc_html(Helper::trim_words(get_the_content($value->ID), $etn_desc_limit)); ?> </p>
                            <?php endif; ?>

                            <?php 
                            $etn_schedule = get_post_meta($value->ID, 'etn_event_schedule', true);
            
                            if ( !empty($etn_schedule) ) : 
                                $etn_schedule_topics = get_post_meta($etn_schedule[0], 'etn_schedule_topics', true);
                                $etn_schedule_speakers_ids = $etn_schedule_topics[0]['etn_shedule_speaker'];
                            
                            foreach($etn_schedule_speakers_ids as $speaker): 
                                $speaker_name = get_post_meta($speaker, 'etn_speaker_title', true);
                                $speaker_avatar = get_the_post_thumbnail_url( $speaker, 'thumbnail' );
                                $speaker_url = get_the_permalink($speaker);
                            ?>
                            <div class="event__person">
                                <ul>
                                    <li>
                                        <?php if(!empty($speaker_url)) : ?>
                                        <a href="<?php echo esc_url($speaker_url); ?>">
                                            <img src="<?php echo esc_url($speaker_avatar); ?>" alt="<?php echo esc_attr($speaker_name); ?>">
                                            <?php if(!empty($speaker_name)) : ?>
                                            <span><?php echo esc_html($speaker_name); ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url($speaker_avatar); ?>" alt="<?php echo esc_attr($speaker_name); ?>">
                                            <?php if(!empty($speaker_name)) : ?>
                                            <span><?php echo esc_html($speaker_name); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                            <?php endforeach; endif; ?>

                        </div>
                    </div>
                    <div class="event__right d-sm-flex align-items-center">

                        <?php if ( !empty($show_event_time) && ( !empty( $data['event_start_time'] ) || !empty( $data['event_end_time'] ) )) :
                        $separate = !empty($data['event_end_time']) ? ' - ' : '';
                        ?>
                        <div class="event__time">
                            <span class="tp-el-ev-time">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.75 7.50024C13.75 10.9502 10.95 13.7502 7.5 13.7502C4.05 13.7502 1.25 10.9502 1.25 7.50024C1.25 4.05024 4.05 1.25024 7.5 1.25024C10.95 1.25024 13.75 4.05024 13.75 7.50024Z"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M9.8188 9.48735L7.8813 8.3311C7.5438 8.1311 7.2688 7.64985 7.2688 7.2561V4.6936"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php echo esc_html($data['event_start_time'] . $separate . $data['event_end_time']); ?>
                            </span>
                        </div>
                        <?php endif; ?>

                        <?php
                        $show_form_button = apply_filters("etn_form_submit_visibility", true, $value->ID);
                        if ($show_form_button === false && !empty($show_event_btn)) {
                        ?>
                            <div class="event__more ml-30">
                                <a href="#" class="tp-btn-5 tp-btn-7"><?php echo esc_html__('Expired!', "tpcore"); ?> </a>
                            </div>
                            <?php
                        } else {
                            if(!empty($show_event_btn)) :
                        ?>
                            <div class="event__more ml-30">
                                <a href="<?php echo esc_url(get_the_permalink($value->ID)); ?>" class="tp-btn-5 tp-btn-7 tp-el-btn" title="<?php echo get_the_title($value->ID); ?>"><?php echo esc_html__('Ticket', 'tpcore') ?></a>
                            </div>
                        <?php
                        endif; 
                        }
                        ?>

                    </div>
                </div>

            <?php
                }
            }else{
                ?>
                <p class="etn-not-found-post"><?php echo esc_html__('No Post Found', 'tpcore'); ?></p>
                <?php
            } ?>

                
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php
    }

}

$widgets_manager->register( new TP_Event_New_Post() );