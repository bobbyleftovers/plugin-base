<?php

namespace BarrelDirectory\Includes\Carbon;

use BarrelDirectory\Includes\Carbon\Fields\Members;
use BarrelDirectory\Includes\Carbon\Fields\Studios;
use BarrelDirectory\Includes\Carbon\Fields\Options;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Carbon {
	public function __construct () {
		add_action( 'after_setup_theme', array($this, 'carbon_init' ));
		add_action( 'carbon_fields_register_fields', array($this, 'register_groups' ));
	}
	public function init(){}

	public function register_groups () {
		Members::add_group();
		Studios::add_group();
		Options::add_group();
	}
	
	public function carbon_init() {
    require_once( BARREL_DIRECTORY_PATH . '/vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();
	}

}