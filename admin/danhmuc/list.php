<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th>HÌNH ẢNH</th>
                <th></th>
            </tr>
            <?php 
                foreach ($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id=".$id;
                    $xoadm = "index.php?act=xoadm&id=".$id;
                    $hinhload="../upload/".$img;
                    if(is_file($hinhload)){
                        $img="<img src='".$hinhload."' height='80' width='80'>";
                    }
                    echo'<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$ten_danh_muc.'</td>
                         <td>'.$img.'</td>
                        <td><a href='.$suadm.'><input type="button" value="Sửa"></a>
                        <a href='.$xoadm.'><input type="button" value="Xóa"></a></td>
                         </tr>';
                } 
            ?>

            
           </table>
           </div>
           <div class="row mb10 ">
            <input class="mr20 menu-button" type="button" value="CHỌN TẤT CẢ">
            <input  class="mr20 menu-button" type="button" value="BỎ CHỌN TẤT CẢ">
            <a href="index.php?act=adddm"> <input  class="mr20 menu-button" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>