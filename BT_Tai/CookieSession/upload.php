<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if($_FILES['ProductImg']['name']!=NULL)
    { 
        move_uploaded_file($_FILES["ProductImg"]["tmp_name"], 
        "D:\\Applications\\XAMPP\\image\\".$_FILES["ProductImg"]["name"]); 
        echo "<h3>Upload thành công</h3>";
        echo "Name: " .$_FILES["ProductImg"]["name"]."<br>" ;
        echo "Type: " .$_FILES["ProductImg"]["type"]."<br>";
        echo "Size: " .($_FILES["ProductImg"]["size"]/1024)."Kb<br>";
        echo "Temp. Stored in: ".$_FILES["ProductImg"]["tmp_name"];
    }
    else echo "Vui lòng chọn file upload!";
    ?>
</body>
</html>