<h1>Google reCaptcha</h1>
<?php settings_errors(); ?>
<p>
  Caso queira utilizar Google reCaptcha em sua página, cole o codigo de API do google no campo abaixo.
</p>

<form method="post" action="options.php">
  <?php settings_fields('pergunteEspecialista-settings-group'); ?>
  <?php do_settings_sections('pergunteespecialista-recaptcha'); ?>
  <?php submit_button(); ?>
</form>
