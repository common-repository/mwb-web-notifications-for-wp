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
<div class="mwb-mwnfw__propensity-wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-propensity" class="mwb-mwnfw-propensity animate__animated animate__fadeInDown">
		<div class="mwb-mwnfw-propensity__body">
			<button type="button" class="mwb-mwnfw-close__propensity mwb-mwnfw-close-btn"><span>&times;</span></button>
			<div class="mwb-mwnfw-propensity__body-wrap">
				<div class="mwb-mwnfw-notification__wrap">
					<div class="mwb-mwnfw-propensity__img">
							<img src="<?php echo wp_kses_post( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>">
					</div>
					<div class="mwb-mwnfw-notification__main-wrap" style="background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_bg_color', true ) ); ?>;">
						<div class="mwb-mwnfw-notification__content-wrap">
							<div class="mwb-mwnfw-notification__content-title">
								<h2 class="mwb-mwnfw-notification__new" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h2>
								<h2 class="mwb-mwnfw-notification__arrivals" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_sub_title_color', true ) ); ?>;"><?php echo esc_html( get_post_meta( $id, 'mwb_mnfw_popup_sub_title', true ) ); ?></h2>
							</div>
							<p class="mwb-mwnfw-notification__product" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_product_details_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_product_details_text', true ) ); ?></p>
							<p class="mwb-mwnfw-notification__content-tag" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_heading_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_heading', true ) ); ?></p>
							<p class="mwb-mwnfw-notification__content" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_content_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_content_text', true ) ); ?></p>
							<a href="<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_url', true ) ); ?>" class="mwb-mwnfw-btn__shop"  style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>; background-color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_bg_color', true ) ); ?>"><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
