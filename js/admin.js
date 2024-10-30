jQuery(document).ready(function (){
	jQuery('#cep_submit').click(function(){
		var disq_url=jQuery('#disquesSiteUrl').val().trim()
		
		jQuery('#frm_sel_wordpress').val(''+jQuery('#cep_sel_wordpress:checked').length);
		
		jQuery('#frm_sel_google').val(''+jQuery('#cep_sel_googleplus:checked').length);
		
		jQuery('#frm_sel_disques').val(''+jQuery('#cep_sel_disques:checked').length);
		
		jQuery('#frm_gp_width').val(''+jQuery('#cep_gp_width').val());
		
		if(jQuery('#cep_sel_def_wordpress:checked').length==1) jQuery('#frm_sel_default').val('1');
		
		if(jQuery('#cep_sel_def_googleplus:checked').length==1) jQuery('#frm_sel_default').val('2');
		
		if(jQuery('#cep_sel_def_disques:checked').length==1) jQuery('#frm_sel_default').val('3');
		
		if(disq_url=='' && jQuery('#cep_sel_disques:checked').length==1){
			jQuery('#disquesSiteUrl').val('');
			jQuery('#disquesSiteUrl').focus();
			alert('Please enter Unique Disqus URL if you want to enable Disques');
		}
		else{
			jQuery('#frm_disques_url').val(disq_url);
			jQuery('#frmCEP').submit();
		}
	});
});