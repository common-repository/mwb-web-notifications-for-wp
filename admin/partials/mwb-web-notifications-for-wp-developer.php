<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to list all the hooks and filter with their descriptions.
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
$mwnfw_developer_admin_hooks =
// desc - filter for trial.
	apply_filters( 'mwnfw_developer_admin_hooks_array', array() );
$count_admin                = filtered_array( $mwnfw_developer_admin_hooks );
$mwnfw_developer_public_hooks =
// desc - filter for trial.
	apply_filters( 'mwnfw_developer_public_hooks_array', array() );
$count_public = filtered_array( $mwnfw_developer_public_hooks );
?>
<!--  template file for admin settings. -->
<div class="mwnfw-section-wrap">
	<div class="mwb-col-wrap">
		<div id="admin-hooks-listing" class="table-responsive mdc-data-table">
			<table class="mwb-mwnfw-table mdc-data-table__table mwb-table"  id="mwb-mwnfw-wp">
				<thead>
				<tr><th class="mdc-data-table__header-cell"><?php esc_html_e( 'Admin Hooks', 'mwb-web-notifications-for-wp' ); ?></th></tr>
				<tr>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Type of Hook', 'mwb-web-notifications-for-wp' ); ?></th>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Hooks', 'mwb-web-notifications-for-wp' ); ?></th>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Hooks description', 'mwb-web-notifications-for-wp' ); ?></th>
				</tr>
				</thead>
				<tbody class="mdc-data-table__content">
				<?php
				if ( ! empty( $count_admin ) ) {
					foreach ( $count_admin as $k => $v ) {
						if ( isset( $v['action_hook'] ) ) {
							?>
						<tr class="mdc-data-table__row"><td class="mdc-data-table__cell"><?php esc_html_e( 'Action Hook', 'mwb-web-notifications-for-wp' ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['action_hook'] ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['desc'] ); ?></td></tr>
							<?php
						} else {
							?>
							<tr class="mdc-data-table__row"><td class="mdc-data-table__cell"><?php esc_html_e( 'Filter Hook', 'mwb-web-notifications-for-wp' ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['filter_hook'] ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['desc'] ); ?></td></tr>
							<?php
						}
					}
				} else {
					?>
					<tr class="mdc-data-table__row"><td><?php esc_html_e( 'No Hooks Found', 'mwb-web-notifications-for-wp' ); ?><td></tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="mwb-col-wrap">
		<div id="public-hooks-listing" class="table-responsive mdc-data-table">
			<table class="mwb-mwnfw-table mdc-data-table__table mwb-table" id="mwb-mwnfw-sys">
				<thead>
				<tr><th class="mdc-data-table__header-cell"><?php esc_html_e( 'Public Hooks', 'mwb-web-notifications-for-wp' ); ?></th></tr>
				<tr>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Type of Hook', 'mwb-web-notifications-for-wp' ); ?></th>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Hooks', 'mwb-web-notifications-for-wp' ); ?></th>
					<th class="mdc-data-table__header-cell"><?php esc_html_e( 'Hooks description', 'mwb-web-notifications-for-wp' ); ?></th>
				</tr>
				</thead>
				<tbody class="mdc-data-table__content">
				<?php
				if ( ! empty( $count_public ) ) {
					foreach ( $count_public as $k => $v ) {
						if ( isset( $v['action_hook'] ) ) {
							?>
						<tr class="mdc-data-table__row"><td class="mdc-data-table__cell"><?php esc_html_e( 'Action Hook', 'mwb-web-notifications-for-wp' ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['action_hook'] ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['desc'] ); ?></td></tr>
							<?php
						} else {
							?>
							<tr class="mdc-data-table__row"><td class="mdc-data-table__cell"><?php esc_html_e( 'Filter Hook', 'mwb-web-notifications-for-wp' ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['filter_hook'] ); ?></td><td class="mdc-data-table__cell"><?php echo esc_html( $v['desc'] ); ?></td></tr>
							<?php
						}
					}
				} else {
					?>
					<tr class="mdc-data-table__row"><td><?php esc_html_e( 'No Hooks Found', 'mwb-web-notifications-for-wp' ); ?><td></tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
/**
 * Function name filtered_array.
 * this function is used to filter array.
 *
 * @param array $argu contains arguments.
 * @since 1.0.0
 * @return array
 */
function filtered_array( $argu ) {
	$count_admin = array();
	foreach ( $argu as $key => $value ) {
		foreach ( $value as $k => $originvalue ) {
			if ( isset( $originvalue['action_hook'] ) ) {
				$val                            = str_replace( ' ', '', $originvalue['action_hook'] );
				$val                            = str_replace( "do_action('", '', $val );
				$val                            = str_replace( "');", '', $val );
				$count_admin[ $k ]['action_hook'] = $val;
			}
			if ( isset( $originvalue['filter_hook'] ) ) {
				$val                            = str_replace( ' ', '', $originvalue['filter_hook'] );
				$val                            = str_replace( "apply_filters('", '', $val );
				$val                            = str_replace( "',array());", '', $val );
				$count_admin[ $k ]['filter_hook'] = $val;
			}
			$vale                    = str_replace( '// desc - ', '', $originvalue['desc'] );
			$count_admin[ $k ]['desc'] = $vale;
		}
	}
	return $count_admin;
}
