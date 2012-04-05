<?php
/*
Plugin Name: Resize images before upload
Plugin URI: https://github.com/WPsites/Resize-images-before-upload
Description: Resize your images before they are uploaded to the server, no need to use image editing software. You can drag+drop images straight from your digital camera right into WordPress
Version: 0.4
Author: Simon @ WPsites
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
	    
	    
	    add_action('admin_init', array($this,'admin_init_settings'));

	}


	
	function rbu_show_option(){
		$quality =  $this->get_resize_quality() ;
		echo "<p><input name='image_resize' id='image_resize' type='checkbox' value='HellYea'  /> " . __('Resize images before uploading them to the server.') . " " . __('Images will be resized to the large image dimensions, as specified in your media settings') . "</p>";
		echo "<script> jQuery(window).load(function($){
		
		jQuery('#image_resize').click();
		jQuery('.max-upload-size').css('display', 'none');
		
		uploader.settings['resize'] = { width: resize_width, height: resize_height, quality: ${quality} };

		
			jQuery('#image_resize').click(function(event){
				if (jQuery('#image_resize').is(':checked')){
					jQuery('.max-upload-size').css('display', 'none');
					//uploader.settings['resize'] = { width: resize_width, height: resize_height, quality: ${quality} };
				}else{
					jQuery('.max-upload-size').css('display', 'inline');
				}
				return true;
			});
			
		//flash uploader seems to need an extra nudge with the resize settings
		jQuery('div.plupload.flash').load(function($){
			uploader.settings['resize'] = { width: resize_width, height: resize_height, quality: ${quality} };
		});	
			
		
		});</script>";
	}

        function plupload_init($plupload_init_array){
            //remove max file size
             unset($plupload_init_array['max_file_size']);
             
             //change runtime if needed for resize
             //'runtimes' => 'html5,silverlight,flash,html4',
	     if (! preg_match("#Firefox|Chrome#", $_SERVER['HTTP_USER_AGENT']) ){
		 $plupload_init_array['runtimes'] = "flash";
	     }
            
            return $plupload_init_array;
        }
	
	// Register and define the settings
	function admin_init_settings(){
		
		//create settings section
		add_settings_section('rbu_media_settings_section',
				'Resize before upload',
				array($this,'media_settings_section_callback_function'),
				'media');
		
		// settings, put it in our new section
		add_settings_field('rbu_resize_quality',
			'Resize quality',
			array($this,'resize_quality_callback_function'),
			'media',
			'rbu_media_settings_section');
		
		// Register our setting so that $_POST handling is done for us and
		register_setting('media',
				 'rbu_resize_quality',
				 array($this,'resize_quality_validate_input') );
	
	}
	
	function media_settings_section_callback_function(){
		//output nothing at this stage.
	}
	
	function resize_quality_callback_function(){
		echo '<input name="rbu_resize_quality" id="rbu_resize_quality" type="text" value="'. $this->get_resize_quality() .'" class="small-text" /> <em class="description">1 - 100   (a low quality value will result in a considerably smaller file size and lower quality images - 80 is optimum)</em>';
	}
	
	function resize_quality_validate_input($quality){
		
		$quality = absint( $quality ); //validate
		
		if ($quality > 0 && $quality < 101){
			return $quality;
		}else{
			add_settings_error(
				'rbu_resize_quality',           // setting title
				'rbu_resize_quality_error',            // error ID
				'Invalid resize quality, a value between 1-100 is required -  so a default value of 80 has been set.',   // error message
				'error'                        // type of message
			);
			return 80;
		}
		
	}
	
	function get_resize_quality(){
		
		//get quality out of settings
		$quality = get_option('rbu_resize_quality');
		
		//return quality or default setting 
		if ($quality > 0 && $quality < 101){
			return $quality;
		}else{
			return 80;
		}
	}
	
}

/**
 * Register the plugin
 */
add_action("init", create_function('', 'new WP_Resize_Images_Before_Upload();'));

// Ending PHP tag is not needed, it will only increase the risk of white space 
// being sent to the browser before any HTTP headers.