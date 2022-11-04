<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    h1 {
        text-align: center;
        margin: 0;
    }

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

    .search-group {
        margin: 0 auto;
        width: max-content;
        padding-bottom: 30px;
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
    if (trim(isset($_GET['search'])) !='') {
        $search_raw = $_GET['search'];
        $search = str_replace(' ','%',$search_raw);
        $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
        FROM sua
        WHERE Ten_sua LIKE "%' . $search . '%";';
    } else    $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
                    FROM sua;';
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
    if (trim(isset($_GET['search'])) !=''){
        $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
        FROM sua
        WHERE Ten_sua LIKE "%' . $search . '%"  LIMIT ' . $page_first_result . ',' . $results_per_page;
    } else    $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
                    FROM sua  LIMIT ' . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);
    $conn->close();
    //CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    ?>

    <form action="ketqua.php" method="POST" id="myForm">

        <table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>

            <h1>Tim kiem sua</h1>
            <div class="search-group">Ten sua: <input type="search" name="search" value="<?= @$search_raw ?>">
                <input type="submit" value="Tim">
            </div>





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



            echo '<tr> <td colspan="7" align="center" style="background-color: #fefae0; " >';
            //page link
            echo '<div class="redirect" style="margin: 0 auto">';
            //redirect to first
            echo '<a onclick="submit()" href = "  ketqua.php?page=' . 1 . '"> << </a>&nbsp';
            //redirect to previous
            if ($page > 1) {
                echo '<a onclick="submit()" href = "  ketqua.php?page=' . $page - 1 . '"> < </a>&nbsp';
            } else echo '<span> <&nbsp </span>';
            //page link group
            for ($index = 1; $index <= $number_of_page; $index++) {
                if ($index == $page)
                    echo '<span>' . $index . '&nbsp</span>';
                else
                    echo '<a onclick="submit()" href = "  ketqua.php?page=' . $index . '">' . $index . '&nbsp</a>';
            }
            //redirect to next
            if ($page < $number_of_page) {
                echo '&nbsp<a onclick="submit()" href = " ketqua.php?page=' . $page + 1 . '"> > </a>';
            } else echo '<span> &nbsp> </span>';
            //redirect to last
            echo '&nbsp<a onclick="submit()" href = " ketqua.php?page=' . 1 . '"> >> </a>';
            echo '</div>';
            echo '</td></tr>';




            echo "</table>";

            ?>
    </form>
<script>
    function submit(){
        console.log('executed')
        // document.getElementById("myForm").submit();
    }
</script>
</body>

</html>