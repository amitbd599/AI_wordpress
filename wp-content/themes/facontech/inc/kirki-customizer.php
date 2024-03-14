<?php
/**
 * facontech customizer
 *
 * @package facontech
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function facontech_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('facontech_customizer', [
        'priority' => 10,
        'title' => esc_html__('Eduker Customizer', 'facontech'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title' => esc_html__('Header Info Setting', 'facontech'),
        'description' => '',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('header_social', [
        'title' => esc_html__('Header Social', 'facontech'),
        'description' => '',
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title' => esc_html__('Header Setting', 'facontech'),
        'description' => '',
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title' => esc_html__('Blog Setting', 'facontech'),
        'description' => '',
        'priority' => 13,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title' => esc_html__('Side Info', 'facontech'),
        'description' => '',
        'priority' => 14,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title' => esc_html__('Breadcrumb Setting', 'facontech'),
        'description' => '',
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title' => esc_html__('Blog Setting', 'facontech'),
        'description' => '',
        'priority' => 16,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title' => esc_html__('Footer Settings', 'facontech'),
        'description' => '',
        'priority' => 16,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title' => esc_html__('Color Setting', 'facontech'),
        'description' => '',
        'priority' => 17,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title' => esc_html__('404 Page', 'facontech'),
        'description' => '',
        'priority' => 18,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('tutor_course_settings', [
        'title' => esc_html__('Tutor Course Settings ', 'facontech'),
        'description' => '',
        'priority' => 19,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('event_settings', [
        'title' => esc_html__('Event Settings ', 'facontech'),
        'description' => '',
        'priority' => 19,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('learndash_course_settings', [
        'title' => esc_html__('Learndash Course Settings ', 'facontech'),
        'description' => '',
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title' => esc_html__('Typography Setting', 'facontech'),
        'description' => '',
        'priority' => 21,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);

    $wp_customize->add_section('tutor_course_settings', [
        'title' => esc_html__('Tutor Course Settings ', 'facontech'),
        'description' => '',
        'priority' => 23,
        'capability' => 'edit_theme_options',
        'panel' => 'facontech_customizer',
    ]);
}

add_action('customize_register', 'facontech_customizer_panels_sections');

function _header_top_fields($fields)
{
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_topbar_switch',
        'label' => esc_html__('Topbar Swicher', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_preloader',
        'label' => esc_html__('Preloader On/Off', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];


    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_backtotop',
        'label' => esc_html__('Back To Top On/Off', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_header_right',
        'label' => esc_html__('Header Right On/Off', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_search',
        'label' => esc_html__('Header Search On/Off', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_header_lang',
        'label' => esc_html__('language On/Off', 'facontech'),
        'section' => 'header_top_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    // button
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_button_text',
        'label' => esc_html__('Button Text', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('Get A Quote', 'facontech'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting' => 'facontech_header_right',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];

    $fields[] = [
        'type' => 'link',
        'settings' => 'facontech_button_link',
        'label' => esc_html__('Button URL', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting' => 'facontech_header_right',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];


    // phone
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_phone_num',
        'label' => esc_html__('Phone Number', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('(786) 686 350', 'facontech'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_mail_id',
        'label' => esc_html__('Mail ID', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('info@facontech.com', 'facontech'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_address',
        'label' => esc_html__('Address', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('Moon ave, New York, 2020 NY US', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_office_hour',
        'label' => esc_html__('Office Hour', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('09:00am-6:00pm', 'facontech'),
        'priority' => 10,
    ];

    // Login
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_acc_button_text',
        'label' => esc_html__('Login', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('Login', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_acc_button_link',
        'label' => esc_html__('Account URL', 'facontech'),
        'section' => 'header_top_setting',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];

    return $fields;

}
add_filter('kirki/fields', '_header_top_fields');

/*
Header Social
 */
