<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'CommentEngineProAdmin' ) ) :

final class CommentEngineProAdmin {

	public function __construct() {
		
		if( get_option( 'cep_settings' ) === false ) {
			$this->setDefaultSettings();
		}
		add_action( 'admin_menu', array( $this, 'admin_menu' ));
	}
	
	function admin_menu(){
		add_submenu_page(
			'edit-comments.php',
			'Comment Engine Pro',
			'Comment Engine Pro',
			'moderate_comments',
			'comment_engine_pro',
			array( $this, 'comment_engine_admin' )
		);
	}

	function comment_engine_admin(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script('wpl_admin_js', CEP_PLUGIN_URL . 'js/admin.js');
		wp_enqueue_style('wpl_admin_css', CEP_PLUGIN_URL . "css/admin.css");
		wp_enqueue_style('bootstrap_admin_css', CEP_PLUGIN_URL . "js/bootstrap/css/bootstrap.min.css");
		wp_enqueue_script('bootstrap_admin_js', CEP_PLUGIN_URL . 'js/bootstrap/js/bootstrap.min.js');
		$mode='display';
		if(isset($_POST['cep_mode'])){
			$mode='update';
		}
		switch ($mode){
			case 'display':$this->displaySettings();break;
			case 'update': $this->updateSettings();break;
		}
	}
	
	function displaySettings(){
		include_once( CEP_PLUGIN_DIR.'includes/admin/adminDesign.php' );
	}
	
	function updateSettings(){
		$cepSettings = array(
				'disques_url' => $_POST['disques_url'],
				'sel_wp' => $_POST['sel_wordpress'],
				'sel_gp' => $_POST['sel_google'],
				'sel_dq' => $_POST['sel_disques'],
				'sel_default' => $_POST['sel_default'],
				'google_plus_width'=> $_POST['google_width']
		);
		update_option( 'cep_settings', $cepSettings );
		
		$this->displaySettings();
	}
	
	function setDefaultSettings(){
		$cepSettings = array(
				'disques_url' => '',
				'sel_wp' => '1',
				'sel_gp' => '1',
				'sel_dq' => '0',
				'sel_default' => '1',
				'google_plus_width'=> '500'
		);
		update_option( 'cep_settings', $cepSettings );
	}
}

endif;

new CommentEngineProAdmin();
?>