=== BCC Everything ===
Contributors: ffischer
Tags: email, mail, wp_mail, bcc, blind copy, monitoring
Requires at least: 2.2
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Blind copy (Bcc:) all outgoing emails to Admin. This can be used to verify the
correct sending of emails, or as a simple monitoring device.

== Description ==

This plugin adds the primary blog email address as Bcc: recipient to every email
sent by WordPress. It uses the address defined in Settings -> General. There is
nothing to configure in this plugin. Just activate and forget.

== Installation ==

1. Upload `wp-bcc-everything.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.0.1 =
* fix improper handling of string type headers

= 1.0 =
* First version.
