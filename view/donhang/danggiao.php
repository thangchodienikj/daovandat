<main class="main" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px; text-align: center; margin-bottom: 10px;">Đang giao hàng</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 formds_loai">
                    <table class="table table-bordered">
                        <thead>
                        <tr><th scope="col" class="text-center" >
                                Hình ảnh</th>
                            <th scope="col" class="text-center" colspan="2">
                                Sản phẩm</th>
                            <th scope="col" class="text-center">
                                Giá</th>
                            <th scope="col" class="text-center">
                                Tổng tiền</th>
                            <th scope="col" class="text-center">
                                Trang thái</th>
                            <th scope="col" class="text-center">
                                Thao tác</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listdh as $cart){
                            extract($cart);
                            $ht = $cart['tinhtrangdh'];
                            switch ($ht){
                                case "0" :
                                    $tt="Chờ xác nhận";
                                    break;
                                case "1" :
                                    $tt="Xác nhận đơn hàng";
                                    break;
                                case "2" :
                                    $tt="Đang giao hàng";
                                    break;
                                case "3" :
                                    $tt="Đã giao hàng";
                                    break;
                                case "4" :
                                    $tt="Hủy đơn hàng";
                                    break;
                                default:
                                    break;
                            }
                            $hinhanh = '<img src="'.$img.'" alt="Mô tả hình ảnh">';
                            echo ' <tr>
                                        <td class="text-center" style="width: 100px;height: 100px"><a href="index.php?act=sanphamct&idpro='.$cart['idsp'].'">'.$hinhanh.'</a></td>
                                        <td colspan="2" class="text-center" >'.$tensach.' x'.$soluong.'</td>
                                        <td class="text-center">'.$giaca.'</td>
                                        <td class="text-center">'.$tongtien.'</td>
                                        <td class="text-center">'.$tt.'</td>
                                        <td class="col-md-1 text-center">
                                             ';
                            if ( $cart['tinhtrangdh'] == 0){
                                echo'   <a href="index.php?act=tinhtrang&id='.$id.'&tinhtrang=4" class="btn btn-danger btn-block">Hủy đơn</a>';
                            }
                            if ( $cart['tinhtrangdh'] == 2){
                                echo'   <a href="index.php?act=tinhtrang&id=' . $id . '&tinhtrang=3" class="btn btn-primary btn-block ">Đã nhận</a>';
                            }
                            echo'
                                        </td>
                                     
                                    </tr>';
                        } ?>

                        <!-- Các dòng khác có thể thêm tại đây và đặt lớp text-center tương tự -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
