<?php
namespace config;
class autoload
{
    public static function runSitio()
    {
        session_start();
        $_SESSION["cod_pedido"] = isset($_SESSION["cod_pedido"]) ? $_SESSION["cod_pedido"] : substr(md5(uniqid(rand())), 0, 10);
        define('URL', "http://".$_SERVER['HTTP_HOST']."/Turina");
        define('CANONICAL', "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
        define('TITULO', "Sueños de las Sierras");
        define('TELEFONO', "3564421674");
        define('CIUDAD', "San Francisco");
        define('PROVINCIA', "Cordoba");
        define('PAIS', "Argentina");
        define('EMAIL', "info@solucionesjuridicassrl.com");
        define('PASS_EMAIL', "inSoSo2019");
        define('SMTP_EMAIL', "solucionesjuridicassrl.com");
        define('DIRECCION', "direccion");
        define('LOGO', URL . "/assets/images/logo/logo.png");
        define('APP_ID_FB', "");
        spl_autoload_register(
            function($clase)
            {
                $ruta = str_replace("\\", "/", $clase) . ".php";
                include_once $ruta;
            }
        );
    }

    public static function runAdmin()
    {
        session_start();
        define('URLSITE',"http://".$_SERVER['HTTP_HOST']."/Turina/admin");
        define('URL', "http://".$_SERVER['HTTP_HOST']."/Turina/admin");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(
            function ($clase)
            {
                $ruta = str_replace("\\", "/", $clase) . ".php";
                include_once "../" . $ruta;
            }
        );
    }
}
