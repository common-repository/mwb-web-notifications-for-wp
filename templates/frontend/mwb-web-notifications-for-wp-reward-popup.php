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

<div class="mwb-mwnfw-reward__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-reward" class="mwb-mwnfw-reward animate__animated animate__zoomIn">
		<div class="mwb-mwnfw-reward__body" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;" >
			<button type="button" class="mwb-mwnfw-close__reward mwb-mwnfw-close-btn"><span>&times;</span></button>
			<div class="mwb-mwnfw-reward__img">
				<img src="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>">
			</div>
			<div class="mwb-mwnfw-notification__wrap">
				<div class="mwb-mwnfw-confirm-reward__wrap">
					<h4 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h4>
					<p style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></p>
					<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" class="mwb-mwnfw-apply-now" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>"><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
