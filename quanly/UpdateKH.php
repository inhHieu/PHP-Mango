<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin
$_POST["gioiTinh"] == "Nam" ? $gt = 1 : $gt = 0;
$sql = 'UPDATE khach_hang 
    SET Ten_KH="' . $_POST["tenKH"] . '" ,
        Gioi_Tinh="' . $gt . '" ,
        Dia_Chi="' . $_POST["diaChi"] . '" ,
        SDT="' . $_POST["sdt"] . '" ,
        Email="' . $_POST["email"] . '" ,
        Tai_Khoan="' . $_POST["tk"] . '" ,
        Mat_Khau="' . $_POST["mk"] . '" ,
        Ma_CV="' . $_POST["maCV"] . '"
    WHERE Ma_KH="' . $_POST['Ma_KH'] . '";';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data changed successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $conn->error;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
