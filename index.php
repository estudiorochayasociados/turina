<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", TITULO);
$template->set("description", "Sueños de las Sierras es una de las unidades de negocios de Soluciones, una sociedad entre profesionales del arte jurídico y legal, creada en el 2013.");
$template->set("keywords", "");
$template->set("imagen", LOGO);
$template->themeInit();
//Clases
$productos = new Clases\Productos();
$productosArray = $productos->list("", "", 6);
$imagenes = new Clases\Imagenes();
$novedades = new Clases\Novedades();
$novedadesArray = $novedades->list("", "", 6);
?>

    <!-- SLIDER SECTION START -->
    <div class="slider-3 youtube-bg bg-opacity-black-10 hidden-sm hidden-xs">
        <div class="slider-content-3 text-center">
            <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                <h1 class="slider-1-title-2">ENCONTRÁ EL LUGAR DE TUS SUEÑOS</h1>
            </div>
            <!--<div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                <a class="slider-button mt-40" href="#">Read More</a>
            </div>-->
        </div>
    </div>
    <!-- SLIDER SECTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">
        <!-- FEATURED FLAT AREA START -->
        <div class="featured-flat-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2>Comprar mi lote</h2>
                            <p>Algunas personas compran terrenos, otras invierten su capital. Para algunas familias es un espacio de recreo, de reencuentro… para nosotros es un sueño hecho realidad.</p>
                        </div>
                    </div>
                </div>
                <div class="featured-flat">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Capilla del Monte</span>
                                    <a href="<?= URL ?>/lotes/capilla-del-monte">
                                        <div style="background: url('<?= URL ?>/assets/images/capilla-del-monte.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/capilla-del-monte">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Embalse</span>
                                    <a href="<?= URL ?>/lotes/embalse">
                                        <div style="background: url('<?= URL ?>/assets/images/embalse.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/embalse">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Los Reartes</span>
                                    <a href="<?= URL ?>/lotes/los-reartes">
                                        <div style="background: url('<?= URL ?>/assets/images/los-reartes.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/los-reartes">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED FLAT AREA END -->

        <!-- FEATURES AREA START -->
        <div class="features-area fix">
            <div class="container-fluid">
                <div class="row">
                    <div style="height: 380px;background: url('<?= URL ?>/assets/images/banner.jpg')no-repeat center/cover fixed;"></div>
                </div>
            </div>
        </div>
        <!-- FEATURES AREA END -->

        <div class="clearfix"><br><br></div>

        <!-- BLOG AREA START -->
        <div class="blog-area pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2>Últimas Novedades</h2>
                            <p>Conocé todo lo que necesitás saber para obtener tu lote. Novedades sobre inmuebles, créditos, métodos nuevos de construcción y cómo elegir el terreno perfecto en nuestro blog.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog-carousel">
                        <?php foreach ($novedadesArray as $key => $valor) {
                            $fecha = explode('-', $valor['fecha']);
                            $filter = array("cod = '$valor[cod]'");
                            $imagenesArray = $imagenes->list($filter, "", "");
                            ?>
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>">
                                            <div class="contimg">
                                                <div style="background: url('<?= URL ?>/<?= $imagenesArray[0]['ruta'] ?>')center/cover; height: 200px;"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5>
                                                <a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>"><?= $valor['titulo'] ?></a>
                                            </h5>
                                            <p><?= $fecha[2] ?>/<?= $fecha[1] ?>/<?= $fecha[0] ?></p>
                                        </div>
                                        <?= substr($valor['desarrollo'], 0, 180) ?>..
                                        <a class="read-more"
                                           href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>">Leer
                                            más</a>
                                    </div>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

    </section>


<?php $template->themeEnd(); ?>