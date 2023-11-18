<?php
include ("../model/sanpham.php");
include ("../model/danhmuc.php");
include ("../model/khachang.php");
include ("../model/dathang.php");
include ("../model/pdo.php");
include ("header.php");
$listdh1=ht_donhang();
$listsp =product();
$listdanhmuc = loadAll_danhmuc();
$listmau = productp_color();
$listsize =  productpro_size();
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
                insert_product($ten_sach,$hinh_anh,$mo_ta,$gia_ca,$id_danh_muc);
                $thongbao3 = "Thêm sản phẩm mới thành công";
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
            $listsp =  loatAll_sanpham($kyw,$iddm);
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
                $sp = loadone_product($_GET['id']);
            }
            $listdanhmuc =loadAll_danhmuc();
            include ("sach/update.php");
            break;
        case 'upsp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']){
                $id = $_POST['id'];
                $ten_sach = $_POST['tensp'];
                $gia_ca = $_POST['giasp'];
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
                update_sp($id,$ten_sach,$gia_ca,$hinh_anh,$mo_ta,$id_danh_muc);
                $thongbao6 = "thêm thành công";
            }
            $listdanhmuc = loadAll_danhmuc();
            $listsp = loatAll_sanpham("", 0);
            include ("sach/list.php");
        case 'mau':
            if (isset($_POST['gui'])) {
                $mau = $_POST['mau'];
                mau($mau);
                $thongbao2 = "Thêm màu thành công";
            }
            include ("sach/add.php");
            break;
        case 'size':
            if (isset($_POST['gui'])) {
                $size = $_POST['size'];
                size($size);
                $thongbao1 = "Thêm size thành công";
            }
            include ("sach/add.php");
            break;
        case 'anh':
            if (isset($_POST['gui'])) {
                $id = $_POST['id'];
                if(empty($_FILES['anh']['name'])){
                    $anh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['anh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['anh']['tmp_name'],$targetFile)){
                            $anh = $targetFile ;
                        }
                    }
                }
                anh($id,$anh);
                $thongbao4 = "Thêm ảnh phụ thành công";
            }
            include ("sach/add.php");
            break;
        case 'spbt':
            if (isset($_POST['gui'])) {
                $id = $_POST['id'];
                $id1 = $_POST['id1'];
                $id2 = $_POST['id2'];
                $soluong = $_POST['soluong'];
                spbt($id,$id1,$id2,$soluong);
                $thongbao5 = "Thêm sản phẩm biến thể thành công";
            }
            include ("sach/add.php");
            break;
        case 'khachhang':
                $listkhachhang = khachhang();
            include ("khachhang/khachhang.php");
            break;
        case 'binhluan':
            $listbinhluan = binhluan();
            include ("binhluan.php");
            break;
        case 'thongke':
            $listthongke=thongke();
            include "thongke/thongke.php";
            break;
        case 'donhang':
            $listdh1=ht_donhang();
            include ("donhang/donhang.php");
            break;
        case 'tinhtrang':
            if (isset($_POST['gui'])) {
                $id=$_GET['id'];
                $tinhtrang=$_POST['tinhtrang'];
                capnhat($id,$tinhtrang);
            }
            include ("donhang/donhang.php");
            break;
        default:
    }
}else{
    include ("home.php");
}
include  ("footer.php");
?>