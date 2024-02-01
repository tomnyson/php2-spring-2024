<div class="main-header">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="<?= ROOT_URL ?>">
                                <img class="img-full" src="<?= ROOT_URL ?>/assets/images/logo/logo.png" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                        <nav class="main-nav d-flex justify-content-center">
                            <ul class="nav">
                                <li>
                                    <a href="index.html">
                                        <span class="menu-text"> Home</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>

                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="index.html">Home Page - 1</a></li>
                                        <li><a href="index-2.html">Home Page - 2</a></li>
                                        <li><a href="index-3.html">Home Page - 3</a></li>
                                        <li><a href="index-4.html">Home Page - 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact-us.html">
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us.html">
                                        <span class="menu-text">About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us.html">
                                        <span class="menu-text">Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                                <li class="login-register-wrap d-none d-xl-flex">
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                    ?>
                                        <span><a href="<?= ROOT_URL . "/user/index" ?>">My Account</a></span>
                                        <span><a href="<?= ROOT_URL . "/user/login" ?>">Login</a></span>
                                        <span><a class="active" href="<?= ROOT_URL . "/user/register" ?>">Register</a></span>
                                    <?php
                                    }
                                    ?>
                                    <span><a href="<?= ROOT_URL . "/user/login" ?>">Login</a></span>
                                    <span><a class="active" href="<?= ROOT_URL . "/user/register" ?>">Register</a></span>
                                </li>
                                <li class="sidemenu-wrap d-none d-lg-flex">
                                    <a href="#">USD <i class="fa fa-caret-down"></i> </a>
                                    <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-language">
                                        <li><a href="#">USD - US Dollar</a></li>
                                        <li><a href="#">EUR - Euro</a></li>
                                        <li><a href="#">GBP - British Pound</a></li>
                                        <li><a href="#">INR - Indian Rupee</a></li>
                                        <li><a href="#">BDT - Bangladesh Taka</a></li>
                                        <li><a href="#">JPY - Japan Yen</a></li>
                                        <li><a href="#">CAD - Canada Dollar</a></li>
                                        <li><a href="#">AUD - Australian Dollar</a></li>
                                    </ul>
                                </li>
                                <?php
                                //     if (isset($_SESSION['user_id'])) { 
                                //     use Controllers\CartController;

                                //     $cart = new CartController();
                                //     $cart->renderCartMenu();


                                // }
                                ?>

                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Header Area End -->
<!-- Sticky Header Start Here-->
<div class="main-header header-sticky">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                        <div class="header-logo">
                            <a href="index.html">
                                <img class="img-full" src="assets/images/logo/logo.png" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                        <nav class="main-nav d-flex justify-content-center">
                            <ul class="nav">
                                <li>
                                    <a href="index.html">
                                        <span class="menu-text"> Home</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="index.html">Home Page - 1</a></li>
                                        <li><a href="index-2.html">Home Page - 2</a></li>
                                        <li><a href="index-3.html">Home Page - 3</a></li>
                                        <li><a href="index-4.html">Home Page - 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop.html">
                                        <span class="menu-text">Shop</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="mega-menu dropdown-hover">
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Shop</span></li>
                                                <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                </li>
                                                <li><a href="shop-list-left.html">Shop List Left Sidebar</a>
                                                </li>
                                                <li><a href="shop-list-right.html">Shop List Right
                                                        Sidebar</a></li>
                                                <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Product</span></li>
                                                <li><a href="product-details.html">Single Product</a></li>
                                                <li><a href="variable-product-details.html">Variable
                                                        Product</a></li>
                                                <li><a href="external-product-details.html">External
                                                        Product</a></li>
                                                <li><a href="gallery-product-details.html">Gallery
                                                        Product</a></li>
                                                <li><a href="countdown-product-details.html">Countdown
                                                        Product</a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Others</span></li>
                                                <li><a href="error-404.html">Error 404</a></li>
                                                <li><a href="compare.html">Compare Page</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details-fullwidth.html">
                                        <span class="menu-text"> Blog</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="blog.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html">Blog List Right
                                                Sidebar</a></li>
                                        <li><a href="blog-list-fullwidth.html">Blog List Fullwidth</a></li>
                                        <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right
                                                Sidebar</a></li>
                                        <li><a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a></li>
                                        <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a></li>
                                        <li><a href="blog-details-fullwidth.html">Blog Details Fullwidth</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="menu-text"> Pages</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="frequently-questions.html">FAQ</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a class="active" href="register.html">Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about-us.html">
                                        <span class="menu-text"> About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us.html">
                                        <span class="menu-text">Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                                <li class="login-register-wrap d-none d-xl-flex">
                                    <span><a href="<?= ROOT_URL . "/user/login" ?>">Login</a></span>
                                    <span><a class="active" href="<?= ROOT_URL . "/user/register" ?>">Register</a></span>
                                </li>
                                <li class="sidemenu-wrap d-none d-lg-flex">
                                    <a href="#">USD <i class="fa fa-caret-down"></i> </a>
                                    <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-language">
                                        <li><a href="#">USD - US Dollar</a></li>
                                        <li><a href="#">EUR - Euro</a></li>
                                        <li><a href="#">GBP - British Pound</a></li>
                                        <li><a href="#">INR - Indian Rupee</a></li>
                                        <li><a href="#">BDT - Bangladesh Taka</a></li>
                                        <li><a href="#">JPY - Japan Yen</a></li>
                                        <li><a href="#">CAD - Canada Dollar</a></li>
                                        <li><a href="#">AUD - Australian Dollar</a></li>
                                    </ul>
                                </li>
                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn">
                                        <i class="ion-bag"></i>
                                        <span class="cart-item_count">3</span>
                                    </a>
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/1.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html">11. Product with video
                                                        - navy</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/2.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html" title="10. This is the large title for testing large title and there is an image for testing - white">10.
                                                        This is the large title for testing...</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/3.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html">1. New and sale badge
                                                        product - s / red</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Total :</h5>
                                            <h5>$166.00</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-center">
                                            <a class="obrien-button white-btn" href="cart.html">View cart</a>
                                            <a class="obrien-button white-btn" href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#mobileMenu">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>