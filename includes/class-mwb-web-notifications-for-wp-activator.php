<?php
/**
 * Fired during plugin activation
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/includes
 */
class Mwb_Web_Notifications_For_Wp_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function mwb_web_notifications_for_wp_activate() {

		update_option( 'mwb_mwnfw_enable_plugin', 'on' );
		update_option( 'mwnfw_show_notification_guest_user', 'on' );
		update_option( 'mwnfw_show_notification_logged_in_user', 'on' );
		update_option( 'mwb_mwnfw_show_time_diff', 5 );
	}

}
