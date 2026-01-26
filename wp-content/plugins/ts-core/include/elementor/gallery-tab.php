<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Ts Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TS_Gallery_Tab extends Widget_Base {

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
		return 'gallery-tab';
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
		return __( 'Gallery', 'TScore' );
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

$this->start_controls_section(
            '_section_gallery',
            [
                'label' => esc_html__( 'Gallery - Content', 'TScore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'images',
            [
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'TScore' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type gallery title', 'TScore' ),
                'default' => esc_html__( 'Gallery Title', 'TScore' ),
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'TScore' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type description here', 'TScore' ),
                'default' => esc_html__( 'If you are going to use a passage of Lorem Ipsum, you need to be sure there is anything embarrassing hidden in the middle of text', 'TScore' ),
            ]
        );
        $repeater->add_control(
            'filter',
            [
                'label' => esc_html__( 'Filter Name (Category)', 'TScore' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type gallery filter name', 'TScore' ),
                'description' => esc_html__( 'Filter name will be used in filter menu. Added more category by , separator.', 'TScore' ),
                'default' => esc_html__( 'Filter Name', 'TScore' ),
            ]
        );

        $repeater->add_control(
            'TS_services_link_switcher',
            [
                'label' => esc_html__( 'Add Services link', 'TScore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'TScore' ),
                'label_off' => esc_html__( 'No', 'TScore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'TS_services_btn_text',
            [
                'label' => esc_html__('Button Text', 'TScore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'TScore'),
                'title' => esc_html__('Enter button text', 'TScore'),
                'label_block' => true,
                'condition' => [
                    'TS_services_link_switcher' => 'yes'
                ],
            ]
        );
        $repeater->add_control(
            'TS_services_link_type',
            [
                'label' => esc_html__( 'Service Link Type', 'TScore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => [
                    'TS_services_link_switcher' => 'yes'
                ]
            ]
        );
        $repeater->add_control(
            'TS_services_link',
            [
                'label' => esc_html__( 'Service Link link', 'TScore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'htTSs://your-link.com', 'TScore' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'TS_services_link_type' => '1',
                    'TS_services_link_switcher' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'TS_services_page_link',
            [
                'label' => esc_html__( 'Select Service Link Page', 'TScore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => TS_get_all_pages(),
                'condition' => [
                    'TS_services_link_type' => '2',
                    'TS_services_link_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'gallery',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'title_field' => sprintf( esc_html__( 'Filter Group: %1$s', 'TScore' ), '{{filter}}' ),
                'default' => [
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Web Design', 'TScore' ),
                        'title' => esc_html__( 'Ecommerce Product Apps', 'TScore' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Logo Design', 'TScore' ),
                        'title' => esc_html__( 'Cryptocurrency web Application', 'TScore' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Mobile App', 'TScore' ),
                        'title' => esc_html__( 'Making 3d Illustration', 'TScore' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Ui/Kit', 'TScore' ),
                        'title' => esc_html__( 'Hilon - Personal Portfolio', 'TScore' ),

                    ]
                ]
            ]
        );

        $this->add_control(
            'title_tag',
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
                'default' => 'h4',
                'toggle' => false,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'gallery_thumbnail',
                'default' => 'ts-gallery-thumb',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'show_filter',
            [
                'label' => esc_html__( 'Show Filter', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'TScore' ),
                'label_off' => esc_html__( 'No', 'TScore' ),
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'show_all_filter',
            [
                'label' => esc_html__( 'Show "All Project" Filter?', 'TScore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'TScore' ),
                'label_off' => esc_html__( 'No', 'TScore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__( 'Enable to display "All Project" filter in filter menu.', 'TScore' ),
                'condition' => [
                    'show_filter' => 'yes'
                ],
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'all_filter_label',
            [
                'label' => esc_html__( 'Filter Label', 'TScore' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'All Project', 'TScore' ),
                'placeholder' => esc_html__( 'Type filter label', 'TScore' ),
                'description' => esc_html__( 'Type "All Project" filter label.', 'TScore' ),
                'condition' => [
                    'show_all_filter' => 'yes',
                    'show_filter' => 'yes'
                ]
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


        if ( empty( $settings['gallery'] ) ) {
            return;
        }


        $categories = array();
        $cats = array();
        foreach ($settings['gallery'] as $index => $gallery) :

            $cats = explode(",", $gallery['filter']);

            foreach ($cats as $i => $cat){
                $categories[TS_slugify( $cat )] = $cat;
            }
        endforeach;

        $this->add_render_attribute('title_args', 'class', 'title');

		?>


            <section class="portfolio__inner">
                <div class="container">
                	<?php if ( $settings['show_filter'] === 'yes' ) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="portfolio__inner__nav">
								<?php if ( $settings['show_all_filter'] === 'yes' ) : ?>
                                    <button data-filter="*" class="active"><?php echo esc_html( $settings['all_filter_label'] ); ?></button>
                                <?php endif; ?>
                                <?php foreach ( $categories as $key => $val ) :?>
                                    <button data-filter=".<?php echo esc_attr($key); ?>"><span class="filter-text"><?php echo esc_html( $val ); ?></span></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="portfolio__inner__active">
						<?php
                        $cars = array();
                        foreach ($settings['gallery'] as $index => $gallery) :
                            $cars = explode(",",  $gallery['filter']);
                            $big_image  = (!empty(wp_get_attachment_image_url( $gallery['images']['id'], 'full'))) ? wp_get_attachment_image_url( $gallery['images']['id'], 'full') : Utils::get_placeholder_image_src();

							// Link
	                        if ('2' == $gallery['TS_services_link_type']) {
	                            $link = get_permalink($gallery['TS_services_page_link']);
	                            $target = '_self';
	                            $rel = 'nofollow';
	                        } else {
	                            $link = !empty($gallery['TS_services_link']['url']) ? $gallery['TS_services_link']['url'] : '';
	                            $target = !empty($gallery['TS_services_link']['is_external']) ? '_blank' : '';
	                            $rel = !empty($gallery['TS_services_link']['nofollow']) ? 'nofollow' : '';
	                        }
                        ?>

						<?php foreach ($cars as $key => $value) : ?>
							<?php
								$item_classes = TS_slugify($value);
							?>
						<?php endforeach; ?>


                        <div class="portfolio__inner__item grid-item <?php echo esc_attr($item_classes); ?>">
                            <div class="row gx-0 align-items-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__thumb">
                                        <a href="<?php echo esc_url($link); ?>">
                                            <?php if(!empty(wp_get_attachment_image( $gallery['images']['id']))){ ?>
                                                <?php echo wp_get_attachment_image( $gallery['images']['id'], $settings['gallery_thumbnail_size'] ); ?>
                                            <?php } else { ?>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($gallery, 'full', 'images') ?>
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__content">
                                    	<?php if(!empty($gallery['filter'])) : ?>
                                            <span class="gallery-category"><?php echo esc_html($gallery['filter']); ?></span>
                                        <?php endif; ?>

										<?php
			                            if ( !empty($gallery['title']) ) :
			                                printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
			                                    tag_escape( $settings['title_tag'] ),
			                                    $this->get_render_attribute_string( 'title_args' ),
			                                    TS_kses( $gallery['title' ] ),
			                                    esc_url($link)
			                                    );
			                            endif;
			                            ?>

			                            <?php if(!empty($gallery['description'])) : ?>
                                        <p><?php echo TS_kses( $gallery['description' ]); ?></p>
     									<?php endif; ?>

		     							<?php if (!empty($link)) : ?>
		                                    <div class="gallery-btn">
		                                        <a target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>" href="<?php echo esc_url($link); ?>" class="link"><?php echo TS_kses($gallery['TS_services_btn_text']); ?></a>
		                                    </div>
		                                <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>


		<?php
	}


}

$widgets_manager->register( new TS_Gallery_Tab() );