<main class="main text-center" style="width: 78%; margin: 0 auto;">
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
                                <th class="text-center">Id</th>
                                <th class="text-center">Họ và tên</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Tài khoản</th>
                                <th class="text-center">Mật khẩu</th>
                                <th class="text-center">Vai trò</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listkhachhang as $khachhang) : ?>
                                <?php
                                extract($khachhang);
                                $suadm = "#" . $id;
                                $xoadm = "#" . $id;
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
                                    <?php
                                    switch ($role) {
                                        case '1':
                                            $tt = "Admin";
                                            break;
                                        case  '0':
                                            $tt = "Khách hàng";
                                            break;

                                    }?>
                                    <td class="col-md-1 text-center"><?= $tt ?></td>
                                    <td class="col-md-1 text-center">
                                        <a href="<?= $suadm ?>" class="btn btn-primary btn-block">Sửa</a>
                                        <a href="<?= $xoadm ?>" class="btn btn-danger btn-block">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
