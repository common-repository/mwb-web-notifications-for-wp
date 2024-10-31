<?php
/**
 * Show notification to the fronend user
 *
 * This file is used to add meta field in custom notification cpt.
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
		'title' => __( 'Enter Pop-Up Title', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_popup_title',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_popup_title', true ),
				'placeholder'   => __( 'Enter Title', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => __( 'Congratulations!', 'mwb-web-notifications-for-wp' ),
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
				'default_val'   => __( 'Apply Now', 'mwb-web-notifications-for-wp' ),
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
			array(
				'id'            => 'mwb_mwnfw_notification_content_color',
				'label' => __( 'Choose Content Color.', 'mwb-web-notifications-for-wp' ),
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_notification_content_color', true ),
				'type'          => 'text',
				'class'         => 'mwb-mwnfw-color-picker__dyanmic',
				'default_val'   => '',


			),
		),
	),

	array(
		'id' => 'mwnfw-prop-main-content-text',
		'title' => __( 'Enter Content text', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_popup_content_text',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_popup_content_text', true ),
				'placeholder'   => __( 'Enter Content text', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => __( 'You are eligible for a Platinum Card with extra benefit. Get 2X extra reward on your card.', 'mwb-web-notifications-for-wp' ),


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
		'id' => 'mwnfw-simple-notification-add-image',
		'title' => __( 'Choose Image', 'mwb-web-notifications-for-wp' ),
		'callback_args' => $this->mwnfw_choose_image_to_upload( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL . '/admin/image/reward.png' ),
	),
	array(
		'id' => 'mwb-mwnfw-simple-notification-choose-position',
		'title' => __( 'Notification Position', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'type'  => 'select',
				'id'    => 'mwb_mwnfw_choose_notification_position',
				'value' => get_post_meta( get_the_ID(), 'mwb_mwnfw_choose_notification_position', true ),
				'class' => 'mwnfw-select-class',
				'name'  => 'mwb_mwnfw_choose_notification_position',
				'options' => array(
					'mwb-mwnfw-np-top-left__0' => __( 'Top-Left', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-top-right__0' => __( 'Top-Right', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-bottom-left__0' => __( 'Bottom-Left', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-bottom-right__0' => __( 'Bottom-Right', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-top-left__space' => __( 'Top-left with space', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-top-right__space' => __( 'Top-Right with Space', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-bottom-left__space' => __( 'Bottom-Left with space', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-np-bottom-right__space' => __( 'Bottom-Right with space', 'mwb-web-notifications-for-wp' ),
				),
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
	array(
		'id' => 'mwb_mwnfw-simple-notification-choose-direction',
		'title' => __( 'Notification Animation Direction', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'type'  => 'select',
				'id'    => 'mwb_mwnfw_choose_animation_direction',
				'value' => get_post_meta( get_the_ID(), 'mwb_mwnfw_choose_animation_direction', true ),
				'class' => 'mwnfw-select-class',
				'name'  => 'mwb_mwnfw_choose_animation_direction',
				'options' => array(
					'mwb-mwnfw-ad__top' => __( 'Top', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-ad__bottom' => __( 'Bottom', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-ad__left' => __( 'Left', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-ad__right' => __( 'Right', 'mwb-web-notifications-for-wp' ),
				),
			),
		),
	),
	array(
		'id' => 'mwnfw-simple-notification-entry-effect',
		'title' => __( 'Chosse Entry Effect', 'mwb-web-notifications-for-wp' ),  // $title
		'callback_args' => array(
			array(
				'type'  => 'select',
				'id'    => 'mwb_mwnfw_choose_notification_entry',
				'value' => get_post_meta( get_the_ID(), 'mwb_mwnfw_choose_notification_entry', true ),
				'class' => 'mwnfw-select-class',
				'name'  => 'mwb_mwnfw_choose_notification_entry',
				'placeholder' => __( 'Select Demo', 'mwb-web-notifications-for-wp' ),
				'options' => array(
					'mwb-mwnfw-animation__slide' => __( 'Slide', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__expand' => __( 'Expand', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__zoom' => __( 'Zoom', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__fade' => __( 'Fade', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__bounce' => __( 'Bounce', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__flip' => __( 'Flip', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__rotate' => __( 'Rotate', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-animation__roll' => __( 'Roll', 'mwb-web-notifications-for-wp' ),
				),
			),
		),
	),
	array(
		'id' => 'mwb_mwnfw-simple-notification-entry-event',
		'title' => __( 'Chosse Event to show notification', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'type'  => 'select',
				'id'    => 'mwb_mwnfw_choose_event',
				'value' => get_post_meta( get_the_ID(), 'mwb_mwnfw_choose_event', true ),
				'class' => 'mwnfw-select-class',
				'name'  => 'mwb_mwnfw_choose_event',
				'options' => array(
					'mwb-mwnfw-event__page-load' => __( 'Page-Load', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-event__exit-intent' => __( 'Exit-Intent', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-event__after-page-load' => __( 'After few sec of page load', 'mwb-web-notifications-for-wp' ),
					'mwb-mwnfw-event__after-scroll' => __( 'After Some Scroll On Page', 'mwb-web-notifications-for-wp' ),
				),
			),
		),
	),
);

$this->mwb_mwnfw_generate_html_for_meta_fields( $main_args );
