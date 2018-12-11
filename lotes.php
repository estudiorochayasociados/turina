<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title",TITULO . "Lotes | Turina Inmobiliaria");
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
//Clases
$productos = new Clases\Productos();
$productosArray = $productos->list("");
$imagenes = new Clases\Imagenes();
$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
if ($pagina > 0) {
  $pagina = $pagina - 1;
}

if (@count($filter) == 0) {
  $filter = '';
}

if (@count($_GET) == 0) {
  $anidador = "?";
} else {
  if ($pagina >= 0) {
    $anidador = "&";
  } else {
    $anidador = "?";
  }
}
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-70" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Lotes</h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li>Lotes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

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
            <?php $imagenesArray = $imagenes->list($filter); ?>                        
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <span class="for-sale"><?=$valor['var4']?></span>
                  <a href="<?=URL?>/producto/<?=$valor['titulo']?>/<?=$valor['id']?>">
                    <img src="<?=$imagenesArray[0]['ruta']?>" alt="">
                  </a>
                  <div class="flat-link">
                    <a href="<?=URL?>/producto/<?=$valor['titulo']?>/<?=$valor['id']?>">Más detalles</a>
                  </div>
                  <ul class="flat-desc">
                    <li>
                      <img src="images/icons/4.png" alt="">
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
                  <p><img src="images/icons/location.png" alt=""><?=$valor['var3']?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- FEATURED FLAT AREA END -->
  <!-- pagination-area -->
  <?php $numeroPaginas = $productos->paginador("",2); ?>

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

</section>


<?php $template->themeEnd(); ?>