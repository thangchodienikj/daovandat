<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Tài khoản của tôi</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tài khoản của tôi</li>
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
                                <a class="nav-link  " id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">
                                    Bảng điều khiển</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">Đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">
                                    Địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Chi tiết tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <form action="index.php?act=dangxuat" method="post">

                                    <button class="nav-link" style="border: none ; background-color: white" type="submit">Đăng xuất</button>

                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade " id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>
                                    Xin chào  <span class="font-weight-normal text-dark"><?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); echo $name ;} ?></span>
                                    <br>Bảng điều khiển tài khoản của bạn, bạn có thể xem <a href="#tab-orders" class="tab-trigger-link link-underline">những đơn đặt hàng gần đây </a>, người quản lý của bạn<a href="#tab-address" class="tab-trigger-link">
                                    địa chỉ giao hàng và thanh toán</a>, và <a href="#tab-account" class="tab-trigger-link">Chỉnh sửa mật khẩu và chi tiết tài khoản của bạn</a>.</p>
                            </div><!-- .End .tab-pane -->
                            <?php if (isset($_SESSION['userxuong'])){
                            extract($_SESSION['userxuong']); ?>
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <div class="d-flex justify-content-between">
                                    <a href="index.php?act=choxacnhan" class="btn btn-primary">
                                        Chờ xác nhận
                                    </a>
                                    <a href="index.php?act=xacnhandon" class="btn btn-primary">
                                        Đơn xác nhận
                                    </a>
                                    <a href="index.php?act=danggiao" class="btn btn-primary">
                                        Đang giao hàng
                                    </a>
                                    <a href="index.php?act=giaothanhcong" class="btn btn-primary">
                                        Giao thành công
                                    </a>
                                    <a href="index.php?act=donhuy" class="btn btn-primary">
                                        Đơn hủy
                                    </a>
                                </div>
                                <?php } ?>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr><th scope="col" class="text-center" >
                                            Hình ảnh</th>
                                        <th scope="col" class="text-center" colspan="2">
                                            Sản phẩm</th>
                                        <th scope="col" class="text-center">
                                            Giá</th>
                                        <th scope="col" class="text-center">
                                            Tổng tiền</th>
                                        <th scope="col" class="text-center">
                                           Trang thái</th>
                                        <th scope="col" class="text-center">
                                            Thao tác</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listdh1 as $cart){
                                        extract($cart);
                                        $ht = $cart['tinhtrangdh'];
                                        switch ($ht){
                                            case "0" :
                                                $tt="Chờ xác nhận";
                                                break;
                                            case "1" :
                                                $tt="Xác nhận đơn hàng";
                                                break;
                                            case "2" :
                                                $tt="Đang giao hàng";
                                                break;
                                            case "3" :
                                                $tt="Đã giao hàng";
                                                break;
                                            case "4" :
                                                $tt="Hủy đơn hàng";
                                                break;
                                            default:
                                                break;
                                        }
                                        $hinhanh = '<img src="'.$img.'" alt="Mô tả hình ảnh">';
                                        echo ' <tr>
                                        <td class="text-center" style="width: 100px;height: 100px"><a href="index.php?act=sanphamct&idpro='.$cart['idsp'].'">'.$hinhanh.'</a></td>
                                        <td colspan="2" class="text-center" >'.$name.' x '.$soluong.'</td>
                                        <td class="text-center">'.$price.'</td>
                                        <td class="text-center">'.$t=$tongtien+$ptvc.'</td>
                                        <td class="text-center">'.$tt.'</td>
                                        <td class="col-md-1 text-center">
                                             ';
                                            if ( $cart['tinhtrangdh'] == 0){
                                                echo'   <a href="index.php?act=tinhtrang&id='.$id.'&tinhtrangdh=4" class="btn btn-danger btn-block">Hủy đơn</a>
                                                        <a href="index.php?act=chitiet&id='.$id.'" class="btn btn-primary btn-block ">Chi tiết</a>';
                                            }
                                            if ( $cart['tinhtrangdh'] == 1){
                                                echo'<a href="index.php?act=chitiet&id='.$id.'" class="btn btn-primary btn-block ">Chi tiết</a>';
                                            }
                                            if ( $cart['tinhtrangdh'] == 2){
                                                echo'   <a href="index.php?act=tinhtrang&id=' . $id . '&tinhtrangdh=3&tinhtrangdm=1" class="btn btn-primary btn-block ">Đã nhận</a>
                                                        <a href="index.php?act=chitiet&id='.$id.'" class="btn btn-primary btn-block ">Chi tiết</a>';
                                            }
                                            if ( $cart['tinhtrangdh'] == 3){
                                                echo'   <a href="index.php?act=chitiet&id='.$id.'" class="btn btn-primary btn-block ">Chi tiết</a>';
                                            }
                                            if ( $cart['tinhtrangdh'] == 4){
                                                echo' <a href="index.php?act=chitiet&id='.$id.'" class="btn btn-primary btn-block ">Chi tiết</a>';
                                            }
                                            echo'
                                        </td>
                                    </tr>';
                                    } ?>

                                    <!-- Các dòng khác có thể thêm tại đây và đặt lớp text-center tương tự -->
                                    </tbody>
                                </table>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>Các địa chỉ sau sẽ được sử dụng trên trang thanh toán theo mặc định.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Địa chỉ giao hàng</h3><!-- End .card-title -->
                                                <?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); ?>
                                                <p><?= $name ?><br>
                                                    <?= $sdt ?><br>
                                                    <?= $email ?><br>
                                                    <?php } ?>
                                                    <a href="#">
                                                        Chỉnh sửa<i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">

                                                    Địa chỉ giao hàng</h3><!-- End .card-title -->

                                                <p>
                                                    Bạn chưa thiết lập loại địa chỉ này.<br>
                                                    <a href="#">

                                                        Chỉnh sửa <i class="icon-edit"></i></a></p>
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
                                            <input type="text" class="form-control mb-2" value="<?=$taikhoan?>" name="tk">
                                            <span style="color: red;"><?php echo isset($_SESSION['error']['tk']) ? $_SESSION['error']['tk'] : ''; ?></span>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Mật khẩu</label>
                                            <input type="password" class="form-control mb-2" value="<?=$matkhau?>" name="mk">
                                            <span style="color: red;"><?php echo isset($_SESSION['error']['mk']) ? $_SESSION['error']['mk'] : ''; ?></span>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="form-group">
                                        <label for="name">Họ và tên:</label>
                                        <input type="text" class="form-control mb-2" value="<?=$name?>" name="name" >
                                        <span style="color: red;"><?php echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : ''; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="diachi">Địa chỉ:</label>
                                        <input type="text" class="form-control mb-2" value="<?=$dia_chi?>" name="diachi">
                                        <span style="color: red;"><?php echo isset($_SESSION['error']['diachi']) ? $_SESSION['error']['diachi'] : ''; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="sdt">Số điện thoại:</label>
                                        <input type="text" class="form-control mb-2" value="<?=$sdt?>" name="sdt">
                                        <span style="color: red;"><?php echo isset($_SESSION['error']['sdt']) ? $_SESSION['error']['sdt'] : ''; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control mb-2" value="<?=$email?>" name="email">
                                        <span style="color: red;"><?php echo isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : ''; ?></span>
                                    </div>

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
<?php unset($_SESSION['error'])?>