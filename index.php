<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", TITULO);
$template->set("description", "");
$template->set("keywords", "");
$template->set("imagen", LOGO);
$template->themeInit();
//Clases
$productos = new Clases\Productos();
$productosArray = $productos->list("","",6);
$imagenes = new Clases\Imagenes();
$novedades = new Clases\Novedades();
$novedadesArray = $novedades->list("","",6);
?>

<!-- SLIDER SECTION START -->
<div class="slider-3 youtube-bg bg-opacity-black-10 hidden-sm hidden-xs">
    <div class="slider-content-3 text-center">
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            <h1 class="slider-1-title-2">ENCONTRÁ LA CASA DE TUS SUEÑOS</h1>
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
    <div class="featured-flat-area pt-115 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-2 text-center">
                        <h2>Comprar mi lote</h2>
                        <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                    </div>
                </div>
            </div>
            <div class="featured-flat">
                <div class="row">
                    <?php foreach ($productosArray as $key => $valor): ?>
                        <?php $medidas = explode("x",$valor['var2']); ?>
                        <?php $filter = array("cod = '$valor[cod]'"); ?>
                        <?php $imagenesArray = $imagenes->list($filter,"",""); ?>                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale"><?=$valor['var4']?></span>
                                    <a href="<?=URL?>/producto/<?=$valor['titulo']?>/<?=$valor['id']?>">
                                        <img src="<?=URL?>/<?=$imagenesArray[0]['ruta']?>" alt="">
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?=URL?>/producto/<?=$valor['titulo']?>/<?=$valor['id']?>">Más detalles</a>
                                    </div>
                                    <ul class="flat-desc">
                                        <li>
                                            <img src="<?=URL?>/assets/images/icons/4.png" alt="">
                                            <span><?=$valor['var1']?> m².</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-arrows-alt-h"></i>
                                            <span><?=$medidas[0]?> m.</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-arrows-alt-v"></i>
                                            <span><?=$medidas[1]?> m.</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flat-item-info">
                                    <div class="flat-title-price">
                                        <h5>
                                            <a href="<?=URL?>/producto/<?=$valor['titulo']?>/<?=$valor['id']?>"><?=$valor['titulo']?> </a>
                                        </h5>
                                        <span class="price">$<?=$valor['precio']?></span>
                                    </div>
                                    <p><img src="<?=URL?>/assets/images/icons/location.png" alt=""><?=$valor['var3']?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED FLAT AREA END -->

    <!-- FEATURES AREA START -->
    <div class="features-area fix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-md-offset-5">
                    <div class="features-info bg-gray">
                        <div class="section-title mb-30">
                            <h3>HERE IS</h3>
                            <h2 class="h1">AWESOME FEATUES</h2>
                        </div>
                        <div class="features-desc">
                            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Sheltek</span> is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do smod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi</p>
                        </div>
                        <div class="features-include">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Fully Furnished</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Royal Touch Paint</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Latest Interior Design</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Non Stop Security</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Living Inside a Nature</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4">
                                    <div class="features-include-list">
                                        <h6><img src="images/icons/7.png" alt="">Luxurious Fittings</h6>
                                        <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURES AREA END -->

    <!-- BLOG AREA START -->
    <div class="blog-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-2 text-center">
                        <h2>Últimas Novedades</h2>
                        <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-carousel">
                    <?php foreach ($novedadesArray as $key => $valor): ?>
                        <?php $fecha = explode('-',$valor['fecha']); ?>
                        <?php $filter = array("cod = '$valor[cod]'"); ?>
                        <?php $imagenesArray = $imagenes->list($filter,"",""); ?>  
                        <div class="col-md-12">
                            <article class="blog-item bg-gray">
                                <div class="blog-image">
                                    <a href="<?=URL?>/articulo/<?=$valor['titulo']?>/<?=$valor['cod']?>">
                                        <div class="contimg">
                                            <img src="<?=URL?>/<?=$imagenesArray[0]['ruta']?>" height="100%" alt="<?=$valor['titulo']?>" title="<?=$valor['titulo']?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <div class="post-title-time">
                                        <h5><a href="<?=URL?>/articulo/<?=$valor['titulo']?>/<?=$valor['cod']?>"><?=$valor['titulo']?></a></h5>
                                        <p><?=$fecha[2]?>/<?=$fecha[1]?>/<?=$fecha[0]?></p>
                                    </div>
                                    <?=substr($valor['desarrollo'],0,180)?>..
                                    <a class="read-more" href="<?=URL?>/articulo/<?=$valor['titulo']?>/<?=$valor['cod']?>">Leer más</a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->

</section>


<?php $template->themeEnd(); ?>