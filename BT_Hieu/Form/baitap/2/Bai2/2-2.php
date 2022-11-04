<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toan tien dien</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">


</head>

<body style="background-color: #edf6f9; color: #222; display: grid ; place-content: center ;">
<?php
    $noti ='&nbsp';
    if(isset($_POST["name"])){
        $name = $_POST["name"];
    } else $name='';

    if(isset($_POST["old"])){
        $old = $_POST["old"];
    } else $old=0;

    if(isset($_POST["new"])){
        $new = $_POST["new"];
    } else $new= $old + 0;

    if(isset($_POST["price"])){
        $price = $_POST["price"];
    } else $price = 2000;

    if(isset($_POST["tinh"])){
        if(trim($name) ==''){
            $noti= 'name empty';
        }else if($old >= $new){
            $noti= 'old >= new';
        }else $total =($new - $old)* $price;
    }
    else $total= 0;

?>
    <form action="2-2.php" method="POST" style="background-color: #ffddd2; width: fit-content;">
        <table>
            <thead> 
                <th style="background-color: #e29578; font-size: large;" colspan="3" align="center">THANH TOAN TIEN DIEN</th> 
            </thead>
            <tr>
                <td> Ten chu ho</td>
                <td><input type="text" name="name" value="<?= $name?>"></td>
                <td></td>
            </tr>
            <tr>
                <td> Chi so cu</td>
                <td><input type="number" name="old" value="<?= $old?>"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td> Chi so moi</td>
                <td><input type="number" name="new" value="<?= $new?>"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td> Don gia</td>
                <td><input type="number" name="price" value="<?= $price?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td>So tien thanh toan</td>
                <td><input type="number" name="total" value="<?= $total?>" disabled></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td colspan="3" align="center"> <input type="submit" name="tinh" value="Tinh"></td>            </tr>
        </table>
    </form>    
    
    <p style="color: red;"><?= $noti ?></p>
</body>
</html>