<form id="contact-form-pergunta" action="#" method="POST" enctype="multipart/form-data">
	<div class="row">
		<label for="name">Nome:</label><br />
		<input id="name" class="input" name="name" type="text" value="" size="30" /><br />
	</div>
	<div class="row">
		<label for="email">Email:</label><br />
		<input id="email" class="input" name="email" type="text" value="" size="30" /><br />
	</div>
	<div class="row">
		<label for="message">Mensagem:</label><br />

      <?php
      wp_editor( '', 'message', array( 'media_buttons' => true, 'textarea_name' => 'message' , 'textarea_rows' => 5) );  ?>

	</div>
	<input id="submit_button" type="submit" value="Send email" />

</form>
