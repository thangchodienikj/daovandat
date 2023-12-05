<?php
function khachhang($id){
    if ($id == 0) {
        $sql = "select * from tai_khoan ";
        $listkhachhang = pdo_query($sql);
        return $listkhachhang;
    }else{
        $sql = "select * from tai_khoan where id = $id;";
        $listkhachhang = pdo_query_one($sql);
        return $listkhachhang;
    }
}
function binhluan(){
    $sql = "select * from binhluan ";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan ;
}

function xoakh ($id){
    $sql = "DELETE FROM tai_khoan WHERE id = $id;";
    pdo_execute($sql);
}
?>
