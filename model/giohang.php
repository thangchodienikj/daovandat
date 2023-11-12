<?php

function loadall_giohang(){
    $sql = "select * from giohang";
    $listgiohang = pdo_query($sql);
    return $listgiohang;
}

function xoaspgh($id) {
    $sql = "DELETE FROM giohang WHERE id = '$id'";
    pdo_execute($sql);
}
function update($ten_sach, $selected_color, $selected_size, $mo_ta, $gia_ca, $hinhload, $so_luong){
    $thanh_tien=$so_luong*$gia_ca;
    pdo_execute("UPDATE giohang SET so_luong = '$so_luong', thanhtien = '$thanh_tien'
            WHERE ten_sach = '$ten_sach' AND mau = '$selected_color' AND sizesp = '$selected_size'");
}

function update_giohang($ten_sach, $selected_color, $selected_size, $mo_ta, $gia_ca, $hinhload, $so_luong){
   $product= pdo_query_one("SELECT * FROM giohang WHERE ten_sach = '$ten_sach' AND mau = '$selected_color' AND sizesp = '$selected_size'");

   if($product){
       $so_luong_moi=$so_luong+$product['so_luong'];
       $thanh_tien_moi=$so_luong_moi*$gia_ca;
       pdo_execute("UPDATE giohang SET so_luong = '$so_luong_moi', thanhtien = '$thanh_tien_moi' 
            WHERE ten_sach = '$ten_sach' AND mau = '$selected_color' AND sizesp = '$selected_size'");
   }
   else{
       $thanh_tien=$so_luong*$gia_ca;
       pdo_execute("INSERT INTO giohang(ten_sach, mau, sizesp, mo_ta, gia_ca, hinh_anh, so_luong, thanhtien) VALUES ('$ten_sach', '$selected_color', '$selected_size', '$mo_ta', '$gia_ca', '$hinhload', '$so_luong', '$thanh_tien')");
   }
}

function xoagh(){
    $sql = "DELETE FROM giohang";
    pdo_execute($sql);
}
?>

