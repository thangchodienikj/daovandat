<?php
session_start();
if (isset($_SESSION['userxuong'])) {
    include("../model/sanpham.php");
    include("../model/danhmuc.php");
    include("../model/khachang.php");
    include("../model/taikhoan.php");
    include("../model/dathang.php");
    include("../model/thongke.php");
    include("../model/pdo.php");
    include("header.php");
    $listsp1 = product();
    $listdanhmuc = loadAll_danhmuc();
    $listmau = productp_color();
    $listsize = productpro_size();
    $listsp=loadall_sanpham(0);
    function addError($field, $message) {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = [];
        }
        $_SESSION['error'][$field] = $message;
    }
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                if (isset($_POST['themmoi'])) {
                    $tendanhmuc = $_POST['tenloai'];

                    if (empty($tendanhmuc)) {
                        addError('tenloai', 'Vui lòng nhập Tên Loại.');
                    }

                    if (empty($_FILES['hinh']['name'])) {
                        $hinh = "";
                        addError('hinh', 'Vui lòng chọn Ảnh danh mục.');
                    } else {
                        if (!isset($_SESSION['imageError'])) {
                            // thư mục sẽ được lưu ảnh vào thư mục image
                            $targettOir = "../upload/";
                            // đường dẫn đến file được lưu
                            $targetFile = $targettOir . $_FILES['hinh']['name'];
                            // tiếng hành upload file ảnh
                            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetFile)) {
                                $hinh = $targetFile;
                            }
                        }
                    }

                    if (!isset($_SESSION['error'])) {
                        insert_danhmuc($tendanhmuc, $hinh);
                        echo '<script> 
                                alert("Thêm thành công danh mục");
                                window.location.href = "index.php?act=listdm"
                                </script>';

                    }else{
                        echo '<script> 
                                alert("Vui lòng nhập hết các trường đi nhé");
                                window.location.href = "index.php?act=adddm"
                                </script>';
                    }
                }else{
                    include "danhmuc/add.php";
                }
                break;
            case 'listdm':
                if (isset($_SESSION['userxuong'])) {
                    extract($_SESSION['userxuong']);
                    $listdanhmuc = loadAll_danhmuc();
                    include("danhmuc/list.php");
                }
                break;
            case 'thongkedm':
                $listtk = thongke();
                include "danhmuc/thongkedm.php";
                break;
            case 'xoadm':
                if (isset($_GET['id'])) {
                    xoa_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadAll_danhmuc();
                include("danhmuc/list.php");
                break;
            case 'suadm':
                if (isset($_GET['id'])) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include("danhmuc/update.php");
                break;
            case 'update':
                if (isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tendanhmuc = $_POST['tenloai'];
                    if(empty($tendanhmuc)){
                        addError('tendm','Vui lòng nhập trường này');
                    }
                    if (empty($_FILES['hinh']['name'])) {
                        $hinh = "";
                    }else {
                        if (!isset($_SESSION['imageError'])) {
                            // thư mục sẽ được lưu ảnh vào thư mục image
                            $targettOir = "../upload/";
                            // đường dẫn đến file được lưu
                            $targetFile = $targettOir . $_FILES['hinh']['name'];
                            // tiếng hành upload file ảnh
                            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetFile)) {
                                $hinh = $targetFile;
                            }
                        }
                    }
                    if(!isset($_SESSION['error'])){
                        update_danhmuc($id, $tendanhmuc, $hinh);
                        echo '<script> 
                                alert("Sửa danh mục thành công")
                                window.location.href = "index.php?act=listdm"
                                </script>';
                    }else{
                        echo '<script> 
                                alert("Bạn đang để trống 1 vài trường nào đó ")
                                window.location.href = "index.php?act=listdm"
                                </script>';
                    }

                }else{
                    $listdanhmuc = loadAll_danhmuc();
                    include("danhmuc/list.php");
                }
                break;
            case 'addsp':
                if (isset($_POST['themmoi'])) {
                    $ten_sach = $_POST['tensp'];
                    $gia_ca = $_POST['giasp'];
                    $mo_ta = $_POST['mota'];
                    $id_danh_muc = $_POST['iddm'];
                    if(empty($ten_sach)){
                        addError('tensach','Vui lòng nhập tên sản phẩm');
                    }
                    if(empty($gia_ca)){
                        addError('giaca','Vui lòng nhập giá cả');
                    }else if($gia_ca < 0){
                        addError('giaca', 'Giá cả phải lớn hơn 0');
                    }
                    if(empty($mo_ta)){
                        addError('mota','Vui lòng nhập mota');
                    }
                    if(empty($id_danh_muc)){
                        addError('iddm','Vui lòng nhập danh mục');
                    }
                    if (empty($_FILES['hinh']['name'])) {
                        $hinh_anh = "";
                        addError('hinh','Vui lòng nhập ảnh');
                    } else {
                        if (!isset($_SESSION['imageError'])) {
                            // thư mục sẽ được lưu ảnh vào thư mục image
                            $targettOir = "../upload/";
                            // đường dẫn đến file được lưu
                            $targetFile = $targettOir . $_FILES['hinh']['name'];
                            // tiếng hành upload file ảnh
                            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetFile)) {
                                $hinh_anh = $targetFile;
                            }
                        }
                    }

                    if(!isset($_SESSION['error'])){
                        insert_product($ten_sach, $hinh_anh, $mo_ta, $gia_ca, $id_danh_muc);
                        echo '<script> 
                                alert("Thêm sản phẩm thành công")
                                window.location.href = "index.php?act=listsp" 
                            </script>';
                    }else{
                        echo '<script> 
                                alert("Có vẻ bạn quên 1 vài trường nào đó")
                                window.location.href = "index.php?act=addsp" 
                            </script>';
                    }
                }else{
                    $listdanhmuc = loadAll_danhmuc();
                    include("sach/add.php");
                }
                break;
            case 'add1':
                include("sach/add1.php");
                break;
            case 'add2':
                include("sach/add2.php");
                break;
            case 'add3':
                include("sach/add3.php");
                break;
            case 'listsp':
                if (isset($_POST['listok']) && $_POST['listok']) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = "";
                    $iddm = 0;
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsp = loatAll_sanpham($kyw, $iddm);
                include "sach/list.php";
                break;
            case 'thongkesp':
                $thongkesp = thongke_sanpham(0);
                include("sach/thongkesanpham.php");
                break;
            case 'thongketg':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tg = $_POST["tg"];
                    $thongkesp = thongke_sanpham($tg);
                }
                include("sach/thongkesanpham.php");
                break;
            case 'xoasp':
                if (isset($_GET['id'])) {
                    xoa_sp($_GET['id']);
                }
                $listsp = loatAll_sanpham("", 0);
                include("sach/list.php");
                break;
            case 'suasp':
                if (isset($_GET['id'])) {
                    $sp = loadone_product($_GET['id']);
                }
                $listdanhmuc = loadAll_danhmuc();
                include("sach/update.php");
                break;
            case 'upsp':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $ten_sach = $_POST['tensp'];
                    $gia_ca = $_POST['giasp'];
                    $mo_ta = $_POST['mota'];
                    $id_danh_muc = $_POST['iddm'];
                    if (empty($_FILES['hinh']['name'])) {
                        $hinh_anh = "";
                    } else {
                        if (!isset($_SESSION['imageError'])) {
                            // thư mục sẽ được lưu ảnh vào thư mục image
                            $targettOir = "../upload/";
                            // đường dẫn đến file được lưu
                            $targetFile = $targettOir . $_FILES['hinh']['name'];
                            // tiếng hành upload file ảnh
                            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetFile)) {
                                $hinh_anh = $targetFile;
                            }
                        }
                    }
                    update_sp($id, $ten_sach, $gia_ca, $hinh_anh, $mo_ta, $id_danh_muc);
                    $thongbao6 = "thêm thành công";
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsp = loatAll_sanpham("", 0);
                include("sach/list.php");
            case 'mau':
                if (isset($_POST['gui'])) {
                    $mau = $_POST['mau'];
                    mau($mau);
                    $thongbao2 = "Thêm màu thành công";
                }
                include("sach/add1.php");
                break;
            case 'size':
                if (isset($_POST['gui'])) {
                    $size = $_POST['size'];
                    size($size);
                    $thongbao1 = "Thêm size thành công";
                }
                include("sach/add1.php");
                break;
            case 'anh':
                if (isset($_POST['gui'])) {
                    $id = $_POST['id'];
                    if (empty($_FILES['anh']['name'])) {
                        $anh = "";
                    } else {
                        if (!isset($_SESSION['imageError'])) {
                            // thư mục sẽ được lưu ảnh vào thư mục image
                            $targettOir = "../upload/";
                            // đường dẫn đến file được lưu
                            $targetFile = $targettOir . $_FILES['anh']['name'];
                            // tiếng hành upload file ảnh
                            if (move_uploaded_file($_FILES['anh']['tmp_name'], $targetFile)) {
                                $anh = $targetFile;
                            }
                        }
                    }
                    anh($id, $anh);
                    $thongbao4 = "Thêm ảnh phụ thành công";
                }
                include("sach/add2.php");
                break;
            case 'spbt':
                if (isset($_POST['gui'])) {
                    $id = $_POST['sanpham'];
                    $id1 = $_POST['id1'];
                    $id2 = $_POST['id2'];
                    $soluong = $_POST['soluong'];

                    if (empty($id)) {
                        addError('sanpham', 'Vui lòng nhập sản phẩm');
                    }

                    if (empty($id1)) {
                        addError('size', 'Vui lòng nhập size.');
                    }

                    if (empty($id2)) {
                        addError('mau', 'Vui lòng nhập màu');
                    }

                    if (empty($id2)) {
                        addError('soluong', 'Vui lòng nhập số lượng');
                    }else if($soluong < 0 ){
                        addError('soluong', 'Số lượng phải lớn hơn 0');

                    }

                    if (!isset($_SESSION['error'])) {
                        spbt($id, $id1, $id2, $soluong);
                        echo '<script> 
                            alert("Thêm thành công sản phẩm biến thể");
                            window.location.href = "index.php?act=listsp"
                            </script>';

                    }else {
                        echo '<script> 
                            alert("Vui lòng nhập hết các trường đi nhé");
                            window.location.href = "index.php?act=add3"
                            </script>';
                    }
                }else {
                    include("sach/add3.php");
                }
                break;
            case 'khachhang':
                $listkhachhang = khachhang(0);
                include("khachhang/khachhang.php");
                break;
            case 'suakh':
                if (isset($_GET['id'])) {
                    $listkhachhang = khachhang($_GET['id']);
                }
                include("khachhang/suakh.php");
                break;
            case 'updk':
                if (isset($_POST['capnhat'])) {
                    $name = $_POST['name'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $tk = $_POST['tk'];
                    $mk = $_POST['mk'];
                    $id = $_POST['id'];
                    $sdt = $_POST['sdt'];
                    update_tk($id,$name,$diachi,$email,$sdt,$tk,$mk);
                }
                $listkhachhang = khachhang(0);
                include("khachhang/khachhang.php");
                break;
            case 'xoakh':
                if (isset($_GET['id'])) {
                    xoakh($_GET['id']);
                }
                $listkhachhang = khachhang(0);
                include("khachhang/khachhang.php");
                break;
            case 'binhluan':
                $listbinhluan = binhluan();
                include("binhluan.php");
                break;
            case "thongkedh":
                $thongkedh = thongke_donhang();
                include("donhang/thongkedh.php");
                break;
            case 'thongke':
                include("thongke.php");
                break;
            case 'donhang':
                $listdh1 = ht_donhangadmin();
                include("donhang/donhang.php");
                break;
            case 'tinhtrang':
                if (isset($_POST['gui'])) {
                    $id = $_POST['id'];
                    capnhatdh($id, $_POST['tinhtrangdh']);
                    echo '<script> window.location.href = "index.php?act=donhang" </script>';
                }
                include("donhang/donhang.php");
                break;
            case 'dangxuat' :
                if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                    session_unset();
                    echo '<script> window.location.href = "../view" </script>';
                }
                break;
            default:
        }
    } else {
        include("home.php");
    }
    include("footer.php");
}
?>