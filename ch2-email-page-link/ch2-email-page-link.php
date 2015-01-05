<?php
/*
Plugin Name: Chapter 2 – Email Page Link.
Plugin URI:
Description: After making a number of changes to the page header, title, and favicon, the next recipe takes
a more active role by adding a link to each post or page, allowing visitors to e-mail a link to
the item that they are currently viewing. This functionality is implemented using a filter hook
attached to the page and post content, allowing our custom function to append custom output
code to all entries that get displayed on-screen.
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/
//прикручиваем хук контент и функцию колбэк
add_filter( 'the_content', 'ch2epl_email_page_filter' );

  //описываем ф-ю колбэк
function ch2epl_email_page_filter ( $the_content ) {
// build url to mail message icon downloaded
// from iconarchive.com
$mail_icon_url = plugins_url( 'mailicon.png', __FILE__ );
// Set initial value of $new_content variable to previous
// content
$new_content = $the_content;
// Append image with mailto link after content, including
// the item title and permanent URL
$new_content .= "<a title='E-mail article link'
href='mailto:someone@somewhere.com?subject=Check out
this interesting article entitled ";
$new_content .= get_the_title();
$new_content .= "&body=Hi!%0A%0AI thought you would enjoy
this article entitled ";
$new_content .= get_the_title();
$new_content .= ".%0A%0A";
$new_content .= get_permalink();
$new_content .= "%0A%0AEnjoy!'>
<img alt='' src='" . $mail_icon_url. "' /></a>";
// Return filtered content for display on the site
return $new_content;
}


?>