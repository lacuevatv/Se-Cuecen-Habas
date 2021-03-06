/**
 * Sitio web: Se Cuecen Habas
 * @LaCueva.tv by Hit.com.ar
 * @required jQuery
 * @ver 1.0
 --------------------------------------------------------------
>>> TABLE OF CONTENTS:
1.0 A) ON READY: Scroll top, toggle menu movil, toggle menuses criollo y gourmet
B ) ON LOAD (requieren que todo este cargado): Carga asincrona de imágenes, animaciones
2.0 FORMULARIOS
3.0 POP UP PROMO
3.0 OWL SLIDERS
--------------------------------------------------------------*/

var baseUrl = 'http://' + window.location.host;
var ajaxFileUrl = baseUrl + '/inc/ajax.php';

//se pasa con numeral #page
function scrollToID ( id ) {
    $('html, body').stop().animate({
        scrollTop: $(id).offset().top
    }, 'slow');
}

/*--------------------------------------------------------------
1.0 NAVIGATION
--------------------------------------------------------------*/

$(document).ready(function(){

    /*
     * SCROLL TOP
    */
    $('.go-up').click(function(){
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });
    /*
     * SCROLL TO (links)
    */
   $('.scroll-to').click(function( e ){
        e.preventDefault();
        var href = $(this).attr('href');
        scrollToID(href);
        if ( window.innerWidth < 992 ) {
            MovilMenuToggle();
        }
   });
   
    /*
     * TOGGLE
    */
   $('.toggle').click(MovilMenuToggle);

   function MovilMenuToggle (){
        if ( ! $('.toggle').hasClass('toggle-open') ) {
            $('.toggle').addClass('toggle-open');
        
            var items = $('.main-menu-item');
            var h = 52;
            for (var i = 0; i < items.length; i++) {
                $(items[i]).css('top', h+'px');
                h += 50;
            }
        } else {
            $('.toggle').removeClass('toggle-open');

            var items = $('.main-menu-item');
            var h = 552;
            for (var i = 0; i < items.length; i++) {
                $(items[i]).css('top', '-'+h+'px');
            }
        }
       
   }

   /*
    * MENU CRIOLLO Y GOURMET
   */
    $(document).on('click', '.btn-toggle-menu', function (e) {
        e.preventDefault();
        //buscar menu items
        var article = $(this).closest('article');
        var menus = $(article).find('.menus-contenido');
        
        //si es movil
        if (window.innerWidth < 992 ) {
            var contenedor = $(article).find('.wrapper-menus-movil');  
            var h = contenedor.prop('scrollHeight');
            if ( contenedor.height() == 0 ) {
                contenedor.animate({
                    'height': h+'px',
                }, 500);
            } else {
                contenedor.animate({
                    'height': 0,
                }, 500);
            }

        } else {
            //si es pc
            var href = '#'+$(this).attr('data-href');
            var wrapper = $(href);//este es el que hay que hacer crecer la altura
            var hrefcontenedor = '#'+$(this).attr('data-href') + ' .container';//pero aca hay que incluir el menu
            var contenedor = $(hrefcontenedor);
            contenedor.find('.menus-contenido').remove();
            contenedor.append( $(menus.clone() ));
            var h = wrapper.prop('scrollHeight');
            if ( wrapper.height() == 0 ) {
                wrapper.animate({
                    'height': h+'px',
                }, 500);
            } else {
                wrapper.animate({
                    'height': 0,
                }, 500);
                
            }
        }
    });

    //close menus
    $(document).on('click', '.close-menu', function () {
        var menu = $(this).closest('.wrapper-menus');
        menu.animate({
            'height': 0,
        }, 500);
    });

    /*
    * pagination
    */

    //clic en los numeros de paginas
    $(document).on('click', '.page-click-btn', function( event ){
        event.preventDefault();
        var actualPage = $('.active').attr('href');
        var postPerPage = $('.pagination').attr('data-post-per-page');
        var contenedor = $('.salones');
        var categoria = 'salones';
        page = $(this).attr('href');
        id = '#page'+page;

        $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'paginationLoop',
                page: page,
                postPerPage: postPerPage,
                categoria: 'salones',
            },
            //funcion antes de enviar
            beforeSend: function() {
            },
            success: function ( response ) {
                //console.log(response)
                var newPage = $( '<div id="page'+page+'" class="pages-salones">' + response + '</div>' );
                contenedor.append(newPage);
            },
            error: function ( ) {
                console.log('error');
            },
    });//cierre ajax
            

        //además quitamos a todos la clase activate
        $('.active').each(function(){
            $(this).removeClass('active');
        });
        //y le asignamos la clase activate al elemento clickeado
        $(this).addClass('active');
        
    });//.click .page.click-btn


    /*
     * SALONES TOGGLE
    */
    var galeriasActivas = 0;
    $(document).on('click', '.salones li', function (){
        var popup = $('.salones-popup');
        var dataContenedor = $(this).find('.salon-more-info-data');

        //se cierra el popup para vaciarlotodos los demás si es que hay alguna abierto
        $(popup).animate({
            'height': 0,
        }, 500, function() {
            $(popup).empty();
            //agrego boton para cerrar
            $(popup).append( $('<span class="close-data-salon"></span>') );
            //agrego la data a mostrar que la clono de cada articulo
            var newData = $( dataContenedor.clone() );
            $(popup).append( newData );
            var dataGaleria = $(newData).find('.salon-galeria');
            var galeriaActivated = $(dataGaleria).attr('data-galeria-activate');
            var itemsGaleria = $(newData).find('.slider-salones');
            
            /*
            * CARGA DE IMAGENES
            */
            //1. busca que hay que cargar
            var imagenes = $(dataGaleria).find('img');
            
            imagenes.each(function(){

                if ( ! $(this).attr('src') ) {
                    $(this).attr('src', $(this).attr('data-src') );
                } 

            });//load images
            
            /*
            * ACTIVAR EL SLIDER SI ES NECESARIO
            */
            //si tiene galería de fotos hay que activar el owl slider
            if ( galeriaActivated ) {
                //chequeamos si ya no está activada
                if ( ! $(itemsGaleria).hasClass('owl-loaded') ) {
                    
                    galeriasActivas++;
                    $(itemsGaleria).attr('id', 'salon-galeria-'+galeriasActivas)
                    owlCarouselStart ('#salon-galeria-'+galeriasActivas);

                }
            }
            if (innerWidth < 992 ) {
                var h1 = $(popup).find('.salon-contenido').prop('scrollHeight');
                var h2 = $(popup).find('.salon-galeria').prop('scrollHeight');

                var h = h1+h2;
                //si es menor a 200 la altura se coloca un mínimo para que no se vea mal
                if ( h < 200 ) {
                    h = 800;
                }
             } else {
                var h = $(popup).find('.salon-galeria').prop('scrollHeight');
                //si es menor a 200 la altura se coloca un mínimo para que no se vea mal
                if ( h < 200 ) {
                    h = 650;
                }
            }

            $(popup).animate({
                'height': h + 'px',
            }, 500);
           
            if (innerWidth < 992 ) {
                scrollToID('#salonespopup');
            } else {
                $('html, body').stop().animate({
                    scrollTop: $('#salonespopup').offset().top -150
                }, 'slow');
            }
            
        });   
    });//click salones li

    $(document).on('click', '.close-data-salon', function (){
        $('.salones-popup').animate({
            'height': 0,
        }, 500);
    });//click close data salon





    /*
     * VER IMAGENES
    */
    $(document).on('click', '.btn-ver-imagenes', function (){
        var btn = this;
        var contenedor = $('.wrapper-images');

        if ( $(btn).attr('data-open') == 'true' ) {
            //el contenedor esta abierto, hay que cerrarlo y salir
            $(btn).attr('data-open', 'false');
            $(btn).text('Ver imágenes');
            $(contenedor).animate({
                'height': 0 +'px',
            }, 500);
            return true;
        } else {
            //el contenedor no está abierto, se ejecuta toda la funcion:

            //1. se agrega la indicacion de que ahora esta abierto
            $(btn).attr('data-open', 'true');

            //2.ahora hay que ver si hay imagenes o no:
            var galeria = $('#galeria-imagenes-menu li img');
            cantImagenes = galeria.length;
            cuenta = 1;
            if ( cantImagenes == 0  ) {
                //si no hay imagenes
                $(contenedor).animate({
                    'height': 100 +'px',
                }, 500); 
                     
            } else {

                //3. indicar al usuario que se esta cargando
                $(btn).text('Cargando imágenes...');

                //4 carga las imagenes de a una y las cuenta
                galeria.each(function(){

                    //si no estan cargadas:
                    if ( ! $(this).attr('src') ) {
                        $(this).attr('src', $(this).attr('data-src') );

                        this.onload = function () {
                            console.log(cuenta)
                            cuenta++;
    
                            if ( cuenta == cantImagenes ) {
                                //cuando llega al final de todas las imagenes recien continua:
                                //5. activa el owl-carousel sino esta ya activado
                                if ( ! $(galeria).hasClass('owl-loaded') ) {
                                    owlCarouselStartAutoHeigh('#galeria-imagenes-menu');
                                }
    
                                //6. muestra las imagenes
                                var h = $('#galeria-imagenes-menu').prop('scrollHeight');
                                $(contenedor).animate({
                                    'height': h +'px',
                                }, 500);
                                $(btn).text('Ocultar imágenes');
                            }  
                        }

                    } else {
                        //si ya estaban cargadas lo unico que se hace es abrir el contendedor para mostrarlas
                        var h = $('#galeria-imagenes-menu').prop('scrollHeight');
                        $(contenedor).animate({
                            'height': h +'px',
                        }, 500);
                        $(btn).text('Ocultar imágenes');
                    }

                    
                });//each load images
            }
            


        }
  
    });//clic en ver imagenes


        
    

});//.ready()

