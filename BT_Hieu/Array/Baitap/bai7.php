<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 7</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$oldArr = '';
$newArr = '';
$arr = array();

isset($_POST['inputArr']) ? $inputArr = $_POST['inputArr'] : 0;
isset($_POST['oldNum']) ? $oldNum = $_POST['oldNum'] : 0;
isset($_POST['newNum']) ? $newNum = $_POST['newNum'] : 0;

function getArr($inputArr)
{
    global $arr;
    $arr = explode(',', $inputArr);
    global $oldArr;
    $oldArr = implode(' # ', $arr);
}


function replace($arr, $oldNum, $newNum)
{
    global $arr;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $oldNum) $arr[$i] = $newNum;
    }
    global $newArr;
    $newArr = implode(' # ', $arr);
}

if (isset($_POST['submit'])) {
    if ((trim($inputArr) != '') && (trim($oldNum != '')) && (trim($newNum != ''))) {
        getArr($inputArr);
        replace($arr, $oldNum, $newNum);
    }else $noti = 'invalid input';
}
?>

<body>
    <form action="bai7.php" method="POST">
        <table>
            <thead>
                <th colspan="4">Thay the</th>
            </thead>
            <tr>
                <td style="color: red;"><?=@$noti?></td>
            </tr>
            <tr>
                <td>Nhap mang:</td>
                <td colspan="3"><input type="text" name="inputArr" value="<?= @$inputArr ?>"></td>
            </tr>
            <tr>
                <td>Thay the so:</td>
                <td><input type="num" name="oldNum" value="<?= @$oldNum ?>"></td>
                <td>=></td>
                <td><input type="num" name="newNum" value="<?= @$newNum ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <input type="submit" name="submit" value="Thay the">
                </td>
            </tr>
            <tr>
                <td>Mang cu:</td>
                <td colspan="3">
                    <input type="text" name="oldArr" value="<?= @$oldArr ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Mang moi:</td>
                <td colspan="3"><input type="text" name="newArr" value="<?= @$newArr ?>" disabled></td>
            </tr>

        </table>
    </form>
</body>

</html>