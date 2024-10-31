<?php
/**
 * Load html pop-up
 *
 * This file is used to preview for custom popup.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/templates/frontend
 */

?>


<div class="mwb-mwnfw-custom__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( isset( $_GET['direction'] ) ? sanitize_text_field( wp_unslash( $_GET['direction'] ) ) : '' ); ?>  <?php echo esc_html( isset( $_GET['np'] ) ? sanitize_text_field( wp_unslash( $_GET['np'] ) ) : '' ); ?> <?php echo esc_html( isset( $_GET['entry'] ) ? sanitize_text_field( wp_unslash( $_GET['entry'] ) ) : '' ); ?> ">
	<div id="mwb-mwnfw-custom" class="mwb-mwnfw-custom mwb-mwnfw-custom__width mwb-mwnfw-custom__height " style="min-height: <?php echo esc_attr( isset( $_GET['height'] ) ? sanitize_text_field( wp_unslash( $_GET['height'] ) ) : '' ); ?>px; max-width: <?php echo esc_attr( isset( $_GET['width'] ) ? sanitize_text_field( wp_unslash( $_GET['width'] ) ) : '' ); ?>px ">
		<div class="mwb-mwnfw-custom-body">
			<button type="button" class="mwb-mwnfw-close__custom_preview mwb-mwnfw-close-btn"><span>&times;</span></button>
		<?php
					$content_id = isset( $_GET['content'] ) ? sanitize_text_field( wp_unslash( $_GET['content'] ) ) : '';
					$content_post = get_post( $content_id );
					$main_content = $content_post->post_content;
					echo wp_kses_post( $main_content );
		?>
		</div>
	</div>
</div>
