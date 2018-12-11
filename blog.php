<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title",TITULO . "Blog | Turina Inmobiliaria");
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
//Clases
$novedades = new Clases\Novedades();
$novedadesArray = $novedades->list("");
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-70" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Blog</h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li>Blog</li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper">

    <!-- BLOG AREA START -->
    <div class="blog-area pt-115 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row flex_wrap">
                        <?php foreach ($novedadesArray as $key => $valor): ?>
                            <?php $fecha = explode('-',$valor['fecha']); ?>
                            <?php $filter = array("cod = '$valor[cod]'"); ?>
                            <?php $imagenesArray = $imagenes->list($filter); ?>
                            <!-- blog-item -->
                            <div class="col-sm-6 col-xs-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="<?=URL?>/novedad/<?=$valor['titulo']?>/<?=$valor['cod']?>">
                                            <div class="contimg2">
                                                <img src="<?=$imagenesArray[0]['ruta']?>" height="100%" alt="<?=$valor['titulo']?>" titulo="<?=$valor['titulo']?>">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="<?=URL?>/novedad/<?=$valor['titulo']?>/<?=$valor['cod']?>"><?=$valor['titulo']?></a></h5>
                                            <p><?=$fecha[2]?>/<?=$fecha[1]?>/<?=$fecha[0]?></p>
                                        </div>
                                        <?=substr($valor['desarrollo'],0,180)?>..
                                        <a class="read-more" href="<?=URL?>/novedad/<?=$valor['titulo']?>/<?=$valor['cod']?>">Leer más</a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                        <!-- pagination-area -->
                        <div class="col-xs-12">
                            <div class="pagination-area mb-60">
                                <ul class="pagination-list text-center">
                                    <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- widget-categories -->
                    <aside class="widget widget-categories mb-50">
                        <h5>Categorías</h5>
                        <ul class="widget-categories-list">
                            <?php $filter = array("area = 'novedades'"); ?>
                            <?php $categoriasArray = $categorias->list($filter); ?>
                            <?php foreach ($categoriasArray as $key => $valor): ?>
                                <li>
                                    <a href="<?=URL?>/novedad?categoria=<?=$valor['titulo']?>"><?=$valor['titulo']?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                    <!-- widget-recent-post -->
                    <aside class="widget widget-recent-post mb-50">
                        <h5>Recientes</h5>
                        <div class="row">
                            <?php foreach ($novedadesArray as $key => $valor): ?>
                                <?php $fecha = explode('-',$valor['fecha']); ?>
                                <?php $filter = array("cod = '$valor[cod]'"); ?>
                                <?php $imagenesArray = $imagenes->list($filter); ?>
                                <!-- blog-item -->
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <article class="recent-post-item">
                                        <div class="recent-post-image">
                                            <a href="<?=URL?>/novedad/<?=$valor['titulo']?>/<?=$valor['cod']?>">
                                                <div class="contimg3">
                                                    <img src="<?=$imagenesArray[0]['ruta']?>" height="100%" alt="<?=$valor['titulo']?>" titulo="<?=$valor['titulo']?>">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="recent-post-info">
                                            <div class="recent-post-title-time">
                                                <h5>
                                                    <a href="<?=URL?>/novedad/<?=$valor['titulo']?>/<?=$valor['cod']?>"><?=$valor['titulo']?></a>
                                                </h5>
                                                <p><?=$fecha[2]?>/<?=$fecha[1]?>/<?=$fecha[0]?></p>
                                            </div>
                                            <?=substr($valor['desarrollo'],0,50)?>..
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->
</div>
<!-- End page content -->


<?php $template->themeEnd(); ?>