<?php
class TSServicesPost
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'services_template_include' ) );
	}

	public function services_template_include( $template ) {
		if ( is_singular( 'services' ) ) {
			return $this->get_template( 'single-services.php');
		}
		return $template;
	}

	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		}
		else {
			$file = TSCORE_ADDONS_DIR . '/include/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}


	public function register_custom_post_type() {
		// $medidove_mem_slug = get_theme_mod('medidove_mem_slug','member');
		$labels = array(
			'name'                  => esc_html_x( 'Services', 'Post Type General Name', 'TScore' ),
			'singular_name'         => esc_html_x( 'Service', 'Post Type Singular Name', 'TScore' ),
			'menu_name'             => esc_html__( 'Service', 'TScore' ),
			'name_admin_bar'        => esc_html__( 'Service', 'TScore' ),
			'archives'              => esc_html__( 'Item Archives', 'TScore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'TScore' ),
			'all_items'             => esc_html__( 'All Items', 'TScore' ),
			'add_new_item'          => esc_html__( 'Add New Service', 'TScore' ),
			'add_new'               => esc_html__( 'Add New', 'TScore' ),
			'new_item'              => esc_html__( 'New Item', 'TScore' ),
			'edit_item'             => esc_html__( 'Edit Item', 'TScore' ),
			'update_item'           => esc_html__( 'Update Item', 'TScore' ),
			'view_item'             => esc_html__( 'View Item', 'TScore' ),
			'search_items'          => esc_html__( 'Search Item', 'TScore' ),
			'not_found'             => esc_html__( 'Not found', 'TScore' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'TScore' ),
			'featured_image'        => esc_html__( 'Featured Image', 'TScore' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'TScore' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'TScore' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'TScore' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'TScore' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'TScore' ),
			'items_list'            => esc_html__( 'Items list', 'TScore' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'TScore' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'TScore' ),
		);

		$args   = array(
			'label'                 => esc_html__( 'Service', 'TScore' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-shield',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'services', $args );
	}

	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Service Categories', 'Taxonomy General Name', 'TScore' ),
			'singular_name'              => esc_html_x( 'Service Categories', 'Taxonomy Singular Name', 'TScore' ),
			'menu_name'                  => esc_html__( 'Service Categories', 'TScore' ),
			'all_items'                  => esc_html__( 'All Service Category', 'TScore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'TScore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'TScore' ),
			'new_item_name'              => esc_html__( 'New Service Category Name', 'TScore' ),
			'add_new_item'               => esc_html__( 'Add New Service Category', 'TScore' ),
			'edit_item'                  => esc_html__( 'Edit Service Category', 'TScore' ),
			'update_item'                => esc_html__( 'Update Service Category', 'TScore' ),
			'view_item'                  => esc_html__( 'View Service Category', 'TScore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'TScore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'TScore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'TScore' ),
			'popular_items'              => esc_html__( 'Popular Service Category', 'TScore' ),
			'search_items'               => esc_html__( 'Search Service Category', 'TScore' ),
			'not_found'                  => esc_html__( 'Not Found', 'TScore' ),
			'no_terms'                   => esc_html__( 'No Service Category', 'TScore' ),
			'items_list'                 => esc_html__( 'Service Category list', 'TScore' ),
			'items_list_navigation'      => esc_html__( 'Service Category list navigation', 'TScore' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy('services-cat','services', $args );
	}

}

new TSServicesPost();