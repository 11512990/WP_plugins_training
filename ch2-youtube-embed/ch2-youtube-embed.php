<?php
/*
Plugin Name: Chapter 2 – YouTube Embed
Plugin URI:
Description: wi will add link to post multimedia to youtube directly. We make shortcode with parametres
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/

add_shortcode( 'youtubevid', 'ch2ye_youtube_embed_shortcode' );

function ch2ye_youtube_embed_shortcode( $atts ) {
extract( shortcode_atts( array(
'id' => ''
), $atts ) );
$output = '<iframe width="560" height="315"
src="http://www.youtube.com/embed/' . $id . '"
frameborder="0" allowfullscreen></iframe>';
return $output;
}
?>
