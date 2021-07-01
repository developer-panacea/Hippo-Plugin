<?php
/*
Plugin Name: Hippo API Word Press Plugin
Plugin Uri:  http://localhost/wordpress
Description: This is custom Hippo API Word Press Plugin
Author: kaes sayyed
Author Uri: http://localhost/wordpress    
Version: 1.0
License: GPL v2 
*/


defined('ABSPATH') || die("direct access not allowed");

register_activation_hook(__FILE__,'hippo_register_activation_hook');

function hippo_register_activation_hook(){
	add_option("AUTH_TOKEN","YOUR AUTH TOKEN");
    add_option("API_URL","YOUR API URL");
}
register_deactivation_hook(__FILE__,'hippo_register_deactivation_hook');

function hippo_register_deactivation_hook(){
	
}

add_action('admin_menu','create_hippo_menu');

function create_hippo_menu(){
	add_menu_page(
                'Hippo Settings',//page title
                'Hippo Settings',//menu title
                'manage_options',//capability
                'hippo-settings-list',//menu slug
                'hippo_settings_list',//function
                $icon_url = '',
                $position = null 
                );
				
	add_submenu_page(
                null,//parent slug
                'Update Hippo Settings',//page title
                'Update Hippo Settings',//menu title
                'manage_options',//capability
                'hippo-settings-update',//menu slug
                'hippo_settings_update',//function
                $position = null
                );			
}



function hippo_enqueue_scripts(){
    wp_enqueue_style('bootstrap-css',plugin_dir_url(__FILE__).'css/bootstrap.min.css',array(),3.4,'all');

    wp_enqueue_script('jquery-js',plugin_dir_url(__FILE__).'js/jquery.min.js',array(),3.4,true);
    wp_enqueue_script('bootstrap-js',plugin_dir_url(__FILE__).'js/bootstrap.min.js',array(),3.4,true);
   

}
add_action('admin_enqueue_scripts','hippo_enqueue_scripts');



define('HIPPO_SETTINGS',plugin_dir_path(__FILE__));

require_once HIPPO_SETTINGS.'hippo-list.php';
require_once HIPPO_SETTINGS.'hippo-update.php';
require_once HIPPO_SETTINGS.'includes/shortcode.php';


