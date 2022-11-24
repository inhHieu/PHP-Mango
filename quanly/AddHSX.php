<?php
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sua thong tin
$SP_ID = $_POST['Ma_HSX'];

$sql = 'INSERT INTO hang_sx (MA_HSX, Ten_HSX, Dia_Chi, STD, Email) 
        VALUES( "' . $_POST["Ma_HSX"] . '",
                "' . $_POST["Ten_HSX"] . '",
                "' . $_POST["Dia_Chi"] . '",
                "' . $_POST["sdt"] . '",
                "' . $_POST["Email"] . '");';
if ($conn->query($sql)) {
    $status = "success";
    $response = "Data Added successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $sql;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();
