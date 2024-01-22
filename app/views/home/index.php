<!-- Begin Slider Area One -->
<div class="slider-area">
    <div class="obrien-slider arrow-style" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 7000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":992, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "dots": true
        }}
        ]'>
        <div class="slide-item slide-1 bg-position slide-bg-1 animation-style-01">
            <div class="slider-content">
                <h4 class="slider-small-title">Cold processed organic fruit</h4>
                <h2 class="slider-large-title">Fresh Avocado</h2>
                <div class="slider-btn">
                    <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="slide-item slide-2 bg-position slide-bg-1 animation-style-01">
            <div class="slider-content">
                <h4 class="slider-small-title">Healthy life with</h4>
                <h2 class="slider-large-title">Natural Organic</h2>
                <div class="slider-btn">
                    <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area One End Here -->
<!-- Feature Area Start Here -->
<div class="feature-area">
    <div class="container container-default custom-wrapper">
        <div class="row">
            <div class="col-xl-6 col-lg-5 col-md-12 col-custom">
                <div class="feature-content-wrapper">
                    <h2 class="title">Important to eat fruit</h2>
                    <p class="desc-content">
                        Eating fruit provides health benefits — people who eat more fruits and vegetables
                        as part of an overall healthy diet are likely to have a reduced risk of some
                        chronic diseases. Fruits provide nutrients vital for health and maintenance of
                        your body.
                    </p>
                    <p class="desc-content">
                        Fruits are sources of many essential nutrients that are underconsumed, including
                        potassium, dietary fiber, vitamin C, and folate (folic acid).
                    </p>
                    <p class="desc-content">
                        Most fruits are naturally low in fat, sodium, and calories. None have cholesterol.
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-12 col-custom">
                <div class="feature-image">
                    <img src="<?= ROOT_URL ?>/assets/images/feature/feature-1.jpg" alt="Obrien Feature" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Area End Here -->
