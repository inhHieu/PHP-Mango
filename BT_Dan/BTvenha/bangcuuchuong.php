<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng cửu chương</title>
</head>
<body>
    <?php
       echo "<table border='1px'>";
        for($i = 1; $i < 10; $i ++) {
            echo "<tr>";
            for($j = 1; $j <= 10; $j ++) {
                echo "<td>";
                echo "$i x $j = " . ($i * $j);
                echo "<br>";
            }
            echo "</td>";
        }
    ?>
</body>
</html>