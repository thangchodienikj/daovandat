<?php
if (is_array($listkhachhang)){
    extract($listkhachhang)
?>
<main class="main" style="width: 60%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Cập nhập sản phẩm mới </div>
        <br>
        <div class="box_content form_account">
            <form action="index.php?act=updk" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?=$id?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên người dùng</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?=$name?>">
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" name="diachi" id="diachi" class="form-control" value="<?=$dia_chi?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?=$email?>">
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" name="sdt" id="sdt" class="form-control" value="<?=$sdt?>">
                </div>
                <div class="mb-3">
                    <label for="tk" class="form-label">Tài khoản</label>
                    <input type="text" name="tk" id="tk" class="form-control" value="<?=$taikhoan?>">
                </div>
                <div class="mb-3">
                    <label for="mk" class="form-label">Mật khẩu</label>
                    <input type="text" name="mk" id="mk" class="form-control" value="<?=$matkhau?>">
                </div>
                <div class="mb-3">
                    <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật">
                    <a href="index.php?act=khachhang" class="btn btn-info">Danh Sách</a>
                </div>
            </form>
            <p>
                <?php
                }
                ?>
            </p>
        </div>
    </div>
</main>

</div>
</main>
