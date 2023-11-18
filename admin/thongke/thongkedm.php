<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb-5"></div>
    <div class="box_title " style="font-size: 25px">DANH SÁCH LOẠI HÀNG HÓA</div> <br>
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
                                    <th class="text-center col-md-1">Mã danh mục</th>
                                    <th class="text-center col-md-2">Tên danh mục</th>
                                    <th class="text-center col-md-2">Số sản phẩm</th>
                                    <th class="text-center col-md-2">Giá min</th>
                                    <th class="text-center col-md-2">Gía max</th>
                                    <th class="text-center col-md-1">Giá trung bình</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listtk as $value){
                                    extract($value);

                                    echo'<tr>
                                                <td class="text-center col-md-1"><input type="checkbox" name="" id=""></td>
                                                <td class="text-center col-md-1">'.$madm.'</td>
                                                <td class="text-center col-md-2">'.$tendm.'</td>
                                                <td class="text-center col-md-2 justify-content-cente">'.$countsp.'</td>
                                                <td class="text-center col-md-2">'.$minprice.'</td>
                                                <td class="text-center col-md-2">'.$maxprice.'</td>
                                                <td class="text-center col-md-2">'.$avgprice.'</td>
                                                
                                            </tr>';
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
