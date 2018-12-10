<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Turina Inmboliaria");
$template->set("description", "");
$template->set("keywords", "");
$template->set("imagen", LOGO);
$template->themeInit();
//Clases
?>

<!-- SLIDER SECTION START -->
<div class="slider-3 youtube-bg bg-opacity-black-10">
    <div class="slider-content-3 text-center">
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            <h1 class="slider-1-title-2">ENCONTRÁ LA CASA DE TUS SUEÑOS</h1>
        </div>
        <!--<div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
            <a class="slider-button mt-40" href="#">Read More</a>
        </div>-->
    </div>
</div>
<!-- SLIDER SECTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    <!-- FEATURED FLAT AREA START -->
    <div class="featured-flat-area pt-115 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-2 text-center">
                        <h2>Featured PROPERTY</h2>
                        <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                    </div>
                </div>
            </div>
            <div class="featured-flat">
                <div class="row">
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <span class="for-sale">For Sale</span>
                                <a href="properties-details.html"><img src="images/flat/1.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <a href="properties-details.html"><img src="images/flat/2.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <span class="for-sale rent">For rent</span>
                                <a href="properties-details.html"><img src="images/flat/3.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <a href="properties-details.html"><img src="images/flat/4.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <span class="for-sale">For Sale</span>
                                <a href="properties-details.html"><img src="images/flat/5.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <a href="properties-details.html"><img src="images/flat/6.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <span class="for-sale rent">For rent</span>
                                <a href="properties-details.html"><img src="images/flat/7.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <a href="properties-details.html"><img src="images/flat/8.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                    <!-- flat-item -->
                    <div class="col-md-4 hidden-sm col-xs-12">
                        <div class="flat-item">
                            <div class="flat-item-image">
                                <span class="for-sale">For Sale</span>
                                <a href="properties-details.html"><img src="images/flat/9.jpg" alt=""></a>
                                <div class="flat-link">
                                    <a href="properties-details.html">More Details</a>
                                </div>
                                <ul class="flat-desc">
                                    <li>
                                        <img src="images/icons/4.png" alt="">
                                        <span>450 sqft</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/5.png" alt="">
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <img src="images/icons/6.png" alt="">
                                        <span>3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flat-item-info">
                                <div class="flat-title-price">
                                    <h5><a href="properties-details.html">Masons de Villa </a></h5>
                                    <span class="price">$52,350</span>
                                </div>
                                <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED FLAT AREA END -->

    <!-- FEATURES AREA START -->
            <div class="features-area fix">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-5">
                            <div class="features-info bg-gray">
                                <div class="section-title mb-30">
                                    <h3>HERE IS</h3>
                                    <h2 class="h1">AWESOME FEATUES</h2>
                                </div>
                                <div class="features-desc">
                                    <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Sheltek</span> is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do smod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi</p>
                                </div>
                                <div class="features-include">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Fully Furnished</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Royal Touch Paint</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Latest Interior Design</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Non Stop Security</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Living Inside a Nature</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4">
                                            <div class="features-include-list">
                                                <h6><img src="images/icons/7.png" alt="">Luxurious Fittings</h6>
                                                <p>Lorem is a dummy text do eiud tempor dolor sit amet dum</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURES AREA END -->

            <!-- BLOG AREA START -->
            <div class="blog-area pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>FROM BLOG</h2>
                                <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="blog-carousel">
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/1.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Latest Design House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/3.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Duplex Villa House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Latest Design House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG AREA END -->

</section>


<?php $template->themeEnd(); ?>