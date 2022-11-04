<link rel="stylesheet" href="/BT_Hieu/css/main.css">
<?php
    if ($_FILES['hinhAnh']['name'] != NULL) {
        move_uploaded_file(
            $_FILES["hinhAnh"]["tmp_name"],
            "D:\\xampp\\image\\" . $_FILES["hinhAnh"]["name"]
        );
        echo "<h3>Upload thành công</h3>";
        echo "Name: " . $_FILES["hinhAnh"]["name"] . "<br>";
        echo "Type: " . $_FILES["hinhAnh"]["type"] . "<br>";
        echo "Size: " . ($_FILES["hinhAnh"]["size"] / 1024) . "Kb<br>";
        echo "Temp. Stored in: " . $_FILES["hinhAnh"]["tmp_name"];
        $img = $_FILES["hinhAnh"]["tmp_name"];
        echo '<img src="' . $img . '">';
        sleep(10);
    } else echo "Vui lòng chọn file upload!";

    ?>