<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Hero_Banner extends Widget_Base {

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
		return 'hero-banner';
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
		return __( 'Hero Banner', 'TScore' );
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

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
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
                'default' => true,
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
        $this->end_controls_section();


        // _TS_image
        $this->start_controls_section(
            '_TS_image_section',
            [
                'label' => esc_html__('Thumbnail', 'TScore'),
            ]
        );
        $this->add_control(
            'TS_image',
            [
                'label' => esc_html__( 'Choose Image', 'TScore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'TS_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'TS_image_overlap',
            [
                'label' => esc_html__('Image overlap to top?', 'TScore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'TScore'),
                'label_off' => esc_html__('No', 'TScore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'TS_image_height',
            [
                'label' => esc_html__( 'Image Height', 'TScore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-overlap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'TS_image_overlap_x',
            [
                'label' => esc_html__( 'Image overlap position', 'TScore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-overlap img' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => array(
                    'TS_image_overlap' => 'yes',
                ),
            ]
        );
        $this->end_controls_section();

        // _TS_image
        $this->start_controls_section(
            '_TS_shape_image_section',
            [
                'label' => esc_html__('Shape Image', 'TScore'),
            ]
        );
        $this->add_control(
            'TS_shape_image',
            [
                'label' => esc_html__( 'Choose Image', 'TScore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'TS_shape_image_2',
            [
                'label' => esc_html__( 'Choose Image 2', 'TScore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
	}

    protected function style_tab_content()
    {
        $this->TS_section_style_controls('about_section', 'Section', '.ts-el-sec');
        $this->TS_basic_style_controls('heading_title', 'Title', '.ts-el-title');
        $this->TS_basic_style_controls('heading_subtitle', 'Subtitle', '.ts-el-subtitle');
        $this->TS_basic_style_controls('heading_desc', 'Description', '.ts-el-content');
        $this->TS_link_controls_style('', 'b_btn1_style', 'Button', '.ts-el-btn');
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
        if ('2' == $settings['TS_btn_link_type']) {
            $this->add_render_attribute('ts-button-arg', 'href', get_permalink($settings['TS_btn_page_link']));
            $this->add_render_attribute('ts-button-arg', 'target', '_self');
            $this->add_render_attribute('ts-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn-green');
        } else {
            if ( ! empty( $settings['TS_btn_link']['url'] ) ) {
                $this->add_link_attributes( 'ts-button-arg', $settings['TS_btn_link'] );
                $this->add_render_attribute('ts-button-arg', 'class', 'ts-btn-green ts-el-btn');
            }
        }

		?>

		<?php if ( $settings['TS_design_style']  == 'layout-2' ):
            if ( !empty($settings['TS_image']['url']) ) {
                $TS_image = !empty($settings['TS_image']['id']) ? wp_get_attachment_image_url( $settings['TS_image']['id'], $settings['TS_image_size_size']) : $settings['TS_image']['url'];
                $TS_image_alt           = get_post_meta($settings["TS_image"]["id"], "_wp_attachment_image_alt", true);
            }

            $this->add_render_attribute('title_args', 'class', 'hero__title hero__title--big ts-el-title');
        ?>
        <section class="hero hero--style2 ts-el-sec">
          <div class="container container--custom">
            <div class="row align-items-center justify-content-between">
              <div class="col-12">
                <div class="hero__content text-center">
                  <?php if ( !empty($settings['TS_section_title_show']) ) : ?>
                   <?php if ( !empty($settings['TS_sub_title']) ) : ?>
                    <span class="hero__title hero__title--small ts-el-subtitle"><?php echo TS_kses( $settings['TS_sub_title'] ); ?></span>
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
                     <p class="hero__text wow animate__fadeInUp animate__animated ts-el-content" data-wow-duration="1200ms" data-wow-delay="400ms"><?php echo TS_kses( $settings['TS_desctiption'] ); ?></p>
                    <?php endif; ?>

                  <?php endif; ?>

                  <div class="hero__topDown mt-30">
                    <?php if (!empty($settings['TS_btn_text'])) : ?>
                    <div class="ts-hero-btn">
                        <a <?php echo $this->get_render_attribute_string( 'ts-button-arg' ); ?>>
                            <span class="btn__text"><?php echo $settings['TS_btn_text']; ?></span> <i class="fa-solid fa-heart btn__icon"></i></a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if ($settings['TS_image']['url'] || $settings['TS_image']['id']) : ?>
              <div class="col-12">
                <figure class="hero__figure hero__figure--style2">
                    <img class="hero__figure__thumbs" src="<?php echo esc_url($TS_image); ?>" alt="<?php echo esc_attr($TS_image_alt); ?>">
                </figure>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </section>

		<?php else:
            if ( !empty($settings['TS_image']['url']) ) {
                $TS_image = !empty($settings['TS_image']['id']) ? wp_get_attachment_image_url( $settings['TS_image']['id'], $settings['TS_image_size_size']) : $settings['TS_image']['url'];
                $TS_image_alt           = get_post_meta($settings["TS_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['TS_shape_image']['url']) ) {
                $TS_shape_image = !empty($settings['TS_shape_image']['id']) ? wp_get_attachment_image_url( $settings['TS_shape_image']['id'], 'large') : $settings['TS_shape_image']['url'];
                $TS_shape_image_alt           = get_post_meta($settings["TS_shape_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['TS_shape_image_2']['url']) ) {
                $TS_shape_image_2 = !empty($settings['TS_shape_image_2']['id']) ? wp_get_attachment_image_url( $settings['TS_shape_image_2']['id'], 'large') : $settings['TS_shape_image_2']['url'];
                $TS_shape_image_2_alt           = get_post_meta($settings["TS_shape_image_2"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'slider__title-2 ts-el-title');

		?>
         <section class="slider__area slider__height-2 include-bg d-flex align-items-center">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-6 col-lg-6">
                     <div class="slider__content-2 mt-30">
                       <?php if ( !empty($settings['TS_sub_title']) ) : ?>
                        <span class="ts-el-subtitle " ><?php echo TS_kses( $settings['TS_sub_title'] ); ?></span>
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
                         <p class="ts-el-content" ><?php echo TS_kses( $settings['TS_desctiption'] ); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($settings['TS_btn_text'])) : ?>
                        <div class="ts-hero-btn">
                            <a <?php echo $this->get_render_attribute_string( 'ts-button-arg' ); ?>>
                                <?php echo $settings['TS_btn_text']; ?>
                            </a>
                        </div>
                        <?php endif; ?>

                     </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6">
                     <div class="slider__thumb-2 p-relative">
                        <div class="slider__shape">
                           <img class="slider__shape-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/2/shape/slider-cap-1.png" alt="img">
                           <img class="slider__shape-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/2/shape/slider-cap-2.png" alt="img">
                           <img class="slider__shape-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/2/shape/slider-cap-3.png" alt="img">

                           <?php if (!empty($TS_shape_image)) : ?>
                           <img class="slider__shape-4" src="<?php echo esc_url($TS_shape_image); ?>" alt="<?php echo esc_attr($TS_shape_image_alt); ?>">
                           <?php endif; ?>
                           <?php if (!empty($TS_shape_image_2)) : ?>
                           <img class="slider__shape-5" src="<?php echo esc_url($TS_shape_image_2); ?>" alt="<?php echo esc_attr($TS_shape_image_2_alt); ?>">
                           <?php endif; ?>

                        </div>
                        <?php if (!empty($TS_image)) : ?>
                        <span class="slider__thumb-mask">
                            <img src="<?php echo esc_url($TS_image); ?>" alt="<?php echo esc_attr($TS_image_alt); ?>">
                        </span>
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

$widgets_manager->register( new TS_Hero_Banner() );