<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pheptinh.php" method="post">
        <span>Chọn phép tính</span>
        <input type="radio" name="pt" id="Plus" value="Cong">
        <label for="Plus">Cộng</label>
        <input type="radio" name="pt" id="Minus" value="Tru">
        <label for="Minus">Trừ</label>
        <input type="radio" name="pt" id="Multi" value="Nhan">
        <label for="Multi">Nhân</label>
        <input type="radio" name="pt" id="Divide" value="Chia">
        <label for="Divide">Chia</label>
        <table>
            <tr>
                <td>
                <span>Số thứ nhất:</span>
                 <input type="text" name="FirstNumber">
                </td>
            </tr>
            <tr>
                <td>
                <span>Số thứ hai:</span>
                <input type="text" name="SecondNumber" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="Tính" id="" value="Tính">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>