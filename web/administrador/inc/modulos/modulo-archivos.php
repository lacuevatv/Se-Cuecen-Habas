<?php
/*
sube, muestra y mantiene la subida de archivos
*/
function showLinksdocsAdmin() {
	global $subsection;
	$connection = connectDB();
	$tabla = 'docs';
	$secciones = array();
	$textoSecciones = array();
	$ordenSecciones = array();
	//queries según parámetros 
	$query  = "SELECT docs_seccion,docs_texto,docs_orden FROM " .$tabla. " WHERE post_type='section' ORDER by docs_orden";	
	$result = mysqli_query($connection, $query);
	if ( $result->num_rows == 0 ) {
		echo 'No hay ninguna cargada';
	} else { 
	while ($row = $result->fetch_array()) {
				$rows[] = $row;
		}
		//recorremos cada uno de los item de la seccion
		foreach ($rows as $row ) { 
			$seccion = $row['docs_seccion'];
			$textoSeccion = $row['docs_texto'];
			$ordenSeccion = $row['docs_orden'];
			array_push($secciones, $seccion);
			array_push($textoSecciones, $textoSeccion);
			array_push($ordenSecciones, $ordenSeccion);
		}//for each de cada seccion
		
		//ahora q ya están los nombres de las secciones, recorremos cada una
		for ($i=0; $i < count($secciones); $i++) { 
			
			$query  = "SELECT * FROM " .$tabla. " WHERE docs_seccion='".$secciones[$i]."' and post_type='link' ORDER by docs_orden";	
			$result2 = mysqli_query($connection, $query);
			
			if ( $result2->num_rows == 0 ) { ?>
				<h3><?php echo $secciones[$i]; ?></h3>
				<div>
					<h4 class="docs-section-title" data-nombre="<?php echo $secciones[$i]; ?>">
						<?php echo $textoSecciones[$i]; ?> | 
						<small class="change-section-name-docs-btn btn-cursor">Cambiar nombre u orden</small>
					</h4>
					<p><strong>Orden:</strong> <span><?php echo $ordenSecciones[$i]; ?></span></p>
					<ul class="links-docs" id="<?php echo $secciones[$i]; ?>">
						<li>
		      				<button class="btn btn-primary new-link-docs-btn">Subir nuevo archivo</button>
		      				<button class="btn btn-danger new-link-docs-btn-url">Crear nuevo URL</button>
		      			</li>
			  		</ul>
				</div>

			 <?php } else { 
				//se arma el html. Primero va el titulo de la sección
				?>
				<h3><?php echo $secciones[$i]; ?></h3>
				<div>
					<h4 class="docs-section-title" data-nombre="<?php echo $secciones[$i]; ?>">
						<?php echo $textoSecciones[$i]; ?> | 
						<small class="change-section-name-docs-btn btn-cursor">Cambiar nombre u orden</small>
					</h4>
					<p class="orden-secciones-docs"><strong>Orden:</strong> <span><?php echo $ordenSecciones[$i]; ?></span></p>
					<ul class="links-docs" id="<?php echo $secciones[$i]; ?>">
			
				<?php
				while ($rowitem = $result2->fetch_array()) {					
					$orden = $rowitem['docs_orden'];
					$IDItem = $rowitem['docs_id'];
					$textoItem = $rowitem['docs_texto'];
					$linkItem = $rowitem['docs_url'];
					$type = $rowitem['docs_type'];
					$subSection = $rowitem['docs_subsection'];
					
					?>
						<li>
			  				<article id="<?php echo $IDItem; ?>" class="link-docs-wrapper">
					        	<div class="row">
					        		<div class="col-30">
					        			<div class="row">
						        			<div class="col-30">
							        			<label><small>Orden:</small></label>
							        			<input type="text" class="link-docs-orden" value="<?php echo $orden; ?>">	
							        		</div>
							        		<div class="col-70">
							        			<label><small>Texto a mostrar:</small></label>
							        			<input type="text" class="link-docs-texto" value="<?php echo $textoItem; ?>">		
						        			</div>
						        		</div>
					        		</div>
					        		<div class="col-20">
					        			<div class="link-docs-file">
					        			<?php if ( $type == 'url' ) { ?>
					        				<a href="<?php echo $linkItem; ?>" target="_blank" data-href="<?php echo $linkItem; ?>" data-type="url"><?php echo $linkItem; ?></a><br>
					        				<small><span class="btn-cursor btn-del-file-docs">Borrar</span> url</small>
					        				<?php } else { ?>
					        					<a href="<?php echo UPLOADSURLFILES . '/' . $linkItem; ?>" target="_blank" data-href="<?php echo $linkItem; ?>" data-type="file"><?php echo $linkItem; ?>
					        					</a><br>
							        		<small><span class="btn-cursor btn-load-file-docs">Cambiar</span> o <span class="btn-cursor btn-del-file-docs">Borrar</span> archivo</small>
					        				<?php } ?>
							        	</div>
					        		</div><!-- //col -->
					        		<div class="col-20">
					        			<select class="link-docs-sucsection">
					        				<?php 
					        					$section = $secciones[$i];
					        					for ($a=0; $a <count($subsection[$section]) ; $a++) { 
					        						
					        						echo '<option value="'.$subsection[$section][$a].'"';
					        						if ( $subsection[$section][$a] == $subSection ) {
					        							echo ' selected'; 
					        						}
					        						echo '>';
					        						echo $subsection[$section][$a];
					        						echo '</option>';
					        					}
					        					
					        				?>
					        				
					        				
					        			</select>
					        		</div><!-- //col -->
					        		<div class="col-20">
					        			<button class="btn btn-sm btn-save btn-save-file-docs">Guardar</button>
					        			<div>
						        			<span class="error-tag"></span>
						        		</div>
					        		</div><!-- //col -->
					        	</div><!-- //row -->
					        </article><!-- //link-docs-wrapper -->	
			  			</li>

				<?php }//while
				
				//cierre de la seccion
				?>
						<li>
		      				<button class="btn btn-primary new-link-docs-btn">Crear nuevo archivo</button>
		      				<button class="btn btn-danger new-link-docs-btn-url">Crear nuevo link</button>
		      			</li>
			  		</ul>
				</div>
			<?php }//else
		}//for de secciones
	}//else
	closeDataBase($connection);
}//showLinksdocsAdmin()