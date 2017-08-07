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
	$message = $_POST["message"];

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

		$to = get_bloginfo( 'admin_email' );
		$subject = 'Pergunte a um Especialista - ' . $title;
		$headers[] = 'From: ' . get_bloginfo('name') . '<'. $to .'>';
		$headers[] = 'Reply-To: ' . $title . '<'. $email .'>';
		$headers[] = 'Content-Type: text/html: charset=UTF-8';

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

// Adiciona a meta-box para colocar o email do contato
function pergunteEspecialista_pergunta_add_meta_box(){
	add_meta_box('contact_email', 'Email do Usuário', 'pergunteEspecialista_pergunta_email_callback', 'contact-pergunta', 'side');
	add_meta_box('contact_job', 'Profissão do Usuário', 'pergunteEspecialista_pergunta_job_callback', 'contact-pergunta', 'side');
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
 ?>
