<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Pinturería Ariel | Productos");
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
//
$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : '';
$subcategoria = isset($_GET["subcategoria"]) ? $_GET["subcategoria"] : '';
$cantidad_a_mostrar = 24;



$filter = array();

if ($categoria != '') {
    array_push($filter, "categoria = '$categoria'");
}

if ($subcategoria != '') {
    array_push($filter, "subcategoria = '$subcategoria'");
}

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if (@count($filter) == 0) {
    $filter = '';
}

if (@count($_GET) == 0) {
    $anidador = "?";
} else {
    if ($pagina >= 0) {
        $anidador = "&";
    } else {
        $anidador = "?";
    }
}

//Clases
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$productData = $productos->listWithOps($filter, '', ($cantidad_a_mostrar * $pagina) . ',' . $cantidad_a_mostrar);
$productDataSide = $productos->listWithOps($filter, '', '8');
$productosPaginador = $productos->paginador($filter, $cantidad_a_mostrar);
$productos->listWithOps($filter, '', ($cantidad_a_mostrar * $pagina) . ',' . $cantidad_a_mostrar)
?>
     
<?php
$template->themeEnd();
?>