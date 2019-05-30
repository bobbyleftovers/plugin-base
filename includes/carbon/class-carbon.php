<?php

namespace BarrelDirectory\Includes\Carbon;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Carbon {
	public function __construct () {
		self::register_groups();
	}

	public function register_groups () {
		require_once(__DIR__ . '/fields/test-group.php');
	}
}