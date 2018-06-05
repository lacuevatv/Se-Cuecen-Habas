<?php 
/*
 * Sitio web: ATSA
 * @LaCueva.tv
 * Since 3.0
 * carga mas noticias
*/
require '../functions.php';
$noticiasPorPagina = 20;
$connection = connectDB();
$tabla = 'posts';
$pageActual = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 2;
$categoria = isset( $_POST['categoria'] ) ? $_POST['categoria'] : 'none';

$query  = "SELECT *  FROM " .$tabla. " ORDER by post_fecha desc LIMIT ".( ($pageActual-1 )*$noticiasPorPagina).", ".$noticiasPorPagina." ";

if ( $categoria != 'none' ) {
		$query  = "SELECT *  FROM " .$tabla. " WHERE post_categoria= '".$categoria."' ORDER by post_fecha desc LIMIT ".( ($pageActual-1 )*$noticiasPorPagina).", ".$noticiasPorPagina." ";
	}

$result = mysqli_query($connection, $query);

if ( $result->num_rows == 0 ) {
	echo 'No hay más noticias para cargar';
} else {

	while ( $row = $result->fetch_array() ) {
		$rows[] = $row;
	}

	foreach ($rows as $row ) { 
		$titulo       = $row['post_titulo'];
		$url          = $row['post_url'];
		$imgDestacada = $row['post_imagen'];
		$resumen      = $row['post_resumen'];
		$contenido    = $row['post_contenido'];
		$video        = $row['post_video'];
		$categoria    = $row['post_categoria'];
		$galeria      = $row['post_galeria'];
		$imgGaleria   = $row['post_imagenesGal'];
		$status       = $row['post_status'];
		$date         = $row['post_fecha'];

		$meses        = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$dia          = date("d", strtotime($date));
		$mes          = $meses[date("n", strtotime($date))-1];
		$year         = date("Y", strtotime($date));
		
		if ( $categoria == 'salones' ) : ?>
			<li class="loop-noticias-backend-item">
				<article class="row">
				<div class="col-30">
					<?php 
					if ( $imgDestacada != '' ) { ?>
					<img src="<?php echo UPLOADSURLIMAGES.'/'.$imgDestacada; ?>" alt="Imagen Destacada de la noticia" class="img-responsive">
					<?php }
					else { ?>
					<img src="assets/images/noticia-img-default.png" alt="Noticias" class="img-responsive">
					<?php } ?>
				</div>
					<div class="col-70">
						<h1 class="titulo-noticia-small">
							<?php echo $titulo; ?>
						</h1>
						<p class="links-edicion-noticias">
								<a href="index.php?admin=editar-salon&slug=<?php echo $row['post_ID']; ?>" title="Editar" class="btn-edit-news">
									Editar salón
								</a>
								| <a href="<?php echo $row['post_ID']; ?>" class="btn-delete-post">Borrar</a>
						</p>
					</div>
				</article>
			</li>
		<?php endif;
		if ( $categoria == 'comentarios' ) : ?>
			<li class="loop-noticias-backend-item">
				<article class="row">
					<div class="col-50">
						<div class="comentario-wrapper"><?php echo $contenido; ?></div>
					</div>
					<div class="col-50">
						<h1 class="titulo-noticia-small comentarios-titulo-resumen">
							<?php echo $titulo; ?>
						</h1>
						<p class="links-edicion-noticias">
								<a href="index.php?admin=editar-comentario&slug=<?php echo $row['post_ID']; ?>" title="Editar" class="btn-edit-news">
									Editar comentario
								</a>
								| <a href="<?php echo $row['post_ID']; ?>" class="btn-delete-post">Borrar</a>
						</p>
					</div>
				</article>
			</li>
		<?php endif;

	}//FOREACH

	//para ver cuantas son:
	$totales = mysqli_query($connection, "SELECT *  FROM " .$tabla. " ");
	$cantTotal = $totales->num_rows;
	$cargadasenQuery = count($rows);
	//echo $cargadasenQuery . ' noticias cargadas. '.$cantTotal.' noticias en total' ;
	$restantes = $cantTotal-($noticiasPorPagina*($pageActual));
	$texto1 = $cantTotal.' noticias en total. '.$cargadasenQuery. ' cargadas ahora. '.$restantes.' restantes.';
	$texto2 = $cantTotal.' noticias en total. '.$cargadasenQuery. ' cargadas ahora. 0 restantes.';
	//2 opciones: si queda más muestra cuantas quedan sino indica que no hay más
	if ( intval($restantes) > 0 ) {
		echo '<p class="info-resumen">'.$texto1.'</p>';
	} else {
		echo '<p class="info-resumen">'.$texto2.'</p>';
	}
	//echo $restantes .' - '.$cantTotal.' - '.$cargadasenQuery;
}//ELSE

closeDataBase( $connection );