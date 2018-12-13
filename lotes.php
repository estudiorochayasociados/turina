<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title","Lotes | ".TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
//Clases
$imagenes = new Clases\Imagenes();
$productos = new Clases\Productos();

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 6;

if ($pagina > 0) {
  $pagina = $pagina - 1;
}

$anidador = "?";


$productosArray = $productos->list("","",$cantidad*$pagina.','.$cantidad);
$numeroPaginas = $productos->paginador("",$cantidad);
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
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
            <?php $imagenesArray = $imagenes->list($filter,"",""); ?>                        
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <span class="for-sale"><?=$valor['var4']?></span>
                  <a href="<?=URL?>/lote/<?=$valor['titulo']?>/<?=$valor['cod']?>">
                    <img src="<?=$imagenesArray[0]['ruta']?>" alt="">
                  </a>
                  <div class="flat-link">
                    <a href="<?=URL?>/lote/<?=$valor['titulo']?>/<?=$valor['cod']?>">Más detalles</a>
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
                      <a href="<?=URL?>/lote/<?=$valor['titulo']?>/<?=$valor['cod']?>"><?=$valor['titulo']?> </a>
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

    <!-- pagination-area -->
    <?php if($numeroPaginas > 1): ?>
      <div class="col-xs-12">
        <div class="pagination-area mb-60">
          <ul class="pagination-list text-center">
            <?php if(($pagina+1) > 1): ?>
              <li>
                <a href="<?=$anidador?>pagina=<?=$pagina?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
              </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $numeroPaginas; $i++): ?>
              <li><a href="<?=$anidador?>pagina=<?=$i?>"><?=$i?></a></li>
            <?php endfor; ?>

            <?php if(($pagina+2) <= $numeroPaginas): ?>
              <li>
                <a href="<?=$anidador?>pagina=<?=($pagina+2)?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

  </div>
  <!-- FEATURED FLAT AREA END -->

</section>


<?php $template->themeEnd(); ?>