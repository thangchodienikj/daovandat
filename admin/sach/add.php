<main class="main" style="width: 78%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Size sản phẩm </div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=size" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="size">Tên Loại:</label>
                    <input type="text" class="form-control" name="size" id="size">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm size</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao1) && $thongbao1 !== ""){
                    echo $thongbao1;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Màu sản phẩm </div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=mau" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="mau">Tên Loại:</label>
                    <input type="text" class="form-control" name="mau" id="mau">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm màu</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao2) && $thongbao2 !== ""){
                    echo $thongbao2;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
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

                            <button type="submit" class="btn btn-primary" name="themmoi">Thêm sản phẩm</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                            <a href="index.php?act=listsp" class="btn btn-info">Danh Sách</a>
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
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Ảnh phụ sản phẩm </div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=anh" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="masp" class="form-label">Chọn sản phẩm : </label>
                    <select class="form-select" name="id">
                        <?php
                        foreach ($listsp as $danhmuc){
                            extract($danhmuc);
                            echo "<option value=".$id.">$name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="anh1">Ảnh phụ:</label>
                    <input type="file" class="form-control" name="anh" id="anh">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm Ảnh</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao4) && $thongbao4 !== ""){
                    echo $thongbao4;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Sản phẩm biến thể</div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=spbt" method="post" >
                <div class="form-group">
                    <label for="id" class="form-label">Chọn sản phẩm : </label>
                    <select class="form-select" name="id">
                        <?php
                        foreach ($listsp as $danhmuc){
                            extract($danhmuc);
                            echo "<option value=".$id.">$name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id1" class="form-label">Chọn sản phẩm : </label>
                    <select class="form-select" name="id1">
                        <?php
                        foreach ($listmau as $mau){
                            extract($mau);
                            echo "<option value=".$id.">$color_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id2" class="form-label">Chọn sản phẩm : </label>
                    <select class="form-select" name="id2">
                        <?php
                        foreach ($listsize as $size){
                            extract($size);
                            echo "<option value=".$id.">$name_size</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="soluong">Số lượng:</label>
                    <input type="text" class="form-control" name="soluong" id="soluong">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm sản phẩm </button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao5) && $thongbao5 !== ""){
                    echo $thongbao5;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
</main>