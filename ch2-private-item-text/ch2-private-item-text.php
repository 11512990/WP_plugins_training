<?php
/*
Plugin Name: Chapter 2 – Private Item Text
Plugin URI:
Description: creation enclosing shortcodes its make the ability to hide some text beetwin [private]...[/private]
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/

add_shortcode( 'private', 'ch2pit_private_shortcode' );

function ch2pit_private_shortcode( $atts, $content = null ) {
  if ( is_user_logged_in() ){
    return '<div class="private">' . $content . '</div>';
  }else{
    return '';
  }
}
//добавляем стили
add_action( 'wp_enqueue_scripts', 'ch2pit_queue_stylesheet' );

function ch2pit_queue_stylesheet() {
wp_enqueue_style( 'privateshortcodestyle',
plugins_url( 'stylesheet.css', __FILE__ ) );
}

?>