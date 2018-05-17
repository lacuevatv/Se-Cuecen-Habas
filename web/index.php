<?php
/*
 * Sitio web: Se Cuecen Habas
 * @LaCueva.tv by Hit.com.ar
 * Since 3.0
 *
*/
require_once 'inc/functions.php';

global $pageActual;
global $dispositivo;
$dispositivo = 'pc';
$pageActual = pageActual( cleanUri() );
if ( dispositivo() == 'movil' ) {
    $dispositivo = 'movil';
}

include 'header.php'; ?>
<!--- //.viene de .wrapper-site -->
    
<main role="main" class="main-wrapper">
    <div class="inner-wrapper">

    <!--- .section-intro -->
        <section id="intro" class="section-wrapper">
            <div class="container padding-interno">
                <hgroup>
                    <h2 class="title-section">
                        Welcome
                    </h2>
                    <h3 class="subtitle-section">
                        Hot food <em>and</em> Cold Dring
                    </h3>
                </hgroup>
                <div class="sub-padding-interno">
                    <p>
                        Hacemos cocina de diseño, sabrosa y abundante, para eventos sociales o corporativos. Una exquisita variedad de platos gourmet para un público amplio y exigente. Trabajamos fieles a nuestra cultura del buen comer, nos da satisfacción el servir y nos apasiona brindar verdaderas experiencias gastronómicas que van mucho más allá de solo llevarse algo rico a la boca.
                    </p>
                    <img src="<?php echo MAINSURL; ?>/assets/images/firma@2x.png" alt="Firma Richard" class="firma">
                </div>
            </div><!--- //.container -->
        </section><!--- //.section-intro -->

        <!--- section-servicios -->
        <section id="servicios" class="section-wrapper">
            <div class="container">
                <hgroup class="padding-interno">
                    <h2 class="title-section">
                        Servicios
                    </h2>
                    <h3 class="subtitle-section">
                        Criollo <em>&</em> Gourmet
                    </h3>
                </hgroup>
                <!--- servicios:criollo y gourmet -->
                
                <ul class="padding-interno lista-servicios">

                <!--- servicio Item:criollo -->
                    <li>
                        <?php getTemplate( 'servicio', 'criollo' ); ?>    
                    </li><!--- //servicio Item:criollo -->
                
                    <!--- servicio Item:gourmet -->
                    <li>
                        <?php getTemplate( 'servicio', 'gourmet' ); ?>    
                    </li><!--- //servicio Item:gourmet -->
                
                </ul><!--- //servicios:criollo y gourmet -->

                <button>Ver imágenes</button>

            </div><!--- //.container -->
        </section><!--- //.section-servicios -->

        <!--- section-elegirnos -->
        <section id="elegirnos" class="section-wrapper">
            <div class="container">
                <hgroup class="padding-interno">
                    <h2 class="title-section">
                        Por qué elegirnos
                    </h2>
                    <h3 class="subtitle-section">
                        Buscamos <em>Superarnos</em> día a día
                    </h3>
                </hgroup>
                
                <ol class="sub-padding-interno lista-por-que">
                    <li>
                        Somos conscientes de que esta celebración es única y muy importante para vos y los tuyos.
                    </li>
                    <li>
                        Sabemos que la base del éxito en tu evento es q todos coman sabroso y beban a gusto.
                    </li>
                    <li>
                        Aceptamos sin dudar el desafío de sorprender los paladares más exigentes.
                    </li>
                    <li>
                        Aportamos estética como agregado de valor, nos gusta, consumimos y vivimos diseño.
                    </li>
                    <li>
                        Cuidamos cada detalle, desde la presentación de los platos, el servido de las bebidas, la vajilla utilizada, hasta la imagen y presencia de nuestro personal.
                    </li>
                </ol>

            </div><!--- //.container -->

            <figure>
                <img src="<?php echo UPLOADSURL; ?>/cocina-ref.jpg" alt="Se Cuecen Habas cocina" class="image-responsive">
            </figure>

            <div class="container">
                <ul class="padding-interno lista-expertise">
                    <li>
                        <h3>
                            200 mil Personas
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.
                        </p>
                    </li>
                    <li>
                        <h3>
                            600 eventos
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.
                        </p>
                    </li>
                    <li>
                        <h3>
                            150 cocineros
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.
                        </p>
                    </li>
                </ul>
            </div><!--- //.container -->
        </section><!--- //.section-elegirnos -->

        <!--- section-salones -->
        <section id="salones" class="section-wrapper">
            <div class="container">
                <hgroup>
                    <h2 class="title-section">
                        Salones
                    </h2>
                    <h3 class="subtitle-section">
                        Atención, Variedad & <em>Calidad</em>
                    </h3>
                </hgroup>
            </div><!--- //.container -->

            <?php getTemplate( 'salones' ); ?>

        </section><!--- //.section-salones -->

        <!--- section-clientes -->
        <section id="clientes" class="section-wrapper">
            <div class="container">
                <hgroup class="padding-interno">
                    <h2 class="title-section">
                        Clientes
                    </h2>
                    <h3 class="subtitle-section">
                        Quiénes nos <em>eligen</em>
                    </h3>
                </hgroup>
                <div class="sub-padding-interno">
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.
                    </p>

                    <?php getTemplate( 'clientes' ); ?>

                </div>
                
                
                
            </div><!--- //.container -->
        </section><!--- //.section-clientes -->

        <!--- section-comentarios -->
        <section id="experiencias" class="section-wrapper">
            <img src="<?php echo UPLOADSURL; ?>/ref-comentarios.jpg" style="display:block;width:100%;margin:0 auto;">
            <!--<div class="container">
                <hgroup class="padding-interno">
                    <h2 class="title-section">
                        Experiencias
                    </h2>
                    <h3 class="subtitle-section">
                        Quiénes nos <em>recomiendan</em>
                    </h3>
                </hgroup>

            </div><!--- //.container -->
    
        </section>
        <!--- //.section-comentarios -->

        <!--- section-contacto -->
        <section class="section-wrapper" id="contacto">
            <div class="container">
                <hgroup class="padding-interno">
                    <h2 class="title-section">
                        Contacto
                    </h2>
                    <h3 class="subtitle-section">
                        Contactate con <em>nosotros</em>
                    </h3>
                </hgroup>

                <div class="wrapper-form sub-padding-interno">
                    
                    <?php getTemplate('formulario-contacto', $pageActual ); ?>

                </div><!--- //.wrapper-form -->
            </div><!--- //.container -->
        </section>
        <!--- //.section-contacto -->

    </div><!--- //.inner-wrapper -->
</main><!--- //.main-wrapper -->

<?php include 'footer.php';
