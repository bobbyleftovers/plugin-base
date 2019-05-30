<?php

namespace BarrelDirectory\Includes\Cpt;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Cpt {
	public function __construct () {
		add_action( 'init', array($this,'cpts'), 0 );
		// add_action('add_meta_boxes', array($this,'add_custom_box'));
	}

	// Studio CPT
	public function cpts() {
		$loc_labels = array(
			'name'                => 'Studios',
			'singular_name'       => 'Studio',
			'menu_name'           => 'Studio Directory',
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
			'description'         => 'Studios for MVL',
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
		$post_id = $object['id'];

		$meta = [];
		// $style = [];
		
		// Color, etc
		// $style['map']['inactive'] = carbon_get_post_meta($post_id, 'state_inactive_color');
		// $style['map']['initial'] = carbon_get_post_meta($post_id, 'state_fill_color');
		// $style['map']['hover'] = carbon_get_post_meta($post_id, 'state_hover_color');
		// $style['map']['clicked'] = carbon_get_post_meta($post_id, 'state_selected_color');
		// $style['map']['borders'] = carbon_get_post_meta($post_id, 'state_border_color');
		// $style['dataViewer']['placeholderHeading'] = carbon_get_post_meta($post_id, 'data_empty_heading');
		// $style['dataViewer']['data_label_color'] = carbon_get_post_meta($post_id, 'data_label_color');
		// $style['dataViewer']['data_border_color'] = carbon_get_post_meta($post_id, 'data_border_color');
		// $meta['style'] = $style;

		// data
		// $meta['states_array'] = carbon_get_post_meta( $post_id, 'states_array' );
		// $meta['show_dc'] = carbon_get_post_meta($post_id, 'show_dc');
		// $meta['show_small_state_icons'] = carbon_get_post_meta($post_id, 'show_small_state_icons');
		// $meta['has_csv'] = carbon_get_post_meta($post_id, 'has_csv');
		// $meta['map_csv'] = carbon_get_post_meta($post_id, 'map_csv');
		// $meta['has_downloads'] = carbon_get_post_meta($post_id, 'has_downloads');
		// $meta['show_inactive'] = carbon_get_post_meta($post_id, 'show_inactive');
		// $meta['post_meta'] = get_post_meta($post_id);
	
		//return the post meta
		return $meta;	
	}
}