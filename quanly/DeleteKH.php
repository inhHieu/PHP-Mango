<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());


$sql = 'DELETE FROM khach_hang 
        WHERE Ma_KH="' . $_POST['Ma_KH'] . '";';

if ($conn->query($sql)) {
    $status = "success";
    $response = "Data deleted successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $conn->error;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
