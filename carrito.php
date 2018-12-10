<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template  = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Admin");
$template->set("description", "Admin");
$template->set("keywords", "Inicio");
$template->set("favicon", LOGO);
$template->themeInit();
//Clases
$productos  = new Clases\Productos();
$imagenes   = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$banners    = new Clases\Banner();
$carrito    = new Clases\Carrito();
//$envio    = new Clases\Envio();
$carro = $carrito->return();
$carroEnvio = $carrito->checkEnvio();

?>
<body id="bd" class="cms-index-index2 header-style2 prd-detail sns-products-detail1 cms-simen-home-page-v2 default cmspage">
    <div id="sns_wrapper">
        <?php $template->themeNav(); ?>
        <!-- BREADCRUMBS -->
        <div id="sns_breadcrumbs" class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="sns_titlepage"></div>
                        <div id="sns_pathway" class="clearfix">
                            <div class="pathway-inner">
                                <span class="icon-pointer "></span>
                                <ul class="breadcrumbs">
                                    <li class="home">
                                        <a title="Go to Home Page" href="#">
                                            <i class="fa fa-home"></i>
                                            <span>Home</span>
                                        </a>
                                    </li>
                                    <li class="category3 last">
                                        <span>Shopping cart</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- AND BREADCRUMBS -->

        <!-- CONTENT -->
        <div id="sns_content" class="wrap layout-m">
            <div class="container">
                <div class="row">
                    <div class="shoppingcart">
                        <div class="sptitle col-md-12">
                            <h3>SHOPPING CART</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="envio">
                                <?php
                                if($carroEnvio == '') {
                                    echo "<h3>Seleccioná el envió que más te convenga:</h3>";
                                    if (isset($_POST["envio"])) {
                                        if($carroEnvio != '') {
                                            $carrito->delete($carroEnvio);                                   
                                        }
                                        $envioExplode = explode("-", $_POST["envio"]);
                                        $carrito->set("id","Envio-Seleccion");
                                        $carrito->set("cantidad",1);
                                        $carrito->set("titulo",$envioExplode[1]);
                                        $carrito->set("precio",$envioExplode[0]);
                                        $carrito->add();         
                                        $funciones->headerMove(CANONICAL."");             
                                    } 
                                    ?>
                                    <form method="post"  id="envio">
                                        <select name="envio" class="form-control" id="envio" onchange="this.form.submit()">
                                            <option value="" selected disabled>Elegir envío</option>                                
                                            <option value="0-Retiro en Sucursal Rosario" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0-Retiro en Sucursal Rosario") { echo "selected"; }} ?>>
                                                Retiro en Sucursal Rosario
                                            </option>
                                            <option value="0-Retiro en Sucursal Buenos Aires" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0-Retiro en Sucursal Buenos Aires") { echo "selected"; }} ?>>
                                                Retiro en Sucursal Buenos Aires
                                            </option>
                                            <option value="0-Retiro en San Francisco Córdoba" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0-Retiro en San Francisco Córdoba") { echo "selected"; }} ?>>
                                                Retiro en Sucursal San Francisco Córdoba
                                            </option>
                                        </select>
                                    </form>
                                    <hr/>
                                    <?php 
                                }
                                ?>
                            </div>
                            <table class="table table-hover">
                             <thead >
                                <th>PRODUCTO</th>
                                <th>PRECIO UNITARIO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL</th>
                                <th></th>
                            </thead>
                            <tbody>
                             <?php
                             if (isset($_POST["eliminarCarrito"])) {
                                $carrito->delete($_POST["eliminarCarrito"]);
                            }

                            $i      = 0;
                            $precio = 0;
                            foreach ($carro as $carroItem) {
                                $precio += ($carroItem["precio"] * $carroItem["cantidad"]);
                                if($carroItem["id"] == "Envio-Seleccion") {
                                    $clase = "text-bold";
                                    $none = "hidden";                            
                                }  else {
                                    $clase;
                                    $none;
                                }
                                ?> 
                                <tr class="<?= $clase ?>">
                                    <td><?=  $carroItem["titulo"]; ?></td>                            
                                    <td><span class="<?= $none ?>"><?="$" . $carroItem["precio"];?></span></td>
                                    <td><span class="<?= $none ?>"><?=$carroItem["cantidad"];?></span></td>
                                    <td><?="$" . ($carroItem["precio"] * $carroItem["cantidad"]);?></td>
                                    <td>
                                     <form method="post">
                                        <input type="hidden" name="eliminarCarrito" value="<?=$i?>">
                                        <button class="btn-remove" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?').;" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                            <?php                
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div> 
            <form class="col-md-4 hidden">
                <div class="form-bd">
                    <h3>DISCOUNT CODES</h3>
                    <p class="formbd2">Enter your coupon code if you have one.</p>
                    <input class="styleip" type="text" value="" size="30" />
                    <span class="style-bd">Apply coupon</span>
                </div>
            </form>
            <form class="form-right pull-right col-md-6" method="post" action="<?= URL ?>/pagar">
                <div class="form-bd">
                    <p class="subtotal">
                        <span class="text1">SUBTOTAL:</span>
                        <span class="text2">$<?= $precio ?></span>
                    </p>
                    <h3 class="mb-0">
                        <span class="text3">GRAND TOTAL:</span>
                        <span class="text4">$<?= $precio ?></span>
                    </h3>
                    <?php if($carroEnvio == '') { ?>                
                        <span class="style-bd" onclick="$('#envio').addClass('alert alert-danger');">¿CÓMO PEREFERÍS EL ENVÍO DEL PEDIDO?</span>
                        <p class="checkout text-bold">¡Necesitamos que nos digas como querés realizar tu envío para que lo tengas listo cuanto antes!</p>
                    <?php } else { ?>
                        <div class="radioButtonPay mb-10">
                            <input type="radio" id="0" name="metodos-pago" value="0">
                            <label for="0">Transferencia Bancaria</label>
                        </div>
                        <div class="radioButtonPay mb-10">
                            <input type="radio" id="1" name="metodos-pago"  value="1">
                            <label for="1">Coordinar con vendedor</label>
                        </div>
                        <div class="radioButtonPay mb-10">
                            <input type="radio" id="2" name="metodos-pago"  value="2" checked>
                            <label for="2">Tarjeta de crédito o débito <span class="fa fa-arrow-right"></span> <b class="ml-5">¡Recomendado!</b></label>
                        </div>                
                        <button type="submit" name="pagar" class="mb-40 btn btn-success">PAGAR EL CARRITO</button>
                    <?php } ?>  
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- AND CONTENT -->
<?php
$template->themeEnd();
?>