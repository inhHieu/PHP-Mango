<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
include('controller.php');
?>
<?php
$SP_ID = $_GET['ID'];
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Get SP
$sql = 'SELECT * FROM san_pham WHERE Ma_SP = "' . $SP_ID . '";';
$result = mysqli_query($conn, $sql);

//get Loai
$sql_Loai = 'SELECT Ma_Loai, Ten_Loai FROM loai_sp;';
$result_Loai = mysqli_query($conn, $sql_Loai);

//get HSX
$sql_HSX = 'SELECT Ma_HSX, Ten_HSX FROM hang_sx;';
$result_HSX = mysqli_query($conn, $sql_HSX);

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
    <?php include('quanly/left-control.php') ?>

    <?php while ($rows = mysqli_fetch_row($result)) { ?>
        <div class="center">
            <div class="SP-img"><img src="/DB-Ex/Hinh_sua/<?= $rows[8] ?>" alt=""></div>

            <form action="" method="POST">
                <p class=""><?= @$noti ?></p>
                <table class="table">
                    <thead>
                        <th colspan="2">Sua thong tin khach hang</th>
                    </thead>

                    <tr>
                        <td>Mã SP: </td>
                        <td >
                            <input type="text" name="MaSP" value="<?= $rows[0] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Tên SP: </td>
                        <td >
                            <input type="text" name="MaSP" value="<?= $rows[1] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Đơn SP: </td>
                        <td >
                            <input type="text" name="MaSP" value="<?= $rows[2] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Hãng SX: </td>
                        <td >
                            <!-- <input type="text" name="MaSP" value="<?= $rows[4] ?>" disabled> -->
                            <select>
                                <?php while ($rows_HSX = mysqli_fetch_row($result_HSX)) {
                                    if ($rows_HSX[0] == $rows[4]) {
                                        echo '<option selected="selected" value="' . $rows_HSX[0] . '">' . $rows_HSX[1] . '</option>';
                                    } else {
                                        echo '<option value="' . $rows_HSX[0] . '">' . $rows_HSX[1] . '</option>';
                                    }
                                } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Loại SP: </td>
                        <td >
                            <!-- <input type="text" name="MaSP" value="<?= $rows[5] ?>" disabled> -->
                            <select>
                                <?php while ($rows_Loai = mysqli_fetch_row($result_Loai)) {
                                    if ($rows_Loai[0] == $rows[5]) {
                                        echo '<option selected="selected" value="' . $rows_Loai[0] . '">' . $rows_Loai[1] . '</option>';
                                    } else {
                                        echo '<option value="' . $rows_Loai[0] . '">' . $rows_Loai[1] . '</option>';
                                    }
                                } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả: </td>
                        <td >
                            <textarea type="text" name="thanhPhan"><?= $rows[3] ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Hình ảnh: </td>
                        <td >
                            <input type="text" name="hinhAnh" value="<?= $rows[6] ?>">
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2"><input type="submit" class="submit" value="Sua" name="submit">
                        <input type="submit" class="submit" value="Xoa" name="submit">
                    </td>
                </tr>
                </table>
            </form>

        </div>
</div>
<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>