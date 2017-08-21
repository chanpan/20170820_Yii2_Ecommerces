<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\themes\beststore\BeststoreAsset;
use common\widgets\Alert;

BeststoreAsset::register($this); 
$asset_path = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/beststore');
?>
<?php $this->beginPage() ?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="<?= $asset_path ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $asset_path ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script src="<?= $asset_path ?>/js/jquery.min.js"></script>
        <!-- //js -->
        <!-- cart -->
        <script src="<?= $asset_path ?>/js/simpleCart.min.js"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="<?= $asset_path ?>/js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- timer -->
        <link rel="stylesheet" href="<?= $asset_path ?>/css/jquery.countdown.css" />
        <!-- //timer -->
        <!-- animation-effect -->
        <link href="<?= $asset_path ?>/css/animate.min.css" rel="stylesheet"> 
        <script src="<?= $asset_path ?>/js/wow.min.js"></script>
        <script>
new WOW().init();
        </script>
        <!-- //animation-effect -->
    </head>

    <body>
       
       <?php require("header.php")?>
        <!-- collections -->
        <div class="new-collections">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">New Collections</h3>
                <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                    deserunt mollit anim id est laborum.</p>
                <div class="new-collections-grids">
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/7.jpg" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.html">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="single.html">Formal Shirt</a></h4>
                            <p>Vel illum qui dolorem eum fugiat.</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><i>$325</i> <span class="item_price">$250</span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/8.jpg" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.html">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="single.html">Running Shoes</a></h4>
                            <p>Vel illum qui dolorem eum fugiat.</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 new-collections-grid">
                        <div class="new-collections-grid1 new-collections-grid1-image-width animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/5.jpg" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos new-collections-grid1-image-pos1">
                                    <a href="single.html">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right new-collections-grid1-right-rate">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>New</p>
                                </div>
                            </div>
                            <h4><a href="single.html">Dining Table</a></h4>
                            <p>Vel illum qui dolorem eum fugiat.</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><i>$580</i> <span class="item_price">$550</span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid-sub-grids">
                            <div class="new-collections-grid1-sub">
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/6.jpg" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.html">Quick View</a>
                                        </div>
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.html">Wall Lamp</a></h4>
                                    <p>Vel illum qui dolorem eum fugiat.</p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <p><i>$480</i> <span class="item_price">$400</span><a class="item_add" href="#">add to cart </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="new-collections-grid1-sub">
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/9.jpg" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.html">Quick View</a>
                                        </div>
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="rating-left">
                                                    <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.html">Wall Lamp</a></h4>
                                    <p>Vel illum qui dolorem eum fugiat.</p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/10.jpg" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.html">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="single.html">Pearl & Stone Anklet</a></h4>
                            <p>Vel illum qui dolorem eum fugiat.</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><i>$180</i> <span class="item_price">$120</span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="<?= $asset_path?>/images/11.jpg" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.html">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="single.html">Stones Bangles</a></h4>
                            <p>Vel illum qui dolorem eum fugiat.</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><i>$340</i> <span class="item_price">$257</span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //collections -->
        <!-- new-timer -->
        <div class="timer">
            <div class="container">
                <div class="timer-grids">
                    <div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                        <h3><a href="products.html">sunt in culpa qui officia deserunt mollit</a></h3>
                        <div class="rating">
                            <div class="rating-left">
                                <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="<?= $asset_path?>/images/2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="<?= $asset_path?>/images/1.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
                            <p><i>$580</i> <span class="item_price">$550</span></p>
                            <h4>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit 
                                qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui 
                                dolorem eum fugiat quo voluptas nulla pariatur.</h4>
                            <p><a class="item_add timer_add" href="#">add to cart </a></p>
                        </div>
                        <div id="counter"> </div>
                        <script src="<?= $asset_path?>/js/jquery.countdown.js"></script>
                        <script src="<?= $asset_path?>/js/script.js"></script>
                    </div>
                    <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                        <div class="timer-grid-right1">
                            <img src="<?= $asset_path?>/images/17.jpg" alt=" " class="img-responsive" />
                            <div class="timer-grid-right-pos">
                                <h4>Special Offer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //new-timer -->
        <!-- collections-bottom -->
        <div class="collections-bottom">
            <div class="container">
                <div class="collections-bottom-grids">
                    <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                        <h3>45% Offer For <span>Women & Children's</span></h3>
                    </div>
                </div>
                <div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Newsletter</h3>
                    <p>Join us now to get all news and special offers.</p>
                    <form>
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <input type="email" value="Enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Enter your email address';}" required="">
                        <input type="submit" value="Join Us" >
                    </form>
                </div>
            </div>
        </div>
        <!-- //collections-bottom -->
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-grids">
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                        <h3>About Us</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat 
                                non proident, sunt in culpa qui officia deserunt mollit.</span></p>
                    </div>
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                        <h3>Contact Info</h3>
                        <ul>
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                        </ul>
                    </div>
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                        <h3>Flickr Posts</h3>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/13.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/14.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/15.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/16.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/13.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/14.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/15.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/16.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/13.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/14.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/15.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="footer-grid-left">
                            <a href="single.html"><img src="<?= $asset_path?>/images/16.jpg" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
                        <h3>Blog Posts</h3>
                        <div class="footer-grid-sub-grids">
                            <div class="footer-grid-sub-grid-left">
                                <a href="single.html"><img src="<?= $asset_path?>/images/9.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="footer-grid-sub-grid-right">
                                <h4><a href="single.html">culpa qui officia deserunt</a></h4>
                                <p>Posted On 25/3/2016</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="footer-grid-sub-grids">
                            <div class="footer-grid-sub-grid-left">
                                <a href="single.html"><img src="<?= $asset_path?>/images/10.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="footer-grid-sub-grid-right">
                                <h4><a href="single.html">Quis autem vel eum iure</a></h4>
                                <p>Posted On 25/3/2016</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
                    <h2><a href="index.html">Best Store <span>shop anywhere</span></a></h2>
                </div>
                <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
                    <p>&copy 2016 Best Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
                </div>
            </div>
        </div>
        <!-- //footer -->
    </body>
</html>

<?php $this->endPage() ?>
