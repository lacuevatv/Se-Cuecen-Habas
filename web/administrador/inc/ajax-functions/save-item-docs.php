<?php
/*
* MODULOS ARCHIVOS
 * Since 1.0
 * Save item
*/
require_once('../functions.php');
if ( isAjax() ) {
	$connection = connectDB();
	$tabla = 'docs';
	$newItem = isset( $_POST['newItem'] ) ? $_POST['newItem'] : 'true';
	$type = isset( $_POST['docsType'] ) ? $_POST['docsType'] : '';
	$PostType = isset( $_POST['postType'] ) ? $_POST['postType'] : 'linkpostType';
	$seccion = isset( $_POST['seccion'] ) ? $_POST['seccion'] : '';
	$subSeccion = isset( $_POST['subsection'] ) ? $_POST['subsection'] : 'docs';
	$url = isset( $_POST['url'] ) ? $_POST['url'] : '';
	$texto = isset( $_POST['texto'] ) ? $_POST['texto'] : '';
	$orden = isset( $_POST['orden'] ) ? $_POST['orden'] : '0';
	
	$texto = filter_var($texto,FILTER_SANITIZE_STRING); 
	$orden = filter_var($orden,FILTER_SANITIZE_NUMBER_INT);
	$url   = filter_var($url,FILTER_SANITIZE_URL);
	//si es nuevo se crea
	if ( $newItem == 'true' ) {
	$queryCreateItem  = "INSERT INTO " .$tabla. " (docs_seccion,docs_subsection,docs_texto,docs_orden,docs_type,post_type,docs_url) VALUES ('$seccion','$subSeccion','$texto','$orden','$type','$PostType','$url')";
	$result = mysqli_query($connection, $queryCreateItem);
		echo 'ok';
	} else {
		$item_id = isset( $_POST['idItem'] ) ? $_POST['idItem'] : '';
		//si es viejo se actualiza
		$queryUpdateItem  = "UPDATE ".$tabla." SET docs_texto='".$texto."',docs_url='".$url."', docs_subsection='".$subSeccion."',docs_orden='".$orden."' WHERE docs_id='".$item_id."' LIMIT 1";
		$result = mysqli_query($connection, $queryUpdateItem);
		echo 'ok';
	}
	//cierre base de datos
	mysqli_close($connection);
} //if not ajax
else {
	exit;
}