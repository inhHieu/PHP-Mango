<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    
    img {
        max-width: 100px;
    }

    
    

    p:last-child {
        text-align: end;
    }

    .center {
        margin: 0 auto;
        width: max-content;
    }
</style>

<body>

    <?php


    // Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    // set limit rows per page
    $results_per_page = 4;

    // get rows count
    if (trim(isset($_GET['search'])) != '') {
        $search_raw = $_GET['search'];
        $search = str_replace(' ', '%', $search_raw);
        $HS = $_GET['hangSua'];
        $LS = $_GET['loaiSua'];
        $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
        FROM sua
        WHERE Ten_sua LIKE "%' . $search . '%"
        AND Ma_hang_sua = "' . $HS . '"
        AND Ma_loai_sua = "' . $LS . '";';
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
    if (trim(isset($_GET['search'])) != '') {
        $search_raw = $_GET['search'];
        $search = str_replace(' ', '%', $search_raw);
        $HS = $_GET['hangSua'];
        $LS = $_GET['loaiSua'];
        $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
        FROM sua
        WHERE Ten_sua LIKE "%' . $search . '%"
        AND Ma_hang_sua = "' . $HS . '"
        AND Ma_loai_sua = "' . $LS . '" LIMIT ' . $page_first_result . ',' . $results_per_page;
        //get the lil noti
        $noti = 'Co ' . $number_of_result . ' ket qua trung khop';
        if ($number_of_result == 0)         $noti = 'Khong co ket qua trung khop';
    } else    $sql = 'SELECT Ten_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
                    FROM sua  LIMIT ' . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);
    $conn->close();
    //CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    ?>

    <form action="" method="GET" id="myForm" role="form">

        <table id="table"  class='table table-striped'>

            <h1>Tim kiem khach hang</h1>
            <div class="center">
                Loai sua: <select name="loaiSua" id="">
                    <option value="SB">Sữa bột </option>
                    <option value="SC">Sữa chua</option>
                    <option value="SD">Sữa đặc</option>
                    <option value="ST">Sữa tươi</option>
                </select>
                Hang: <select name="hangSua" id="">
                    <option value="AB">Abbott </option>
                    <option value="DL">Dutch Lady</option>
                    <option value="DM">Dumex</option>
                    <option value="DS">Daisy</option>
                    <option value="MJ">Mead Jonhson</option>
                    <option value="NTF">Nutifood</option>
                    <option value="VNM">Vinamilk</option>
                </select>
            </div>
            <div class="center">
                Ten sua: <input type="search" name="search" value="<?= @$search_raw ?>">
                <input type="submit" value="Tim">
                <p class="center"><?= @$noti ?></p>
            </div>
            <button>them moi</button>




<thead>
        <th></th>
        <th>Ten sua</th>
        <th>Loai</th>
        <th>Trong luong</th>
        <th>Don gia</th>
        <th>Hang sua</th>
    </thead>
    <tbody>
        <?php



        if (mysqli_num_rows($result) <> 0) {
            $stt = 1;
            while ($rows = mysqli_fetch_row($result)) {
                // $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                // '<img src="Hinh_sua/'.$rows[4].'" alt="">'

                echo "<tr>";

                echo "<td>" .
                    '<img src="https://img.ltwebstatic.com/images3_pi/2022/08/11/1660203062adb5363a06015f21d5eff69bd42ab232_thumbnail_900x.webp" alt="">'
                    . "</td>";
                echo "<td>$rows[0]</td>";
                echo "<td>$rows[1]</td>";
                echo "<td>$rows[2]</td>";
                echo "<td>$rows[3]</td>";
                echo "<td>$rows[5]</td>";
                echo "<td>sua</td>";
                echo "<td>xoa</td>";

                echo "</tr>";

                $stt += 1;
            }
        }
        ?>
        </tbody>
<?php
            if ($number_of_result != 0) {
                if (isset($search)) {
                    echo '<tr> <td colspan="7" align="center"  >';
                    //page link
                    echo '<div class="redirect" style="margin: 0 auto">';
                    //redirect to first
                    echo '<a onclick="submit()" href = "  timkim2.php?page=' . 1 . '&search=' . $search . '&loaiSua=' . $LS . '&hangSua=' . $HS . '"> << </a>&nbsp';
                    //redirect to previous
                    if ($page > 1) {
                        echo '<a onclick="submit()" href = "  timkim2.php?page=' . $page - 1 . '&search=' . $search . '&loaiSua=' . $LS . '&hangSua=' . $HS . '"> < </a>&nbsp';
                    } else echo '<span> <&nbsp </span>';
                    //page link group
                    for ($index = 1; $index <= $number_of_page; $index++) {
                        if ($index == $page)
                            echo '<span>' . $index . '&nbsp</span>';
                        else
                            echo '<a onclick="submit()" href = "  timkim2.php?page=' . $index . '&search=' . $search . '&loaiSua=' . $LS . '&hangSua=' . $HS . '">' . $index . '&nbsp</a>';
                    }
                    //redirect to next
                    if ($page < $number_of_page) {
                        echo '&nbsp<a onclick="submit()" href = " timkim2.php?page=' . $page + 1 . '&search=' . $search . '&loaiSua=' . $LS . '&hangSua=' . $HS . '"> > </a>';
                    } else echo '<span> &nbsp> </span>';
                    //redirect to last
                    echo '&nbsp<a onclick="submit()" href = " timkim2.php?page=' . $number_of_page . '&search=' . $search . '&loaiSua=' . $LS . '&hangSua=' . $HS . '"> >> </a>';
                    echo '</div>';
                    echo '</td></tr>';
                } else {
                    echo '<tr> <td colspan="7" align="center" >';
                    //page link
                    echo '<div class="redirect" style="margin: 0 auto">';
                    //redirect to first
                    echo '<a onclick="submit()" href = "  timkim2.php?page=' . 1 . '"> << </a>&nbsp';
                    //redirect to previous
                    if ($page > 1) {
                        echo '<a onclick="submit()" href = "  timkim2.php?page=' . $page - 1 . '"> < </a>&nbsp';
                    } else echo '<span> <&nbsp </span>';
                    //page link group
                    for ($index = 1; $index <= $number_of_page; $index++) {
                        if ($index == $page)
                            echo '<span>' . $index . '&nbsp</span>';
                        else
                            echo '<a onclick="submit()" href = "  timkim2.php?page=' . $index . '">' . $index . '&nbsp</a>';
                    }
                    //redirect to next
                    if ($page < $number_of_page) {
                        echo '&nbsp<a onclick="submit()" href = " timkim2.php?page=' . $page + 1 . '"> > </a>';
                    } else echo '<span> &nbsp> </span>';
                    //redirect to last
                    echo '&nbsp<a onclick="submit()" href = " timkim2.php?page=' . 1 . '"> >> </a>';
                    echo '</div>';
                    echo '</td></tr>';
                }
            }


            echo "</table>";

            ?>
    </form>
    <script>
        function submit() {
            console.log('executed')
            document.getElementById("myForm").submit();
        }
    </script>
</body>

</html>