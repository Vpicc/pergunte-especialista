<h1>Google Analytics</h1>
<?php settings_errors(); ?>
<p>
  Caso queira utilizar Google Analytics em sua página, marque a caixa e cole o codigo de API do google no campo abaixo.
</p>

<form method="post" action="options.php">
  <?php settings_fields('pergunteEspecialista-settings-group'); ?>
  <?php do_settings_sections('pergunteespecialista-analytics'); ?>
  <?php submit_button(); ?>
</form>
