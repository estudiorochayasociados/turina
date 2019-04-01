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
$imagenes = new Clases\Imagenes();
$productos = new Clases\Productos();
$categoria = new Clases\Categorias();
$funcion = new Clases\PublicFunction();

$id = isset($_GET["id"]) ? $_GET["id"] : '';
$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 6;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

$anidador = "?";

if ($id != '') {
    $id = str_replace("-", " ", $id);
    $filterCategoria = array("titulo = '$id'", "area = 'productos'");
    $categoriaArray = $categoria->list($filterCategoria, "", "");
    if (empty($categoriaArray)) {
        $filterProducto = '';
    } else {
        $filterProducto = array("categoria = '" . $categoriaArray[0]['cod'] . "'");
    }
    if($id == "embalse"){
        $textoLugar = "Embalse, quizá el lugar más completo del Valle de Calamuchita. Con sus montañas, playa y lago, actividades de deporte extremo como buceo, kitesurfing, wakeboard y más, es uno de los lugares más turísticos de las sierras cordobesas, recibiendo una vasta cantidad de turistas anualmente.";
    }
    if($id == "capilla del monte"){
        $textoLugar = "La mística y el encanto se unieron para darle nacimiento a uno de los lugares más exóticos de la sierra cordobesa: Capilla del Monte, con el Cerro Uritorco como centinela protector, es un excelente lugar para disfrutar de las montañas, el trecking y la vida conectada a la naturaleza.";
    }
    if($id == "los reartes"){
        $textoLugar = "Un paisaje de encanto, un pueblo pintoresco que no pierde la tradición criolla y sus largos espacios para disfrutar la naturaleza, vuelven a Los Reartes uno de los lugares más hermosos de Córdoba. Sus ríos, árboles y montañas son una fotografía única y una caricia de la naturaleza. La cercanía con Villa General Belgrano vuelve a este lugar una excelente inversión.";
    }

    $displayZonas = 'style="display: none;"';
    $displayLotes = '';
} else {
    $displayZonas = '';
    $displayLotes = 'style="display: none;"';
    $filterProducto = '';
    $textoLugar = "Algunas personas compran terrenos, otras invierten su capital. Para algunas familias es un espacio de recreo, de reencuentro… para nosotros es un sueño hecho realidad.";
}

$productosArray = $productos->list($filterProducto, "", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $productos->paginador($filterProducto, $cantidad);
?>

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bg-opacity-black-40"
         style="background: url('<?= URL ?>/assets/images/lotes.jpg'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Comprar mi Lote</h2>
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
        <div class="featured-flat-area pb-80" <?=$displayZonas?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2>Comprar mi lote</h2>
                            <p><?=$textoLugar?></p>
                        </div>
                    </div>
                </div>
                <div class="featured-flat">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Capilla del Monte</span>
                                    <a href="<?= URL ?>/lotes/capilla-del-monte">
                                        <div style="background: url('<?= URL ?>/assets/images/capilla-del-monte.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/capilla-del-monte">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Embalse</span>
                                    <a href="<?= URL ?>/lotes/embalse">
                                        <div style="background: url('<?= URL ?>/assets/images/embalse.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/embalse">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Los Reartes</span>
                                    <a href="<?= URL ?>/lotes/los-reartes">
                                        <div style="background: url('<?= URL ?>/assets/images/los-reartes.jpg')center/cover; height: 200px;"></div>
                                    </a>
                                    <div class="flat-link">
                                        <a href="<?= URL ?>/lotes/los-reartes">Más
                                            detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED FLAT AREA END -->

        <!-- FEATURED FLAT AREA START -->
        <div class="featured-flat-area pb-80" <?=$displayLotes?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2><?=$id?></h2>
                            <p><?=$textoLugar?></p>
                        </div>
                    </div>
                </div>
                <div class="featured-flat">
                    <div class="row">
                        <?php foreach ($productosArray as $key => $valor) {
                            $medidas = explode("x", $valor['var2']);
                            $filter = array("cod = '$valor[cod]'");
                            $imagenesArray = $imagenes->list($filter, "id ASC", "");
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <span class="for-sale"><?= $valor['titulo'] ?></span>
                                        <a href="<?= URL ?>/lote/<?= $funcion->normalizar_link($valor['titulo']) ?>/<?= $valor['cod'] ?>">
                                            <div style="background: url('<?= URL . '/' . $imagenesArray[0]['ruta'] ?>')center/cover; height: 200px;"></div>
                                        </a>
                                        <div class="flat-link">
                                            <a href="<?= URL ?>/lote/<?= $funcion->normalizar_link($valor['titulo']) ?>/<?= $valor['cod'] ?>">Más
                                                detalles</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- pagination-area -->
            <?php if ($numeroPaginas > 1) { ?>
                <div class="col-xs-12">
                    <div class="pagination-area mb-60">
                        <ul class="pagination-list text-center">
                            <?php if (($pagina + 1) > 1) { ?>
                                <li>
                                    <a href="<?= $anidador ?>pagina=<?= $pagina ?>"><i class="fa fa-angle-left"
                                                                                       aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php for ($i = 1; $i <= $numeroPaginas; $i++) { ?>
                                <li><a href="<?= $anidador ?>pagina=<?= $i ?>"><?= $i ?></a></li>
                            <?php } ?>

                            <?php if (($pagina + 2) <= $numeroPaginas) { ?>
                                <li>
                                    <a href="<?= $anidador ?>pagina=<?= ($pagina + 2) ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- FEATURED FLAT AREA END -->

    </section>


<?php $template->themeEnd(); ?>