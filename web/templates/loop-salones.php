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
            </article>
        </li>        
<?php }