<h1>Exportar Posts</h1>
<p>
Exportar todos os Posts em um arquivo HTML, ou resumo dos posts em um arquivo do Excel.
<br>
Requer o plugin <a href="https://br.wordpress.org/plugins/post-views-counter/">Post Views Counter</a> para contar o número de visualizações de cada post.
</p>

<form method="post" action="options.php">
  <?php settings_fields('pergunteEspecialista-settings-group'); ?>
  <?php do_settings_sections('pergunteespecialista-exphtml'); ?>
</form>
