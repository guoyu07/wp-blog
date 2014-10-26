<?php
/**
 * Abstract admin settings renderer class.
 *
 * @author Bj�rn Ahrens <bjoern@ahrens.net>
 * @package WP Performance Pack
 * @since 0.9
 */
 
abstract class WPPP_Admin_Renderer {
	protected $wppp = NULL;
	private $admin = NULL;
	
	public function __construct( $wppp_parent ) {
		$this->wppp = $wppp_parent;
	}

	abstract function render_options ();

	abstract function enqueue_scripts_and_styles();

	abstract function add_help_tab();

	public function on_do_options_page() {}

	public function render_page ( $formaction ) {
		add_thickbox();
		?>
		<div class="wrap">
			<img src="<?php echo plugins_url( 'img/wppp_logo_150.png' , __FILE__ ); ?>" style="float:left; margin-right:10px;" />
			<h2 style="height:80px"><?php _e( 'WP Performance Pack - Settings', 'wppp' ); ?></h2>
			<div style="clear:right"></div>
			
			<div class="wppp-sticky" style="float:right; width:195px;">
				<?php
				$show_support = get_transient( 'wppp-support-box' );
				$today = new DateTime();
				if ( $show_support !== $today->format('Y-m-d') ) :
				?>
				<div id="wppp-support-box" class="wppp-support" style="width:95%; border: 1px solid #ddd; background: #fff; padding: 5px; text-align:center; margin-bottom:2em;">
					<h3><?php _e( 'Support WPPP', 'wppp' ); ?></h3>
					<p><?php _e( 'Do you like this Plugin? If so, please support its development.', 'wppp' ); ?></p>
					<p><a href="http://wordpress.org/support/view/plugin-reviews/wp-performance-pack"><?php _e( 'Rate WPPP', 'wppp' );?></a></p>

					<div>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
							<input type="hidden" name="cmd" value="_s-xclick" />
							<input type="hidden" name="hosted_button_id" value="QCZP6B3QNVD8L" />
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal � The safer, easier way to pay online." />
							<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1" />
						</form>
					</div>
					<br/>
					<p><small><a id="hidesupportbox" href="#" class="dismiss"><?php _e( 'Dismiss this message for today.', 'wppp' );?></a></small></p>
				</div>
				<?php endif; ?>
				<div style="width:95%; border: 1px solid #ddd; background: #fff; padding: 5px; text-align:center">
					<h3><?php _e( 'Need help?', 'wppp' );?></h3>
					<p><?php _e( 'Got any questions? Found a bug? Have any Suggestions?', 'wppp' );?></p>
					<p><a class="button" href="http://wordpress.org/support/plugin/wp-performance-pack" target="_blank"><?php _e( 'Visit the support forums', 'wppp' ); ?></a></p>
					<!--<p><a class="thickbox button" href="admin-ajax.php?action=wpppsupport&width=600&height=550" title="System report">Generate system report</a></p>-->
				</div>
			</div>
			
			<div style="margin-right: 200px;">
				<form id="wppp-settings" action="<?php echo $formaction; ?>" method="post">
					<?php 
						if ( $this->wppp->is_network ) {
							wp_nonce_field( 'update_wppp', 'wppp_nonce' );
						}
						settings_fields( 'wppp_options' );
						$this->render_options();
						submit_button(); 
					?>
				</form>
				<?php $this->do_switch_view_button( $formaction, $this->wppp->options['advanced_admin_view'] ? 'false' : 'true' ); ?>
			</div>
		</div>
		<?php
	}

	/*
	 * Feature detection functions
	 */

	function is_object_cache_installed () {
		global $wp_object_cache;
		return ( file_exists ( WP_CONTENT_DIR . '/object-cache.php' )
				&& get_class( $wp_object_cache ) != 'WP_Object_Cache' );
	}

