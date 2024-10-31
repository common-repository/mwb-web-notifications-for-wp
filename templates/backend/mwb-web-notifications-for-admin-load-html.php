<?php
/**
 * Load html for meta field
 *
 * This file is used to add meta field in notification cpt.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/templates/backend
 */

switch ( $args['type'] ) {

	case 'img_parent_div':
		?>
	<div class="<?php echo esc_attr( $args['parent-div-class'] ); ?> mwb_mwnfw_previous_img"><div id="<?php echo esc_attr( $args['div-id'] ); ?>" class="<?php echo esc_attr( $args['div-class'] ); ?>" data-url="<?php echo esc_attr( $args['url'] ); ?>" ></div>
	<img src="<?php echo esc_url( $args['url'] ); ?>" height="auto" width="100" id="<?php echo esc_attr( $args['img-id'] ); ?>" ></div>

		<?php
		break;

	case 'div':
		?>
	<div id="<?php echo ( isset( $args['id'] ) ? esc_html( $args['id'] ) : '' ); ?>" ></div>
		<?php
		break;

	case 'button':
		?>
	<div class="mwb-form-group">
	<div class="mwb-form-group__control">
		<button class="<?php echo ( isset( $args['class'] ) ? esc_attr( $args['class'] ) : '' ); ?>" name= "<?php echo ( isset( $args['name'] ) ? esc_html( $args['name'] ) : esc_html( $args['id'] ) ); ?>"
			id="<?php echo esc_attr( $args['id'] ); ?>">
			<span><?php echo ( isset( $args['button_text'] ) ? esc_html( $args['button_text'] ) : '' ); ?></span>
		</button>
	</div>
	</div>
		<?php
		break;
	case 'select':
		?>
	<div class="mwb-form-group">
	<div class="mwb-form-group__label">
		<label class="mwb-form-label" for="<?php echo esc_attr( $args['id'] ); ?>"><?php echo ( isset( $args['title'] ) ? esc_html( $args['title'] ) : '' ); // WPCS: XSS ok. ?></label>
	</div>
	<div class="mwb-form-group__control">
		<div class="mwb-form-select">
			<select id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo ( isset( $args['name'] ) ? esc_html( $args['name'] ) : '' ); ?><?php echo ( 'multiselect' === $args['type'] ) ? '[]' : ''; ?>" id="<?php echo esc_attr( $args['id'] ); ?>" class="mdl-textfield__input <?php echo ( isset( $args['class'] ) ? esc_attr( $args['class'] ) : '' ); ?>" <?php echo 'multiselect' === $args['type'] ? 'multiple="multiple"' : ''; ?> >
				<?php
				foreach ( $args['options'] as $mwnfw_key => $mwnfw_val ) {
					?>
					<option value="<?php echo esc_attr( $mwnfw_key ); ?>"
						<?php
						if ( is_array( $args['value'] ) ) {
							selected( in_array( (string) $mwnfw_key, $args['value'], true ), true );
						} else {
							selected( $args['value'], (string) $mwnfw_key );
						}
						?>
						>
						<?php echo esc_html( $mwnfw_val ); ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	</div>

		<?php
		break;

	case 'text':
		?>
	<div class="mwb-form-group">
		<div class="mwb-form-group__label">
			<label class="mwb_mwnfw_field_label"><?php echo esc_attr( isset( $args['label'] ) ? sanitize_text_field( wp_unslash( $args['label'] ) ) : '' ); ?>
			</label>
		</div>
		<div class="mwb-form-group__control">
			<input type="text" class="<?php echo esc_attr( isset( $args['class'] ) ? sanitize_text_field( wp_unslash( $args['class'] ) ) : '' ); ?>" name="<?php echo esc_attr( $args['id'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_attr( ! empty( $args['value'] ) ? $args['value'] : $args['default_val'] ); ?>" placeholder="<?php echo esc_attr( isset( $args['placeholder'] ) ? $args['placeholder'] : '' ); ?>">
		</div>
	</div>
		<?php
		break;
	case 'custom-text':
		?>
	<div class="mwb-form-group">
		<div class="mwb-form-group__label">
			<label class="mwb_mwnfw_field_label"><?php echo esc_attr( isset( $args['label'] ) ? sanitize_text_field( wp_unslash( $args['label'] ) ) : '' ); ?>
			</label>
		</div>
		<div class="mwb-form-group__control">
		<?php
		if ( 0 !== $i ) {
			?>
				<div class="mwb-mwnfw-dynamic-qa__wrapper">
				<?php } ?>

				<input type="text" class="<?php echo esc_attr( isset( $new_arr['class'] ) ? sanitize_text_field( wp_unslash( $new_arr['class'] ) ) : '' ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_attr( $args['value'] ); ?>" placeholder="<?php echo esc_attr( isset( $args['placeholder'] ) ? sanitize_text_field( wp_unslash( $args['placeholder'] ) ) : '' ); ?>">

				<?php
				if ( 0 !== $i ) {
					?>
					<button class="mwb_mwnfw_remove_dynamic_qa_field" >X</button>
					</div>
				<?php } ?>

		</div>
	</div>

		<?php
		break;
	case 'hidden':
		?>
	<div class="mwb-form-group">
		<div class="mwb-form-group__label">
			<label class="mwb_mwnfw_field_label"><?php echo esc_attr( isset( $args['label'] ) ? sanitize_text_field( wp_unslash( $args['label'] ) ) : '' ); ?>
			</label>
		</div>
		<div class="mwb-form-group__control">
			<input type="hidden"  name="<?php echo esc_attr( $args['id'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_attr( $args['value'] ); ?>" placeholder="<?php echo esc_attr( isset( $args['placeholder'] ) ? sanitize_text_field( wp_unslash( $args['placeholder'] ) ) : '' ); ?>">
		</div>
	</div>

		<?php
		break;
	case 'number':
		?>

	<div class="mwb-form-group">
		<div class="mwb-form-group__label">
			<label class="mwb_mwnfw_field_label"><?php echo esc_attr( isset( $args['label'] ) ? sanitize_text_field( wp_unslash( $args['label'] ) ) : '' ); ?>

			</label>
		</div>
		<div class="mwb-form-group__control">
		<input type="number" name="<?php echo esc_attr( $args['id'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_html( $args['value'] ); ?>">
		</div>
	</div>

		<?php
		break;
	case 'file':
		?>
		<div class="mwb-form-group">
			<div class="mwb-form-group__label">
			<label class="mwb_mwnfw_field_label"><?php echo esc_attr( isset( $args['label'] ) ? sanitize_text_field( wp_unslash( $args['label'] ) ) : '' ); ?>
				</label>
			</div>
			<div class="mwb-form-group__control">
				<input type="file" name="<?php echo esc_attr( $args['id'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" accept="image/*" >
			</div>
		</div>

		<?php
		break;

	case 'radio':
		?>
	<div class="mwb-form-group">
		<div class="mwb-form-group__label">
		<label class="mwb_mwnfw_field_label"><?php echo esc_html( $args['label'], 'mwb-web-notifications-for-wp' ); ?>
			</label>
		</div>
		<div class="mwb-form-group__control">
			<?php
			foreach ( $args['options'] as $radio_key => $radio_val ) {
				?>
			<input type="radio" name="<?php echo esc_attr( isset( $args['id'] ) ? sanitize_text_field( wp_unslash( $args['id'] ) ) : '' ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_attr( $radio_key ); ?>" <?php checked( $radio_key, $args['value'] ); ?>>
				<?php echo esc_html( $radio_val ); ?>

				<?php
			}

			?>
		</div>
	</div>

		<?php
		break;
	default:
		break;
}
	$i = 1;
