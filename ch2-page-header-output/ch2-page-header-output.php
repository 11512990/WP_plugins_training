<?php
/*
Plugin Name: Chapter 2 out- Plugin Header
Plugin URI:
Description: second plagin, will consist of google analitycs
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: some.url
License: GPLv2
*/

add_action( 'wp_head', 'ch2pho_page_header_output' );
function ch2pho_page_header_output() { ?>
<script type="text/javascript">
var gaJsHost = ( ( "https:" == document.location.protocol ) ?
"https://ssl." : "http://www." );
document.write( unescape( "%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' \n\
type='text/javascript'%3E%3C/script%3E" ) );
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker( "UA-xxxxxx-x" );
pageTracker._trackPageview();
} catch( err ) {}
</script>
<?php }
//добавлено 4,01,15
add_filter( 'the_content', 'ch2lfa_link_filter_analytics' );

function ch2lfa_link_filter_analytics ( $the_content ) {
$new_content = str_replace( "href",
"onClick=\"recordOutboundLink(this, 'Outbound Links', '" .
home_url() . "' );return false;\" href", $the_content );
return $new_content;
}

add_action( 'wp_footer', 'ch2lfa_footer_analytics_code' );

function ch2lfa_footer_analytics_code() { ?>
<script type="text/javascript">
function recordOutboundLink( link, category, action ) {
_gat._getTrackerByName()._trackEvent( category, action );
setTimeout( 'document.location = "' + link.href + '"', 100 );
}
</script>
<?php }
//5.01.15
register_activation_hook( __FILE__,'ch2pho_set_default_options_array' );

function ch2pho_set_default_options_array() {
  if ( get_option( 'ch2pho_options' ) === false ) {
    $new_options['ga_account_name'] = "UA-000000-0";
    $new_options['track_outgoing_links'] = false;
    $new_options['version'] = "1.1";
    add_option( 'ch2pho_options', $new_options );
  } else {
    $existing_options = get_option( 'ch2pho_options' );
    if ( $existing_options['version'] < 1.1 ) {
      $existing_options['track_outgoing_links'] = false;
      $existing_options['version'] = "1.1";
      update_option( 'ch2pho_options', $existing_options );
    }
  }
}
//add some options in menu

add_action( 'admin_menu', 'ch2pho_settings_menu' );

function ch2pho_settings_menu() {
  add_options_page( 'My Google Analytics Configuration',
                    'My Google Analytics', 'manage_options',
                    'ch2pho-my-google-analytics', 'ch2pho_config_page' );
}

function ch2pho_config_page() {
  // Retrieve plugin configuration options from database
  $options = get_option( 'ch2pho_options' );
  ?>
  <div id="ch2pho-general" class="wrap">
  <h2>My Google Analytics</h2>
  <form method="post" action="admin-post.php">
  <input type="hidden" name="action"
  value="save_ch2pho_options" />
  <!-- Adding security through hidden referrer field -->
  <?php wp_nonce_field( 'ch2pho' ); ?>
  Account Name: <input type="text" name="ga_account_name"
  value="<?php echo esc_html( $options['ga_account_name'] );
  ?>"/><br />
  Track Outgoing Links: <input type="checkbox"
  name="track_outgoing_links" <?php if (
  $options['track_outgoing_links'] ) echo ' checked="checked" ';
  ?>/><br />
  <input type="submit" value="Submit"
  class="button-primary"/>
  </form>
  </div>
  <?php 
}

?>