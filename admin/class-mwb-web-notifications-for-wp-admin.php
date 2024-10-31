<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://makewebbetter.com/
 * @since 1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/admin
 */
class Mwb_Web_Notifications_For_Wp_Admin {


	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook The plugin page slug.
	 */
	public function mwnfw_admin_enqueue_styles( $hook ) {
		wp_enqueue_style( 'wp-jquery-ui-dialog' );
		wp_enqueue_style( 'wp-color-picker' );
		$screen = get_current_screen();
		if ( isset( $screen->id ) && 'makewebbetter_page_mwb_web_notifications_for_wp_menu' === $screen->id ) {

			wp_enqueue_style( 'mwb-mwnfw-meterial-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-components-web.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'mwb-mwnfw-meterial-css2', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-components-v5.0-web.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'mwb-mwnfw-meterial-lite', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-lite.min.css', array(), time(), 'all' );

			wp_enqueue_style( 'mwb-mwnfw-meterial-icons-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/icon.css', array(), time(), 'all' );

			wp_enqueue_style( $this->plugin_name, MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/css/mwb-web-notifications-for-wp-admin.scss', array(), $this->version, 'all' );
			wp_enqueue_style( 'mwb-admin-min-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/css/mwb-admin.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'mwb-datatable-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/datatables/media/css/jquery.dataTables.min.css', array(), $this->version, 'all' );
		}

		if ( isset( $screen->id ) && ( 'edit-mwb_notification' === $screen->id || 'mwb_notification' === $screen->id ) ) {
			wp_enqueue_style( $this->plugin_name . '-admin-global', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/css/mwb-web-notifications-for-wp-admin-global.css', array(), time(), 'all' );
		}

		wp_enqueue_style( 'mwb-mwnfw-select2-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/select-2/mwb-web-notifications-for-wp-select2.css', array(), time(), 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook The plugin page slug.
	 */
	public function mwnfw_admin_enqueue_scripts( $hook ) {

		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( 'wp-color-picker' );

		$screen = get_current_screen();
		if ( isset( $screen->id ) && 'makewebbetter_page_mwb_web_notifications_for_wp_menu' === $screen->id ) {

			wp_enqueue_script( 'mwb-mwnfw-metarial-js', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-components-web.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwnfw-metarial-js2', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-components-v5.0-web.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwnfw-metarial-lite', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/material-design/material-lite.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwnfw-datatable', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/datatables.net/js/jquery.dataTables.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwnfw-datatable-btn', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/datatables.net/buttons/dataTables.buttons.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwnfw-datatable-btn-2', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/datatables.net/buttons/buttons.html5.min.js', array(), time(), false );
			wp_register_script( $this->plugin_name . 'admin-js', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/js/mwb-web-notifications-for-wp-admin.js', array( 'jquery', 'mwb-mwnfw-select2', 'mwb-mwnfw-metarial-js', 'mwb-mwnfw-metarial-js2', 'mwb-mwnfw-metarial-lite' ), $this->version, false );
			wp_localize_script(
				$this->plugin_name . 'admin-js',
				'mwnfw_admin_param',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'mwb_standard_nonce' => wp_create_nonce( 'ajax-nonce' ),
					'reloadurl' => admin_url( 'admin.php?page=mwb_web_notifications_for_wp_menu' ),
					'mwnfw_gen_tab_enable' => get_option( 'mwb_mwnfw_enable_plugin' ),
					'mwnfw_admin_param_location' => ( admin_url( 'admin.php' ) . '?page=mwb_web_notifications_for_wp_menu&mwnfw_tab=mwb-web-notifications-for-wp-general' ),
				)
			);
			wp_enqueue_script( $this->plugin_name . 'admin-js' );
			wp_enqueue_script( 'mwb-admin-min-js', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/js/mwb-admin.min.js', array(), time(), false );

		}
		if ( isset( $screen->id ) && ( 'edit-mwb_notification' === $screen->id || 'mwb_notification' === $screen->id ) ) {

			$mwnfw_notification_type_post = false;
			if ( ( isset( $_GET['post_type'] ) && 'mwb_notification' === $_GET['post_type'] ) || get_post_meta( get_the_ID(), 'mwnfw_notification_type', true ) ) {
				$mwnfw_notification_type_post = true;
			}

			$hide_add_new_button = false;
			if ( isset( $_GET['action'] ) && 'edit' === $_GET['action'] ) {
				if ( 'mwb_notification' === get_post_type( get_the_ID() ) ) {

					$hide_add_new_button = true;
				}
			}
			wp_enqueue_script( $this->plugin_name . 'admin-custom-js', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/js/mwb-web-notifications-for-wp-admin-custom.js', array( 'wp-color-picker' ), $this->version . time(), false );
			wp_localize_script(
				$this->plugin_name . 'admin-custom-js',
				'mwnfw_admin_param_custom',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'mwnfw_cpt_check' => $mwnfw_notification_type_post,
					'nonce' => wp_create_nonce( 'mwb_mwnfw_custom_nonce' ),
					'hide_add_new_button_edit' => $hide_add_new_button,
					'min_img_size' => __( 'Image Not allowed less than 50 kb', 'mwb-web-notifications-for-wp' ),
					'max_img_size' => __( 'Image Not allowed more than 4 mb', 'mwb-web-notifications-for-wp' ),
					'home_url' => get_home_url( 'relative' ),
					'mwb_mwnfw_enable_plugin' => get_option( 'mwb_mwnfw_enable_plugin' ),

				)
			);
		}

		wp_enqueue_script( 'mwb-mwnfw-select2', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'package/lib/select-2/mwb-web-notifications-for-wp-select2.js', array( 'jquery' ), time(), false );

	}

	/**
	 * Adding settings menu for MWB Web Notifications for WP.
	 *
	 * @since 1.0.0
	 */
	public function mwnfw_options_page() {
		global $submenu;
		if ( empty( $GLOBALS['admin_page_hooks']['mwb-plugins'] ) ) {
			add_menu_page( 'MakeWebBetter', 'MakeWebBetter', 'manage_options', 'mwb-plugins', array( $this, 'mwb_plugins_listing_page' ), MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'admin/image/MWB_Grey-01.svg', 15 );
			$mwnfw_menus =
			// desc - filter for trial.
			apply_filters( 'mwb_add_plugins_menus_array', array() );
			if ( is_array( $mwnfw_menus ) && ! empty( $mwnfw_menus ) ) {
				foreach ( $mwnfw_menus as $mwnfw_key => $mwnfw_value ) {
					add_submenu_page( 'mwb-plugins', $mwnfw_value['name'], $mwnfw_value['name'], 'manage_options', $mwnfw_value['menu_link'], array( $mwnfw_value['instance'], $mwnfw_value['function'] ) );
				}
			}
		}
	}

	/**
	 * Removing default submenu of parent menu in backend dashboard
	 *
	 * @since 1.0.0
	 */
	public function mwb_mwnfw_remove_default_submenu() {
		global $submenu;
		if ( is_array( $submenu ) && array_key_exists( 'mwb-plugins', $submenu ) ) {
			if ( isset( $submenu['mwb-plugins'][0] ) ) {
				unset( $submenu['mwb-plugins'][0] );
			}
		}
	}


	/**
	 * MWB Web Notifications for WP mwnfw_admin_submenu_page.
	 *
	 * @since 1.0.0
	 * @param array $menus Marketplace menus.
	 * @return array
	 */
	public function mwnfw_admin_submenu_page( $menus = array() ) {
		$menus[] = array(
			'name'            => 'MWB Web Notifications for WP',
			'slug'            => 'mwb_web_notifications_for_wp_menu',
			'menu_link'       => 'mwb_web_notifications_for_wp_menu',
			'instance'        => $this,
			'function'        => 'mwnfw_options_menu_html',
		);
		return $menus;
	}

	/**
	 * MWB Web Notifications for WP mwb_plugins_listing_page.
	 *
	 * @since 1.0.0
	 */
	public function mwb_plugins_listing_page() {
		$active_marketplaces =
		// desc - filter for trial.
		apply_filters( 'mwb_add_plugins_menus_array', array() );
		if ( is_array( $active_marketplaces ) && ! empty( $active_marketplaces ) ) {
			include MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/welcome.php';
		}
	}

	/**
	 * MWB Web Notifications for WP admin menu page.
	 *
	 * @since 1.0.0
	 */
	public function mwnfw_options_menu_html() {

		include_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/mwb-web-notifications-for-wp-admin-dashboard.php';
	}

	/**
	 * Developer_admin_hooks_listing
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function mwb_developer_admin_hooks_listing() {
		$admin_hooks = array();
		$val         = self::mwb_developer_hooks_function( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/' );
		if ( ! empty( $val['hooks'] ) ) {
			$admin_hooks[] = $val['hooks'];
			unset( $val['hooks'] );
		}
		$data = array();
		foreach ( $val['files'] as $v ) {
			if ( 'css' !== $v && 'js' !== $v && 'images' !== $v ) {
				$helo = self::mwb_developer_hooks_function( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/' . $v . '/' );
				if ( ! empty( $helo['hooks'] ) ) {
					$admin_hooks[] = $helo['hooks'];
					unset( $helo['hooks'] );
				}
				if ( ! empty( $helo ) ) {
					$data[] = $helo;
				}
			}
		}
		return $admin_hooks;
	}

	/**
	 * Function name mwb_developer_public_hooks_listing.
	 * Developer_public_hooks_listing
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function mwb_developer_public_hooks_listing() {

		$public_hooks = array();
		$val          = self::mwb_developer_hooks_function( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'public/' );

		if ( ! empty( $val['hooks'] ) ) {
			$public_hooks[] = $val['hooks'];
			unset( $val['hooks'] );
		}
		$data = array();
		foreach ( $val['files'] as $v ) {
			if ( 'css' !== $v && 'js' !== $v && 'images' !== $v ) {
				$helo = self::mwb_developer_hooks_function( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'public/' . $v . '/' );
				if ( ! empty( $helo['hooks'] ) ) {
					$public_hooks[] = $helo['hooks'];
					unset( $helo['hooks'] );
				}
				if ( ! empty( $helo ) ) {
					$data[] = $helo;
				}
			}
		}
		return $public_hooks;
	}

	/**
	 * Function name mwb_developer_hooks_function.
	 * this function is used to define developer hooks function.
	 *
	 * @param string $path conatins file path.
	 * @since 1.0.0
	 * @return array
	 */
	public static function mwb_developer_hooks_function( $path ) {
		$all_hooks = array();
		$scan      = scandir( $path );
		$response  = array();
		foreach ( $scan as $file ) {
			if ( strpos( $file, '.php' ) ) {
				$myfile = file( $path . $file );
				foreach ( $myfile as $key => $lines ) {
					if ( preg_match( '/do_action/i', $lines ) && ! strpos( $lines, 'str_replace' ) && ! strpos( $lines, 'preg_match' ) ) {
						$all_hooks[ $key ]['action_hook'] = $lines;
						$all_hooks[ $key ]['desc']        = $myfile[ $key - 1 ];
					}
					if ( preg_match( '/apply_filters/i', $lines ) && ! strpos( $lines, 'str_replace' ) && ! strpos( $lines, 'preg_match' ) ) {
						$all_hooks[ $key ]['filter_hook'] = $lines;
						$all_hooks[ $key ]['desc']        = $myfile[ $key - 1 ];
					}
				}
			} elseif ( strpos( $file, '.' ) == '' && strpos( $file, '.' ) !== 0 ) {
				$response['files'][] = $file;
			}
		}
		if ( ! empty( $all_hooks ) ) {
			$response['hooks'] = $all_hooks;
		}
		return $response;
	}

	/**
	 * MWB Web Notifications for WP admin menu page.
	 *
	 * @since 1.0.0
	 * @param array $mwnfw_settings_general Settings fields.
	 */
	public function mwnfw_admin_general_settings_page( $mwnfw_settings_general ) {
		$args = array(
			'post_type'   => 'product',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
		);

		$mnfw_all_posts = get_posts( $args );
		$all_prodcuts = array();
		foreach ( $mnfw_all_posts as $k => $val ) {
			$all_prodcuts[ $val->ID ] = $val->post_title;
		}
		$page_args = array(
			'post_type'   => 'page',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
		);

		$mwnfw_all_pages = get_posts( $page_args );
		$all_pages = array();
		foreach ( $mwnfw_all_pages as $key => $value ) {
			$all_pages[ $value->ID ] = $value->post_title;
		}
		$mwnfw_settings_general = array(
			array(
				'title' => __( 'Enable plugin', 'mwb-web-notifications-for-wp' ),
				'type'  => 'radio-switch',
				'description'  => __( 'Enable plugin to start the functionality.', 'mwb-web-notifications-for-wp' ),
				'id'    => 'mwb_mwnfw_enable_plugin',
				'value' => get_option( 'mwb_mwnfw_enable_plugin' ),
				'class' => 'mwnfw-radio-switch-class',
				'options' => array(
					'yes' => __( 'YES', 'mwb-web-notifications-for-wp' ),
					'no' => __( 'NO', 'mwb-web-notifications-for-wp' ),
				),
			),
			array(
				'title' => __( 'Enter time span difference to show notification', 'mwb-web-notifications-for-wp' ),
				'type'  => 'number',
				'description'  => __( 'Enter time in hours to again show notification.', 'mwb-web-notifications-for-wp' ),
				'id'    => 'mwb_mwnfw_show_time_diff',
				'value' => get_option( 'mwb_mwnfw_show_time_diff' ),
				'min'   => 0,
				'class' => 'mwnfw-radio-switch-class',
				'placeholder' => __( 'Enter Time', 'mwb-web-notifications-for-wp' ),
			),

			array(
				'title' => __( 'Enable Storing Feedback Details', 'mwb-web-notifications-for-wp' ),
				'type'  => 'radio-switch',
				'description'  => __( 'Enabling Storing Feeback details from feedback notification popup.', 'mwb-web-notifications-for-wp' ),
				'id'    => 'mwb_mwnfw_enable_feedback',
				'value' => get_option( 'mwb_mwnfw_enable_feedback' ),
				'class' => 'mwnfw-radio-switch-class',
				'options' => array(
					'yes' => __( 'YES', 'mwb-web-notifications-for-wp' ),
					'no' => __( 'NO', 'mwb-web-notifications-for-wp' ),
				),
			),
			array(
				'title' => __( 'Show Notification to guest user', 'mwb-web-notifications-for-wp' ),
				'type'  => 'radio-switch',
				'description'  => __( 'Show Notification to guest user.', 'mwb-web-notifications-for-wp' ),
				'id'    => 'mwnfw_show_notification_guest_user',
				'value' => get_option( 'mwnfw_show_notification_guest_user' ),
				'class' => 'mwnfw-radio-switch-class',
				'options' => array(
					'yes' => __( 'YES', 'mwb-web-notifications-for-wp' ),
					'no' => __( 'NO', 'mwb-web-notifications-for-wp' ),
				),
			),
			array(
				'title' => __( 'Show Notification to logged-in user', 'mwb-web-notifications-for-wp' ),
				'type'  => 'radio-switch',
				'description'  => __( 'Show Notification to logged-in user.', 'mwb-web-notifications-for-wp' ),
				'id'    => 'mwnfw_show_notification_logged_in_user',
				'value' => get_option( 'mwnfw_show_notification_logged_in_user' ),
				'class' => 'mwnfw-radio-switch-class',
				'options' => array(
					'yes' => __( 'YES', 'mwb-web-notifications-for-wp' ),
					'no' => __( 'NO', 'mwb-web-notifications-for-wp' ),
				),
			),
			array(
				'type'  => 'button',
				'id'    => 'mwnfw_save_general',
				'button_text' => __( 'Save Settings', 'mwb-web-notifications-for-wp' ),
				'class' => 'mwnfw-button-class',
			),
		);
		return $mwnfw_settings_general;
	}

	/**
	 * Function name mwnfw_admin_integration_settings_page.
	 * this function is used to create integration settings
	 *
	 * @param array $mwnfw_settings_integration contains setting array.
	 * @since 1.0.0
	 * @return array
	 */
	public function mwnfw_admin_integration_settings_page( $mwnfw_settings_integration ) {
		$mwnfw_settings_integration = array(
			array(
				'title'       => __( 'Enable Google- reCAPTCHA v3 Verification on from', 'mwb-web-notifications-for-wp' ),
				'type'        => 'radio-switch',
				'description' => __( 'Enable Captcha Verification on from, You can get recaptcha site key and secret key by creating account ', 'mwb-web-notifications-for-wp' ) . '<a href="https://www.google.com/recaptcha/admin/create">' . __( 'Here', 'mwb-web-notifications-for-wp' ) . '</a>',
				'id'          => 'mwb_mwnfw_enable_captcha',
				'value'       => get_option( 'mwb_mwnfw_enable_captcha' ),
				'class'       => 'mwnfw-radio-switch-class',
				'options'     => array(
					'yes' => __( 'YES', 'mwb-web-notifications-for-wp' ),
					'no'  => __( 'NO', 'mwb-web-notifications-for-wp' ),
				),
			),
			array(
				'title'       => __( 'Enter v3 Site Key', 'mwb-web-notifications-for-wp' ),
				'type'        => 'text',
				'description' => __( 'Enter Google- reCAPTCHA v3 Site Key', 'mwb-web-notifications-for-wp' ),
				'id'          => 'mwb_mwnfw_captcha_site_key',
				'value'       => get_option( 'mwb_mwnfw_captcha_site_key' ),
				'class'       => 'mwnfw-text-class',
				'placeholder' => __( 'Site Key', 'mwb-web-notifications-for-wp' ),
			),
			array(
				'title'       => __( 'Enter v3 Secret Key', 'mwb-web-notifications-for-wp' ),
				'type'        => 'password',
				'description' => __( 'Enter Google- reCAPTCHA v3 Secret Key', 'mwb-web-notifications-for-wp' ),
				'id'          => 'mwb_mwnfw_captcha_secret_key',
				'value'       => get_option( 'mwb_mwnfw_captcha_secret_key' ),
				'class'       => 'mwnfw-text-class',
				'placeholder' => __( 'Secret Key', 'mwb-web-notifications-for-wp' ),
			),
		);
		$mwnfw_settings_integration   =
		// desc - update integration settings filter.
		apply_filters( 'mwb_mwnfw_update_integration_setting', $mwnfw_settings_integration );
		$mwnfw_settings_integration[] = array(
			'type'        => 'button',
			'id'          => 'mwb_mwnfw_save_integration_setings_button',
			'button_text' => __( 'Save Settings', 'mwb-web-notifications-for-wp' ),
			'class'       => 'mwnfw-button-class',

		);
		return $mwnfw_settings_integration;
	}
	/**
	 * MWB Web Notifications for WP save tab settings.
	 *
	 * @since 1.0.0
	 */
	public function mwnfw_admin_save_tab_settings() {

		$gen_save = false;
		global $mwnfw_mwb_mwnfw_obj, $save_notice;
		if ( isset( $_POST['mwnfw_save_general'] ) ) {
			$mwnfw_genaral_settings =
			// desc - adding fields in general settings tab.
			apply_filters( 'mwnfw_general_settings_array', array() );
			$mwnfw_post_check       = true;
			$gen_save = true;
		} elseif ( isset( $_POST['mwb_mwnfw_save_integration_setings_button'] ) ) {
			$mwnfw_genaral_settings =
			// desc - adding fields in integration settings tab.
			apply_filters( 'mwnfw_inegration_settings_array', array() );
			$mwnfw_post_check       = true;
		}
		if ( ! isset( $_POST['mwb_tabs_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mwb_tabs_nonce'] ) ), 'admin_save_data' ) ) {
			return;
		}

		if ( $mwnfw_post_check ) {
			$mwb_mwnfw_gen_flag     = false;
			$mwnfw_button_index = array_search( 'submit', array_column( $mwnfw_genaral_settings, 'type' ) );
			if ( isset( $mwnfw_button_index ) && ( null == $mwnfw_button_index || '' == $mwnfw_button_index ) ) {
				$mwnfw_button_index = array_search( 'button', array_column( $mwnfw_genaral_settings, 'type' ) );
			}
			if ( isset( $mwnfw_button_index ) && '' !== $mwnfw_button_index ) {
				unset( $mwnfw_genaral_settings[ $mwnfw_button_index ] );
				if ( is_array( $mwnfw_genaral_settings ) && ! empty( $mwnfw_genaral_settings ) ) {
					foreach ( $mwnfw_genaral_settings as $mwnfw_genaral_setting ) {
						if ( isset( $mwnfw_genaral_setting['id'] ) && '' !== $mwnfw_genaral_setting['id'] ) {
							if ( isset( $_POST[ $mwnfw_genaral_setting['id'] ] ) ) {
								update_option( $mwnfw_genaral_setting['id'], is_array( $_POST[ $mwnfw_genaral_setting['id'] ] ) ? map_deep( wp_unslash( $_POST[ $mwnfw_genaral_setting['id'] ] ), 'sanitize_text_field' ) : sanitize_text_field( wp_unslash( $_POST[ $mwnfw_genaral_setting['id'] ] ) ) );
							} else {
								update_option( $mwnfw_genaral_setting['id'], '' );
							}
						} else {
							$mwb_mwnfw_gen_flag = true;
						}
					}
				}
				if ( $mwb_mwnfw_gen_flag ) {
					$mwb_mwnfw_error_text = esc_html__( 'Id of some field is missing', 'mwb-web-notifications-for-wp' );
					$mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_admin_notice( $mwb_mwnfw_error_text, 'error' );
				} else {
					$mwb_mwnfw_error_text = esc_html__( 'Settings saved !', 'mwb-web-notifications-for-wp' );
					$mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_admin_notice( $mwb_mwnfw_error_text, 'success' );
					if ( $gen_save ) {
						wp_safe_redirect( admin_url( 'admin.php?page=mwb_web_notifications_for_wp_menu&mwnfw_tab=mwb-web-notifications-for-wp-general&mwb_saved=true' ) );
						exit;
					}
				}
			}
		}
	}

	/**
	 * Function name mwb_mwnfw_open_modal_popup.
	 * this function is used to open a modal pup-up for notification type
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_open_modal_popup() {
		require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/backend/mwb-web-notifications-for-admin-choose-notification.php';
	}


	/**
	 * Function name mwb_mwnfw_create_meta_box
	 * this function is used to add meta box to notification type
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_create_meta_box() {

		$id = get_the_ID();

		$mwb_mwnfw_notification_type = isset( $_GET['mwnfw_type'] ) ? sanitize_text_field( wp_unslash( $_GET['mwnfw_type'] ) ) : get_post_meta( get_the_ID(), 'mwnfw_notification_type', true );

		if ( $mwb_mwnfw_notification_type ) {

			$file = MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/backend/mwb-web-notifications-for-wp-admin-meta-field-' . $mwb_mwnfw_notification_type . '.php';
			if ( file_exists( $file ) ) {
				add_meta_box(
					'mwnfw-simple-notification-show-location',       // $id
					__( 'Choose Page to show Notification', 'mwb-web-notifications-for-wp' ),                    // $title
					array( $this, 'mwnfw_choose_notification_location' ),  // $callback
					'mwb_notification',        // $page
					'normal',                  // $context
					'high'                     // $priority
				);
				require_once $file;
			}
		}

	}

	/**
	 * Function name mwb_mwnfw_generate_html_for_meta_fields
	 * this function is used to generate meta fields.
	 *
	 * @param array $args contains meta box array.
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_generate_html_for_meta_fields( $args ) {
		if ( ! is_array( $args ) ) {
			return;
		}
		foreach ( $args as $arg ) {
			add_meta_box(
				isset( $arg['id'] ) ? $arg['id'] : '',       // $id
				isset( $arg['title'] ) ? $arg['title'] : '',                  // $title
				array( $this, 'mwb_mwnfw_generate_html_meta_fields' ),  // $callback
				'mwb_notification',        // $page
				'normal',                  // $context
				'high',                   // $priority
				isset( $arg['callback_args'] ) ? $arg['callback_args'] : '' // $calback arguments
			);
		}
	}

	/**
	 * Function name mwb_mwnfw_generate_html_meta_fields.
	 * this function is used to generate html fields.
	 *
	 * @param array $post contains global post.
	 * @param array $main_args contains field array.
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_generate_html_meta_fields( $post, $main_args ) {

		$i = 0;
		foreach ( $main_args['args'] as $args ) {
			require MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/backend/mwb-web-notifications-for-admin-load-html.php';

		}

	}

	/**
	 * Function name mwb_mwnfw_show_custom_content.
	 * this function is used to show custom content.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_show_custom_content() {
		global $post;
		wp_dropdown_pages(
			array(
				'name'  => 'mwb_mwnfw_show_custom_content',
				'selected' => esc_html( get_post_meta( get_the_ID(), 'mwb_mwnfw_show_custom_content', true ) ),
			)
		);
		if ( ( isset( $_GET['mwnfw_type'] ) && ( 'custom' === $_GET['mwnfw_type'] ) ) || 'custom' === get_post_meta( get_the_ID(), 'mwnfw_notification_type', true ) ) {
			$args['args'] = array(

				array(
					'id'            => 'mwnfw_notification_type',
					'value'         => isset( $_GET['mwnfw_type'] ) ? sanitize_text_field( wp_unslash( $_GET['mwnfw_type'] ) ) : esc_html( get_post_meta( get_the_ID(), 'mwnfw_notification_type', true ) ),
					'type'          => 'hidden',
				),
				array(
					'id'            => 'mwnfw_notification_nonce_field',
					'value'         => wp_create_nonce( 'mwb_mwnfw_nonce_val_notification' ),
					'type'          => 'hidden',
				),
			);

			$this->mwb_mwnfw_generate_html_meta_fields( $post, $args );
		}
	}

	/**
	 * Function name mwb_mwnfw_add_dynamic_qstn_field
	 * this function is used to add qa type
	 *
	 * @return array
	 */
	public function mwb_mwnfw_add_dynamic_qstn_field() {
		$args = array();
		$data_arr = get_post_meta( get_the_ID(), 'mwb_mwnfw_dynamic_qa_field', true );
		$static_fields_arr = array( __( 'This is not what i was looking for.', 'mwb-web-notifications-for-wp' ), __( 'No worries i will be back.', 'mwb-web-notifications-for-wp' ), __( 'Your prices are unreasonable.', 'mwb-web-notifications-for-wp' ) );

		$data_arr = ! empty( $data_arr ) ? $data_arr : $static_fields_arr;
		if ( is_array( $data_arr ) ) {

			foreach ( $data_arr as $key => $val ) {
				$args[] = array(
					'id' => 'mwb_mwnfw_dynamic_qa_field' . $key,
					'type' => 'custom-text',
					'name' => 'mwb_mwnfw_dynamic_qa_field[]',
					'value' => $val,
				);
			}
		}
		$args[] = array(
			'id'            => 'mwb_div_dynamic_qa',
			'type'          => 'div',
		);
		$args[] = array(
			'id'            => 'mwb_mwnfw_add_dyanmic_field',
			'type'          => 'button',
			'button_text'   => __( 'Add More', 'mwb-web-notifications-for-wp' ),
			'class'         => 'button',
		);

		return $args;
	}

	/**
	 * Function name mwnfw_choose_image_to_upload.
	 * this function is used to add meta box to upload images for notification.
	 *
	 * @since 1.0.0
	 * @param string $default_url contains default url.
	 * @return array
	 */
	public function mwnfw_choose_image_to_upload( $default_url = '' ) {
		$image_val  = get_post_meta( get_the_ID(), 'mwb_mwnfw_uploaded_image_url', true );
		$image_val = ! empty( $image_val ) ? $image_val : $default_url;
		$args = array(
			array(
				'id'            => 'mwb_mwnfw_choose_image',
				'type'          => 'file',
			),
			array(
				'id'            => 'mwb_mwnfw_uploaded_image_url',
				'value'         => esc_url( $image_val ),
				'type'          => 'hidden',
			),
			array(
				'id'            => 'mwnfw_show_uploaded_image',
				'type'          => 'div',
			),
		);
		if ( $image_val ) {
			$args[] = array(
				'type' => 'img_parent_div',
				'parent-div-class' => 'mwb_mwnfw_image_show_wrapper',
				'div-class' => 'dashicons dashicons-no',
				'div-id' => 'mwb_mwnfw_image_server_url',
				'url'    => $image_val,
				'img-id'  => 'mwb_mwnfw_img_tag',
			);
		}

		return $args;

	}

	/**
	 * Function name mwnfw_choose_notification_location.
	 * this function is used to choose location.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwnfw_choose_notification_location() {

		wp_dropdown_pages(
			array(
				'name' => 'mwb_mwnfw_notification_show_page[]',
				'id' => 'mwb_mwnfw_notification_show_page',
				'selected' => map_deep( get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_show_page', true ), 'esc_html' ),
			)
		);

	}

	/**
	 * Function name mwb_mwnfw_save_meta_fields_val.
	 * this function is used to save meta fields value of notification cpt
	 *
	 * @param int $post_id contains post id.
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_save_meta_fields_val( $post_id ) {

		if ( ! isset( $_POST['mwnfw_notification_nonce_field'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mwnfw_notification_nonce_field'] ) ), 'mwb_mwnfw_nonce_val_notification' ) ) {
			return;
		}

		if ( ! isset( $_POST['mwnfw_notification_type'] ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		$values_to_save = array(

			'mwb_mwnfw_notification_show_page' => isset( $_POST['mwb_mwnfw_notification_show_page'] ) ? map_deep( wp_unslash( $_POST['mwb_mwnfw_notification_show_page'] ), 'sanitize_text_field' ) : '',
			'mwb_mwnfw_notification_bg_color' => isset( $_POST['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_bg_color'] ) ) : '',
			'mwb_mwnfw_notification_text_color' => isset( $_POST['mwb_mwnfw_notification_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_text_color'] ) ) : '',
			'mwb_mwnfw_choose_notification_position' => isset( $_POST['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_choose_notification_position'] ) ) : '',
			'mwb_mwnfw_uploaded_image_url' => isset( $_POST['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_uploaded_image_url'] ) ) : '',
			'mwb_mwnfw_choose_notification_entry' => isset( $_POST['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_choose_notification_entry'] ) ) : '',
			'mwnfw_notification_type' => isset( $_POST['mwnfw_notification_type'] ) ? sanitize_text_field( wp_unslash( $_POST['mwnfw_notification_type'] ) ) : '',
			'mwb_mwnfw_choose_animation_direction' => isset( $_POST['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_choose_animation_direction'] ) ) : '',
			'mwb_mwnfw_choose_event' => isset( $_POST['mwb_mwnfw_choose_event'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_choose_event'] ) ) : '',

		);

		if ( 'propensity' === $values_to_save['mwnfw_notification_type'] ) {

			$values_to_save['mwb_mwnfw_product_details_text'] = isset( $_POST['mwb_mwnfw_product_details_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_product_details_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_choose_bg_style'] = isset( $_POST['mwb_mwnfw_choose_bg_style'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_choose_bg_style'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';

			$values_to_save['mwb_mnfw_popup_sub_title'] = isset( $_POST['mwb_mnfw_popup_sub_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mnfw_popup_sub_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_heading'] = isset( $_POST['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_heading'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_sub_title_color'] = isset( $_POST['mwb_mwnfw_notification_sub_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_sub_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_heading_color'] = isset( $_POST['mwb_mwnfw_notification_heading_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_heading_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_product_details_color'] = isset( $_POST['mwb_mwnfw_notification_product_details_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_product_details_color'] ) ) : '';

		} elseif ( 'reward' === $values_to_save['mwnfw_notification_type'] ) {

			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';

		} elseif ( 'success' === $values_to_save['mwnfw_notification_type'] ) {
			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';

			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';

		} elseif ( 'offer' === $values_to_save['mwnfw_notification_type'] ) {
			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mnfw_popup_sub_title'] = isset( $_POST['mwb_mnfw_popup_sub_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mnfw_popup_sub_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_sub_title_color'] = isset( $_POST['mwb_mwnfw_notification_sub_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_sub_title_color'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_heading_color'] = isset( $_POST['mwb_mwnfw_notification_heading_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_heading_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_heading'] = isset( $_POST['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_heading'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_main_heading_color'] = isset( $_POST['mwb_mwnfw_notification_main_heading_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_main_heading_color'] ) ) : '';

		} elseif ( 'invite' === $values_to_save['mwnfw_notification_type'] ) {
			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';

		} elseif ( 'promotion' === $values_to_save['mwnfw_notification_type'] ) {

			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_content_text'] = isset( $_POST['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_content_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';

			$values_to_save['mwb_mnfw_popup_sub_title'] = isset( $_POST['mwb_mnfw_popup_sub_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mnfw_popup_sub_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_heading'] = isset( $_POST['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_heading'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_coupon_text_color'] = isset( $_POST['mwb_mwnfw_notification_coupon_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_coupon_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_main_heading_color'] = isset( $_POST['mwb_mwnfw_notification_main_heading_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_main_heading_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_discount_color'] = isset( $_POST['mwb_mwnfw_notification_discount_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_discount_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_content_color'] = isset( $_POST['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_content_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';

		} elseif ( 'feedback' === $values_to_save['mwnfw_notification_type'] ) {

			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';
			$values_to_save['mwb_mwnfw_dynamic_qa_field'] = isset( $_POST['mwb_mwnfw_dynamic_qa_field'] ) ? map_deep( wp_unslash( $_POST['mwb_mwnfw_dynamic_qa_field'] ), 'sanitize_text_field' ) : '';
			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';

		} elseif ( 'custom' === $values_to_save['mwnfw_notification_type'] ) {
			$values_to_save['mwb_mwnfw_show_custom_content'] = isset( $_POST['mwb_mwnfw_show_custom_content'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_show_custom_content'] ) ) : '';
			$values_to_save['mwb_mwnfw_show_custom_width'] = isset( $_POST['mwb_mwnfw_show_custom_width'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_show_custom_width'] ) ) : '';
			$values_to_save['mwb_mwnfw_show_custom_height'] = isset( $_POST['mwb_mwnfw_show_custom_height'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_show_custom_height'] ) ) : '';

		} elseif ( 'sticky-nav' === $values_to_save['mwnfw_notification_type'] ) {
			$values_to_save['mwb_mwnfw_popup_title'] = isset( $_POST['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_title'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_text'] = isset( $_POST['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_text'] ) ) : '';
			$values_to_save['mwb_mwnfw_popup_link_url'] = isset( $_POST['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_popup_link_url'] ) ) : '';

			$values_to_save['mwb_mwnfw_notification_button_text_color'] = isset( $_POST['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_text_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_button_bg_color'] = isset( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_button_bg_color'] ) ) : '';
			$values_to_save['mwb_mwnfw_notification_title_color'] = isset( $_POST['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_mwnfw_notification_title_color'] ) ) : '';

		}

		foreach ( $values_to_save as $meta_key => $meta_val ) {
			update_post_meta( $post_id, $meta_key, $meta_val );
		}

	}

	/**
	 * Function name mwb_mwnfw_upload_nottification_image.
	 * this function is used to upload image.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_upload_nottification_image() {
		check_ajax_referer( 'mwb_mwnfw_custom_nonce', 'nonce' );
		if ( isset( $_FILES['mwb_mwnfw_choose_image']['name'] ) && isset( $_FILES['mwb_mwnfw_choose_image']['tmp_name'] ) ) {
			$file_name_to_upload = isset( $_FILES['mwb_mwnfw_choose_image']['name'] ) ? wp_normalize_path( wp_kses_post( wp_unslash( $_FILES['mwb_mwnfw_choose_image']['name'] ) ) ) : '';
			$file_to_upload      = isset( $_FILES['mwb_mwnfw_choose_image']['tmp_name'] ) ? wp_normalize_path( wp_kses_post( wp_unslash( $_FILES['mwb_mwnfw_choose_image']['tmp_name'] ) ) ) : '';

			$upload_dir          = wp_upload_dir();

			$file_name_to_upload = str_replace( ' ', '_', trim( $file_name_to_upload ) );
			$file_to_upload      = str_replace( ' ', '_', trim( $file_to_upload ) );
			$upload_basedir      = $upload_dir['basedir'] . '/mwb_mwnfw_notification_images/';
			if ( ! file_exists( $upload_basedir ) ) {
				wp_mkdir_p( $upload_basedir );
			}

			$target_file     = $upload_basedir . basename( $file_name_to_upload );
			$image_file_type = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );

			if ( 'jpg' === $image_file_type || 'png' === $image_file_type || 'jpeg' === $image_file_type || 'gif' === $image_file_type ) {
				if ( ! file_exists( $target_file ) ) {
					move_uploaded_file( $file_to_upload, $target_file );
				}

				$upload_baseurl = $upload_dir['baseurl'] . '/mwb_mwnfw_notification_images/';
				$mwb_image_url  = $upload_baseurl . $file_name_to_upload;
				$mwb_image_path = $upload_basedir . $file_name_to_upload;
				if ( file_exists( $mwb_image_path ) ) {
					wp_send_json( $mwb_image_url );
				}
			}
		}
		wp_die();
	}

	/**
	 * Function name mwb_mwnfw_disable_add_new_cpt.
	 * this function is used to remove add new from notification cpt.
	 *
	 *  @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_disable_add_new_cpt() {
		global $submenu;
		unset( $submenu['edit.php?post_type=mwb_notification'][10] );
	}

	/**
	 * Function name mwb_mwnfw_add_feedback_details.
	 * this function is used to add feedback details.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_add_feedback_details() {

		if ( get_option( 'mwb_mwnfw_enable_feedback', false ) ) {

			$labels = array(
				'name'                  => _x( 'Feedback', 'mwb-web-notifications-for-wp' ),
				'menu_name'             => _x( 'Feedback', 'mwb-web-notifications-for-wp' ),

			);
			$args = array(
				'labels'             => $labels,
				'description'        => __( 'All Feedback', 'mwb-web-notifications-for-wp' ),
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'mwb_mwnfw_feedback' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'supports'           => array( 'title', 'editor' ),
			);

			register_post_type( 'mwb_mwnfw_feedback', $args );
		}

	}

	/**
	 * Function name mwb_mnfw_save_feedback_details.
	 * this function is used to save feedback details.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mnfw_save_feedback_details() {

		check_ajax_referer( 'mwb_mwnfw_min_nonce', 'nonce' );
		$review_reason      = isset( $_POST['review_reason'] ) ? sanitize_text_field( wp_unslash( $_POST['review_reason'] ) ) : '';
		$next_qstn      = isset( $_POST['next_qstn'] ) ? sanitize_text_field( wp_unslash( $_POST['next_qstn'] ) ) : '';

		if ( isset( $_POST['token_val'] ) ) {
			$response = wp_remote_post(
				'https://www.google.com/recaptcha/api/siteverify',
				array(
					'body' => array(
						'secret' => get_option( 'mwb_mwnfw_captcha_secret_key', false ),
						'response' => sanitize_text_field( wp_unslash( $_POST['token_val'] ) ),
						'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
					),
				)
			);

			$res = json_decode( $response['body'], true );
			if ( ! ( true === $res['success'] ) ) {
				echo esc_html( 'captcha-error' );
				wp_die();
			}
			if ( get_option( 'mwb_mwnfw_enable_feedback', false ) ) {
				if ( ! empty( $review_reason ) ) {

					$id = wp_insert_post(
						array(
							'post_title' => $review_reason,
							'post_type' => 'mwb_mwnfw_feedback',
							'post_content' => $next_qstn,
							'post_status' => 'publish',
							'comment_status' => 'closed',
						)
					);
					if ( $id ) {
						echo esc_html( 'submitted' );
						wp_die();

					}
				}
				echo esc_html( 'captcha-error' );
				wp_die();
			}
		}
	}

	/**
	 * Function name mwb_mwnfw_add_tabs.
	 * this function is used to add sub tabs.
	 *
	 * @param array $tab_arr contains tab array.
	 * @since 1.0.0
	 * @return array
	 */
	public function mwb_mwnfw_add_tabs( $tab_arr ) {

		$tab_arr['mwb-web-notifications-for-wp-integration']     = array(
			'title'       => esc_html__( 'Integration Settings', 'mwb-web-notifications-for-wp' ),
			'name'        => 'mwb-web-notifications-for-wp-integration',
			'file_path'   => MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'admin/partials/mwb-web-notifications-for-wp-integration.php',
		);
		return $tab_arr;
	}

	/**
	 * Function name mwb_mwnfw_preview_notification_admin.
	 * this function is used to preview notification.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_preview_notification_admin() {
		check_ajax_referer( 'mwb_mwnfw_custom_nonce', 'nonce' );

		$mwnfw_notification_type = isset( $_POST['mwnfw_notification_type'] ) ? sanitize_text_field( wp_unslash( $_POST['mwnfw_notification_type'] ) ) : '';
		$content_arr = ! empty( $_POST ) ? map_deep( $_POST, 'sanitize_text_field' ) : '';
		require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/backend/mwb-web-notifications-for-admin-preview-popup.php';
		wp_die();
	}

	/**
	 * Function name mwb_mwnfw_allow_multiple_select.
	 * this function is used to allow multiselect in wp page args.
	 *
	 * @param array $output conatins all text.
	 * @param array $r contains all field details.
	 * @since 1.0.0
	 * @return array
	 */
	public function mwb_mwnfw_allow_multiple_select( $output, $r ) {

		if ( isset( $r['id'] ) && 'mwb_mwnfw_notification_show_page' === $r['id'] ) {
			if ( isset( $r['selected'] ) && is_array( $r['selected'] ) ) {
				foreach ( $r['selected']  as $value ) {
					$output = str_replace( "value=\"{$value}\"", "value=\"{$value}\" selected", $output );
				}
			}
			return str_replace( '<select ', '<select multiple="multiple" ', $output );
		}
		return $output;

	}

	/**
	 * Function name mwb_mwnfw_reset_notification_settings.
	 * this function is used to reset the settings.
	 *
	 * @return void
	 */
	public function mwb_mwnfw_reset_notification_settings() {
		check_ajax_referer( 'mwb_mwnfw_custom_nonce', 'nonce' );
		$id = isset( $_POST['post_id'] ) ? sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) : '';

		$mwnfw_notification_type = get_post_meta( $id, 'mwnfw_notification_type', true );

		delete_post_meta( $id, 'mwb_mwnfw_notification_show_page' );
		delete_post_meta( $id, 'mwb_mwnfw_notification_bg_color' );
		delete_post_meta( $id, 'mwb_mwnfw_notification_text_color' );
		delete_post_meta( $id, 'mwb_mwnfw_choose_notification_position' );
		delete_post_meta( $id, 'mwb_mwnfw_uploaded_image_url' );
		delete_post_meta( $id, 'mwb_mwnfw_choose_notification_entry' );
		delete_post_meta( $id, 'mwb_mwnfw_choose_animation_direction' );
		delete_post_meta( $id, 'mwb_mwnfw_choose_event' );

		if ( 'custom' === $mwnfw_notification_type ) {
			delete_post_meta( $id, 'mwb_mwnfw_show_custom_content' );
			delete_post_meta( $id, 'mwb_mwnfw_show_custom_width' );
			delete_post_meta( $id, 'mwb_mwnfw_show_custom_height' );
		} else if ( 'sticky-nav' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
		} else if ( 'feedback' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_dynamic_qa_field' );

		} else if ( 'promotion' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );

			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mnfw_popup_sub_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_heading' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_coupon_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_main_heading_color' );

			delete_post_meta( $id, 'mwb_mwnfw_notification_discount_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );

		} else if ( 'invite' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );

		} else if ( 'offer' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_sub_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_heading_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_heading' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_main_heading_color' );

		} else if ( 'success' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );

		} else if ( 'reward' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );

		} else if ( 'propensity' === $mwnfw_notification_type ) {

			delete_post_meta( $id, 'mwb_mwnfw_product_details_text' );
			delete_post_meta( $id, 'mwb_mwnfw_choose_bg_style' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_title' );
			delete_post_meta( $id, 'mwb_mnfw_popup_sub_title' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_heading' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_url' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_link_text' );
			delete_post_meta( $id, 'mwb_mwnfw_popup_content_text' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_content_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_sub_title_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_heading_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_button_text_color' );
			delete_post_meta( $id, 'mwb_mwnfw_notification_product_details_color' );
		}

		wp_die();
	}


	/**
	 * Function name mwb_mwnfw_add_reset_button.
	 * this function is used to add reset button.
	 *
	 * @param object $post contains post object.
	 * @return void
	 */
	public function mwb_mwnfw_add_reset_button( $post ) {
		if ( 'mwb_notification' === get_post_type( $post ) ) {
			require MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/backend/mwb-web-notifications-for-admin-reset-button.php';
		}

	}
}
