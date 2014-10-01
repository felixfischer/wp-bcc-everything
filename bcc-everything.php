<?php
/*
 * Plugin Name: BCC Everything
 * Plugin URI: http://felixfischer.com
 * Description: Add admins email address to BCC for every outgoing mail
 * Version: 1.0
 * Author: Felix Fischer
 * Author URI: http://felixfischer.com
 *
*/

add_filter( 'wp_mail', 'bcc_everything' );

function bcc_everything( $args ) {
  $email = get_settings('admin_email');
  $args['headers'][] = 'Bcc: '.$email;
  return $args;
}

?>
