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

echo '<div><button id="reset_notification_settings" data-id=' . esc_attr( get_the_ID() ) . ' class="button">' . esc_html__( 'Reset Notification', 'mwb-web-notifications-for-wp' ) . '</button></div>';
