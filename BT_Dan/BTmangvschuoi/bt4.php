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
    
    if(isset($_POST['nhap']))
        $text=$_POST['nhap'];
    else
    $text="";
    if(isset($_POST['Ketqua']))
        $ketqua=$_POST['Ketqua'];
    else
        $ketqua="";
    if(isset($_POST['Tinh']))
    {
        
        $text_to_array=explode(",",$text);
        function CongMang($text_to_array)
        {
            $Tong=0;
            foreach($text_to_array as $value)
                $Tong+=$value;
            return $Tong;
        }
        $ketqua=CongMang($text_to_array);
        
    }
?>
    <form action="bt4.php" method="POST">
    <table border="0">
        <th><h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3></th>
        <tr>
            <td>
                <label for="">Nhập dãy số:</label>
                <input type="text" name="nhap" id="">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="Tinh">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Tổng dãy số:</label>
                <textarea name="Ketqua" id="" >
                    <?php 
                        echo "$ketqua";
                    ?>
                </textarea>
            </td>
        </tr>
    </table>
    </form>
 
</body>
</html>