<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich hinh chu nhat</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">

    
</head>
<?php
    if (isset($_POST["lenght"])) {
        $lenght = $_POST["lenght"];
    } else $lenght = 0;
    if (isset($_POST["width"])) {
        $width = $_POST["width"];
    } else $width = 0;
    $result = $lenght * $width;
?>

<body>
    <H3>DIEN TICH HINH CHU NHAT</H1>
        <form action="2-1.php" method="POST">
            Chieu dai: <input type="number" name="lenght" value="<?= $lenght ?>"><br>
            Chieu rong: <input type="number" name="width" value="<?= $width ?>"><br>
            Dien tich: <input type="number" name="result" value="<?= $result ?>" disabled><br>
            <input type="submit" value="tinh" id="submit">

        </form>
</body>

</html>