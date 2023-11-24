<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Size sản phẩm </div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=size" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="size">Tên Loại:</label>
                    <input type="text" class="form-control" name="size" id="size">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm size</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao1) && $thongbao1 !== ""){
                    echo $thongbao1;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Màu sản phẩm </div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=mau" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="mau">Tên Loại:</label>
                    <input type="text" class="form-control" name="mau" id="mau">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="gui">Thêm màu</button>
                <a href="index.php?act=" class="btn btn-info">Danh Sách</a>
            </form>
            <br>
            <p class="notification">
                <?php
                if(isset($thongbao2) && $thongbao2 !== ""){
                    echo $thongbao2;
                }
                ?>
            </p>
            <br/>
        </div>
    </div>
    <div class="mb">
                <a href="index.php?act=addsp" class="btn btn-info">Sản phẩm</a>
        <br>
    </div>
</main>