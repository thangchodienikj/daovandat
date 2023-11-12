<?php 
if(is_array($sp)){
    extract($sp); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
}
$hinhload="../upload/".$hinh_anh;
if(is_file($hinhload)){
    $hinh="<img src='".$hinhload."' height='80' >";
}               
?>
<div class="mb">
    <div class="box_title">Cập nhập sản phẩm mới </div>
    <div class="box_content form_account">
        <form action="index.php?act=upsp" method="post" enctype="multipart/form-data">
            <label for="masp">Danh mục</label><br>
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                        if ($id_danh_muc==$id) $s='selected'; else $s='';
                        echo '<option value="'.$id.'" '.$s.' >'.$ten_danh_muc.'</option>';
                }
                ?>
            </select><br>
            <input type="hidden" name="id" id="id" value="<?=$sp['id']?>">

            <label for="tensp">Tên sản phẩm:</label><br>
            <input type="text" name="tensp" id="tensp" value="<?=$ten_sach?>"><br>
            <label for="giasp">Giá sản phẩm:</label><br>
            <input type="text" name="giasp" id="giasp" value="<?=$gia_ca?>"><br>
            <label for="soluong">Số lượng</label><br>
            <input type="text" name="soluong" id="soluong" value="<?=$so_luong?>"><br>
            <label for="hinh">Ảnh sản phẩm:</label><br>
            <input type="file" name="hinh" id="hinh"><?php if(isset($hinh)){echo $hinh;} else$hinh=''; ?><br>
            <label for="mota">Mô Tả sản phẩm:</label><br>
            <textarea name="mota" id="mota" cols="30" rows="10"><?=$mo_ta?></textarea>
            <br>
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="submit" value="Nhập lại">
            <a href="index.php?act=listsp"><input type="button" class="menu-button" value="Danh Sách"></a>
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
