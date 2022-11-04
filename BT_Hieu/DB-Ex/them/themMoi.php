<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    #noti {
        color: red;
    }
</style>

<?php
// INSERT INTO sua(Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh) VALUES ('testMa','testTen','AB','SB','3030','300300','testTPDD','testL','testHinh');

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




<body>

    <form action="themResult.php" method="post" id="myForm" enctype='multipart/form-data'>
        <p id="noti"><?= @$noti ?></p>
        <table>
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
            // Image preview
            //  else {
            //     if (inputF.files && inputF.files[0]) {
            //         var reader = new FileReader();
            //         reader.onload = function(e) {
            //             document.getElementById(
            //                     'imagePreview').innerHTML =
            //                 '<img src="' + e.target.result +
            //                 '"/>';
            //         };

            //         reader.readAsDataURL(inputF.files[0]);
            //     }
            // }
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
</body>

</html>