<div class="wrapper-pagination">
    <ul class="pagination" data-post-per-page="<?php echo $data['postPerPage']; ?>" data-categoria-loop="<?php echo $data['categoria']; ?>" data-page-actual="<?php echo $data['pageActual']; ?>">
        <?php 
        for ($i=0; $i < $data['numberPages']; $i++) { ?>
            <li <?php if ( $data['pageActual'] == $i+1 ) {
                echo ' class="active"';
            } ?>>
                <a href="<?php echo $i+1; ?>" class="page-click-btn">
                    <?php 
                        if ( ($i+1) < 10 ) {
                            echo $i+1;
                        } else {
                            echo '0'.$i+1;
                        } 
                    ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div><!--- //.wrapper-pagination -->