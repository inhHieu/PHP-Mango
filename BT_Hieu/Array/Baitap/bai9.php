<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 9</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>

<?php
$ascen = '';
$descen = '';
$arr = array();

isset($_POST['stringA']) ? $stringA = $_POST['stringA'] : 0;
isset($_POST['stringB']) ? $stringB = $_POST['stringB'] : 0;

function getArr($inpStr)
{
    $arr = array();
    $arr = explode(',', $inpStr);
    return $arr;
}

function getLen($arr)
{
    $count = 0;
    foreach ($arr as $value) {
        $count++;
    }
    return $count;
}






function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function ascenArr($arr)
{
    // global $arr;
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
    // global $arr;
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] < $arr[$j]) {
                swap($arr[$i], $arr[$j]);
            }
        }
    }
    global $descen;
    $descen = implode(' # ', $arr);
}

if (isset($_POST['submit'])) {
    if ((trim($stringA) != '')) {
        $arrayA = getArr($stringA);
        $arrayB = getArr($stringB);
        $aLength = getLen($arrayA);
        $bLength = getLen($arrayB);
        $arrayC = array_merge($arrayA, $arrayB);
        $stringC = implode(' # ', $arrayC);
        ascenArr($arrayC);
        descenArr($arrayC);
    }
}
?>

<body>
    <form action="bai9.php" method="POST">
        <table>
            <thead>
                <th>Dem phan tu - Ghep - Sap Xep Mang</th>
            </thead>
            <tr>
                <td>Nhap mang A:</td>
                <td><input type="text" name="stringA" value="<?= @$stringA ?>"></td>
            </tr>
            <tr>
                <td>Nhap mang B:</td>
                <td><input type="text" name="stringB" value="<?= @$stringB ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thuc hien">
                </td>
            </tr>
            <tr>
                <td>So phan tu mang A:</td>
                <td><input type="text" name="aLength" value="<?= @$aLength ?>" disabled></td>
            </tr>
            <tr>
                <td>So phan tu mang B:</td>
                <td><input type="text" name="bLength" value="<?= @$bLength ?>" disabled></td>
            </tr>
            <tr>
                <td>Mang C:</td>
                <td><input type="text" name="arrayC" value="<?= @$stringC ?>" disabled></td>
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