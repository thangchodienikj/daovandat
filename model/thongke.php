<?php
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
    return pdo_query($sql);

}

function thongke_sanpham(){
    $sql = "";
    return pdo_query($sql);
}

function thongke_donhang(){
    $sql = "SELECT 
                COUNT(*) AS totalOrders,
                SUM(CASE WHEN tinhtrangdh = 3 THEN 1 ELSE 0 END) AS successfulOrders,
                SUM(CASE WHEN tinhtrangdh = 0 THEN 1 ELSE 0 END) AS newOrders,
                SUM(CASE WHEN tinhtrangdh = 1 THEN 1 ELSE 0 END) AS processingOrders,
                SUM(CASE WHEN tinhtrangdh = 2 THEN 1 ELSE 0 END) AS deliveringOrders
            FROM 
                don_hang";

    return pdo_query($sql);
}

