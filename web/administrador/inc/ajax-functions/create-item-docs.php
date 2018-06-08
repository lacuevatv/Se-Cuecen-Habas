<?php
/*
* MODULOS ARCHIVOS
 * Since 1.0
 * Save item
*/
require_once('../functions.php');
global $subsection;
if ( isAjax() ) {
	
	$postType = isset( $_POST['postType'] ) ? $_POST['postType'] : 'file';
	$url = isset( $_POST['linkcopiado'] ) ? $_POST['linkcopiado'] : '';
	$sub = isset( $_POST['subsection'] ) ? $_POST['subsection'] : '';
	$url   = filter_var($url,FILTER_SANITIZE_URL);
	?>

	<li>
		<article id="id" class="link-docs-wrapper">
    	<div class="row">
    		<div class="col-30">
    			<div class="row">
        			<div class="col-30">
	        			<label><small>Orden:</small></label>
	        			<input type="text" class="link-docs-orden" value="0">	
	        		</div>
	        		<div class="col-70">
	        			<label><small>Texto a mostrar:</small></label>
	        			<input type="text" class="link-docs-texto" value="">		
        			</div>
        		</div>
    		</div>
    		<div class="col-20">
    			<div class="link-docs-file">
    			<?php if ( $postType == 'url' ) { ?>
    				<a href="<?php echo $url; ?>" target="_blank" data-href="<?php echo $url; ?>" data-type="url"><?php echo $url; ?></a><br>
    				<small><span class="btn-cursor btn-del-file-docs">Borrar</span> url</small>
    				<?php } else { ?>
    					
    					<div class="link-docs-file">
    						<small>
    							<span class="btn-cursor btn-load-file-docs new">Cargar nuevo</span> archivo
    						</small>
    					</div>

    				<?php } ?>
	        	</div>
    		</div><!-- //col -->
    		<div class="col-20">
    			<select class="link-docs-sucsection">
    				<?php 
    					for ($a=0; $a <count($subsection[$sub]) ; $a++) { 
    						
    						echo '<option value="'.$subsection[$sub][$a].'"';
    						echo '>';
    						echo $subsection[$sub][$a];
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


<?php } //if not ajax
else {
	exit;
}