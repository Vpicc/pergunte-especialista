<form id="contact-form-pergunta" action=# method="POST" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="row">
		<label for="name">Nome:</label><br />
		<input id="name" class="input" name="name" type="text" value="" size="30" required = "required"/><br />
	</div>
	<div class="row">
		<label for="email">Email:</label><br />
		<input id="email" class="input" name="email" type="text" value="" size="30" required = "required"/><br />
	</div>
	<div class="row">
		<label for="message">Mensagem:</label><br />

      <?php
      wp_editor( '', 'message', array( 'media_buttons' => true, 'textarea_name' => 'message' , 'textarea_rows' => 5) );  ?>

	</div>
	<input id="submit_button" type="submit" value="Enviar Pergunta" />
		<input type="hidden" name="submitted" id="submitted" value="true" />

</form>
