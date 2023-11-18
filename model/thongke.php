<?
function thongke(){
    $sql="SELECT 
            danh_muc.id AS madm, 
            danh_muc.ten_danh_muc AS tendm, 
            COUNT(product.id) AS countsp, 
            MIN(product.price) AS minprice, 
            MAX(product.price) AS maxprice, 
            AVG(product.price) AS avgprice
        FROM 
            danh_muc
        LEFT JOIN 
            product ON danh_muc.id = product.loai
        GROUP BY 
            danh_muc.id, danh_muc.ten_danh_muc
        ORDER BY 
            danh_muc.id DESC;
        ";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>