/*
 * FUNCIONES QUE REQUIEREN QUE TODO ESTE CARGADO
*/

$( window ).on('load', function(){
    
    /*
     * CARGA ASINCRONA DE IMAGENES
    */

    //carga las imágenes con img src
    $('.load-images').each(function(){
        var img = $(this).find('img');

        $(img).attr('src', $(img).attr('data-src') );
        if ( $(img).attr('src') != '') {
            $(this).fadeIn();
        }
    });//load images

    //carga imagenes cuya carga es por css (background)
    function loadImagesBackgroundCSS ( contenedor, clase ) {
        var html = '<div class="'+clase+'"></div>';
        contenedor.prepend($(html));
    }
    //loadImagesBackgroundCSS ( $('#menu_criollo'), '.image-icon' ) ; 


    /*
     * CARGA EL TEMPLATE DE LOS SALONES
    */
    (function () {
        var wrapper = $('.salones-wrapper');
        var templateRef = $('#loading-salones');
        //ajax de sliders
        $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'salones',
            },
            success: function ( response ) {
               //console.log(response);
               if (response) {
                    //borrar el templateLoading
                    $(templateRef).animate({
                        'height': 0,
                        'padding' :0,
                    }, 500, function(){
                        //luego de animar, se borra
                        $(templateRef).hide();
                        //y se agrega la respuesta
                        $(wrapper).append(response);
                        $(wrapper).animate({
                            'height': $(wrapper).prop('scrollHeight') + 'px',
                        }, 500, function(){
                            //se quita el overflow, porque ahora ya no es necesario y sino se va a ver mal todo lo demás
                            $(wrapper).css('overflow', 'visible');
                        });
                    });
               }
            },
            error: function ( ) {
                console.log('error');
            },
        });//cierre ajax
    })(); 


    /*
     * IN VIEW ANIMATION
     * function que agrega la calse in-view cuando el elemento esta en la pantalla y así animarlo
    */
    var $animation_elements = $('.animate-element');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            $element.addClass('in-view');
        } else {
            $element.removeClass('in-view');
        }
        });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
    

});//ON LOAD

