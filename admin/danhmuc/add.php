<main class="main" style="width: 77%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">THÊM DANH MỤC MỚI</div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=adddm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tenloai">Tên Loại:</label>
                    <input type="text" class="form-control" name="tenloai" id="tenloai">
                </div>
                <br>
                <div class="form-group">
                    <label for="hinh">Ảnh danh mục:</label>
                    <input type="file" class="form-control-file" name="hinh" id="hinh">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="themmoi">Thêm danh mục</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao) && $thongbao !== ""){
                    echo $thongbao;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
</main><!-- End .main -->
