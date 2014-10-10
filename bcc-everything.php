<?php
/*
 * Plugin Name: BCC Everything
 * Plugin URI: https://github.com/felixfischer/wp-bcc-everything
 * Description: Blind copy (Bcc) outgoing emails to additional recipients.
 * Version: 1.1.1
 * Author: Felix Fischer
 * Author URI: http://felixfischer.com
 *
*/


/* ----- primary pLugin functionality -------------------------------------- */


add_filter('wp_mail', 'bcc_everything');


/**
 * return the designated recipient address
 * or admin's email as as a fallback
 */
function bcce_recipient(){
  $email = get_option('bcce_recipient');
  if (!$email) $email = get_option('admin_email');
  return $email;
}


/**
 * add Bcc: headers to outgoing email
 */
function bcc_everything($args) {
  $email = bcce_recipient();
  if (is_array($args['headers'])) {
    $args['headers'][] = 'Bcc: '.$email;
  }
  else {
    $args['headers'] .= 'Bcc: '.$email."\r\n";
  }
  return $args;
}


/* ----- create WP options field for Bcc recipient address ----------------- */


add_action('admin_init', 'bcce_plugin_options');


/**
 * create our options section and field on WP's General Settings page
 */
function bcce_plugin_options() {
  add_settings_section(
    'bcce', // Section ID
    'BCC Everything', // Section Title
    'bcce_section_options_callback', // Callback
    'general' // make the section show up on the General Settings Page
  );
  add_settings_field(
    'bcce_recipient', // Option ID
    'BCC Recipient Email', // Label
    'bcce_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed (General Settings)
    'bcce', // Name of our section
    array( // The $args
      'bcce_recipient' // Should match Option ID
    )
  );
  register_setting('general','bcce_recipient', 'esc_attr');
}


/**
 * callback function to insert additional information into the section
 */
function bcce_section_options_callback() { // Section Callback
  echo '<p>Send a blind copy (Bcc:) of all outgoing emails to this address:</p>';
}


/**
 * callback function to draw the options form input field
 */
function bcce_textbox_callback($args) {  // Textbox Callback
  $option = bcce_recipient();
  $h = '<input type="text" id="%s" name="%s" class="regular-text" value="%s"/>';
  echo sprintf($h, $args[0], $args[0], $option);
}


add_filter('plugin_action_links_' . plugin_basename( __FILE__ ),
  'bcce_action_links');


function bcce_action_links($links) {
  $links[] = sprintf(
    '<a href="%s">%s</a>',
    get_admin_url(null, 'options-general.php#bcce_recipient'),
    __('Settings')
  );
  return $links;
}

?>
