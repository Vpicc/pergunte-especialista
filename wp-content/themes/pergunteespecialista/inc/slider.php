<?php
// Tipos de posts customizados

function pergunteEspecialista_custom_post_type(){
	// Slider
	$labels = array(
		'name' => 'Slider',
		'singular_name' => 'Slider',
		'add_new' => 'Adicionar Nova Imagem',
		'all_items' => 'Todas as Imagens',
		'add_new_item' => 'Adicionar Nova Imagem',
		'edit_item' => 'Editar Item',
		'new_item' => 'Novo Item',
		'view_item' => 'Ver Item',
		'search_items' => 'Procurar Slider',
		'not_found' => 'Não foi encontrado nenhum item',
		'not_found_in_trash' => 'Não foi encontrado nenhum item na lixeira',
		'parent_item_colon' => 'Item Parente'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'supports' => array(
			'thumbnail',
			'title'
		),
		'menu_position' => 5,
		'exclude_from_search' => true
	);
	register_post_type('slider', $args);

}

add_action('init','pergunteEspecialista_custom_post_type');
 ?>
