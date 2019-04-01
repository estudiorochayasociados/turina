<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title", "Blog | " . TITULO);
$template->set("imagen", LOGO);
$template->set("keywords", "");
$template->set("description", "Noticias y actualidad sobre el mundo de los inmuebles.");
$template->themeInit();
//Clases
$funciones = new Clases\PublicFunction();
$novedades = new Clases\Novedades();
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : 0;
$categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : '0';

$cantidad = 4;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if ($pagina + 1 != 0) {
    $url = $funciones->eliminar_get(CANONICAL, 'pagina');
} else {
    $url = CANONICAL;
}

if ($categoria != '0') {
    $urlFiltro = $funciones->eliminar_get(CANONICAL, 'categoria');
    $urlFiltro = $funciones->eliminar_get($urlFiltro, 'pagina');
    $filtroNovedades = array("categoria = '" . $categoria . "'");
} else {
    $urlFiltro = $funciones->eliminar_get(CANONICAL, 'pagina');
    $filtroNovedades = "";
}

$novedadesArray = $novedades->list($filtroNovedades, "", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $novedades->paginador($filtroNovedades, $cantidad);
?>

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bg-opacity-black-40" style="background: url('<?= URL ?>/assets/images/blog.jpg'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Blog</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="<?= URL; ?>/index">Inicio</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper">

        <!-- BLOG AREA START -->
        <div class="blog-area pt-115 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row flex_wrap">
                            <?php foreach ($novedadesArray as $key => $valor) {
                                $fecha = explode('-', $valor['fecha']);
                                $filter = array("cod = '$valor[cod]'");
                                $imagenesArray = $imagenes->list($filter, "", "");
                                ?>
                                <!-- blog-item -->
                                <div class="col-sm-6 col-xs-12">
                                    <article class="blog-item bg-gray">
                                        <div class="blog-image">
                                            <a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>">
                                                <div class="contimg2">
                                                    <img src="<?= $imagenesArray[0]['ruta'] ?>" height="100%" alt="<?= $valor['titulo'] ?>" titulo="<?= $valor['titulo'] ?>">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="post-title-time">
                                                <h5><a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>"><?= $valor['titulo'] ?></a></h5>
                                                <p><?= $fecha[2] ?>/<?= $fecha[1] ?>/<?= $fecha[0] ?></p>
                                            </div>
                                            <?= substr($valor['desarrollo'], 0, 111) ?>..
                                            <a class="read-more" href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>">Leer más</a>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                            <!-- pagination-area -->
                            <?php
                            if ($pagina != 0) {
                                if (count($_GET) == 1) {
                                    $anidador = "?";
                                } else {
                                    $anidador = "&";
                                }
                            } else {
                                $anidador = "&";
                            }
                            if (empty(count($_GET))) {
                                $anidador = "?";
                            }
                                ?>
                                <div class="col-xs-12">
                                    <div class="pagination-area mb-60">
                                        <ul class="pagination-list text-center">
                                            <?php if (($pagina + 1) > 1) { ?>
                                                <li><a href="<?= $url ?><?= $anidador ?>pagina=<?= $pagina ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                            <?php } ?>

                                            <?php for ($i = 1; $i <= $numeroPaginas; $i++) {
                                                if ($i == $pagina + 1) {
                                                    $activo = 'class="current"';
                                                } else {
                                                    $activo = '';
                                                }
                                                ?>
                                                <li><a <?= $activo ?> href="<?= $url ?><?= $anidador ?>pagina=<?= $i ?>"><?= $i ?></a></li>
                                            <?php } ?>

                                            <?php if (($pagina + 2) <= $numeroPaginas) { ?>
                                                <li><a href="<?= $url ?><?= $anidador ?>pagina=<?= ($pagina + 2) ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- widget-categories -->
                        <aside class="widget widget-categories mb-50">
                            <h5>Categorías</h5>
                            <ul class="widget-categories-list">
                                <?php
                                $filter = array("area = 'novedades'");
                                $categoriasArray = $categorias->list($filter, "", "");
                                foreach ($categoriasArray as $key => $valor) {
                                    $anidador = "?";
                                    ?>
                                    <li>
                                        <a href="<?= $urlFiltro . $anidador ?>categoria=<?= $valor['cod'] ?>"><?= $valor['titulo'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </aside>
                        <!-- widget-recent-post -->
                        <aside class="widget widget-recent-post mb-50">
                            <h5>Recientes</h5>
                            <div class="row">
                                <?php foreach ($novedadesArray as $key => $valor) {
                                    $fecha = explode('-', $valor['fecha']);
                                    $filter = array("cod = '$valor[cod]'");
                                    $imagenesArray = $imagenes->list($filter, "", "");
                                    ?>
                                    <!-- blog-item -->
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>">
                                                    <div class="contimg3">
                                                        <img src="<?= $imagenesArray[0]['ruta'] ?>" height="100%" alt="<?= $valor['titulo'] ?>" titulo="<?= $valor['titulo'] ?>">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5>
                                                        <a href="<?= URL ?>/articulo/<?= $valor['titulo'] ?>/<?= $valor['cod'] ?>"><?= $valor['titulo'] ?></a>
                                                    </h5>
                                                    <p><?= $fecha[2] ?>/<?= $fecha[1] ?>/<?= $fecha[0] ?></p>
                                                </div>
                                                <?= substr($valor['desarrollo'], 0, 50) ?>..
                                            </div>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->
    </div>
    <!-- End page content -->


<?php $template->themeEnd(); ?>