<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title", "Lotes | " . TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description", "Buscá el lote de tus sueños rápido y sin complicaciones.");
$template->themeInit();
//Clases
$id = isset($_GET["id"]) ? $_GET["id"] : '';
$producto = new Clases\Productos();
$producto->set("cod", $id);
$productoData = $producto->view();
$categoria = new Clases\Categorias();
$categoria->set("cod", $productoData['categoria']);
$categoriaData = $categoria->view();
$imagenes = new Clases\Imagenes();
$filter = array("cod = '$id'");
$imagenesArray = $imagenes->list($filter, "id ASC", "");
$medidas = explode("x", $productoData['var2']);

$manzanas = $productoData['var5'];
?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bg-opacity-black-40"
     style="background: url('<?= URL ?>/assets/images/lotes.jpg'); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs">
                    <h2 class="breadcrumbs-title"><?= $productoData['titulo'] ?></h2>
                    <ul class="breadcrumbs-list">
                        <li><a href="<?= URL; ?>/index">Inicio</a></li>
                        <li><a href="<?= URL; ?>/lotes">Lotes</a></li>
                        <li><?= $productoData['titulo'] ?></li>
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
    <div class="properties-details-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-container">
                        <?php if ($categoriaData["titulo"] == "Embalse") { ?>
                            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Ss9ZQuQXFPfPecFrzGHLVLrYY00TDzpj&z=15" scrolling="no" width="100%" height="480"></iframe>
                        <?php }
                        if ($categoriaData["titulo"] == "Capilla del Monte") { ?>

                        <?php }
                        if ($categoriaData["titulo"] == "Los Reartes") { ?>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-md-8">
                    <div id="wrap">
                        <img class="wrapImg" src="<?= URL ?>/assets/images/<?= $productoData["cod_producto"] ?>.png" alt="image">
                    </div>
                    <div class="clearfix"></div>
                    <!-- pro-details-image -->
                    <div class="pro-details-image mt-20 mb-60">
                        <div class="pro-details-big-image">
                            <div class="tab-content">
                                <?php for ($i = 1; $i < (count($imagenesArray)); $i++) { ?>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($i == 0) {
                                        echo 'in active';
                                    } ?>" id="pro-<?= $i ?>">
                                        <a href="<?= URL ?>/<?= $imagenesArray[$i]['ruta'] ?>"
                                           data-lightbox="image-<?= $i ?>" data-title="Turina Inmobiliaria">
                                            <div style="height: 400px;background: url(<?= URL ?>/<?= $imagenesArray[$i]['ruta'] ?>)center/cover;">
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="pro-details-carousel">
                            <?php for ($i = 1; $i < (count($imagenesArray)); $i++) { ?>
                                <div class="pro-details-item">
                                    <a href="#pro-<?= $i ?>" data-toggle="tab">
                                        <div style="height: 100px;background: url(<?= URL ?>/<?= $imagenesArray[$i]['ruta'] ?>)center/cover;">
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- pro-details-description -->
                    <div class="pro-details-description mb-50">
                        <?= $productoData['desarrollo'] ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- widget-search-property -->
                    <aside class="widget widget-search-property">
                        <h5>Consultá disponibilidad</h5>
                        <div class="row">
                            <!-- leave-massage -->
                            <div class="col-md-12  col-sm-12 col-xs-12">
                                <div class="leave-review">
                                    <div id="alertaConsulta"></div>
                                    <form>
                                        <label>Manzana:
                                            <input class="form-control" type="text" name="manzana" id="manzana"
                                                   placeholder="Ej. D" required>
                                        </label>
                                        <label>Lote:
                                            <input class="form-control" type="number" name="lote" id="lote"
                                                   placeholder="Ej. 5" required>
                                        </label>
                                        <button type="button" name="consultar" onclick="Consultar();"
                                                class="submit-btn-1">CONSULTAR
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- widget-featured-property -->
                    <br><br>
                    <?php /*
                    <aside class="widget widget-featured-property">
                        <h5>Dimensiones</h5>
                        <div class="row">
                            <!-- flat-item -->
                            <div class="col-sm-12 col-xs-12">
                                <div class="pro-details-condition">
                                    <div class="pro-details-condition-inner bg-gray">
                                        <ul class="condition-list">
                                            <li><img src="<?= URL ?>/assets/images/icons/4.png"
                                                     alt="">Area: <?= $productoData['var1'] ?> m².
                                            </li>
                                            <br/>
                                            <li><i class="fas fa-arrows-alt-h"></i> Ancho: <?= $medidas[0] ?> m.</li>
                                            <li><i class="fas fa-arrows-alt-v"></i> Largo: <?= $medidas[1] ?> m.</li>
                                        </ul>
                                        <p><img src="<?= URL ?>/assets/images/icons/location.png" alt="">568 E 1st Ave,
                                            Ney Jersey, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    */ ?>
                </div>
            </div>
        </div>
    </div>
    <!-- PROPERTIES DETAILS AREA END -->
</section>
<!-- End page content -->

<?php $template->themeEnd(); ?>
<script>
    function Consultar() {
        var n1 = document.getElementById('manzana').value.toUpperCase().trim();
        var n2 = document.getElementById('lote').value.trim();

        if (n1.length == 0 || n2.length == 0) {
            var senal = '<div class="alert alert-warning" role="alert">¡Completa todos los campos!</div>';
        } else {
            var senal = '<div class="alert alert-success" role="alert">¡Lote disponible!</div>';

            var manzanas = "<?=$manzanas?>";
            var manzanasArray = manzanas.split(",");

            manzanasArray.forEach(function (element) {
                var lotes = element.split("-");
                var letraLote = lotes[0].trim();

                var cantLotes = lotes.length;
                for (i = 1; i < cantLotes; i++) {
                    var numeroLote = lotes[i];

                    if (n1 == letraLote && n2 == numeroLote) {
                        senal = '<div class="alert alert-danger" role="alert">Éste lote no se encuentra disponible.</div>';
                    }
                }
            });
        }
        document.getElementById("alertaConsulta").innerHTML = senal;
    }
</script>
<script>
    $('.map-container')
        .click(function () {
            $(this).find('iframe').addClass('clicked')
        })
        .mouseleave(function () {
            $(this).find('iframe').removeClass('clicked')
        });
</script>

<script>
    var viewer = new ViewBigimg()

    var wrap = document.getElementById('wrap')
    // console.log(viewer)
    wrap.onclick = function (e) {
        if (e.target.nodeName === 'IMG') {
            // viewer.show(e.target.src.replace('.jpg', '-big.jpg'))
            viewer.show(e.target.src)
        }
    }
</script>