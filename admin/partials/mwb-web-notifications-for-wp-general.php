<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html field for general tab.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $mwnfw_mwb_mwnfw_obj;
$mwnfw_genaral_settings =
// desc - filter for trial.
apply_filters( 'mwnfw_general_settings_array', array() );
?>
<!--  template file for admin settings. -->
<form action="" method="POST" class="mwb-mwnfw-gen-section-form">
	<div class="mwnfw-secion-wrap">
		<?php
		$mwnfw_general_html = $mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_generate_html( $mwnfw_genaral_settings );
		echo esc_html( $mwnfw_general_html );
		wp_nonce_field( 'admin_save_data', 'mwb_tabs_nonce' );
		?>
	</div>
</form>
