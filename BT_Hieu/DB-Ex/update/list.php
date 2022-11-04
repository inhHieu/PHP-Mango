<!------------------------------- Include suaDetail -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>List</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    img {
        max-width: 100px;
    }

    a {
        text-decoration: none;
    }

    table,
    tr,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px 0;
        text-align: center;
    }

    td {
        padding: 10px 30px;
    }


    button {
        background-color: transparent;
        border: none;
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }
</style>

<body>

    <?php



    // Ket noi CSDL

    //require("connect.php");

    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    // set limit rows per page
    $results_per_page = 10;
    // get rows count

    $sql = 'SELECT Ten_sua,Ten_loai,Trong_luong, Don_gia, Hinh, Ten_hang_sua
            FROM sua 	INNER JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                        INNER JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua';

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
    $sql = 'SELECT Ten_sua,Ten_loai,Trong_luong, Don_gia, Hinh, Ten_hang_sua, Ma_sua
            FROM sua 	INNER JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                        INNER JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT ' . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);
    $conn->close();
    ?>

    <form action="suaDetail.php" method="POST" style="padding: 0;">
        <table align='center' width='max-content' border='1' cellpadding='2' cellspacing='2'>

            <tr colspan="5" bgcolor="#fefae0">
                <th colspan="5">THONG TIN SAN PHAM</th>
            </tr>



            <?php
            if (mysqli_num_rows($result) <> 0) {
                $stt = 1;
                echo "<tr>";
                while ($rows = mysqli_fetch_row($result)) {
                    $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                    if ($stt % 5 == 0) {
                        echo "<td bgcolor='$color'>" .
                            "<button type='submit' value='$rows[6]' name='name'>
                            <a>" . "<b>$rows[0]</b><br>" . "</a>
                        </button>" .
                            "<br>Nha san xuat: $rows[5]<br>" . "$rows[1] -&nbsp" . "$rows[2]g -&nbsp" . "$rows[3]VND</br>" .
                            '<img src="/BT_Hieu/DB-Ex/Hinh_sua/' . $rows[4] . '" alt="">'
                            . "</td>";
                        echo "</tr>";

                        $stt += 1;
                    } else {
                        echo "<td bgcolor='$color'>" .
                            "<button type='submit' value='$rows[6]' name='name'>
                            <a>" . "<b>$rows[0]</b>" . "</a>
                        </button>" .

                            "<br>Nha san xuat: $rows[5]<br>" . "$rows[1] -&nbsp" . "$rows[2]g -&nbsp" . "$rows[3]VND</br>" .
                            '<img src="/BT_Hieu/DB-Ex/Hinh_sua/' . $rows[4] . '" alt="">'
                            . "</td>";

                        $stt += 1;
                    }
                }
            }
            


            echo '<tr> <td colspan="7" align="center" style="background-color: #fefae0; " >';
            //page link
            echo '<div class="redirect" style="margin: 0 auto">';
            //redirect to first
            echo '<a href = "  list.php?page=' . 1 . '"> << </a>&nbsp';
            //redirect to previous
            if ($page > 1) {
                echo '<a href = "  list.php?page=' . $page - 1 . '"> < </a>&nbsp';
            } else echo '<span> <&nbsp </span>';
            //page link group
            for ($index = 1; $index <= $number_of_page; $index++) {
                if ($index == $page)
                    echo '<span>' . $index . '&nbsp</span>';
                else
                    echo '<a href = "  list.php?page=' . $index . '">' . $index . '&nbsp</a>';
            }
            //redirect to next
            if ($page < $number_of_page) {
                echo '&nbsp<a href = " list.php?page=' . $page + 1 . '"> > </a>';
            } else echo '<span> &nbsp> </span>';
            //redirect to last
            echo '&nbsp<a href = " list.php?page=' . $number_of_page . '"> >> </a>';
            echo '</div>';
            echo '</td></tr>';


            ?>
        </table>
    </form>
</body>

</html>