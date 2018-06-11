<?php 
    for ($i=0; $i < count($data); $i++) { ?>
        <li>
        <?php if ($data[$i]['post_imagen'] == '') { ?>
                <article class="salon" data-id="<?php echo $data[$i]['post_ID']; ?>">
        <?php } else { ?>
                <article class="salon" data-id="<?php echo $data[$i]['post_ID']; ?>" style="background-image:url(<?php echo UPLOADSURL.'/'.$data[$i]['post_imagen']; ?>)">
        <?php } ?>
            
            <div class="data-wrapper">
                <?php  if ( ! $data[$i]['post_titulo'] == '' ) : ?>
                <h1>
                    <?php echo $data[$i]['post_titulo']; ?>
                </h1>
                <?php  endif; ?>

                <?php  if ( ! $data[$i]['post_resumen'] == '' ) : ?>
                <p>
                    <?php echo $data[$i]['post_resumen']; ?>
                </p>
                
                <?php  endif; ?>

                <h5>
                    Ver info
                </h5>
            </div>
           
            <div class="extra-data">
                <div class="salon-more-info-data">
                    <div class="salon-contenido">
                        <?php  if ( ! $data[$i]['post_titulo'] == '' ) : ?>
                        <h1>
                            <?php echo $data[$i]['post_titulo']; ?>
                        </h1>
                        <?php  endif; ?>

                        <?php  if ( ! $data[$i]['post_contenido'] == '' ) : ?>
                        <p>
                            <?php echo $data[$i]['post_contenido']; ?>
                        </p>
                        
                        <?php  endif; ?>
                    </div>
                    
                    <?php  if ( $data[$i]['post_galeria'] == 0 ) : ?>
                    <div class="salon-galeria" data-galeria-activate="false">
                        <figure>
                            <img data-src="<?php echo UPLOADSURL.'/'.$data[$i]['post_imagen']; ?>">
                        </figure>
                    <?php else :
                        $imagenes = unserialize($data[$i]['post_imagenesGal']);
                        
                        if ( ! empty($imagenes) ) { ?>
                        <div class="salon-galeria" data-galeria-activate="true">
                            <ul class="slider-salones owl-carousel">
                                
                                <?php
                                foreach ($imagenes as $imagen ) { ?>
                                    <li>
                                        <img data-src="<?php echo UPLOADSURL.'/'.$imagen; ?>">
                                    </li>
                                
                            <?php } //foreach
                                ?>
                                </ul>    

                            <?php } else {

                                //por las dudas de q la galería este activada pero no haya imagenes dentro
                                ?>
                            <div class="salon-galeria" data-galeria-activate="false">
                                <figure>
                                    <img data-src="<?php echo UPLOADSURL.'/'.$data[$i]['post_imagen']; ?>">
                                </figure>

                            <?php } ?>
                        
                        <?php  endif; ?>
                    </div>
                </div>
            </div>
            </article>
        </li>        
<?php }