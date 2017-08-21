<?php
// Perguntas

// Post type de perguntas
function pergunteEspecialista_perguntas_post_type(){

		$labels = array(
			'name' => 'Perguntas',
			'singular_name' => 'Pergunta',
			'add_new' => 'Adicionar Nova Pergunta',
			'all_items' => 'Todas as Perguntas',
			'add_new_item' => 'Adicionar Nova Pergunta',
			'edit_item' => 'Editar Item',
			'new_item' => 'Novo Item',
			'view_item' => 'Ver Item',
			'search_items' => 'Procurar Pergunta',
			'not_found' => 'Não foi encontrado nenhum item',
			'not_found_in_trash' => 'Não foi encontrado nenhum item na lixeira',
			'parent_item_colon' => 'Item Parente'
		);
		$args = array(
			'labels' => $labels,
			'show_ui' => true,
			'show_in_menu' => true,
			'hierarchical' => false,
			'menu_position' => 26,
			'menu_icon' => 'dashicons-email-alt',
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'capabilities' => array(
            'create_posts' => false
        ),
			'supports' => array(
				'editor',
				'title',
				'author'
			)
		);
		register_post_type('contact-pergunta', $args);
}

// Salva o Form
function pergunteEspecialistaSaveUserContactForm(){

	$title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$job = wp_strip_all_tags($_POST["job"]);
	$message = wp_kses_post($_POST["message"]);
	$secret = get_option('Google_recaptcha_secret');
	$response = wp_strip_all_tags($_POST["recaptcha"]);

	//wp_die($secret);
	// Verifica se o reCaptcha é valido
	if($secret != ""){
	$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");

	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
		echo 0;
		die();
		return;
	}

}

// Salva o Post
$args = array(
	'post_title' => $title,
	'post_content' => $message,
	'post_author' => 1,
	'post_type' => 'contact-pergunta',
	'meta_input' => array(
		'_contact_email_value_key' => $email,
		'_contact_job_value_key' => $job
	)

);

	$post_id = wp_insert_post($args);

	if($post_id !== 0){
		// Mandar email quando uma pergunta for enviada
		$to = get_bloginfo( 'admin_email' );
		$subject = 'Pergunte a um Especialista - ' . $title;
		$headers[] = 'From: ' . get_bloginfo('name') . '<'. $to .'>';
		$headers[] = 'Reply-To: ' . $title . '<'. $email .'>';
		$headers[] = 'Content-Type: text/html; charset=ISO-8859-1';

		wp_mail($to, $subject, $message, $headers);

		echo $post_id;
	} else{
		echo 0;
	}

	die();


}


add_action('wp_ajax_nopriv_pergunteEspecialistaSaveUserContactForm', 'pergunteEspecialistaSaveUserContactForm');
add_action('wp_ajax_pergunteEspecialistaSaveUserContactForm', 'pergunteEspecialistaSaveUserContactForm');


// Gera as colunas do post type
add_action('init','pergunteEspecialista_perguntas_post_type');

function pergunteEspecialista_set_perguntas_columns($columns){

		$newColumns = array();
		$newColumns['title'] = 'Nome Completo';
		$newColumns['message'] = 'Mensagem';
		$newColumns['email'] = 'Email';
		$newColumns['job'] = 'Profissão';
		$newColumns['date'] = 'Data';

		return $newColumns;
}

add_filter('manage_contact-pergunta_posts_columns', 'pergunteEspecialista_set_perguntas_columns');

// Escreve nas colunas
function pergunteEspecialista_perguntas_custom_column($column, $post_id){
	switch($column){

		case 'message':

			echo get_the_excerpt();
			break;

		case 'email':

			$email = get_post_meta( $post_id, '_contact_email_value_key', true);
			echo '<a href="mailto:"'.$email.'">'.$email.'</a>';
			break;

		case 'job':

		$job = get_post_meta( $post_id, '_contact_job_value_key', true);
		echo $job;
		break;
	}
}

add_action('manage_contact-pergunta_posts_custom_column', 'pergunteEspecialista_perguntas_custom_column', 10, 2);

function pergunteEspecialista_remove_meta_box(){
	remove_meta_box('authordiv', 'contact-pergunta', 'normal');
}
add_action( 'admin_menu', 'pergunteEspecialista_remove_meta_box' );

// Adiciona a meta-box para colocar o email do contato
function pergunteEspecialista_pergunta_add_meta_box(){
	add_meta_box('contact_email', 'Email do Usuário', 'pergunteEspecialista_pergunta_email_callback', 'contact-pergunta', 'side');
	add_meta_box('contact_job', 'Profissão do Usuário', 'pergunteEspecialista_pergunta_job_callback', 'contact-pergunta', 'side');
	add_meta_box('mail_question', 'Encaminhar para Email:', 'pergunteEspecialista_pergunta_mailto_callback', 'contact-pergunta', 'normal');
}

add_action('add_meta_boxes', 'pergunteEspecialista_pergunta_add_meta_box');

function pergunteEspecialista_pergunta_email_callback($post){
	wp_nonce_field( 'pergunteEspecialista_save_contact_email_data','pergunteEspecialista_email_meta_box_nonce');

	$value = get_post_meta($post->ID,'_contact_email_value_key', true);

	echo '<label for="pergunteEspecialista_email_field">Email do Usuário</label>';
	echo '<input type="email" id="pergunteEspecialista_email_field" name="pergunteEspecialista_email_field" value="'.esc_attr($value).'"
	size="25"/>';
}

