<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 1</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap');

        *{
            font-family: 'Times New Roman', Times, serif;
            padding: 0%;
            margin: 0%;
        }
        form{
            margin: auto;
        }
        .classchinh{
            margin: 150px auto;
            width: 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 2rem;
            border-radius: 8px;
            background: linear-gradient(-242deg, rgb(229 92 92 / 80%) 28.1%, rgb(0 173 255) 86%);
        }
        .show{
            text-align: center;
            cursor: pointer;
            /* margin-top: 8px; */
        }
        .show:hover{
            background: #f90045a1;
            color: #fff;
        }
        body {
            background: linear-gradient(113deg, #82f3b5, #ff9ba3 50%, #fdffa3 85%, #ffc894);
        }
        .tdtext{
            text-decoration: underline;
            font-weight: 900;
        }
        input {
            outline: none;
            border: none;
            border-radius: 4px;
            padding: 4px;
            background: #ffffff7a;
        }
        textarea{
            width: 550px;
            outline: none;
            /* border: none; */
            border-radius: 4px;
            padding: 4px;
            background: #ffffff7a;
            border-width: 1px;
            
        }
    </style>
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
    if ($n != 0) {
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
    }
}
?>

<body>
    <form action="bai1.php" method="POST" class="classchinh">
        <table>
            <tr>
                <td class="tdtext">INPUT N:</td>
                <td><input type="number" name="n" value="<?= @$n ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="output" id="" cols="100" rows="10"><?= $output ?> </textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="GO" class="show"></td>
            </tr>
        </table>
    </form>
</body>

</html>