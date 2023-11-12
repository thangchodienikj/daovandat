<div class="mb">
    <div class="box_title">THÊM SẢN PHẨM MỚI</div>
    <div class="box_content form_account">
        <form action="index.php?act=adddm" method="post" enctype="multipart/form-data">
            <label for="tenloai">Tên Loại:</label><br>
            <input type="text" name="tenloai" id="tenloai"><br>

            <label for="hinh">Ảnh danh mục:</label><br>
            <input type="file" name="hinh" id="hinh"><br>

            <input type="submit" name="themmoi" value="Thêm danh mục">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listdm"><input type="button" class="menu-button" value="Danh Sách"></a>
        </form>
        <p class="notification">
            <?php
            if(isset($thongbao) && $thongbao !== ""){
                echo $thongbao;
            }
            ?>
        </p>
    </div>
</div>
