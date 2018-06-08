
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
            <article class="servicio-item">
                <figure class="load-images">
                    <img src="<?php echo UPLOADSURL; ?>/dos.jpg" alt="menu criollo">
                </figure>

                <h1 class="h1-criollo">
                    <span class="sr-only">Criollo</span>
                </h1>
                <p>
                    Nuestros asados están hechos por Expertos asadores muy lentamente al rescoldo del fogón. Disfruta de la Calidad de la Tradicional carne Argentina con nuestra selección de Novillitos Aberdeen Angus criados en los mejores campos de la Región Pampeana.
                </p>
                <button id="toggle-criollo">
                    Ver Menú
                </button>
            </article>
        </li><!--- //servicio Item:criollo -->
    
        <!--- servicio Item:gourmet -->
        <li>
            <article class="servicio-item">
                <figure class="load-images">
                    <img src="<?php echo UPLOADSURL; ?>/uno.jpg" alt="menu gourmet">
                </figure>
                <h1 class="h1-gourmet">
                    <span class="sr-only">Gourmet</span>
                </h1>
                <p>
                    Disfruta de la más variada selección de Sabores Gourmet, con productos elegidos y obtenidos de los lugares donde mejor expresan su calidad. Cada Bocado o Plato es tratado por nuestros Expertos Chefs con el cuidado y experiencia que se merecen.
                </p>
                <button id="toggle-gourmet">
                    Ver Menú
                </button>
            </article>
        </li><!--- //servicio Item:gourmet -->
    
    </ul><!--- //servicios:criollo y gourmet -->

</div><!--- //.container -->

<div id="menus-criollo" class="wrapper-menus">
    <div class="container">
        <h2 class="criollo">
            <span class="sr-only">Criollo</span>    
        </h2>

        <div class="menus-contenido">
            
        <?php 
            $menus1 = getMenus( 'criollo', 'sociales' );
            $menus2 = getMenus( 'criollo', 'corporativo' );
            
            if ( $menus1 != null ) : ?>
            <div class="menu-contenido">
                <h3>Sociales<br>
                    <small>Menú</small>
                </h3>
                <ul class="menus-data" data-menu-nombre="criollo" data-menu-subcategoria="sociales">
                    
                    <?php 
                    for ($i=0; $i < count($menus1); $i++) { 
                        $linkMenu = UPLOADSFILE . '/' . $menus1[$i]['docs_url'];
                        if ( $menus1[$i]['docs_type'] == 'url' ) {
                            $linkMenu = $menus1[$i]['docs_url'];
                        }
                        ?>
                        <li>
                            <a href="<?php echo $linkMenu; ?>" target="_blank">
                                <div>
                                    <?php lastTextToItalic( '_', $menus1[$i]['docs_texto']); ?>
                                </div>
                                <span>Descargar pdf</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php endif; 

            if ( $menus2 != null ) : ?>
            <div class="menu-contenido">
                <h3>Corporativo<br>
                    <small>Menú</small>
                </h3>
                <ul class="menus-data" data-menu-nombre="criollo" data-menu-subcategoria="corporativo">
                    
                    <?php 
                    for ($i=0; $i < count($menus2); $i++) { 
                        $linkMenu = UPLOADSFILE . '/' . $menus2[$i]['docs_url'];
                        if ( $menus2[$i]['docs_type'] == 'url' ) {
                            $linkMenu = $menus2[$i]['docs_url'];
                        }
                        ?>
                        <li>
                            <a href="<?php echo $linkMenu; ?>" target="_blank">
                                <div>
                                    <?php lastTextToItalic( '_', $menus2[$i]['docs_texto']); ?>
                                </div>
                                <span>Descargar pdf</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div><!--- //.container -->
</div>

<div id="menus-gourmet" class="wrapper-menus">
    <div class="container">
        <h2 class="gourmet">
            <span class="sr-only">Gourmet</span>
        </h2>

        <div class="menus-contenido">
            
        <?php 
            $menus1 = getMenus( 'gourmet', 'sociales' );
            $menus2 = getMenus( 'gourmet', 'corporativo' );
            
            if ( $menus1 != null ) : ?>
            <div class="menu-contenido">
                <h3>Sociales<br>
                    <small>Menú</small>
                </h3>
                <ul class="menus-data" data-menu-nombre="gourmet" data-menu-subcategoria="sociales">
                    
                    <?php 
                    for ($i=0; $i < count($menus1); $i++) { 
                        $linkMenu = UPLOADSFILE . '/' . $menus1[$i]['docs_url'];
                        if ( $menus1[$i]['docs_type'] == 'url' ) {
                            $linkMenu = $menus1[$i]['docs_url'];
                        }
                        ?>
                        <li>
                            <a href="<?php echo $linkMenu; ?>" target="_blank">
                                <div>
                                    <?php lastTextToItalic( '_', $menus1[$i]['docs_texto']); ?>
                                </div>
                                <span>Descargar pdf</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php endif; 

            if ( $menus2 != null ) : ?>
            <div class="menu-contenido">
                <h3>Corporativo<br>
                    <small>Menú</small>
                </h3>
                <ul class="menus-data" data-menu-nombre="gourmet" data-menu-subcategoria="corporativo">
                    
                    <?php 
                    for ($i=0; $i < count($menus2); $i++) { 
                        $linkMenu = UPLOADSFILE . '/' . $menus2[$i]['docs_url'];
                        if ( $menus2[$i]['docs_type'] == 'url' ) {
                            $linkMenu = $menus2[$i]['docs_url'];
                        }
                        ?>
                        <li>
                            <a href="<?php echo $linkMenu; ?>" target="_blank">
                                <div>
                                    <?php lastTextToItalic( '_', $menus2[$i]['docs_texto']); ?>
                                </div>
                                <span>Descargar pdf</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div><!--- //.container -->
</div>

<div class="btn-wrapper-center">
    <button class="btn-ver-imagenes">
        Ver imágenes
    </button>
</div>