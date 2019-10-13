<?php
/*
* @package PopupAlert
*/

/**
 * Plugin Name: PopupAlert
 * Plugin URI: http://www.mywebsite.com/popup-alert-modal
 * Description: Popup Alert Plugin for pages, posts and other selected cpt.
 * Version: 1.0
 * Author: Milenko Kalajdzic
 * Author URI: http://www.mywebsite.com
 */


defined('ABSPATH') or die('BLA BLA BLA');


class PopupAlert
{
	
	public $plugin;
	
	function __construct() {
		
		add_action( 'init', array( $this, 'custom_post_type'));
		add_action( 'init', array( $this, 'custom_post_type_test'));
		add_action( 'init', array( $this, 'custom_post_type_team'));
		add_action( 'init', array( $this, 'custom_post_type_company'));
		
		$this->plugin = plugin_basename(__FILE__);
	}
	
	function activate() {
		
		$this->custom_post_type();
		
		flush_rewrite_rules();
	}
	
	
	function deactivate() {
		
		
	}
	
	function register() {
		add_action('admin_menu', array($this, 'add_admin_pages'));
		
		add_filter("plugin_action_links_$this->plugin" , array($this, 'settings_link'));
		
		//echo $this->plugin;
		
		add_action('wp_enqueue_scripts', array( $this, 'enqueue' ));
		
		
		add_action( 'the_content', array($this,'show_popup' ));
			
	}
	

	
	function settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=popup_alert">Settings</a>';
		array_push($links, $settings_link);
		return $links;
		
	}
	
	function add_admin_pages() {
		add_menu_page('Popup Alert Modal', 'Popup Alert Modal', 'manage_options', 'popup_alert', array($this, 'admin_index'), 'dashicons-store', null);
		
		
	}
	
	function admin_index() {
		require_once plugin_dir_path(__FILE__). '/templates/index.php';
	}
	
	
	function custom_post_type() {
		
		register_post_type('book', ['public' => 'true', 'label' => 'Books', 'show_in_menu' => 'true', 'menu_position' => '10', 'menu_name' => 'books', null]);
		
	}
	
	function custom_post_type_test() {
		
		
		register_post_type('test', ['public' => 'true', 'label' => 'Testovi', 'show_in_menu' => 'true']);
	}
	
	function custom_post_type_team() {
		
		
		register_post_type('team', ['public' => 'true', 'label' => 'Team', 'show_in_menu' => 'true']);
	}
	
	function custom_post_type_company() {
		
		
		register_post_type('company', ['public' => 'true', 'label' => 'Companies', 'show_in_menu' => 'true']);
	}
	
	
	function enqueue() {
		
		wp_enqueue_style('mystyle', plugins_url('/assets/mystyle.css', __FILE__));
		wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__));
	}
	
	
	function show_popup ( $content ) {
	
	if ( is_singular( 'book' ) ) {

    return $content .= '<div class="box modal">
	<a class="button" href="#popup1">Let me Pop up</a>
</div>

<div id="popup1" class="overlay">
	<div class="popup ">
		<h2>Here i am</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Thank to pop me out of that button, but now i am done so you can close this window.
		</div>
	</div>
</div>';
}
	
else {return $content; }}
	

	
}


if(class_exists('PopupAlert')) {
	
	$popupAlert = new PopupAlert();
	$popupAlert->register();
}



register_activation_hook(__FILE__, array( $popupAlert, 'activate'));

register_deactivation_hook(__FILE__, array( $popupAlert, 'deactivate'));

