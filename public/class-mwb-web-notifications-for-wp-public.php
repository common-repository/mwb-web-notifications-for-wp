<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 * namespace mwb_web_notifications_for_wp_public.
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/public
 */
class Mwb_Web_Notifications_For_Wp_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function mwnfw_public_enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'public/css/mwb-web-notifications-for-wp-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . 'min-css', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'public/css/mwb-public.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function mwnfw_public_enqueue_scripts() {

		wp_register_script( $this->plugin_name, MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'public/js/mwb-web-notifications-for-wp-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'mwnfw_public_param', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( $this->plugin_name );

		wp_enqueue_script( $this->plugin_name . 'min', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'public/js/mwb-public.min.js', array( 'jquery' ), $this->version, false );

		wp_localize_script(
			$this->plugin_name . 'min',
			'mwmfw_param_public_min',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'mwb_mwnfw_show_notification_again_time' => get_option( 'mwb_mwnfw_show_time_diff', false ),
				'nonce' => wp_create_nonce( 'mwb_mwnfw_min_nonce' ),
				'feedback_submitted' => __( 'Feedback Submitted', 'mwb-web-notifications-for-wp' ),
				'captcha_text' => __( 'Captcha Not verified. Please try again later.', 'mwb-web-notifications-for-wp' ),
				'mwb_mwnfw_enable_feedback' => get_option( 'mwb_mwnfw_enable_feedback', false ),
			)
		);

		if ( get_option( 'mwb_mwnfw_enable_feedback', false ) ) {
			if ( get_option( 'mwb_mwnfw_enable_captcha', false ) ) {
				wp_enqueue_script( 'mwb_google_recaptcha-v3', 'https://www.google.com/recaptcha/api.js?render=' . get_option( 'mwb_mwnfw_captcha_site_key', false ), array(), '3.0.0', true );
				wp_enqueue_script( 'mwb_google_captcha_mwnfw', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . 'public/js/mwb-web-notifications-for-wp-captcha.js', array( 'jquery' ), $this->version, false );

				wp_localize_script(
					'mwb_google_captcha_mwnfw',
					'mwnfw_google_captcha',
					array(
						'ajaxurl'    => admin_url( 'admin-ajax.php' ),
						'api_site_key' => get_option( 'mwb_mwnfw_captcha_site_key', false ),
						'captcha_enable' => get_option( 'mwb_mwnfw_enable_captcha', false ),
					)
				);
			}
		}
		wp_enqueue_script( $this->plugin_name . 'admin-sweet-alert', MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . '/package/lib/sweet-alert.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Function name mwb_mwnfw_display_notification.
	 * this function is used to display notification.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_display_notification() {

		if ( ! is_user_logged_in() && get_option( 'mwnfw_show_notification_guest_user', false ) ) {
			$this->mwb_mwnfw_load_html_popup();
		} elseif ( is_user_logged_in() && get_option( 'mwnfw_show_notification_logged_in_user', false ) ) {
			$this->mwb_mwnfw_load_html_popup();

		}

	}

	/**
	 * Function name mwb_mwnfw_load_html_popup.
	 * this function is used to load html of notification popup.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function mwb_mwnfw_load_html_popup() {

		$args = array(
			'post_type' => 'mwb_notification',
			'posts_per_page' => -1,
		);
		$all_post = get_posts( $args );
		foreach ( $all_post as $key => $value ) {

			$id = $value->ID;
			$get_notification_type = get_post_meta( $id, 'mwnfw_notification_type', true );
			if ( $get_notification_type ) {
				$choose_notification_position = get_post_meta( $id, 'mwb_mwnfw_choose_notification_position', true );
				$mwb_mwnfw_choose_notification_entry = get_post_meta( $id, 'mwb_mwnfw_choose_notification_entry', true );
				$mwb_mwnfw_choose_animation_direction = get_post_meta( $id, 'mwb_mwnfw_choose_animation_direction', true );
				$mwb_mwnfw_choose_event = get_post_meta( $id, 'mwb_mwnfw_choose_event', true );
				$current_id = get_the_ID();
					$get_show_page = get_post_meta( $id, 'mwb_mwnfw_notification_show_page', true );
				if ( function_exists( 'is_shop' ) ) {
					if ( is_shop() ) {
						$current_id = wc_get_page_id( 'shop' );
					}
				}
				if ( is_array( $get_show_page ) ) {

					foreach ( $get_show_page as $page_val ) {
						if ( (int) $page_val === (int) $current_id ) {

							if ( 'propensity' === $get_notification_type ) {
								$mwb_mwnfw_propensity_cookie = isset( $_COOKIE['mwb_mwnfw_propensity_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_propensity_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_propensity_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-propensity-popup.php';

								}
							}
							if ( 'reward' === $get_notification_type ) {

								$mwb_mwnfw_reward_cookie = isset( $_COOKIE['mwb_mwnfw_reward_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_reward_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_reward_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-reward-popup.php';

								}
							}
							if ( 'success' === $get_notification_type ) {
								$mwb_mwnfw_success_cookie = isset( $_COOKIE['mwb_mwnfw_success_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_success_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_success_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-success-popup.php';
								}
							}
							if ( 'offer' === $get_notification_type ) {

								$mwb_mwnfw_offer_cookie = isset( $_COOKIE['mwb_mwnfw_offer_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_offer_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_offer_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-offer-popup.php';

								}
							}
							if ( 'invite' === $get_notification_type ) {
								$mwb_mwnfw_invite_cookie = isset( $_COOKIE['mwb_mwnfw_invite_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_invite_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_invite_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-invite-popup.php';
								}
							}
							if ( 'promotion' === $get_notification_type ) {
								$mwb_mwnfw_promotion_cookie = isset( $_COOKIE['mwb_mwnfw_promotion_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_promotion_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_promotion_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-promotion-popup.php';

								}
							}
							if ( 'feedback' === $get_notification_type ) {
								$mwb_mwnfw_feedback_cookie = isset( $_COOKIE['mwb_mwnfw_feedback_cookie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_feedback_cookie'] ) ) : '';
								if ( ! $mwb_mwnfw_feedback_cookie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-feedback-popup.php';

								}
							}
							if ( 'custom' === $get_notification_type ) {

								$mwb_mwnfw_custom_cokkie = isset( $_COOKIE['mwb_mwnfw_custom_cokkie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_custom_cokkie'] ) ) : '';
								if ( ! $mwb_mwnfw_custom_cokkie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-custom-popup.php';

								}
							}
							if ( 'sticky-nav' === $get_notification_type ) {
								$mwb_mwnfw_nav_cokkie = isset( $_COOKIE['mwb_mwnfw_nav_cokkie'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['mwb_mwnfw_nav_cokkie'] ) ) : '';
								if ( ! $mwb_mwnfw_nav_cokkie ) {
									require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-stickey-nav-popup.php';
								}
							}
						}
					}
				}
			}
		}

	}



	/**
	 * Function name mwb_mwnfw_custom_preview.
	 * this function is used to show custom pop-up preview.
	 *
	 * @return void
	 */
	public function mwb_mwnfw_custom_preview() {

		if ( isset( $_GET['mwb_preview'] ) && ( 'custom_preview' === $_GET['mwb_preview'] ) ) {
			require_once MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_PATH . 'templates/frontend/mwb-web-notifications-for-wp-custom-preview.php';
		}

	}
}
