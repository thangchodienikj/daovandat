<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">
                Sản phẩm yêu thích<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Tình trạng tồn kho</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($spyt as $yt){
                    extract($yt);
                    echo '<tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="index.php?act=sanphamct&idpro='.$idsp.'">
                                    <img src="'.$img.'" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="index.php?act=sanphamct&idpro='.$id.'">'.$name.'</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">'.$price.'</td>
                    <td class="stock-col"><span class="in-stock">Trong kho</span></td>
                    <td class="action-col">
                        <div class="dropdown">
                            <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-list-alt"></i>Lựa chọn các phương án
                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Lựa chọn đầu tiên</a>
                                <a class="dropdown-item" href="#">Một lựa chọn khác</a>
                                <a class="dropdown-item" href="#">Sự lựa chọn tốt nhất</a>
                            </div>
                        </div>
                    </td>
                    <td class="remove-col"><a href="index.php?act=xoaspyt&id='.$id.'"><button class="btn-remove"><i class="icon-close"></i></button></a></td>
                </tr>';
                } ?>
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">
                        Chia sẻ:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main