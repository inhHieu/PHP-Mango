<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
include('controller.php');
?>
<?php
$Ma_KH = $_GET['ID'];
// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')

    or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Get KH
$sql = 'SELECT * FROM khach_hang WHERE Ma_KH = "' . $Ma_KH . '";';
$result = mysqli_query($conn, $sql);

//get CV
$sql_CV = 'SELECT Ma_CV, Ten_CV FROM chuc_vu;';
$result_CV = mysqli_query($conn, $sql_CV);


// Sua thong tin
if (isset($_POST['Sua'])) {
    $sql = 'UPDATE khach_hang 
    SET Ten_KH="' . $_POST["Ten_KH"] . '" ,
        Gioi_Tinh="' . $_POST["Gioi_Tinh"] . '" ,
        Dia_Chi="' . $_POST["Dia_Chi"] . '" ,
        SDT="' . $_POST["SDT"] . '",
        Email="' . $_POST["Email"] . '",
        Tai_Khoan="' . $_POST["Tai_Khoan"] . '",
        Mat_Khau="' . $_POST["Mat_Khau"] . '",
        Ma_CV="' . $_POST["Ma_CV"] . '"
    WHERE Ma_KH="' . $Ma_KH . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Sua thong tin thanh cong!";
        $sql = 'SELECT * FROM khach_hang WHERE Ma_KH = "' . $Ma_KH . '";';
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if (isset($_POST['Xoa'])) {
    $sql = 'DELETE FROM khach_hang 
        WHERE Ma_KH="' . $Ma_KH . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Sua thong tin thanh cong!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();

?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>

    <div class="center">
        <form action="" method="POST">
            <p class=""><?= @$noti ?></p>
            <table class="table">
                <thead>
                    <th colspan="3">Sửa đổi thông tin khách hàng</th>
                </thead>

                <?php while ($rows = mysqli_fetch_row($result)) { ?>
                    <tr>
                        <td>Mã KH: </td>
                        <td>
                            <input type="text" name="Ma_KH" value="<?= $rows[0] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên KH: </td>
                        <td>
                            <input type="text" name="Ten_KH" value="<?= $rows[1] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính: </td>

                        <td>
                            <select name="Gioi_Tinh" id="">
                                <option <?php echo $rows[2] == 0 ? 'selected="selected"' : ''; ?> value="0">Nữ</option>
                                <option <?php echo $rows[2] == 1 ? 'selected="selected"' : ''; ?> value="1">Nam</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ: </td>
                        <td>
                            <input type="text" name="Dia_Chi" value="<?= $rows[3] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <td>
                            <input type="text" name="SDT" value="<?= $rows[4] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="Email" value="<?= $rows[5] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tài khoản: </td>
                        <td>
                            <input type="text" name="Tai_Khoan" value="<?= $rows[6] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mật Khẩu: </td>
                        <td>
                            <input type="text" name="Mat_Khau" value="<?= $rows[7] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Chức vụ: </td>
                        <td>
                            <select name="Ma_CV">
                                <?php while ($rows_CV = mysqli_fetch_row($result_CV)) {
                                    if ($rows_CV[0] == $rows[8]) {
                                        echo '<option selected="selected" value="' . $rows_CV[0] . '">' . $rows_CV[1] . '</option>';
                                    } else {
                                        echo '<option value="' . $rows_CV[0] . '">' . $rows_CV[1] . '</option>';
                                    }
                                } ?>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="submit" value="Sua" name="Sua">
                        <input type="submit" class="submit" value="Xoa" name="Xoa">
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