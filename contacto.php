<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title","Contacto | ".TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description","");
$template->themeInit();
$correo  = new Clases\Email();
$funcion = new Clases\PublicFunction();

?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL?>/assets/images/bg/5.jpg'); background-size: cover; background-attachment:fixed";>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Contacto</h2>
          <ul class="breadcrumbs-list">
            <li><a href="<?= URL; ?>/index">Inicio</a></li>
            <li>Contacto</li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

    <!-- CONTACT AREA START -->
    <div class="contact-area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <!-- get-in-toch -->
                    <div class="get-in-toch">
                        <div class="section-title mb-30">
                            <h3>INFORMACIÓN DE CONTACTO</h3>
                        </div>
                        <div class="contact-desc mb-50">
                            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Turina</span> is the best theme for  elit, sed do eiusmod tempor dolor sit ame   tse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi ut aliquip</p>
                        </div>
                        <ul class="contact-address">
                            <li>
                                <div class="contact-address-icon">
                                    <img src="<?=URL?>/assets/images/icons/location-2.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span><?=DIRECCION?> </span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-address-icon">
                                    <img src="<?=URL?>/assets/images/icons/phone-3.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span><?=TELEFONO?></span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-address-icon">
                                    <img src="<?=URL?>/assets/images/icons/world.png" alt="">
                                </div>
                                <div class="contact-address-info">
                                    <span>Email : <?=EMAIL?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="contact-messge contact-bg">
                        <!-- blog-details-reply -->
                        <div class="leave-review">
                            <h5>Envianos un mensaje</h5>
                            <?php if (isset($_POST["enviar"])): ?>
                                <?php
                                $nombre   = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                                $email    = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                                $consulta = $funcion->antihack_mysqli(isset($_POST["consulta"]) ? $_POST["consulta"] : '');

                                $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
                                $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
                                $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

                                $correo->set("asunto", "Consulta web");
                                $correo->set("receptor", $email);
                                $correo->set("emisor", EMAIL);
                                $correo->set("mensaje", $mensajeFinal);

                                $correo->emailEnviar();
                                ?>
                            <?php endif?>
                            <form  id="contact-form" method="post">
                                <input type="text" name="nombre" placeholder="Nombre completo">
                                <input type="email" name="email" placeholder="Email">
                                <textarea name="mensaje" placeholder="Tu mensaje..."></textarea>
                                <button type="submit" name="enviar" class="submit-btn-1">ENVIAR</button>
                            </form>
                            <p class="form-messege mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div class="google-map-area">
        <div id="googleMap"></div>
    </div>
    <!-- GOOGLE MAP AREA END -->
</section>
<!-- End page content -->
<script src="<?=URL?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeeHDCOXmUMja1CFg96RbtyKgx381yoBU"></script>
<script src="<?=URL?>/assets/js/google-map.js"></script>
<?php $template->themeEnd();?>