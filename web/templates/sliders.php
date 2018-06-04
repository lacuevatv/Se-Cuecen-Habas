<?php 
$sliders = getSliders();    
?>

<div class="wrapper-slider">
    <ul id="slider_home" class="sliders owl-carousel">
    <?php 
    for ($i=0; $i < count($sliders); $i++) { ?>
        <li>
            <div class="image-background" style="background-image:url(<?php echo UPLOADSURL . '/' . $sliders[$i]['slider_imagen']; ?>)">
                <h2>
                    <?php echo $sliders[$i]['slider_titulo']; ?>
                </h2>
                <p>
                    <?php echo $sliders[$i]['slider_texto']; ?>
                </p>
                <?php if ( $sliders[$i]['slider_link'] != '' ) : ?>
                    <a href="<?php echo $sliders[$i]['slider_link']; ?>">
                        <?php echo $sliders[$i]['slider_textoLink']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </li>
    <?php } ?>

    </ul>
</div>