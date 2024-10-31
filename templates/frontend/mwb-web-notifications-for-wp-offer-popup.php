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
	=        Offer Layout Comment     =
=====================================================-->
<div class="mwb-mwnfw-offer__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-offer" class="mwb-mwnfw-offer animate__animated animate__fadeInRightBig">
			<div class="mwb-mwnfw-offer-body" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;" >
				<button type="button" class="mwb-mwnfw-close__offer mwb-mwnfw-close-btn"><span>&times;</span></button>
				<div class="mwb-mwnfw-offer__body-wrap">
					<div class="mwb-mwnfw-notification__wrap">
						<div class="mwb-noti-pattern-top"></div>
						<div class="mwb-mwnfw-notification__main-wrap">
							<span class="mwb-noti-subtitle" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></span>
							<div class="mwb-mwnfw-discount-number__wrap"><h2 class="mwb-mwnfw-discount-number" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></h2><span class="mwb-mwnfw-discount-percent">% <?php esc_html_e( 'Off', 'mwb-web-notifications-for-wp' ); ?></span></div>
							<h2 class="mwb-noti-sale-title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_main_heading_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_heading', true ) ); ?></h2>
							<h4 class="mwb-noti-brans-name" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_heading_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></h4>
							<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" class="mwb-noti-shop-now" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?></a>
						</div>
						<div class="mwb-noti-pattern-bottom"></div>
					</div>
					<div class="mwb-mwnfw-offer__img-wrap">
						<div class="mwb-mwnfw-offer__img">
						<img src="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>">
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
