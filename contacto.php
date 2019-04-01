<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title", "Contacto | " . TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description", "Consultá tu lote rápido y simple a través de nuestro formulario web, o llamános directamente.");
$template->themeInit();
$enviar = new Clases\Email();
$funcion = new Clases\PublicFunction();

?>

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL ?>/assets/images/contacto.jpg'); background-size: cover;">
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
        <div class="contact-area pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-xs-12">
                        <!-- get-in-toch -->
                        <div class="get-in-toch">
                            <div class="section-title mb-30">
                                <h3>INFORMACIÓN DE CONTACTO</h3>
                            </div>
                            <div class="contact-desc mb-50">
                                <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">En Turina</span> estamos siempre conectados para que, obtener la casa de tus sueños, sea un proceso de placer.
                                    Podés comunicarte cuando quieras por whatsapp, llamarnos por teléfono, visitar nuestras sucursales o bien completar este formulario para que nosotros nos contactemos con vos.
                                    ¡Estas muy cerca de cumplir tus Sueños de las Sierras!
                                </p>
                            </div>
                            <ul class="contact-address">
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="<?= URL ?>/assets/images/icons/location-2.png" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span><?= DIRECCION ?> </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="<?= URL ?>/assets/images/icons/phone-3.png" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span><?= TELEFONO ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="<?= URL ?>/assets/images/icons/world.png" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span><?= EMAIL ?></span>
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
                                <?php if (isset($_POST["enviar"])) {
                                    $nombre = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                                    $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                                    $telefono = $funcion->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
                                    $consulta = $funcion->antihack_mysqli(isset($_POST["consulta"]) ? $_POST["consulta"] : '');

                                    $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
                                    $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
                                    $mensajeFinal .= "<b>Teléfono</b>: " . $telefono . " <br/>";
                                    $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

                                    //USUARIO
                                    $enviar->set("asunto", "Realizaste tu consulta");
                                    $enviar->set("receptor", $email);
                                    $enviar->set("emisor", EMAIL);
                                    $enviar->set("mensaje", $mensajeFinal);
                                    if ($enviar->emailEnviar() == 1) {
                                        echo '<div class="alert alert-success" role="alert">¡Consulta enviada correctamente!</div>';
                                    }

                                    //ADMIN
                                    $enviar->set("asunto", "Consulta Web");
                                    $enviar->set("receptor", EMAIL);
                                    if ($enviar->emailEnviar() == 0) {
                                        echo '<div class="alert alert-danger" role="alert">¡No se ha podido enviar la consulta!</div>';
                                    }
                                } ?>
                                <form method="post">
                                    <input type="text" name="nombre" placeholder="Nombre completo">
                                    <input type="email" name="email" placeholder="Email">
                                    <input type="text" name="telefono" placeholder="Telefono">
                                    <textarea name="consulta" placeholder="Tu consulta..."></textarea>
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
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1NIlolIFUyGj-BXO15V3VCi3NnZSkbxAb" width="100%" height="480"></iframe>
        </div>
        <!-- GOOGLE MAP AREA END -->
    </section>
    <!-- End page content -->
    <script src="<?= URL ?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeeHDCOXmUMja1CFg96RbtyKgx381yoBU"></script>
    <script src="<?= URL ?>/assets/js/google-map.js"></script>
<?php $template->themeEnd(); ?>