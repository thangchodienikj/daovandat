<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 3 Columns<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grid 3 Columns</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <?php
                                $length = sizeof($listsp);
                                echo ' Có  <span> '.$length.' </span>  sản phẩm';
                                ?>

                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sắp xếp theo giá:</label>
                            </div>
                            <div class="toolbox-sort">
                                <form action="index.php?act=xet" method="post" id="sortForm">
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control" onchange="submitForm()">
                                            <option value="0" >Chọn</option>
                                            <option value="1" >Tất cả</option>
                                            <option value="2">Từ cao đến thấp</option>
                                            <option value="3">Từ thấp đến cao</option>
                                        </select>
                                    </div>
                                </form>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->
                    <div class="products mb-3">
                        <div class="row">
                            <?php $i=0;foreach ($listsp as $sp) {
                                if ( $i == 2 || $i== 5 || $i== 8){
                                    $mr = 'mr';
                                }else{
                                    $mr ='';
                                }
                                extract($sp);
                                echo ' <div class="col-6 col-md-4 col-lg-4" '.$mr.'>
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="index.php?act=sanphamct&idpro='.$id.'">
                                            <img src="' . $image . '" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product "><span>Xem chi tiết</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                        ';
                                            foreach ($listdm as $dm) {
                                                extract($dm);
                                                if ($dm['id'] == $sp['id']) {
                                                    $danhmuc = $dm['ten_danh_muc'];
                                                    echo ' <a href="#">'.$danhmuc.'</a>';
                                                }
                                            }
                                        echo' 
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">' . $name . '</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            ' . $gia . '
                                        </div><!-- End .product-price -->
                                        <div class="product-nav product-nav-thumbs">';
                                        $limit = 3;
                                        $count = 0;
                                        $array = explode(',', $imagesphu);
                                        foreach ($array as $anh){
                                            if ($count >= $limit) {
                                                break;
                                            }
                                            echo '<a href="#">
                                                <img src="' . $anh . '" alt="product desc" style="width: 40px; height: 40px">
                                              </a>';
                                            $count++;
                                        }
                                        echo'              
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-lg-4 -->';} ?>
        </div><!-- End .row -->
    </div><!-- End .products -->

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                </a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item-total">of 6</li>
            <li class="page-item">
                <a class="page-link page-link-next" href="#" aria-label="Next">
                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </nav>
    </div><!-- End .col-lg-9 -->
    <aside class="col-lg-3 order-lg-first">
        <div class="sidebar sidebar-shop">
            <div class="widget widget-clean">
                <label>Bộ lọc:</label>
                <a href="#" class="sidebar-filter-clear">Sản phẩm</a>
            </div><!-- End .widget widget-clean -->

            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                        Danh mục
                    </a>
                </h3><!-- End .widget-title -->

                <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                        <div class="filter-items filter-items-count">
                            <?php foreach ($listdm as $dm){
                                extract($dm);
                                echo ' <div class="filter-item">
                                                <div class="custom-control custom-checkbox" >
                                                    <a href="index.php?act=danhmuc&idpro='.$id.'" >'.$ten_danh_muc.'</a></p>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->';
                            } ?>
                        </div><!-- End .filter-items -->

                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

        </div><!-- End .sidebar sidebar-shop -->
    </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
    </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script>
    function submitForm() {
        var selectElement = document.getElementById("sortby");
        var selectedValue = selectElement.value;

        if (selectedValue === "1") {
            document.getElementById("sortForm").action = "index.php?act=xet&id=1";
        } else if (selectedValue === "2") {
            document.getElementById("sortForm").action = "index.php?act=xet&id=2";
        } else if (selectedValue === "3") {
            document.getElementById("sortForm").action = "index.php?act=xet&id=3";
        }

        document.getElementById("sortForm").submit();
    }
</script>