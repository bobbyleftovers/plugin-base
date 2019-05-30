<?php

namespace BarrelDirectory\Includes\Api;
use WP_REST_Controller;
use WP_REST_Server;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Api_Profile extends WP_REST_Controller {

	/**
	 * @since 8.5.26
	 * @var string
	 */
	protected $namespace;

	/**
	 * @since 8.5.26
	 * @var string
	 */
	protected $profile_base = 'profile';

	public function __construct() {
		
		$this->namespace = 'bd-api/v1';
		add_action('rest_api_init', array($this, 'register_routes'));
		// add_action( 'rest_api_init', 'map_meta_fields' );
	
	}
	
	public function register_routes() {
		register_rest_route('barrel/', '/profile', array(
			'methods' => 'GET',
			'callback' => 'get_item',
		));
		/*
		register_rest_route(
			$this->namespace,
			'/' . $this->profile_base,
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_items' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
					'args'                => $this->get_collection_params(),
				),
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'create_item' ),
					'permission_callback' => array( $this, 'post_permissions_check' ),
					'args'                => $this->get_endpoint_args_for_item_schema( WP_REST_Server::CREATABLE ),
				),
				'schema' => array( $this, 'get_public_item_schema' ),
			)
		);

		register_rest_route(
			$this->namespace,
			'/' . $this->profile_base . '/(?P<id>[\d]+)',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_item' ),
					// 'permission_callback' => array( $this, 'get_item_permissions_check' ),
					'args'                => array(
						'context' => $this->get_context_param( array( 'default' => 'view' ) ),
					),
				),
				array(
					'methods'             => WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'update_item' ),
					'permission_callback' => array( $this, 'post_permissions_check' ),
					'args'                => $this->get_endpoint_args_for_item_schema( WP_REST_Server::EDITABLE ),
				),
				array(
					'methods'             => WP_REST_Server::DELETABLE,
					'callback'            => array( $this, 'delete_item' ),
					'permission_callback' => array( $this, 'delete_item_permissions_check' ),
					'args'                => array(
						'force' => array(
							'default'     => FALSE,
							'description' => __( 'Required to be true, as resource does not support trashing.', 'connections' ),
						),
					),
				),
				'schema' => array( $this, 'get_public_item_schema' ),
			)
		);*/
	}
	
	public function create_item ( $request ) {

		return;
		
	}
	
	public function get_item ( $request ) {

		return 'this is going';
		
	}
	
	public function get_items ( $request ) {

		return;
		
	}
	
	public function update_item ( $request ) {

		return;
		
	}
	
	public function delete_item ( $request ) {
	
		return;
	
	}

	public function post_permissions_check ( $request ) {
		
		if ( is_user_logged_in() ) {

			if ( 'edit' === $request['context'] &&
				( ! current_user_can( 'connections_edit_entry' ) || ! current_user_can( 'connections_edit_entry_moderated' ) )
			) {

				return new WP_Error(
					'rest_forbidden_context',
					'Permission denied. Current user does not have required capabilityies assigned.', 'connections',
					array( 'status' => rest_authorization_required_code() )
				);
			}

		} else {

			return new WP_Error(
				'rest_forbidden_context',
				'Permission denied. Login required.',
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return true;
	
	}
	
	public function get_permissions_check ( $request ) {
		
		return true;

	}
	
	public function delete_permissions_check ( $request ) {
	
		return false;
	
	}
}