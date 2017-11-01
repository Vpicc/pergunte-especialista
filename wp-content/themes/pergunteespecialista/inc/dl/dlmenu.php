<?php
// Adiciona pagina de download de posts como html
function pergunteEspecialista_add_exphtml_page(){

	add_menu_page('Exportar Posts', 'Exportar Posts', 'edit_pages', 'pergunteespecialista-exphtml', 'pergunteEspecialista_theme_create_exphtml_page');

	add_action('admin_init', 'pergunteEspecialista_custom_exphtml');

}

add_action('admin_menu', 'pergunteEspecialista_add_exphtml_page');

function pergunteEspecialista_theme_create_exphtml_page(){
	require_once(get_template_directory() . '/inc/dl/exphtml-page.php');
}

function pergunteEspecialista_custom_exphtml(){
	register_setting('pergunteEspecialista-settings-group', 'exphtml');
  register_setting('pergunteEspecialista-settings-group', 'exphtml_vis');
	add_settings_section('pergunteEspecialista_exphtml_res', '', 'pergunteEspecialista_analytics_option', 'pergunteespecialista-exphtml');
	add_settings_field( 'exphtml-res', 'Exportar posts/respostas completas', 'pe_exphtml_res', 'pergunteespecialista-exphtml', 'pergunteEspecialista_exphtml_res');
  add_settings_field( 'exphtml-vis', 'Exportar apenas numero de post e visualizações', 'pe_exphtml_vis', 'pergunteespecialista-exphtml', 'pergunteEspecialista_exphtml_res');

}

function pergunteEspecialista_exphtml_option(){
}


function pe_exphtml_res(){
	echo '<a href="'.get_site_url().'/?export=html&style=1">Exportar</a>';
}

function pe_exphtml_vis(){
	echo '<a href="'.get_site_url().'/?export=html&style=2">Exportar</a>';
}

if ( isset( $_GET[ 'export' ] ) && $_GET[ 'export' ] == 'html'
 && isset($_GET['style']) && $_GET['style'] == '1' ) {
	if(current_user_can('editor') || current_user_can('administrator'))
		add_action( 'wp_loaded', 'html_export_process');
}

if ( isset( $_GET[ 'export' ] ) && $_GET[ 'export' ] == 'html'
 && isset($_GET['style']) && $_GET['style'] == '2' ) {
	if(current_user_can('editor') || current_user_can('administrator'))
		add_action( 'wp_loaded', 'html_export_process_small');
}

// Funcao que exporta HTML de posts completos
function html_export_process(){
		global $post;
		global $wpdb;

		header('Content-Disposition: attachment; filename="Posts_export.html"');
		header('Content-Type: text/html'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
		header('Connection: close'); ?>
		<meta charset="<?php bloginfo('charset'); ?>">

		<?php require_once(dirname( __FILE__ ) .'/dl_style.php'); ?>

		<?php
		$allPosts = new WP_Query(array(
      'post_type'=> array('contact-pergunta','post'),
      'posts_per_page'=> -1,
      'orderby' => 'date',
    ));
    if($allPosts->have_posts()){
      while($allPosts->have_posts()){ $allPosts->the_post();

        if( 'contact-pergunta' != $post->post_type ){
          get_template_part('inc/dl/post', get_post_format());
        } else{
          get_template_part('inc/dl/contact-pergunta', get_post_format());
        }


     }
	 }
	 exit();
}

// Funcao que exporta HTML com informacoes dos posts
function html_export_process_small(){
	 		global $post;
			global $wpdb;
			$column = 0;
			$row = 1;
			require_once(get_template_directory().'/Classes/PHPExcel.php');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("Pergunte a um Especialista")
				->setTitle("Posts Export")
				->setSubject("Resumo dos Posts")
				->setDescription("Resumo")
				->setKeywords("export post small")
				->setCategory("Export");
			$objPHPExcel->getActiveSheet()->setTitle('Posts Export');




			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,'Título do Post');
			$column++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,'ID do Post');
			$column++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,'Permalink do Post');
			$column++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,'Autor da Resposta / Criador do Post');
			$column++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,'Total de Visualizações');
			$column = 0;
			$row++;


			$allPosts = new WP_Query(array(
			 'post_type'=> array('contact-pergunta','post'),
			 'posts_per_page'=> -1,
			 'orderby' => 'date',
		 ));
		 if($allPosts->have_posts()){
			 while($allPosts->have_posts()){ $allPosts->the_post();

				 if( 'contact-pergunta' != $post->post_type ){
					 require(dirname( __FILE__ ) . '/post_small.php');
				 } else{
					 require(dirname( __FILE__ ) . '/contact-pergunta_small.php');
				 }
				 $row++;
				 $column = 0;


			}
	 }

	 header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	 header("Content-Disposition: attachment; filename=\"results.xlsx\"");
	 header("Cache-Control: max-age=0");
	 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	 ob_clean();
	 $objWriter->save("php://output");

	 exit();

}



?>
