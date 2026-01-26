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
class TS_Contact_Info extends Widget_Base {
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
		return 'contact-info';
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
		return __( 'Contact Info', 'TScore' );
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


    protected static function get_profile_names()
    {
        return [
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

        // Service group
        $this->start_controls_section(
            '_TS_contact_info',
            [
                'label' => esc_html__('Portfolio List', 'TScore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'TScore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_condition',
            [
                'label' => __( 'Field condition', 'TScore' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'TScore' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

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
            'TS_title', [
                'label' => esc_html__('Title', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'TScore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'TS_description',
            [
                'label' => esc_html__('Description', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'TS_contact_link',
            [
                'label' => esc_html__('Description CTA', 'TScore'),
                'description' => TS_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Phone and Email',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'TS_list',
            [
                'label' => esc_html__('Services - List', 'TScore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'TS_title' => esc_html__('united states', 'TScore'),
                    ],
                    [
                        'TS_title' => esc_html__('south Africa', 'TScore')
                    ],
                    [
                        'TS_title' => esc_html__('United Kingdom', 'TScore')
                    ]
                ],
                'title_field' => '{{{ TS_title }}}',
            ]
        );
        $this->add_responsive_control(
            'TS_align',
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
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                // 'default' => 'ts-post-thumb',
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
                        'link' => ['url' => 'htTSs://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'htTSs://linkedin.com/'],
                        'name' => 'linkedin'
                    ],
                    [
                        'link' => ['url' => 'htTSs://twitter.com/'],
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
	}

    protected function style_tab_content()
    {
        $this->TS_section_style_controls('about_section', 'Section', '.ts-el-sec');
        $this->TS_basic_style_controls('heading_title', 'Title', '.ts-el-title');
        $this->TS_basic_style_controls('heading_desc', 'Content', '.ts-el-content');
        $this->TS_link_controls_style('', 'b_btn1_style', 'Social ', '.ts-el-btn a');
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


        <div class="contact__info white-bg p-relative z-index-1">
            <div class="contact__info-inner white-bg ts-el-sec">
               <ul>
                <?php foreach ($settings['TS_list'] as $item) : ?>
                  <li>
                     <div class="contact__info-item d-flex align-items-start mb-35">
                        <div class="contact__info-icon mr-15">
                            <?php if($item['TS_features_icon_type'] !== 'image') : ?>
                                <?php if (!empty($item['TS_features_icon']) || !empty($item['TS_features_selected_icon']['value'])) : ?>
                                    <span class="contact_info_icon"><?php TS_render_icon($item, 'TS_features_icon', 'TS_features_selected_icon'); ?></span>
                                <?php endif; ?>
                            <?php else : ?>
                                <span class="contact_info_icon">
                                    <?php if (!empty($item['TS_features_image']['url'])): ?>
                                    <img src="<?php echo $item['TS_features_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['TS_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="contact__info-text">
                           <h4 class="ts-el-title" ><?php echo TS_kses($item['TS_title' ]); ?></h4>
                        <?php if (!empty($item['TS_description' ])): ?>
                        <p class="ts-el-content" ><?php echo TS_kses($item['TS_description']); ?></p>
                        <?php endif; ?>

                        </div>
                     </div>
                  </li>
                <?php endforeach; ?>
               </ul>


                <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                    <div class="contact__social pl-30">
                        <h4><?php echo esc_html__('Follow Us','TScore'); ?></h4>
                        <ul>
                        <?php
                        foreach ($settings['profiles'] as $profile) :
                            $icon = $profile['name'];
                            $url = esc_url($profile['link']['url']);

                            printf('<li class="ts-el-btn" ><a target="_blank" rel="noopener"  href="%s" class="elementor-repeater-item-%s"><i class="fab fa-%s" aria-hidden="true"></i></a></li>',
                                $url,
                                esc_attr($profile['_id']),
                                esc_attr($icon)
                            );
                        endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
	}
}

$widgets_manager->register( new TS_Contact_Info() );