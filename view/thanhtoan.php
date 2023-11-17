<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">
                Pay</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=giohang">Giỏ hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <input type="text" class="form-control" required id="checkout-discount-input">
                    <label for="checkout-discount-input" class="text-truncate">Có mã giảm giá ? <span>Nhập mã giảm giá</span></label>
                </div><!-- End .checkout-discount -->
                <form action="index.php?act=khoadon" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 class="checkout-title">
                                Chi tiết thanh toán</h2><!-- End .checkout-title -->
                            <?php if (isset($_SESSION['userxuong'])){
                                extract($_SESSION['userxuong']);
                                ?>
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" value="<?=$name?>" name="name" required>

                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" value="<?=$dia_chi?>" name="diachi" required>

                                <label>Email</label>
                                <input type="email" class="form-control" value="<?=$email?>" name="email" required>

                                <label>Số điện thoại</label>
                                <input type="text" class="form-control"  value="<?=$sdt?>" name="sdt" required>
                                <?php
                            } ?>
                            <label>
                                Ghi chú đơn hàng (tùy chọn)</label>
                            <textarea name="ghichu" class="form-control" cols="30" rows="4" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-8">
                            <div class="summary">
                                <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->
                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Màu</th>
                                        <th>Size</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($loadgh as $gh){
                                        extract($gh);
                                        echo '
                                      
                                        <tr>
                                        <td><a href="#">'.$ten_sach.' x '.$so_luong.'</a></td>                                      
                                        <td>'.$gia_ca.'</td>
                                        <td >'.$mau.'</td>
                                        <td>'.$sizesp.'</td>
                                        <td><a href="#">'.$thanhtien.'</a></td>                                       
                                    </tr>';
                                    } ?>
                                    <tr class="summary-subtotal">
                                        <td>Tổng phụ:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $tong?></td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>PTVC:</td>
                                    </tr>

                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="phuong_thuc_thanhtoan" class="custom-control-input" value="Chuyển khoản trực tiếp" id="nhanh" >
                                            <label class="custom-control-label" for="nhanh">Chuyển khoản trực tiếp</label>
                                        </div><!-- End .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="phuong_thuc_thanhtoan" class="custom-control-input" value="Thanh toán khi nhận hàng" id="cham">
                                            <label class="custom-control-label" for="cham">Thanh toán khi nhận hàng</label>
                                        </div><!-- End .custom-control -->
                                    </div><!-- End .card -->
                                    <input name="dathang" type="submit" class="btn btn-outline-primary-2 btn-order btn-block" value="Đặt hàng">
                </form>
            </div><!-- End .summary -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
    </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
