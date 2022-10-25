<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>

<?php

// Ket noi CSDL

//require("connect.php");

$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());

$sql = 'select Ma_khach_hang,Ten_khach_hang,Dia_chi,Dien_thoai,Email from khach_hang';

$result = mysqli_query($conn, $sql);



echo "<p align='center'><font size='5' color='#fefae0'> THÔNG TIN KHACH HANG</font></P>";

echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

echo '<tr bgcolor="#fefae0">

<th width="50">STT</th>

<th width="50">Mã KH</th>

<th width="150">Tên KH</th>

<th width="200">Dia chi</th>

<th width="100">Dien thoai</th>

<th width="300">Email</th>

</tr>';



if (mysqli_num_rows($result) <> 0) {
    $stt = 1;        
    while ($rows = mysqli_fetch_row($result)) {
        $stt % 2 == 0 ? $color='#ccd5ae': $color ='#d4a373';

        echo "<tr>";

        echo "<td bgcolor='".$color."'>".$stt."</td>";

        echo "<td bgcolor='$color'>$rows[0]</td>";
        echo "<td bgcolor='$color'>$rows[1]</td>";
        echo "<td bgcolor='$color'>$rows[3]</td>";
        echo "<td bgcolor='$color'>$rows[4]</td>";
        echo "<td bgcolor='$color'>$rows[2]</td>";

        echo "</tr>";

        $stt += 1;
    }
}

echo "</table>";

mysqli_free_result($result);
mysqli_close($conn);

?>





<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>