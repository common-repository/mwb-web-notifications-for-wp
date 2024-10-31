<?php
/**
 * Load html pop-up
 *
 * This file is used to load html for popup.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/templates/frontend
 */

?>
<div id="mwb-mwnfw-noti-bar" class="mwb-mwnfw-noti-bar" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;">
	<div class="mwb-mwnfw-noti-bar__warpper">
		<div class="mwb-mwnfw-noti-bar__button mwb-mwnfw-flex">
			<span  class="mwb-mwnfw-noti-bar__title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></span>
			<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></a>
		</div>
		<button type="button" class="mwb-mwnfw-noti-bar__close mwb-mwnfw-close-btn"><span>&times;</span></button>
	</div>
</div>
