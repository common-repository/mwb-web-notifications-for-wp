<?php
/**
 * Load html for meta field
 *
 * This file is used to show preview of popup.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/templates/backend
 */

if ( 'propensity' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw__propensity-wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?>">
			<div id="mwb-mwnfw-propensity" class="mwb-mwnfw-propensity animate__animated animate__fadeInDown">
				<div class="mwb-mwnfw-propensity__body">
					<button type="button" class="mwb-mwnfw-close__propensity mwb-mwnfw-close-btn"><span>&times;</span></button>
					<div class="mwb-mwnfw-propensity__body-wrap">
						<div class="mwb-mwnfw-notification__wrap">
							<div class="mwb-mwnfw-propensity__img">
									<img src="<?php echo wp_kses_post( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>">
							</div>
							<div class="mwb-mwnfw-notification__main-wrap" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;">
								<div class="mwb-mwnfw-notification__content-wrap">
									<div class="mwb-mwnfw-notification__content-title">
										<h2 class="mwb-mwnfw-notification__new" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h2>
										<h2 class="mwb-mwnfw-notification__arrivals" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_sub_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_sub_title_color'] ) ) : '' ); ?>;"><?php echo esc_html( isset( $content_arr['mwb_mnfw_popup_sub_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mnfw_popup_sub_title'] ) ) : '' ); ?></h2>
									</div>
									<p class="mwb-mwnfw-notification__product" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_product_details_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_product_details_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_product_details_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_product_details_text'] ) ) : '' ); ?></p>
									<p class="mwb-mwnfw-notification__content-tag" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_heading_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_heading_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_heading'] ) ) : '' ); ?></p>
									<p class="mwb-mwnfw-notification__content" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></p>
									<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-mwnfw-btn__shop"  style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
} elseif ( 'reward' === $mwnfw_notification_type ) {

	?>
	<div class="mwb-mwnfw-reward__wrapper mwb-mwnfw-notification__wrapper  <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
				<div id="mwb-mwnfw-reward" class="mwb-mwnfw-reward animate__animated animate__zoomIn">
					<div class="mwb-mwnfw-reward__body" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;" >
						<button type="button" class="mwb-mwnfw-close__reward mwb-mwnfw-close-btn"><span>&times;</span></button>
						<div class="mwb-mwnfw-reward__img">
							<img src="<?php echo wp_kses_post( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>">
						</div>
						<div class="mwb-mwnfw-notification__wrap">
							<div class="mwb-mwnfw-confirm-reward__wrap">
								<h4 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h4>
								<p style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></p>
								<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-mwnfw-apply-now" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php
} elseif ( 'success' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw-success__wrapper mwb-mwnfw__extra-space-success mwb-mwnfw-notification__wrapper <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
		<div id="mwb-mwnfw-success" class="mwb-mwnfw-success animate__animated animate__jackInTheBox">
			<div class="mwb-mwnfw-success-body" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;" >
				<button type="button" class="mwb-mwnfw-close__success mwb-mwnfw-close-btn"><span>&times;</span></button>
				<div class="mwb-mwnfw-success__body-wrap">
					<div class="mwb-mwnfw-success__img"><img src="<?php echo wp_kses_post( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>"></div>
					<div class="mwb-mwnfw-notification__wrap">
						<div class="mwb-mwnfw-notification__main-wrap">
							<h2 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h2>
							<p style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></p></p>
							<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-mwnfw-success__btn" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} elseif ( 'invite' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw-invite__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
		<div id="mwb-mwnfw-invite" class="mwb-mwnfw-invite animate__animated animate__swing">
			<div class="mwb-mwnfw-invite-body" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;"  >
				<button type="button" class="mwb-mwnfw-close__invite mwb-mwnfw-close-btn"><span>&times;</span></button>
				<div class="mwb-mwnfw-invite__img">
				<img src="<?php echo wp_kses_post( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>">
				</div>
				<div class="mwb-mwnfw-notification__wrap">
					<div class="mwb-mwnfw-invite__btn-wrap">
						<h4 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h4>
						<p style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></p>
						<button href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-mwnfw-invite__btn" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>"><span><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} elseif ( 'offer' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw-offer__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
					<div id="mwb-mwnfw-offer" class="mwb-mwnfw-offer animate__animated animate__fadeInRightBig">
							<div class="mwb-mwnfw-offer-body" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;" >
								<button type="button" class="mwb-mwnfw-close__offer mwb-mwnfw-close-btn"><span>&times;</span></button>
								<div class="mwb-mwnfw-offer__body-wrap">
									<div class="mwb-mwnfw-notification__wrap">
										<div class="mwb-noti-pattern-top"></div>
										<div class="mwb-mwnfw-notification__main-wrap">
											<span class="mwb-noti-subtitle" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></span>
											<div class="mwb-mwnfw-discount-number__wrap"><h2 class="mwb-mwnfw-discount-number" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></h2><span class="mwb-mwnfw-discount-percent">% <?php esc_html_e( 'Off', 'mwb-web-notifications-for-wp' ); ?></span></div>
											<h2 class="mwb-noti-sale-title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_main_heading_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_main_heading_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_heading'] ) ) : '' ); ?></h2>
											<h4 class="mwb-noti-brans-name" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_heading_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_heading_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></h4>
											<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-noti-shop-now" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?></a>
										</div>
										<div class="mwb-noti-pattern-bottom"></div>
									</div>
									<div class="mwb-mwnfw-offer__img-wrap">
										<div class="mwb-mwnfw-offer__img">
										<img src="<?php echo wp_kses_post( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>">
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
	<?php
} elseif ( 'promotion' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw-promotional__wrapper mwb-mwnfw-notification__wrapper  <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
		<div id="mwb-mwnfw-promotional" class="mwb-mwnfw-promotional animate__animated animate__flipInX">
			<div class="mwb-mwnfw-promotional-body">
				<div class="mwb-mwnfw-promotional__body-wrap">
					<div class="mwb-mwnfw-notification__wrap" style="background-image: url(<?php echo esc_html( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>); background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;">
						<button type="button" class="mwb-mwnfw-close__promotion mwb-mwnfw-close-btn"><span>&times;</span></button>
						<div class="mwb-mwnfw-notification__main-wrap">
							<div class="mwb-mwnfw-discount-number__wrap">
								<h2 class="mwb-mwnfw-discount-number" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_discount_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_discount_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mnfw_popup_sub_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mnfw_popup_sub_title'] ) ) : '' ); ?></h2>
								<div class="mwb-mwnfw-discount-per__wrap"><span class="mwb-mwnfw-discount-percent">%</span><span class="mwb-mwnfw-discount-off">OFF</span>
								</div>
							</div>
							<p class="mwb-mwnfw-notification__sub-title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_main_heading_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_main_heading_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_heading'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_heading'] ) ) : '' ); ?></p>
							<h3 class="mwb-mwnfw-notification__promotional-title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_content_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_content_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h3>
							<div class="mwb-mwnfw-promotional__wrap">
								<div class="mwb-mwnfw-notification__promotional-code" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_coupon_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_coupon_text_color'] ) ) : '' ); ?>;"><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_content_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_content_text'] ) ) : '' ); ?></div>
								<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" class="mwb-mwnfw-promotional__btn" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php

} elseif ( 'feedback' === $mwnfw_notification_type ) {
	?>
	<div class="mwb-mwnfw-feedback__wrapper  mwb-mwnfw-notification__wrapper  <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
			<div id="mwb-mwnfw-feedback" class="mwb-mwnfw-feedback animate__animated animate__slideInUp">
				<div class="mwb-mwnfw-feedback-body">
					<div class="mwb-mwnfw-feedback__body-wrap">
						<div class="mwb-mwnfw-notification__wrap">
							<button type="button" class="mwb-mwnfw-close__feedback mwb-mwnfw-close-btn"><span>&times;</span></button>
							<div class="mwb-mwnfw-notification__header" style="background-image: url(<?php echo esc_html( isset( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_uploaded_image_url'] ) ) : '' ); ?>);" >
								<h2 class="mwb-mwnfw-notification__title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></h2>
								<div class="mwb-mwnfw-ad__banner-pattern">
									<img src="<?php echo esc_html( MWB_WEB_NOTIFICATIONS_FOR_WP_DIR_URL ); ?>public/image/pattern.png" alt="hero-shape-bottom" class="ad-pattern__img">
								</div>
							</div>
							<div class="mwb-mwnfw-notification__main-wrap">
								<form class="mwb-mwnfw-notification__subscription-form">
								<?php
								$mwb_mwnfw_field_arr = isset( $content_arr['mwb_mwnfw_dynamic_qa_field'] ) ? ( ( $content_arr['mwb_mwnfw_dynamic_qa_field'] ) ) : '';

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
									<button type="submit" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>;" class="mwb-mwnfw-feedback__btn"><span><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></span></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
} elseif ( 'sticky-nav' === $mwnfw_notification_type ) {
	?>
	<div id="mwb-mwnfw-noti-bar" style="background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_bg_color'] ) ) : '' ); ?>;" class="mwb-mwnfw-noti-bar <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_position'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_position'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_notification_entry'] ) ) : '' ); ?> <?php echo esc_html( isset( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_choose_animation_direction'] ) ) : '' ); ?> ">
	<div class="mwb-mwnfw-noti-bar__warpper">
			<div class="mwb-mwnfw-noti-bar__button mwb-mwnfw-flex"> 
				<span  class="mwb-mwnfw-noti-bar__title" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_title_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_title_color'] ) ) : '' ); ?>;" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_title'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_title'] ) ) : '' ); ?></span>
				<a href="<?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_url'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_url'] ) ) : '' ); ?>" style="color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_text_color'] ) ) : '' ); ?>; background-color: <?php echo esc_attr( isset( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_notification_button_bg_color'] ) ) : '' ); ?>" ><?php echo esc_html( isset( $content_arr['mwb_mwnfw_popup_link_text'] ) ? sanitize_text_field( wp_unslash( $content_arr['mwb_mwnfw_popup_link_text'] ) ) : '' ); ?></a>
			</div>
			<button type="button" class="mwb-mwnfw-noti-bar__close mwb-mwnfw-close-btn"><span>&times;</span></button>
		</div>
	</div>
	<?php
}
