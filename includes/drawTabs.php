<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$wordpress_username='Wordpress';
$current_user = wp_get_current_user();
if ( 0 != $current_user->ID ) {
	$wordpress_username=$current_user->display_name;
}
$cepSettings=get_option( 'cep_settings' );
$default='sel_wp';
switch ($cepSettings['sel_default']){
	case '1':$default='sel_wp';break;
	case '2':$default='sel_gp';break;
	case '3':$default='sel_dq';break;
}
$default_tab='cepChangeTab(jQuery("#cepTabWP"),"wordpress");';
if($cepSettings[$default]!='1'){
	$flag=true;
	if($cepSettings['sel_wp']=='1'){ $default_tab='cepChangeTab(jQuery("#cepTabWP"),"wordpress");'; $flag=false; }
	
	if($cepSettings['sel_gp']=='1' && $flag){ $default_tab='cepChangeTab(jQuery("#cepTabGP"),"google");'; $flag=false; }
	
	if($cepSettings['sel_dq']=='1' && $flag){ $default_tab='cepChangeTab(jQuery("#cepTabDQ"),"disques");'; $flag=false; }
	
	if($flag) $default_tab='cepHideAllServices();';
}
else{
	switch ($default){
		case 'sel_wp': $default_tab='cepChangeTab(jQuery("#cepTabWP"),"wordpress");'; break;
		case 'sel_gp': $default_tab='cepChangeTab(jQuery("#cepTabGP"),"google");'; break;
		case 'sel_dq': $default_tab='cepChangeTab(jQuery("#cepTabDQ"),"disques");'; break;
	}
}

$firstTab=false;
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	setTimeout('<?php echo $default_tab;?>', 3000);
});
function cepChangeTab(obj,service){
	jQuery('.cepTab').css('backgroundColor','#a8cc45');
	jQuery(obj).css('backgroundColor','#90b4cf');

	jQuery('.cepPanel').hide(500);
	jQuery('#respond').hide(500);

	if(service=='wordpress') jQuery('#respond').show(500);
	else if(service=='google'){
		jQuery('#cepGooglePanel').show(500);
	} 
	else if(service=='disques') jQuery('#cepDisquesPanel').show(500);
}
function cepHideAllServices(){
	jQuery('.cepPanel').hide();
	jQuery('#respond').hide();
}
</script>
<div id="cepTabContainer">
	<?php if($cepSettings['sel_wp']=='1'){?>
	
		<span id="cepTabWP" class="cepTab" onclick="cepChangeTab(this,'wordpress');">
			<i class="fa fa-wordpress"></i>  <?php echo $wordpress_username;?>
		</span>
		<?php $firstTab=true;?>
		
	<?php }?>
	<?php if($cepSettings['sel_gp']=='1'){?>
		
		<?php if($firstTab) echo '<span class="cepTabSaperator"></span>';?>
		<span id="cepTabGP" class="cepTab" onclick="cepChangeTab(this,'google');">
			<i class="fa fa-google-plus-square"></i>  Google+
		</span>
		<?php $firstTab=true;?>
		
	<?php }?>
	<?php if($cepSettings['sel_dq']=='1'){?>
		
		<?php if($firstTab) echo '<span class="cepTabSaperator"></span>';?>
		<span id="cepTabDQ" class="cepTab" onclick="cepChangeTab(this,'disques');">
			<img src="<?php echo CEP_PLUGIN_URL.'images/disques.png';?>" />  Disqus
		</span>
		<?php $firstTab=true;?>
		
	<?php }?>
	
</div>
