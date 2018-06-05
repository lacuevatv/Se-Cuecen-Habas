<?php
/*
 * Noticias recientes
 * Lista las noticias publicadas y con links para verlas, editarlas o publicarlas
 * Since 3.0
 * 
*/
load_module( 'noticias' );
?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
	<h1 class="titulo-modulo">
		Ver Salones
	</h1>
	<div class="container">
		<input type="hidden" name="post_categoria" id="post_categoria" value="salones">
		<div class="row">
			<div class="col">
			<ul class="loop-noticias-backend">
				<?php
				$salones = getPosts( 'salones', 20 );
				if ( $salones != null ) :
					for ($i=0; $i < count($salones); $i++) { ?>
					   
					   <li class="loop-noticias-backend-item">
						   <article class="row">
						   <div class="col-30">
								<?php 
								if ( $salones[$i]['post_imagen'] != '' ) { ?>
								<img src="<?php echo UPLOADSURLIMAGES.'/'.$salones[$i]['post_imagen']; ?>" alt="Imagen Destacada de la noticia" class="img-responsive">
								<?php }
								else { ?>
								<img src="assets/images/noticia-img-default.png" alt="Noticias" class="img-responsive">
								<?php } ?>
							</div>
							   <div class="col-70">
								   <h1 class="titulo-noticia-small">
									   <?php echo $salones[$i]['post_titulo']; ?>
								   </h1>
								   <p class="links-edicion-noticias">
										   <a href="index.php?admin=editar-salon&slug=<?php echo $salones[$i]['post_ID']; ?>" title="Editar" class="btn-edit-news">
											   Editar salón
										   </a>
										   | <a href="<?php echo $salones[$i]['post_ID']; ?>" class="btn-delete-post">Borrar</a>
								   </p>
							   </div>
						   </article>
					   </li>
				<?php }//for
				endif;
				?>
        		
        	</ul>
        	</div><!-- // col -->
        </div><!-- // row -->
    	<div class="row">
    		<div class="col ver-mas-noticias">
        		<button id="load-more" class="btn btn-primary">Ver más</button>
        		<p class="loading-news-ajax"></p>
        	</div>
    	</div>
		
	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
    <a type="button" href="index.php?admin=editar-noticias" class="btn">Agregar nueva</a>
</footer>

<!---------- fin noticias ---------------->