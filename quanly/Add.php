<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin
$SP_ID = $_POST['Ma_SP'];

$sql = 'INSERT INTO san_pham (Ma_SP, Ten_SP, Don_Gia, Mo_Ta, Ma_HSX, Ma_Loai, Hinh_Anh) 
        VALUES( "' . $_POST["Ma_SP"] . '",
                "' . $_POST["Ten_SP"] . '",
                "' . $_POST["Don_Gia"] . '",
                "' . $_POST["Mo_Ta"] . '",
                "' . $_POST["Ma_HSX"] . '",
                "' . $_POST["Ma_Loai"] . '",
                "' . $_POST["Hinh_Anh"] . '");';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data Added successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $sql;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
