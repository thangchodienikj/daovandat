<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=listsp" method="post">
            <label for="kyw">Tìm kiếm theo tên</label>
            <input type="text" name="kyw" id="kyw"><br>
            <label for="iddm">Chọn danh mục</label>
            <select name="iddm" id="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo"<option value=".$id.">$ten_danh_muc</option>";
                }
                ?>
            </select>
            <input type="submit" class="menu-button" value="Tìm kiếm" name="listok">
        </form>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN SÁCH</th>
                        <th>GIÁ CẢ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>HÌNH ẢNH</th>
                        <th>MÔ TẢ</th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach ($listsp as $sanpham){
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=".$id;
                            $xoasp = "index.php?act=xoasp&id=".$id;
                            $hinhload="../upload/".$hinh_anh;
                            if(is_file($hinhload)){
                                $hinh_anh="<img src='".$hinhload."' height='80'>";
                            }
                            echo'<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$ten_sach.'</td>
                                <td>'.$gia_ca.'</td>
                                <td>'.$so_luong.'</td>
                                <td>'.$hinh_anh.'</td>
                                <td>'.$mo_ta.'</td>
                                <td><a href='.$suasp.'><input type="button" class="menu-button" value="Sửa"></a>
                                <a href='.$xoasp.'><input type="button" class="menu-button" value="Xóa"></a></td>
                            </tr>';
                        } 
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20 menu-button" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20 menu-button" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input  class="mr20 menu-button" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>
