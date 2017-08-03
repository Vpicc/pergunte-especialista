<?php
// Adiciona pagina do google analytics
function pergunteEspecialista_add_analytics_page(){

	add_menu_page('Google Analytics', 'Analytics', 'manage_options', 'pergunteespecialista-analytics', 'pergunteEspecialista_theme_create_page');

	add_action('admin_init', 'pergunteEspecialista_custom_analytics');

}

add_action('admin_menu', 'pergunteEspecialista_add_analytics_page');

function pergunteEspecialista_theme_create_page(){
	require_once(get_template_directory() . '/peanalytics-page.php');
}

function pergunteEspecialista_custom_analytics(){
	register_setting('pergunteEspecialista-settings-group', 'Google_code');
	add_settings_section('pergunteEspecialista_analytics_code', 'Codigo do Google', 'pergunteEspecialista_analytics_option', 'pergunteespecialista-analytics');
	add_settings_field( 'analytics-code', 'Codigo', 'pe_analytics_code', 'pergunteespecialista-analytics', 'pergunteEspecialista_analytics_code');
}

function pergunteEspecialista_analytics_option(){
}

function pe_analytics_code(){
	$GAPICode = esc_attr(get_option('Google_code'));
	echo '<input type="text" name="Google_code" value="'. $GAPICode .'" placeholder="Codigo de API do Google" />';
}

// Adiciona o Codigo do Analytics a todos os headers
function pedev_google_analytics() {
	$GAPICode = get_option('Google_code');
	if(@$GAPICode != ''){
?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', '<?php echo $GAPICode; ?>', 'auto');
	ga('send', 'pageview');

	</script>

<?php }}
add_action( 'wp_head', 'pedev_google_analytics', 10 );
?>
