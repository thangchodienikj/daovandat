<?php

$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/duan1/view/index.php?act=khoadon";
$vnp_TmnCode = "CYJUJXQZ"; // Mã website tại VNPAY
$vnp_HashSecret = "LSKSQTRMHQEWLDGIAIKBYYLXXQAHKWRE"; // Chuỗi bí mật

$vnp_TxnRef = time(); // Sử dụng thời gian hiện tại làm mã đơn hàng (có thể sử dụng cách khác nếu cần)
$vnp_OrderInfo = 'Thanh toán đơn hàng';
$vnp_OrderType = 'BarBer Shop';
$vnp_Amount = 200000 * 100;
$vnp_Locale = 'VN';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = http_build_query($inputData);
$hashdata = http_build_query($inputData, '', '&');

$vnp_Url = $vnp_Url . "?" . $query;

if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
}

$returnData = array('code' => '00', 'message' => 'success', 'data' => $vnp_Url);

header('Location: ' . $vnp_Url);
die();
?>
