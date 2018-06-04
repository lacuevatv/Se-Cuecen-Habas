<div class="recomendaciones-wrapper">
    <div class="container">
        <hgroup class="padding-interno">
            <h2 class="title-section">
                Experiencias
            </h2>
            <h3 class="subtitle-section">
                Quiénes nos <em>recomiendan</em>
            </h3>
        </hgroup>

        <div class="comentarios-wrapper">
            <ul id="owl-comentarios" class="comentarios owl-carousel">
            <?php for ($i=0; $i < count($data); $i++) { ?>
                <li>
                    <div class="comentario-main">
                        <em>
                            <?php echo $data[$i]['post_contenido']; ?>
                        </em>
                    </div>
                    <div class="name">
                        <strong><?php echo $data[$i]['post_titulo']; ?></strong>,
                        <?php echo $data[$i]['post_resumen']; ?>
                    </div>
                </li>
            <?php } ?>
                
            </ul><!--//.comentarios-->
        </div><!--//.comentarios-wrapper-->
    

    </div><!--//.container-->
</div><!--//.recomendaciones-wrapper-->