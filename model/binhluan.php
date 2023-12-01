<?php
function binhluan($id){
    $sql = "SELECT * FROM binhluan WHERE idsp = '" . $id . "'";
    return pdo_query($sql);
}
function isert_bl($idsp,$rating,$binhluan,$name,$ngaybinhluan){
    $sql = "INSERT INTO binhluan ( idsp, camnhan, danhgia, taikhoan, ngaybinhluan) VALUES ('$idsp','$rating', '$binhluan', '$name', '$ngaybinhluan')";
    pdo_execute($sql);
}

?>
