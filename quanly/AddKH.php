<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin

$sql = 'INSERT INTO khach_hang (Ma_KH, Ten_KH, Gioi_Tinh, Dia_Chi, SDT, Email, Tai_Khoan, Mat_khau, Ma_CV) 
        VALUES( "' . $_POST["Ma_KH"] . '",
                "' . $_POST["Ten_KH"] . '",
                "' . $_POST["Gioi_Tinh"] . '",
                "' . $_POST["Dia_Chi"] . '",
                "' . $_POST["sdt"] . '",
                "' . $_POST["Email"] . '",
                "' . $_POST["Tai_Khoan"] . '",
                "' . $_POST["Mat_Khau"] . '",
                "' . $_POST["Ma_CV"] . '");';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data Added successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $sql;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
