<main class="main" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px">Khách hàng</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST">
                    <div class="mb-3 formds_loai">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">MÃ LOẠI</th>
                                <th class="text-center">TÊN LOẠI</th>
                                <th class="text-center">HÌNH ẢNH</th>
                                <th class="text-center">Thao tác</th>
                                <th class="text-center">MÃ LOẠI</th>
                                <th class="text-center">TÊN LOẠI</th>
                                <th class="text-center">HÌNH ẢNH</th>

                                <th class="text-center">VAI TRÒ</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listkhachhang as $khachhang) : ?>
                                <?php
                                extract($khachhang);
                                $suadm = "index.php?act=suadm&id=" . $id;
                                $xoadm = "index.php?act=xoadm&id=" . $id;
                                ?>
                                <tr>
                                    <td class="col-md-1 text-center"><?= $id ?></td>
                                    <td class="col-md-1 text-center"><?= $name  ?></td>
                                    <td class="col-md-1 text-center">
                                        <div class="d-flex justify-content-center align-items-center"><?= $dia_chi ?></div>
                                    </td>
                                    <!-- Thêm cột mới -->
                                    <td class="col-md-1 text-center"><?= $email ?></td>
                                    <td class="col-md-1 text-center"><?= $sdt ?></td>
                                    <td class="col-md-1 text-center">
                                        <div class="d-flex justify-content-center align-items-center"><?= $taikhoan ?></div>
                                    </td>
                                    <td class="col-md-1 text-center"><?= $matkhau ?></td>
                                    <td class="col-md-1 text-center"><?= $role ?></td>
                                    <td class="col-md-1 text-center">
                                        <a href="<?= $suadm ?>" class="btn btn-primary btn-block">Sửa</a>
                                        <a href="<?= $xoadm ?>" class="btn btn-danger btn-block">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <input class="btn btn-primary btn-block" type="button" value="CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-secondary btn-block" type="button" value="BỎ CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-3">
                            <a href="index.php?act=adddm" class="btn btn-success btn-block">NHẬP THÊM</a>
                        </div>
                        <!-- Thêm cột mới -->
                        <div class="col-md-3">
                            <!-- Nút hoặc nội dung cho cột thứ tư -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
