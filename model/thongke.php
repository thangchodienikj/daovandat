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

function thongke_sanpham($tg){
    if ($tg == 0) {
        $sql = "SELECT p.price, p.id, p.name, p.luotxem,
        COUNT(DISTINCT bl.id) as binhluan,
        SUM(DISTINCT dm.soluong) as luotmua
        FROM product as p
        LEFT JOIN binhluan as bl ON bl.idsp = p.id
        LEFT JOIN don_mua as dm ON p.id = dm.idsp
        LEFT JOIN don_hang as dh ON dh.id = dm.id_don_mua
        GROUP BY p.id, p.price, p.name, p.luotxem
        ORDER BY luotmua DESC, luotxem DESC, binhluan DESC;
        ";
    } else if ($tg == 1) {
        $sql="SELECT p.price, p.id, p.name, p.luotxem,
        COUNT(DISTINCT bl.id) as binhluan,
        SUM(DISTINCT dm.soluong) as luotmua
        FROM product as p
        LEFT JOIN binhluan as bl ON bl.idsp = p.id
        LEFT JOIN don_mua as dm ON p.id = dm.idsp
        LEFT JOIN don_hang as dh ON dh.id = dm.id_don_mua
         WHERE dh.ngaydathang BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()
         GROUP BY p.id, p.price, p.name, p.luotxem
         ORDER BY luotmua DESC, luotxem DESC, binhluan DESC;
        ";
    } else if ($tg == 2) {
        $sql = "SELECT p.price, p.id, p.name, p.luotxem,
        COUNT(DISTINCT bl.id) as binhluan,
        SUM(DISTINCT dm.soluong) as luotmua,
        COUNT(DISTINCT dh.id) as sodonmua
        FROM product as p
        LEFT JOIN binhluan as bl ON bl.idsp = p.id
        LEFT JOIN don_mua as dm ON p.id = dm.idsp
        LEFT JOIN don_hang as dh ON dh.id = dm.id_don_mua
        WHERE dh.ngaydathang BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()
        GROUP BY p.id, p.price, p.name, p.luotxem
        ORDER BY luotmua DESC, luotxem DESC, binhluan DESC;
        ";
    } else if ($tg == 3) {
        $sql = "SELECT p.price, p.id, p.name, p.luotxem,
        COUNT(DISTINCT bl.id) as binhluan,
        SUM(DISTINCT dm.soluong) as luotmua
        FROM product as p
        LEFT JOIN binhluan as bl ON bl.idsp = p.id
        LEFT JOIN don_mua as dm ON p.id = dm.idsp
        LEFT JOIN don_hang as dh ON dh.id = dm.id_don_mua
        WHERE dh.ngaydathang BETWEEN DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOW()
        GROUP BY p.id, p.price, p.name, p.luotxem
        ORDER BY luotmua DESC, luotxem DESC, binhluan DESC;
        ";
    } else if ($tg == 4) {
        $sql = "SELECT p.price, p.id, p.name, p.luotxem,
        COUNT(DISTINCT bl.id) as binhluan,
        SUM(DISTINCT dm.soluong) as luotmua
        FROM product as p
        JOIN binhluan as bl ON bl.idsp = p.id
        JOIN don_mua as dm ON p.id = dm.idsp
        JOIN don_hang as dh ON dh.id = dm.id_don_mua
        WHERE dh.ngaydathang BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()
        GROUP BY p.id, p.price, p.name, p.luotxem
        ORDER BY luotmua DESC, luotxem DESC, binhluan DESC;
        ";
    }
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

