<?php

namespace BarrelDirectory\Includes\Carbon\Fields;

if ( ! defined( 'WPINC' ) ) {
	die;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
class Options implements Fieldset_Interface {
	function add_group() {
		Container::make( 'theme_options', 'Directory Options' )
			->add_fields( array(
				Field::make( 'text', 'crb_text', 'Text Field' ),
			) );
	}
}