/*--------------------------------------------------------------
2.0 FORMULARIOS
--------------------------------------------------------------*/

var specialcharacters = '@#$^&%*()+=[]\'\"\/{}|:;¡!¿?<>,.';
var numeros = '0123456789';
var letras = 'abcdefghijklmnñopqrstuvwxyz';

//busca los caracteres indicados en un string y devuelve true si existen
function areThereAny ( cadena, characters ) {
    for (var i = 0; i < characters.length; i++) {
       if ( cadena.indexOf(characters[i]) != -1 ) {
            return true;    
       }
   }
   return false;
}

//quita numeros de un string
function cleanedOthers(cadena, caracteres){ 

   //eliminamos uno por uno
   for (var i = 0; i < caracteres.length; i++) {
       cadena= cadena.replace(new RegExp(caracteres[i], 'gi'), '');
   }   

   return cadena;
}

//quita caracteres extraños del string, los caracteres se pasan como una variable
function cleanedSpecialCharacters(cadena, specialcharacters){ 

   //eliminamos uno por uno
   for (var i = 0; i < specialcharacters.length; i++) {
       cadena= cadena.replace(new RegExp("\\" + specialcharacters[i], 'gi'), '');
   }   

   return cadena;
}

//lo pasa a minúsculas
function toLowerCase(cadena) {
    cadena = cadena.toLowerCase();
    return cadena;
}

