<?php
class TSProjecTSost
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'portfolio_template_include' ) );
	}

	public function portfolio_template_include( $template ) {
		if ( is_singular( 'portfolio' ) ) {
			return $this->get_template( 'single-portfolio.php');
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
			'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'TScore' ),
			'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'TScore' ),
			'menu_name'             => esc_html__( 'Portfolio', 'TScore' ),
			'name_admin_bar'        => esc_html__( 'Portfolio', 'TScore' ),
			'archives'              => esc_html__( 'Item Archives', 'TScore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'TScore' ),
			'all_items'             => esc_html__( 'All Items', 'TScore' ),
			'add_new_item'          => esc_html__( 'Add New Portfolio', 'TScore' ),
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
			'label'                 => esc_html__( 'Portfolio', 'TScore' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'portfolio', $args );
	}

	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Portfolio Categories', 'Taxonomy General Name', 'TScore' ),
			'singular_name'              => esc_html_x( 'Portfolio Categories', 'Taxonomy Singular Name', 'TScore' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'TScore' ),
			'all_items'                  => esc_html__( 'All Portfolio Category', 'TScore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'TScore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'TScore' ),
			'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'TScore' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'TScore' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'TScore' ),
			'update_item'                => esc_html__( 'Update Portfolio Category', 'TScore' ),
			'view_item'                  => esc_html__( 'View Portfolio Category', 'TScore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'TScore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'TScore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'TScore' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Category', 'TScore' ),
			'search_items'               => esc_html__( 'Search Portfolio Category', 'TScore' ),
			'not_found'                  => esc_html__( 'Not Found', 'TScore' ),
			'no_terms'                   => esc_html__( 'No Portfolio Category', 'TScore' ),
			'items_list'                 => esc_html__( 'Portfolio Category list', 'TScore' ),
			'items_list_navigation'      => esc_html__( 'Portfolio Category list navigation', 'TScore' ),
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

		register_taxonomy('portfolio-cat','portfolio', $args );
	}

}

new TSProjecTSost();