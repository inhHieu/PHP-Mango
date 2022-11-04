<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>

<?php

// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());

// GET Hang_sua
$sql = 'SELECT Ma_hang_sua, Ten_hang_sua FROM `hang_sua`;';
$hangSua = mysqli_query($conn, $sql);
$hangSuaRows = mysqli_num_rows($hangSua);
// GET Loai_sua
$sql = 'SELECT * FROM `loai_sua`;';
$loaiSua = mysqli_query($conn, $sql);
$loaiSuaRows = mysqli_num_rows($loaiSua);
$conn->close();
?>

<div class="quanly-container">
    <?php include('quanly/left-control.php')?>
    <div class="center">
        <form action="themResult.php" method="post" id="myForm" enctype='multipart/form-data'>
            <p id="noti"><?= @$noti ?></p>
            <table class="table">
            <tr>
                <th colspan="4">Them sua moi</th>
            </tr>
            <tr>
                <td>Ma sua: </td>
                <td><input type="text" id="maSua" name="maSua"></td>
                <td>Ten sua: </td>
                <td><input type="text" id="tenSua" name="tenSua"></td>
            </tr>
            <tr>
                <td>Hang sua: </td>
                <td>
                    <!-- <input type="text" id="hangSua" name="hangSua"> -->
                    <select name="hangSua" id="hangSua">
                        <?php while ($rows = mysqli_fetch_row($hangSua))
                            echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                        ?>
                    </select>
                </td>
                <td>Loai sua: </td>
                <td>
                    <!-- <input type="text" id="loaiSua" name="loaiSua"> -->
                    <select name="loaiSua" id="loaiSua">
                        <?php while ($rows = mysqli_fetch_row($loaiSua))
                            echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trong luong: </td>
                <td><input type="text" id="trongLuong" name="trongLuong"></td>
                <td>Don gia: </td>
                <td> <input type="text" id="donGia" name="donGia"> </td>
            </tr>
            <tr>
                <td>TP dinh duong: </td>
                <td colspan="3"><textarea id="TPDD" name="TPDinhDuong" id="" cols="48" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Loi ich: </td>
                <td colspan="3"><textarea id="loiIch" name="loiIch" id="" cols="48" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Hinh anh: </td>
                <td colspan="3"><input type="file" id="hinhAnh" name="hinhAnh" onchange="validateImage()"></td>
            </tr>
            <tr>
                <td colspan="4"> <input class="submit" type="submit" name="submit" value="Them"></td>
            </tr>
        </table>
        </form>

    </div>
    
</div>
    

<script>
    function validateImage() {
        let inputF = document.getElementById('hinhAnh');
        let inputFPath = inputF.value;
        let imgFormat = /(\.jpg|\.jpeg|\.png)$/i;
        if (!imgFormat.exec(inputFPath)) {
            alert('Invalid file type');
            inputF.value = '';
            return false;
        }
    }
    $('#myForm').submit(function() {
        if ($('#maSua').val().trim().length == 0) {
            $('#noti').html('empty id')
            return false
        } else if ($('#tenSua').val().trim().length == 0) {
            $('#noti').html('empty name')
            return false
        } else if ($('#hangSua').val().trim().length == 0) {
            $('#noti').html('empty hang sua')
            return false
        } else if ($('#loaiSua').val().trim().length == 0) {
            $('#noti').html('empty type')
            return false
        } else if ($('#trongLuong').val().trim().length == 0) {
            $('#noti').html('empty weight')
            return false
        } else if ($('#donGia').val().trim().length == 0) {
            $('#noti').html('empty price')
            return false
        } else if ($('#TPDD').val().trim().length == 0) {
            $('#noti').html('empty nutrient')
            return false
        } else if ($('#loiIch').val().trim().length == 0) {
            $('#noti').html('empty good')
            return false
        } else
        if ($('#hinhAnh').val() == '') {
            $('#noti').html('empty hinh')
            return false
        } else return true
    })
</script>
<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>

<!-- chinh sua giao dien -->