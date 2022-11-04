<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 5</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$outputArr = '';
$min = '';
$max = '';
$sum = '';
$arr = array();

isset($_POST['input']) ? $input = $_POST['input'] : 0;

function arrGen($n)
{
    global $arr;
    for ($i = 0; $i < $n; $i++) {
        $arr[] = rand(0, 20);
    }
    global $outputArr;
    $outputArr = implode(' # ', $arr);
}
function myMin($arr)
{
    $temp = $arr[0];
    foreach ($arr as $value) {
        $value < $temp ? $temp = $value : '';
    }
    global $min;
    $min = $temp;
}
function myMax($arr)
{
    $temp = $arr[0];
    foreach ($arr as $value) {
        $value > $temp ? $temp = $value : '';
    }
    global $max;
    $max = $temp;
}
function mySum($arr){
    $temp = 0;
    foreach($arr as $value){
        $temp += $value;
    }
    global $sum;
    $sum = $temp;
}

if (isset($_POST['submit'])) {
    if (trim($input) != '') {
        arrGen($input);
        myMin($arr);
        myMax($arr);
        mySum($arr);
    }
}
?>

<body>
    <form action="bai5.php" method="POST">
        <table>
            <thead>
                <th>Phat sinh mang va tinh toan</th>
            </thead>
            <tr>
                <td>Nhap so phan tu:</td>
                <td><input type="text" name="input" value="<?= @$input ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phat sinh">
                </td>
            </tr>
            <tr>
                <td>Mang:</td>
                <td>
                    <p><?= $outputArr ?></p>
                </td>
            </tr>
            <tr>
                <td>Min:</td>
                <td><input type="text" name="min" value="<?= $min ?>" disabled></td>
            </tr>
            <tr>
                <td>Max:</td>
                <td><input type="text" name="max" value="<?= $max ?>" disabled></td>
            </tr>
            <tr>
                <td>Tong:</td>
                <td><input type="text" name="sum" value="<?= $sum ?>" disabled></td>
            </tr>
        </table>
    </form>
</body>

</html>