<?php 
if(is_array($sp)){
    extract($sp); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
}
$hinhload="../upload/".$img;
if(is_file($hinhload)){
    $hinh="<img src='".$hinhload."' height='80' width='80' >";
}               
?>
<main class="main" style="width: 78%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Cập nhập sản phẩm mới </div>
        <br>
        <div class="box_content form_account">
            <form action="index.php?act=upsp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh mục</label>
                    <select name="iddm" class="form-select">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            $s = ($id_danh_muc == $id) ? 'selected' : '';
                            echo '<option value="'.$id.'" '.$s.' >'.$ten_danh_muc.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="id" id="id" value="<?=$sp['id']?>">
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="tensp" id="tensp" class="form-control" value="<?=$name?>">
                </div>
                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá sản phẩm:</label>
                    <input type="text" name="giasp" id="giasp" class="form-control" value="<?=$price?>">
                </div>
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình ảnh:</label>
                    <input type="file" name="hinh" id="hinh" class="form-control">
                    <?php if(isset($hinh)) { echo $hinh; } else { $hinh = ''; } ?>
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô Tả sản phẩm:</label>
                    <textarea name="mota" id="mota" class="form-control" cols="30" rows="10"><?=$mieuta?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật">
                    <input type="submit" class="btn btn-secondary" value="Nhập lại">
                    <a href="index.php?act=listsp" class="btn btn-info">Danh Sách</a>
                </div>
            </form>
            <p>
                <?php
                if(isset($thongbao6) && ($thongbao6 !="")){
                    echo $thongbao6;
                }
                ?>
            </p>
        </div>
    </div>
</main>

</div>
</main>
