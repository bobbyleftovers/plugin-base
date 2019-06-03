<?php

namespace BarrelDirectory\Includes\Db;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Db_Setup {
	public function __construct() {
		// register_activation_hook(__FILE__, array($this, 'on_activation'));
		// register_deactivation_hook(__FILE__, array($this, 'on_deactivation'));
		// register_uninstall_hook(__FILE__, array($this, 'on_uninstall'));
	}

	public function on_activation () {
		// Set up tables
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$profile_name = $wpdb->prefix . ENTRY_TABLE_NAME;

		$sql = "CREATE TABLE $profile_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			studio_id mediumint(9) NOT NULL,
			user_id mediumint(9) NOT NULL,
			f_name TINYTEXT NOT NULL,
			l_name TINYTEXT NOT NULL,
			about MEDIUMTEXT,
			studio_name TINYTEXT,
			address_street TINYTEXT,
			address_supplemental TEXT,
			address_city TINYTEXT,
			address_state TINYTEXT,
			address_zip TINYTEXT,
			email TINYTEXT,
			phone TINYTEXT,
			website TEXT,
			social TEXT,
			images TEXT,
			lyt_certified BOOl,
			lyt_teachers TEXT,
			job_title TINYTEXT,
			current_studio TEXT,
			completed_trainings TEXT,
			additional_hours TEXT,
			entry_type TINYTEXT,
			PRIMARY KEY  id (id)
		) $charset_collate;";
		dbDelta( $sql );

	}

	public function on_deactivation () {}

	public function on_uninstall () {
		global $wpdb;
		$profile_name = $wpdb->prefix . ENTRY_TABLE_NAME;
		$sql = "DROP TABLE IF EXISTS $profile_name;";
		$wpdb->query($sql);
	}
}