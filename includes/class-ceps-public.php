<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'CommentEngineProPublic' ) ) :

final class CommentEngineProPublic {

	public function __construct() {
		add_action('wp_enqueue_scripts', array( $this, 'include_scripts' ));
		add_action('comment_form_before', array($this,'drawTabs'));
		add_action('comment_form_after', array($this,'printCommentServices'));
	}
	
	function include_scripts(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script('cep_googleplus', "https://apis.google.com/js/plusone.js");
		wp_enqueue_style('cep_front_css', CEP_PLUGIN_URL . "css/front_style.css");
		wp_enqueue_style('CEPBootstrapCDN', "//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");
	}
	
	function drawTabs(){
		include_once( CEP_PLUGIN_DIR.'includes/drawTabs.php' );
	}
	
	function printCommentServices(){
		include_once( CEP_PLUGIN_DIR.'includes/drawCEPPanel.php' );
	}

}

endif;

new CommentEngineProPublic();
?>