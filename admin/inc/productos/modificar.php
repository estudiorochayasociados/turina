<?php
$campos = ["titulo", "precio", "precio_mayorista", "precio_descuento", "stock", "desarrollo", "categoria", "subcategoria", "keywords", "description", "url", "cod_producto", "meli", "imagenes", "var1", "var2", "var3", "var4", "no_var5", "no_var6", "no_var7", "no_var8"];
$productos = new Clases\Productos();
$imagenes  = new Clases\Imagenes();
$zebra     = new Clases\Zebra_Image();

$cod       = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$borrarImg = $funciones->antihack_mysqli(isset($_GET["borrarImg"]) ? $_GET["borrarImg"] : '');

$productos->set("cod", $cod);
$producto = $productos->view();
$imagenes->set("cod", $producto["cod"]);
$imagenes->set("link", "productos&accion=modificar");

$categorias = new Clases\Categorias();
$data = $categorias->list(array("area = 'productos'"),"","");

if ($borrarImg != '') {
    $imagenes->set("id", $borrarImg);
    $imagenes->delete();
    $funciones->headerMove(URL . "/index.php?op=productos&accion=modificar&cod=$cod");
}

if (isset($_POST["agregar"])) {
    $count = 0;
    $productos->set("id", $producto["id"]);
    $productos->set("cod", $cod);
    $productos->set("titulo", $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : ''));
    $productos->set("cod_producto", $funciones->antihack_mysqli(isset($_POST["cod_producto"]) ? $_POST["cod_producto"] : ''));
    $productos->set("precio", $funciones->antihack_mysqli(isset($_POST["precio"]) ? $_POST["precio"] : ''));
    $productos->set("precio_mayorista", $funciones->antihack_mysqli(isset($_POST["precio_mayorista"]) ? $_POST["precio_mayorista"] : ''));
    $productos->set("precio_descuento", $funciones->antihack_mysqli(isset($_POST["precio_descuento"]) ? $_POST["precio_descuento"] : ''));
    $productos->set("stock", $funciones->antihack_mysqli(isset($_POST["stock"]) ? $_POST["stock"] : ''));
    $productos->set("desarrollo", $funciones->antihack_mysqli(isset($_POST["desarrollo"]) ? $_POST["desarrollo"] : ''));
    $productos->set("categoria", $funciones->antihack_mysqli(isset($_POST["categoria"]) ? $_POST["categoria"] : ''));
    $productos->set("subcategoria", $funciones->antihack_mysqli(isset($_POST["subcategoria"]) ? $_POST["subcategoria"] : ''));
    $productos->set("keywords", $funciones->antihack_mysqli(isset($_POST["keywords"]) ? $_POST["keywords"] : ''));
    $productos->set("description", $funciones->antihack_mysqli(isset($_POST["description"]) ? $_POST["description"] : ''));
    $productos->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d")));
    $productos->set("meli", $funciones->antihack_mysqli(isset($_POST["meli"]) ? $_POST["meli"] : ''));
    $productos->set("url", $funciones->antihack_mysqli(isset($_POST["url"]) ? $_POST["url"] : ''));
    $productos->set("var1", $funciones->antihack_mysqli(isset($_POST["var1"]) ? $_POST["var1"] : ''));
    $productos->set("var2", $funciones->antihack_mysqli(isset($_POST["var2"]) ? $_POST["var2"] : ''));
    $productos->set("var3", $funciones->antihack_mysqli(isset($_POST["var3"]) ? $_POST["var3"] : ''));
    $productos->set("var4", $funciones->antihack_mysqli(isset($_POST["var4"]) ? $_POST["var4"] : ''));
    $productos->set("var5", $funciones->antihack_mysqli(isset($_POST["var5"]) ? $_POST["var5"] : ''));
    $productos->set("var6", $funciones->antihack_mysqli(isset($_POST["var6"]) ? $_POST["var6"] : ''));
    $productos->set("var7", $funciones->antihack_mysqli(isset($_POST["var7"]) ? $_POST["var7"] : ''));
    $productos->set("var8", $funciones->antihack_mysqli(isset($_POST["var8"]) ? $_POST["var8"] : ''));

    foreach ($_FILES['files']['name'] as $f => $name) {
        $imgInicio = $_FILES["files"]["tmp_name"][$f];
        $tucadena  = $_FILES["files"]["name"][$f];
        $partes    = explode(".", $tucadena);
        $dom       = (count($partes) - 1);
        $dominio   = $partes[$dom];
        $prefijo   = substr(md5(uniqid(rand())), 0, 10);
        if ($dominio != '') {
            $destinoFinal = "../assets/archivos/" . $prefijo . "." . $dominio;
            move_uploaded_file($imgInicio, $destinoFinal);
            chmod($destinoFinal, 0777);
            $destinoRecortado = "../assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

            $zebra->source_path            = $destinoFinal;
            $zebra->target_path            = $destinoRecortado;
            $zebra->jpeg_quality           = 80;
            $zebra->preserve_aspect_ratio  = true;
            $zebra->enlarge_smaller_images = true;
            $zebra->preserve_time          = true;

            if ($zebra->resize(800, 700, ZEBRA_IMAGE_NOT_BOXED)) {
                unlink($destinoFinal);
            }

            $imagenes->set("cod", $cod);
            $imagenes->set("ruta", str_replace("../", "", $destinoRecortado));
            $imagenes->add();
        }

        $count++;
    }

    $productos->edit();
    $funciones->headerMove(URL . "/index.php?op=productos");
}
?>

