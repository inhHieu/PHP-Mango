<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 8</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$ascen = '';
$descen = '';
$arr = array();

isset($_POST['inputArr']) ? $inputArr = $_POST['inputArr'] : 0;

function getArr($inputArr)
{
    global $arr;
    $arr = explode(',', $inputArr);
    global $oldArr;
    $oldArr = implode(' # ', $arr);
}

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function ascenArr($arr)
{
    global $arr;
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] > $arr[$j]) {
                swap($arr[$i], $arr[$j]);
            }
        }
    }
    global $ascen;
    $ascen = implode(' # ', $arr);
}
function descenArr($arr)
{
    global $arr;
    global $descen;
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $descen .= $arr[$i] . ' # ';
    }
}

if (isset($_POST['submit'])) {
    if ((trim($inputArr) != '')) {
        getArr($inputArr);
        ascenArr($arr);
        descenArr($arr);
    }else $noti = 'invalid input';
}
?>

<body>
    <form action="bai8.php" method="POST">
        <table>
            <thead>
                <th colspan="2">Sap Xep Mang</th>
            </thead>
            <tr>
                <td style="color: red;"><?=@$noti?></td>
            </tr>
            <tr>
                <td>Nhap mang:</td>
                <td><input type="text" name="inputArr" value="<?= @$inputArr ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sap Xep">
                </td>
            </tr>
            <tr>
                <td>Sau khi sap xep</td>
            </tr>
            <tr>
                <td>Tang dan:</td>
                <td>
                    <input type="text" name="ascen" value="<?= @$ascen ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Giam dan:</td>
                <td><input type="text" name="descen" value="<?= @$descen ?>" disabled></td>
            </tr>

        </table>
    </form>
</body>

</html>