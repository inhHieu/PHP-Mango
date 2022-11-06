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
$bxh = array();
$myfile = fopen("bxh.txt", "a+") or die("Unable to open file!");
// Output one line until end-of-file
$string = fread($myfile, filesize("bxh.txt"));
$bxh = explode(',', $string);

if (isset($_POST['add'])) {
    if (isset($_POST['name'])  && trim($_POST['name'] != '')) {
        $name = $_POST['name'];
        array_push($bxh, $name); //fix
        $filePath = "bxh.txt";
        $lines = count(file($filePath));
        fwrite($myfile, $lines + 1 . ' ' . $name . ',' . PHP_EOL);
        $BHX ='Added' . $name. 'to rank '. $lines+1;
    }
}

if (isset($_POST['BXH'])) {
    $BXH = implode('', $bxh);
}
fclose($myfile);
?>

<body>
    <form action="bai10.php" method="POST" class="classchinh">
        <table id="customer">
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
        </table>
    </form>
</body>

</html>