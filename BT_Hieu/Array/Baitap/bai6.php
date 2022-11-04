<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 6</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$outputArr = '';
$index = '';
$max = '';
$sum = '';
$arr = array();

isset($_POST['inputArr']) ? $inputArr = $_POST['inputArr'] : 0;
isset($_POST['inputNum']) ? $inputNum = $_POST['inputNum'] : 0;

function getArr($inputArr)
{
    global $arr;
    $arr = explode(',', $inputArr);
    global $outputArr;
    $outputArr = implode(' # ', $arr);
}


function search($arr, $inputNum)
{
    global $index;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $inputNum) {
            $index .= ' ' . $i + 1;
        }
    }
}

if (isset($_POST['submit'])) {
    if ((trim($inputArr) != '') && (trim($inputNum != ''))) {
        getArr($inputArr);
        search($arr, $inputNum);
    } else $noti = 'invalid input';
}
?>

<body>
    <form action="bai6.php" method="POST">
        <table>
            <thead>
                <th colspan="2">Tim kiem</th>
            </thead>
            <tr>
                <td style="color: red;"><?=@$noti?></td>
            </tr>
            <tr>
                <td>Nhap mang:</td>
                <td><input type="text" name="inputArr" value="<?= @$inputArr ?>"></td>
            </tr>
            <tr>
                <td>Nhap so can tim:</td>
                <td><input type="num" name="inputNum" value="<?= @$inputNum ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Tim kiem">
                </td>
            </tr>
            <tr>
                <td>Mang:</td>
                <td>
                    <input type="text" name="outputArr" value="<?= $outputArr ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Ket qua tim kiem:</td>
                <td><input type="text" name="index" value="<?= $index ?>" disabled></td>
            </tr>

        </table>
    </form>
</body>

</html>