<div class="col-md-12 ">
    <h4>Productos</h4>
    <hr/>
    <form method="post" class="row" enctype="multipart/form-data">
        <label class="col-md-4">Título:<br/>
            <input type="text" name="titulo" value="<?=$producto["titulo"]?>">
        </label>
        <label class="col-md-4">Categoría:<br/>
            <select name="categoria">
             <?php
             foreach ($data as $categoria) {
                if($producto["categoria"] == $categoria["cod"]) {
                    echo "<option value='".$categoria["cod"]."' selected>".$categoria["titulo"]."</option>";
                } else {
                    echo "<option value='".$categoria["cod"]."'>".$categoria["titulo"]."</option>";
                } 
            }
            ?>
        </select>
    </label>
    <label class="col-md-4 <?php if (!in_array('stock', $campos)) {echo 'd-none';}?>">Stock:<br/>
        <input type="number" name="stock" value="<?=$producto["stock"]?>">
    </label>
    <div class="clearfix"></div>
    <label class="col-md-3 <?php if (!in_array('cod_producto', $campos)) {echo 'd-none';}?>">Código:<br/>
        <input type="text" name="cod_producto" value="<?=$producto["cod_producto"]?>">
    </label>
    <label class="col-md-3 <?php if (!in_array('precio', $campos)) {echo 'd-none';}?>">Precio:<br/>
        <input type="text" name="precio" value="<?=$producto["precio"]?>">
    </label>
    <label class="col-md-3 <?php if (!in_array('precio_descuento', $campos)) {echo 'd-none';}?>">Precio Descuento:<br/>
        <input type="text" name="precio_descuento" value="<?=$producto["precio_descuento"]?>">
    </label>
    <label class="col-md-3 <?php if (!in_array('url', $campos)) {echo 'd-none';}?>">Url:<br/>
        <input type="text" name="url" value="<?=$producto["url"]?>" id="url">
    </label>
    <div class="clearfix"></div>
    <label class="col-md-3 <?php if (!in_array('var1', $campos)) {echo 'd-none';}?>" >
        Var1:<br/>
        <input type="text" value="<?=$producto["var1"]?>" name="var1" id="var1">
    </label>
    <label class="col-md-3 <?php if (!in_array('var2', $campos)) {echo 'd-none';}?>" >
        Var2:<br/>
        <input type="text" value="<?=$producto["var2"]?>" name="var2" id="var2">
    </label>
    <label class="col-md-3 <?php if (!in_array('var3', $campos)) {echo 'd-none';}?>" >
        Var3:<br/>
        <input type="text" value="<?=$producto["var3"]?>" name="var3" id="var3">
    </label>
    <label class="col-md-3 <?php if (!in_array('var4', $campos)) {echo 'd-none';}?>" >
        Var4:<br/>
        <input type="text" value="<?=$producto["var4"]?>" name="var4" id="var4">
    </label>
    <div class="clearfix"></div>
    <label class="col-md-3 <?php if (!in_array('var5', $campos)) {echo 'd-none';}?>" >
        Var5:<br/>
        <input type="text" value="<?=$producto["var5"]?>" name="var5" id="var5">
    </label>
    <label class="col-md-3 <?php if (!in_array('var6', $campos)) {echo 'd-none';}?>" >
        Var6:<br/>
        <input type="text" value="<?=$producto["var6"]?>" name="var6" id="var6">
    </label>
    <label class="col-md-3 <?php if (!in_array('var7', $campos)) {echo 'd-none';}?>" >
        Var7:<br/>
        <input type="text" value="<?=$producto["var7"]?>" name="var7" id="var7">
    </label>
    <label class="col-md-3 <?php if (!in_array('var8', $campos)) {echo 'd-none';}?>" >
        Var8:<br/>
        <input type="text" value="<?=$producto["var8"]?>" name="var8" id="var8">
    </label>
    <div class="clearfix"></div>
    <label class="col-md-12 <?php if (!in_array('desarrollo', $campos)) {echo 'd-none';}?>">Desarrollo:<br/>
        <textarea name="desarrollo" class="ckeditorTextarea"><?=$producto["desarrollo"]?></textarea>
    </label>
    <div class="clearfix"></div>
    <label class="col-md-12 <?php if (!in_array('keywords', $campos)) {echo 'd-none';}?>">Palabras claves dividas por ,<br/>
        <input type="text" name="keywords"  value="<?=$producto["keywords"]?>">
    </label>
    <label class="col-md-12 <?php if (!in_array('description', $campos)) {echo 'd-none';}?>">Descripción breve<br/>
        <textarea name="description"><?=$producto["description"]?></textarea>
    </label>
    <br/>
    <div class="col-md-12 <?php if (!in_array('meli', $campos)) {echo 'd-none';}?>">
     <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="meli">
        <label class="form-check-label" for="meli">¿Publicar en MercadoLibre?</label>
    </div>
</div>
<br/>
<div class="col-md-12 <?php if (!in_array('imagenes', $campos)) {echo 'd-none';}?>">
    <div class="row">
        <?php
        $imagenes->imagenesAdmin();
        ?>
    </div>
</div>
<label class="col-md-7">Imágenes:<br/>
    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
</label>
<br/>
<div class="clearfix"><br/></div>
<div class="col-md-12">
    <input type="submit" class="btn btn-primary" name="agregar" value="Modificar Productos" />
</div>
</div>