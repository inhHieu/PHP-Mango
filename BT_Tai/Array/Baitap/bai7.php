<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 7</title>
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
        .classchinh{
            margin: 250px auto;
            width: 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 2rem;
            border-radius: 8px;
            background: linear-gradient(-242deg, rgb(229 92 92 / 80%) 28.1%, rgb(0 173 255) 86%);
        }
        body {
            background: linear-gradient(113deg, #82f3b5, #ff9ba3 50%, #fdffa3 85%, #ffc894);
        }
        .show{
            text-align: center;
        
        }
        .show:hover{
            background: #f90045a1;
            color: #fff;
        }
    </style>
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
    }
}
?>

<body>
    <form action="bai7.php" method="POST" class="classchinh">
        <table>
            <thead>
                <th>Thay the</th>
            </thead>
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
                    <input type="submit" name="submit" value="Thay the" class="show">
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