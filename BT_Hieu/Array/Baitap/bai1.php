<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 1</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$output = '';
$arr = array();

isset($_POST['n']) ? $n = $_POST['n'] : $n = 0;

function randArr($n)
{
    global $arr;
    for ($i = 0; $i < $n; $i++) {
        $arr[] = rand(-1000, 1000);
    }
    global $output;
    $output = 'Mảng phát sinh ngẫu nhiên có độ dài n:&#13; ' . implode(" # ", $arr) . '&#13;';
}

function oddNum($arr)
{
    $temp = 0;
    foreach ($arr as $value) {
        if ($value % 2 == 0) {
            $temp++;
        }
    }
    global $output;
    $output .= 'Thành phần trong mảng có giá trị là số chẵn:&#13; ' . $temp . '&#13;';
}

function lessthan($arr)
{
    $temp = 0;
    foreach ($arr as $value) {
        if ($value < 100) {
            $temp++;
        }
    }
    global $output;
    $output .= 'Thành phần trong mảng có giá trị là số nhỏ hơn 100:&#13; ' . $temp . '&#13;';
}

function negativeNum($arr){
    $temp = 0;
    foreach ($arr as $value) {
        if ($value < 0) {
            $temp += $value;
        }
    }
    global $output;
    $output .= 'Tổng của các thành phần trong mảng giá trị là số âm:&#13; ' . $temp . '&#13;';
}

function zeroLast($arr){
    $temp = '';
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 10 == 0) {
            $temp .= "$i - ";
        }
    }
    global $output;
    $output .= 'Vị trí của các thành phần trong mảng có chữ số kề cuối là 0:&#13; ' . $temp . '&#13;';
}

function sortArr($arr){
    sort($arr);
    global $output;
    $output .= 'Mảng tăng dẩn :&#13; ' . implode(' # ', $arr) . '&#13;';
}

if (isset($_POST['submit'])) {
    if ($n != 0 && $n != '') {
        //a-------
        randArr($n);
        //b---------------
        oddNum($arr);
        //c---------------
        lessthan($arr);
        //d-------------------------
        negativeNum($arr);
        //e-------------------------
        zeroLast($arr);
       //f-------------------------
        sortArr($arr);
        //c-------------------------
    } else $noti = 'invalid input(n = 0 or null)';
}
?>

<body>
    <form action="bai1.php" method="POST">
        <table>
            <tr>
                <td>Input n:</td>
                <td><input type="number" name="n" value="<?= @$n ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="output" id="" cols="100" rows="10"><?= $output ?> </textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="GO"></td>
                <td style="color:red ;"><?=@$noti?></td>
            </tr>
        </table>
    </form>
</body>

</html>