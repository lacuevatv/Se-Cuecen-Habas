<?php 
global $dispositivo;
?>

<ul class="salones">
    <div class="pages-salones" id="page1">
    
    <?php getTemplate('loop-salones' , $data); ?>
    
    </div>
</ul>

<?php getPagination( 'salones', POSTPERPAG ); ?>