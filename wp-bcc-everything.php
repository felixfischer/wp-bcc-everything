<?php
/*
 * Plugin Name: BCC Everything
 * Plugin URI: https://github.com/felixfischer/wp-bcc-everything
 * Description: Blind copy (Bcc:) outgoing emails to Admin
 * Version: 1.0.1
 * Author: Felix Fischer
 * Author URI: http://felixfischer.com
 *
*/

add_filter('wp_mail', 'bcc_everything');

function bcc_everything($args) {
  $email = get_settings('admin_email');
  if (is_array($args['headers'])) {
    $args['headers'][] = 'Bcc: '.$email;
  }
  else {
    $args['headers'] .= 'Bcc: '.$email."\r\n";
  }
  return $args;
}

?>
