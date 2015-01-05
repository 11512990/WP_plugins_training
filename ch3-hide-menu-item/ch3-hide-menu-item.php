<?php
/*
Plugin Name: Chapter 3 – Hide Menu Item
Plugin URI:
Description: create few level menu
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/
class Ch3hmi_hide_menu_item{
  function __construct(){
    add_action( 'admin_menu', array($this, 'ch3hmi_hide_menu_item') );
  }
  
  function ch3hmi_hide_menu_item() {
    remove_menu_page( 'link-manager.php' );
    
    //to hide the Permalinks submenu item, found under the Settings menu
    remove_submenu_page( 'options-general.php',
    'options-permalink.php' );
  }
}
?>