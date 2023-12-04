<?php
function  donhang($name,$diachi,$email,$sdt,$ghichu,$ngaydathang,$ptvc,$pttt){
    $sql = "insert into don_hang(name,diachi,email,sdt,ghichu,ngaydathang,ptvc,phuong_thuc_thanhtoan) 
    values ('$name','$diachi','$email','$sdt','$ghichu','$ngaydathang','$ptvc','$pttt')";
    return pdo_execute_return_last($sql);
}
function donmua($idtk,$idsp,$mau,$size,$soluong,$tongtien,$id_don_hang,$tinhtrangthanhtoan){
    $sql = "insert into don_mua(idtk,idsp,mau,size,soluong,tongtien,id_don_mua,tinhtrangthanhtoan) 
    values ('$idtk','$idsp','$mau','$size','$soluong','$tongtien','$id_don_hang','$tinhtrangthanhtoan')";
    return pdo_execute($sql);
}

function luotxem($idpro){
    $sql = "UPDATE product SET luotxem = luotxem + 1 WHERE id = $idpro;";
    return pdo_execute($sql);
}
function ht_donhang($id) {
    if ($id == 1) {
        $sql = "SELECT dm.id, sp.name, sp.img ,sp.price ,dm.idsp ,dm.idtk,dm.tinhtrangthanhtoan,dm.id_don_mua,dm.size,dm.mau,dm.tongtien,dm.soluong , dh.name as ten ,dh.diachi,dh.email,dh.sdt,dh.ghichu,dh.ngaydathang,dh.ptvc,dh.phuong_thuc_thanhtoan,dh.tinhtrangdh
                FROM don_mua as dm 
                JOIN don_hang as dh ON dh.id = dm.id_don_mua 
                JOIN product as sp ON sp.id=dm.idsp;";
    }else{
        $sql = "SELECT dm.id, sp.name, sp.img ,sp.price ,dm.idsp ,dm.idtk,dm.tinhtrangthanhtoan,dm.id_don_mua,dm.size,dm.mau,dm.tongtien,dm.soluong , dh.name as ten ,dh.diachi,dh.email,dh.sdt,dh.ghichu,dh.ngaydathang,dh.ptvc,dh.phuong_thuc_thanhtoan,dh.tinhtrangdh
                FROM don_mua as dm 
                JOIN don_hang as dh ON dh.id = dm.id_don_mua 
                JOIN product as sp ON sp.id=dm.idsp where dm.id_don_mua = $id ;";
    }
    $donhang = pdo_query($sql);
    return $donhang;
}
function tinhtrangdh($tinhtrang) {
    $sql = "SELECT * FROM don_mua JOIN don_hang ON don_hang.id = don_mua.id_don_mua WHERE don_hang.tinhtrangdh = $tinhtrang;";
    $donhang = pdo_query($sql);
    return $donhang;
}
function capnhatdh($id,$tinhtrangdh){
    $sql = "UPDATE don_hang SET tinhtrangdh = '$tinhtrangdh'
    WHERE id = '$id';";
    return pdo_execute($sql);
}
function capnhatdm($id,$tinhtrangdm){
    $sql = "UPDATE don_mua SET tinhtrangthanhtoan = '$tinhtrangdm'
    WHERE id = '$id';";
    return pdo_execute($sql);
}

?>
