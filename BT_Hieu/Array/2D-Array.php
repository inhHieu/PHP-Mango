<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
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
    <form action="2D-Array.php" method="POST">
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
                <td colspan="4" style="color:red ;">
                    <?= @$noti ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><input class="submit" name="submit" type="submit" value="Spawn"></td>
            </tr>
        </table>
    </form>
</body>

</html>