<main class="main text-center" style="width: 78%; margin: 0 auto;">
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
                <a href="index.php?act=addsp" class="btn btn-info">Thêm sản phẩm</a>
                <button type="submit" class="btn btn-primary" name="gui">Thêm Ảnh</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=add3" class="btn btn-info">Sản phẩm biến thể</a>
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
</main>