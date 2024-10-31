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
<div class="mwb-mwnfw-custom__wrapper mwb-mwnfw-notification__wrapper <?php echo esc_html( $choose_notification_position ); ?> <?php echo esc_html( $mwb_mwnfw_choose_notification_entry ); ?> <?php echo esc_html( $mwb_mwnfw_choose_animation_direction ); ?> <?php echo esc_html( $mwb_mwnfw_choose_event ); ?>">
	<div id="mwb-mwnfw-custom" class="mwb-mwnfw-custom mwb-mwnfw-custom__width mwb-mwnfw-custom__height " style="min-height: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_show_custom_height', true ) ); ?>px; max-width: <?php echo esc_attr( get_post_meta( $id, 'mwb_mwnfw_show_custom_width', true ) ); ?>px ">
		<div class="mwb-mwnfw-custom-body">
			<button type="button" class="mwb-mwnfw-close__custom mwb-mwnfw-close-btn"><span>&times;</span></button>
		<?php
			$content_id = get_post_meta( $id, 'mwb_mwnfw_show_custom_content', true );
			$content_post = get_post( $content_id );
			$content = $content_post->post_content;
			echo wp_kses_post( $content );
		?>
		</div>
	</div>
</div>
