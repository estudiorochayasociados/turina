<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$id = isset($_GET["id"]) ? $_GET["id"] : '';
$template->set("title", ucwords($id) . " | " . TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description", "Sueños de las Sierras es una de las unidades de negocios de Soluciones, una sociedad entre profesionales del arte jurídico y legal, creada en el 2013.");
$template->themeInit();
$contenido = new Clases\Contenidos();
$contenido1 = new Clases\Contenidos();
$contenido2 = new Clases\Contenidos();
$contenido3 = new Clases\Contenidos();
$contenido4 = new Clases\Contenidos();
$contenido5 = new Clases\Contenidos();
$contenido->set("cod", $id);
$contenidoData = $contenido->view();
$contenido1->set("id", 2);
$contenidoData1 = $contenido1->view();
$contenido2->set("id", 3);
$contenidoData2 = $contenido2->view();
$contenido3->set("id", 4);
$contenidoData3 = $contenido3->view();
$contenido4->set("id", 5);
$contenidoData4 = $contenido4->view();
$contenido5->set("id", 6);
$contenidoData5 = $contenido5->view();
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL ?>/assets/images/nosotros.jpg'); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs">
                    <h2 class="breadcrumbs-title"><?= $id; ?></h2>
                    <ul class="breadcrumbs-list">
                        <li><a href="<?= URL; ?>/index">Inicio</a></li>
                        <li><?= $id; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

    <!-- ABOUT SHELTEK AREA START -->
    <div class="about-sheltek-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="about-sheltek-info">
                        <?= $contenidoData['contenido']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT SHELTEK AREA END -->

    <?php if ($id == 'nosotros') { ?>
        <!-- Tabs -->
        <section id="tabs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 ">
                        <!-- INICIO LG MD BOTONES -->
                        <div class="hidden-sm hidden-xs">
                            <nav class="text-center">
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link" id="nav1" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <div class="tabStyle col-lg-2 col-md-2">
                                            <img src="../assets/images/icons/ic1.png" style="width: 70px;" alt="icono"><br>
                                            <div class="tabSeparador"></div>
                                            <span class="span1">RELEVAMIENTO</span><br>
                                            <span class="span2">EXPEDITIVO EN CAMPO</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <div class="tabStyle col-lg-2 col-md-2">
                                            <img src="../assets/images/icons/ic2.png" style="width: 70px;" alt="icono"><br>
                                            <div class="tabSeparador"></div>
                                            <span class="span1">ANÁLISIS</span><br>
                                            <span class="span2">DEL ÁREA RURAL</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                        <div class="tabStyle col-lg-4 col-md-3">
                                            <img src="../assets/images/icons/ic3.png" style="width: 70px;" alt="icono"><br>
                                            <div class="tabSeparador"></div>
                                            <span class="span1">RELEVAMIENTO Y RECOPILACIÓN</span><br>
                                            <span class="span2">DE INSUMOS PRELIMINARES</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link" id="nav4" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">
                                        <div class="tabStyle col-lg-2 col-md-3">
                                            <img src="../assets/images/icons/ic4.png" style="width: 70px;" alt="icono"><br>
                                            <div class="tabSeparador"></div>
                                            <span class="span1">LEVANTAMIENTO</span><br>
                                            <span class="span2">DE CAMPO</span>
                                        </div>
                                    </a>
                                    <a class="nav-item nav-link" id="nav5" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">
                                        <div class="tabStyle col-lg-2 col-md-2">
                                            <img src="../assets/images/icons/ic5.png" style="width: 70px;" alt="icono"><br>
                                            <span class="span1">EVALUACIÓN</span><br>
                                            <span class="span2">TÉCNICO-JURÍDICA</span>
                                        </div>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent"><br>
                                <div class="text-center tab-pane fade active in" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="p-n"><?= $contenidoData1["contenido"] ?></div>
                                </div>
                                <div class="text-center tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="p-n"><?= $contenidoData2["contenido"] ?></div>
                                </div>
                                <div class="text-center tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="p-n"><?= $contenidoData3["contenido"] ?></div>
                                </div>
                                <div class="text-center tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <div class="p-n"><?= $contenidoData4["contenido"] ?></div>
                                </div>
                                <div class="text-center tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <div class="p-n"><?= $contenidoData5["contenido"] ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN LG MD BOTONES -->

                        <!-- INICIO ACORDEON SM XS -->
                        <div class="hidden-lg hidden-md ">
                            <a class="btn btn-n" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                                <div class="ctn-n col-sm-12"><img alt="icono" src="../assets/images/icons/ic2.png" style="width: 70px;"><br class="visible-xs"> <span>RELEVAMIENTO EXPEDITIVO EN CAMPO</span>
                                </div>
                            </a>
                            <div class="collapse" id="collapse1">
                                <div class="card card-body pt-10 pb-10">
                                    <div class="p-n"><?= $contenidoData1["contenido"] ?></div>
                                </div>
                            </div>
                            <a class="btn btn-n" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                                <div class="ctn-n col-sm-12"><img alt="icono" src="../assets/images/icons/ic2.png" style="width: 70px;"><br class="visible-xs"> <span>ANÁLISIS DEL ÁREA RURAL</span>
                                </div>
                            </a>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body pt-10 pb-10">
                                    <div class="p-n"><?= $contenidoData2["contenido"] ?></div>
                                </div>
                            </div>
                            <a class="btn btn-n" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                                <div class="ctn-n col-sm-12"><img alt="icono" src="../assets/images/icons/ic3.png" style="width: 70px;"><br class="visible-xs"> <span>RELEVAMIENTO Y RECOPILACIÓN DE INSUMOS PRELIMINARES</span>
                                </div>
                            </a>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body pt-10 pb-10">
                                    <div class="p-n"><?= $contenidoData3["contenido"] ?></div>
                                </div>
                            </div>
                            <a class="btn btn-n" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                                <div class="ctn-n col-sm-12"><img alt="icono" src="../assets/images/icons/ic4.png" style="width: 70px;"><br class="visible-xs"> <span>LEVANTAMIENTO DE CAMPO</span>
                                </div>
                            </a>
                            <div class="collapse" id="collapse4">
                                <div class="card card-body pt-10 pb-10">
                                    <div class="p-n"><?= $contenidoData4["contenido"] ?></div>
                                </div>
                            </div>
                            <a class="btn btn-n" data-toggle="collapse" href="#collapse5" role="button" aria-expanded="false" aria-controls="collapse5">
                                <div class="ctn-n col-sm-12"><img alt="icono" src="../assets/images/icons/ic5.png" style="width: 70px;"><br class="visible-xs"> <span>EVALUACIÓN TÉCNICO-JURÍDICA</span>
                                </div>
                            </a>
                            <div class="collapse" id="collapse5">
                                <div class="card card-body pt-10 pb-10">
                                    <div class="p-n"><?= $contenidoData5["contenido"] ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN ACORDEON SM XS -->

                    </div>
                </div>
            </div>
        </section>
        <!-- ./Tabs -->
    <?php } ?>
</section>


<?php $template->themeEnd(); ?>

<script>
    $('#nav1').addClass('active');
    $('#nav1').click(function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
    $('#nav2').click(function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
    $('#nav3').click(function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
    $('#nav4').click(function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
    $('#nav5').click(function () {
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });
</script>
