<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->set("title", "Pinturería Ariel | Contacto");
$template->set("description", "Contacto Pinturería Ariel");
$template->set("keywords", "Contacto Pinturería Ariel");
$template->set("favicon", LOGO);
$template->themeInit();
//
?>
<body id="bd" class="cms-index-index2 header-style2 prd-detail sns-404 cms-simen-home-page-v2 default cmspage">
<div id="sns_wrapper">
    <?php $template->themeNav(); ?>
    <div id="sns_content" class="wrap layout-m">
        <div class="container">
            <div class="row">
                <div class="content mt-20">
                    <h1>404</h1>
                    <h2>Página no encontrada</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
$template->themeEnd();
?>
