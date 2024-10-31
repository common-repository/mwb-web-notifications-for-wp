<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link  https://makewebbetter.com/
 * @since 1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/includes
 */
class Mwb_Web_Notifications_For_Wp {


	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since 1.0.0
	 * @var   Mwb_Web_Notifications_For_Wp_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The current version of the plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $mwnfw_onboard    To initializsed the object of class onboard.
	 */
	protected $mwnfw_onboard;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area,
	 * the public-facing side of the site and common side of the site.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		if ( defined( 'MWB_WEB_NOTIFICATIONS_FOR_WP_VERSION' ) ) {

			$this->version = MWB_WEB_NOTIFICATIONS_FOR_WP_VERSION;
		} else {

			$this->version = '1.0.0';
		}

		$this->plugin_name = 'mwb-web-notifications-for-wp';

		$this->mwb_web_notifications_for_wp_dependencies();
		$this->mwb_web_notifications_for_wp_locale();
		if ( is_admin() ) {
			$this->mwb_web_notifications_for_wp_admin_hooks();
		} else {
			$this->mwb_web_notifications_for_wp_public_hooks();
		}
		$this->mwb_web_notifications_for_wp_common_hooks();

		$this->mwb_web_notifications_for_wp_api_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Mwb_Web_Notifications_For_Wp_Loader. Orchestrates the hooks of the plugin.
	 * - Mwb_Web_Notifications_For_Wp_i18n. Defines internationalization functionality.
	 * - Mwb_Web_Notifications_For_Wp_Admin. Defines all hooks for the admin area.
	 * - Mwb_Web_Notifications_For_Wp_Common. Defines all hooks for the common area.
	 * - Mwb_Web_Notifications_For_Wp_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mwb-web-notifications-for-wp-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mwb-web-notifications-for-wp-i18n.php';

		if ( is_admin() ) {

			// The class responsible for defining all actions that occur in the admin area.
			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-mwb-web-notifications-for-wp-admin.php';

			// The class responsible for on-boarding steps for plugin.
			if ( is_dir( plugin_dir_path( dirname( __FILE__ ) ) . 'onboarding' ) && ! class_exists( 'Mwb_Web_Notifications_For_Wp_Onboarding_Steps' ) ) {
				include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mwb-web-notifications-for-wp-onboarding-steps.php';
			}

			if ( class_exists( 'Mwb_Web_Notifications_For_Wp_Onboarding_Steps' ) ) {
				$mwnfw_onboard_steps = new Mwb_Web_Notifications_For_Wp_Onboarding_Steps();
			}
		} else {

			// The class responsible for defining all actions that occur in the public-facing side of the site.
			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-mwb-web-notifications-for-wp-public.php';

		}

		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'package/rest-api/class-mwb-web-notifications-for-wp-rest-api.php';

		/**
		 * This class responsible for defining common functionality
		 * of the plugin.
		 */
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'common/class-mwb-web-notifications-for-wp-common.php';

