<?php

include ("../model/danhmuc.php");
include ("../model/pdo.php");
include ("header.php");
if (isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act){
        case 'adddm':
            if (isset($_POST['themmoi'])){
                $tendanhmuc = $_POST['tenloai'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh = $targetFile ;
                        }
                    }
                }
                insert_danhmuc($tendanhmuc,$hinh);
                $thongbao = "thêm thành công";
            }
            include ("danhmuc/add.php");
            break;
        case 'listdm':
            $listdanhmuc = loadAll_danhmuc();
            include ("danhmuc/list.php");
            break;
        case 'xoadm':
            if (isset($_GET['id'])){
                xoa_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadAll_danhmuc();
            include ("danhmuc/list.php");
            break;
        case 'suadm':
            if (isset($_GET['id'])){
                $dm = loadone_danhmuc($_GET['id']);
            }
            include ("danhmuc/update.php");
            break;
        case 'update':
            if (isset($_POST['capnhat'])){
                $id = $_POST['id'];
                $tendanhmuc = $_POST['tenloai'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh = $targetFile ;
                        }
                    }
                }
                update_danhmuc($id,$tendanhmuc,$hinh);
                $thongbao = "thêm thành công";
            }
            $listdanhmuc = loadAll_danhmuc();
            include ("danhmuc/list.php");
            break;
        case 'addsp':
            if (isset($_POST['themmoi'])){
                $ten_sach= $_POST['tensp'];
                $gia_ca = $_POST['giasp'];
                $so_luong = $_POST['soluong'];
                $mo_ta = $_POST['mota'];
                $id_danh_muc = $_POST['iddm'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh_anh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh_anh = $targetFile ;
                        }
                    }
                }
                insert_sach($ten_sach,$gia_ca,$so_luong,$hinh_anh,$mo_ta,$id_danh_muc);
                $thongbao = "thêm thành công";
            }
            $listdanhmuc = loadAll_danhmuc();
            include ("sach/add.php");
            break;
        case 'listsp':
            if(isset($_POST['listok']) && $_POST['listok']) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            }else{
                $kyw = "";
                $iddm = 0;
            }
            $listdanhmuc =loadAll_danhmuc();
            $listsp = loatAll_sanpham($kyw, $iddm);
            include "sach/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id'])){
                xoa_sp($_GET['id']);
            }
            $listsp = loatAll_sanpham("", 0);
            include ("sach/list.php");
            break;
        case 'suasp':
            if (isset($_GET['id'])){
                $sp = loadone_sp($_GET['id']);
            }
            $listdanhmuc =loadAll_danhmuc();
            include ("sach/update.php");
            break;
        case 'upsp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']){
                $id = $_POST['id'];
                $ten_sach = $_POST['tensp'];
                $gia_ca = $_POST['giasp'];
                $so_luong = $_POST['soluong'];
                $mo_ta = $_POST['mota'];
                $id_danh_muc = $_POST['iddm'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh_anh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh_anh = $targetFile ;
                        }
                    }
                }
                update_sp($id,$ten_sach,$gia_ca,$so_luong,$hinh_anh,$mo_ta,$id_danh_muc);
                $thongbao = "thêm thành công";
            }
            $listdanhmuc = loadAll_danhmuc();
            $listsp = loatAll_sanpham("", 0);
            include ("sach/list.php");
    }
}else{
    include ("home.php");
}
include  ("footer.php");
?>