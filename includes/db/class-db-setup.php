<?php

namespace BarrelDirectory\Includes\Db;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Db_Setup {
	public function __construct() {
		$this->register_db_actions();
	}
	public function register_db_actions () {
		register_activation_hook(__FILE__, array($this, 'on_activation'));
		register_deactivation_hook(__FILE__, array($this, 'on_deactivation'));
		register_uninstall_hook(__FILE__, array($this, 'on_uninstall'));
	}
	public function on_activation () {
		// Set up tables
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$profile_name = $wpdb->prefix . 'barrel_directory_profiles';
		$location_name = $wpdb->prefix . 'barrel_directory_locations';

		$sql = "CREATE TABLE $profile_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			f_name string NOT NULL,
			l_name string NOT NULL,
			profile_body LONGTEXT,
			adress_street string,
			adress_city string,
			adress_state string,
			address_zip string,
			location_id mediumint(9),
			UNIQUE KEY id (id)
		)
		CREATE TABLE $location_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			f_name string NOT NULL,
			l_name string NOT NULL,
			profile_body LONGTEXT,
			adress_street string,
			adress_city string,
			adress_state string,
			address_zip string,
			profile_ids mediumint(9),

			UNIQUE KEY id (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	public function on_deactivation () {
			// Testing
			on_uninstall ();
	}

	public function on_uninstall () {

		global $wpdb;
		$profile_name = $wpdb->prefix . 'barrel_directory_profiles';
		$location_name = $wpdb->prefix . 'barrel_directory_profiles';
		$sql = "DROP TABLE IF EXISTS $profile_name; DROP TABLE IF EXISTS $location_name";
		$wpdb->query($sql);
		// delete_option('e34s_time_card_version');
	}
}