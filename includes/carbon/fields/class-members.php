<?php

namespace BarrelDirectory\Includes\Carbon\Fields;

if ( ! defined( 'WPINC' ) ) {
	die;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Disable Admin-only access to user meta
add_filter( 'carbon_fields_user_meta_container_admin_only_access', '__return_false' );

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
		
		$social_types = [
			'facebook' => 'Facebook',
			'instagram' => 'Instagram',
		];

    Container::make( 'user_meta', 'Teacher Info' )
			// ->where('post_type', '=', 'member')
    
			->add_fields(array(
				// setup fields
				// Field::make( 'text', 'f_name', 'First Name' ),
				// Field::make( 'text', 'l_name', 'Last Name' ),
				Field::make( 'text', 'job_title', 'Job Title' ),
				Field::make( 'checkbox', 'lyt_certified', 'LYT Certified?' ),
				// Field::make( 'textarea', 'about', 'About' ),
				Field::make( 'text', 'address_street', 'Street' ),
				Field::make( 'text', 'address_supplemental', 'Additional Address Info' ),
				Field::make( 'text', 'address_city', 'City' ),
				Field::make( 'select', 'address_state', 'State' )
					->add_options( $states ),
				Field::make( 'text', 'address_zip', 'Postal Code' ),
				// Field::make( 'text', 'email', 'Email' ),
				Field::make( 'text', 'phone', 'Phone' ),
				// Field::make( 'text', 'website', 'Website' ),
				Field::make( 'complex', 'social', 'Social Media' )
					->add_fields( array(
						Field::make( 'select', 'media_type', 'Type' )
							->add_options( $social_types ),
						Field::make( 'text', 'profile_url', 'Profile URL' )
					)),
				Field::make( 'complex', 'images', 'Images' )
					->add_fields( array(
						Field::make( 'file', 'image', 'Image' )
						->set_value_type( 'url' )
					))
			));
	}
}