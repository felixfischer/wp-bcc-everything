=== BCC Everything ===
Contributors: ffischer
Tags: email, mail, wp_mail, bcc, blind copy, monitoring
Requires at least: 2.2
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Blind copy (Bcc) outgoing emails to additional recipients.

== Description ==

The plugin adds additional BCC recipients to every email that's sent through
WordPress' `wp_mail()` function. Simply enter multiple comma separated email
addresses into the *BCC Recipient* field near the bottom of Settings -> General.

== Installation ==

1. Upload `bcc-everything.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set BCC recipients under Settings -> General (defaults to admin)

== Changelog ==

= 1.1.1 =
* harmonized wording

= 1.1 =
* customizable recipient

= 1.0.1 =
* fix improper handling of string type headers

= 1.0 =
* First version.
