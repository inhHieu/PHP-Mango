<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
</head>

<?php

// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Get Khach Hang
$sql = 'SELECT * FROM khach_hang';
$result = mysqli_query($conn, $sql);
$conn->close();
?>


<body>

    <form action="thongtinKH.php" method="POST">
    <table>
        <tr>
            <th colspan="9">Thong tin khach hang</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) <> 0) {
            $stt = 1;
            while ($rows = mysqli_fetch_row($result)) {
                $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';

                echo "<tr>";

                echo "<td bgcolor='" . $color . "'>" . $stt . "</td>";
                echo "<td bgcolor='$color'>$rows[0]</td>";
                echo "<td bgcolor='$color'>$rows[1]</td>";

                if ($rows[2] == 0) {
                    echo "<td style='text-align:center' bgcolor='" . $color . "'>Nam</td>";
                } else if ($rows[2] == 1) {
                    echo "<td style='text-align:center' bgcolor='" . $color . "'>Nu</td>";
                }

                echo "<td bgcolor='$color'>$rows[3]</td>";
                echo "<td bgcolor='$color'>$rows[4]</td>";
                echo "<td bgcolor='$color'>$rows[5]</td>";
                echo "<td bgcolor='$color'><a href='sua.php?ID=".$rows[0]."'>Sua</a></td>";
                echo "<td bgcolor='$color'><a href='xoa.php?ID=".$rows[0]."'>Xoa</a></td>";

                echo "</tr>";

                $stt += 1;
            }
        }
        ?>
    </table>
    </form>


</body>

</html>