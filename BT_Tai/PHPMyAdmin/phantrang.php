<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bansua');
    mysqli_set_charset($conn, 'UTF8');

    $rowsPerPage = 5; 
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;  
    }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
    $sql = 'SELECT Ma_sua, ten_sua, Trong_luong, Don_gia FROM sua LIMIT ' . $offset . ',' . $rowsPerPage;
    $result = mysqli_query($conn, $sql);


    echo "<p align='center'><font size='5'> THÔNG TIN SỮA</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    echo '<tr>
            <th>STT</th>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>';
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        while ($rows = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$rows[0]</td>";
            echo "<td>$rows[1]</td>";
            echo "<td>$rows[2]</td>";
            echo "<td>$rows[3]</td>";
            echo "</tr>";
            $stt += 1;
        }
    }
    echo "</table>";
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows / $rowsPerPage) + 1;

    echo "<div style='text-align:center;'>";
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . 1 . ">Đầu</a> ";
    
    if ($_GET['page'] > 1)
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Back</a> ";

    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page']) {
            echo '<b>' . $i . '</b> '; 
        } 
        else
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
                . $i . ">" . $i . "</a> ";
    }
    if ($_GET['page'] < $maxPage)
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";


    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . ">Cuối</a> ";
    echo "</div>";
?>
</body>
</html>