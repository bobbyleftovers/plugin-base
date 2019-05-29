<?php

namespace BarrelDirectory\Includes\Profile;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Profile {
	public function __construct () {
		// 
	}

	public function find ( $request ) {
		$atts = array(
			'id' => (int) $this->$request['id'],
		);

		$result = $this->get_entries( $this->$request, $atts );

		if ( empty( $atts['id'] ) || empty( $result ) ) {
			return new WP_Error( 'rest_entry_invalid_id', 'Invalid profile ID.', array( 'status' => 404 ) );
		}

		$entry = new cnEntry( $result[0] );

		$data     = $this->prepare_item_for_response( $entry, $this->$request );
		$response = rest_ensure_response( $data );

		return $response;
	}

	public function findAll ( $request ) {
		$atts = array(
			'id' => (int) $this->$request['id'],
		);

		$result = $this->get_entries( $this->$request, $atts );

		if ( empty( $atts['id'] ) || empty( $result ) ) {
			return new WP_Error( 'rest_entry_invalid_id', 'Invalid profile ID.', array( 'status' => 404 ) );
		}

		$entry = new cnEntry( $result );

		$data     = $this->prepare_item_for_response( $entry, $this->$request );
		$response = rest_ensure_response( $data );

		return $response;
	}

	public function create ( $request ) {
		// 
	}

	public function edit ( $request ) {
		// 
	}

	public function update ( $request ) {
		// 
	}

	public function delete ( $request ) {
		// 
	}
}