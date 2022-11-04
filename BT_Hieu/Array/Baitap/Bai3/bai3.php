<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 3</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
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
} else $noti = 'input must > 2'

?>

<body>
    <form action="bai3.php" method="POST">
        <table>
            <thead>
                <th colspan="3">Tinh nam am lich</th>
            </thead>
            <tr>
                <td colspan="3" style="color: red;"><?=@$noti?></td>
            </tr>
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
                <td colspan="3" style="text-align: center;">
                    <!-- <img width="300px"src="img/<?= @$imageArr[$lname] ?>"></img> -->
                    <?php
                    if (isset($_POST['input']) && $_POST['input'] > 2) {
                        echo '<img width="300px"src="img/' . $imageArr[$lname] . '"></img>';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>