//remplasa dashes "-" del string por espacios
function replaceDashes( cadena ) {
   cadena = cadena.replace(/-/gi," ");
   cadena = cadena.replace(/_/gi," ");
   return cadena;
}


//borra espacios del string
function removeDashesSpaces( cadena ) {
   cadena = cadena.replace(/-/gi,"");
   cadena = cadena.replace(/_/gi,"");
   cadena = cadena.replace(/ /gi,"");
   return cadena;
}

// Quitamos espacios y los sustituimos por - porque nos gusta mas asi
function replaceSpaces( cadena ) {
   cadena = cadena.replace(/ /gi,"-");
   return cadena;
}

//quita acentos y ñ y lo pasa a minúsculas
function cleanAcentos( cadena ) {

   // Lo queremos devolver limpio en minusculas
   cadena = cadena.toLowerCase();

   // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
   cadena = cadena.replace(/á/gi,"a");
   cadena = cadena.replace(/é/gi,"e");
   cadena = cadena.replace(/í/gi,"i");
   cadena = cadena.replace(/ó/gi,"o");
   cadena = cadena.replace(/ú/gi,"u");
   cadena = cadena.replace(/ñ/gi,"n");
   return cadena;
}


/*
 * FORMULARIO
*/

$(document).ready(function() {
    /*
     * FUNCIONES DE LOS LABEL
    */
    //función que hace zoom out a las etiquetas para escribir en los input:
    function zoomOutLabel( input ) {
        var contenedor = $(input).closest('.form-group')
        var label = $(contenedor).find('label')
        $(label).addClass('on');
    }
    //funcion al hacer click en label
    function focusInput( label ) {
        var contenedor = $(label).closest('.form-group')
        var input = $(contenedor).find('input')
        $(input).focus();
    }

    //clic en label, focus en input
    $(document).on('click', 'label', function(){
        focusInput( this );
    });

    //on focus, etiqueta se achica
    $(document).on('focus', 'input', function(){
        zoomOutLabel( this );
        $(this).addClass('input-on');
    });


    /*
     * VALIDACIONES FORMULARIO
    */
    //FOCUS OUT INPUT
    //input text
    $(document).on('focusout', 'input[type=text]', function() {
        var valor = $(this).val();
        var contenedor = $(this).closest('.form-group');
        var msj = $(contenedor).find('.msj-error-input');

        if ( valor == '' ) {
            $(msj).fadeIn();
            return false;  
        } 

        valor = cleanedSpecialCharacters(valor,specialcharacters);
        
        valor = cleanedOthers(valor,numeros);
        valor = replaceDashes(valor);
        
        $(this).val(valor);

        //si hay números devuelve error
        if ( areThereAny(valor, numeros+specialcharacters) || valor == '' || valor.length < 3) {
            $(msj).fadeIn();
            
        } else { 
            $(msj).fadeOut();
           
        }
    });

    //input type numbers
    $(document).on('focusout', 'input[type=number]', function() {
        
        var valor = $(this).val();
        var contenedor = $(this).closest('.form-group');
        var msj = $(contenedor).find('.msj-error-input');

        if ( valor == '' ) {
            $(msj).fadeIn();
            return false;  
        } 
        
        valor = cleanedOthers(valor,letras);
    
        valor = cleanedSpecialCharacters(valor,specialcharacters)
                
        $(this).val(valor);

        //si hay letras o no pasa alguna de las validaciones devuelve error
        if ( areThereAny(valor, letras+specialcharacters || valor.length < 7) ) {
            $(msj).fadeIn();
            
        } else {
            $(msj).fadeOut(); 
        }
    });

    //input tyme email
    $(document).on('focusout', 'input[type=email]', function() {
        var valor = $(this).val();
        var contenedor = $(this).closest('.form-group');
        var msj = $(contenedor).find('.msj-error-input');

        if ( valor == '' ) {
            $(msj).fadeIn();
            return false;  
        } 

        valor = cleanedSpecialCharacters(valor,'#$^&%*()[]\'\"\/{}:;<>,');
        
        //remueve algún espacio si hay
        valor = valor.replace(/ /gi,"");
        
        $(this).val(valor);

        //si hay números devuelve error
        if ( valor == '' || valor.length < 8 || valor.indexOf('@') == -1 || valor.indexOf('@')  == 0 ) {
            $(msj).fadeIn();
        } else {
            $(msj).fadeOut();
        }
    });


    /*
     * SUBMIT FORMULARIO
    */    

    $(document).on('submit', '#reunion-form', function( e ) {
        e.preventDefault();
        var loader = $('.loader');
        var contenedor = $(loader).closest('form');
        var msj = $(this).find('.msj-form');
    	formData = new FormData( this );
        formData.append('function','formulario-reunion');

    	$.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            //funcion antes de enviar
            beforeSend: function() {
                $(loader).fadeIn();
            },
            success: function ( response ) {
                //console.log(response);
                $(loader).fadeOut(); 
                msj.html(response);    
            },
            error: function ( ) {
                console.log('error');
            },
    	});//cierre ajax

    });//submit formulario 1

    $(document).on('submit', '#default-form', function( e ) {
        e.preventDefault();
        var loader = $('.loader');
        var msj = $(this).find('.msj-form');
        var contenedor = $(loader).closest('form');

    	formData = new FormData( this );
        formData.append('function','formulario-default');

    	$.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            //funcion antes de enviar
            beforeSend: function() {
                $(loader).fadeIn();
            },
            success: function ( response ) {
                //console.log(response);
                $(loader).fadeOut(); 
                msj.html(response);    
            },
            error: function ( ) {
                console.log('error');
            },
    	});//cierre ajax

    });//submit formulario default

});//on ready

