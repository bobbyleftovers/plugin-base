<?php

namespace BarrelDirectory\Includes\Carbon\Fields;

if ( ! defined( 'WPINC' ) ) {
	die;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
class Members implements Fieldset_Interface {
	function add_group() {

    $states = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];

    Container::make( 'post_meta', 'Map Setup' )
			->where('post_type', '=', 'member')
    
			->add_tab('Map', array(
				// setup fields
				Field::make( 'checkbox', 'show_dc', 'Show DC' )
					->set_option_value( 'false' ),
				Field::make( 'checkbox', 'show_small_state_icons', 'Show Icons for small states and districts' )
					->set_option_value( 'false' ),
			));

			/*->add_tab('Viewer Window', array(
				Field::make( 'text', 'data_empty_heading', 'Window Heading (When no state is selected)' )
					->set_default_value( 'CLICK A STATE TO VIEW DATA' ),
				Field::make( 'color', 'data_heading_color', 'Heading Color' )
					->set_default_value( '#444444' ),
					
				// spreadsheet? (show csv uploader)
				Field::make( 'checkbox', 'has_csv', 'Use CSV Data?' )
					->set_option_value( 'false' ),
				Field::make( 'file', 'map_csv', 'CSV File')
					// ->set_type( 'csv' )
					->set_value_type( 'url' )
					->set_conditional_logic( array(
						array(
							'field' => 'has_csv',
							'value' => true,
					)),

				// download? (show state selector/state data uploader)
				Field::make( 'checkbox', 'has_downloads', 'Use Per-state Downloads' )
					->set_option_value( 'false' )
					->set_conditional_logic( array(
						array(
							'field' => 'has_csv',
							'value' => false,
						)
				)),
				Field::make( 'complex', 'states_array', 'States To Add' )
					->add_fields( array(
						Field::make( 'select', 'state', 'Select a State' )
							->add_options( $states ),
						Field::make( 'complex', 'state_meta', 'Custom State Data' )
							->add_fields( array(
								Field::make( 'checkbox', 'is_download', 'Add File? (default is a link)' )
									->set_option_value( 'false' ),
								Field::make( 'text', 'array_item_label', 'Item Header'),
								Field::make( 'file', 'state_download', 'Downloadable File')
									->set_value_type( 'url' )
									->set_conditional_logic( array(
										array(
											'field' => 'is_download',
											'value' => true,
										)
									)),
								Field::make( 'text', 'array_item_data', 'Item Copy')
							))
					))
					->set_conditional_logic( array(
						array(
							'field' => 'has_downloads',
							'value' => true,
						)
					))
			)));*/
	}
}