<ul id="slider_home" class="sliders owl-carousel">
<?php 
for ($i=0; $i < count($data); $i++) { ?>
    <li>
        <div class="image-background" style="background-image:url(<?php echo UPLOADSURL . '/' . $data[$i]['slider_imagen']; ?>)">
            <h2>
                <?php echo $data[$i]['slider_titulo']; ?>
            </h2>
            <p>
                <?php echo $data[$i]['slider_texto']; ?>
            </p>
            <?php if ( $data[$i]['slider_link'] != '' ) : ?>
                <a href="<?php echo $data[$i]['slider_link']; ?>">
                    <?php echo $data[$i]['slider_textoLink']; ?>
                </a>
            <?php endif; ?>
        </div>
    </li>
<?php } ?>

</ul>