	function is_native_gettext_available () {
		static $result = NULL;
		if ( $result !== NULL) {
			return $result;
		}

		// gettext extension is required
		if ( !extension_loaded( 'gettext' ) ) {
			$result = 1;
			return 1;
		};

		// language dir must exist (an be writeable...)
		$locale = get_locale();
		$path = WP_LANG_DIR . '/' . $locale . '/LC_MESSAGES';
		if ( !is_dir ( $path ) ) {
			if ( !wp_mkdir_p ( $path ) ) {
				$result = 2;
				return 2;
			}
		}

		// load test translation and test if it translates correct
		$mo = new WPPP_Native_Gettext();
		if ( !$mo->import_from_file( sprintf( '%s/native-gettext-test.mo', dirname( __FILE__ ) ) ) ) {
			$result = 3;
			return 3;
		}

		if ( $mo->translate( 'native-gettext-test' ) !== 'success' ) {
			$result = 4;
			return 4;
		}

		// all tests successful => return 0
		$result = 0;
		return 0;
	}

	function is_jit_available () {
		global $wp_version;
		return isset( WPPP_L10n_Improvements::$jit_versions[ $wp_version ] );
	}

	function is_dynamic_images_available () {
		return $this->wppp->modules['WPPP_Dynamic_Images']->is_available();
	}

	function is_regen_thumbs_available () {
		return	$this->is_dynamic_images_available() &&
				( is_plugin_active( 'regenerate-thumbnails/regenerate-thumbnails.php' )
				 || is_plugin_active( 'ajax-thumbnail-rebuild/ajax-thumbnail-rebuild.php' )
				 || is_plugin_active( 'simple-image-sizes/simple_image_sizes.php' ) );
	}

	function is_exif_available () {
		return extension_loaded( 'exif' ) && function_exists( 'exif_thumbnail' ) && function_exists( 'imagecreatefromstring' ) && $this->is_dynamic_images_available();
	}

	/*
	 * Helper functions
	 */

	function do_hint_gettext ( $as_error ) {
		$native = $this->is_native_gettext_available(); 
		if ( $native != 0 ) {
			if ( $as_error ) {
				echo '<div class="ui-state-error ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-alert" style="float:left; margin-right:.3em;"></span>';
			} else {
				echo '<div class="ui-state-highlight ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>';
			}

			switch ( $native ) {
				case 0 :	break;
				case 1 :	printf( __( 'Gettext support requires the %s extension.', 'wppp' ), '<a href="http://www.php.net/gettext">PHP Gettext</a>' );
							break;
				case 2 :
				case 3 :	printf( __( 'Gettext support requires the language directory %s to be writeable for php.', 'wppp' ), '<code>wp-content/languages</code>' );
							break;
				case 4 :	_e( 'Gettext test failed. Activate WPPP debugging for additional info.', 'wppp' );
							break;
			}
			echo '</div>';
		}
		return $native;
	}

	function do_hint_caching () {
		if ( !$this->is_object_cache_installed() ) : ?>
			<div class="ui-state-highlight ui-corner-all" style="padding:.5em">
				<span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>
				<?php printf( __( 'Caching requires a persisten object cache to be effective. Different %sobject cache plugins%s are available for WordPress.', 'wppp' ), '<a href="http://wordpress.org/plugins/search.php?q=object+cache">', '</a>' ); ?>
			</div>
		<?php endif;
	}

	function do_hint_jit ( $as_error ) {
		if ( !$this->is_jit_available() ) {
			if ( $as_error ) {
				echo '<div class="ui-state-error ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-alert" style="float:left; margin-right:.3em;"></span>';
			} else {
				echo '<div class="ui-state-highlight ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>';
			}
			printf( __( 'JIT localization of scripts is only available for WordPress versions %s .', 'wppp' ), implode( ', ', WPPP_L10n_Improvements::$jit_versions ) );
			echo '</div>';
		}
	}

	function do_hint_permalinks ( $as_error ) {
		if ( !$this->is_dynamic_images_available() ) {
			if ( $as_error ) {
				echo '<div class="ui-state-error ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-alert" style="float:left; margin-right:.3em;"></span>';
			} else {
				echo '<div class="ui-state-highlight ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>';
			}
			_e( 'Improved image handling requires Pretty Permalinks and is not available on multisite installations.', 'wppp' );
			echo '</div>';
		}
	}

