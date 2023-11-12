<?php
session_start();
include ("../model/pdo.php");
include ("../model/danhmuc.php");
include ("../model/giohang.php");
include ("../model/sanpham.php");
include ("../model/taikhoan.php");
include ("../model/binhluan.php");
$list3sp = list3sp();
$list6dm = list6dm();
$list1dm = list2dm();
$listsp=loadall_sanpham(0);
$listdm = loadAll_danhmuc();
$loadgh = loadall_giohang();
if (isset($_GET['aht'])){
    $aht = $_GET['aht'];
    switch ($aht) {
        case 'dndk' :
            include("taikhoan/tkmk.php");
            break;
        case 'quenmk':
            include("taikhoan/quenmk.php");
            break;
        case 'hienthi':
            if (isset($_POST['hienthi'])){
            $email = $_POST['email'];
            $thongtin = quenmk($email);
        }
            include("taikhoan/hienthitkmk.php");
            break;
        default;
    }
}else{
    include("giaodien/header.php");
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham' :
                $listsp=loadall_sanpham(0);
                include("giaodien/header1.php");
                include ("sanpham.php");
                break;
            case 'thanhtoan' :
                include("giaodien/header1.php");
                include ("thanhtoan.php");
                break;
            case 'sanphamct' :
                if (isset($_GET['idpro'])){
                    $loadsp= loadone_sanpham($_GET['idpro']);
                }
                include("giaodien/header1.php");
                $binhluan=binhluan($_GET['idpro']);
                include ("chitietsp.php");
                break;
            case 'binhluan':
                if (isset($_POST['gui']) && $_POST['gui']) {
                    $idsp = $_GET['idpro'];
                    $rating = $_POST['rating'];
                    $binhluan = $_POST['binhluan'];
                    $name = $_POST['name'];
                    $ngaybinhluan = date('h:i:sa d/m/Y');
                    isert_bl($idsp, $rating, $binhluan, $name, $ngaybinhluan);
                }
                $loadsp= loadone_sanpham($_GET['idpro']);
                $binhluan=binhluan($_GET['idpro']);
                include("giaodien/header1.php");
                include ("chitietsp.php");
                break;
            case 'dangky' :
                if ($_SERVER["REQUEST_METHOD"] == "POST" ){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $dia_chi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    dangky($name,$dia_chi,$email,$sdt,$taikhoan,$matkhau);
                    echo '<script>
                        alert("Đăng ký thành công mời bạn đăng nhập")
                    </script>';
                }
                include("giaodien/header1.php");
                include("giaodien/home.php");
                break;
            case 'dangnhap' :
                if ($_SERVER["REQUEST_METHOD"] == "POST" ){
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $check = check($taikhoan,$matkhau);
                    if (is_array($check)){
                        $_SESSION['userxuong'] = $check;
                    }
                }
                include("giaodien/header1.php");
                include("giaodien/home.php");
                break;
            case 'tkcuatoi' :
                include("giaodien/header1.php");
                include("tkcuatoi.php");
                break;
            case 'dangxuat' :
                session_unset();
                include("giaodien/header1.php");
                include("giaodien/home.php");
                break;

            case 'gh':
                if (isset($_POST['giohang']) && $_POST['giohang']) {
                    $ten_sach = $_POST['name'];
                    $gia_ca = $_POST['giaca'];
                    $mo_ta = $_POST['mota'];
                    $hinhload = $_POST['hinh'];
                    $so_luong = $_POST['soluong'];
                    $selected_size = $_POST['selected_size'];
                    $selected_color = $_POST['selected_color'];
                    update_giohang($ten_sach,$selected_color,$selected_size,$mo_ta,$gia_ca,$hinhload,$so_luong);
                }
                $listgh = loadall_giohang();
                include("giaodien/header1.php");
                include("giohang.php");
                break;
            case 'xet':
                if (isset($_GET['id'])) {
                    switch ($_GET['id']) {
                        case 1:
                            $listdm = loadAll_danhmuc();
                            $listsp=loadall_sanpham(0);
                            break;
                        case 2:
                            $listdm = loadAll_danhmuc();
                            $listsp=tang();
                            break;
                        case 3:
                            $listdm = loadAll_danhmuc();
                            $listsp=giam();
                            break;
                        default:
                            break;
                    }
                }
                include("giaodien/header1.php");
                include("sanpham.php");
                break;
            case 'danhmuc':
                if (isset($_GET['idpro'])) {
                    $listdm = loadAll_danhmuc();
                    $listsp= loadall_sanpham($_GET['idpro']);
                }
                include("giaodien/header1.php");
                include("sanpham.php");
                break;
            case 'xoaspgh':
                if (isset($_GET['id']) && $_GET['id']) {
                    xoaspgh($_GET['id']);
                    header("Location: index.php?act=gh");
                }
                $listgh = loadall_giohang();
                include("giaodien/header1.php");
                include("giohang.php");
                break;
            case 'themsl':
                if (isset($_POST['action']) && $_POST['action'] === 'update_giohang') {
                    $ten_sach = $_POST['ten_sach'];
                    $so_luong = $_POST['quantity'];
                    $selected_color = $_POST['mau'];
                    $selected_size = $_POST['size'];
                    $gia_ca = $_POST['price'];
                    echo "
                        <script>
                        console.log('$ten_sach');
                        console.log('$gia_ca');
                        console.log('$selected_color');
                        console.log('$selected_size');
                        console.log('$so_luong');
                        console.log('true');
                    </script>
                    ";
                    update($ten_sach, $selected_color, $selected_size, '', $gia_ca, '', $so_luong);
                }
                break;
                 default;
        }
    } else {
        include("giaodien/header1.php");
        include("giaodien/home.php");
    }
    include("giaodien/footer.php");
}
?>
