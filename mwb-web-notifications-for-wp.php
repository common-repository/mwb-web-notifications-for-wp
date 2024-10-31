<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link    https://makewebbetter.com/
 * @since   1.0.0
 * @package Mwb_Web_Notifications_For_Wp
 *
 * @wordpress-plugin
 * Plugin Name:       MWB Web Notifications for WP
 * Plugin URI:        https://makewebbetter.com/product/mwb-web-notifications-for-wp/
 * Description:       MWB Web Notifications for WP plugin allows you to create engaging notifications to market your products and services to your users.
 * Version:           1.0.0
 * Author:            MakeWebBetter
 * Author URI:        https://makewebbetter.com/?utm_source=MWB-notiifcations-backend&utm_medium=MWB-org-backend&utm_campaign=MWB-notifications-backend
 * Text Domain:       mwb-web-notifications-for-wp
 * Domain Path:       /languages
 *
 * Requires at least: 4.6
 * Tested up to:      5.8
 * WC requires at least:     4.0
 * WC tested up to:          5.8
 * License:           GNU General Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Define plugin constants.
 *
 * @since 1.0.0
 */
function define_mwb_web_notifications_for_wp_constants() {

	mwb_web_notifications_for_wp_constants( 'MWB_WEB_NOTIFICATIONS_FOR_WP_VERSION', '1.0.0' );
	mwb_web_notifications_for_wp_constants( 'MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH', plugin_dir_path( __FILE__ ) );
	mwb_web_notifications_for_wp_constants( 'MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL', plugin_dir_url( __FILE__ ) );
	mwb_web_notifications_for_wp_constants( 'MWB_WEB_NOTIFICATIONS_FOR_WP_SERVER_URL', 'https://makewebbetter.com' );
	mwb_web_notifications_for_wp_constants( 'MWB_WEB_NOTIFICATIONS_FOR_WP_ITEM_REFERENCE', 'MWB Web Notifications for WP' );
}

/**
 * Callable function for defining plugin constants.
 *
 * @param String $key   Key for contant.
 * @param String $value value for contant.
 * @since 1.0.0
 */
