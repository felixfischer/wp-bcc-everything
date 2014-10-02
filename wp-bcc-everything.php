<?php
/*
 * Plugin Name: BCC Everything
 * Plugin URI: https://github.com/felixfischer/wp-bcc-everything
 * Description: Bcc all outgoing emails to Admin
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
