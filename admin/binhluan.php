<main class="main" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px">BÌNH LUẬN</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST">
                    <div class="mb-3 formds_loai">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Tài khoản</th>
                                <th class="text-center">ID sp</th>
                                <th class="text-center">Đánh giá</th>
                                <th class="text-center">Ngày bình luận</th>
                                <th class="text-center">Cảm nhận</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listbinhluan as $bl) : ?>
                                <?php extract($bl); ?>
                                <tr>
                                    <td class="col-md-2 text-center"><?= $id ?></td>
                                    <td class="col-md-2 text-center"><?= $taikhoan ?></td>
                                    <td class="col-md-2 text-center"><?= $idsp ?></td>
                                    <td class="col-md-2 text-center"><?= $danhgia ?></td>
                                    <td class="col-md-2 text-center"><?= $ngaybinhluan ?></td>
                                    <td class="col-md-2 text-center"><?= $camnhan ?></td>
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
