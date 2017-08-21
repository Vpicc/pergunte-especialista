<form id="contact-form-pergunta" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" data-url="<?php echo admin_url('admin-ajax.php'); ?>" enctype="multipart/form-data">
	<div class="form-group">
		<label for="name" class="control-label">Nome:</label><br>
		<input id="name" class="form-control" name="name" type="text">
		<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<div class="form-group">
		<label for="email" class="control-label">Email:</label><br>
		<input id="email" class="form-control" name="email" type="email"><br>
		<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<div class="form-group">
		<label for="job" class="control-label">Profissão:</label><br>
		<input id="job" class="form-control" name="job" type="text"><br>
		<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<div id="warnmessage" class="form-group">
		<label for="message" class="control-label">Mensagem:</label><br>
			<?php
			wp_editor( '', 'message', array( 'tinymce'=> array(
                 				'toolbar1'=> 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table | url | link image | equation | mathTex',
                       ),
								'media_buttons' => false,
								'textarea_name' => 'message' ,
								'textarea_rows' => 5, 'quicktags' => false,
								'drag_drop_upload' => false) );
			?>
			<small class="text-danger form-control-msg">É necessário preencher este campo.</small>
	</div>
	<?php $GAPICode = get_option('Google_recaptcha');
	if(@$GAPICode != ''){ ?>
			<div class="g-recaptcha" data-sitekey="<?php echo $GAPICode;?>"></div>
		<?php }?>
	<button id="submit_button" class="btn btn-default" type="submit">Enviar Pergunta</button>
		<input type="hidden" name="submitted" id="submitted" value="true" />

	<small class="text-success form-control-msg js-form-success">Pergunta enviada!</small>
	<small id="pergunte_fail" class="text-danger form-control-msg js-form-error">Houve um problema ao enviar. Tente novamente.</small>
	<small  id="recaptcha_fail" class="text-danger form-control-msg js-form-recaptcha-error">É necessário validar o reCaptcha</small>
	<small  id="pergunte_loading" class="text-info form-control-msg js-form-loading">Enviando pergunta...</small>

</form>
