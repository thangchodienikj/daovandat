
<ul class="top-menu">
    <li>
        <a href="#">Links</a>
        <ul>
            <?php if(isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']);
                if ($role == '1'){?>
                    <li><a href="../admin">Kênh bán hàng</a></li>
                <?php } }?>
            <li>
                <div class="header-dropdown">
                    <a href="#">Tiếng việt</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">Tiếng việt</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div>
            </li>
            <?php
            // Kiểm tra nếu người dùng đã đăng nhập
            if (isset($_SESSION['userxuong'])) {
                // Hiển thị nút "Tôi" và liên kết đến trang cá nhân
                echo '<li><a href="index.php?act=tkcuatoi">Tôi</a></li>';
            } else {
                // Hiển thị nút "Đăng nhập / Đăng ký"
                echo '<li><a href="index.php?aht=dndk">Đăng nhập / Đăng ký</a></li>';
            }
            ?>
        </ul>
    </li>
</ul><!-- End .top-menu -->

</div><!-- End .container -->
</div><!-- End .header-top -->

<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="index.html" class="logo">
                <img src="assets/images/demos/demo-4/logo.png" alt="Molla Logo" width="105" height="25">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label for="q" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>

        <div class="header-right">

            <div class="wishlist">
                <a href="wishlist.html" title="Wishlist">
                    <div class="icon">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count badge">3</span>
                    </div>
                    <p>Yêu thích</p>
                </a>
            </div><!-- End .Wishlist -->
            </div><!-- End .compare-dropdown -->

            <div class="dropdown cart-dropdown">
                <a href="" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <div class="icon">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">
                            <?php
                            $length = sizeof($loadgh);
                            echo $length;
                            ?>
                        </span>
                    </div>
                    <p style="font-family: Arial, sans-serif; font-size: 10px;">Giỏ hàng</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-cart-products">
                        <?php
                        $tong = 0;
                        foreach ($loadgh as $gh) {
                            extract($gh);
                            echo ' <div class="product">
                            <div class="product-cart-details">
                                <h4 class="product-title">
                                    <a href="product.html">'.$ten_sach.'</a>
                                </h4>
                                <span class="cart-product-info">
                                    <span class="cart-product-qty">'.$so_luong.'</span>
                                    x '.$gia_ca.'
                                </span>
                            </div><!-- End .product-cart-details -->
                            <figure class="product-image-container">
                                <a href="product.html" class="product-image">
                                    <img src="'.$hinh_anh.'" alt="product">
                                </a>
                            </figure>
                            <a href=index.php?act=xoaspgh&id='.$id.'" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                        </div><!-- End .product -->';
                            $tong = $tong + ($so_luong * $gia_ca);
                        }
                        echo '</div><!-- End .cart-product -->
                        <div class="dropdown-cart-total">
                            <span>Tổng tiền</span>
                            <span class="cart-total-price">'.$tong.'</span>
                        </div><!-- End .dropdown-cart-total -->';
                        ?>

                    <div class="dropdown-cart-action">
                        <a href="index.php?act=gh" class="btn btn-primary" >Giỏ hàng</a>
                    </div><!-- End .dropdown-cart-total -->
                </div><!-- End .dropdown-menu -->
            </div>
            <!-- End .cart-dropdown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->

<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <div class="dropdown category-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                    Danh mục <i class="icon-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                    <nav class="side-nav">
                        <?php
                        foreach ($listdm as $sp) {
                            extract($sp);
                            echo '<ul class="menu-vertical sf-arrows">
                                    <li><a href="index.php?act=danhmuc&&id='.$id.'">'.$ten_danh_muc.'</a></li>
                                </ul><!-- End .menu-vertical -->';
                        }
                        ?>
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .category-dropdown -->
        </div><!-- End .header-left -->

        <div class="header-center">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container ">
                        <a href="index.php" class="sf-with-ul">
                            Trang chủ</a>
                    </li>
                    <li>
                        <a href="index.php?act=sanpham" class="sf-with-ul">
                            Cửa hàng</a>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">
                            Sản phẩm</a>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">Hỗ trợ</a>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">Giải đáp</a>
                    </li>

                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->
        </div><!-- End .header-center -->

        <div class="header-right">
            <i class="la la-lightbulb-o"></i><p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
        </div>
    </div><!-- End .container -->
</div>
<!-- End .header-bottom -->
</header><!-- End .header -->
