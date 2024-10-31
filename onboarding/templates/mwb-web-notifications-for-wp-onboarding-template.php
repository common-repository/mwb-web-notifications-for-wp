<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Makewebbetter_Onboarding
 * @subpackage Makewebbetter_Onboarding/onboarding/templates/
 */

global $mwnfw_mwb_mwnfw_obj;
$mwnfw_onboarding_form_fields =
// desc - filter for trial.
apply_filters( 'mwb_mwnfw_on_boarding_form_fields', array() );
?>

<?php if ( ! empty( $mwnfw_onboarding_form_fields ) ) : ?>
	<div class="mdc-dialog mdc-dialog--scrollable <? echo 
	//desc - filter for trial.
	apply_filters('mwb_stand_dialog_classes', 'mwb-web-notifications-for-wp' )?>">
		<div class="mwb-mwnfw-on-boarding-wrapper-background mdc-dialog__container">
			<div class="mwb-mwnfw-on-boarding-wrapper mdc-dialog__surface" role="alertdialog" aria-modal="true" aria-labelledby="my-dialog-title" aria-describedby="my-dialog-content">
				<div class="mdc-dialog__content">
					<div class="mwb-mwnfw-on-boarding-close-btn">
						<a href="#"><span class="mwnfw-close-form material-icons mwb-mwnfw-close-icon mdc-dialog__button" data-mdc-dialog-action="close">clear</span></a>
					</div>
					<h3 class="mwb-mwnfw-on-boarding-heading mdc-dialog__title"><?php esc_html_e( 'Welcome to MakeWebBetter', 'mwb-web-notifications-for-wp' ); ?> </h3>
					<p class="mwb-mwnfw-on-boarding-desc"><?php esc_html_e( 'We love making new friends! Subscribe below and we promise to keep you up-to-date with our latest new plugins, updates, awesome deals and a few special offers.', 'mwb-web-notifications-for-wp' ); ?></p>

					<form action="#" method="post" class="mwb-mwnfw-on-boarding-form">
						<?php
						$mwnfw_onboarding_html = $mwnfw_mwb_mwnfw_obj->mwb_mwnfw_plug_generate_html( $mwnfw_onboarding_form_fields );
						echo esc_html( $mwnfw_onboarding_html );
						?>
						<div class="mwb-mwnfw-on-boarding-form-btn__wrapper mdc-dialog__actions">
							<div class="mwb-mwnfw-on-boarding-form-submit mwb-mwnfw-on-boarding-form-verify ">
								<input type="submit" class="mwb-mwnfw-on-boarding-submit mwb-on-boarding-verify mdc-button mdc-button--raised" value="<?php esc_html_e( 'Send Us', 'mwb-web-notifications-for-wp' ); ?>">
							</div>
							<div class="mwb-mwnfw-on-boarding-form-no_thanks">
								<a href="#" class="mwb-mwnfw-on-boarding-no_thanks mdc-button" data-mdc-dialog-action="discard"><?php esc_html_e( 'Skip For Now', 'mwb-web-notifications-for-wp' ); ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="mdc-dialog__scrim"></div>
	</div>
<?php endif; ?>
