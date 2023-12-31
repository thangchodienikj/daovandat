<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
             data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            <div class="intro-slide" style="background-image: url(assets/images/anh3.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle" style="color: #907777">
                                Hàng mới về</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title" style="color: #e6837b">
                                Siêu bán<br> Mùa đông
                            </h1>
                            <div class="intro-price">
                                <sup>Hôm nay :</sup>
                                <span class="text-primary">
                                            $234<sup>000</sup>
                                        </span>
                            </div><!-- End .intro-price -->
                           <a href="index.php?act=danhmuc" class="btn btn-primary btn-round">
                                <span>Mua ngay</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url(assets/images/anh2.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle" style="color: #907777">
                                Hàng mới về</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title" style="color: #e6837b">
                                Siêu bán<br> Mùa hè
                            </h1>
                            <div class="intro-price">
                                <sup>Hôm nay :</sup>
                                <span class="text-primary">
                                            $234<sup>000</sup>
                                        </span>
                            </div><!-- End .intro-price -->

                            <a href="index.php?act=danhmuc" class="btn btn-primary btn-round">
                                <span>Mua ngay</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <div class="intro-slide" style="background-image: url(assets/images/anh1.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle" style="color: #907777">
                                Hàng mới về</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title" style="color: #e6837b">
                                Siêu bán<br> Mùa thu
                            </h1>
                            <div class="intro-price">
                                <sup>Hôm nay :</sup>
                                <span class="text-primary">
                                            $234<sup>000</sup>
                                        </span>
                            </div><!-- End .intro-price -->

                            <a href="index.php?act=danhmuc" class="btn btn-primary btn-round">
                                <span>Mua ngay</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <div class="intro-slide" style="background-image: url(assets/images/anh4.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle" style="color: #907777">
                                Hàng mới về</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title" style="color: #e6837b">
                                Siêu bán<br> Mùa đông
                            </h1>
                            <div class="intro-price">
                                <sup>Hôm nay :</sup>
                                <span class="text-primary">
                                            $234<sup>000</sup>
                                        </span>
                            </div><!-- End .intro-price -->

                            <a href="index.php?act=danhmuc" class="btn btn-primary btn-round">
                                <span>Mua ngay</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <h2 class="title text-center mb-4">Khám phá các danh mục phổ biến</h2><!-- End .title text-center -->

        <div class="cat-blocks-container">
            <div class="row justify-content-center " >
                <?php foreach ( $list6dm as $sp ){
                    extract($sp);
                    echo ' <div class="col-6 col-sm-4 col-lg-2">
                    <a href="index.php?act=danhmuc&idpro='.$id.'" class="cat-block">
                        <figure>
                                    <span>
                                        <img src="'.$img.'" alt="Category image" style="max-width: 100%; max-height: 150px;">
                                    </span>
                        </figure>

                        <h3 class="cat-block-title">'.$ten_danh_muc.'</h3><!-- End .cat-block-title -->
                    </a>
                </div>';
                } ?>
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($list3sp as $sp){
                extract($sp);
                echo '<div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="index.php?act=sanphamct&idpro='.$id.'" style="background-color: #fcf5f4">
                        <img src="'.$img.'" alt="Banner" class="img-fluid " style="max-width: 40%; max-height: 150px;margin-left: 228px " >
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Ưu đãi thông minh</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="">Giá '.$price.' $ <br> <strong>'.$name.'</strong></a></h3><!-- End .banner-title -->
                        <a href="index.php?act=sanphamct&idpro='.$id.'" class="banner-link">Mua ngay<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div>';
            } ?>
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-5 -->
    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
            <img src="assets/images/anh11.png" alt="camera" class="cta-img" style="height: 150px; width: 150px;margin-top: 5px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>
                                Mua sắm với ưu đãi hôm nay<br><strong>
                                    Tuyệt vời được thực hiện dễ dàng.
                                    Lại là áo hoodie</strong></p>
                        </div><!-- End .cta-text -->
                       <a href="index.php?act=danhmuc" class="btn btn-primary btn-round">
                                <span>Mua ngay - $329</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                    </div><!-- End .cta-content -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title"> Ưu đãi & Cửa hàng</h2><!-- End .title -->
            <p class="title-desc">Ưu đãi hôm nay và hơn thế nữa</p><!-- End .title-desc -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('assets/images/anh13.png');">
                    <div class="deal-top">
                        <h2>Thỏa thuận trong ngày.</h2>
                        <h4>Khối lượng hạn chế. </h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html"> Áo phao nam 3 lớp mặc được 2 mặt dày dặn siêu ấm kiểu hàn quốc</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$129.00</span>
                            <span class="old-price">đã từng là $150.99</span>
                        </div><!-- End .product-price -->
                        <a href="index.php?act=danhmuc" class="btn btn-link">
                                <span>Mua sắm nhiều hơn</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('assets/images/anh15.png');">
                    <div class="deal-top">
                        <h2>Ưu đãi độc quyền của bạn.</h2>
                        <h4>Đăng nhập để xem ưu đãi hấp dẫn.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Áo hoodie dây kéo unisex cho nam và nữ Cotton BRIERLY</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$29.99</span>
                        </div><!-- End .product-price -->
                       <a href="index.php?act=danhmuc" class="btn btn-link">
                                <span>>Đăng nhập và tiết kiệm tiền</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="more-container text-center mt-1 mb-5">
            <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Mua thêm ưu đãi của Outlet</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->

    <div class="container">
        <hr class="mb-0">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl"
             data-owl-options='{
                        "nav": false,
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
            <a href="#" class="brand">
                <img src="assets/images/brands/1.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/2.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/3.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/4.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/5.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/6.png" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
    <div class="mb-5"></div><!-- End .mb-5 -->

    <div class="container for-you">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Khuyến nghị dành cho bạn</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="#" class="title-link">
                    Xem tất cả đề xuất  <i class="icon-long-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="products">
            <div class="row ">
                <?php foreach ($list8sp as $sp) {
                    extract($sp);
                        echo ' <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-2">
                        <figure class="product-media">
                            <span class="product-label label-circle label-sale">Sale</span>
                            <a href="index.php?act=sanphamct&idpro=' . $sp['id'] . '">
                                <img src="' . $sp['image'] . '" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                            ';
                            if (isset($_SESSION['userxuong'])) {
                                extract($_SESSION['userxuong']);
                                echo '
                                    <a  href="index.php?act=spyeuthich&id=' . $sp['id'] . '&idtk=' . $_SESSION['userxuong']['id'] . '" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                    ';
                            }
                              echo '
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="index.php?aht=dndk" class="btn-product" ><span>Xem chi tiết</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                         <div class="product-body">
                            <div class="product-cat">
                         ';

                            foreach ($listdm as $dm) {
                                extract($dm);
                                if ($dm['id'] == $sp['loai']) {
                                    $danhmuc = $dm['ten_danh_muc'];
                                    echo ' <a href="#">'.$danhmuc.'</a>';
                                }
                            }
                         echo '
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">'.$sp['name'].'</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price"> $ '.$sp['gia'].'</span>
                                <span class="old-price"></span>
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->';
                }?>

            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->

</main><!-- End .main -->

