<!-- Start footer area -->
<footer id="footer" class="footer-area bg-2 bg-opacity-black-90">
    <div class="footer-top pt-110 pb-80">
        <div class="container">
            <div class="row">
                <!-- footer-address -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <h6 class="footer-titel">INFORMACIÓN</h6>
                        <ul class="footer-address">
                            <li>
                                <div class="address-icon">
                                    <img src="<?=URL;?>/images/icons/location-2.png" alt="">
                                </div>
                                <div class="address-info">
                                    <span><?=DIRECCION;?></span>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <img src="<?=URL;?>/images/icons/phone-3.png" alt="">
                                </div>
                                <div class="address-info">
                                    <span><?=TELEFONO;?><span>
                                    </div>
                                </li>
                                <li>
                                    <div class="address-icon">
                                        <img src="<?=URL;?>/images/icons/world.png" alt="">
                                    </div>
                                    <div class="address-info">
                                        <span>Email : <?=EMAIL;?>/</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- footer-latest-news -->
                    <div class="col-lg-6 col-md-5 hidden-sm col-xs-12">
                        <div class="footer-widget middle">
                            <h6 class="footer-titel">RECIENTE</h6>
                            <ul class="footer-latest-news">
                                <li>
                                    <div class="latest-news-image">
                                        <a href="single-blog.html"><img src="images/blog/1.jpg" alt=""></a>
                                    </div>
                                    <div class="latest-news-info">
                                        <h6><a href="single-blog.html">Beautiful Home</a></h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur acinglit sed do eiusmod tempor inciidunt ut labore </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="latest-news-image">
                                        <a href="single-blog.html"><img src="images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="latest-news-info">
                                        <h6><a href="single-blog.html">Beautiful Home</a></h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur acinglit sed do eiusmod tempor inciidunt ut labore </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="latest-news-image">
                                        <a href="single-blog.html"><img src="images/blog/3.jpg" alt=""></a>
                                    </div>
                                    <div class="latest-news-info">
                                        <h6><a href="single-blog.html">Beautiful Home</a></h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur acinglit sed do eiusmod tempor inciidunt ut labore </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- footer-contact -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h6 class="footer-titel">CONTACTO RÁPIDO</h6>
                            <div class="footer-contact">
                                <p>Lorem ipsum dolor sit amet, consectetur acinglit sed do eiusmod tempor</p>
                                <form  id="contact-form-2" action="mail_footer.php" method="post">
                                    <input type="email" name="email2" placeholder="Type your E-mail address...">
                                    <textarea name="message2" placeholder="Write here..."></textarea>
                                    <button type="submit" value="send">Send</button>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="copyright text-center">
                            <p>Copyright &copy; 2018 <a href="http://estudiorochayasoc.com.ar" target="_blank"><b>Estudio Rocha & Asociados</b></a>. Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer area -->

    <!-- jquery latest version -->
    <script src="<?=URL;?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="<?=URL;?>/assets/js/bootstrap.min.js"></script>
    <!-- Nivo slider js -->    
    <script src="<?=URL;?>/assets/lib/js/jquery.nivo.slider.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="<?=URL;?>/assets/js/plugins.js"></script>
    <!-- ajax-mail js -->
    <script src="<?=URL;?>/assets/js/ajax-mail.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="<?=URL;?>/assets/js/main.js"></script>