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

<!--=====================================================
							=    Promotional Layout Comment (Layout-6)   =
						=========================================================-->
<div class="mwb-mwnfw-promotional__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?> ">
	<div id="mwb-mwnfw-promotional" class="mwb-mwnfw-promotional animate__animated animate__flipInX">
		<div class="mwb-mwnfw-promotional-body">
			<div class="mwb-mwnfw-promotional__body-wrap">
				<div class="mwb-mwnfw-notification__wrap" style="background-image: url(<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>); background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;">
					<button type="button" class="mwb-mwnfw-close__promotion mwb-mwnfw-close-btn"><span>&times;</span></button>
					<div class="mwb-mwnfw-notification__main-wrap">										
						<div class="mwb-mwnfw-discount-number__wrap">
							<h2 class="mwb-mwnfw-discount-number" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_discount_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mnfw_popup_sub_title', true ) ); ?></h2>
							<div class="mwb-mwnfw-discount-per__wrap"><span class="mwb-mwnfw-discount-percent">%</span><span class="mwb-mwnfw-discount-off">OFF</span>
							</div>
						</div>
						<p class="mwb-mwnfw-notification__sub-title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_main_heading_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_heading', true ) ); ?></p>
						<h3 class="mwb-mwnfw-notification__promotional-title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h3>
						<div class="mwb-mwnfw-promotional__wrap">
							<div class="mwb-mwnfw-notification__promotional-code" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_coupon_text_color', true ) ); ?>;"><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></div>
							<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" class="mwb-mwnfw-promotional__btn" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

