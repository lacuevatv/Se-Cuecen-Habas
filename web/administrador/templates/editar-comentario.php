<?php
/*
 * Editar salon / Nuevo salón
 * Edita o modifica los salones
 * 
*/
require_once("inc/functions.php");
load_module( 'noticias' );
//recupera slug a buscar
global $slug;
if ($slug != '') {
	//busca en la base de datos
	searchPostID ( $slug );
	//recupera los datos
	global $dataPost;
}

$postID       = isset($dataPost['post_id']) ? $dataPost['post_id'] : '';
$titulo       = isset($dataPost['titulo']) ? $dataPost['titulo'] : '';
$url          = isset($dataPost['url']) ? $dataPost['url'] : '';
$imgDestacada = isset($dataPost['imgDestacada']) ? $dataPost['imgDestacada'] : '';
$resumen      = isset($dataPost['resumen']) ? $dataPost['resumen']:'';
$contenido    = isset($dataPost['contenido']) ? $dataPost['contenido'] : '';
$video        =  isset($dataPost['video']) ? $dataPost['video'] : '';
$categoria    = isset($dataPost['categoria']) ? $dataPost['categoria'] : '';
$galeria      = isset($dataPost['galeria']) ? $dataPost['galeria'] : '';
$imgGaleria   = isset($dataPost['imgGaleria']) ? $dataPost['imgGaleria'] : array();
$fecha        = isset($dataPost['fecha']) ? $dataPost['fecha'] : '';
$dia          = isset($dataPost['dia']) ? $dataPost['dia'] : '';
$mes          = isset($dataPost['mes']) ? $dataPost['mes'] : '';
$year         = isset($dataPost['year']) ? $dataPost['year'] : '';
$status       = isset($dataPost['status']) ? $dataPost['status'] : 'new';
$orden        = isset($dataPost['orden']) ? $dataPost['orden'] : '0';

?>
<!---------- editar salon ---------------->
<div class="contenido-modulo">
	<h1 class="titulo-modulo">
		<?php if ( $slug == '' ) {
		echo 'Agregar nuevo salón';
	} else {
		echo 'Editar Salón';
	} ?>
	</h1>
	<div class="container">
		<form method="POST" id="editar-noticia-formulario" name="editar-noticia-formulario">		
		<input type="hidden" name="post_ID" value="<?php echo $postID; ?>">
		<input type="hidden" name="post_categoria" value="comentarios">
		<input type="hidden" id="post_url" name="post_url" value="<?php echo $url; ?>">
		<input id="post_date" name="post_date" type="hidden" value="<?php echo $fecha?>">

			<div class="error-msj-wrapper">
				<ul class="error-msj-list">
					
				</ul>
			</div>
			
			<div class="row">
				<div class="col-70">
	<!------ TITULO DE LA NOTICIA ---------->
					<div class="form-group">
						<label for="post_title" class="larger-label">Autor del comentario (es necesario escribir algo) </label>
						<input id="post_title" name="post_title" class="larger-input" value="<?php echo $titulo; ?>">
						<?php if ( $titulo == '' ) { ?>
						<input type="hidden" name="new_post" value="true">
						<?php } else { ?>
						<input type="hidden" name="new_post" value="false">
						<?php } ?>
					</div>	
				</div><!-- // col -->
	<!------ CATEGORIAS DE LA NOTICIA ---------->
				<div class="col-30">
					<div class="form-group">
						<?php if ($status != 'publicado') { ?>
							<input type="hidden" id="post_status" name="post_status" value="<?php echo $status; ?>">
							<button type="submit" name="submit_publish" class="btn btn-danger btn-lg btn-submit">Publicar</button>
						<?php } else { ?>
							<input type="hidden" id="post_status" name="post_status" value="<?php echo $status; ?>">
							<!--<p class="plublished">Publicado</p>-->
							<select id="change_status" name="change_status">
								<option value="publicado">PUBLICADO</option>
								<option value="borrador">borrador</option>
							</select>
						<?php } ?>
						
					</div>
					<div class="form-group">
						<label for="post_orden" class="larger-label">Oden:</label>
						<input type="number" id="post_orden" name="post_orden" class="larger-input" value="<?php echo $orden; ?>">
					</div>
				</div><!-- // col -->
			</div><!-- // row -->

			
			<div class="row">
				<div class="col-70">
	<!------ PERSONALIZAR URL DE LA NOTICIA ---------->
					<div class="form-group">
						<label for="post_resumen" class="larger-label">Datos del autor u otras aclaraciones</label>
						<input id="post_resumen" name="post_resumen" value="<?php echo $resumen; ?>">
						
					</div>
				</div><!-- // col -->

				<div class="col-30">
				</div><!-- // col -->
			

				
				
			</div><!-- // row -->

	<!------ CONTENIDO DE LA NOTICIA ---------->
				<div class="form-group">
					<label for="post_contenido" class="larger-label">Texto del comentario</label>
					<textarea id="post_contenido" name="post_contenido"><?php echo $contenido; ?></textarea>
				</div>

			
			<hr>
		   	<div class="row">	
				<div class="col">
				   	<div class="form-group save-button-right">
				   		<button type="submit" name="submit_save" class="btn btn-primary btn-submit">Guardar Cambios</button>
				   	</div>
				</div><!-- // col -->
			</div><!-- // row -->  
		</form>	
	</div><!-- // container gral modulo -->
</div>
<div id="dialog">
	
</div>
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
    <a type="button" href="index.php?admin=comentarios" class="btn">Volver a comentarios</a>
</footer>