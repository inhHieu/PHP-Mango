<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Phan trang</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    .redirect{
        background-color:#fefae0;
    }
    a{        
        text-decoration: none;
    }
    table,tr,td,th{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>

    <?php



    // Ket noi CSDL

    //require("connect.php");

    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    // set limit rows per page
    $results_per_page = 2;
    // get rows count

    $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';

    $result = mysqli_query($conn, $sql);
    $number_of_result = mysqli_num_rows($result);

    // calculate total pages

    $number_of_page = ceil($number_of_result / $results_per_page);

    // get current page index
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    //set first page show on load
    $page_first_result = ($page - 1) * $results_per_page;
    //result page-ing
    $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang LIMIT ' . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);

    $conn->close();






    echo "<p align='center'><font size='5' color='#fefae0'> THÔNG TIN KHACH HANG</font></P>";

    echo "<table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2' ";

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
                echo "<td style='text-align:center' bgcolor='" . $color . "'>" . '<i class="fa fa-mars" aria-hidden="true"></i>
                ' . "</td>";
            } else
            if ($rows[2] == 1) {
                echo "<td style='text-align:center' bgcolor='" . $color . "'>" . '<i class="fa fa-venus" aria-hidden="true"></i>
                ' . "</td>";
            }



            echo "<td bgcolor='$color'>$rows[3]</td>";
            echo "<td bgcolor='$color'>$rows[4]</td>";
            echo "<td bgcolor='$color'>$rows[5]</td>";

            echo "</tr>";

            $stt += 1;
        }
    }




    echo '<tr> <td colspan="7" align="center">';
    //page link
    echo '<div class="redirect" style="margin: 0 auto">';
    //redirect to first
    echo '<a href = "phantrang.php?page=' . 1 . '"> << </a>&nbsp';
    //redirect to previous
    if ($page > 1) {
        echo '<a href = "phantrang.php?page=' . $page - 1 . '"> < </a>&nbsp';
    } else echo '<span> <&nbsp </span>';
    //page link group
    for ($index = 1; $index <= $number_of_page; $index++) {
        if ($index == $page)
            echo '<span>' . $index . '</span>';
        else
            echo '<a href = "phantrang.php?page=' . $index . '">' . $index . '</a>';
    }
    //redirect to next
    if ($page < $number_of_page) {
        echo '&nbsp<a href = "phantrang.php?page=' . $page + 1 . '"> > </a>';
    } else echo '<span> &nbsp> </span>';
    //redirect to last
    echo '&nbsp<a href = "phantrang.php?page=' . $number_of_page . '"> >> </a>';
    echo '</div>';
    echo '</td></tr>';

    echo "</table>";
    ?>
</body>

</html>