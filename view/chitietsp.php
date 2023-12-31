<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="">Cửa hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm chi tiết</li>
            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <?php  foreach ($loadsp as $sp){
                    extract($sp);
                    echo ' <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="'.$img.'" alt="product image" style="height: 549px">
                                </figure><!-- End .product-main-image -->
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                ';
                                    $array = explode(',', $productImageList);
                                    foreach ($array as $anh){
                                        echo '
                                             <a class="product-gallery-item " href="#" data-image="'.$anh.'" >
                                                <img src="' . $anh . '" alt="product side">
                                            </a>';
                                    }
                                    echo'
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">'.$ProductName.'</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                              $  '.$price.'
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>'.$mieuta.'</p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label>Màu:</label>
                                <div class="product-nav product-nav-thumbs" id="colorOptions" >
                                ';
                                    $array = explode(',', $colorList);
                                        foreach ($array as $color) {
                                            echo '<a href="javascript:void(0);" class="color-option" onclick="get_quantity(\'' . $color . '\',null)"  style="width: 80px; height: 30px; text-align: center; display: inline-block; line-height: 27px; color: #747774;background-color: #eaeaea;">
                                            ' . $color . '
                                      </a>';
                                    }
                                    echo isset($_SESSION['error']['mau']) ? '<p class="color-option" style="width: 80px" le>' . $_SESSION['error']['mau'] . '</p>' : '';
                                    echo'
                                </div><!-- End .product-nav -->
                            </div><!-- End .details-filter-row -->

                            <div class="details-filter-row details-row-size" id="colorOptions">
                                <label for="size">Size:</label>
                                <div class="product-nav product-nav-thumbs">
                                ';

                                    $array = explode(',', $sizeList);
                                    foreach ($array as $size){
                                        echo '<a href="javascript:void(0);" class="size-option" onclick="get_quantity(null,\'' . $size . '\')" style="width: 80px; height: 30px; text-align: center; display: inline-block; line-height: 29px; color: #747774 ;background-color: #eaeaea">
                                                ' . $size . '
                                              </a>';
                                    }
                                     echo isset($_SESSION['error']['size']) ? '<p class="color-option" style="width: 80px" >' . $_SESSION['error']['size'] . '</p>' : '';
                                echo'
                                </div><!-- End .select-custom -->
                            </div><!-- End .details-filter-row -->
                            ';

                                echo '<div class="details-filter-row details-row-size" >
                                <label> Số lượng  : </label>
                                <p  id="quantity"></p> 
                            </div><!-- End .details-filter-row -->';

                                    echo'
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Số lượng:</label>
                                <form action="index.php?act=gh" method="post">
                                 <div class="product-details-quantity">
                                    <input type="number" name="soluong" class="form-control" value="1" min="1" max="" step="1" data-decimals="0" required>
                                </div><!-- Kết thúc .product-details-quantity -->
                            </div><!-- End .details-filter-row -->
                             <div class="details-filter-row details-row-size">
                                    <input type="hidden"  name="idsp" value="'.$ProductID.'">
                                    ';
                                    if (isset($_SESSION['userxuong'])){
                                    echo'
                                    <input type="hidden"  name="idtk" value="'.$_SESSION['userxuong']['id'].'">
                                    <input type="hidden"  name="name" value="'.$ProductName.'">
                                    <input type="hidden" name="giaca" value="'.$price.'">
                                    <input type="hidden" name="mota" value="'.$mieuta.'">
                                    <input type="hidden" name="hinh" value="'.$img.'">
                                    <input type="hidden" name="selected_size" id="selectedSize" value="">
                                    <input type="hidden" name="selected_color" id="selectedColor" value="">
                            <div class="product-details-action">
                                <input type="submit" class="btn btn-cart btn-outline-primary" value="Thêm vào giỏ hàng" name="giohang" style="line-height: 10px;border: 1px solid #3399ff; font-size: 14px; font-family: inherit;">
                                <div class="details-action-wrapper">
                                    <a href="index.php?act=spyeuthich&id=' . $ProductID . '&idtk=' . $_SESSION['userxuong']['id'] . '" class="btn-product btn-wishlist" title="Wishlist"><span>Yêu thích</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- Kết thúc .product-details-action --> 
                                </form>
                                ';
                                    }else{
                                        echo ' 
                                <div class="product-details-action">
                                    <input type="submit" class="btn btn-cart btn-outline-primary" value="Thêm vào giỏ hàng" name="giohang" style="line-height: 10px;border: 1px solid #3399ff; font-size: 14px; font-family: inherit;">
                                    <div class="details-action-wrapper">
                                        <a href="index.php?act=spyeuthich" class="btn-product btn-wishlist" title="Wishlist"><span>Yêu thích</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- Kết thúc .product-details-action -->
                                </form>';
                                    }
                              echo'
                                <form action="index.php?act=binhluan&idpro='.$id_pro.'" method="post">
                            </div><!-- End .product-details-action -->       
                                             
                        
                            <div class="product-details-footer">
                             <span>Màu sắc : </span> 
                                <div class="product-cat">
                                    ';
                                        $array = explode(',', $colorList);
                                        foreach ($array as $color) {
                                            echo '<a style="width: 80px; height: 30px; text-align: center; display: inline-block; line-height: 31px; color: #747774">
                                            ' . $color . '
                                          </a>';
                                        }
                                    echo'
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Chia sẻ:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->';
                } ?>
            </div><!-- End .product-details-top -->
            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">

                            Bình luận </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Thông tin thêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">
                            Vận chuyển & Trả hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Sự miêu tả</a>
                    </li>
                </ul>
                <style>
                    /* Add your styles here */
                    .review-container {
                        height: 300px; /* Set the desired height */
                        overflow-y: auto; /* Enable vertical scrollbar when content overflows */
                        padding: 10px; /* Optional: Add padding for better spacing */
                    }

                </style>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="reviews">
                            <h3>
                                Bình luận</h3>
                            <div class="review-container">
                                <?php foreach ($binhluan as $bl) {
                                    extract($bl);
                                    echo '<div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#" style=" font-size: 18px;">'.$taikhoan.'</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date" style=" font-size: 15px;">'.$ngaybinhluan.'</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4 style=" font-size: 15px;">'.$camnhan.'</h4>
                        
                                        <div class="review-content">
                                            <p style=" font-size: 15px;">'.$danhgia.'</p>
                                        </div><!-- End .review-content -->
                        
                                     
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row --><br>';
                                } ?>
                            </div><!-- End .review-container -->
                            <br>
                            <br>
                            <div class="comment-form">
                                <h3>
                                    Thêm một bình luận</h3>
                                <!-- You can specify the actual form action attribute -->
                                <?php if (isset($_SESSION['userxuong'])){
                                    extract($_SESSION['userxuong']);
                                    echo '
                                        <input type="hidden" name="name" value="'.$taikhoan.'">';
                                } ?>

                                <div class="form-row">
                                    <label class="form-group col-2 ">
                                        Đánh giá :</label><br>
                                    <div class="form-group col-8">
                                        <div class="form-check col-3 form-check-inline">
                                            <input type="radio" id="rating-good" name="rating" value="Rất tuyệt" class="form-check-input" required>
                                            <label for="rating-good" class="form-check-label">
                                                Rất tuyệt</label>
                                        </div>
                                        <div class="form-check col-3 form-check-inline">
                                            <input type="radio" id="rating-normal" name="rating" value="Bình thường" class="form-check-input" required>
                                            <label for="rating-normal" class="form-check-label">
                                                Bình thường</label>
                                        </div>
                                        <div class="form-check col-3 form-check-inline">
                                            <input type="radio" id="rating-bad" name="rating" value="Tệ" class="form-check-input" required>
                                            <label for="rating-bad" class="form-check-label">
                                                Tệ</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="comment-text">
                                    Bình luận của bạn:</label>
                                <div class="form-row">
                                    <div class="form-group col-10">
                                        <input id="comment-text" name="binhluan" class="form-control" required>
                                    </div>
                                    <div class="form-group col-0">
                                        <?php if (isset($_SESSION['userxuong'])){
                                            extract($_SESSION['userxuong']);
                                            echo '<input type="submit" class="btn btn-primary" value="Đăng một bình luận" name="gui">';
                                        }else{
                                            echo '<input type="submit" class="btn btn-primary disabled" value="Đăng một bình luận" name="gui">';
                                        } ?>
                                    </div>
                                </div>
                                </form>
                            </div><!-- End .comment-form -->
                        </div><!-- End .reviews -->

                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Thông tin</h3>
                            <p>Sản phẩm với thiết kế mới phụ hợp với cả nam và nữ, mang lại cảm nhác mới là và thích thú cho cách phối đồ chuẩn hàn quốc</p>

                            <h3>Chất liệu & chăm sóc</h3>
                            <ul>
                                <li>Vải faux suede</li>
                                <li>Tay nắm kim loại màu vàng</li>
                                <li>Thương hiệu RI</li>
                                <li>Lớp lót in họa tiết da rắn bên trong</li>
                                <li>Dây đeo chéo có thể điều chỉnh</li>
                                <li>Chiều cao: 31cm; Chiều rộng: 32cm; Độ sâu: 12cm; Chiều dài tay nắm: 61cm</li>
                            </ul>

                            <h3>Kích thước</h3>
                            <p>size duy nhất</p>
                        </div><!-- Kết thúc .product-desc-content -->

                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Giao hàng & đổi trả</h3>
                            <p>Chúng tôi giao hàng đến hơn 100 quốc gia trên toàn thế giới. Để biết đầy đủ chi tiết về các tùy chọn giao hàng mà chúng tôi cung cấp, vui lòng xem thông tin <a href="#">Giao hàng</a><br>
                                Chúng tôi hy vọng bạn sẽ yêu thích mỗi đơn đặt hàng, nhưng nếu bạn cần trả lại một sản phẩm, bạn có thể làm điều đó trong vòng một tháng kể từ ngày nhận hàng. Để biết đầy đủ chi tiết về cách thức đổi trả, vui lòng xem thông tin <a href="#">Đổi trả</a></p>
                        </div><!-- Kết thúc .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                            <ul>
                                <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                <li>Vivamus finibus vel mauris ut vehicula.</li>
                                <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                            </ul>

                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                        </div><!-- End .product-desc-content -->

                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
            <h2 class="title text-center mb-4">Bạn cũng có thể thích</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                <?php foreach ($list8sp as $sp) {
                    extract($sp);
                    echo ' <div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="index.php?act=sanphamct&idpro=' . $sp['id'] . '">
                            <img src="' . $sp['image'] . '" alt="Product image" class="product-image">
                        </a>
                        <div class="product-action-vertical">
                        ';
                    if (isset($_SESSION['userxuong'])) {
                        extract($_SESSION['userxuong']);
                        echo '
                           <a  href="index.php?act=spyeuthich&id=' . $sp['id'] . '&idtk=' . $_SESSION['userxuong']['id'] . '&img=' . $sp['image'] . '&name=' . $sp['name'] . '&price=' . $sp['gia'] . '" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                           ';
                    }
                    echo'

                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="index.php?act=sanphamct&idpro=' . $sp['id'] . '" class="btn-product "><span>
                                Xem chi tiết</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        ';
                    foreach ($listdm as $dm) {
                        extract($dm);
                        if ($dm['id'] == $sp['loai']) {
                            $danhmuc = $dm['ten_danh_muc'];
                            echo ' <a href="#">'.$danhmuc.'</a>';
                        }
                    }
                    echo '
                        <h3 class="product-title">'.$sp['name'].'</h3><!-- End .product-title -->
                        <div class="product-price">
                            $ '.$price.'
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                             <div class="product-nav product-nav-thumbs">
                                ';
                                    $limit = 3;
                                    $count = 0;
                                    $array = explode(',',$imagesphu);
                                    foreach ($array as $anh){
                                        if ($count >= $limit) {
                                            break;
                                        }
                                        echo ' <a href="#" class="active">
                                                        <img src="' . $anh . '" alt="product desc" style="width: 40px; height: 40px">
                                                    </a>';
                                        $count++;
                                    }
                                echo '             
                            </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->';
                }?>

            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<?php unset($_SESSION['error'])?>
<script>
    let curSize=document.getElementById('selectedSize').value;
    let curColor=document.getElementById('selectedColor').value;
    function get_quantity(sizeId,colorId){
        const urlParams = new URLSearchParams(window.location.search);
        const idproValue = urlParams.get('idpro');
        if (sizeId!==null){
            curSize=sizeId
        }
        if (colorId!==null){
           curColor = colorId;
        }
        if (curSize && curColor){
            $.ajax({
                type: "POST",
                url: "../model/sanpham.php",
                data: {
                    action:"get_product_quantity",
                    idpro:idproValue,
                    mau: curColor,
                    size: curSize,
                },
                success: function(response) {
                    let responseObject = JSON.parse(response);
                    let quantityValue = responseObject.quantity.soluong;
                    document.getElementById('quantity').innerText = quantityValue;
                    $('input[name="soluong"]').attr('max',quantityValue );
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Lỗi");
                }
            });
        }
    }
</script>
<script>
    document.querySelectorAll('.size-option').forEach(function(option) {
        option.addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('selectedSize').value = event.target.innerText;
        });
    });

    document.querySelectorAll('.color-option').forEach(function(option) {
        option.addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('selectedColor').value = event.target.innerText;
        });
    });
</script>



