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

add_meta_box(
	'mwnfw-simple-notification-show-content',       // $id
	__( 'Choose Content', 'mwb-web-notifications-for-wp' ),                    // $title
	array( $this, 'mwb_mwnfw_show_custom_content' ),  // $callback
	'mwb_notification',        // $page
	'normal',                  // $context
	'high'                     // $priority
);

$main_args = array(

	array(
		'id' => 'mwb-mwnfw-popup-height-text',
		'title' => __( 'Enter Height', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_show_custom_height',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_show_custom_height', true ),
				'placeholder'   => __( 'Enter height', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => 300,
			),
		),
	),
	array(
		'id' => 'mwb-mwnfw-popup-width-text',
		'title' => __( 'Enter Width', 'mwb-web-notifications-for-wp' ),
		'callback_args' => array(
			array(
				'id'            => 'mwb_mwnfw_show_custom_width',
				'value'         => get_post_meta( get_the_ID(), 'mwb_mwnfw_show_custom_width', true ),
				'placeholder'   => __( 'Enter width', 'mwb-web-notifications-for-wp' ),
				'type'          => 'text',
				'default_val'   => 400,

			),
		),
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
		'title' => __( 'Chosse Entry Effect', 'mwb-web-notifications-for-wp' ),
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

