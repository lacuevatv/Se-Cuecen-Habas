<?php
/*
 * delete post
 * Since 3.0
 * borra el post seleccionado de acuerdo a su url
*/
require_once('../functions.php');
if ( isAjax() ) {

$connection     = connectDB();
$tablaNoticias  = 'posts';
$postUrl        = isset( $_POST['post_url'] ) ? $_POST['post_url'] : 'none';

//borramos el post
$query      = "DELETE FROM ".$tablaNoticias." WHERE post_ID= '".$postUrl."'";
$result     = mysqli_query($connection, $query);
   
   if ($result) {
		echo 'deleted';
   } else {
   		echo 'error-deleted-post';
   }


//cierre base de datos
mysqli_close($connection);


} //if not ajax
else {
	exit;
}