<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$cepSettings=get_option( 'cep_settings' );

if($cepSettings['sel_gp']=='1'){ ?>
	
	<div id="cepGooglePanel" class="cepPanel">
		<g:comments href="<?php echo get_permalink();?>" width="<?php echo $cepSettings["google_plus_width"];?>" first_party_property="BLOGGER" view_type="FILTERED_POSTMOD"></g:comments>
	</div>
	
<?php }

if($cepSettings['sel_dq']=='1'){ ?>
	
	<div id="cepDisquesPanel" class="cepPanel">
		<div id="disqus_thread"></div>
	    <script type="text/javascript">
		var disqus_shortname = '<?php echo $cepSettings['disques_url'];?>'; // required: replace example with your forum shortname

		(function() {
		    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	    </script>
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
	
<?php }?>

<div id="cepTempGP"></div>