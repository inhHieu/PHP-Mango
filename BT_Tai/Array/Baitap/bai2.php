<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 2</title>
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
            margin: 150px auto;
            width: 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 2rem;
            border-radius: 8px;
            background: linear-gradient(-242deg, rgb(229 92 92 / 80%) 28.1%, rgb(0 173 255) 86%);
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
            border: none;
            border-radius: 4px;
            padding: 4px;
            background: #ffffff7a;
            text-align: center;
            text-decoration: none;
            text-shadow: orange 2px 3px 4px;
        }
        .show{
            text-align: center;
        
        }
        .show:hover{
            background: #f90045a1;
            color: #fff;
        }
        body {
            background: linear-gradient(113deg, #82f3b5, #ff9ba3 50%, #fdffa3 85%, #ffc894);
        }
    </style>
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

foreach ($arr as $value) {
    if ($value % 400 != 0) {
        if (($value % 4 == 0) && ($value % 100 != 0)) {
            $output .= "$value ";
        } 
    }else $output .= "$value ";
}

// $output = implode(' ', $arr);
?>

<body>
    <form action="bai2.php" method="POST" class="classchinh">
        <table>
            <thead>Tim nam nhuan</thead>
            <tr>
                <td>Năm:</td>
                <td><input type="number" name="input" value="<?= @$input ?>"></td>
                <td> <input type="submit" name="submit" value="Tìm" class="show"></td>
            </tr>
            <tr>
                <td colspan="3"><textarea name="output" id="" cols="30" rows="10">
                    <?= @$output ?>
                </textarea>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>