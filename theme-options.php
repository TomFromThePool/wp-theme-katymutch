<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'km_options', 'km_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'katymutch' ), __( 'Theme Options', 'katymutch' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'katymutch' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'katymutch' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'km_options' ); ?>
			<?php $options = get_option( 'km_theme_options' ); ?>

			<table class="form-table">


				<?php
				/**
				 * Archive entry page limit
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Archive Page', 'katymutch' ); ?></th>
					<td>
						<input id="km_theme_options[archive_posts_per_page]" class="regular-text" type="text" name="km_theme_options[archive_posts_per_page]" value="<?php esc_attr_e( $options['archive_posts_per_page'] ); ?>" />
						<label class="description" for="km_theme_options[archive_posts_per_page]"><?php _e( 'Posts per Archive page', 'katymutch' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Category page entry limit
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Category Page', 'katymutch' ); ?></th>
					<td>
						<input id="km_theme_options[category_posts_per_page]" class="regular-text" type="text" name="km_theme_options[category_posts_per_page]" value="<?php esc_attr_e( $options['category_posts_per_page'] ); ?>" />
						<label class="description" for="km_theme_options[category_posts_per_page]"><?php _e( 'Posts per Category page', 'katymutch' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'katymutch' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {

	// Say our text option must be safe text with no HTML tags
	if(! is_numeric($input['archive_posts_per_page'])){
		$input['archive_posts_per_page'] = null;
	} else{
		$input['archive_posts_per_page'] = intval($input['archive_posts_per_page']);	
	}
	
	if(! is_numeric($input['category_posts_per_page'])){
		$input['category_posts_per_page'] = null;
	} else{
		$input['category_posts_per_page'] = intval($input['category_posts_per_page']);	
	}
	
	
	/*$input['archive_posts_per_page'] = wp_filter_nohtml_kses( $input['archive_posts_per_page'] );
	$input['category_posts_per_page'] = wp_filter_nohtml_kses( $input['category_posts_per_page'] );*/


	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
