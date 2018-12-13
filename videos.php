<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title","Videos | ".TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
$videos     = new Clases\Videos();

$imagenes = new Clases\Imagenes();
$productos = new Clases\Productos();

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 6;

if ($pagina > 0) {
  $pagina = $pagina - 1;
}

$anidador = "?";

$videosArray = $videos->list("","",$cantidad*$pagina.','.$cantidad);
$numeroPaginas = $videos->paginador("",$cantidad);
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Videos</h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li>Videos</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- ELEMENTS AREA START -->
  <div class="elements-area ptb-115">
    <div class="container">
      <div class="row">
        <?php foreach ($videosArray as $key => $valor): ?>
        <div class="col-md-6">
          <div class="mb-20 properties-video">
            <h5 class="mb-20"><?=$valor['titulo']?></h5>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="https://www.youtube.com/embed/<?=$valor['link']?>?rel=0&amp;showinfo=0"  allowfullscreen></iframe>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
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
  <!-- ELEMENTS AREA END -->

</section>


<?php $template->themeEnd(); ?>