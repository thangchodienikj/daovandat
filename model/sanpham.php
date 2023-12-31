<?php
function  capnhatsl($idpro,$idsize,$idcolor,$soluong){
    $sql = "UPDATE productp_variant pv
    INNER JOIN productpro_size ps ON pv.id_size = ps.id
    INNER JOIN productp_color pc ON pv.id_color = pc.id
    SET pv.soluong = pv.soluong - $soluong
    WHERE pv.id_pro = $idpro
    AND pc.color_name = '$idcolor'
    AND ps.name_size = '$idsize';";
    pdo_execute($sql);
}
function get_product_quantity($id,$color,$size){
    $sql = "SELECT pv.soluong
    FROM productp_variant pv
    INNER JOIN productpro_size ps ON pv.id_size = ps.id
    INNER JOIN productp_color pc ON pv.id_color = pc.id
    WHERE pv.id_pro = $id
    AND pc.color_name = '$size'
    AND ps.name_size = '$color';
";
    return pdo_query_one($sql);
}
function update_sp($id,$ten_sach,$gia_ca,$hinh_anh,$mo_ta,$id_danh_muc){
    if ($hinh_anh != '') {
        $sql = "update product set name='$ten_sach',price='$gia_ca',img='$hinh_anh',mieuta='$mo_ta',loai='$id_danh_muc' where id = '$id' ";
    }else{
        $sql="update product set name='$ten_sach',price='$gia_ca',mieuta='$mo_ta',loai='$id_danh_muc' where id = '$id' ";
    }
    pdo_execute($sql);
}
function xoa_sp($id){
    pdo_execute("DELETE FROM product WHERE id = '$id';");
}
function mau($mau){
    $sql = "INSERT INTO productp_color(color_name) VALUES ('$mau')";
    pdo_execute($sql);
}
function size($size){
    $sql = "INSERT INTO productpro_size(name_size) VALUES ('$size')";
    pdo_execute($sql);
}
function loatAll_sanpham($kyw,$iddm){
    $sql="select * from product where 1";
    if($kyw!=''){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and loai = '".$iddm."'";
    }
    $sql.= " order by id ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function productp_color(){
    $sql = "select * from productp_color";
    $listsp = pdo_query($sql);
    return $listsp ;
}
function productpro_size(){
    $sql = "select * from productpro_size";
    $listsp = pdo_query($sql);
    return $listsp ;
}
function anh($id,$anh){
    $sql = "INSERT INTO productpro_image(idpro,img1) VALUES ('$id','$anh')";
    pdo_execute($sql);
}
function spbt($id,$id1,$id2,$soluong){
    $sql = "INSERT INTO productp_variant(id_pro,id_size,id_color,soluong) VALUES ('$id','$id1','$id2','$soluong')";
    pdo_execute($sql);
}
function loadall_sanpham($id){
    if ($id != 0){
 $sql = "
SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro
WHERE 
    loai = $id
GROUP BY 
    sp.id;
";
    }else{
        $sql = "
SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro

GROUP BY 
    sp.id;

";
    }
    $listsp = pdo_query($sql);
    return $listsp ;

}
function load8_sanpham(){
            $sql = "
SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro
GROUP BY 
    sp.id
 LIMIT 12
";
    $listsp = pdo_query($sql);
    return $listsp ;
}
function loadone_sanpham($id){
    $sql = "
    SELECT  *,
        p.id AS ProductID, 
        p.name AS ProductName, 
        sum(soluong), 
        GROUP_CONCAT(DISTINCT ps.name_size) AS sizeList, 
        GROUP_CONCAT(DISTINCT pc.color_name) AS colorList, 
        GROUP_CONCAT(DISTINCT pi.img1) AS productImageList
    FROM product p 
    JOIN productp_variant pv ON p.id = pv.id_pro 
    JOIN productpro_size ps ON pv.id_size = ps.id 
    JOIN productp_color pc ON pv.id_color = pc.id 
    LEFT JOIN productpro_image pi ON p.id = pi.idpro 
    WHERE pv.id_pro = '$id'
    group by pv.id_pro
    ";
    $listsp = pdo_query($sql);
    return $listsp;
}

function tang(){
    $sql="SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro
GROUP BY 
    sp.id 
ORDER  BY 
    price ASC";
    $tang = pdo_query($sql);
    return $tang;
}
function giam(){
    $sql="SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro
GROUP BY 
    sp.id 
ORDER  BY     
    price DESC";
    $giam = pdo_query($sql);
    return $giam;
}

function insert_product($ten_sach,$hinh_anh,$mo_ta,$gia_ca,$id_danh_muc){
    $sql = "INSERT INTO product(name,img,mieuta,price,loai) VALUES ('$ten_sach','$hinh_anh','$mo_ta','$gia_ca','$id_danh_muc')";
    pdo_execute($sql);
}
function loadone_product($id){
    return pdo_query_one("select * from product where id = '$id';");
}
function timkiem($timkiem){
    $sql = "SELECT 
    sp.id AS id,
    sp.name AS name,
    sp.img AS image,
    sp.mieuta AS mieuta,
    sp.price AS gia,
    sp.loai AS loai,
    GROUP_CONCAT(ip.img1) AS imagesphu
FROM 
    product AS sp
LEFT JOIN 
    productpro_image AS ip ON sp.id = ip.idpro
WHERE 
    sp.name LIKE '%$timkiem%'
GROUP BY 
    sp.id;";
    $result = pdo_query($sql);
    return $result;
}

function soluong_sanpham($idpro){
    $sql = "SELECT 
    id_pro,
    SUM(soluong) AS sl
FROM
    productp_variant
WHERE
    id_pro = '.$idpro.'
GROUP BY
    id_pro;";
    return pdo_query_one($sql);
}
function product(){
    return pdo_query("SELECT *,sp.img as hinhanh  ,sp.id as tensp  FROM product AS sp JOIN danh_muc as dm on dm.id = sp.loai GROUP BY sp.id;");
}
function list3sp(){
    $sql = "SELECT * FROM product  LIMIT 3  ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function spyeuthich($idsp,$idtk){
    $check = pdo_query_one("select * from spyeuthich where idsp ='$idsp' and  idtk='$idtk'");
    if ($check){
        pdo_execute("UPDATE spyeuthich SET  idtk = '$idtk'  where idsp ='$idsp' and idtk='$idtk' ");
    }else {
        pdo_execute("INSERT INTO spyeuthich(idsp,idtk) VALUES ('$idsp','$idtk')");
    }
}
function loadall_spyt($id){
    return pdo_query("SELECT sp.id as idyt , sp.idsp, pr.name, pr.img, pr.price
FROM spyeuthich sp
INNER JOIN product pr ON sp.idsp = pr.id where idtk = '$id'");
}
function xoaspyt($id){
    return pdo_query("DELETE FROM spyeuthich WHERE id = '$id'");
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    include ("../model/pdo.php");

    if ($action == 'get_product_quantity') {
        $id= $_POST['idpro'];
        $color = $_POST['mau'];
        $size = $_POST['size'];
        $result = get_product_quantity($id,$color,$size);
        echo json_encode(array('quantity' => $result));
    }
}
?>


