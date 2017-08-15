<?php
// Adiciona pagina do google analytics
function pergunteEspecialista_add_reCaptcha_page(){

	add_menu_page('Google recaptcha', 'reCaptcha', 'manage_options', 'pergunteespecialista-recaptcha', 'pergunteEspecialista_theme_create_recaptcha_page');

	add_action('admin_init', 'pergunteEspecialista_custom_recaptcha');

}

add_action('admin_menu', 'pergunteEspecialista_add_recaptcha_page');

function pergunteEspecialista_theme_create_recaptcha_page(){
	require_once(get_template_directory() . '/perecaptcha-page.php');
}

function pergunteEspecialista_custom_recaptcha(){
	register_setting('pergunteEspecialista-settings-group', 'Google_recaptcha');
  register_setting('pergunteEspecialista-settings-group', 'Google_recaptcha_secret');
	add_settings_section('pergunteEspecialista_recaptcha_code', 'Codigos do Google', 'pergunteEspecialista_analytics_option', 'pergunteespecialista-recaptcha');
	add_settings_field( 'recaptcha-code', 'Site-key', 'pe_recaptcha_code', 'pergunteespecialista-recaptcha', 'pergunteEspecialista_recaptcha_code');
  add_settings_field( 'recaptcha-secret', 'Secret', 'pe_recaptcha_secret', 'pergunteespecialista-recaptcha', 'pergunteEspecialista_recaptcha_code');

}

function pergunteEspecialista_recaptcha_option(){
}


function pe_recaptcha_code(){
	$GAPICode = esc_attr(get_option('Google_recaptcha'));
	echo '<input type="text" name="Google_recaptcha" value="'. $GAPICode .'" placeholder="Site-key do Google" size="60" />';
}

function pe_recaptcha_secret(){
  $GAPISecret = esc_attr(get_option('Google_recaptcha_secret'));
	echo '<input type="text" name="Google_recaptcha_secret" value="'. $GAPISecret .'" placeholder="Secret do Google" size="60" />';
}


// Adiciona o Codigo do Analytics a todos os headers
function pedev_google_recaptcha() {
	$GAPICode = get_option('Google_recaptcha');
	if(@$GAPICode != ''){
?>
	<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>

<?php }}
add_action( 'wp_head', 'pedev_google_recaptcha', 10 );
?>
