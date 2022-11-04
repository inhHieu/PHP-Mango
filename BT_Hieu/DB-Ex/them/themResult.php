<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
</head>

<style>
    img {
        max-width: 100px;
    }

    .center {
        margin: 0 auto;
        width: max-content;
    }
</style>

<?php

//move file
    move_uploaded_file(
        $_FILES["hinhAnh"]["tmp_name"],
        "D:\\Learning\\PHP\\DB-Ex\\Hinh_sua\\" . $_FILES["hinhAnh"]["name"]
    );
    
//Database^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// get data
$maSua = $_POST['maSua'];
$tenSua = $_POST['tenSua'];
$hangSua = $_POST['hangSua'];
$loaiSua = $_POST['loaiSua'];
$trongLuong = $_POST['trongLuong'];
$donGia = $_POST['donGia'];
$TPDD = $_POST['TPDinhDuong'];
$loiIch = $_POST['loiIch'];
$hinhAnh = $_FILES["hinhAnh"]["name"];

// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Them vao CSDl
$sql = "INSERT INTO sua(Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh) 
        VALUES ('" . $maSua . "','" . $tenSua . "','" . $hangSua . "','" . $loaiSua . "',
                '" . $trongLuong . "','" . $donGia . "','" . $TPDD . "','" . $loiIch . "','" . $hinhAnh . "')";

if ($conn->query($sql) === TRUE) {
    $noti = "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Get doi tuong vua them vao
$sql = "SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
        FROM sua
        WHERE Ma_sua LIKE '%" . $maSua . "%'";
$result = mysqli_query($conn, $sql);
$conn->close();
//Database^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


?>

<body>

    <form action="">
        <p class="center"><?= @$noti ?></p>
        <table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
            <?php
            if (mysqli_num_rows($result) <> 0) {
                $stt = 1;
                while ($rows = mysqli_fetch_row($result)) {
                    $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                    echo '<tr bgcolor="#fefae0">
        <th colspan="2">' . $rows[0] . '</th>    
        </tr>';

                    echo "<tr>";

                    echo "<td bgcolor='$color'>" . '<img src="Hinh_sua/' . $rows[1] . '" alt="">' . "</td>";
                    echo "<td bgcolor='$color' width='500'>";

                    echo "<p> <b>Thanh phan dinh duong:</b> $rows[2]</p>";
                    echo "<p> <b>Loi ich:</b> $rows[3] </p>";
                    echo "<p> <b>Trong luong:</b>$rows[4]g -&nbsp" . "<b>Don gia:</b>$rows[5]VND</p>" .
                        "</td>";

                    echo "</tr>";

                    $stt += 1;
                }
            }
            ?>
        </table>

    </form>



</body>

</html>