function pergunteEspecialista_pergunta_job_callback($post){
	wp_nonce_field( 'pergunteEspecialista_save_contact_job_data','pergunteEspecialista_job_meta_box_nonce');

	$value = get_post_meta($post->ID,'_contact_job_value_key', true);

	echo '<label for="pergunteEspecialista_job_field">Profissão do Usuário</label>';
	echo '<input type="text" id="pergunteEspecialista_job_field" name="pergunteEspecialista_job_field" value="'.esc_attr($value).'"
	size="25"/>';
}

function pergunteEspecialista_pergunta_mailto_callback(){
	wp_nonce_field( 'pergunteEspecialista_mailto_data','pergunteEspecialista_mailto_meta_box_nonce');

	echo '<form method="POST" action="">';
	echo '<label>Encaminhar pergunta para email:</label>';
	echo '<input type="email" name="pe_mailto_field" size="25"/>';
	echo 	'<button type="submit">Enviar Pergunta</button>';
	echo '</form>';


}

function pergunteEspecialista_mailto_data($post_id){
	if(!isset($_POST['pergunteEspecialista_mailto_meta_box_nonce'])){
		return;
	}

	if(!isset($_POST['pe_mailto_field'])){
			return;
	}

	if(!wp_verify_nonce($_POST['pergunteEspecialista_mailto_meta_box_nonce'],'pergunteEspecialista_mailto_data')){
		return;
	}



	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post',$post_id)){
		return;
	}

	$mailtofield = sanitize_email(wp_strip_all_tags($_POST["pe_mailto_field"]));

	$title=apply_filters('the_title', get_post_field('post_title'));

	$content=apply_filters('the_content', get_post_field('post_content'));

	$email = sanitize_text_field($_POST['pergunteEspecialista_email_field']);


	// Mandar email
	$to = $mailtofield;
	$from = get_bloginfo( 'admin_email' );
	$subject = 'Pergunte a um Especialista - ' . $title;
	$headers[] = 'From: ' . get_bloginfo('name') . '<'. $from .'>';
	$headers[] = 'Reply-To: ' . $title . '<'. $email .'>';
	$headers[] = 'Content-Type: text/html; charset=\"ISO-8859-1\"';

	wp_mail($to, $subject, $content, $headers);




}

add_action('save_post', 'pergunteEspecialista_mailto_data');



// Funcao que salva a profissão da pergunta
function pergunteEspecialista_save_contact_job_data($post_id){

	if(!isset($_POST['pergunteEspecialista_job_meta_box_nonce'])){
		return;
	}

	if(!wp_verify_nonce($_POST['pergunteEspecialista_job_meta_box_nonce'],'pergunteEspecialista_save_contact_job_data')){
		return;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post',$post_id)){
		return;
	}

	if(!isset($_POST['pergunteEspecialista_job_field'])){
		return;
	}

	$my_data = sanitize_text_field($_POST['pergunteEspecialista_job_field']);

	update_post_meta($post_id, '_contact_job_value_key', $my_data);

}

add_action('save_post', 'pergunteEspecialista_save_contact_job_data');

// Funcao que salva o email da pergunta
function pergunteEspecialista_save_contact_email_data($post_id){

	if(!isset($_POST['pergunteEspecialista_email_meta_box_nonce'])){
		return;
	}

	if(!wp_verify_nonce($_POST['pergunteEspecialista_email_meta_box_nonce'],'pergunteEspecialista_save_contact_email_data')){
		return;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post',$post_id)){
		return;
	}

	if(!isset($_POST['pergunteEspecialista_email_field'])){
		return;
	}

	$my_data = sanitize_text_field($_POST['pergunteEspecialista_email_field']);

	update_post_meta($post_id, '_contact_email_value_key', $my_data);

}

add_action('save_post', 'pergunteEspecialista_save_contact_email_data');


// Quando a pergunta é publicada, cria-se automaticamente um post rascunho
function pergunteEspecialista_create_post_draft($postid, $post){
		if(isset($postid)){
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
			 	return;

			if(!current_user_can('edit_post',$post_id))
			 	return;

			if ( wp_is_post_revision( $post_id ) )
				return;


			$post_type = get_post_type( $post_id );

			$post_status = get_post_status( $post_id );

			if ( "contact-pergunta" != $post_type )
			 return;

		if('contact-pergunta' == $post_type && $post_status == 'draft'){


			$user = get_current_user_id();

			$title=wp_strip_all_tags(get_post_field('post_title'));

			$content=wp_kses_post($_POST['content']);

			$text = $title . " escreveu:<br>" . "<blockquote>" . $content . "</blockquote>";

			$args = array(
				'post_title' => $title,
				'post_content' => $text,
				'post_author' => $user,
				'post_type' => 'post',
				'post_status' => 'draft',
			);

				$post_id = wp_insert_post($args);

				echo $post_id;
		}

	}

}

add_action('publish_contact-pergunta','pergunteEspecialista_create_post_draft');

// Esconde a funcao de visibilidade, pois nao é utilizado
function pergunteEspecialista_hide_publishing_actions(){
        $my_post_type = 'contact-pergunta';
        global $post;
        if($post->post_type == $my_post_type){
            echo '
                <style type="text/css">

                    #visibility{
                        display:none;
                    }
                </style>
            ';
        }
}
add_action('admin_head-post.php', 'pergunteEspecialista_hide_publishing_actions');
add_action('admin_head-post-new.php', 'pergunteEspecialista_hide_publishing_actions');
 ?>
