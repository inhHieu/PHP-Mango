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
$KH_ID = $_GET['ID'];
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Get Khach Hang
$sql = 'SELECT * FROM khach_hang WHERE Ma_khach_hang LIKE "%' . $KH_ID . '%";';
$result = mysqli_query($conn, $sql);

$conn->close();
// Xoa thong tin
if (isset($_POST['submit'])) {
    $sql = 'DELETE FROM khach_hang 
    WHERE Ma_khach_hang="' . $KH_ID . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Xoa thong tin thanh cong!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<style>
    table,
    tr,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>

    <form action="" method="POST">
        <p class="center"><?= @$noti ?></p>
        <table>
            <tr bgcolor='#ccd5ae'>
                <th colspan="9">Xoa thong tin khach hang</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) <> 0) {
                $stt = 1;
                while ($rows = mysqli_fetch_row($result)) {
                    $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                    echo "<tr bgcolor='$color'>
                        <td>Ma Khach Hang: </td>
                        <td colspan='2'>" .
                        '<input type="text"  name="' . 'maKH' . '" value="' . $rows[0] . '" disabled>'
                        . "</td></tr>";
                    echo "<tr bgcolor='$color'>
                        <td>Ten Khach Hang: </td>
                        <td colspan='2'>" .
                        '<input type="text" name="' . 'tenKH' . '"  value="' . $rows[1] . '" disabled>'
                        . "</td></tr>";
                    if ($rows[2] == 0) {
                        echo '<tr bgcolor=' . $color . '>
                        <td>Gioi tinh: </td>
                        <td><input type="radio" name="gioiTinh" value="0" checked id=""disabled>Nam</td>
                        <td><input type="radio" name="gioiTinh" value="1" id=""disabled>Nu</td>
                        </tr>';
                    } else if ($rows[2] == 1) {
                        echo '<tr bgcolor=' . $color . '>
                        <td>Gioi tinh: </td>
                        <td><input type="radio" name="gioiTinh" value="0" id=""disabled>Nam</td>
                        <td><input type="radio" name="gioiTinh" value="1" checked id=""disabled>Nu</td>
                        </tr>';
                    }

                    // if ($rows[2] == 0) {
                    //     echo "<tr bgcolor='$color'><td>Gioi tinh: </td><td>".'<input type="radio" value="'. $rows[2].'" >'."</td></tr>";
                    // } else if ($rows[2] == 1) {
                    //     echo "<tr bgcolor='$color'><td>Gioi tinh: </td><td>".'<input type="radio" value="'. $rows[2].'" >'."</td></tr>";
                    // }
                    echo "<tr bgcolor='$color'>
                        <td>Dia chi: </td>
                        <td colspan='2'>" .
                        '<input type="text" name="' . 'diaChi' . '"  value="' . $rows[3] . '" disabled>'
                        . "</td></tr>";
                    echo "<tr bgcolor='$color'>
                        <td>So dien thoai: </td>
                        <td colspan='2'>" .
                        '<input type="text" name="' . 'SDT' . '"  value="' . $rows[4] . '"disabled >'
                        . "</td></tr>";
                    echo "<tr bgcolor='$color'>
                        <td>Email: </td>
                        <td colspan='2'>" .
                        '<input type="text"  name="' . 'Email' . '"  value="' . $rows[5] . '"disabled>'
                        . "</td></tr>";

                    $stt += 1;
                }
            }
            ?>
            <tr bgcolor='#ccd5ae'>
                <td colspan="3"><input type="submit" class="submit" value="Xoa" name="submit"></td>
            </tr>
        </table>

    </form>

</body>

</html>