<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="row">
                        <div class="col-lg-8">
                            <form action="">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" >

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name" >
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." >

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" >
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" >
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" >
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" class="form-control" >

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </form>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-4">

                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $tong=0 ; foreach ($listgh as $gh) {
                                        extract($gh);
                                        echo '
                            <tr id="'.$id.'">
                                <td class="product-col">
                                        <h3 class="product-title">
                                            <a >'.$ten_sach.'</a>
                                        </h3><!-- End .product-title -->
                                </td>
                                <td class="price-col" data-type="gia_ca">$'.$gia_ca.'</td>
                            </tr>
                            ';
                                        $tong = $tong+ $thanhtien;
                                    };?>


                                    <tr>
                                    <tr>

                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>$<?=$tong?></td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">

                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a id="momo-link" class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                        Payment by MoMo
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                                <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a id="vnpay-link" class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                       Payment by VNPay
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                                <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a id="cod" class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                        COD
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        Place Order
                                    </button>



                                    
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(".btn-order").on("click", function () {
            // Lấy ID của thẻ <a> đã được chọn
            var selectedLinkId = $(".accordion-summary a[aria-expanded='true']").attr("id");

            // Kiểm tra ID và điều hướng đến địa chỉ mong muốn
            switch (selectedLinkId) {
                case "momo-link":
                    window.location.href = "link-to-momo-page.html";
                    break;
                case "vnpay-link":
                    window.location.href = "link-to-vnpay-page.html";
                    break;
                case "cod":
                    window.location.href = "?act=checkout"
                    break;
                // Thêm các trường hợp khác nếu cần
            }
        });
    });
</script>