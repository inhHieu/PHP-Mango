<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <title>Document</title>
</head>

<body>
    <form action='test2.php' method="POST" enctype='multipart/form-data'>
        Tên file: <td colspan="3"><input type="file" id="hinhAnh" name="hinhAnh" onchange="validateImage()"></td>

        <p>
            <input type='submit' value='Submit'>

    </form>
</body>

</html>