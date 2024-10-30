<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$cepSettings=get_option( 'cep_settings' );
?>
<form id="frmCEP" action="?page=comment_engine_pro" method="post">
	<input type="hidden" id="frm_disques_url" name="disques_url" value=''/>
	<input type="hidden" id="frm_sel_wordpress" name="sel_wordpress" value=''/>
	<input type="hidden" id="frm_sel_google" name="sel_google" value=''/>
	<input type="hidden" id="frm_sel_disques" name="sel_disques" value=''/>
	<input type="hidden" id="frm_sel_default" name="sel_default" value=''/>
	<input type="hidden" id="frm_gp_width" name="google_width" value=''/>
	<input type="hidden" name="cep_mode" value='1'/>
</form>

<div id="cepContainer">
	<h3>Comment Engine Pro Settings</h3>
	<p>You need to create your Site/Blog profile on <b>Disques</b>. Follow instructions bellow to do so -</p>
	<ol>
		<li><a target="_blank" href="http://disqus.com/admin/create/">Click Here</a> to Resister Site on <b>Diaques</b></li>
		<li>Enter your Site/Blog Title as <b>Site Name</b>. See Example: <a data-toggle="modal" data-target="#disques_screen_shot">Step 1</a>
			<p><i><b>Please note:</b> This Name will display at top of Disques comment module on your site/blog.</i></p>
		</li>
		<li>Choose <b>Unique Disqus URL</b> and enter here(without .disques.com):<input type="text" id="disquesSiteUrl" value="<?php echo $cepSettings['disques_url'];?>" />. See Example: <a data-toggle="modal" data-target="#disques_screen_shot">Step 2</a>
			<p><i><b>Please note:</b> This url does not reffere to your site/blog url. You are free to choose any available url.</i></p>
		</li>
		<li>Choose any <b>Category</b>. See Example: <a data-toggle="modal" data-target="#disques_screen_shot">Step 3</a></li>
		<li>Click on <b>Finish Registration</b> Button. See Example: <a data-toggle="modal" data-target="#disques_screen_shot">Step 4</a></li>
	</ol><br>
	
	<h4>Select Comment Systems</h4>
	<p>Select comment systems to your site/blog pages/posts. You may select multiple at a time.</p>
	<span class="cep_settings_saperator"><input type="checkbox" id="cep_sel_wordpress" <?php echo ($cepSettings['sel_wp']=='1')?'checked="checked"':'';?> > Wordpress</span> 
	<span class="cep_settings_saperator"><input type="checkbox" id="cep_sel_googleplus" <?php echo ($cepSettings['sel_gp']=='1')?'checked="checked"':'';?> > Google + </span>
	<span class="cep_settings_saperator"><input type="checkbox" id="cep_sel_disques" <?php echo ($cepSettings['sel_dq']=='1')?'checked="checked"':'';?> > Disques </span>
	<br><br><br>
	
	<h4>Select Default Comment System</h4>
	<p>Choosen service tab will available on site load. User can choose other by click on relative tab</p>
	<span class="cep_settings_saperator"><input type="radio" name="cep_def" id="cep_sel_def_wordpress" <?php echo ($cepSettings['sel_default']=='1')?'checked="checked"':'';?> > Wordpress</span> 
	<span class="cep_settings_saperator"><input type="radio" name="cep_def" id="cep_sel_def_googleplus" <?php echo ($cepSettings['sel_default']=='2')?'checked="checked"':'';?> > Google + </span>
	<span class="cep_settings_saperator"><input type="radio" name="cep_def" id="cep_sel_def_disques" <?php echo ($cepSettings['sel_default']=='3')?'checked="checked"':'';?> > Disques </span>
	<br><br><br>
	
	<h4>Google Plus Width</h4>
	<p>Adjust Google+ comments width as per your theme.</p>
	<input id="cep_gp_width" value="<?php echo $cepSettings['google_plus_width'];?>" />
	<br><br><br>
	
	<button class="btn btn-primary" id="cep_submit">Save Settings</button>
</div>
<div class="modal fade" id="disques_screen_shot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Disques Site Registration</h4>
      </div>
      <div class="modal-body">
        <img style="width: 100%" src="<?php echo CEP_PLUGIN_URL.'images/disques_setup.png';?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>