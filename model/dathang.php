<?php
function  donhang($name,$diachi,$email,$sdt,$ghichu,$ngaydathang,$ptvc,$pttt){
    $sql = "insert into don_hang(name,diachi,email,sdt,ghichu,ngaydathang,ptvc,phuong_thuc_thanhtoan) 
    values ('$name','$diachi','$email','$sdt','$ghichu','$ngaydathang','$ptvc','$pttt')";
    return pdo_execute_return_last($sql);
}
function donmua($idtk,$idsp,$img,$tensach,$mau,$size,$soluong,$giaca,$tongtien,$id_don_hang){
    $sql = "insert into don_mua(idtk,idsp,img,tensach,mau,size,soluong,giaca,tongtien,id_don_mua) 
    values ('$idtk','$idsp','$img','$tensach','$mau','$size','$soluong','$giaca','$tongtien','$id_don_hang')";
    return pdo_execute($sql);
}

function luotmua($idpro,$soluong){
    $sql = "UPDATE product SET luotmua = luotmua + $soluong WHERE id = $idpro";
    return pdo_execute($sql);
}
function luotxem($idpro){
    $sql = "UPDATE product SET luotxem = luotxem + 1 WHERE id = $idpro;";
    return pdo_execute($sql);
}
function ht_donhang() {
    $sql = "SELECT * FROM don_mua JOIN don_hang ON don_hang.id = don_mua.id_don_mua;";
    $donhang = pdo_query($sql);
    return $donhang;
}
function tinhtrangdh($tinhtrang) {
    $sql = "SELECT * FROM don_mua JOIN don_hang ON don_hang.id = don_mua.id_don_mua WHERE don_hang.tinhtrangdh = $tinhtrang;";
    $donhang = pdo_query($sql);
    return $donhang;
}

function capnhat($id,$tinhtrang){
    $sql = "UPDATE don_hang SET tinhtrangdh = '$tinhtrang'
    WHERE id = '$id';";
    return pdo_execute($sql);
}
?>
