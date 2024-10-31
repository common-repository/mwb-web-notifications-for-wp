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
<!--===============================================
=  Success Layout Comment  
===================================================-->
<div class="mwb-mwnfw-success__wrapper mwb-mwnfw__extra-space-success mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-success" class="mwb-mwnfw-success animate__animated animate__jackInTheBox">
		<div class="mwb-mwnfw-success-body" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;" >
			<button type="button" class="mwb-mwnfw-close__success mwb-mwnfw-close-btn"><span>&times;</span></button>
			<div class="mwb-mwnfw-success__body-wrap">
				<div class="mwb-mwnfw-success__img"><img src="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>"></div>
				<div class="mwb-mwnfw-notification__wrap">
					<div class="mwb-mwnfw-notification__main-wrap">
						<h2 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h2>
						<p style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;"><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></p>
						<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" class="mwb-mwnfw-success__btn" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
