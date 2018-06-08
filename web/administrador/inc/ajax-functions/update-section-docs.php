<?php
/*
* MODULOS ARCHIVOS
 * Since 1.0
 * Update Section
*/
require_once('../functions.php');
if ( isAjax() ) {
	$connection = connectDB();
	$tabla = 'docs';
	
	$section_id = isset( $_POST['seccion'] ) ? $_POST['seccion'] : '';
	$texto = isset( $_POST['texto'] ) ? $_POST['texto'] : '';
	$orden = isset( $_POST['orden'] ) ? $_POST['orden'] : '0';
	$queryUpdateSection = "UPDATE ".$tabla." SET docs_texto='".$texto."', docs_orden='".$orden."' WHERE docs_seccion='".$section_id."' LIMIT 1";
	
	if ( $texto == '') {
		$queryUpdateSection = "UPDATE ".$tabla." SET docs_orden='".$orden."' WHERE docs_seccion='".$section_id."' LIMIT 1";	
	}
	$result = mysqli_query($connection, $queryUpdateSection);
	
	echo 'ok';
	//cierre base de datos
	mysqli_close($connection);
} //if not ajax
else {
	exit;
}