<?php
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
    GROUP_CONCAT(ip.img) AS imagesphu
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
    GROUP_CONCAT(ip.img) AS imagesphu
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

function loadone_sanpham($id){
    $sql = "
    SELECT  *,
        p.id AS ProductID, 
        p.name AS ProductName, 
        GROUP_CONCAT(DISTINCT ps.name_size) AS sizeList, 
        GROUP_CONCAT(DISTINCT pc.color_name) AS colorList, 
        GROUP_CONCAT(DISTINCT pi.img) AS productImageList
    FROM product p 
    JOIN productp_variant pv ON p.id = pv.id_pro 
    JOIN productpro_size ps ON pv.id_size = ps.id 
    JOIN productp_color pc ON pv.id_color = pc.id 
    LEFT JOIN productpro_image pi ON p.id = pi.idpro 
    WHERE pv.id_pro = '$id'
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
    GROUP_CONCAT(ip.img) AS imagesphu
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
    GROUP_CONCAT(ip.img) AS imagesphu
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

function timkiem($ten){
    $sql = "SELECT * FROM product WHERE ten_sach LIKE '%" . $ten . "%'";
    $result = pdo_query($sql);
    return $result;
}

function list3sp(){
    $sql = "SELECT * FROM product  LIMIT 3  ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

?>

