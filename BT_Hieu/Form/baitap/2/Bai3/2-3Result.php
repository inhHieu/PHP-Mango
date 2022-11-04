<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <title>Ket qua</title>
</head>
<?php
$num1 =(int) $_POST['num1'];
$num2 =(int) $_POST['num2'];
$math = $_POST['math'];
switch($math){
            case 'Cong':
                $result = $num1 + $num2;
                break;
            case 'Tru':
                $result = $num1 - $num2;
                break;
            case 'Nhan':
                $result = $num1 * $num2;
                break;
            case 'Chia':
                $result = $num1 / $num2;
                break;
        }

?>

<body>

    <form action="" method="POST">
        <table>
            <thead>
                <th colspan="2">Phep tinh tren 2 so</th>
            </thead>
            <tr>
                <td>Phep tinh:</td>
                <td>
                    <p><?= $math ?></p>
                </td>
            </tr>
            <tr>
                <td>So thu nhat:</td>
                <td><input type="number" name="num1" disabled value="<?= $num1 ?>"></td>
            </tr>
            <tr>
                <td>So thu hai:</td>
                <td><input type="number" name="num2" disabled value="<?= $num2 ?>"></td>
            </tr>
            <tr>
                <td>Ket qua: </td>
                <td><input type="number" value="<?= $result ?>" disabled name="result"></td>
            </tr>
            <tr>
                <td colspan="2"><a href="javascript:window.history.back(-1);">Tro ve trang truoc</a></td>
            </tr>
        </table>
    </form>
</body>

</html>