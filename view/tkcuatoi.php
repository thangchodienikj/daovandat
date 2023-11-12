<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Tài khoản của tôi</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tài khoản của tôi</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Bảng điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Đơn đặt hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Chỉ tiết tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=dangxuat">Đăng xuất</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Xin chào <span class="font-weight-normal text-dark"><?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); echo $name ;} ?></span>
                                    <br>
                                    Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <a href="#tab-orders" class="tab-trigger-link link-underline">những đơn đặt hàng gần đây</a>, quản lý của bạn <a href="#tab-address" class="tab-trigger-link">
                                        địa chỉ giao hàng và thanh toán</a>, and <a href="#tab-account" class="tab-trigger-link">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Mã đơn hàng</th>
                                        <th scope="col" class="text-center">Ngày đặt hàng</th>
                                        <th scope="col" class="text-center">Số lượng mặt hàng</th>
                                        <th scope="col" class="text-center">Tổng khóa đơn</th>
                                        <th scope="col" class="text-center">Tình trạng đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listdh1 as $cart){
                                        extract($cart);
                                        $ht = $cart['tinhtrangdh'];
                                        switch ($ht){
                                            case "0" :
                                                $tt="Đơn hàng mới";
                                                break;
                                            case "1" :
                                                $tt="Đang xử lí";
                                                break;
                                            case "2" :
                                                $tt="Đang giao hàng";
                                                break;
                                            case "3" :
                                                $tt="Đã giao hàng";
                                                break;
                                            default:
                                                break;
                                        }
                                        echo ' <tr>
                                        <td class="text-center">'.$id.'</td>
                                        <td class="text-center">'.$ngaydathang.'</td>
                                        <td class="text-center">'.$soluong.'</td>
                                        <td class="text-center">'.$tongtien.'</td>
                                        <td class="text-center">'.$tt.'</td>
                                    </tr>';
                                    } ?>

                                    <!-- Các dòng khác có thể thêm tại đây và đặt lớp text-center tương tự -->
                                    </tbody>
                                </table>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Địa chỉ thanh toán</h3><!-- End .card-title -->
                                                <?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); ?>
                                                <p><?= $name ?><br>
                                                    <?= $sdt ?><br>
                                                    <?= $email ?><br>
                                                    <?php } ?>
                                                    <a href="#">Biên Tập<i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Địa chỉ giao hàng</h3><!-- End .card-title -->

                                                <p>Bạn chưa thiết lập loại địa chỉ này.<br>
                                                    <a href="#">Biên tập <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="index.php?act=capnhat" method="post">
                                    <?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); ?>
                                    <input type="hidden"  value="<?=$id?>" name="id" id="id">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tài khoản</label>
                                            <input type="text" class="form-control" value="<?=$taikhoan?>" name="tk" readonly >
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Mật khẩu</label>
                                            <input type="text" class="form-control" value="<?=$matkhau?>" name="mk" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Họ và Tên</label>
                                    <input type="text" class="form-control mb-2" value="<?=$name?>" name="name" >

                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control mb-2" value="<?=$dia_chi?>" name="diachi">

                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control mb-2" value="<?=$sdt?>" name="sdt">

                                    <label>Email</label>
                                    <input type="email" class="form-control mb-2" value="<?=$email?>" name="email">

                                    <input type="submit" class="btn btn-outline-primary-2" value="Cập nhật" name="capnhat">
                                </form>
                                <?php } ?>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->