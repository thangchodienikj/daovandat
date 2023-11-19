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
                <li class="breadcrumb-item"><a href="index.php?act=giohang">
                        Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pay</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <input type="text" class="form-control" required id="checkout-discount-input">
                    <label for="checkout-discount-input" class="text-truncate">
                        There is a discount code ? <span>
Enter discount code</span></label>
                </div><!-- End .checkout-discount -->
                <form action="index.php?act=khoadon" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 class="checkout-title">
                                Payment details </h2><!-- End .checkout-title -->
                            <?php if (isset($_SESSION['userxuong'])){
                                extract($_SESSION['userxuong']);
                                ?>
                                <label>Name</label>
                                <input type="text" class="form-control" value="<?=$name?>" name="name" required>

                                <label>Address</label>
                                <input type="text" class="form-control" value="<?=$dia_chi?>" name="diachi" required>

                                <label>Email</label>
                                <input type="email" class="form-control" value="<?=$email?>" name="email" required>

                                <label>Phone number</label>
                                <input type="text" class="form-control"  value="<?=$sdt?>" name="sdt" required>
                                <?php
                            } ?>
                            <label>

                                Order notes (optional)</label>
                            <textarea name="ghichu" class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes on delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-8">
                            <div class="summary">
                                <h3 class="summary-title">
                                    Your order</h3><!-- End .summary-title -->
                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listgh as $gh){
                                        extract($gh);
                                        echo '
                                        <tr>
                                        <td><a href="#">'.$ten_sach.' x '.$so_luong.'</a></td>                                      
                                        <td>'.$gia_ca.'</td>
                                        <td >'.$mau.'</td>
                                        <td>'.$sizesp.'</td>
                                        <td><a href="#">'.$thanhtien.'$</a></td>                                       
                                    </tr>';
                                    } ?>
                                    <tr class="summary-subtotal">
                                        <td>
                                            Subtotal:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $tong?> $</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>
                                            Shipping method : </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><select class="form-select" name="phuong_thuc_vanchuyen" id="phuong_thuc_vanchuyen">
                                                <option value="30000">
                                                    Fast Shipping</option>
                                                <option value="10000">Slow shipping</option>
                                            </select></td>
                                    </tr >
                                    <tr >
                                        <td>
                                            Transport fee :</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td id="phi_vanchuyen"><?php echo 30000; ?> $</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-subtotal">
                                        <td>
                                            Total amount:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td id="tong_tien"><?php echo $tongtien=$tong+30000; ?> $</td>
                                    </tr><!-- End .summary-subtotal -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="phuong_thuc_thanhtoan" class="custom-control-input" value="Direct transfer" id="nhanh" >
                                            <label class="custom-control-label" for="nhanh">
                                                Direct transfer</label>
                                        </div><!-- End .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="phuong_thuc_thanhtoan" class="custom-control-input" value="Payment on delivery" id="cham">
                                            <label class="custom-control-label" for="cham">
                                                Payment on delivery</label>
                                        </div><!-- End .custom-control -->
                                    </div><!-- End .card -->
                                    <input name="dathang" type="submit" class="btn btn-outline-primary-2 btn-order btn-block" value="Order">
                        </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                </form>
        </div><!-- End .row -->
    </div><!-- End .container -->
    </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script>
    // Add a script to update the shipping cost and total amount when the shipping method changes
    document.getElementById('phuong_thuc_vanchuyen').addEventListener('change', function () {
        var shippingCost = parseInt(this.value);
        document.getElementById('phi_vanchuyen').textContent = shippingCost;
        var totalAmount = <?php echo $tong; ?> + shippingCost;
        document.getElementById('tong_tien').textContent = totalAmount;

    });
</script>