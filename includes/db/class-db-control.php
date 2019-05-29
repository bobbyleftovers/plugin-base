<?php
/***
 * * @implements Db_Interface
 */

namespace BarrelDirectory\Includes\Db;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Db_Control implements Db_Interface{
	public function __construct($db_name = false) {
		if(!$db_name){
			exit();
		}
		$this->db_name = $db_name;
	}
	public function insert () {}
	public function update () {}
	public function delete () {}
	public function find () {}
	public function findAll () {}
}