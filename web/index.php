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
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Welcome
                    </h2>
                    <h3>
                        Hot food and Cold Dring
                    </h3>
                </hgroup>
                <p>
                    Hacemos cocina de diseño, sabrosa y abundante, para eventos sociales o corporativos. Una exquisita variedad de platos gourmet para un público amplio y exigente. Trabajamos fieles a nuestra cultura del buen comer, nos da satisfacción el servir y nos apasiona brindar verdaderas experiencias gastronómicas que van mucho más allá de solo llevarse algo rico a la boca.
                </p>
                <img src="<?php echo MAINSURL; ?>/assets/images/firma@2x.png" alt="Firma Richard">
            </div><!--- //.container -->
        </section><!--- //.section-intro -->

        <!--- section-servicios -->
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Servicios
                    </h2>
                    <h3>
                        Criollo & Gourmet
                    </h3>
                </hgroup>
                <!--- servicios:criollo y gourmet -->
                <ul>
                <!--- servicio Item:criollo -->
                    <li>
                        <article>
                            <h1>
                                Criollo
                            </h1>
                            <p>
                                Nuestros asados están hechos por Expertos asadores muy lentamente al rescoldo del fogón. Disfruta de la Calidad de la Tradicional carne Argentina con nuestra selección de Novillitos Aberdeen Angus criados en los mejores campos de la Región Pampeana.
                            </p>
                            <button>
                                Ver Menú
                            </button>
                        </article>
                    </li><!--- //servicio Item:criollo -->
                <!--- servicio Item:gourmet -->
                    <li>
                        <article>
                            <h1>
                                Gourmet
                            </h1>
                            <p>
                                Disfruta de la más variada selección de Sabores Gourmet, con productos elegidos y obtenidos de los lugares donde mejor expresan su calidad. Cada Bocado o Plato es tratado por nuestros Expertos Chefs con el cuidado y experiencia que se merecen.
                            </p>
                            <button>
                                Ver Menú
                            </button>
                        </article>
                    </li><!--- //servicio Item:gourmet -->
                </ul><!--- //servicios:criollo y gourmet -->

                <button>Ver imágenes</button>
            </div><!--- //.container -->
        </section>
        <!--- //.section-servicios -->

        <!--- section-elegirnos -->
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Por qué elegirnos
                    </h2>
                    <h3>
                        Buscamos Superarnos día a día
                    </h3>
                </hgroup>

                <ol>
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

            <div class="container">
                <ul>
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
        </section>
        <!--- //.section-elegirnos -->

        <!--- section-salones -->
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Salones
                    </h2>
                    <h3>
                        Atención, Variedad & Calidad
                    </h3>
                </hgroup>

            </div><!--- //.container -->

            <img src="<?php echo UPLOADSURL; ?>/ref-fotos-salones.jpg" style="display:block;width:100%;margin:0 auto;">
        </section>
        <!--- //.section-salones -->

        <!--- section-clientes -->
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Clientes
                    </h2>
                    <h3>
                        Quiénes nos eligen
                    </h3>
                </hgroup>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.
                </p>
                <img src="<?php echo UPLOADSURL; ?>/logos-inferiores-ref@2x.png" style="display:block;width:100%;margin:0 auto;">
            </div><!--- //.container -->
        </section>
        <!--- //.section-clientes -->

        <!--- section-comentarios -->
        <section>
            <img src="<?php echo UPLOADSURL; ?>/ref-comentarios.jpg" style="display:block;width:100%;margin:0 auto;">
            <!--<div class="container">
                <hgroup>
                    <h2>
                        Salones
                    </h2>
                    <h3>
                        Atención, Variedad & Calidad
                    </h3>
                </hgroup>

            </div><!--- //.container -->
    
        </section>
        <!--- //.section-comentarios -->

        <!--- section-contacto -->
        <section>
            <div class="container">
                <hgroup>
                    <h2>
                        Contacto
                    </h2>
                    <h3>
                        Contactate con nosotros
                    </h3>
                </hgroup>
                <div class="wrapper-form">
                    <?php getTemplate('form'); ?>
                </div><!--- //.wrapper-form -->
            </div><!--- //.container -->
        </section>
        <!--- //.section-contacto -->

    </div><!--- //.inner-wrapper -->
</main><!--- //.main-wrapper -->

<?php include 'footer.php';
