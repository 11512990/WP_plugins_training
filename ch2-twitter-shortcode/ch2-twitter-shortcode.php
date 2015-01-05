<?php
/*
Plugin Name: Chapter 2 – Twitter Shortcode
Plugin URI:
Description: wi will add twitter to any posts
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/

add_shortcode( 'tf', 'ch2ts_twitter_feed_shortcode' );

function ch2ts_twitter_feed_shortcode( $atts ) {
$output = '<a href="http://twitter.com/ylefebvre">
Twitter Feed</a>';
return $output;
}
?>