<?php
/**
 * The common functionality of the plugin.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/common
 */

/**
 * The common functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the common stylesheet and JavaScript.
 * namespace mwb_web_notifications_for_wp_common.
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/common
 */
class Mwb_Web_Notifications_For_Wp_Common {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the common side of the site.
	 *
	 * @since    1.0.0
	 */
	public function mwnfw_common_enqueue_styles() {
		wp_enqueue_style( $this->plugin_name . 'common', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'common/css/mwb-web-notifications-for-wp-common.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the common side of the site.
	 *
	 * @since    1.0.0
	 */
	public function mwnfw_common_enqueue_scripts() {
		wp_register_script( $this->plugin_name . 'common', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'common/js/mwb-web-notifications-for-wp-common.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name . 'common', 'mwnfw_common_param', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( $this->plugin_name . 'common' );
	}


	/**
	 * Function name mwbn_create_notification_post_type.
	 * this function is used to create notification type cpt.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwbn_create_notification_post_type() {
		$labels = array(
			'name'                  => __( 'Notifications', 'mwb-web-notifications-for-wp' ),
			'menu_name'             => __( 'Notifications', 'mwb-web-notifications-for-wp' ),
			'name_admin_bar'        => __( 'mwb-web-notifications-for-wp', 'mwb-web-notifications-for-wp' ),
			'add_new'               => __( 'Add New', 'mwb-web-notifications-for-wp' ),
			'add_new_item'          => __( 'Add New Notification', 'mwb-web-notifications-for-wp' ),
			'new_item'              => __( 'New Notification', 'mwb-web-notifications-for-wp' ),
			'edit_item'             => __( 'Edit Notification', 'mwb-web-notifications-for-wp' ),
			'view_item'             => __( 'View Notification', 'mwb-web-notifications-for-wp' ),
			'all_items'             => __( 'All Notifications', 'mwb-web-notifications-for-wp' ),
			'search_items'          => __( 'Search Notifications', 'mwb-web-notifications-for-wp' ),
			'parent_item_colon'     => __( 'Parent Notifications:', 'mwb-web-notifications-for-wp' ),
			'not_found'             => __( 'No Notifications found.', 'mwb-web-notifications-for-wp' ),
			'not_found_in_trash'    => __( 'No Notifications found in Trash.', 'mwb-web-notifications-for-wp' ),
			'featured_image'        => __( 'Notification Cover Image', 'mwb-web-notifications-for-wp' ),
			'set_featured_image'    => __( 'Set cover image', 'mwb-web-notifications-for-wp' ),
			'remove_featured_image' => __( 'Remove cover image', 'mwb-web-notifications-for-wp' ),
			'use_featured_image'    => __( 'Use as cover image', 'mwb-web-notifications-for-wp' ),
			'archives'              => __( 'Notification archives', 'mwb-web-notifications-for-wp' ),
			'insert_into_item'      => __( 'Insert into Notification', 'mwb-web-notifications-for-wp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Notification', 'mwb-web-notifications-for-wp' ),
			'filter_items_list'     => __( 'Filter Notifications list', 'mwb-web-notifications-for-wp' ),
			'items_list_navigation' => __( 'Notifications list navigation', 'mwb-web-notifications-for-wp' ),
			'items_list'            => __( 'Notifications list', 'mwb-web-notifications-for-wp' ),
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __( 'All Notifications', 'mwb-web-notifications-for-wp' ),
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'mwb_notification' ),
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array( 'title' ),
		);

		register_post_type( 'mwb_notification', $args );
	}
}
