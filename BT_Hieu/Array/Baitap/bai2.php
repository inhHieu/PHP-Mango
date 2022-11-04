<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 2</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

</head>
<?php
isset($_POST['input']) ? $input = $_POST['input'] : $input = '';

$arr = array();
if ($input != '')
    if ($input < 2000) {
        for ($i = $input; $i <= 2000; $i++) {
            $arr[] = $i;
        }
    } else {
        for ($i = 2000; $i <= $input; $i++) {
            $arr[] = $i;
        }
    }
$output = '';
foreach ($arr as $value) {
    if ($value % 400 != 0) {
        if (($value % 4 == 0) && ($value % 100 != 0)) {
            $output .= "$value ";
        }
    } else $output .= "$value ";
}

// $output = implode(' ', $arr);
?>

<body>
    <form action="bai2.php" method="POST">
        <table>
            <thead>
                <th colspan="3"> Tim nam nhuan</th>
            </thead>
            <tr>
                <td>Năm:</td>
                <td><input type="number" name="input" value="<?= @$input ?>"></td>
                <td> <input type="submit" name="submit" value="Tìm"></td>
            </tr>
            <tr>
                <td colspan="3"><textarea name="output" id="" cols="33" rows="10">
                    <?= @$output ?>
                </textarea>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>