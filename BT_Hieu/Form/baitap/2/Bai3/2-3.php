<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phep tinh</title>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.validate.unobtrusive.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
</head>
<?php
$noti = '';
if (isset($_POST["num1"]))   $num1 = $_POST["num1"];
// else $num1 = 0;

if (isset($_POST["num2"]))   $num2 = $_POST["num2"];
// else $num2 = 0;

if (isset($_POST["math"]))   $math = $_POST['math'];



?>


<body>
    <p id="noti" style="color: red;"><?= $noti ?></p>
    <form action="/BT_Hieu/Form/baitap/2/Bai3/2-3Result.php" id="myForm" method="POST">
        <table>
            <thead>
                <th colspan="2">Phep tinh tren 2 so</th>
            </thead>
            <tr>
                <td>Chon phep tinh:</td>
                <td><input type="radio" name="math" value="Cong" checked>Cong
                    <input type="radio" name="math" value="Tru">Tru
                    <input type="radio" name="math" value="Nhan">Nhan
                    <input type="radio" name="math" value="Chia">Chia
                </td>
            </tr>
            <tr>
                <td>So thu nhat:</td>
                <td><input type="number" id="num1" name="num1" value="<?= $num1 ?>"></td>
            </tr>
            <tr>
                <td>So thu hai:</td>
                <td><input type="number" id="num2" name="num2" value="<?= $num2 ?>"></td>
            </tr>
            <tr>
                
                <td colspan="2"><input id="submit" type="submit" value="Tinh" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
<script>
    $('#myForm').submit(function() {
        if ($('#num1').val().trim().length == 0) {
            $('#noti').html('num 1 is empty!')
            return false;
        } else if ($('#num2').val().trim().length == 0) {
            $('#noti').html('num 2 is empty!')
            return false;
        } else return true;

    })
</script>

</html>