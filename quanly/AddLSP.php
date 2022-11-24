<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin
$SP_ID = $_POST['Ma_Loai'];

$sql = 'INSERT INTO loai_sp (Ma_Loai, Ten_Loai) 
        VALUES( "' . $_POST["Ma_Loai"] . '",
                "' . $_POST["Ten_Loai"] . '");';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data Added successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $sql;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
