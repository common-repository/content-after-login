<?php

/**
 * Plugin Name: Content visibility manager
 * Description: Hide or show content for vistors.
 * Version: 1.5.0
 * Author: Kristaps Muižnieks
 */
	// aktivizētājs 
	if ( ! defined( 'ABSPATH' ) ) exit;
	 
	add_action( 'admin_menu', 'cvm_info' );
	add_shortcode( 'cvm', 'cvm_content' );
	 function cvm_info() {
		add_options_page( 'CVM options','Content visibility manager','manage_options','cvm_main','cvm_main');
		 
	}
	function cvm_content($atts = [], $saturs = null){
		 
					if ((int)($atts['guest']) == 1){
						if (!is_user_logged_in()){
							return $saturs;
						}else{
							
						}
						 
					}else if ( is_user_logged_in() ) {
					 return $saturs;
					}else if (sanitize_text_field($atts['message']) != ''){
						return '<i>'.$atts['message'].'</i>';
					}else{
						
					}
		 
	}
	function cvm_main(){

		echo '
			<div class="postbox" style="max-width:50%; text-align:center">
			<h2 class="hndle ui-sortable-handle"><span>Show content after login</span></h2>
			<div class="inside">
			No settings simply put you data inside tags. <BR>
			
			<b>  [cvm]  Content only for logged in users   [/cvm] <br>
			<b>  [cvm message="Im message while hidden content"]   message -> shows message instead of blank space    [/cvm] <br>
			<b>  [cvm guest=1 ]   Content only for guests.	[/cvm] <br>
			</div>
			</div>
			 
		
		';
		
	}
?>
