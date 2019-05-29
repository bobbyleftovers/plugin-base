<?php

namespace BarrelDirectory\Includes\Shortcode;

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Shortcode {
    public function __construct () {
        add_shortcode( 'directory', array( $this, 'display_directory' ) );
        add_shortcode( 'directory-profile', array( $this, 'display_profile' ) );
        add_shortcode( 'profile-editor', array( $this, 'display_profile_editor' ) );
    }

    function display_directory($atts = false){
        $this->queue_scripts();
        ob_start();?>
        <div id="profile-directory">Dir<directory /></div><?php
        return ob_get_clean();
    
    }

    function display_profile($atts = false){
        $this->queue_scripts();
        ob_start();
        if(isset($atts['id'])){?>
            <div id="profile" data-id="<?=$atts['id']?>">Pro<single-profile /></div><?php
        } else {?>
            <div>No ID provided</div><?php
        }
        return ob_get_clean();
    
    }

    function display_profile_editor(){
        $this->queue_scripts();
        $current_user = \get_current_user_id();
        ob_start();
        echo $current_user;
        if($current_user){?>
            <div id="profile-editor"><profile-editor />Go for it</div><?php
        } else {?>
            <div>You must be logged in to do this</div><?php
        }
        return ob_get_clean();
    
    }

    function queue_scripts () {
        wp_enqueue_script('directory_vue_js',site_url().'/wp-content/plugins/barrel-directory/dist/bundle.js', [], false, true);
    }
}