<!-- Product Area Start Here -->
<div class="product-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Best Sale</h2>
                    <div class="desc-content">
                        <p>
                            All best seller product are now available for you and your can buy this product
                            from here any time any where so sop now
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 product-wrapper col-custom">
                <div class="product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                    <?php if (!empty($product_bestseller)) {
                        foreach ($product_bestseller as $item) { ?>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="<?= $item['image'] ?>" alt="" class="product-image-1 w-100" />
                                            <img src="<?= $item['name'] ?>" alt="" class="product-image-2 position-absolute w-100" />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2">
                                                <a href="product-details.html"><?= $item['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price "><?= $item['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-bs-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Banner Fullwidth Area Start Here -->
<div class="banner-fullwidth-area">
    <div class="container custom-wrapper">
        <div class="row">
            <div class="col-md-5 col-lg-6 text-center col-custom">
                <div class="banner-thumb h-100 d-flex justify-content-center align-items-center">
                    <img src="<?= ROOT_URL ?>/assets/images/banner/thumb/1.png" alt="Banner Thumb" />
                </div>
            </div>
            <div class="col-md-7 col-lg-6 text-center justify-content-center col-custom">
                <div class="banner-flash-content d-flex flex-column align-items-center justify-content-center h-100">
                    <h2 class="deal-head text-uppercase">Flash Deals</h2>
                    <h3 class="deal-title text-uppercase">Hurry up and Get 25% Discount</h3>
                    <a href="shop.html" class="obrien-button primary-btn">Shop Now</a>
                    <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Fullwidth Area End Here -->
<!-- Banner Area Start Here -->
<div class="banner-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-custom">
                <div class="banner-image hover-style">
                    <a class="d-block" href="shop.html">
                        <img class="w-100" src="<?= ROOT_URL ?>/assets/images/banner/small-banner/1-1.png" alt="Banner Image" />
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-custom">
                <div class="banner-image hover-style">
                    <a class="d-block" href="shop.html">
                        <img class="w-100" src="<?= ROOT_URL ?>/assets/images/banner/small-banner/1-2.png" alt="Banner Image" />
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-custom">
                <div class="banner-image hover-style mb-0">
                    <a class="d-block" href="shop.html">
                        <img class="w-100" src="<?= ROOT_URL ?>/assets/images/banner/small-banner/1-3.png" alt="Banner Image" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->
<!-- Product Area Start Here -->
<div class="product-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Featured Products</h2>
                    <div class="desc-content">
                        <p>
                            All best seller product are now available for you and your can buy this product
                            from here any time any where so sop now
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-wrapper col-lg-12 col-custom">
                <div class="product-slider" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": false,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint": 992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint": 576, "settings": {
                    "slidesToShow": 1
                    }}
                    ]'>
                    <?php foreach ($product_bestseller as $item) { ?>
                        <div class="single-item">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="<?= $item['image'] ?>" alt="" class="product-image-1 w-100" />
                                        <img src="<?= $item['image'] ?>" alt="" class="product-image-2 position-absolute w-100" />
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-title">
                                        <h4 class="title-2">
                                            <a href="product-details.html"><?= $item['name'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price "><?= $item['price'] ?></span>
                                    </div>
                                </div>
                                <div class="add-action d-flex position-absolute">
                                    <a href="cart.html" title="Add To cart">
                                        <i class="ion-bag"></i>
                                    </a>
                                    <a href="compare.html" title="Compare">
                                        <i class="ion-ios-loop-strong"></i>
                                    </a>
                                    <a href="wishlist.html" title="Add To Wishlist">
                                        <i class="ion-ios-heart-outline"></i>
                                    </a>
                                    <a href="#exampleModalCenter" data-bs-toggle="modal" title="Quick View">
                                        <i class="ion-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Newslatter Area Start Here -->
<div class="newsletter-area">
    <div class="container container-default h-100 custom-area">
        <div class="row h-100">
            <div class="col-lg-8 col-xl-5 offset-xl-6 offset-lg-3 col-custom">
                <div class="newsletter-content text-center d-flex flex-column align-items-center justify-content-center h-100">
                    <div class="section-content">
                        <h4 class="title-4 text-uppercase">
                            Special <span>Offer</span> for subscription
                        </h4>
                        <h2 class="title-3 text-uppercase">Get instant discount for membership</h2>
                        <p class="desc-content">
                            Subscribe our newsletter and all latest news of our <br />latest product,
                            promotion and offers
                        </p>
                    </div>
                    <div class="newsletter-form-wrap ml-auto mr-auto">
                        <form id="mc-form" class="mc-form d-flex position-relative">
                            <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL" />
                            <button id="mc-submit" class="btn primary-btn obrien-button newsletter-btn position-absolute" type="submit">
                                Subscribe
                            </button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div>
                            <!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div>
                            <!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div>
                            <!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newslatter Area End Here -->
<!-- Latest Blog Area Start Here -->
<div class="latest-blog-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Latest Blog</h2>
                    <div class="desc-content">
                        <p>If you want to know about the organic product then keep an eye on our blog.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-custom">
                <div class="obrien-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 768, "settings": {
                        "slidesToShow": 1
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                    <div class="single-blog">
                        <div class="single-blog-thumb">
                            <a href="blog.html">
                                <img src="<?= ROOT_URL ?>/assets/images/blog/medium-size/1.jpg" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="single-blog-content position-relative">
                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                <span>14</span>
                                <span>01</span>
                            </div>
                            <div class="post-meta">
                                <span class="author">Author: Obrien Demo Admin</span>
                            </div>
                            <h2 class="post-title">
                                <a href="blog.html">There Are Many Variation of Passages of Lorem Ipsum
                                    Available</a>
                            </h2>
                            <p class="desc-content">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                roots in a piece of classical Latin literature from 45 BC, making...
                            </p>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="single-blog-thumb">
                            <a href="blog.html">
                                <img src="<?= ROOT_URL ?>/assets/images/blog/medium-size/2.jpg" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="single-blog-content position-relative">
                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                <span>14</span>
                                <span>01</span>
                            </div>
                            <div class="post-meta">
                                <span class="author">Author: Obrien Demo Admin</span>
                            </div>
                            <h2 class="post-title">
                                <a href="blog.html">There Are Many Variation of Passages of Lorem Ipsum
                                    Available</a>
                            </h2>
                            <p class="desc-content">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                roots in a piece of classical Latin literature from 45 BC, making...
                            </p>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="single-blog-thumb">
                            <a href="blog.html">
                                <img src="<?= ROOT_URL ?>/assets/images/blog/medium-size/3.jpg" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="single-blog-content position-relative">
                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                <span>14</span>
                                <span>01</span>
                            </div>
                            <div class="post-meta">
                                <span class="author">Author: Obrien Demo Admin</span>
                            </div>
                            <h2 class="post-title">
                                <a href="blog.html">The Standard Chunk Of Lorem Ipsum Used Since</a>
                            </h2>
                            <p class="desc-content">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                roots in a piece of classical Latin literature from 45 BC, making...
                            </p>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="single-blog-thumb">
                            <a href="blog.html">
                                <img src="<?= ROOT_URL ?>/assets/images/blog/medium-size/4.jpg" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="single-blog-content position-relative">
                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                <span>14</span>
                                <span>01</span>
                            </div>
                            <div class="post-meta">
                                <span class="author">Author: Obrien Demo Admin</span>
                            </div>
                            <h2 class="post-title">
                                <a href="blog.html">There Are Many Variation of Passages of Lorem Ipsum
                                    Available</a>
                            </h2>
                            <p class="desc-content">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                roots in a piece of classical Latin literature from 45 BC, making...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest Blog Area End Here -->
<!-- Support Area Start Here -->
<div class="support-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="support-wrapper d-flex">
                    <div class="support-content">
                        <h1 class="title">Need Help ?</h1>
                        <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                    </div>
                    <div class="support-button d-flex align-items-center">
                        <a class="obrien-button primary-btn" href="contact-us.html">Contact now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>