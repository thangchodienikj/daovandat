<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Sản phẩm biến thể</div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=spbt" method="post" >
                <div class="form-group">
                    <label for="id" class="form-label">Chọn sản phẩm : </label>
                    <select class="form-select" name="sanpham">
                        <?php
                        foreach ($listsp as $sanpham){
                            extract($sanpham);
                            echo "<option value=".$id.">$name</option>";
                        }
                        ?>
                    </select>
                    <span style="color: red"><?= isset($_SESSION['error']['sanpham']) ? $_SESSION['error']['sanpham'] : ''?></span>
                </div>
                <div class="form-group">
                    <label for="id1" class="form-label">Chọn màu : </label>
                    <select class="form-select" name="id1">
                        <?php
                        foreach ($listmau as $mau){
                            extract($mau);
                            echo "<option value=".$id.">$color_name</option>";
                        }
                        ?>
                    </select>
                    <span style="color: red"><?= isset($_SESSION['error']['mau']) ? $_SESSION['error']['mau'] : ''?></span>
                </div>
                <div class="form-group">
                    <label for="id2" class="form-label">Chọn size : </label>
                    <select class="form-select" name="id2">
                        <?php
                        foreach ($listsize as $size){
                            extract($size);
                            echo "<option value=".$id.">$name_size</option>";
                        }
                        ?>
                        <span style="color: red"><?= isset($_SESSION['error']['size']) ? $_SESSION['error']['size'] : ''?></span>
                    </select>
                </div>
                <div class="form-group">
                    <label for="soluong">Số lượng:</label>
                    <input type="text" class="form-control" name="soluong" id="soluong" min="1">
                    <span id="soluongError" style="color: red"></span>
                    <span style="color: red"><?= isset($_SESSION['error']['soluong']) ? $_SESSION['error']['soluong'] : ''?></span>
                </div>
                <br>
                <br>
                <a href="index.php?act=add2" class="btn btn-info">Ảnh phụ</a>
                <button type="submit" class="btn btn-primary" name="gui">Thêm sản phẩm </button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
                <a href="index.php?act=addsp" class="btn btn-info">Sản phẩm</a>
            </form>
            <br>
            <br/>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Find the input element
        var soluongInput = document.getElementById('soluong');

        // Attach an event listener to the input element
        soluongInput.addEventListener('input', function () {
            // Get the entered value
            var enteredValue = soluongInput.value;

            // Check if the entered value is less than 1
            if (enteredValue < 1) {
                // Display an error message
                document.getElementById('soluongError').textContent = 'Số lượng phải lớn hơn hoặc bằng 1';
            } else {
                // Clear the error message
                document.getElementById('soluongError').textContent = '';
            }
        });
    });
</script>
<?php unset($_SESSION['error'])?>