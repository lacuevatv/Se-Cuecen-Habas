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
		Ver Comentarios
	</h1>
	<div class="container">
		<input type="hidden" name="post_categoria" id="post_categoria" value="comentarios">
		<div class="row">
			<div class="col">
			<ul class="loop-noticias-backend">
				<?php 
				 $comentarios = getPosts( 'comentarios', 20 );
				 
				 if ( $comentarios != null ) :
				 for ($i=0; $i < count($comentarios); $i++) { ?>
					
					<li class="loop-noticias-backend-item">
						<article class="row">
							<div class="col-50">
								<div class="comentario-wrapper"><?php echo $comentarios[$i]['post_contenido']; ?></div>
							</div>
							<div class="col-50">
								<h1 class="titulo-noticia-small comentarios-titulo-resumen">
									<?php echo $comentarios[$i]['post_titulo']; ?>
								</h1>
								<p class="links-edicion-noticias">
										<a href="index.php?admin=editar-comentario&slug=<?php echo $comentarios[$i]['post_ID']; ?>" title="Editar" class="btn-edit-news">
											Editar comentario
										</a>
										| <a href="<?php echo $comentarios[$i]['post_ID']; ?>" class="btn-delete-post">Borrar</a>
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