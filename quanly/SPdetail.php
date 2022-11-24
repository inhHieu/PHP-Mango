<?php
$conn = new mysqli('localhost', 'root', '', 'mango');
if (!empty($_POST["TenSP"])) {
    $sql = $conn->prepare("SELECT * FROM san_pham WHERE Ten_SP LIKE  ? ORDER BY Ten_SP LIMIT 0,3");
    $search = "{$_POST['TenSP']}%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();
    if (!empty($result)) {        
            foreach ($result as $country) {
               echo $country["Don_Gia"];       
            } // end for
        
    } // end if not empty
}
?>