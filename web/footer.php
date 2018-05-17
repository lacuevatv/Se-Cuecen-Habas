<?php
/*
 * Sitio web: Se Cuecen Habas
 * @LaCueva.tv by Hit.com.ar
 * Since 3.0
 * FOOTER
 * 
*/
global $dispositivo;
?>      

<!--- footer -->
    <footer class="main-footer">
    <!--- footer-address -->
	    <div class="footer-address-wrapper">
            <address class="container">
                <ul class="footer-contacto">
                    <li class="address-item">
                        <h3>
                            Planta de elaboración
                        </h3>
                        <p>
                            Pio Collivadino 2995/2297 | Ituzaingo Bs.As. | Argentina
                        </p>
                    </li>
                    <li class="address-item">
                        <h3>
                            Oficinas Comerciales
                        </h3>
                        <p>
                            Moreno 1702 6to Izquierda | C1093ABH Bs.As. | Argentina
                        </p>
                    </li>
                    <li class="address-item">
                        <h3>
                            Teléfono
                        </h3>
                        <p>
                            <?php echo TELEFONO; ?>
                        </p>
                    </li>
                    <li class="address-item">
                        <h3>
                            Email
                        </h3>
                        <p>
                            <?php echo LINK_EMAIL; ?>
                        </p>
                    </li>
                </ul>
            </address>
        </div><!--- //footer-address -->
    <!--- footer-redes -->
        <div class="footer-redes-wrapper">
            <ul class="footer-redes">
                <li>
                    <a href="<?php echo LINK_FACEBOOK; ?>" target="_blank">
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK_TWITTER; ?>" target="_blank">
                        Twitter
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK_GOOGLE; ?>" target="_blank">
                        Google
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK_INSTAGRAM; ?>" target="_blank">
                        Instagram
                    </a>
                </li>
            </ul>
            <a href="#" target="_blank" class="btn-work-us">
                Trabajá con nosotros
            </a>
            <a href="#" target="_blank" class="btn-suscribe">
                Suscribirse al Newsletter
            </a>
        </div><!--- //footer-redes -->

        <!-- ASIDE LEGALES HIT -->
    	<?php getTemplate( 'hit' ); ?>
        
    </footer><!--- // .main-footer -->

</div><!--- //.wrapper-site -->
<!--- scripts -->    
<!------- jquery 3.1.1 ------>
    <script src="<?php echo MAINSURL; ?>/assets/js/jquery-3.2.1.min.js"></script>
    <!------- owl ------>
    <script src="<?php echo MAINSURL; ?>/assets/js/owl.carousel.min.js"></script>
    <!------- OWN SCRIPT ------>
    <script src="<?php echo MAINSURL; ?>/assets/js/script.js"></script>
</body>
</html>
