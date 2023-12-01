<main class="main text-center" style="width: 78%; margin: 0 auto;">
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
                <a href="index.php?act=add2" class="btn btn-info">Ảnh phụ</a>
                <button type="submit" class="btn btn-primary" name="gui">Thêm sản phẩm </button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
                <a href="index.php?act=addsp" class="btn btn-info">Sản phẩm</a>
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