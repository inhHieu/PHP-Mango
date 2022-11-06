<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 3</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap');
        *{
            font-family: 'Roboto', sans-serif;
            padding: 0%;
            margin: 0%;
        }
        form{
            margin: auto;
        }
        body {
            background: linear-gradient(113deg, #82f3b5, #ff9ba3 50%, #fdffa3 85%, #ffc894);
        }
        .classchinh{
            margin: 250px auto;
            width: 600px;   
            /* height: 200px; */
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 2rem;
            border-radius: 8px;
            background: linear-gradient(-242deg, rgb(229 92 92 / 80%) 28.1%, rgb(0 173 255) 86%);
        }
    </style>
</head>
<?php
$fnameArr = array('Qúy', 'Giáp', 'Ất', 'Bình', 'Đinh', 'Mậu', 'Kỷ', 'Canh', 'Tân', 'Nhâm');
$lnameArr = array('Hợi', 'Tý', 'Sửu', 'Dần', 'Mẹo', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất');
$imageArr = array('hoi.jpg', 'chuot.jpg', 'suu.jpg', 'dan.jpg', 'meo.jpg', 'thin.jpg', 'ty.jpg', 'ngo.jpg', 'mui.jpg', 'than.jpg', 'dau.jpg', 'tuat.jpg');

if (isset($_POST['input']) && $_POST['input'] > 2) {
    $input = $_POST['input'];
    $year = (int)$_POST['input'] - 3;
    $fname = @(int)$year % 10;
    $lname = @(int)$year % 12;
    $output = "$fnameArr[$fname] $lnameArr[$lname]";
}

?>

<body>
    <form  action="bai3.php" method="POST" class="classchinh">
        <table>
            <thead>Tinh nam am lich</thead>
            <tr>
                <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="number" name="input" value="<?= @$input ?>"></td>
                <td> <input type="submit" name="submit" value="=>"></td>
                <td><input type="text" name="output" value="<?= @$output ?>" disabled></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;"><img width="300px"src="img/<?= @$imageArr[$lname] ?>"></img>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>