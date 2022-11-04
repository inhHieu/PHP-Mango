<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>
<?php
$name = @$_POST['name'];
$sex = @$_POST['sex'];
$address = @$_POST['address'];
$phone = @$_POST['phone'];
$region = @$_POST['region'];
$note = @$_POST['note'];
$obj = @$_POST['obj'];
?>
<body>
    <h3><b>Ban da dang nhap thanh cong, duoi day la thong tin cua ban</b></h3>
    <P>Ho ten: <?= @$name ?></P>
    <P>Gioi tinh: <?= @$sex ?></P>
    <P>Dia chi: <?= @$address ?></P>
    <P>Dien thoai: <?= @$phone ?></P>
    <P>Quoc tich: <?= @$region ?></P>
    <P>Mon hoc: <?= @$obj ?></P>
    <P>Ghi chu: <?= @$note ?></P>
</body>
</html>