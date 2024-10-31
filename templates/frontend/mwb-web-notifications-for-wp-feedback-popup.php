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

<div class="mwb-mwnfw-feedback__wrapper  mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-feedback" class="mwb-mwnfw-feedback animate__animated animate__slideInUp">
		<div class="mwb-mwnfw-feedback-body">
			<div class="mwb-mwnfw-feedback__body-wrap">
				<div class="mwb-mwnfw-notification__wrap">
					<button type="button" class="mwb-mwnfw-close__feedback mwb-mwnfw-close-btn"><span>&times;</span></button>
					<div class="mwb-mwnfw-notification__header" style="background-image: url(<?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_uploaded_image_url', true ) ); ?>);" >
						<h2 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_title_color', true ) ); ?>;" ><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_title', true ) ); ?></h2>
						<div class="mwb-mwnfw-ad__banner-pattern">
							<img src="<?php echo esc_html( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL ); ?>public/image/pattern.png" alt="hero-shape-bottom" class="ad-pattern__img">
						</div>
					</div>
					<div class="mwb-mwnfw-notification__main-wrap">
						<form class="mwb-mwnfw-notification__subscription-form">
						<?php
						$mwb_mwnfw_field_arr = get_post_meta( $id, 'mwb_mwnfw_dynamic_qa_field', true );
						foreach ( $mwb_mwnfw_field_arr as $k => $value ) {
							?>
							<div class="mwb-mwnfw-feedback__radio">
								<input type="radio" class="mwb-mwnfw_feedback_radio_fields" id="mwb-mwnfw-feedback-modal-fields<?php echo esc_html( $k ); ?>"  name="mwb_mwnfw_feedback_modal" value="<?php echo esc_attr( $value ); ?>">
								<label class="radio-label" for="mwb-mwnfw-feedback-modal-fields<?php echo esc_html( $k ); ?>"><?php echo esc_attr( $value ); ?></label>
							</div>
								<?php
						}

						?>
							<input type="hidden" id="feedback-captcha__token" >
							<textarea id="mwb-mwnfw-custom-question" placeholder="<?php esc_html_e( 'Type your question!', 'mwb-web-notifications-for-wp' ); ?>" name="mwb-mwnfw-Feedback__question" class="mwb-mwnfw-Feedback__question mwb-mwnfw-feedback__question" ></textarea>
							<button type="submit" id="mwb_mwnfw_submit_feedback" style="color: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_notification_button_text_color', true ) ); ?>;" class="mwb-mwnfw-feedback__btn"><span><?php echo esc_html( get_post_meta( $id, 'mwb_mwnfw_popup_link_text', true ) ); ?></span></button>
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
