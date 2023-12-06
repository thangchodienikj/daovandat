

<main class="main text-center" style="width: 60%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Thêm danh mục mới</div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=adddm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tenloai">Tên Loại:</label>
                    <input type="text" class="form-control" name="tenloai" id="tenloai">
                    <span style="color: red;"><?php echo isset($_SESSION['error']['tenloai'])? $_SESSION['error']['tenloai'] : '' ?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="hinh">Ảnh danh mục:</label>
                    <input type="file" class="form-control-file" name="hinh" id="hinh">
                    <span style="color: red;"><?php echo isset($_SESSION['error']['hinh'])? $_SESSION['error']['hinh'] : '' ?></span>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="themmoi">Thêm danh mục</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <br/>
        </div>
    </div>
</main><!-- End .main -->
<?php unset($_SESSION['error']); ?>
