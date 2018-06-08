<?php
/*
 * editar slider
 * Edita el slider seleccionado o crea uno nuevo
 * Since 3.0
 * 
*/
require_once("inc/functions.php");
load_module( 'archivos' );
?>

<div class="contenido-modulo">
	<div class="container">

		<h2>Documentación</h2>
		<p><small>Administrar documentación subida por secciones.</small></p>
			
		<div id="accordion-docs">

				<?php showLinksdocsAdmin(); ?>

		</div><!-- // accordion -->
	
	
		<button class="btn btn-primary" id="new-section-docs-btn">Crear nueva sección</button>
	
		<p class="new-section-docs-btn-text"><small>
			Este botón agrega una sección nueva para la página, primero pide un id que lo identificará en la base de datos y luego un texto que es el que aparece en la página.
		</small></p>	
			
		
	</div><!-- // container -->
</div><!-- // wrapper interno modulo -->
<div id="dialog">
	
</div>
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
</footer>