<?php
function  dangky($name,$dia_chi,$email,$sdt,$taikhoan,$matkhau){
    $sql = "insert into tai_khoan(name,dia_chi,email,sdt,taikhoan,matkhau) values('$name','$dia_chi','$email','$sdt','$taikhoan','$matkhau')";
    pdo_execute($sql);
}
function check($taikhoan,$matkhau){
    $sql = " select * from tai_khoan where taikhoan='$taikhoan' and matkhau='$matkhau'";
    return pdo_query_one($sql);
}
function update_tk($id,$name,$dia_chi,$email,$sdt,$taikhoan,$matkhau){
    $sql="UPDATE tai_khoan SET name='$name', dia_chi='$dia_chi', email='$email', sdt='$sdt', taikhoan='$taikhoan', matkhau='$matkhau' WHERE id='$id';";
    pdo_execute($sql);
}
function quenmk($email){
    $sql = "select * from tai_khoan where email ='$email'";
    $thongtin = pdo_query_one($sql);
    return $thongtin;
}
?>