<?php
session_start();
include ("../model/pdo.php");
include ("../model/dathang.php");
include ("../model/danhmuc.php");
include ("../model/giohang.php");
include ("../model/sanpham.php");
include ("../model/taikhoan.php");
include ("../model/binhluan.php");
$list3sp = list3sp();
$list6dm = list6dm();
$list1dm = list2dm();
$list8sp=load8_sanpham();
$listsp=loadall_sanpham(0);
$listdm = loadAll_danhmuc();
if (isset($_SESSION['userxuong'])){
    extract($_SESSION['userxuong']);
    $listdh1=ht_donhang(0,$_SESSION['userxuong']['id']);
}
if (isset($_SESSION['userxuong'])){
    extract($_SESSION['userxuong']);
    $listgh = loadall_giohang($_SESSION['userxuong']['id']);
}else{
    $listgh = loadall_giohang(0);
}
if (isset($_SESSION['userxuong'])){
    extract($_SESSION['userxuong']);
    $spyt=loadall_spyt($_SESSION['userxuong']['id']);
}else{
    $spyt=loadall_spyt(0);
}
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
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listgh = loadall_giohang($_SESSION['userxuong']['id']);
                    if (sizeof($listgh) == 0) {
                        header('Location:index.php?act=sanpham');
                    }else{
                        include("giaodien/header1.php");
                        include ("thanhtoan.php");
                    }
                }
                break;
            case 'sanphamct' :
                    if (isset($_GET['idpro'])) {
                        $loadsp = loadone_sanpham($_GET['idpro']);
                        luotxem($_GET['idpro']);
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
                    header('Location:index.php?aht=dndk');
                }
                break;
            case 'dangnhap' :
                if ($_SERVER["REQUEST_METHOD"] == "POST" ){
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $check = check($taikhoan,$matkhau);
                    if (is_array($check)){
                        $_SESSION['userxuong'] = $check;
                    }
                    header("Location: index.php");
                }
                include("giaodien/header1.php");
                include("giaodien/home.php");
                break;
            case 'capnhat':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $dia_chi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $taikhoan = $_POST['tk'];
                    $matkhau = $_POST['mk'];
                    update_tk($id, $name, $dia_chi, $email, $sdt, $taikhoan, $matkhau);
                    $check = check($taikhoan, $matkhau);
                    if (is_array($check)) {
                        $_SESSION['userxuong'] = $check;
                        echo ' <script>
                        alert("Cập nhật thành công ");
                    </script>';
                        include("giaodien/header1.php");
                        include("giaodien/home.php");
                    }
                }
                include("giaodien/header1.php");
                include("tkcuatoi.php");
                break;
            case 'tkcuatoi' :
                include("giaodien/header1.php");
                include("tkcuatoi.php");
                break;
            case 'dangxuat' :
                if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                    session_unset();
                    header("Location: index.php");
                }
                include("giaodien/header1.php");
                include("giaodien/home.php");
                break;
            case 'gh':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listgh = loadall_giohang($_SESSION['userxuong']['id']);
                    if (isset($_POST['giohang']) && $_POST['giohang']) {
                        $idsp = $_POST['idsp'];
                        $idtk = $_POST['idtk'];
                        $ten_sach = $_POST['name'];
                        $gia_ca = $_POST['giaca'];
                        $mo_ta = $_POST['mota'];
                        $hinhload = $_POST['hinh'];
                        $so_luong = $_POST['soluong'];
                        $selected_size = $_POST['selected_size'];
                        $selected_color = $_POST['selected_color'];
                        update_giohang($idsp,$idtk,$ten_sach,$selected_color,$selected_size,$mo_ta,$gia_ca,$hinhload,$so_luong);
                        header("Location: index.php?act=gh");
                    }
                    include("giaodien/header1.php");
                    include("giohang.php");
                }else{
                    header('Location:index.php?aht=dndk');
                }
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
                        $listsp = loadall_sanpham($_GET['idpro']);
                    }
                    include("giaodien/header1.php");
                    include("sanpham.php");
                break;
            case 'xoaspgh':
                if (isset($_GET['id']) && $_GET['id']) {
                    xoaspgh($_GET['id']);
                    header("Location: index.php?act=gh");
                }
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listgh = loadall_giohang($_SESSION['userxuong']['id']);
                }
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
                    update($ten_sach, $selected_color, $selected_size, '', $gia_ca, '', $so_luong);
                }
                break;
            case 'tim':
                if (isset($_POST['timkiem'])) {
                    $timkiem = $_POST['tim1'];
                    $listsp = timkiem($timkiem);
                    include("giaodien/header1.php");
                    include ("sanpham.php");
                } else {
                    include("giaodien/header1.php");
                    include("home.php");
                }
                break;
            case 'spyeuthich':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    if (isset($_GET['id']) && isset($_GET['idtk'])) {
                        $idsp = $_GET['id'];
                        $idtk = $_GET['idtk'];
                        spyeuthich($idsp,$idtk);
                        header("location:index.php?act=spyeuthich");
                    }
                    include("giaodien/header1.php");
                    include("spyeuthich.php");
                }else{
                    header('Location:index.php?aht=dndk');
                }
                break;
            case 'xoaspyt':
                if (isset($_GET['id'])){
                    xoaspyt($_GET['id']);
                    header("location:index.php?act=spyeuthich");
                }
                include("giaodien/header1.php");
                include("spyeuthich.php");
                break;
            case 'khoadon':
                if (isset($_POST['dathang'])) {
                    $name = $_POST['name'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $ghichu = $_POST['ghichu'];
                    $ptvc = $_POST['phuong_thuc_vanchuyen'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('Y-m-d H:i:s');
                    $pttt = $_POST['redirect'];
                    if ($pttt == "momo"){
                            echo '<script> window.location.href = "init_payment_vnpay.php" </script>';
                    }else{
                    } $id_don_hang = donhang($name, $diachi, $email, $sdt, $ghichu, $ngaydathang, $ptvc, $pttt);
                    if (isset($_SESSION['userxuong'])) {
                        extract($_SESSION['userxuong']);
                        $listgh = loadall_giohang($_SESSION['userxuong']['id']);
                        foreach ($listgh as $gh) {
                            donmua($gh['idtk'],$gh['idsp'],  $gh['mau'], $gh['sizesp'], $gh['so_luong'],$gh['thanhtien'], $id_don_hang,0);
                            capnhatsl($gh['idsp'],$gh['sizesp'],$gh['mau'],$gh['so_luong']);
                        }
                        xoagh($_SESSION['userxuong']['id']);
                    }
                }
                include("giaodien/header1.php");
                include ("checkout.php");
                break;
            case 'chitiet':
                if (isset($_GET['id'])){
                    if (isset($_SESSION['userxuong'])){
                        extract($_SESSION['userxuong']);
                        $listdh1=ht_donhang($_GET['id'],$_SESSION['userxuong']['id']);
                    }
                }
                include("giaodien/header1.php");
                include ("donhang/chitietdonhang.php");
                break;
            case 'tinhtrang':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    capnhatdh($id,$_GET['tinhtrangdh']);
                    capnhatdm($id,$_GET['tinhtrangdm']);
                    header("location:index.php?act=tkcuatoi");
                }
                include("giaodien/header1.php");
                include ("donhang/chitietdonhang.php");
                break;
            case 'xacnhandon':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listdh=tinhtrangdh(1,$_SESSION['userxuong']['id']);
                }
                include("giaodien/header1.php");
                include ("donhang/xacnhandon.php");
                break;
            case 'choxacnhan':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listdh=tinhtrangdh(0,$_SESSION['userxuong']['id']);
                }
                include("giaodien/header1.php");
                include ("donhang/choxacnhan.php");
                break;
            case 'danggiao':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listdh=tinhtrangdh(2,$_SESSION['userxuong']['id']);
                }
                include("giaodien/header1.php");
                include ("donhang/danggiao.php");
                break;
            case 'giaothanhcong':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listdh=tinhtrangdh(3,$_SESSION['userxuong']['id']);
                }
                include("giaodien/header1.php");
                include ("donhang/thanhcong.php");
                break;
            case 'donhuy':
                if (isset($_SESSION['userxuong'])){
                    extract($_SESSION['userxuong']);
                    $listdh=tinhtrangdh(4,$_SESSION['userxuong']['id']);
                }
                include("giaodien/header1.php");
                include ("donhang/donhuy.php");
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
