<?php 
/*
 * Sitio web: Se Cuecen Habas
 * @LaCueva.tv by Hit.com.ar
 * Since 3.0
 * CONFIG
*/

//BD
define('DB_SERVER', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASS', '123');
define('DB_NAME', 'db_secuecenhabas');
//DEFINICIONES HEAD Y SCRIPTS
define ( 'VERSION', '1.0' );
//CARPETAS
define ( 'UPLOADS', dirname( __FILE__ ) . '/../contenido' );
define ( 'TEMPLATEDIR', dirname( __FILE__ ) . '/../templates' );
//urls
define ('CARPETASERVIDOR', '' );//esta variable se define si el sitio no está en el root del dominio y si está en una subcarpeta
define ('MAINSURL', 'http://' . $_SERVER['HTTP_HOST'] . CARPETASERVIDOR );
define ('UPLOADSURL', MAINSURL . '/contenido');
define ('UPLOADSFILE', MAINSURL . '/contenido');
//META TAGS
define('SITETITLE', 'Se Cuecen Habas');
define('METADESCRIPTION', '');
define('METAKEYS', '');
define('SCREENSHOT', MAINSURL . '/assets/images/popupdefault.jpg' );

define('INSTAGRAM', '');//nombre usuario
//LINKS:
define( 'TELEFONO', '(011) 5245.8093' );
define( 'EMAILFORMULARIO', 'info@secuecenhabas.com.ar' );
define( 'LINK_EMAIL', 'info@secuecenhabas.com.ar' );
define( 'WHATSAPPTEXT', '');
define( 'WHATSAPP', '');
define('LINK_FACEBOOK', 'https://www.facebook.com/secuecenhabas');
define('LINK_INSTAGRAM', 'https://www.instagram.com/' . INSTAGRAM);
define('LINK_TWITTER', 'http://www.twitter.com/secuecenhabas_');
define('LINK_GOOGLE', '');
define('LINK_VIMEO', '');
define('LINK_YOUTUBE', '');
define('LINK_SPOTIFY', '');
define('LINK_PINTEREST', '');
define('APIKEYGOOGLE', '' );

global $categorias;
$categorias = array(
	array( 'slug' => 'criollo', 'nombre' => 'Menú Criollo'),
	array( 'slug' => 'gourmet', 'nombre' => 'Menú Gourmet'),
	array( 'slug' => 'salones', 'nombre' => 'Salones'),
	array( 'slug' => 'comentarios', 'nombre' => 'Comentarios'),
);

define('POSTPERPAG', '5');//indica al paginador cuantos se muestran por pagina para calcular el offset además de que el loop muestra solo esos
