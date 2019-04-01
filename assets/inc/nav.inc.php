<?php
$funcionNav = new Clases\PublicFunction();
$index = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "index"));
$nosotros = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "nosotros"));
$lote = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "lote"));
$video = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "video"));
$blog = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "blog"));
$contacto = $funcionNav->antihack_mysqli(strpos($_SERVER['REQUEST_URI'], "contacto"));
if (empty($index) && empty($nosotros) && empty($lote) && empty($video) && empty($blog) && empty($contacto)) {
    $vacio = "ok";
} else {
    $vacio = "";
}
if (!empty($index) || $vacio == 'ok') {
    $indexActive = "class='activeNav'";
} else {
    $indexActive = "";
}
if (!empty($nosotros)) {
    $nosotrosActive = "class='activeNav'";
} else {
    $nosotrosActive = "";
}
if (!empty($lote)) {
    $loteActive = "class='activeNav'";
} else {
    $loteActive = "";
}
if (!empty($video)) {
    $videoActive = "class='activeNav'";
} else {
    $videoActive = "";
}
if (!empty($blog)) {
    $blogActive = "class='activeNav'";
} else {
    $blogActive = "";
}
if (!empty($contacto)) {
    $contactoActive = "class='activeNav'";
} else {
    $contactoActive = "";
}
?>

<!-- HEADER AREA START -->
<header class="header-area header-wrapper">
    <div class="header-top-bar bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="logo">
                        <a href="<?= URL; ?>/index">
                            <img src="<?= URL; ?>/assets/images/logo/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 hidden-sm hidden-xs">
                    <div class="blDer">
                        <div class="col-md-5">
                            <div class="header-icon">
                                <img src="<?= URL; ?>/assets/images/icons/phone.png" alt="">
                            </div>
                            <div class="header-info">
                                <h6><?= TELEFONO; ?></h6>
                                <p>Atención de 09:00 a 20:00</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header-icon">
                                <img src="<?= URL; ?>/assets/images/icons/mail-open.png" alt="">
                            </div>
                            <div class="header-info">
                                <h6><a href="mailto:<?= EMAIL; ?>"><?= EMAIL; ?></a></h6>
                                <p>Envianos un correo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="header-middle-area  transparent-header hidden-xs">
        <div class="container">
            <div class="full-width-mega-drop-menu">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sticky-logo">
                            <a href="<?= URL; ?>/index">
                                <img src="<?= URL; ?>/assets/images/logo/logo.png" alt="">
                            </a>
                        </div>
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li><a <?= $indexActive ?> href="<?= URL; ?>/index">Inicio</a></li>
                                <li><a <?= $nosotrosActive ?> href="<?= URL; ?>/c/nosotros">Nosotros</a></li>
                                <li><a <?= $loteActive ?> href="<?= URL; ?>/lotes">Comprar mi Lote</a></li>
                                <!--<li><a <?= $videoActive ?> href="<?= URL; ?>/videos">Videos</a></li>-->
                                <li><a <?= $blogActive ?> href="<?= URL; ?>/blog">Blog</a></li>
                                <li><a <?= $contactoActive ?> href="<?= URL; ?>/contacto">Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER AREA END -->
<!-- MOBILE MENU AREA START -->
<div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="<?= URL; ?>/index">Inicio</a></li>
                            <li><a href="<?= URL; ?>/c/nosotros">Nosotros</a></li>
                            <li><a href="<?= URL; ?>/lotes">Comprar mi Lote</a></li>
                            <?php /*<li><a href="<?=URL;?>/videos">Videos</a></li>*/ ?>
                            <li><a href="<?= URL; ?>/blog">Blog</a></li>
                            <li><a href="<?= URL; ?>/contacto">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU AREA END -->