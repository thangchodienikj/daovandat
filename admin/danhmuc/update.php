<?php
if (is_array($dm)){
    extract($dm);
}
$loadhinh = "../upload/".$img;
if (is_file($loadhinh)){
    $hinh = "<img src='$loadhinh' height='80' width='80'>";
}
?>
<div class="mb">
    <div class="box_title">Cập nhập sản phẩm mới </div>
    <div class="box_content form_account">
        <form action="index.php?act=update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id?>"><br>

            <label for="tenloai">Tên Loại:</label><br>
            <input type="text" name="tenloai" id="tenloai" value="<?=$ten_danh_muc?>"><br>

            <label for="hinh">Ảnh sản phẩm:</label><br>
            <input type="file" name="hinh" id="hinh"><?php if(isset($hinh)){echo $hinh;} else$hinh=''; ?><br>

            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listdm"><input type="button" class="menu-button" value="Danh Sách"></a>
        </form>
        <p>
            <?php
            if(isset($thongbao) && ($thongbao !="")){
                echo $thongbao;
            }
            ?>
            </p>
    </div>
</div>
