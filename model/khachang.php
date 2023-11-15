<?php
function khachhang(){
    $sql = "select * from tai_khoan ";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang ;
}
function binhluan(){
    $sql = "select * from binhluan ";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan ;
}
?>
