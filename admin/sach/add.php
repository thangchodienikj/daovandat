<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb">
                    <br>
                    <div class="box_title" style="font-size: 25px">THÊM MỚI SẢN PHẨM</div>
                    <br>
                    <div class="box_content form_account">
                        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="masp" class="form-label">Danh mục</label>
                                <select class="form-select" name="iddm">
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc){
                                        extract($danhmuc);
                                        echo "<option value=".$id.">$ten_danh_muc</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tensp" class="form-label">Tên sản phẩm:</label>
                                <input type="text" class="form-control" name="tensp" id="tensp">
                            </div>

                            <div class="mb-3">
                                <label for="giasp" class="form-label">Giá sản phẩm:</label>
                                <input type="text" class="form-control" name="giasp" id="giasp">
                            </div>


                            <div class="mb-3">
                                <label for="hinh" class="form-label">Ảnh sản phẩm:</label>
                                <input type="file" class="form-control" name="hinh" id="hinh">
                            </div>

                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô Tả sản phẩm:</label>
                                <textarea class="form-control" name="mota" id="mota" cols="30" rows="10"></textarea>
                            </div>
                            <a href="index.php?act=add1" class="btn btn-info">Màu và size</a>
                            <button type="submit" class="btn btn-primary" name="themmoi">Thêm sản phẩm</button>
                            <a href="index.php?act=listsp" class="btn btn-info">Danh Sách</a>
                            <a href="index.php?act=add2" class="btn btn-info">Ảnh phụ</a>
                            <br>
                        </form>
                        <p>
                            <?php
                            if(isset($thongbao3) && ($thongbao3 !="")){
                                echo $thongbao3;
                            }
                            ?>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>