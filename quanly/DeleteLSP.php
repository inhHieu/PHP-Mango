<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());


$ID = $_POST['Ma_Loai'];

$sql = 'DELETE FROM loai_sp 
        WHERE Ma_Loai="' . $ID . '";';

if ($conn->query($sql)) {
    $status = "success";
    $response = "Data deleted successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $conn->error;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
