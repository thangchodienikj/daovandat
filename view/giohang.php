<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Cart<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <tbody>
                            <tr>
                                <td>
                                    Product's name</td>
                                <td>
                                    Color</td>
                                <td>
                                    Size</td>
                                <td>
                                    Price</td>
                                <td>
                                    Quantity</td>
                                <td>
                                    Into money</td>
                            </tr>

                            <?php
                            $tong=0 ; foreach ($listgh as $gh) {
                                extract($gh);
                                echo '
                            <tr id="'.$id.'">
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="'.$hinh_anh.'" alt="Product image">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a >'.$ten_sach.'</a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                               <td class="price-col" data-type="mau">'.$mau.'</td>
                                <td class="price-col" data-type="size">'.$sizesp.'</td>
                                <td class="price-col" data-type="gia_ca">'.$gia_ca.'</td>
                               
                                <td class="quantity-col">
                                    <div class="cart-product-quantity">
                                        <input type="number" name="tang_so_luong" class="form-control pd-'.$id.'" value="'.$so_luong.'" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col pd-'.$id.'">'.$thanhtien.' </td>
                                <td class="remove-col"><a href="index.php?act=xoaspgh&id='.$id.'"><i class="icon-close"></i></a></td>
                            </tr>
                            ';
                                $tong = $tong+ $thanhtien;
                            };?>
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control"  placeholder="Discount code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">
                                Total cart</h3><!-- End .summary-title -->
                            <table class="table table-summary">
                                <tbody>
                                <tr class="summary-subtotal">
                                    <td>Total amount:</td>
                                    <td id="subtotal"><?=$tong?> </td>
                                </tr><!-- End .summary-subtotal -->


                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="index.php?act=thanhtoan" class="btn btn-outline-primary-2 btn-order btn-block" style="font-size: 15px">Thanh toán</a>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->



<!--lắng nghe thay đổi trên đơn hàng và sau đó thay đổi trên db-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let quantityInputs = document.querySelectorAll('input[name="tang_so_luong"]');
        let subtotalElement = document.getElementById('subtotal');// theo id

        quantityInputs.forEach(function(input) {
            input.addEventListener("change", function(event) {
                let newValue = event.target.value;
                let row = event.target.closest("tr");
                let priceElement = row.querySelector(".price-col[data-type='gia_ca']"); // theo class
                let color = row.querySelector(".price-col[data-type='mau']").textContent;
                let size = row.querySelector(".price-col[data-type='size']").textContent;
                let productName = row.querySelector(".product-title a").textContent;
                let price = parseFloat(priceElement.textContent);
                let total = newValue * price;
                let productId = input.classList[1].substring(3);
                if (productId) {
                    $.ajax({
                        type: "POST",
                        url: "index.php?act=themsl",
                        // url: "../model/giohang.php",
                        data: {
                            action: "update_giohang",
                            quantity: newValue,
                            mau: color,
                            size: size,
                            price: price,
                            ten_sach: productName,
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Lỗi");
                        }
                    });
                }

                let totalElement = row.querySelector(".total-col");
                totalElement.textContent = total;
                updateSubtotal();
            });
        });

        function calculateSubtotal() {
            let totalElements = document.querySelectorAll('.total-col');
            let subtotal = 0;

            totalElements.forEach(function(totalElement) {
                subtotal += parseFloat(totalElement.textContent);
            });
            return subtotal;
        }

        function updateSubtotal() {
            subtotalElement.textContent = calculateSubtotal();
        }
    });

</script>
