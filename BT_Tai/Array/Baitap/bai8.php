<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 8</title>
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
        input {
            outline: none;
            border: none;
            border-radius: 4px;
            padding: 4px;
            background: #ffffff7a;
        }
        .show{
            text-align: center;
        
        }
        .show:hover{
            background: #f90045a1;
            color: #fff;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 50%;
            /* margin-top: 70px;
            display: flex;
            justify-content: center; */
        }
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: rgb(226 223 195 / 33%);
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(0 130 31 / 52%);
            color: white;
        }
    </style>
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
    }
}
?>

<body>
    <form action="bai8.php" method="POST" class="classchinh">
        <table id="customer">
            <thead>
                <th>Sap Xep Mang</th>
            </thead>
            <tr>
                <td>Nhap mang:</td>
                <td><input type="text" name="inputArr" value="<?= @$inputArr ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sap Xep" class="show">
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