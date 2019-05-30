<?php

namespace BarrelDirectory\Includes\Carbon\Fields;

if ( ! defined( 'WPINC' ) ) {
	die;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
class Studios {
	function add_group() {

    Container::make( 'post_meta', 'Map Setup' )
			->where('post_type', '=', 'studio')
    
			->add_tab('Map', array(
				// setup fields
				Field::make( 'checkbox', 'show_dc', 'Show DC' )
					->set_option_value( 'false' ),
				Field::make( 'checkbox', 'show_small_state_icons', 'Show Icons for small states and districts' )
					->set_option_value( 'false' ),
			));
	}
}