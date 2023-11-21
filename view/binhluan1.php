<!-- reviews.php -->
<div class="reviews">
    <h3>Đánh giá</h3>
    <div class="review">
        <?php foreach ($binhluan as $bl){
            extract($bl);
            echo '<div class="row no-gutters">
                <div class="col-auto">
                    <h4><a href="#">'.$taikhoan.'</a></h4>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                    </div><!-- End .rating-container -->
                    <span class="review-date">'.$ngaybinhluan.'</span>
                </div><!-- End .col -->
                <div class="col">
                    <h4>'.$camnhan.'</h4>

                    <div class="review-content">
                        <p>'.$danhgia.'</p>
                    </div><!-- End .review-content -->

                    <div class="review-action">
                        <a href="#"><i class="icon-thumbs-up"></i>Hữu ích (0)</a>
                        <a href="#"><i class="icon-thumbs-down"></i>Không hữu ích (0)</a>
                    </div><!-- End .review-action -->
                </div><!-- End .col-auto -->
            </div><!-- End .row -->';
        } ?>
    </div><!-- End .review -->
</div>
