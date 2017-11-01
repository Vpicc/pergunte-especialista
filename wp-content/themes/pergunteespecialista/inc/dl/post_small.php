<?php
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, get_the_title());
  $column++;
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, get_the_id());
  $column++;
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, get_the_permalink(get_the_id()));
  $column++;
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, get_the_author());
  $column++;


  $result = $wpdb->get_results('SELECT '. $wpdb->prefix .'post_views.count FROM `'.$wpdb->prefix.'post_views` WHERE id = '. get_the_id() .' AND type = 4');
  if($result){
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, $result[0]->count);
  }else {
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, 0);
  }
?>
