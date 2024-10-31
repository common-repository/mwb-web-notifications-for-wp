<?php
/**
 * Show notification to the fronend user
 *
 * This file is used to add meta field in nav bar notification cpt.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/templates/backend
 */

$main_args = array(
	array(
		'id' => 'mwb-mwnfw-popup-title-text',
		'title' => __( 'Enter Title', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_popup_title',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_popup_title', true ),
				'placeholder'   => __( 'Enter Title', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => __( 'Grab The Offer', 'mwb-web-notifications-for-wp' ),
			),
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
		),
	),
	array(
		'id' => 'mwnfw-prop-a-text',
		'title' => __( 'Enter Button Text', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_popup_link_text',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_popup_link_text', true ),
				'placeholder'   => __( 'Enter Button text', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => __( 'Shop Now', 'mwb-web-notifications-for-wp' ),
			),
		),
	),
	array(
		'id' => 'mwb-mwnfw-popup-text-color',
		'title' => __( 'Choose Text Color', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_notification_title_color',
				'label' => __( 'Choose Title Color.', 'mwb-web-notifications-for-wp' ),
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_title_color', true ),
				'type'          => 'text',
				'class'         => 'mwb-mwnfw-color-picker__dyanmic',
				'default_val'   => '',


			),
			array(
				'id'            => 'mwb_mwnfw_notification_button_text_color',
				'label' => __( 'Choose Button text Color.', 'mwb-web-notifications-for-wp' ),
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_button_text_color', true ),
				'type'          => 'text',
				'class'         => 'mwb-mwnfw-color-picker__dyanmic',
				'default_val'   => '',

			),
		),
	),


	array(
		'id' => 'mwnfw-prop-a-url',
		'title' => __( 'Enter Url to redirect', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_popup_link_url',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_popup_link_url', true ),
				'placeholder'   => __( 'Enter Redirect url', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => '#',

			),
		),
	),


	array(
		'id' => 'mwb_mwnfw-simple-notification-choose-bgcolor',
		'title' => __( 'Choose Background Color', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'label'         => __( 'Choose Notification Background color', 'mwb-web-notifications-for-wp' ),
				'id'            => 'mwb_mwnfw_notification_bg_color',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_bg_color', true ),
				'type'          => 'text',
				'class'         => 'mwb-mwnfw-color-picker__dyanmic',
				'default_val'   => '',

			),
			array(
				'label'         => __( 'Choose Button Background color', 'mwb-web-notifications-for-wp' ),
				'id'            => 'mwb_mwnfw_notification_button_bg_color',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_button_bg_color', true ),
				'type'          => 'text',
				'class'         => 'mwb-mwnfw-color-picker__dyanmic',
				'default_val'   => '',

			),
		),
	),
);

$this->mwb_mwnfw_generate_html_for_meta_fields( $main_args );
