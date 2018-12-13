<?php
$videos = new Clases\Videos();

if (isset($_POST["agregar"])) {
    $titulo = $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : '');
    $link   = $funciones->antihack_mysqli(isset($_POST["link"]) ? $_POST["link"] : '');
    $videos->set("titulo", $titulo);
    $videos->set("link", $link);
    $videos->add();
    $funciones->headerMove(URL . "/index.php?op=videos");
}
?>
<div class="mt-20">
    <div class="col-md-12">
        <h4>Subir Videos</h4>
        <hr/>
    </div>
    <form method="post">
        <label class="col-md-12">Título:
            <br/>
            <input type="text" name="titulo" value=""  />
        </label>
        <label class="col-md-12" >Código del link, ejemplo: https://www.youtube.com/watch?v=<b>CCynXTgd48w</b>
            <br/>
            <input type="text" name="link" placeholder="CCynXTgd48w" required/>
        </label>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" name="agregar" value="Subir Video" />
        </div>
    </form>
</div>