		$this->loader = new Mwb_Web_Notifications_For_Wp_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Mwb_Web_Notifications_For_Wp_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_locale() {

		$plugin_i18n = new Mwb_Web_Notifications_For_Wp_I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Define the name of the hook to save admin notices for this plugin.
	 *
	 * @since 1.0.0
	 */
	private function mwb_saved_notice_hook_name() {
		$mwb_plugin_name                            = ! empty( explode( '/', plugin_basename( __FILE__ ) ) ) ? explode( '/', plugin_basename( __FILE__ ) )[0] : '';
		$mwb_plugin_settings_saved_notice_hook_name = $mwb_plugin_name . '_settings_saved_notice';
		return $mwb_plugin_settings_saved_notice_hook_name;
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_admin_hooks() {
		$mwnfw_plugin_admin = new Mwb_Web_Notifications_For_Wp_Admin( $this->mwnfw_get_plugin_name(), $this->mwnfw_get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $mwnfw_plugin_admin, 'mwnfw_admin_enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $mwnfw_plugin_admin, 'mwnfw_admin_enqueue_scripts' );

		// Add settings menu for MWB Web Notifications for WP.
		$this->loader->add_action( 'admin_menu', $mwnfw_plugin_admin, 'mwnfw_options_page' );
		$this->loader->add_action( 'admin_menu', $mwnfw_plugin_admin, 'mwb_mwnfw_remove_default_submenu', 50 );

		// All admin actions and filters after License Validation goes here.
		$this->loader->add_filter( 'mwb_add_plugins_menus_array', $mwnfw_plugin_admin, 'mwnfw_admin_submenu_page', 15 );
		$this->loader->add_filter( 'mwnfw_general_settings_array', $mwnfw_plugin_admin, 'mwnfw_admin_general_settings_page', 10 );

		// Saving tab settings.
		$this->loader->add_action( 'mwb_mwnfw_settings_saved_notice', $mwnfw_plugin_admin, 'mwnfw_admin_save_tab_settings' );

		// Developer's Hook Listing.
		$this->loader->add_action( 'mwnfw_developer_admin_hooks_array', $mwnfw_plugin_admin, 'mwb_developer_admin_hooks_listing' );
		$this->loader->add_action( 'mwnfw_developer_public_hooks_array', $mwnfw_plugin_admin, 'mwb_developer_public_hooks_listing' );

		if ( get_option( 'mwb_mwnfw_enable_plugin' ) ) {

				$this->loader->add_action( 'admin_head', $mwnfw_plugin_admin, 'mwb_mwnfw_open_modal_popup' );

				$this->loader->add_action( 'add_meta_boxes', $mwnfw_plugin_admin, 'mwb_mwnfw_create_meta_box' );
				$this->loader->add_action( 'save_post_mwb_notification', $mwnfw_plugin_admin, 'mwb_mwnfw_save_meta_fields_val' );
				$this->loader->add_action( 'wp_ajax_mwb_mwnfw_upload_nottification_image', $mwnfw_plugin_admin, 'mwb_mwnfw_upload_nottification_image' );

				$this->loader->add_action( 'wp_ajax_mwb_mwnfw_add_dyanmic_qa_field', $mwnfw_plugin_admin, 'mwb_mwnfw_add_dyanmic_qa_field' );

				$this->loader->add_action( 'init', $mwnfw_plugin_admin, 'mwb_mwnfw_add_feedback_details' );
				$this->loader->add_action( 'wp_ajax_mwb_mnfw_save_feedback_details', $mwnfw_plugin_admin, 'mwb_mnfw_save_feedback_details' );

				$this->loader->add_action( 'wp_ajax_nopriv_mwb_mnfw_save_feedback_details', $mwnfw_plugin_admin, 'mwb_mnfw_save_feedback_details' );

				$this->loader->add_filter( 'mwb_mwnfw_plugin_standard_admin_settings_tabs', $mwnfw_plugin_admin, 'mwb_mwnfw_add_tabs', 10 );

				// creation of integration settings.
				$this->loader->add_filter( 'mwnfw_inegration_settings_array', $mwnfw_plugin_admin, 'mwnfw_admin_integration_settings_page', 10 );

				$this->loader->add_action( 'wp_ajax_mwb_mwnfw_preview_notification_admin', $mwnfw_plugin_admin, 'mwb_mwnfw_preview_notification_admin' );

				$this->loader->add_filter( 'wp_dropdown_pages', $mwnfw_plugin_admin, 'mwb_mwnfw_allow_multiple_select', 10, 2 );

				$this->loader->add_action( 'wp_ajax_mwb_mwnfw_reset_notification_settings', $mwnfw_plugin_admin, 'mwb_mwnfw_reset_notification_settings' );

				$this->loader->add_action( 'post_submitbox_start', $mwnfw_plugin_admin, 'mwb_mwnfw_add_reset_button', 10, 1 );
				$this->loader->add_action( 'admin_menu', $mwnfw_plugin_admin, 'mwb_mwnfw_disable_add_new_cpt' );
		}
	}

	/**
	 * Register all of the hooks related to the common functionality
	 * of the plugin.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_common_hooks() {

		$mwnfw_plugin_common = new Mwb_Web_Notifications_For_Wp_Common( $this->mwnfw_get_plugin_name(), $this->mwnfw_get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $mwnfw_plugin_common, 'mwnfw_common_enqueue_styles' );

		$this->loader->add_action( 'wp_enqueue_scripts', $mwnfw_plugin_common, 'mwnfw_common_enqueue_scripts' );

		if ( get_option( 'mwb_mwnfw_enable_plugin' ) ) {
			$this->loader->add_action( 'init', $mwnfw_plugin_common, 'mwbn_create_notification_post_type' );
			$this->loader->add_filter( 'mwb_mwnfw_notification_arr_filter', $mwnfw_plugin_common, 'mwb_mwnfw_allow_gutunburg_custom_notification', 10 );
		}

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_public_hooks() {

		$mwnfw_plugin_public = new Mwb_Web_Notifications_For_Wp_Public( $this->mwnfw_get_plugin_name(), $this->mwnfw_get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $mwnfw_plugin_public, 'mwnfw_public_enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $mwnfw_plugin_public, 'mwnfw_public_enqueue_scripts' );
		if ( get_option( 'mwb_mwnfw_enable_plugin' ) ) {
			$this->loader->add_action( 'wp_body_open', $mwnfw_plugin_public, 'mwb_mwnfw_display_notification', 15 );
			$this->loader->add_action( 'wp_body_open', $mwnfw_plugin_public, 'mwb_mwnfw_custom_preview', 15 );
		}

	}

	/**
	 * Register all of the hooks related to the api functionality
	 * of the plugin.
	 *
	 * @since 1.0.0
	 */
	private function mwb_web_notifications_for_wp_api_hooks() {

		$mwnfw_plugin_api = new Mwb_Web_Notifications_For_Wp_Rest_Api( $this->mwnfw_get_plugin_name(), $this->mwnfw_get_version() );

		$this->loader->add_action( 'rest_api_init', $mwnfw_plugin_api, 'mwb_mwnfw_add_endpoint' );

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function mwnfw_run() {
		$this->loader->mwnfw_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  1.0.0
	 * @return string    The name of the plugin.
	 */
	public function mwnfw_get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since  1.0.0
	 * @return Mwb_Web_Notifications_For_Wp_Loader    Orchestrates the hooks of the plugin.
	 */
	public function mwnfw_get_loader() {
		return $this->loader;
	}


	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since  1.0.0
	 * @return Mwb_Web_Notifications_For_Wp_Onboard    Orchestrates the hooks of the plugin.
	 */
	public function mwnfw_get_onboard() {
		return $this->mwnfw_onboard;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  1.0.0
	 * @return string    The version number of the plugin.
	 */
	public function mwnfw_get_version() {
		return $this->version;
	}

	/**
	 * Predefined default mwb_mwnfw_plug tabs.
	 *
	 * @return Array       An key=>value pair of MWB Web Notifications for WP tabs.
	 */
	public function mwb_mwnfw_plug_default_tabs() {
		$mwnfw_default_tabs     = array();

			$mwnfw_default_tabs['mwb-web-notifications-for-wp-general']       = array(
				'title'       => esc_html__( 'General Setting', 'mwb-web-notifications-for-wp' ),
				'name'        => 'mwb-web-notifications-for-wp-general',
				'file_path'   => MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/mwb-web-notifications-for-wp-general.php',
			);
			$mwnfw_default_tabs = apply_filters( 'mwb_mwnfw_plugin_standard_admin_settings_tabs', $mwnfw_default_tabs );

			$mwnfw_default_tabs['mwb-web-notifications-for-wp-system-status'] = array(
				'title'       => esc_html__( 'System Status', 'mwb-web-notifications-for-wp' ),
				'name'        => 'mwb-web-notifications-for-wp-system-status',
				'file_path'   => MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/mwb-web-notifications-for-wp-system-status.php',
			);

			$mwnfw_default_tabs['mwb-web-notifications-for-wp-developer']     = array(
				'title'       => esc_html__( 'Developer', 'mwb-web-notifications-for-wp' ),
				'name'        => 'mwb-web-notifications-for-wp-developer',
				'file_path'   => MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/mwb-web-notifications-for-wp-developer.php',
			);

			return $mwnfw_default_tabs;
	}

	/**
	 * Locate and load appropriate tempate.
	 *
	 * @since 1.0.0
	 * @param string $path   path file for inclusion.
	 * @param array  $params parameters to pass to the file for access.
	 */
	public function mwb_mwnfw_plug_load_template( $path, $params = array() ) {

		if ( file_exists( $path ) ) {

			include $path;
		} else {

			/* translators: %s: file path */
			$mwnfw_notice = sprintf( esc_html__( 'Unable to locate file at location "%s". Some features may not work properly in this plugin. Please contact us!', 'mwb-web-notifications-for-wp' ), $path );
			$this->mwb_mwnfw_plug_admin_notice( $mwnfw_notice, 'error' );
		}
	}

	/**
	 * Show admin notices.
	 *
	 * @param string $mwnfw_message Message to display.
	 * @param string $type        notice type, accepted values - error/update/update-nag.
	 * @since 1.0.0
	 */
	public static function mwb_mwnfw_plug_admin_notice( $mwnfw_message, $type = 'error' ) {

		$mwnfw_classes = 'notice ';

		switch ( $type ) {

			case 'update':
				$mwnfw_classes .= 'updated is-dismissible';
				break;

			case 'update-nag':
				$mwnfw_classes .= 'update-nag is-dismissible';
				break;

			case 'success':
				$mwnfw_classes .= 'notice-success is-dismissible';
				break;

			default:
				$mwnfw_classes .= 'notice-error is-dismissible';
		}

		$mwnfw_notice  = '<div class="' . esc_attr( $mwnfw_classes ) . '">';
		$mwnfw_notice .= '<p>' . esc_html( $mwnfw_message ) . '</p>';
		$mwnfw_notice .= '</div>';

		echo wp_kses_post( $mwnfw_notice );
	}


	/**
	 * Show WordPress and server info.
	 *
	 * @return Array $mwnfw_system_data       returns array of all WordPress and server related information.
	 * @since  1.0.0
	 */
	public function mwb_mwnfw_plug_system_status() {
		global $wpdb;
		$mwnfw_system_status    = array();
		$mwnfw_wordpress_status = array();
		$mwnfw_system_data      = array();

		// Get the web server.
		$mwnfw_system_status['web_server'] = isset( $_SERVER['SERVER_SOFTWARE'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_SOFTWARE'] ) ) : '';

		// Get PHP version.
		$mwnfw_system_status['php_version'] = function_exists( 'phpversion' ) ? phpversion() : __( 'N/A (phpversion function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get the server's IP address.
		$mwnfw_system_status['server_ip'] = isset( $_SERVER['SERVER_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_ADDR'] ) ) : '';

		// Get the server's port.
		$mwnfw_system_status['server_port'] = isset( $_SERVER['SERVER_PORT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_PORT'] ) ) : '';

		// Get the uptime.
		$mwnfw_system_status['uptime'] = function_exists( 'exec' ) ? @exec( 'uptime -p' ) : __( 'N/A (make sure exec function is enabled)', 'mwb-web-notifications-for-wp' );

		// Get the server path.
		$mwnfw_system_status['server_path'] = defined( 'ABSPATH' ) ? ABSPATH : __( 'N/A (ABSPATH constant not defined)', 'mwb-web-notifications-for-wp' );

		// Get the OS.
		$mwnfw_system_status['os'] = function_exists( 'php_uname' ) ? php_uname( 's' ) : __( 'N/A (php_uname function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get WordPress version.
		$mwnfw_wordpress_status['wp_version'] = function_exists( 'get_bloginfo' ) ? get_bloginfo( 'version' ) : __( 'N/A (get_bloginfo function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get and count active WordPress plugins.
		$mwnfw_wordpress_status['wp_active_plugins'] = function_exists( 'get_option' ) ? count( get_option( 'active_plugins' ) ) : __( 'N/A (get_option function does not exist)', 'mwb-web-notifications-for-wp' );

		// See if this site is multisite or not.
		$mwnfw_wordpress_status['wp_multisite'] = function_exists( 'is_multisite' ) && is_multisite() ? __( 'Yes', 'mwb-web-notifications-for-wp' ) : __( 'No', 'mwb-web-notifications-for-wp' );

		// See if WP Debug is enabled.
		$mwnfw_wordpress_status['wp_debug_enabled'] = defined( 'WP_DEBUG' ) ? __( 'Yes', 'mwb-web-notifications-for-wp' ) : __( 'No', 'mwb-web-notifications-for-wp' );

		// See if WP Cache is enabled.
		$mwnfw_wordpress_status['wp_cache_enabled'] = defined( 'WP_CACHE' ) ? __( 'Yes', 'mwb-web-notifications-for-wp' ) : __( 'No', 'mwb-web-notifications-for-wp' );

		// Get the total number of WordPress users on the site.
		$mwnfw_wordpress_status['wp_users'] = function_exists( 'count_users' ) ? count_users() : __( 'N/A (count_users function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get the number of published WordPress posts.
		$mwnfw_wordpress_status['wp_posts'] = wp_count_posts()->publish >= 1 ? wp_count_posts()->publish : __( '0', 'mwb-web-notifications-for-wp' );

		// Get PHP memory limit.
		$mwnfw_system_status['php_memory_limit'] = function_exists( 'ini_get' ) ? (int) ini_get( 'memory_limit' ) : __( 'N/A (ini_get function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get the PHP error log path.
		$mwnfw_system_status['php_error_log_path'] = ! ini_get( 'error_log' ) ? __( 'N/A', 'mwb-web-notifications-for-wp' ) : ini_get( 'error_log' );

		// Get PHP max upload size.
		$mwnfw_system_status['php_max_upload'] = function_exists( 'ini_get' ) ? (int) ini_get( 'upload_max_filesize' ) : __( 'N/A (ini_get function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get PHP max post size.
		$mwnfw_system_status['php_max_post'] = function_exists( 'ini_get' ) ? (int) ini_get( 'post_max_size' ) : __( 'N/A (ini_get function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get the PHP architecture.
		if ( PHP_INT_SIZE == 4 ) {
			$mwnfw_system_status['php_architecture'] = '32-bit';
		} elseif ( PHP_INT_SIZE == 8 ) {
			$mwnfw_system_status['php_architecture'] = '64-bit';
		} else {
			$mwnfw_system_status['php_architecture'] = 'N/A';
		}

		// Get server host name.
		$mwnfw_system_status['server_hostname'] = function_exists( 'gethostname' ) ? gethostname() : __( 'N/A (gethostname function does not exist)', 'mwb-web-notifications-for-wp' );

		// Show the number of processes currently running on the server.
		$mwnfw_system_status['processes'] = function_exists( 'exec' ) ? @exec( 'ps aux | wc -l' ) : __( 'N/A (make sure exec is enabled)', 'mwb-web-notifications-for-wp' );

		// Get the memory usage.
		$mwnfw_system_status['memory_usage'] = function_exists( 'memory_get_peak_usage' ) ? round( memory_get_peak_usage( true ) / 1024 / 1024, 2 ) : 0;

		// Get CPU usage.
		// Check to see if system is Windows, if so then use an alternative since sys_getloadavg() won't work.
		if ( stristr( PHP_OS, 'win' ) ) {
			$mwnfw_system_status['is_windows']        = true;
			$mwnfw_system_status['windows_cpu_usage'] = function_exists( 'exec' ) ? @exec( 'wmic cpu get loadpercentage /all' ) : __( 'N/A (make sure exec is enabled)', 'mwb-web-notifications-for-wp' );
		}

		// Get the memory limit.
		$mwnfw_system_status['memory_limit'] = function_exists( 'ini_get' ) ? (int) ini_get( 'memory_limit' ) : __( 'N/A (ini_get function does not exist)', 'mwb-web-notifications-for-wp' );

		// Get the PHP maximum execution time.
		$mwnfw_system_status['php_max_execution_time'] = function_exists( 'ini_get' ) ? ini_get( 'max_execution_time' ) : __( 'N/A (ini_get function does not exist)', 'mwb-web-notifications-for-wp' );

		$mwnfw_system_data['php'] = $mwnfw_system_status;
		$mwnfw_system_data['wp']  = $mwnfw_wordpress_status;

		return $mwnfw_system_data;
	}

	/**
	 * Generate html components.
	 *
	 * @param string $mwnfw_components html to display.
	 * @since 1.0.0
	 */
	public function mwb_mwnfw_plug_generate_html( $mwnfw_components = array() ) {
		if ( is_array( $mwnfw_components ) && ! empty( $mwnfw_components ) ) {
			foreach ( $mwnfw_components as $mwnfw_component ) {
				if ( ! empty( $mwnfw_component['type'] ) && ! empty( $mwnfw_component['id'] ) ) {
					switch ( $mwnfw_component['type'] ) {

						case 'hidden':
						case 'number':
						case 'email':
						case 'text':
							?>
						<div class="mwb-form-group mwb-mwnfw-<?php echo esc_attr( $mwnfw_component['type'] ); ?>">
							<div class="mwb-form-group__label">
								<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control">
								<label class="mdc-text-field mdc-text-field--outlined">
									<span class="mdc-notched-outline">
										<span class="mdc-notched-outline__leading"></span>
										<span class="mdc-notched-outline__notch">
							<?php if ( 'number' != $mwnfw_component['type'] ) { ?>
												<span class="mdc-floating-label" id="my-label-id" style=""><?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?></span>
						<?php } ?>
										</span>
										<span class="mdc-notched-outline__trailing"></span>
									</span>
									<input
									class="mdc-text-field__input <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" 
									name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
									id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"
									type="<?php echo esc_attr( $mwnfw_component['type'] ); ?>"
									<?php if ( 'number' === $mwnfw_component['type'] ) { ?>
									min = "<?php echo ( isset( $mwnfw_component['min'] ) ? esc_html( $mwnfw_component['min'] ) : '' ); ?>"
									<?php } ?>
									value="<?php echo ( isset( $mwnfw_component['value'] ) ? esc_attr( $mwnfw_component['value'] ) : '' ); ?>"
									placeholder="<?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?>"
									>
								</label>
								<div class="mdc-text-field-helper-line">
									<div class="mdc-text-field-helper-text--persistent mwb-helper-text" id="" aria-hidden="true"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></div>
								</div>
							</div>
						</div>
							<?php
							break;

						case 'password':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control">
								<label class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-trailing-icon">
									<span class="mdc-notched-outline">
										<span class="mdc-notched-outline__leading"></span>
										<span class="mdc-notched-outline__notch">
										</span>
										<span class="mdc-notched-outline__trailing"></span>
									</span>
									<input 
									class="mdc-text-field__input <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?> mwb-form__password" 
									name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
									id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"
									type="<?php echo esc_attr( $mwnfw_component['type'] ); ?>"
									value="<?php echo ( isset( $mwnfw_component['value'] ) ? esc_attr( $mwnfw_component['value'] ) : '' ); ?>"
									placeholder="<?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?>"
									>
									<i class="material-icons mdc-text-field__icon mdc-text-field__icon--trailing mwb-password-hidden" tabindex="0" role="button">visibility</i>
								</label>
								<div class="mdc-text-field-helper-line">
									<div class="mdc-text-field-helper-text--persistent mwb-helper-text" id="" aria-hidden="true"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></div>
								</div>
							</div>
						</div>
							<?php
							break;

						case 'textarea':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label class="mwb-form-label" for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control">
								<label class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea"      for="text-field-hero-input">
									<span class="mdc-notched-outline">
										<span class="mdc-notched-outline__leading"></span>
										<span class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?></span>
										</span>
										<span class="mdc-notched-outline__trailing"></span>
									</span>
									<span class="mdc-text-field__resizer">
										<textarea class="mdc-text-field__input <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" rows="2" cols="25" aria-label="Label" name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>" id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" placeholder="<?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?>"><?php echo ( isset( $mwnfw_component['value'] ) ? esc_textarea( $mwnfw_component['value'] ) : '' ); // WPCS: XSS ok. ?></textarea>
									</span>
								</label>
							</div>
						</div>
							<?php
							break;

						case 'select':
						case 'multiselect':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label class="mwb-form-label" for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control">
								<div class="mwb-form-select">
									<select id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?><?php echo ( 'multiselect' === $mwnfw_component['type'] ) ? '[]' : ''; ?>" id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mdl-textfield__input <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" <?php echo 'multiselect' === $mwnfw_component['type'] ? 'multiple="multiple"' : ''; ?> >
							<?php
							foreach ( $mwnfw_component['options'] as $mwnfw_key => $mwnfw_val ) {
								?>
											<option value="<?php echo esc_attr( $mwnfw_key ); ?>"
												<?php
												if ( is_array( $mwnfw_component['value'] ) ) {
													selected( in_array( (string) $mwnfw_key, $mwnfw_component['value'], true ), true );
												} else {
														   selected( $mwnfw_component['value'], (string) $mwnfw_key );
												}
												?>
												>
												<?php echo esc_html( $mwnfw_val ); ?>
											</option>
										<?php
							}
							?>
									</select>
									<label class="mdl-textfield__label" for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></label>
								</div>
							</div>
						</div>

							<?php
							break;

						case 'checkbox':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control mwb-pl-4">
								<div class="mdc-form-field">
									<div class="mdc-checkbox">
										<input 
										name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
										id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"
										type="checkbox"
										class="mdc-checkbox__native-control <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>"
										value="<?php echo ( isset( $mwnfw_component['value'] ) ? esc_attr( $mwnfw_component['value'] ) : '' ); ?>"
							<?php checked( $mwnfw_component['value'], '1' ); ?>
										/>
										<div class="mdc-checkbox__background">
											<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
												<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
											</svg>
											<div class="mdc-checkbox__mixedmark"></div>
										</div>
										<div class="mdc-checkbox__ripple"></div>
									</div>
									<label for="checkbox-1"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></label>
								</div>
							</div>
						</div>
							<?php
							break;

						case 'radio':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control mwb-pl-4">
								<div class="mwb-flex-col">
							<?php
							foreach ( $mwnfw_component['options'] as $mwnfw_radio_key => $mwnfw_radio_val ) {
								?>
										<div class="mdc-form-field">
											<div class="mdc-radio">
												<input
												name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
												value="<?php echo esc_attr( $mwnfw_radio_key ); ?>"
												type="radio"
												class="mdc-radio__native-control <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>"
								<?php checked( $mwnfw_radio_key, $mwnfw_component['value'] ); ?>
												>
												<div class="mdc-radio__background">
													<div class="mdc-radio__outer-circle"></div>
													<div class="mdc-radio__inner-circle"></div>
												</div>
												<div class="mdc-radio__ripple"></div>
											</div>
											<label for="radio-1"><?php echo esc_html( $mwnfw_radio_val ); ?></label>
										</div>    
								<?php
							}
							?>
								</div>
							</div>
						</div>
							<?php
							break;

						case 'radio-switch':
							?>

						<div class="mwb-form-group">
							<div class="mwb-form-group__label">
								<label for="" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
							</div>
							<div class="mwb-form-group__control">
								<div>
									<div class="mdc-switch">
										<div class="mdc-switch__track"></div>
										<div class="mdc-switch__thumb-underlay">
											<div class="mdc-switch__thumb"></div>
											<input name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>" type="checkbox" id="<?php echo esc_html( $mwnfw_component['id'] ); ?>" value="on" class="mdc-switch__native-control <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" role="switch" aria-checked="
							<?php
							if ( 'on' == $mwnfw_component['value'] ) {
								echo 'true';
							} else {
								echo 'false';
							}
							?>
											"
											<?php checked( $mwnfw_component['value'], 'on' ); ?>
											>
										</div>
									</div>
								</div>
								<div class="mdc-text-field-helper-line">
									<div class="mdc-text-field-helper-text--persistent mwb-helper-text" id="" aria-hidden="true"><?php echo ( isset( $mwnfw_component['description'] ) ? wp_kses_post( $mwnfw_component['description'] ) : '' ); ?></div>
								</div>
							</div>
						</div>
							<?php
							break;

						case 'button':
							?>
						<div class="mwb-form-group">
							<div class="mwb-form-group__label"></div>
							<div class="mwb-form-group__control">
								<button class="mdc-button mdc-button--raised" name= "<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
									id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"> <span class="mdc-button__ripple"></span>
									<span class="mdc-button__label <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>"><?php echo ( isset( $mwnfw_component['button_text'] ) ? esc_html( $mwnfw_component['button_text'] ) : '' ); ?></span>
								</button>
							</div>
						</div>

							<?php
							break;

						case 'multi':
							?>
							<div class="mwb-form-group mwb-mwnfw-<?php echo esc_attr( $mwnfw_component['type'] ); ?>">
								<div class="mwb-form-group__label">
									<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
									</div>
									<div class="mwb-form-group__control">
							<?php
							foreach ( $mwnfw_component['value'] as $component ) {
								?>
											<label class="mdc-text-field mdc-text-field--outlined">
												<span class="mdc-notched-outline">
													<span class="mdc-notched-outline__leading"></span>
													<span class="mdc-notched-outline__notch">
								<?php if ( 'number' != $component['type'] ) { ?>
															<span class="mdc-floating-label" id="my-label-id" style=""><?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?></span>
							<?php } ?>
													</span>
													<span class="mdc-notched-outline__trailing"></span>
												</span>
												<input 
												class="mdc-text-field__input <?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" 
												name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
												id="<?php echo esc_attr( $component['id'] ); ?>"
												type="<?php echo esc_attr( $component['type'] ); ?>"
												value="<?php echo ( isset( $mwnfw_component['value'] ) ? esc_attr( $mwnfw_component['value'] ) : '' ); ?>"
												placeholder="<?php echo ( isset( $mwnfw_component['placeholder'] ) ? esc_attr( $mwnfw_component['placeholder'] ) : '' ); ?>"
								<?php echo esc_attr( ( 'number' === $component['type'] ) ? 'max=10 min=0' : '' ); ?>
												>
											</label>
							<?php } ?>
									<div class="mdc-text-field-helper-line">
										<div class="mdc-text-field-helper-text--persistent mwb-helper-text" id="" aria-hidden="true"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></div>
									</div>
								</div>
							</div>
								<?php
							break;
						case 'color':
						case 'date':
						case 'file':
							?>
							<div class="mwb-form-group mwb-mwnfw-<?php echo esc_attr( $mwnfw_component['type'] ); ?>">
								<div class="mwb-form-group__label">
									<label for="<?php echo esc_attr( $mwnfw_component['id'] ); ?>" class="mwb-form-label"><?php echo ( isset( $mwnfw_component['title'] ) ? esc_html( $mwnfw_component['title'] ) : '' ); // WPCS: XSS ok. ?></label>
								</div>
								<div class="mwb-form-group__control">
									<label>
										<input 
										class="<?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>" 
										name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
										id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"
										type="<?php echo esc_attr( $mwnfw_component['type'] ); ?>"
										value="<?php echo ( isset( $mwnfw_component['value'] ) ? esc_attr( $mwnfw_component['value'] ) : '' ); ?>"
									<?php echo esc_html( ( 'date' === $mwnfw_component['type'] ) ? 'max=' . gmdate( 'Y-m-d', strtotime( gmdate( 'Y-m-d', mktime() ) . ' + 365 day' ) ) . 'min=' . gmdate( 'Y-m-d' ) : '' ); ?>
										>
									</label>
									<div class="mdc-text-field-helper-line">
										<div class="mdc-text-field-helper-text--persistent mwb-helper-text" id="" aria-hidden="true"><?php echo ( isset( $mwnfw_component['description'] ) ? esc_attr( $mwnfw_component['description'] ) : '' ); ?></div>
									</div>
								</div>
							</div>
							<?php
							break;

						case 'submit':
							?>
						<tr valign="top">
							<td scope="row">
								<input type="submit" class="button button-primary" 
								name="<?php echo ( isset( $mwnfw_component['name'] ) ? esc_html( $mwnfw_component['name'] ) : esc_html( $mwnfw_component['id'] ) ); ?>"
								id="<?php echo esc_attr( $mwnfw_component['id'] ); ?>"
								class="<?php echo ( isset( $mwnfw_component['class'] ) ? esc_attr( $mwnfw_component['class'] ) : '' ); ?>"
								value="<?php echo esc_attr( $mwnfw_component['button_text'] ); ?>"
								/>
							</td>
						</tr>
							<?php
							break;

						default:
							break;
					}
				}
			}
		}
	}
}
