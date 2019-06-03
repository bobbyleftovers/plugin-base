<?php

namespace BarrelDirectory\Includes\Cpt;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Cpt {
	public function __construct () {
		add_action( 'init', array($this, 'cpts'), 0 );
		add_action( 'init', array($this, 'taxonomies'), 0 );
		// add_action('add_meta_boxes', array($this,'add_custom_box'));
	}

	// Add CPTs
	public function cpts() {
		$loc_labels = array(
			'name'                => 'Studios',
			'singular_name'       => 'Studio',
			'menu_name'           => 'LYT Studio Directory',
			'parent_item_colon'   => 'Parent Item:',
			'all_items'           => 'All Studios',
			'view_item'           => 'View Item',
			'add_new_item'        => 'Add New Studio',
			'add_new'             => 'Add New',
			'edit_item'           => 'Edit Studio',
			'update_item'         => 'Update Studio',
			'search_items'        => 'Search Studios',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$loc_rewrite = array(
			'slug'                => 'studio',
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$loc_args = array(
			'label'               => 'studio',
			'description'         => 'LYT-Certified Studios',
			'labels'              => $loc_labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 9,
					'menu_icon'           => '',
			'can_export'          => false,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'rewrite'             => $loc_rewrite,
					'capability_type'     => 'page',
					'show_in_rest'       => true,
		);
		register_post_type( 'studio', $loc_args );

		$mem_labels = array(
			'name'                => 'Members',
			'singular_name'       => 'Member',
			'menu_name'           => 'Member Directory',
			'parent_item_colon'   => 'Parent Item:',
			'all_items'           => 'All Members',
			'view_item'           => 'View Item',
			'add_new_item'        => 'Add New Member',
			'add_new'             => 'Add New',
			'edit_item'           => 'Edit Member',
			'update_item'         => 'Update Member',
			'search_items'        => 'Search Members',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$mem_rewrite = array(
			'slug'                => 'member',
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$mem_args = array(
			'label'               => 'member',
			'description'         => 'Members at MVL',
			'labels'              => $mem_labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 9,
					'menu_icon'           => '',
			'can_export'          => false,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'rewrite'             => $mem_rewrite,
					'capability_type'     => 'page',
					'show_in_rest'       => true,
		);
		register_post_type( 'member', $mem_args );
	}

	// Add taxonomies
	public function taxonomies() {
		// Languages
		$lang_labels = array(
			'name'                       => _x( 'Languages', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Language', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Languages', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$lang_args = array(
			'labels'                     => $lang_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'language', [ 'studio', 'member' ], $lang_args );

		// Certifications
		$cert_labels = array(
			'name'                       => _x( 'Certifications', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Certification', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Certifications', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$cert_args = array(
			'labels'                     => $cert_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'certification', [ 'studio', 'member' ], $cert_args );

		// Job Titles?
		$cert_labels = array(
			'name'                       => _x( 'Job Titles', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Job Title', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Jobs', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$cert_args = array(
			'labels'                     => $cert_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'job_title', [ 'studio', 'member' ], $cert_args );

	}

	// Add meta boxes
	function add_custom_box() {
		add_meta_box(
			'map_shortcode_box',		// Unique ID
			'Add to Any Post',			// Box title
			'member_shortcode_box_html',	// Content callback, must be of type callable
			'member'	                   	// Post type
		);
	}
	
	function member_shortcode_box_html( $object ) {
		//get the id of the post object array
		// $post_id = $object['id'];

		// $meta = [];
		// $style = [];
		
		// Color, etc
		// $style['map']['clicked'] = carbon_get_post_meta($post_id, 'state_selected_color');
		// $style['map']['borders'] = carbon_get_post_meta($post_id, 'state_border_color');
		// $meta['style'] = $style;

		// data
		// $meta['map_csv'] = carbon_get_post_meta($post_id, 'map_csv');
		// $meta['has_downloads'] = carbon_get_post_meta($post_id, 'has_downloads');
		// $meta['show_inactive'] = carbon_get_post_meta($post_id, 'show_inactive');
		// $meta['post_meta'] = get_post_meta($post_id);
	
		//return the post meta
		return $meta;	
	}
}