<?php 
if(is_array($sp1)){
    extract($sp1); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
}
$hinhload="../upload/".$img;
if(is_file($hinhload)){
    $hinh="<img src='".$hinhload."' height='80' width='80' >";
}               
?>
<main class="main text-center" style="width: 60%; margin: 0 auto;">
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
                            $s = ($danhmuc['id'] == $sp1['loai']) ? 'selected' : '';
                            echo '<option value="'.$id.'" '.$s.' >'.$ten_danh_muc.'</option>';
                        }
                        ?>
                    </select>
                    <span style="color: red"><?= isset($_SESSION['error']['iddm']) ? $_SESSION['error']['iddm']  : ''?></span>
                </div>
                <input type="hidden" name="id" id="id" value="<?=$sp1['id']?>">
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="tensp" id="tensp" class="form-control" value="<?=$name?>">
                    <span style="color: red"><?= isset($_SESSION['error']['tensp']) ? $_SESSION['error']['tensp']  : ''?></span>
                </div>
                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá sản phẩm:</label>
                    <input type="text" name="giasp" id="giasp" class="form-control" value="<?=$price?>">
                    <span style="color: red" id="giaError"></span>
                    <br>
                    <span style="color: red" ><?= isset($_SESSION['error']['gia_ca']) ? $_SESSION['error']['gia_ca']  : ''?></span>
                </div>
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình ảnh:</label>
                    <input type="file" name="hinh" id="hinh" class="form-control">
                    <?php if(isset($hinh)) { echo $hinh; } else { $hinh = ''; } ?>
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô Tả sản phẩm:</label>
                    <textarea name="mota" id="mota" class="form-control" cols="30" rows="10"><?=$mieuta?></textarea>
                    <span style="color: red"><?= isset($_SESSION['error']['mota']) ? $_SESSION['error']['mota']  : ''?></span>
                </div>
                <div class="mb-3">
                    <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật">
                    <input type="submit" class="btn btn-secondary" value="Nhập lại">
                    <a href="index.php?act=listsp" class="btn btn-info">Danh Sách</a>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Find the input element
        var giaInput = document.getElementById('giasp');

        // Attach an event listener to the input element
        giaInput.addEventListener('input', function () {
            // Get the entered value
            var enteredValue = giaInput.value;

            // Check if the entered value is less than 1
            if (enteredValue < 1) {
                // Display an error message
                document.getElementById('giaError').textContent = 'Giá phải lớn hơn hoặc bằng 1';
            } else {
                // Clear the error message
                document.getElementById('giaError').textContent = '';
            }
        });
    });
</script>
<?php unset($_SESSION['error'])?>
