<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $arr = array();
function spawnArr($col, $row)
{
    global $output;
    global $arr;
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $arr[$i][$j] = rand(-100, 100);
        }
    }
    $output .='Array Generated:'. PHP_EOL;
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $output .= '(' . $arr[$i][$j] . ')';
        }
        $output .= PHP_EOL;
    }
}

function customArr($col,$row){
    global $output;
    global $arr;

    $output .=PHP_EOL.'Array with Odd-cols and Even-rows:'. PHP_EOL;
    for ($i = 1; $i < $row; $i+=2) {
        for ($j = 0; $j < $col; $j+=2) {
            $output .= '(' . $arr[$i][$j] . ')';
        }
        $output .= PHP_EOL;
    }
}

function MoT($col,$row){
    global $output;
    global $arr;
    $count=0;

    $output .=PHP_EOL.'Multiples of 10:'. PHP_EOL;
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if($arr[$i][$j] % 10 ==0){
                $count += $arr[$i][$j];
            }
        }
    }
    $output .= $count;
}

if (isset($_POST['submit'])) {
    isset($_POST['col']) ? $col = $_POST['col'] : $col = '';
    isset($_POST['row']) ? $row = $_POST['row'] : $row = '';
    if (($row != '') && ($col != '')) {
        if ((2 <= $row && $row <= 5) && (2 <= $col && $col <= 5)) {
            spawnArr($col, $row);
            customArr($col, $row);
            MoT($col, $row);
        } else $noti = 'Valid input range from 2 to 5';
    } else $noti = 'Empty input';
}
?>

<body>
    <form action="" method="POST" class="classchinh">
        <table>
            <tr>
                <td>So cot</td>
                <td><input type="number" name="col" value="<?= @$col ?>"></td>
            </tr>
            <tr>
                <td>So dong</td>
                <td><input type="number" name="row" value="<?= @$row ?>"></td>
            </tr>
            <tr>
                <td colspan="4"><textarea class="submit" name="output" id="" cols="35" rows="14"  ><?= @$output ?></textarea></td>
            </tr>
            <tr>
                <td colspan="4">
                    <?= @$noti ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><input class="submit" name="submit" type="submit" value="Result"></td>
            </tr>
        </table>
    </form>
</body>

</html>