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
$bxh = array();
$myfile = fopen("bxh.txt", "a+") or die("Unable to open file!");
// Output one line until end-of-file
$string = fread($myfile, filesize("bxh.txt"));
$bxh = explode(',', $string);

if (isset($_POST['add'])) {
    if (isset($_POST['name'])  && trim($_POST['name'] != '')) {
        $name = $_POST['name'];
        array_push($bxh, $name); //need fix later
        $filePath = "bxh.txt";
        $lines = count(file($filePath));
        fwrite($myfile, $lines + 1 . ' ' . $name . ',' . PHP_EOL);
        $BHX ='Added' . $name. 'to rank '. $lines+1;
    }else $noti = 'invalid input';
}

if (isset($_POST['BXH'])) {
    $BXH = implode('', $bxh);
}
fclose($myfile);
?>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td colspan="2">Ten bai hat:</td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="name" value="<?= @$name ?>"></td>
            </tr>
            <tr>
                <td colspan="2">Bang xep hang:</td>
            </tr>
            <tr>
                <td colspan="2"><textarea disabled name="BXH" id="" cols="30" rows="10"><?= @$BXH ?></textarea></td>
            </tr>
            <tr>
                <td><input class="submit" type="submit" name="add" value="Them Bai Hat"></td>
                <td><input class="submit" type="submit" name="BXH" value="Bang Xep Hang"></td>
            </tr>
            <tr>
                <td style="color: red;"><?=@$noti?></td>
            </tr>
        </table>
    </form>
</body>

</html>