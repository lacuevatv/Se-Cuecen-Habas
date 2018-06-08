<?php
/*
* MODULOS ARCHIVOS
 * Since 1.0
 * delete item
*/
require_once('../functions.php');
if ( isAjax() ) {
	
	$connection = connectDB();
	$tabla      = 'docs';
	$itemID   = isset( $_POST['idItem'] ) ? $_POST['idItem'] : 'none';
	//borramos el post
	$query      = "DELETE FROM ".$tabla." WHERE docs_id= '".$itemID."' ";
	$result     = mysqli_query($connection, $query);
	
   if ($result) {
		echo 'deleted';
   } else {
   		echo 'error';
   }
	//cierre base de datos
	mysqli_close($connection);
} //if not ajax
else {
	exit;
}