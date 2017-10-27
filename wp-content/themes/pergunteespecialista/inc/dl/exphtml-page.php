<h1>Exportar HTML</h1>
<p>
Exportar todos os Posts em um arquivo HTML
</p>

<form method="post" action="options.php">
  <?php settings_fields('pergunteEspecialista-settings-group'); ?>
  <?php do_settings_sections('pergunteespecialista-exphtml'); ?>
</form>
