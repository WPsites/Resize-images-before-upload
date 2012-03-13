<?php
/*
Plugin Name: Resize images before upload
Plugin URI: http://www.wpsites.co.uk/
Description: Resize your images before they are uploaded to the server, no need to use image editing software. You can drag+drop images straight from your digital camera right into WordPress
Version: 1.0
Author: Simon Dunton
Author URI: http://www.wpsites.co.uk
License: GPL3
*/



/**
 * @author simon@wpsites.co.uk
 */
class WP_Resize_Images_Before_Upload {
		
	/**
	 * The constructor 
	 * @return void
	 */
	function __construct() {

            add_filter('plupload_init', array($this,'plupload_init'),10,1);
	    
	    add_action('post-upload-ui', array($this,'rbu_show_option'),10);

	}


	
	function rbu_show_option(){		
		echo "<p><input name='image_resize' id='image_resize' type='checkbox' value='HellYea'  /> " . __('Resize images before uploading them to the server.') . "<em>" . __('They will be resized to the large image size, as specified in your media settings') . "</em></p>";
		echo "<script>jQuery(function($){    if (uploader.settings.resize) jQuery('#image_resize').click();  });</script>";
	}

        function plupload_init($plupload_init_array){
             unset($plupload_init_array['max_file_size']);
            return $plupload_init_array;
        }
	
}

/**
 * Register the plugin
 */
add_action("init", create_function('', 'new WP_Resize_Images_Before_Upload();'));

// Ending PHP tag is not needed, it will only increase the risk of white space 
// being sent to the browser before any HTTP headers.