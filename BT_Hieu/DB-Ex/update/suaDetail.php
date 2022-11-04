<!------------------------------- Include List -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    img {
        max-width: 100px;
    }

    .redirect {
        background-color: #fefae0;
    }

    th {
        font-size: 24px;
    }

    table,
    tr,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px 0;
    }

    td {
        padding: 10px 30px;
    }

    p:last-child {
        text-align: end;
    }
</style>
<body>

    <?php

    // get target ID
    $id = $_POST['name'];

    // Ket noi CSDL

    //require("connect.php");

    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
            FROM sua
            WHERE Ma_sua = "'.$id.'";';

    $result = mysqli_query($conn, $sql);

    $conn->close();

    // echo $_POST['name'];
    echo "<table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";





    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        while ($rows = mysqli_fetch_row($result)) {
            $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
            echo '<tr bgcolor="#fefae0">
                <th colspan="2">'.$rows[0].'</th>    
            </tr>';

            echo "<tr>";

            echo "<td bgcolor='$color'>".'<img src="/BT_Hieu/DB-Ex/Hinh_sua/' . $rows[1] . '" alt="">'."</td>";
            echo "<td bgcolor='$color' width='500'>";

                    echo "<p> <b>Thanh phan dinh duong:</b> $rows[2]</p>";
                    echo "<p> <b>Loi ich:</b> $rows[3] </p>"; 
                    echo "<p> <b>Trong luong:</b>$rows[4]g -&nbsp" . "<b>Don gia:</b>$rows[5]VND</p>" .
                    "</td>";

            echo "</tr>";

            $stt += 1;
        }
    }

    echo "</table>";

    ?>

</body>

</html>