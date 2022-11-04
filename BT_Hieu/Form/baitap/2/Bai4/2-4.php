<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 4</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<?php


?>

<body>
    <form action="2-4Result.php" method="POST" id="myForm">
        <table>
            <thead>
                <th colspan="6"> Enter Your Information</th>
            </thead>
            <tr>
                <td colspan="2">Ho Ten:</td>
                <td colspan="4"><input type="text" id="name" name="name" id=""></td>
            </tr>
            <tr>
                <td colspan="2">Dia chi:</td>
                <td colspan="4"><input type="text" id="address" name="address" id=""></td>
            </tr>
            <tr>
                <td colspan="2">So dien thoai:</td>
                <td colspan="4"><input type="number" id="phone" name="phone" id=""></td>
            </tr>
            <tr>
                <td colspan="2">Gioi tinh:</td>
                <td colspan="2"><input type="radio" name="sex" value="nam" checked>Nam</td>
                <td colspan="2"><input type="radio" name="sex" value="nu">Nu</td>
            </tr>
            <tr>
                <td colspan="2">Quoc Tich:</td>
                <td colspan="4"><select id="region" name="region" id="">
                        <option value="VietNam">Viet Nam</option>
                        <option value="VietNam">Viet Nam so 1</option>
                        <option value="VietNam">Viet Nam Vo dich</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2">Cac mon da hoc</td>
                <td><input type="checkbox" id="obj" name="obj" value="php" id="">PHP</td>
                <td><input type="checkbox" id="obj" name="obj" value="csharp" id="">C#</td>
                <td><input type="checkbox" id="obj" name="obj" value="xml" id="">XML</td>
                <td><input type="checkbox" id="obj" name="obj" value="python" id="">Python</td>
            </tr>
            <tr>
                <td colspan="2">Ghi chu:</td>
                <td colspan="4"><textarea id="note" name="note" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" class="submit" name="submit" value="Gui"></td>
                <td colspan="3"><input type="reset" class="submit" name="cancel" value="Huy"></td>
            </tr>
            <tr>
                <td colspan="6"><p style="color:red ;" id="noti"></p></td>
            </tr>
        </table>
    </form>

    <script>
        $('#myForm').submit(function() {
            if ($('#name').val().trim().length == 0) {
                $('#noti').html('empty name')
                return false
            } else if ($('#address').val().trim().length == 0) {
                $('#noti').html('empty address')
                return false
            } else if ($('#phone').val().trim().length == 0) {
                $('#noti').html('empty phone number')
                return false
            } else if ($('#region').val().trim().length == 0) {
                $('#noti').html('empty Quoc tich')
                return false
            } else if ($('#obj').val().trim().length == 0) {
                $('#noti').html('empty Mon hoc')
                return false
            } else if ($('#note').val().trim().length == 0) {
                $('#noti').html('empty Ghi chu')
                return false
            } else return true
        })
    </script>

</body>

</html>