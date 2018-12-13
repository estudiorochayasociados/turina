<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title","Blog | ".TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
//Clases
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$novedad = new Clases\Novedades();
$novedad->set("cod",$id);
$novedadData = $novedad->view();
$novedadesArray = $novedad->list("","","");
$imagenes = new Clases\Imagenes();
$filter = array("cod = '$id'");
$imagenesArray = $imagenes->list($filter,"","");
$fecha = explode('-',$novedadData['fecha']);
$categorias = new Clases\Categorias();
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title"><?=$novedadData['titulo']?></h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li><a href="<?= URL; ?>/blog">Blog</a></li>
            <li><?=$novedadData['titulo']?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- BLOG DETAILS AREA START -->
  <div class="properties-details-area pt-115 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- blog-details-image -->
          <div class="pro-details-image mb-60">
            <div class="pro-details-big-image">
              <div class="tab-content">
                <?php for($i = 0; $i < (count($imagenesArray)); $i++): ?>
                  <div role="tabpanel" class="tab-pane fade <?php if($i==0){echo 'in active';}?>" id="pro-<?=$i?>">
                    <a href="<?=URL?>/<?=$imagenesArray[$i]['ruta']?>" data-lightbox="image-<?=$i?>" data-title="Turina Inmobiliaria">
                      <img src="<?=URL?>/<?=$imagenesArray[$i]['ruta']?>" alt="">
                    </a>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
            <div class="pro-details-carousel">
              <?php for($i = 0; $i < (count($imagenesArray)); $i++): ?>
                <div class="pro-details-item">
                  <a href="#pro-<?=$i?>" data-toggle="tab"><img src="<?=URL?>/<?=$imagenesArray[$i]['ruta']?>" alt=""></a>
                </div>
              <?php endfor; ?>
            </div>                           
          </div>
          <!-- blog-details-title-time -->
          <div class="blog-details-title-time">
            <h5><?=$novedadData['titulo']?></h5>
            <p><?=$fecha[2]?>-<?=$fecha[1]?>-<?=$fecha[0]?></p>
          </div>
          <!-- blog-details-description -->
          <div class="pro-details-description mb-50">
            <?=$novedadData['desarrollo']?>
          </div>
        </div>
        <div class="col-md-4">
          <!-- widget-search-blog -->
          <!-- widget-categories -->
          <aside class="widget widget-categories mb-50">
            <h5>Categorías</h5>
            <ul class="widget-categories-list">
              <?php $filter = array("area = 'novedades'"); ?>
              <?php $categoriasArray = $categorias->list($filter,"",""); ?>
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
                <?php $imagenesArray = $imagenes->list($filter,"",""); ?>
                <!-- blog-item -->
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <article class="recent-post-item">
                    <div class="recent-post-image">
                      <a href="<?=URL?>/articulo/<?=$valor['titulo']?>/<?=$valor['cod']?>">
                        <div class="contimg3">
                          <img src="<?=URL?>/<?=$imagenesArray[0]['ruta']?>" height="100%" alt="<?=$valor['titulo']?>" titulo="<?=$valor['titulo']?>">
                        </div>
                      </a>
                    </div>
                    <div class="recent-post-info">
                      <div class="recent-post-title-time">
                        <h5>
                          <a href="<?=URL?>/articulo/<?=$valor['titulo']?>/<?=$valor['cod']?>"><?=$valor['titulo']?></a>
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
  <!-- BLOG DETAILS AREA END -->
</section>
<!-- End page content -->

<?php $template->themeEnd(); ?>