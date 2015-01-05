<?php
/*
Plugin Name: Chapter 3 – Multi-Level menu
Plugin URI:
Description: create few level menu
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/
class Ch3mlm_admin_menu{
  function __construct(){
    add_action( 'admin_menu', array($this,'ch3mlm_admin_menu') );
  }
  
  function ch3mlm_admin_menu() {
    // Create top-level menu item
    add_menu_page( 'My Complex Plugin Configuration Page',
    'My Complex Plugin', 'manage_options',
    'ch3mlm-main-menu', 'ch3mlm_my_complex_main',
    plugins_url( 'myplugin.png', __FILE__ ) );
    // Create a sub-menu under the top-level menu
    add_submenu_page( 'ch3mlm-main-menu',
    'My Complex Menu Sub-Config Page', 'Sub-Config Page',
    'manage_options', 'ch3mlm-sub-menu',
    'ch3mlm_my_complex_submenu' );
  }
}
$ch3mlm_admin_menu= new Ch3mlm_admin_menu();
?>