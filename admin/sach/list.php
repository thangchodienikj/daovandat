<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px">Danh sách sản phẩm</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="index.php?act=listsp" method="post">
                    <label for="kyw">Tìm kiếm theo tên</label>
                    <input type="text" name="kyw" id="kyw" class="form-control"><br>
                    <label for="iddm">Chọn danh mục</label>
                    <select name="iddm" id="iddm" class="form-control">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo"<option value=".$id.">$ten_danh_muc</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-primary mt-3" value="Tìm kiếm" name="listok">
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row form_content">
            <div class="col-12">
                <form action="#" method="POST">
                    <div class="mb-3 formds_loai">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center col-md-1"></th>
                                    <th class="text-center col-md-1">ID</th>
                                    <th class="text-center col-md-2">SẢN PHẨM</th>
                                    <th class="text-center col-md-2">HÌNH ẢNH</th>
                                    <th class="text-center col-md-2">GIÁ</th>
                                    <th class="text-center col-md-2">MIÊU TẢ</th>
                                    <th class="text-center col-md-2">LOẠI</th>
                                    <th class="text-center col-md-1">THAO TÁC</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listsp1 as $sanpham) {
                                    extract($sanpham);
                                    $suasp = "index.php?act=suasp&id=" . $tensp;
                                    $xoasp = "index.php?act=xoasp&id=" . $tensp;
                                    $hinhload = "../upload/" . $hinhanh;
                                    if (is_file($hinhload)) {
                                        $hinh_anh = "<img src='" . $hinhload . "' height='120' width='120'>";
                                        echo '<tr>
                                                <td class="text-center col-md-1"><input type="checkbox" name="" id=""></td>
                                                <td class="text-center col-md-1">' . $tensp . '</td>
                                                <td class="text-center col-md-2">' . $name . '</td>
                                                <td class="text-center col-md-2 justify-content-cente">' . $hinh_anh . '</td>
                                                <td class="text-center col-md-2">' . $price . '</td>
                                                <td class="text-center col-md-2">' . $mieuta . '</td> 
                                                <td class="text-center col-md-2">' . $ten_danh_muc . '</td>
                                                <td class="text-center col-md-1">
                                                    <a href=' . $suasp . ' class="btn btn-primary btn-sm">Sửa</a>
                                                    <a href=' . $xoasp . ' class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>';
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <input class="btn btn-primary btn-block" type="button" value="CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-secondary btn-block" type="button" value="BỎ CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?act=addsp" class="btn btn-success btn-block">NHẬP THÊM</a>
                        </div>
                        <!-- Thêm cột mới -->
                        <div class="col-md-6">
                            <!-- Nút hoặc nội dung cho cột thứ tư -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>