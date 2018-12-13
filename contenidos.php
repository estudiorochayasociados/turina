<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$template->set("title",ucwords($id)." | ".TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
$contenido     = new Clases\Contenidos();
$contenido->set("cod", $id);
$contenidoData = $contenido->view();
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-70" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
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
  <div class="about-sheltek-area ptb-115">
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

</section>


<?php $template->themeEnd(); ?>