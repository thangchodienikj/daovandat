<main class="main" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px; text-align: center; margin-bottom: 10px;">Đơn hàng</div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                    <div class="mb-3 formds_loai">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Ngày đặt hàng</th>
                                <th class="text-center">Ghi chú</th>
                                <th class="text-center">Sản phẩm</th>
                                <th class="text-center">Màu</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">
                                    Tổng cộng</th>
                                <th class="text-center">
                                    Phương pháp vận chuyển</th>
                                <th class="text-center">Phương thức thanh toán</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">
                                    Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listdh1 as $dh) : ?>
                                <?php
                                extract($dh);
                                $ht = $dh['tinhtrangdh']
                                ?>
                                <tr>
                                    <td class="col-md-1 text-center"><?= $name ?></td>
                                    <td class="col-md-1 text-center"><?= $diachi  ?></td>
                                    <td class="col-md-1 text-center"><?= $sdt ?></td>
                                    <td class="col-md-1 text-center"><?= $ngaydathang ?></td>
                                    <td class="col-md-1 text-center"><?= $ghichu ?></td>
                                    <td class="col-md-1 text-center"><?= $tensach ?></td>
                                    <td class="col-md-1 text-center"><?= $mau ?></td>
                                    <td class="col-md-1 text-center"><?= $size ?></td>
                                    <td class="col-md-1 text-center"><?= $tongtien ?></td>
                                    <td class="col-md-1 text-center"><?php
                                        if ($ptvc == 30000){
                                            echo "Vận chuyển nhanh";
                                        }else{
                                            echo "Vận chuyển chậm";
                                        }
                                        ?> </td>
                                    <td class="col-md-1 text-center"><?= $phuong_thuc_thanhtoan ?></td>
                                    <td class="col-md-1 text-center"><?= $tt=$tongtien+$ptvc ?></td>
                                    <td class="col-md-1 text-center">
                                        <?php
                                        switch ($ht){
                                            case "0" :
                                                echo "Chờ xác nhận";
                                                break;
                                            case "1" :
                                                echo"Xác nhận đơn hàng";
                                                break;
                                            case "2" :
                                                echo "Đang giao hàng";
                                                break;
                                            case "3" :
                                                echo "Giao thành công";
                                                break;
                                            default:
                                                break;
                                        } ?>
                                        <form action="index.php?act=tinhtrang" method="post">
                                            <input type="hidden" name="id" id="id" value="<?=$id?>">
                                            <select name="tinhtrang">
                                                <option value="0">Chờ xác nhận</option>
                                                <option value="1">Xác nhận đơn hàng</option>
                                                <option value="2">Đang giao hàng</option>
                                                <option value="3">Đã giao hàng</option>
                                            </select>
                                            <input class="btn btn-primary btn-block" type="submit" name="gui" value="Cập nhật">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</main>
