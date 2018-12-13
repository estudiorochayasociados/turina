<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title","404 | Página no encontrada");
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-70" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">404 Página no encontrada</h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

    <!-- ERROR AREA START -->
    <div class="error-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-content ">
                        <h2>404</h2>
                        <h3>Página no encontrada!</h3>
                        <h4>Oops! Algo está mal</h4>
                        <p>No podemos encontrar la página solicitada, asegurese que la url esté escrita correctamente o vuelva a intentar en unos minutos.</p>
                        <a class="go-home" href="<?=URL?>/index">Ir al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ERROR AREA END -->
</section>
<!-- End page content -->


<?php $template->themeEnd(); ?>