<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html for system status.
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
// Template for showing information about system status.
global $mwnfw_mwb_mwnfw_obj;
$mwnfw_default_status    = $mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_system_status();
$mwnfw_wordpress_details = is_array( $mwnfw_default_status['wp'] ) && ! empty( $mwnfw_default_status['wp'] ) ? $mwnfw_default_status['wp'] : array();
$mwnfw_php_details       = is_array( $mwnfw_default_status['php'] ) && ! empty( $mwnfw_default_status['php'] ) ? $mwnfw_default_status['php'] : array();
?>
<div class="mwb-mwnfw-table-wrap">
	<div class="mwb-col-wrap">
		<div id="mwb-mwnfw-table-inner-container" class="table-responsive mdc-data-table">
			<div class="mdc-data-table__table-container">
				<table class="mwb-mwnfw-table mdc-data-table__table mwb-table" id="mwb-mwnfw-wp">
					<thead>
						<tr>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'WP Variables', 'mwb-web-notifications-for-wp' ); ?></th>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'WP Values', 'mwb-web-notifications-for-wp' ); ?></th>
						</tr>
					</thead>
					<tbody class="mdc-data-table__content">
						<?php if ( is_array( $mwnfw_wordpress_details ) && ! empty( $mwnfw_wordpress_details ) ) { ?>
							<?php foreach ( $mwnfw_wordpress_details as $wp_key => $wp_value ) { ?>
								<?php if ( isset( $wp_key ) && 'wp_users' != $wp_key ) { ?>
									<tr class="mdc-data-table__row">
										<td class="mdc-data-table__cell"><?php echo esc_html( $wp_key ); ?></td>
										<td class="mdc-data-table__cell"><?php echo esc_html( $wp_value ); ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="mwb-col-wrap">
		<div id="mwb-mwnfw-table-inner-container" class="table-responsive mdc-data-table">
			<div class="mdc-data-table__table-container">
				<table class="mwb-mwnfw-table mdc-data-table__table mwb-table" id="mwb-mwnfw-sys">
					<thead>
						<tr>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'System Variables', 'mwb-web-notifications-for-wp' ); ?></th>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'System Values', 'mwb-web-notifications-for-wp' ); ?></th>
						</tr>
					</thead>
					<tbody class="mdc-data-table__content">
						<?php if ( is_array( $mwnfw_php_details ) && ! empty( $mwnfw_php_details ) ) { ?>
							<?php foreach ( $mwnfw_php_details as $php_key => $php_value ) { ?>
								<tr class="mdc-data-table__row">
									<td class="mdc-data-table__cell"><?php echo esc_html( $php_key ); ?></td>
									<td class="mdc-data-table__cell"><?php echo esc_html( $php_value ); ?></td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
