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
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$producto = new Clases\Productos();
$producto->set("cod",$id);
$productoData = $producto->view();
$imagenes = new Clases\Imagenes();
$filter = array("cod = '$id'");
$imagenesArray = $imagenes->list($filter,"","");
$medidas = explode("x",$productoData['var2']);
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title"><?=$productoData['titulo']?></h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li><a href="<?= URL; ?>/lotes">Lotes</a></li>
            <li><?=$productoData['titulo']?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- PROPERTIES DETAILS AREA START -->
  <div class="properties-details-area pt-115 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- pro-details-image -->
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
          <!-- pro-details-description -->
          <div class="pro-details-description mb-50">
            <?=$productoData['desarrollo']?>
          </div>
        </div>
        <div class="col-md-4">
          <!-- widget-search-property -->
          <aside class="widget widget-search-property">
            <h5>Comprá tu lote</h5>
            <div class="row">
              <!-- leave-massage -->
              <div class="col-md-12  col-sm-12 col-xs-12">
                <div class="leave-review">
                  <?php if (isset($_POST["enviar"])): ?>
                    <?php
                    $nombre   = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                    $email    = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                    $consulta = $funcion->antihack_mysqli(isset($_POST["consulta"]) ? $_POST["consulta"] : '');
                    $lote   = $funcion->antihack_mysqli(isset($_POST["lote"]) ? $_POST["lote"] : '');

                    $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
                    $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
                    $mensajeFinal .= "<b>Lote</b>: " . $lote . "<br/>";
                    $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

                    $correo->set("asunto", "Consulta por lote");
                    $correo->set("receptor", $email);
                    $correo->set("emisor", EMAIL);
                    $correo->set("mensaje", $mensajeFinal);

                    $correo->emailEnviar();
                    ?>
                  <?php endif?>
                  <form action="post">
                    <input type="text" name="nombre" placeholder="Nombre completo">
                    <input type="email" name="email" placeholder="Email">
                    <input hidden type="text" name="lote" value="<?=$productoData['titulo']?>">
                    <textarea name="consulta" placeholder="Consulta sobre el lote"></textarea>
                    <button type="button" class="submit-btn-1">ENVIAR</button>
                  </form>
                </div>
              </div>
            </div>
          </aside>
          <!-- widget-featured-property -->
          <br><br><aside class="widget widget-featured-property">
            <h5>Dimensiones</h5>
            <div class="row">
              <!-- flat-item -->
              <div class="col-sm-12 col-xs-12">
                <div class="pro-details-condition">
                  <div class="pro-details-condition-inner bg-gray">
                    <ul class="condition-list">
                      <li><img src="<?=URL?>/assets/images/icons/4.png" alt="">Area: <?=$productoData['var1']?> m².</li><br/>
                      <li><i class="fas fa-arrows-alt-h"></i> Ancho: <?=$medidas[0]?> m.</li>
                      <li><i class="fas fa-arrows-alt-v"></i> Largo: <?=$medidas[1]?> m.</li>
                    </ul>
                    <p><img src="<?=URL?>/assets/images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey, USA</p>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- PROPERTIES DETAILS AREA END -->
</section>
<!-- End page content -->

<?php $template->themeEnd(); ?>