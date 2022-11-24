<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>
<?php
if ($currentUser == 'null') {
    echo '<script>',
    "$('.modal-login').css('display','grid')",
    '</script>';
}
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
if (isset($_POST['Sua'])) {
    $sql = 'UPDATE san_pham 
    SET Ten_SP="' . $_POST["Ten_SP"] . '" ,
        Don_Gia="' . $_POST["Don_Gia"] . '" ,
        Ma_HSX="' . $_POST["Ma_HSX"] . '" ,
        Ma_Loai="' . $_POST["Ma_Loai"] . '",
        Hinh_Anh="' . $_POST["Hinh_Anh"] . '",
        Mo_Ta="' . $_POST["Mo_Ta"] . '"
    WHERE Ma_SP="' . $SP_ID . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Sua thong tin thanh cong!";
        $sql = 'SELECT * FROM san_pham WHERE Ma_SP = "' . $SP_ID . '";';
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else if(isset($_POST['Xoa'])) {
    $sql = 'DELETE FROM san_pham 
        WHERE Ma_SP="' . $SP_ID . '";';
    if ($conn->query($sql) === TRUE) {
        $noti = "Xoa san pham thanh cong!";
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
            <div class="SP-img"><img src="<?=  $rows[6] ?>" alt=""></div>

            <form action="" method="POST">
                <p class=""><?= @$noti ?></p>
                <table class="table">
                    <thead>
                        <th colspan="2">Sửa thông tin sản phẩm</th>
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
                            <input type="text" name="Ten_SP" value="<?= $rows[1] ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td>Đơn Giá: </td>
                        <td >
                            <input type="text" name="Don_Gia" value="<?= $rows[2] ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td>Hãng SX: </td>
                        <td >
                            <!-- <input type="text" name="MaSP" value="<?= $rows[4] ?>" disabled> -->
                            <select name="Ma_HSX">
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
                            <select name="Ma_Loai">
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
                            <textarea type="text" name="Mo_Ta"><?= $rows[3] ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Hình ảnh: </td>
                        <td >
                            <input type="text" name="Hinh_Anh" value="<?= $rows[6] ?>">
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
<script>
    function noti_fails(){
        $("#noti").text("Change failed");
              $("#noti").css("background-color", "#ff0000");
              $("#noti").css("color", "white");
              $("#noti")
                .animate({ top: "90vh" })
                .delay(3000)
                .animate({ top: "105vh" });
    }
    function noti_success(){
        $("#noti").text("Change success");
              $("#noti").css("background-color", "#ff0000");
              $("#noti").css("color", "white");
              $("#noti")
                .animate({ top: "90vh" })
                .delay(3000)
                .animate({ top: "105vh" });
    }
</script>
<?php
include('includes/footer.html');
?>