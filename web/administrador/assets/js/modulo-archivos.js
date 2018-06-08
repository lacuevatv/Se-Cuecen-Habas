/*
* Funciones: Archivos
* Modificar, ordenar la documentación subida
*/

$(document).ready(function(){
	//directorio de subida de archivos, variable principal en admin-script.js, aca le agrego /archivos
	var uploadDirArchivos = uploadsDir + '/archivos';

	$( "#accordion-docs" ).accordion({
		heightStyle: "content",
		active: false,
			collapsible: true,
	});

	//agregar seccion en docs
	$(document).on('click', '#new-section-docs-btn', function(){
		var contenedor = $('#accordion-docs');
		var nombreSeccion = prompt('Agregue un nombre para identificar la nueva sección');
		var textoSeccion = prompt('Agregue un texto que se vera en la página para la sección');

		if (nombreSeccion == '') {
			nombreSeccion = prompt('ES NECESARIO AGREGAR UN NOMBRE PARA IDENTIFICAR LA NUEVA SECCIÓN');
		}

		if (textoSeccion == '') {
			textoSeccion = prompt('ES NECESARIO AGREGAR UN TEXTO QUE SE VA A VER EN LA PÁGINA PARA LA NUEVA SECCIÓN');
		}

		if (nombreSeccion == '') {
			return;
		}

		if (textoSeccion == '') {
			return;
		}

		nombreSeccion = getCleanedStringPLUS(nombreSeccion,"!@#$^&%*()+=[]'\"\/{}|:;¡¿<>?,.");

		//contenedor.empty()
		var html = '<h3>'+nombreSeccion+'</h3><div><h4 class="docs-section-title" data-nombre="'+nombreSeccion+'">'+textoSeccion+' | <small class="change-section-name-docs-btn">Cambiar nombre u orden</small></h4><ul class="links-docs" id="'+nombreSeccion+'"><li><button class="btn btn-primary new-link-docs-btn">Subir nuevo archivo</button>&nbsp;<button class="btn btn-danger new-link-docs-btn-url">Crear nuevo URL</button></li></ul></div><hr>';
		contenedor.append($(html));
		
		$.ajax( {
	            type: 'POST',
	            url: ajaxFunctionDir + '/new-section-docs.php',
	            data: {
	                type: 'section',
	                seccion: nombreSeccion,
	                url: '',
	                texto: textoSeccion,
	                orden: '0',
	            },
	            success: function ( response ) {
	            	if ( response == 'ok' ) {
		            	window.location.href = url;
		            }
	            },
	            error: function ( ) {
	                console.log('error');
	            },
	        });//cierre ajax
		
	});//agregar seccion en docs


	//cambiar nombre de sección
	$(document).on('click', '.change-section-name-docs-btn', function(){
		var contenedor = this.closest('.docs-section-title');
		var idsection = $(contenedor).attr('data-nombre');
		var li = this.closest('div');
		var contenedorOrden = $(li).find('.orden-secciones-docs span');
		var data = {};
		var nombreSeccion = prompt('Agregue un nuevo texto o déjelo en blanco para mantener el actual');
		var orden = prompt('Agregue un nuevo orden numérico o déjelo en blanco para mantener el actual');
		
		//si no se pone un orden se toma el anterior
		if ( orden == '' ) {
			orden = contenedorOrden.html();
		}

		//si no se pone nombre de seccion no se actualiza
		if ( nombreSeccion == '' ) {
			data = {
	                seccion: idsection,
	                orden: orden,
	            }
		} else {
			data = {
            seccion: idsection,
            orden: orden,
            texto: nombreSeccion,
            },
			$(contenedor).html(nombreSeccion);
		}

		contenedorOrden.html(orden);
		
		//hay que modificar el nombre de la nueva seccion en base de datos
		$.ajax( {
	            type: 'POST',
	            url: ajaxFunctionDir + '/update-section-docs.php',
	            data: data,
	            success: function ( response ) {
	            	if ( response == 'ok' ) {
		            	window.location.href = url;
		            }
	            },
	            error: function ( ) {
	                console.log('error');
	            },
	        });//cierre ajax
	});//cambiar nombre de sección

	//botones de borrar y cambiar archivos
	$(document).on('click', '.btn-del-file-docs', function(){
		var li = $(this).closest('li')
		var id = $(this).closest('article').attr('id');
		var confirmar = confirm('¿Está seguro de que quiere borrar este item?');
		if (confirmar) {
		//borrar item de la base de datos
			$.ajax( {
		            type: 'POST',
		            url: ajaxFunctionDir + '/delete-item-docs.php',
		            data: {
		                idItem: id,
		            },
		            success: function ( response ) {
		            	console.log(response)
		            	if (response == 'deleted') {
		            		$(li).remove();
		            	}
		            },
		            error: function ( ) {
		                console.log('error');
		                $('.error-msj-docs').html('No se pudo borrar');
		            },
		        });//cierre ajax
		}
	});//borrar archivo docs


	//cambiar archivo docs
	$(document).on('click', '.btn-load-file-docs', function(){
		
		var article = $(this).closest('article');
		var contenedor = article.find('.link-docs-file')
		var url = uploadDirArchivos + '/';

		$( "#dialog" ).dialog({
				title: 'Biblioteca de archivos',
				autoOpen: false,
				appendTo: '.contenido-modulo',
				height: 600,
				width:768,
				modal: true,
				buttons: [
			    {
			    	text: "Cerrar",
			      	class: 'btn btn-default',
			      	click: function() {
			        $( this ).dialog( "close" );
			      }
			    },
			    {
			    	text: 'Insertar archivo',
			    	class: 'btn btn-success imagenes-galerias',
			    	click: function () {
			    		//se toma el nombre de la imagen
			    		var newFile = $('.previewAtachment').val();
			    		if ( newFile.length == 0 ) {
			    			$( this ).dialog( "close" );
			    			return;
			    		}
			    		contenedor.empty();
			    		var html = '<a href="'+url+newFile+'" target="_blank" data-href="'+newFile+'" data-type="file">'+newFile+'</a><br><small><span class="btn-load-file-docs">Cambiar</span> o <span class="btn-del-file-docs">Borrar</span> archivo</small>';
			    		contenedor.append($(html));
			    		//se cierra el dialogo
			    		$( this ).dialog( "close" );
			    	}
			    },
			  ],
			});
			$( "#dialog" ).dialog( 'open' ).load( templatesDir + '/media-browser.php' );

	});//cambiar archivo docs


	//agregar archivo docs (no hace nada en la BD hasta que se guardan los cambios)
	$(document).on('click', '.new-link-docs-btn', function(){
		var id = $(this).closest('ul').attr('id');
		var IDcontenedor = '#'+id;
		var contenedor = $(IDcontenedor);

		subsection = IDcontenedor.replace('#','');

		$.ajax( {
            type: 'POST',
            url: ajaxFunctionDir + '/create-item-docs.php',
            data: {
            	subsection : subsection,
                postType: 'file',
                linkcopiado: 'none',
            },
            success: function ( response ) {
            	contenedor.prepend(response);
            },
            error: function ( ) {
                console.log('error');
            },
        });//cierre ajax

	});//agregar link archivo docs

	//agregar url docs (no hace nada en la BD hasta que se guardan los cambios)
	$(document).on('click', '.new-link-docs-btn-url', function(){
		var id = $(this).closest('ul').attr('id');
		var IDcontenedor = '#'+id;
		var contenedor = $(IDcontenedor);

		var linkcopiado = prompt("copie el link aquí");

		subsection = IDcontenedor.replace('#','');

		$.ajax( {
            type: 'POST',
            url: ajaxFunctionDir + '/create-item-docs.php',
            data: {
            	subsection : subsection,
                postType: 'url',
                linkcopiado: linkcopiado,
            },
            success: function ( response ) {
            	console.log(response)
            	contenedor.prepend(response);
            },
            error: function ( ) {
                console.log('error');
            },
        });//cierre ajax
	});//agregar link archivo docs


	

	//guardar cambios link docs
	$(document).on('click', '.btn-save-file-docs', function(){
		var idSeccion = $(this).closest('ul').attr('id');
		var article = $(this).closest('article');
		var orden = article.find('.link-docs-orden').val();
		var texto = article.find('.link-docs-texto').val();
		var url = article.find('.link-docs-file a').attr('data-href');
		var subsection = article.find('.link-docs-sucsection').val();
		var errormsj = article.find('.error-tag');
		var newItem = false;
		var idItem = article.attr('id');
		var docsType = 'file';
		
		if (article.attr('id') == 'id' ) {
			newItem = true;	
		}
		if ( article.find('.link-docs-file a').attr('data-type') == 'url') {
			docsType = 'url';
		}
		
		//modificar la base de datos con nuevo archivo
		$.ajax( {
	            type: 'POST',
	            url: ajaxFunctionDir + '/save-item-docs.php',
	            data: {
	                postType: 'link',
	                seccion: idSeccion,
	                subsection: subsection,
	                url: url,
	                texto: texto,
	                orden: orden,
	                newItem: newItem,
	                idItem: idItem,
	                docsType: docsType,
	            },
	            beforeSend: function() {
	            	errormsj.html('guardando, espere');
            	},
	            success: function ( response ) {
	            	console.log(response)
	            	article.attr('id', response);
	            	errormsj.html('Elemento guardado');
	            },
	            error: function ( ) {
	                console.log('error');
	            },
	        });//cierre ajax

	});//guardar cambios link docs	

});