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
<!--================================================
=       Invite Layout Comment   =
====================================================-->
<div class="mwb-mwnfw-invite__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-invite" class="mwb-mwnfw-invite animate__animated animate__swing">
		<div class="mwb-mwnfw-invite-body" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;" >
			<button type="button" class="mwb-mwnfw-close__invite mwb-mwnfw-close-btn"><span>&times;</span></button>
			<div class="mwb-mwnfw-invite__img">
				<img src="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>">

			</div>
			<div class="mwb-mwnfw-notification__wrap">
				<div class="mwb-mwnfw-invite__btn-wrap">
					<h4 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h4>
					<p style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></p>
					<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>" class="mwb-mwnfw-invite__btn"><span><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
