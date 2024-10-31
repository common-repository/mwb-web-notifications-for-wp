<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link  https://makewebbetter.com/
 * @since 1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {

	exit(); // Exit if accessed directly.
}

global $mwnfw_mwb_mwnfw_obj;
$mwnfw_active_tab = isset( $_GET['mwnfw_tab'] ) ? sanitize_key( $_GET['mwnfw_tab'] ) : 'mwb-web-notifications-for-wp-general';

$mwnfw_default_tabs = $mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_default_tabs();
?>
<header>
	<?php
		// desc - This hook is used for trial.
		do_action( 'mwb_mwnfw_settings_saved_notice' );
	if ( isset( $_GET['mwb_saved'] ) ) {
		$mwb_mwnfw_error_text = esc_html__( 'Settings saved !', 'mwb-web-notifications-for-wp' );
		$mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_admin_notice( $mwb_mwnfw_error_text, 'success' );
	}
	?>
	<div class="mwb-header-container mwb-bg-white mwb-r-8">
		<h1 class="mwb-header-title"><?php echo esc_attr( strtoupper( str_replace( '-', ' ', __( 'mwb-web-notifications-for-wp', 'mwb-web-notifications-for-wp' ) ) ) ); ?></h1>
		<a href="https://docs.makewebbetter.com/mwb-web-notifications-for-wp/?utm_source=MWB-notifications-org&utm_medium=MWB-notifications-org-backend&utm_campaign=MWB-notifications-doc" target="_blank" class="mwb-link"><?php esc_html_e( 'Documentation', 'mwb-web-notifications-for-wp' ); ?></a>
		<span>|</span>
		<a href="https://makewebbetter.com/submit-query/?utm_source=MWB-notiifcations-backend&utm_medium=MWB-support-org&utm_campaign=MWB-notifications-backend" target="_blank" class="mwb-link"><?php esc_html_e( 'Support', 'mwb-web-notifications-for-wp' ); ?></a>
	</div>
</header>
<main class="mwb-main mwb-bg-white mwb-r-8">
	<nav class="mwb-navbar">
		<ul class="mwb-navbar__items">
			<?php
			if ( is_array( $mwnfw_default_tabs ) && ! empty( $mwnfw_default_tabs ) ) {
				foreach ( $mwnfw_default_tabs as $mwnfw_tab_key => $mwnfw_default_tabs ) {

					$mwnfw_tab_classes = 'mwb-link ';
					if ( ! empty( $mwnfw_active_tab ) && $mwnfw_active_tab === $mwnfw_tab_key ) {
						$mwnfw_tab_classes .= 'active';
					}
					?>
					<li>
						<a id="<?php echo esc_attr( $mwnfw_tab_key ); ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=mwb_web_notifications_for_wp_menu' ) . '&mwnfw_tab=' . esc_attr( $mwnfw_tab_key ) ); ?>" class="<?php echo esc_attr( $mwnfw_tab_classes ); ?>"><?php echo esc_html( $mwnfw_default_tabs['title'] ); ?></a>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</nav>
	<section class="mwb-section">
		<div>
			<?php
				// desc - This hook is used for trial.
				do_action( 'mwb_mwnfw_before_general_settings_form' );
				// if submenu is directly clicked on woocommerce.
			if ( empty( $mwnfw_active_tab ) ) {
				$mwnfw_active_tab = 'mwb_mwnfw_plug_general';
			}

				// look for the path based on the tab id in the admin templates.
				$mwnfw_default_tabs     = $mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_default_tabs();
				$mwnfw_tab_content_path = $mwnfw_default_tabs[ $mwnfw_active_tab ]['file_path'];
				$mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_load_template( $mwnfw_tab_content_path );
				// desc - This hook is used for trial.
				do_action( 'mwb_mwnfw_after_general_settings_form' );
			?>
		</div>
	</section>