/*--------------------------------------------------------------
3.0 POPUP PROMO
--------------------------------------------------------------*/

$(window).on('load', function(){
    var popup = $( '.popup' );
    var popupIMG = $( '.popup img' );
    var tiempo = 7000;
    if ( popup.length != 0 ) {
        var closeX = $( '.close-popup' );
        var closeBTN = $( '.cerrar-popup' );
        
        function openPop () {
            popup.addClass('popup-active');
            popupIMG.fadeIn();
        }
        
        setTimeout( openPop, tiempo);
        
        function closePopup() {
            popup.removeClass('popup-active');
            popupIMG.fadeOut(tiempo);
        }

        closeX.click(closePopup);
        closeBTN.click(closePopup);

    }
});


/*--------------------------------------------------------------
3.0 OWL SLIDERS
** slider del home
** comentarios
--------------------------------------------------------------*/

$(window).on('load', function(){
    (function () {
        var contenedorSliders = $('.wrapper-slider');
        var contenedorRecomendaciones = $('#experiencias');
        //ajax de sliders
        $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'slider-home',
            },
            success: function ( response ) {
                contenedorSliders.append(response);
                owlCarouselStart ('#slider_home');
                var h = $('.sliders li').prop('scrollHeight')
                contenedorSliders.animate({
                    'height': h+'px',
                }, 500);
            },
            error: function ( ) {
                console.log('error');
            },
        });//cierre ajax
        //ajax de comentarios
        $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'experiencias',
            },
            beforeSend: function () {
                //quitar el div de loading
                $(contenedorRecomendaciones).find('.loading-salones').fadeOut();
            },
            success: function ( response ) {
                //console.log(response);
            
                //insertar la imagen
                $(contenedorRecomendaciones).css('background-image', 'url(contenido/cuatro.jpg)');
                //insertar la respuesta de html
                $(contenedorRecomendaciones).append(response)
                //iniciar el slider
                owlCarouselStart ('#owl-comentarios');
                var h = $('.recomendaciones-wrapper').prop('scrollHeight')
                contenedorRecomendaciones.animate({
                    'height': h+'px',
                }, 500);
            },
            error: function ( ) {
                console.log('error');
            },
        });//cierre ajax

    })(); 

    //clientes slider (ese es mas sencillo)
    $(item).owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        doots: true,
        navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
        responsive:{
            0:{
                items:1
            },
        }
    });

});//on load

function owlCarouselStart (item) {
    $('#clientesSlider').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        doots: false,
        lazyLoad: true,
        autoplay:true,
        autoplayTimeout:4000,
        //navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
        }
    }); 
}

function owlCarouselStartAutoHeigh (item) {
    $(item).owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoHeight: true,
        doots: true,
        navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
        responsive:{
            0:{
                items:1
            },
        }
    }); 
}



