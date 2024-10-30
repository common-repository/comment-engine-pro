<?php
/**
 * Plugin Name: Comment Engine Pro
 * Plugin URI: http://wordpress.org/plugins/comment-engine-pro/
 * Description: Adds discussion on Google+, Disques to your Page/Post itself.
 * Version: 1.0
 * Author: Rex1989
 * Author URI: http://profiles.wordpress.org/rex1989
 * License: GPLv2 or later
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'CommentEnginePro' ) ) :

final class CommentEnginePro {
	
	public function __construct() {
		$this->define_constants();
		$this->includes();
	}
	
	private function define_constants() {
		define( 'CEP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		define( 'CEP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'CEP_VERSION', '1.0' );
	}

	private function includes() {
		if (is_admin()) {
			include_once( CEP_PLUGIN_DIR.'includes/admin/class-ceps-admin.php' );
		}
		else {
			include_once( CEP_PLUGIN_DIR.'includes/class-ceps-public.php' );
		}
	}

}

endif;

new CommentEnginePro();
?>
