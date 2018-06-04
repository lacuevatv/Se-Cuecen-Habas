<?php
/*
 * Noticias recientes
 * Lista las noticias publicadas y con links para verlas, editarlas o publicarlas
 * Since 3.0
 * 
*/
load_module( 'contactos' );
?>

<!---------- noticias ---------------->
<div class="contenido-modulo">
	<div class="container">
		
		<?php 
		$suscriptores = getContacts();
		?>
		<div class="contacts-container">
			<div class="btn-group" role="group" aria-label="botones-emails">

			  <button id="export_excel" type="button" class="btn btn-default">
			  	Exportar a Excel
			  </button>
			  <button id="new-suscriptor" type="button" class="btn btn-primary">
			  	Nuevo Suscriptor
			  </button>
			  
			</div>
			<table class="tabla-suscriptores" width="100%">
				<thead>
					<tr>
						<td width="5%">
							Id:
						</td>
						<td width="10%">
							email:
						</td>
						<td width="10%">
							Nombre:
						</td>
						<td width="10%">
							Teléfono:
						</td>
						<td width="35%">
							Mensaje
						</td>
						<td width="5%">
							Cargo
						</td>
						<td width="5%">
							Fecha de viaje:
						</td>
                        <td width="5%">
							Cantidad de Alumnos:
						</td>
                        <td width="5%">
							Fecha de envío:
						</td>
						<td width="5%">
							
						</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					for ($i=0; $i < count($suscriptores); $i++) { 
						?>
					<tr>
						<td>
							<?php echo $suscriptores[$i]['id']; ?>
						</td>
						<td>
							<?php echo $suscriptores[$i]['email']; ?>
						</td>
						<td>
							<?php echo utf8_decode($suscriptores[$i]['nombre']); ?>
						</td>
						<td>
                            <?php echo $suscriptores[$i]['telefono']; ?>
						</td>
						<td class="font-reduce">
                            <?php echo utf8_decode($suscriptores[$i]['mensaje']); ?>
						</td>
                        <td>
                            <?php echo $suscriptores[$i]['cargo']; ?>
						</td>
                        <td>
                            <?php echo $suscriptores[$i]['fecha_viaje']; ?>
						</td>
                        <td>
                            <?php echo $suscriptores[$i]['cant_alumnos']; ?>
						</td>
						<td>
							<?php echo date('d.m.y' ,strtotime($suscriptores[$i]['fecha_de_envio']) ); ?>
						</td>
						<td>
							<button title="Borrar suscriptor" class="del-user" data-id="<?php echo $suscriptores[$i]['id']; ?>">
								<img src="<?php echo URLADMINISTRADOR; ?>/assets/images/delbtn.png" alt="Borrar usuario">
							</button>
						</td>
					</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>

		<form action="inc/export_excel.php" method="post" target="_blank" id="FormularioExportacion">
			<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
		</form>

	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<div id="formulario-suscriptor">
	
</div>
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
</footer>

<!---------- fin noticias ---------------->