function mwb_web_notifications_for_wp_constants( $key, $value ) {

	if ( ! defined( $key ) ) {

		define( $key, $value );
	}
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mwb-web-notifications-for-wp-activator.php
 */
function activate_mwb_web_notifications_for_wp() {
	if ( ! wp_next_scheduled( 'mwb_mwnfw_check_license_daily' ) ) {
		wp_schedule_event( time(), 'daily', 'mwb_mwnfw_check_license_daily' );
	}

	include_once plugin_dir_path( __FILE__ ) . 'includes/class-mwb-web-notifications-for-wp-activator.php';
	Mwb_Web_Notifications_For_Wp_Activator::mwb_web_notifications_for_wp_activate();
	$mwb_mwnfw_active_plugin = get_option( 'mwb_all_plugins_active', false );
	if ( is_array( $mwb_mwnfw_active_plugin ) && ! empty( $mwb_mwnfw_active_plugin ) ) {
		$mwb_mwnfw_active_plugin['mwb-web-notifications-for-wp'] = array(
			'plugin_name' => 'MWB Web Notifications for WP',
			'active' => '1',
		);
	} else {
		$mwb_mwnfw_active_plugin                        = array();
		$mwb_mwnfw_active_plugin['mwb-web-notifications-for-wp'] = array(
			'plugin_name' => 'MWB Web Notifications for WP',
			'active' => '1',
		);
	}
	update_option( 'mwb_all_plugins_active', $mwb_mwnfw_active_plugin );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mwb-web-notifications-for-wp-deactivator.php
 */
function deactivate_mwb_web_notifications_for_wp() {
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-mwb-web-notifications-for-wp-deactivator.php';
	Mwb_Web_Notifications_For_Wp_Deactivator::mwb_web_notifications_for_wp_deactivate();
	$mwb_mwnfw_deactive_plugin = get_option( 'mwb_all_plugins_active', false );
	if ( is_array( $mwb_mwnfw_deactive_plugin ) && ! empty( $mwb_mwnfw_deactive_plugin ) ) {
		foreach ( $mwb_mwnfw_deactive_plugin as $mwb_mwnfw_deactive_key => $mwb_mwnfw_deactive ) {
			if ( 'mwb-web-notifications-for-wp' === $mwb_mwnfw_deactive_key ) {
				$mwb_mwnfw_deactive_plugin[ $mwb_mwnfw_deactive_key ]['active'] = '0';
			}
		}
	}
	update_option( 'mwb_all_plugins_active', $mwb_mwnfw_deactive_plugin );
}

register_activation_hook( __FILE__, 'activate_mwb_web_notifications_for_wp' );
register_deactivation_hook( __FILE__, 'deactivate_mwb_web_notifications_for_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mwb-web-notifications-for-wp.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_mwb_web_notifications_for_wp() {
	define_mwb_web_notifications_for_wp_constants();

	$mwnfw_plugin_standard = new Mwb_Web_Notifications_For_Wp();
	$mwnfw_plugin_standard->mwnfw_run();
	$GLOBALS['mwnfw_mwb_mwnfw_obj'] = $mwnfw_plugin_standard;
	$GLOBALS['save_notice'] = false;
}
run_mwb_web_notifications_for_wp();


// Add settings link on plugin page.
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'mwb_web_notifications_for_wp_settings_link' );

/**
 * Settings link.
 *
 * @since 1.0.0
 * @param Array $links Settings link array.
 * @return array
 */
function mwb_web_notifications_for_wp_settings_link( $links ) {

	$my_link = array(
		'<a href="' . admin_url( 'admin.php?page=mwb_web_notifications_for_wp_menu' ) . '">' . __( 'Settings', 'mwb-web-notifications-for-wp' ) . '</a>',
	);
	return array_merge( $my_link, $links );
}

/**
 * Adding custom setting links at the plugin activation list.
 *
 * @param  array  $links_array      array containing the links to plugin.
 * @param  string $plugin_file_name plugin file name.
 * @return array
 */
function mwb_web_notifications_for_wp_custom_settings_at_plugin_tab( $links_array, $plugin_file_name ) {
	if ( strpos( $plugin_file_name, basename( __FILE__ ) ) ) {
		$links_array[] = '<a href="https://demo.makewebbetter.com/mwb-web-notifications-for-wp/?utm_source=MWB-notifications-org&utm_medium=MWB-notifications-org-backend&utm_campaign=MWB-notifications-demo" target="_blank"><img src="' . esc_html( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL ) . 'admin/image/Demo.svg" class="mwb_mwnfw_icon_img" alt="Demo image">' . __( 'Demo', 'mwb-web-notifications-for-wp' ) . '</a>';
		$links_array[] = '<a href="https://docs.makewebbetter.com/mwb-web-notifications-for-wp/?utm_source=MWB-notifications-org&utm_medium=MWB-notifications-org-backend&utm_campaign=MWB-notifications-doc" target="_blank"><img src="' . esc_html( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL ) . 'admin/image/Documentation.svg" class="mwb_mwnfw_icon_img" alt="documentation image">' . __( 'Documentation', 'mwb-web-notifications-for-wp' ) . '</a>';
		$links_array[] = '<a href="https://makewebbetter.com/submit-query/?utm_source=MWB-notiifcations-backend&utm_medium=MWB-support-org&utm_campaign=MWB-notifications-backend" target="_blank"><img src="' . esc_html( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL ) . 'admin/image/Support.svg" class="mwb_mwnfw_icon_img" alt="support image">' . __( 'Support', 'mwb-web-notifications-for-wp' ) . '</a>';
	}
	return $links_array;
}
add_filter( 'plugin_row_meta', 'mwb_web_notifications_for_wp_custom_settings_at_plugin_tab', 10, 2 );
