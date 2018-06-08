<?php
/*
 * MODULOS ARCHIVOS
 * Since 1.0
 * New Section
*/
require_once('../functions.php');
if ( isAjax() ) {
	$connection = connectDB();
	$tabla = 'docs';
	
	$post_Type = isset( $_POST['type'] ) ? $_POST['type'] : '';
	$seccion = isset( $_POST['seccion'] ) ? $_POST['seccion'] : '';
	$url = isset( $_POST['url'] ) ? $_POST['url'] : '';
	$texto = isset( $_POST['texto'] ) ? $_POST['texto'] : '';
	$orden = isset( $_POST['orden'] ) ? $_POST['orden'] : '0';
	$queryCreateSecction  = "INSERT INTO " .$tabla. " (docs_texto,docs_url,docs_orden,docs_seccion,post_type) VALUES ('$texto','$url','$orden','$seccion','$post_Type')";
	$result = mysqli_query($connection, $queryCreateSecction);
		
	echo 'ok';
	//cierre base de datos
	mysqli_close($connection);
} //if not ajax
else {
	exit;
}