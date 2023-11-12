<?php
function insert_danhmuc($tendanhmuc,$hinh){
    $sql="insert into danh_muc(ten_danh_muc,img) values('$tendanhmuc','$hinh')";
    pdo_execute($sql);
}
function loadAll_danhmuc(){
    $sql = "select * from danh_muc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadAll_danhmuc_timkiem($id){
    $sql = "select * from danh_muc where id = '$id'";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function xoa_danhmuc($id){
    $sql = "DELETE FROM danh_muc WHERE id = $id";
    pdo_execute($sql);
}
function loadone_danhmuc($id){
    $sql = "select * from danh_muc where id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($id,$tendanhmuc,$hinh){
    if ($hinh != ''){
        $sql = "UPDATE danh_muc SET id = '$id', ten_danh_muc = '$tendanhmuc', img = '$hinh' WHERE id = $id";
    }else{
        $sql = "UPDATE danh_muc SET id = '$id', ten_danh_muc = '$tendanhmuc' WHERE id = $id";
    }
    pdo_execute($sql);
}
function list6dm(){
    $sql = "SELECT * FROM danh_muc LIMIT 6";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function list2dm(){
    $sql = "SELECT * FROM danh_muc LIMIT 2";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
?>