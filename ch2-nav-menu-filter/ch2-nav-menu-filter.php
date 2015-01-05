<?php
/*
Plugin Name: Chapter 2 – Nav Menu Filter
Plugin URI:
Description: wi will hide some menu item from unregistered users
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/


add_filter( 'wp_nav_menu_objects',
'ch2nmf_new_nav_menu_items', 10, 2 );

function ch2nmf_new_nav_menu_items( $sorted_menu_items, $args) {
// Check if used is logged in, continue if not logged
if ( is_user_logged_in() == FALSE ) {
        // Loop through all menu items received
        // Place each item's key in $key variable
        //print_r( $sorted_menu_items );
  foreach ( $sorted_menu_items as $key => $sorted_menu_item ) {
         // Check if menu item title matches search string
    if ( $sorted_menu_item->title == "Private Area" ) {
           // Remove item from menu array if found using
           // item key
      unset( $sorted_menu_items[ $key ] );
      //print_r( $sorted_menu_items );
    }
  }
}
//print_r( $sorted_menu_items );
return $sorted_menu_items;
}

?>