<?php
/*
 * Sitio web: Se Cuecen Habas
 * @LaCueva.tv by Hit.com.ar
 * Since 3.0
 * HEADER
*/
global $pageActual;
global $dispositivo;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITETITLE; ?></title>

<!--favicon-->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#f8f8f8">
<meta name="theme-color" content="#f8f8f8">

<link type="text/plain" rel="author" href="<?php echo MAINSURL; ?>/humans.txt" />
<!-- SEO SECCTION -->
    <meta name="keywords" content="<?php echo METAKEYS; ?>">
    <meta name="description" content="<?php echo METADESCRIPTION; ?>">
    <link rel="canonical" href="<?php echo MAINSURL; ?>" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo SITETITLE; ?>" />
    <meta property="og:description" content="<?php echo METADESCRIPTION; ?>" />
    <meta property="og:url" content="<?php echo MAINSURL; ?>" />
    <meta property="og:site_name" content="<?php echo SITETITLE; ?>" />
    <meta property="og:image" content="<?php echo SCREENSHOT; ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo METADESCRIPTION; ?>" />
    <meta name="twitter:title" content="<?php echo SITETITLE; ?>" />
    <meta name="twitter:image" content="<?php echo SCREENSHOT; ?>" />
<!-- // SEO SECCTION -->

<!-- OWL -->
    <link href="<?php echo MAINSURL; ?>/assets/css/owl.carousel.min.css" rel="stylesheet">
<!-- Custom CSS -->
    <link href="<?php echo MAINSURL; ?>/assets/css/style.css?<?php echo VERSION; ?>" rel="stylesheet">

<!--- modernizr -->
    <script src="<?php echo MAINSURL; ?>/assets/js/modernizr-custom.js"></script>

</head>
<body data-page-actual="<?php echo $pageActual; ?>">
<div class="wrapper-site">
<!--- header -->
    <?php
        openPopUp($pageActual);
    ?>
    <header class="main-header">
        
        <nav class="nav-superior">
            <button class="toggle">
                <span class="tog1"></span>
                <span class="tog2"></span>
                <span class="tog3"></span>
                <span class="sr-only">Menu</span>
            </button>

            <div class="main-menu">
                <a href="#servicios" class="main-menu-item scroll-to">
                    Servicios
                </a>
                
                <a href="#salones" class="main-menu-item scroll-to">
                    Salones
                </a>
                
                <h1 class="brand-name">
                    <span clasS="sr-only">Se Cuecen Habas Catering</span>
                    <img src="<?php echo MAINSURL; ?>/assets/images/logo@2x.png" alt="Se Cuecen Habas Logo">
                </h1>
                
                <a href="#clientes" class="main-menu-item scroll-to">
                    Clientes
                </a>
            
            
                <a href="#contacto" class="main-menu-item scroll-to">
                    Contacto
                </a>
                
            </div>

            <ul class="menu-redes-sup">
                <li>
                    <a href="<?php echo LINK_FACEBOOK; ?>" target="_blank" class="icon-facebook">
                        <span class="sr-only">Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK_TWITTER; ?>" target="_blank" class="icon-twitter">
                        <span class="sr-only">Twitter</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK_INSTAGRAM; ?>" target="_blank" class="icon-instagram">
                        <span class="sr-only">Instagram</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <?php //getTemplate( 'slider-header' ) ?>

    </header> <!-- //.main-header -->

    
