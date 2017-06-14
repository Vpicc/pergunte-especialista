<form id="contact-form-pergunta" action=# method="POST" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="form-group">
		<label for="name" class="control-label">Nome:</label><br>
		<input id="name" class="form-control" name="name" type="text">
		<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<div class="form-group">
		<label for="email" class="control-label">Email:</label><br>
		<input id="email" class="form-control" name="email" type="text"><br>
		<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<div id="warnmessage" class="form-group">
		<label for="message" class="control-label">Mensagem:</label><br>
			<?php
			wp_editor( '', 'message', array( 'media_buttons' => false, 'textarea_name' => 'message' , 'textarea_rows' => 5, 'quicktags' => false, 'drag_drop_upload' => true) );
			?>
			<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<button id="submit_button" class="btn btn-default" type="submit">Enviar Pergunta</button>
		<input type="hidden" name="submitted" id="submitted" value="true" />

	<small class="text-success form-control-msg js-form-success">Pergunta enviada!</small>
	<small class="text-danger form-control-msg js-form-error">Houve um problema ao enviar. Tente novamente.</small>

</form>
