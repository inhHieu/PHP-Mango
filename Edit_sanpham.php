<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>
<?php
$SP_ID = $_GET['ID'];
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Get Khach Hang
$sql = 'SELECT * FROM sua WHERE Ma_sua LIKE "%' . $SP_ID . '%";';
$result = mysqli_query($conn, $sql);
// Sua thong tin
if (isset($_POST['submit']) == 'Sua') {
    $sql = 'UPDATE sua 
    SET Ten_sua="' . $_POST["tenSP"] . '" ,
        Ma_hang_sua="' . $_POST["maHang"] . '" ,
        Ma_loai_sua="' . $_POST["maLoai"] . '" ,
        Trong_luong="' . $_POST["trongLuong"] . '",
        Don_gia="' . $_POST["donGia"] . '",
        TP_Dinh_Duong="' . $_POST["thanhPhan"] . '",
        Loi_ich="' . @$_POST["loiich"] . '"
    WHERE Ma_sua="' . $SP_ID . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Sua thong tin thanh cong!";
        $sql = 'SELECT * FROM sua WHERE Ma_sua LIKE "%' . $SP_ID . '%";';
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>

<div class="quanly-container">
<?php include('quanly/left-control.php')?>

    <?php while ($rows = mysqli_fetch_row($result)) { ?>
        <div class="center">
        <div class="SP-img"><img src="/DB-Ex/Hinh_sua/<?=$rows[8]?>"  alt=""></div>

            <form action="" method="POST">
                <p class=""><?= @$noti ?></p>
                <table class="table">
                    <thead>
                        <th colspan="9">Sua thong tin khach hang</th>
                    </thead>
                    <?php


                    echo "<tr>
                    <td>Ma SP: </td>
                    <td colspan='2'>" .
                        '<input type="text"  name="MaSP" value="' . $rows[0] . '" disabled>'
                        . "</td></tr>";
                    echo "<tr>
                    <td>Ten SP: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="tenSP"  value="' . $rows[1] . '" >'
                        . "</td></tr>";

                    echo "<tr>
                    <td>Ma hang: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="maHang"  value="' . $rows[2] . '" >'
                        . "</td></tr>";
                    echo "<tr>
                    <td>Loai: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="maLoai"  value="' . $rows[3] . '" >'
                        . "</td></tr>";
                    echo "<tr>
                    <td>So luong: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="trongLuong"  value="' . $rows[4] . '" >'
                        . "</td></tr>";
                    echo "<tr>
                    <td>Don gia: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="donGia"  value="' . $rows[5] . '" >'
                        . "</td></tr>";
                    echo "<tr>
                    <td>Thanh phan: </td>
                    <td colspan='2'>" .
                    '<textarea type="text" name="thanhPhan" >' . $rows[6] . '</textarea>'
                    . "</td></tr>";
                    echo "<tr>
                    <td>Loi ich: </td>
                    <td colspan='2'>" .
                        '<textarea type="text" name="loiich" >' . $rows[7] . '</textarea>'
                        . "</td></tr>";
                    echo "<tr>
                    <td>Hinh anh: </td>
                    <td colspan='2'>" .
                        '<input type="text" name="hinhAnh"  value="' . $rows[8] . '" >'
                        . "</td></tr>";
}
                    ?>
                    <tr>
                        <td colspan="2"><input type="submit" class="submit" value="Sua" name="submit">
                        <input type="submit" class="submit" value="Xoa" name="submit"></td>
                    </tr>
                </table>
            </form>
        
        </div>
</div>
<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>