function _header_social_fields($fields)
{
    // header section social
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_topbar_fb_url',
        'label' => esc_html__('Facebook Url', 'facontech'),
        'section' => 'header_social',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_topbar_twitter_url',
        'label' => esc_html__('Twitter Url', 'facontech'),
        'section' => 'header_social',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_topbar_linkedin_url',
        'label' => esc_html__('Linkedin Url', 'facontech'),
        'section' => 'header_social',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_topbar_instagram_url',
        'label' => esc_html__('Instagram Url', 'facontech'),
        'section' => 'header_social',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];



    return $fields;
}
add_filter('kirki/fields', '_header_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type' => 'radio-image',
        'settings' => 'choose_default_header',
        'label' => esc_html__('Select Header Style', 'facontech'),
        'section' => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'facontech'),
        'priority' => 10,
        'multiple' => 1,
        'choices' => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3' => get_template_directory_uri() . '/inc/img/header/header-3.png'
        ],
        'default' => 'header-style-1',
    ];

    $fields[] = [
        'type' => 'image',
        'settings' => 'logo',
        'label' => esc_html__('Header Logo', 'facontech'),
        'description' => esc_html__('Upload Your Logo.', 'facontech'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/common/logo-white.png',
    ];

    $fields[] = [
        'type' => 'image',
        'settings' => 'seconday_logo',
        'label' => esc_html__('Header Secondary Logo', 'facontech'),
        'description' => esc_html__('Header Logo Black', 'facontech'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/common/logo-black.png',
    ];

    $fields[] = [
        'type' => 'image',
        'settings' => 'preloader_logo',
        'label' => esc_html__('Preloader Logo', 'facontech'),
        'description' => esc_html__('Upload Preloader Logo.', 'facontech'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/favicon.png',
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');

/*
Header Side Info
 */
function _header_side_fields($fields)
{
    // side info settings
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_side_hide',
        'label' => esc_html__('Side Info On/Off', 'facontech'),
        'section' => 'header_side_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'facontech_side_logo',
        'label' => esc_html__('Logo Side', 'facontech'),
        'description' => esc_html__('Logo Side', 'facontech'),
        'section' => 'header_side_setting',
        'default' => get_template_directory_uri() . '/assets/img/common/logo-white.png',
    ];
    $fields[] = [
        'type' => 'textarea',
        'settings' => 'facontech_extra_text',
        'label' => esc_html__('Side Description Text', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Oracle Cloud Infrastructure (OCI) AI Services is a collection of services with prebuilt machine learning models that make it easier for developers to apply AI to applications and business operations.', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'repeater',
        'label' => esc_html__('Gallery Repeater', 'facontech'),
        'section' => 'header_side_setting',
        'row_label' => [
            'type' => 'text',
            'value' => esc_html__('Client', 'facontech')
        ],
        'button_label' => esc_html__('Add New Photo', 'facontech'),
        'settings' => 'facontech_gallery',
        'fields' => [
            'image_client' => [
                'type' => 'image',
                'label' => esc_html__('Gallery Image', 'facontech'),
                'description' => esc_attr__('Upload Gallery Image', 'facontech')
            ]
        ]

    ];

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'facontech_extra_about_text',
        'label' => esc_html__('About Text', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__(' Most people focus on the results of AI. For those of us who like to look under the hood, there are
        four foundational elements to understand: categorization, classification, machine learning, and collaborative filtering.', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_extra_map_title',
        'label' => esc_html__('Map Title', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Need To Location', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'facontech_extra_map',
        'label' => esc_html__('Map Address Iframe', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd', 'facontech'),
        'priority' => 10,
    ];

    // contact
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_contact_title',
        'label' => esc_html__('Contact Title', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Contact Info', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_extra_address',
        'label' => esc_html__('Office Address', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('12/A, Mirnada City Tower, NYC', 'facontech'),
        'priority' => 10,
    ];


    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_extra_email',
        'label' => esc_html__('Email ID', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('info@weblearnbd.net', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_extra_phone',
        'label' => esc_html__('Phone Number', 'facontech'),
        'section' => 'header_side_setting',
        'default' => esc_html__('+0989 7876 9865 9', 'facontech'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    // Breadcrumb Setting
    $fields[] = [
        'type' => 'image',
        'settings' => 'breadcrumb_bg_img',
        'label' => esc_html__('Breadcrumb Background Image', 'facontech'),
        'description' => esc_html__('Breadcrumb Background Image', 'facontech'),
        'section' => 'breadcrumb_setting',
        'default' => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type' => 'color',
        'settings' => 'facontech_breadcrumb_bg_color',
        'label' => __('Breadcrumb BG Color', 'facontech'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'facontech'),
        'section' => 'breadcrumb_setting',
        'default' => '#f4f9fc',
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label' => esc_html__('Breadcrumb Info switch', 'facontech'),
        'section' => 'breadcrumb_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'breadcrumb_switch',
        'label' => esc_html__('Breadcrumb Hide', 'facontech'),
        'section' => 'breadcrumb_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_blog_btn_switch',
        'label' => esc_html__('Blog BTN On/Off', 'facontech'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_blog_cat',
        'label' => esc_html__('Blog Category Meta On/Off', 'facontech'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_blog_author',
        'label' => esc_html__('Blog Author Meta On/Off', 'facontech'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_blog_date',
        'label' => esc_html__('Blog Date Meta On/Off', 'facontech'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_blog_comments',
        'label' => esc_html__('Blog Comments Meta On/Off', 'facontech'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_blog_btn',
        'label' => esc_html__('Blog Button text', 'facontech'),
        'section' => 'blog_setting',
        'default' => esc_html__('Read More', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label' => esc_html__('Blog Title', 'facontech'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog', 'facontech'),
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label' => esc_html__('Blog Details Title', 'facontech'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog Details', 'facontech'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type' => 'radio-image',
        'settings' => 'choose_default_footer',
        'label' => esc_html__('Choose Footer Style', 'facontech'),
        'section' => 'footer_setting',
        'default' => '5',
        'placeholder' => esc_html__('Select an option...', 'facontech'),
        'priority' => 10,
        'multiple' => 1,
        'choices' => [
            'footer-style-1' => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
            'footer-style-4' => get_template_directory_uri() . '/inc/img/footer/footer-4.png',
        ],
        'default' => 'footer-style-1',
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'footer_widget_number',
        'label' => esc_html__('Widget Number', 'facontech'),
        'section' => 'footer_setting',
        'default' => '4',
        'placeholder' => esc_html__('Select an option...', 'facontech'),
        'priority' => 10,
        'multiple' => 1,
        'choices' => [
            '4' => esc_html__('Widget Number 4', 'facontech'),
            '3' => esc_html__('Widget Number 3', 'facontech'),
            '2' => esc_html__('Widget Number 2', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'image',
        'settings' => 'facontech_footer_bg',
        'label' => esc_html__('Footer Background Image.', 'facontech'),
        'description' => esc_html__('Footer Background Image.', 'facontech'),
        'section' => 'footer_setting',
    ];

    $fields[] = [
        'type' => 'color',
        'settings' => 'facontech_footer_bg_color',
        'label' => __('Footer BG Color', 'facontech'),
        'description' => esc_html__('This is a Footer bg color control.', 'facontech'),
        'section' => 'footer_setting',
        'default' => '#f4f9fc',
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'footer_style_2_switch',
        'label' => esc_html__('Footer Style 2 On/Off', 'facontech'),
        'section' => 'footer_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'footer_style_3_switch',
        'label' => esc_html__('Footer Style 3 On/Off', 'facontech'),
        'section' => 'footer_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'footer_style_4_switch',
        'label' => esc_html__('Footer Style 4 On/Off', 'facontech'),
        'section' => 'footer_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_copyright',
        'label' => esc_html__('Copy Right', 'facontech'),
        'section' => 'footer_setting',
        'default' => esc_html__('Copyright &copy; 2022 Theme_Pure. All Rights Reserved', 'facontech'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

// color
function facontech_color_fields($fields)
{
    // Color Settings
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_color_1',
        'label' => __('Theme Color 1', 'facontech'),
        'description' => esc_html__('This is a Theme color control.', 'facontech'),
        'section' => 'color_setting',
        'default' => '#3D6CE7',
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_color_2',
        'label' => __('Theme Color 2', 'facontech'),
        'description' => esc_html__('This is a Theme color control.', 'facontech'),
        'section' => 'color_setting',
        'default' => '#258E46',
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_color_3',
        'label' => __('Theme Color 3', 'facontech'),
        'description' => esc_html__('This is a Theme color control.', 'facontech'),
        'section' => 'color_setting',
        'default' => '#007A70',
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'facontech_color_fields');

// 404
function facontech_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type' => 'image',
        'settings' => 'facontech_404_bg',
        'label' => esc_html__('404 Image.', 'facontech'),
        'description' => esc_html__('404 Image.', 'facontech'),
        'section' => '404_page',
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_error_title',
        'label' => esc_html__('Not Found Title', 'facontech'),
        'section' => '404_page',
        'default' => esc_html__('Page not found', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'textarea',
        'settings' => 'facontech_error_desc',
        'label' => esc_html__('404 Description Text', 'facontech'),
        'section' => '404_page',
        'default' => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'facontech_error_link_text',
        'label' => esc_html__('404 Link Text', 'facontech'),
        'section' => '404_page',
        'default' => esc_html__('Back To Home', 'facontech'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'facontech_404_fields');

// course_settings
function facontech_learndash_fields($fields)
{

    $fields[] = [
        'type' => 'number',
        'settings' => 'facontech_learndash_post_number',
        'label' => esc_html__('Learndash Post Per page', 'facontech'),
        'section' => 'learndash_course_settings',
        'default' => 6,
        'priority' => 10,
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'facontech_learndash_order',
        'label' => esc_html__('Post Order', 'facontech'),
        'section' => 'learndash_course_settings',
        'default' => 'DESC',
        'placeholder' => esc_html__('Select an option...', 'facontech'),
        'priority' => 10,
        'multiple' => 1,
        'choices' => [
            'ASC' => esc_html__('ASC', 'facontech'),
            'DESC' => esc_html__('DESC', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_learndash_related',
        'label' => esc_html__('Show Related?', 'facontech'),
        'section' => 'learndash_course_settings',
        'default' => 1,
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    return $fields;

}

if (class_exists('SFWD_LMS')) {
    add_filter('kirki/fields', 'facontech_learndash_fields');
}


// tutor_course_settings
function facontech_tutor_course_fields($fields)
{
    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_details_author_meta_switch',
        'label' => esc_html__('Tutor Course Details Author Meta', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_details_payment_switch',
        'label' => esc_html__('Tutor Course Details Payment', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_desc_tab_switch',
        'label' => esc_html__('Tutor Course Description Tab Swicher', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_curriculum_tab_switch',
        'label' => esc_html__('Tutor Course Curriculum Tab Swicher', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_reviews_tab_switch',
        'label' => esc_html__('Tutor Course Reviews Tab Swicher', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'facontech_tutor_course_instructor_tab_switch',
        'label' => esc_html__('Tutor Course Instructor Tab Swicher', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
    ];
    return $fields;
}

if (function_exists('tutor')) {
    add_filter('kirki/fields', 'facontech_tutor_course_fields');
}

/**
 * Added Event Fields
 */
function facontech_event_fields($fields)
{
    // event settings
    $fields[] = [
        'type' => 'text',
        'settings' => 'event_btn_text',
        'label' => esc_html__('Button Text', 'facontech'),
        'section' => 'event_settings',
        'default' => esc_html__('Enroll Now', 'facontech'),
        'priority' => 10,
    ];
    $fields[] = [
        'type' => 'text',
        'settings' => 'event_btn_link',
        'label' => esc_html__('Button Link', 'facontech'),
        'section' => 'event_settings',
        'default' => esc_html__('#', 'facontech'),
        'priority' => 10,
    ];
    return $fields;
}

add_filter('kirki/fields', 'facontech_event_fields');


/**
 * Added Fields
 */
function facontech_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_body_setting',
        'label' => esc_html__('Body Font', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h_setting',
        'label' => esc_html__('Heading h1 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h2_setting',
        'label' => esc_html__('Heading h2 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h3_setting',
        'label' => esc_html__('Heading h3 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h4_setting',
        'label' => esc_html__('Heading h4 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h5_setting',
        'label' => esc_html__('Heading h5 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h6_setting',
        'label' => esc_html__('Heading h6 Fonts', 'facontech'),
        'section' => 'typo_setting',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '',
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'facontech_typo_fields');


// course_settings
function facontech_course_fields($fields)
{

    $fields[] = [
        'type' => 'radio-image',
        'settings' => 'course_style',
        'label' => esc_html__('Select Course Style', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '5',
        'placeholder' => esc_html__('Select an option...', 'facontech'),
        'priority' => 10,
        'multiple' => 1,
        'choices' => [
            'standard' => get_template_directory_uri() . '/inc/img/course/course-1.jpg',
            'course_with_sidebar' => get_template_directory_uri() . '/inc/img/course/course-2.jpg',
            'course_solid' => get_template_directory_uri() . '/inc/img/course/course-3.jpg',
        ],
        'default' => 'standard',
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'course_search_switch',
        'label' => esc_html__('Show search?', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
        'active_callback' => [
            [
                'setting' => 'course_with_sidebar',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'course_latest_post_switch',
        'label' => esc_html__('Show latest post?', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
        'active_callback' => [
            [
                'setting' => 'course_with_sidebar',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'course_category_switch',
        'label' => esc_html__('Show category filter?', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
        'active_callback' => [
            [
                'setting' => 'course_with_sidebar',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];

    $fields[] = [
        'type' => 'switch',
        'settings' => 'course_skill_switch',
        'label' => esc_html__('Show skill filter?', 'facontech'),
        'section' => 'tutor_course_settings',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'facontech'),
            'off' => esc_html__('Disable', 'facontech'),
        ],
        'active_callback' => [
            [
                'setting' => 'course_with_sidebar',
                'operator' => '==',
                'value' => true,
            ],
        ],
    ];

    return $fields;

}

add_filter('kirki/fields', 'facontech_course_fields');




/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function facontech_THEME_option($name)
{
    $value = '';
    if (class_exists('facontech')) {
        $value = Kirki::get_option(facontech_get_theme(), $name);
    }

    return apply_filters('facontech_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function facontech_get_theme()
{
    return 'facontech';
}