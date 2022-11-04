<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin sữa</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <?php



    // Ket noi CSDL

    //require("connect.php");

    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';

    $result = mysqli_query($conn, $sql);
    $conn->close();


    echo "<p align='center'><font size='5' color='#fefae0'> THÔNG TIN KHACH HANG</font></P>";

    echo "<table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

    echo '<tr bgcolor="#fefae0">

    <th width="50">STT</th>

    <th width="50">Mã KH</th>
    
    <th width="150">Tên KH</th>

    <th width="100">Gioi tinh</th>

    <th width="300">Dia chi</th>

    <th width="100">Dien thoai</th>

    <th width="200">Email</th>


</tr>';



    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        while ($rows = mysqli_fetch_row($result)) {
            $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';

            echo "<tr>";

            echo "<td bgcolor='" . $color . "'>" . $stt . "</td>";

            echo "<td bgcolor='$color'>$rows[0]</td>";
            echo "<td bgcolor='$color'>$rows[1]</td>";

            if ($rows[2] == 0) {
                echo "<td style='text-align:center' bgcolor='" . $color . "'>".'<i class="fa fa-mars" aria-hidden="true"></i>
                '."</td>";
            }else
            if ($rows[2] == 1) {
                echo "<td style='text-align:center' bgcolor='" . $color . "'>".'<i class="fa fa-venus" aria-hidden="true"></i>
                '."</td>";
            }



            echo "<td bgcolor='$color'>$rows[3]</td>";
            echo "<td bgcolor='$color'>$rows[4]</td>";
            echo "<td bgcolor='$color'>$rows[5]</td>";

            echo "</tr>";

            $stt += 1;
        }
    }

    echo "</table>";

    ?>

</body>

</html>