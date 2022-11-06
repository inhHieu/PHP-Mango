<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin
$SP_ID = $_POST['Ma_SP'];

$sql = 'UPDATE san_pham 
    SET Ten_SP="' . $_POST["tenSP"] . '" ,
        Ma_HSX="' .$_POST["hangSX"] . '" ,
        Ma_Loai="' . $_POST["loaiSP"] . '" ,
        Don_Gia="' . $_POST["donGia"] . '"
    WHERE Ma_SP="' . $SP_ID . '";';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data changed successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $conn->error;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
