<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
use TSCore\Elementor\Controls\Group_Control_TSBGGradient;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Team_Details extends Widget_Base {

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
		return 'team-details';
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
		return __( 'Team Details', 'TScore' );
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

    protected static function get_profile_names()
    {
        return [
            '500px' => esc_html__('500px', 'TScore'),
            'apple' => esc_html__('Apple', 'TScore'),
            'behance' => esc_html__('Behance', 'TScore'),
            'bitbucket' => esc_html__('BitBucket', 'TScore'),
            'codepen' => esc_html__('CodePen', 'TScore'),
            'delicious' => esc_html__('Delicious', 'TScore'),
            'deviantart' => esc_html__('DeviantArt', 'TScore'),
            'digg' => esc_html__('Digg', 'TScore'),
            'dribbble' => esc_html__('Dribbble', 'TScore'),
            'email' => esc_html__('Email', 'TScore'),
            'facebook' => esc_html__('Facebook', 'TScore'),
            'flickr' => esc_html__('Flicker', 'TScore'),
            'foursquare' => esc_html__('FourSquare', 'TScore'),
            'github' => esc_html__('Github', 'TScore'),
            'houzz' => esc_html__('Houzz', 'TScore'),
            'instagram' => esc_html__('Instagram', 'TScore'),
            'jsfiddle' => esc_html__('JS Fiddle', 'TScore'),
            'linkedin' => esc_html__('LinkedIn', 'TScore'),
            'medium' => esc_html__('Medium', 'TScore'),
            'pinterest' => esc_html__('Pinterest', 'TScore'),
            'product-hunt' => esc_html__('Product Hunt', 'TScore'),
            'reddit' => esc_html__('Reddit', 'TScore'),
            'slideshare' => esc_html__('Slide Share', 'TScore'),
            'snapchat' => esc_html__('Snapchat', 'TScore'),
            'soundcloud' => esc_html__('SoundCloud', 'TScore'),
            'spotify' => esc_html__('Spotify', 'TScore'),
            'stack-overflow' => esc_html__('StackOverflow', 'TScore'),
            'tripadvisor' => esc_html__('TripAdvisor', 'TScore'),
            'tumblr' => esc_html__('Tumblr', 'TScore'),
            'twitch' => esc_html__('Twitch', 'TScore'),
            'twitter' => esc_html__('Twitter', 'TScore'),
            'vimeo' => esc_html__('Vimeo', 'TScore'),
            'vk' => esc_html__('VK', 'TScore'),
            'website' => esc_html__('Website', 'TScore'),
            'whatsapp' => esc_html__('WhatsApp', 'TScore'),
            'wordpress' => esc_html__('WordPress', 'TScore'),
            'xing' => esc_html__('Xing', 'TScore'),
            'yelp' => esc_html__('Yelp', 'TScore'),
            'youtube' => esc_html__('YouTube', 'TScore'),
        ];
    }


	protected function register_controls() {

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


        // _TS_image
        $this->start_controls_section(
            '_TS_image',
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

        $this->start_controls_section(
            '_section_social',
            [
                'label' => esc_html__('Social Profiles', 'TScore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Profile Name', 'TScore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => esc_html__('Profile Link', 'TScore'),
                'placeholder' => esc_html__('Add your profile link', 'TScore'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ]
                ],
            ]
        );

        $this->add_control(
            'show_profiles',
            [
                'label' => esc_html__('Show Profiles', 'TScore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'TScore'),
                'label_off' => esc_html__('Hide', 'TScore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'style_transfer' => true,
            ]
        );


        $this->end_controls_section();


        // Skill
        $this->start_controls_section(
            'TS_progress_bar',
            [
                'label' => esc_html__('Skill Bar', 'TScore'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Name', 'TScore' ),
                'default' => esc_html__( 'Design', 'TScore' ),
                'placeholder' => esc_html__( 'Type a skill name', 'TScore' ),
            ]
        );

        $repeater->add_control(
            'level',
            [
                'label' => esc_html__( 'Level (Out Of 100)', 'TScore' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                    'size' => 95
                ],
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'want_customize',
            [
                'label' => esc_html__( 'Want To Customize?', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'TScore' ),
                'label_off' => esc_html__( 'No', 'TScore' ),
                'return_value' => 'yes',
                'description' => esc_html__( 'You can customize this skill bar color from here or customize from Style tab', 'TScore' ),
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'TScore' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .title' => 'color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'percentage_color',
            [
                'label' => esc_html__( 'Percentage label Color', 'TScore' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .percentage' => 'color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
                'style_transfer' => true,
            ]
        );


        $repeater->add_group_control(
            Group_Control_TSBGGradient::get_type(),
            [
                'name' => 'level_color',
                'label' => esc_html__('Level Color', 'TScore'),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .progress-bar',
                'condition' => ['want_customize' => 'yes'],
            ]
        );

        $repeater->add_control(
            'base_color',
            [
                'label' => esc_html__( 'Base Color', 'TScore' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .progress' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
            ]
        );

        $this->add_control(
            'skills',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print((name || level.size) ? (name || "Skill") + " - " + level.size + level.unit : "Skill - 0%") #>',
                'default' => [
                    [
                        'name' => 'Design',
                        'level' => ['size' => 95, 'unit' => '%']
                    ],
                    [
                        'name' => 'UX',
                        'level' => ['size' => 85, 'unit' => '%']
                    ]
                ]
            ]
        );
        $this->add_control(
            'view',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__( 'Layout', 'TScore' ),
                'separator' => 'before',
                'default' => 'progress-bar--1',
                'options' => [
                    'progress-bar--2' => esc_html__( 'Thin', 'TScore' ),
                    'progress-bar--1' => esc_html__( 'Normal', 'TScore' ),
                    'progress-bar--3' => esc_html__( 'Bold', 'TScore' ),
                ],
                'style_transfer' => true,
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

            if ( !empty($settings['TS_image']['url']) ) {
                $TS_image = !empty($settings['TS_image']['id']) ? wp_get_attachment_image_url( $settings['TS_image']['id'], $settings['TS_image_size_size']) : $settings['TS_image']['url'];
                $TS_image_alt = get_post_meta($settings["TS_image"]["id"], "_wp_attachment_image_alt", true);
            }
            $this->add_render_attribute('title_args', 'class', 'team-details-title text-uppercase mb-10');

		?>

        <section class="volunteersSection">
          <div class="container">
            <div class="row">
              <?php if ($settings['TS_image']['url'] || $settings['TS_image']['id']) : ?>
              <div class="col-lg-5 col-md-6">
                <div class="team-details-img">
                    <img src="<?php echo esc_url($TS_image); ?>" alt="<?php echo esc_attr($TS_image_alt); ?>">
                </div>
              </div>
              <?php endif; ?>

              <div class="col-lg-7 col-md-6">
                <div class="team-details-content pt-40">

                    <?php if ( !empty($settings['TS_section_title_show']) ) : ?>
                    <?php
                        if ( !empty($settings['TS_title' ]) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['TS_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                TS_kses( $settings['TS_title' ] )
                                );
                        endif;
                    ?>
                    <?php if ( !empty($settings['TS_sub_title']) ) : ?>
                    <span class="team-designation">
                        <?php echo TS_kses( $settings['TS_sub_title'] ); ?>
                    </span>
                    <?php endif; ?>

                    <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                        <div class="team-icon mt-15 mb-30">
                            <?php
                            foreach ($settings['profiles'] as $profile) :
                                $icon = $profile['name'];
                                $url = esc_url($profile['link']['url']);

                                printf('<a target="_blank" rel="noopener"  href="%s" class="elementor-repeater-item-%s"><i class="fab fa-%s" aria-hidden="true"></i></a>',
                                    $url,
                                    esc_attr($profile['_id']),
                                    esc_attr($icon)
                                );
                            endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( !empty($settings['TS_desctiption']) ) : ?>
                        <p><?php echo TS_kses( $settings['TS_desctiption'] ); ?></p>
                    <?php endif; ?>

                    <?php endif; ?>

                    <div class="row">
                      <div class="col-lg-9">
                         <div class="featureBlock__donation__progress">
                            <?php foreach ( $settings['skills'] as $index => $skill ) : ?>
                            <div class="featureBlock__donation__bar mb-15 <?php echo esc_attr( $settings['view'] ); ?> elementor-repeater-item-<?php echo $skill['_id']; ?>">
                              <label><?php echo esc_html( $skill['name'] ); ?></label>
                              <span class="featureBlock__donation__text skill-bar" data-width="<?php echo esc_attr( $skill['level']['size'] ); ?>%"><?php echo esc_attr( $skill['level']['size'] ); ?>%</span>
                              <div class="featureBlock__donation__line">
                                <span class="skill-bars">
                                <span class="skill-bars__line skill-bar" data-width="<?php echo esc_attr( $skill['level']['size'] ); ?>%"></span>
                                </span>
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
        </section>

		<?php
	}

}

$widgets_manager->register( new TS_Team_Details() );