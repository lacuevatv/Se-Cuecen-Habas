# AMINISTRADOR

Pequeño administrador para sitios web que permite crear entradas, tipo noticias, con imagen destacada, galería de imagenes, texto enriquecido y link de video. Se organiza por categorías.  
Además, permite manejar cargar y subir imagenes y archivos y manejar sliders.


### Librerías
* jQuery v3.2.1  
* tinymce 4.7.1 (editor de noticias)  
* jQuery UI 1.12.1   
* Base de datos básica con un usuario: coco@lacueva.tv / password

## Versiones

* 6.2.0 - 22/05/18  
- agregue el modulo de galeria de imágenes, lista categorias que están en el archivo config
- agregue el modulo de descarga de archivos, lista categorias que están en el archivo config
- hice el template de info-adicional que serviría para redes, teléfono, direcciones, etc, pero todavía no tiene conexión con la base de datos

* 6.1.0 - 10/02/18  
- cambié el nombre de la table 'noticias' por 'posts' así luego puedo incluir paginas  

* 6.0.0 - 10/01/18
- agregue gestión de usuarios con 3 distintos: Status 0: Administrador-gral Status 1: Editor, tiene acceso a todos los módulos, pero no puede administrar usuarios ni cambiar contraseñas Status letras, indican el modulo al que puede acceder, por default es solo noticias   

* 5.0.2 - 26/12/17  
-agregué url de administrador, para que los scripts se coloquen en la carpeta adecuada y no tener que cambiar todos los urls cada vez.

* 5.0.1 - 12/11/17  
-Corregido en modulo-noticias función backend de ajax para que cargue bien el null en la base de datos en la fecha de agenda
-Corregido el js para que al publicar una noticia nueva el administrador recargue la página con el url nuevo y te muestra ya el botón de que ya está publicado

* 5.0 - 10/11/17  
-Agregué archivo config  
-Quité el bootstrap para el front end y el css es todo personalizado  
-Restructuración de carpetas para que no se complique la busqueda de modulos  
-Las url están todas referidas a la principal en una variable tanto en javascript como en php, para no tener que andar cambiando todos los url todo el tiempo de las funciones ajax y todo lo demás.  
-Separé las funciones por modulos, tanto la parte de php como javascript, los script de javascript se cargan mediante una función si son necesarios.  
-las categorias de las noticias se definen en un array en el archivo config. Hay una función que las ubica en el lugar correcto en editar noticias.  
-las imagenes se cargan en la base de datos, por defecto no tienen ningún post_type  
-Cree una función javascript que indica y actualiza su post_type de ser necesario, por ejemplo en el caso de la promo, en ese caso, lo que hace es duplicar la entrada en la base de datos y a una de ellas le pone el post_type indicado. Esto se duplica porque si la imagen era de otra cosa, al ponerlo como promo la otra cosa no la puede utilizar más y considerando que solo se duplica la entrada en la base de datos, conviene hacerlo para ahorrarse problemas.  
-Al borrar una imagen de la biblioteca, también se borra en el servidor.  

* Versión 4.0
-restructuración porque el modal de bootstrap me causaba bastantes problemas  

* Versión 3.0
-Agrego sistema de usuarios  
-Agrego modulo de editar noticias  
-Biblioteca de imagenes recorre el directorio, las imagenes no están en la base de datos  
-Se agregó la función callback de tinymce para cargar fotos propias y tener una mini biblioteca. Esa mini biblioteca usa tabs por ajax con jquery ui, y para eso se creo una carpeta ajax dentro de template, donde están los html que pide esas tabs con ajax  
-Modulo de carga los sliders  
-Las imagenes se cargan desde una biblioteca que se hizo con .dialog() de jquery ui  
-En las noticias, la galería de imagenes muestra las imágenes y se pueden ordenar mediante drag and drop  

NOTA: Al usar modals, de bootstrap, las ventanas del editor de tinymce no funcionan correctamente. Los inputs no se pueden acceder, cuando queres escribir algo, entonces los links, las imágenes y todo lo que tengas un input para escribir no es accesible. Para corregir este error sirve este pequeño código:  


$(document).on('focusin', function(e) {
  if ($(e.target).closest('.mce-window').length) {
    e.stopImmediatePropagation();
  }
});


* Versión 2.0 - fecha 10.5.17
-Front end del admin hecho con bootstrap, mejorado y colorido -Los modulos cargan mediante ajax -se pueden cargar más de una imagen a la vez -Seccion Contactos es una tabla, se puede imprimir y exportar a excel -el popup tiene una imagen por defecto (esa función hay que incluirla en el front también pero la imagen siempre esta en admin) -con un formulario se puede subir todos los archivos e indicar a que sección pertenece -Estructura: Templates(html modulos y jquery incluido en el template para que ese script cargue solo con el modulo) -se suben archivos y links -los post_type de archivos son únicos, por lo tanto siempre se remplazan 'REPLACE INTO' en las query de MySQL. -Galería tiene papelera de reciclaje para arrepentirse

* Versión 1.1 online