	function do_hint_exif ( $as_error ) {
		if ( !$this->is_exif_available() ) {
			if ( $as_error ) {
				echo '<div class="ui-state-error ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-alert" style="float:left; margin-right:.3em;"></span>';
			} else {
				echo '<div class="ui-state-highlight ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>';
			}
			_e( 'Use of EXIF thumbnails requires the EXIF extension to be installed and GD support.', 'wppp' );
			echo '</div>';
		}
	}

	function do_hint_regen_thumbs ( $as_error ) {
		if ( !$this->is_regen_thumbs_available() ) {
			if ( $as_error ) {
				echo '<div class="ui-state-error ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-alert" style="float:left; margin-right:.3em;"></span>';
			} else {
				echo '<div class="ui-state-highlight ui-corner-all" style="padding:.5em"><span class="ui-icon ui-icon-info" style="float:left; margin-right:.3em;"></span>';
			}
			 printf( __( 'One of the following plugins has to be installed and activated for Regenerate Thumbnails integration: %s', 'wppp' ), '<a href="http://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a>, <a href="http://wordpress.org/plugins/ajax-thumbnail-rebuild/">AJAX Thumbnail Rebuild</a>, <a href="http://wordpress.org/plugins/simple-image-sizes/">Simple Image Sizes</a>' );
			echo '</div>';
		}
	}

	function do_switch_view_button ( $formaction, $value ) {
		?>
		<form action="<?php echo $formaction; ?>" method="post">
			<?php if ( $this->wppp->is_network ) : ?>
				<?php wp_nonce_field( 'update_wppp', 'wppp_nonce' ); ?>
			<?php endif; ?>
			<?php settings_fields( 'wppp_options' ); ?>
			<input type="hidden" <?php $this->e_opt_name('advanced_admin_view'); ?> value="<?php echo $value; ?>" />
			<input type="submit" class="button" type="submit" value="<?php echo ( $value == 'true' ) ? __( 'Switch to advanced view', 'wppp') : __( 'Switch to simple view', 'wppp' ); ?>" />
		</form>
		<?php
	}

	protected function e_opt_name ( $opt_name ) {
		echo 'name="'.WP_Performance_Pack::wppp_options_name.'['.$opt_name.']"';
	}

	protected function e_checked ( $opt_name, $value = true ) {
		echo $this->wppp->options[$opt_name] === $value ? 'checked="checked" ' : ' ';
	}

	protected function e_checked_or ( $opt_name, $value = true, $or_val = true ) {
		echo $this->wppp->options[$opt_name] === $value || $or_val ? 'checked="checked" ' : ' ';
	}

	protected function e_checked_and ( $opt_name, $value = true, $and_val = true ) {
		echo $this->wppp->options[$opt_name] === $value && $and_val ? 'checked="checked" ' : ' ';
	}
	
	function e_radio_enable ( $id, $opt_name, $disabled = false ) {
		?>
		<label for="<?php echo $id; ?>-enabled"><input id="<?php echo $id; ?>-enabled" type="radio" <?php $this->e_opt_name( $opt_name ); ?> value="true" <?php if ( $disabled ) { echo 'disabled="true" '; } else { $this->e_checked( $opt_name ); } ?>/><?php _e( 'Enabled', 'wppp' ); ?></label>&nbsp;
		<label for="<?php echo $id; ?>-disabled"><input id="<?php echo $id; ?>-disabled" type="radio" <?php $this->e_opt_name( $opt_name ); ?> value="false" <?php if( $disabled ) { echo 'disabled="true" checked="checked"'; } else { $this->e_checked( $opt_name, false ); } ?>/><?php _e( 'Disabled', 'wppp' ); ?></label>
		<?php
	}
	
	function e_checkbox ( $id, $opt_name, $label, $disabled = false ) {
		?>
		<label for="<?php echo $id; ?>"><input id="<?php echo $id; ?>" type="checkbox" <?php $this->e_opt_name( $opt_name ); ?> value="true" <?php if ( $disabled ) { echo 'disabled="true" '; } else { $this->e_checked( $opt_name ); } ?>/><?php echo $label; ?></label>
		<?php
	}
}

?>