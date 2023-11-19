<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My account</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    My account</li>
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
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">The order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">
                                    Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account details only</a>
                            </li>
                            <li class="nav-item">
                                <form action="index.php?act=dangxuat" method="post">

                                    <button class="nav-link" style="border: none ; background-color: white" type="submit">Log out</button>

                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>
                                    Hello <span class="font-weight-normal text-dark"><?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); echo $name ;} ?></span>
                                    <br>

                                    From your account dashboard you can view <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders
                                    </a>
                                    , your manager<a href="#tab-address" class="tab-trigger-link">
                                        shipping and billing address</a>, and <a href="#tab-account" class="tab-trigger-link">Edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center" colspan="2">
                                            Product</th>
                                        <th scope="col" class="text-center">
                                            Price</th>
                                        <th scope="col" class="text-center">
                                            Total single key</th>
                                        <th scope="col" class="text-center">
                                            Order status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listdh1 as $cart){
                                        extract($cart);
                                        $ht = $cart['tinhtrangdh'];
                                        switch ($ht){
                                            case "0" :
                                                $tt="New orders";
                                                break;
                                            case "1" :
                                                $tt="Order confirmation";
                                                break;
                                            case "2" :
                                                $tt="Delivering";
                                                break;
                                            case "3" :
                                                $tt="Delivered";
                                                break;
                                            default:
                                                break;
                                        }
                                        echo ' <tr>
                                    
                                        <td colspan="2" class="text-center" >'.$tensach.' x'.$soluong.'</td>
                                        <td class="text-center">'.$giaca.'</td>
                                        <td class="text-center">'.$tongtien.'</td>
                                        <td class="text-center">'.$tt.'</td>
                                     
                                    </tr>';
                                    } ?>

                                    <!-- Các dòng khác có thể thêm tại đây và đặt lớp text-center tương tự -->
                                    </tbody>
                                </table>
                            <div class="col-md-8 col-lg-3">
                                <a href="index.php?act=tinhtrang" class="btn btn-primary btn-block">
                                    Order details</a>
                            </div>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Payment address</h3><!-- End .card-title -->
                                                <?php if (isset($_SESSION['userxuong'])){ extract($_SESSION['userxuong']); ?>
                                                <p><?= $name ?><br>
                                                    <?= $sdt ?><br>
                                                    <?= $email ?><br>
                                                    <?php } ?>
                                                    <a href="#">
                                                        Editor<i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Delivery address</h3><!-- End .card-title -->

                                                <p>
                                                    You have not set up this type of address.<br>
                                                    <a href="#">
                                                        Editor <i class="icon-edit"></i></a></p>
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
                                            <label>Account</label>
                                            <input type="text" class="form-control" value="<?=$taikhoan?>" name="tk" readonly >
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Password</label>
                                            <input type="text" class="form-control" value="<?=$matkhau?>" name="mk" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>First and last name</label>
                                    <input type="text" class="form-control mb-2" value="<?=$name?>" name="name" >

                                    <label>Address</label>
                                    <input type="text" class="form-control mb-2" value="<?=$dia_chi?>" name="diachi">

                                    <label>
                                        Phone number</label>
                                    <input type="text" class="form-control mb-2" value="<?=$sdt?>" name="sdt">

                                    <label>Email</label>
                                    <input type="email" class="form-control mb-2" value="<?=$email?>" name="email">

                                    <input type="submit" class="btn btn-outline-primary-2" value="Update" name="capnhat">
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