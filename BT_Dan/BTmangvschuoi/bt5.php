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
    $random=array();
    if(isset($_POST['giatrilonnhat']))
        $giatrilonnhat=$_POST['giatrilonnhat'];
    else
        $giatrilonnhat="";
    if(isset($_POST['nhap']))
        $Nhap=$_POST['nhap'];
    else
    $Nhap="";
    if(isset($_POST['Mang']))
        $Mang=$_POST['Mang'];
    else
    $Mang="";
    if(isset($_POST['giatrilonnhat']))
    $giatrilonnhat=$_POST['giatrilonnhat'];
    else
    $giatrilonnhat="";
    if(isset($_POST['giatrinhonhat']))
        $giatrinhonhat=$_POST['giatrinhonhat'];
    else
    $giatrinhonhat="";
    if(isset($_POST['Ketqua']))
        $Ketqua=$_POST['Ketqua'];
    else
    $Ketqua="";

    function TaoMang($Nhap)
    {
            for($i=0;$i<$Nhap;$i++)
            {
                $random[$i]=rand(0,20);
            }
            return $random;
    }
    function XuatMang($random)
    {
    return $random;
    }
    function giatrilonnhat($random)
    {
        $dem=count($random);
        $MAX=$random[0];
        for($i=0;$i<$dem;$i++)
        {
            if($MAX<$random)
                $MAX=$random[$i];
        }
        return $MAX;
    }
    function giatrinhonhat($random)
    {
        $dem=count($random);
        $MIN=$random[0];
        for($i=0;$i<$dem;$i++)
        {
            if($MIN>$random)
                $MIN=$random[$i];
        }
        return $MIN;
    }
    function Tong($random)
    {
        $dem=count($random);
        $Tong=0;
        for($i=0;$i<$dem;$i++)
            $Tong+=$random[$i];
        return $Tong;
    }
    if(isset($_POST['Tinh']))
    {
    $mang=TaoMang($Nhap);
    $Mang=XuatMang($mang);
    $giatrilonnhat=giatrilonnhat($mang);
    $giatrinhonhat=giatrinhonhat($mang);
    $Ketqua=Tong($mang);
    }
?>
    <form action="bt5.php" method="post">
        <table border="1">
            <th colspan="2"><h3>Phát Sinh Mảng Và Tính Toán</h3></th>
            <tr>
                <td>
                    <label for="">Nhập số:</label>
                </td>
                <td>
                     <input type="text" name="nhap">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="SubmitButton" type="submit" name="Tinh" value="tính toán và phát sinh">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Mảng</label>
                    
                </td>
                <td>
                <input class="Result" type="text" name="Mang" disabled="disabled" id=""
                    value="<?php $dem=count($Mang);
                        for($i=0;$i<$dem;$i++)
                        {
                            echo $Mang[$i]." ";
                        }
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">giá trị lớn nhất trong mảng</label>
                    
                </td>
                <td>
                <input class="Result" type="text" name="giatrilonnhat" disabled="disabled" id=""
                    value="<?php echo "$giatrilonnhat" ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">giá trị nhỏ nhất trong mảng</label>
                    
                </td>
                <td>
                <input class="Result" type="text" name="giatrinhonhat" disabled="disabled" id=""
                    value="<?php echo "$giatrinhonhat" ?>"
                    >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">tổng mảng</label>
                    
                </td>
                <td>
                <input class="Result" type="text" name="Ketqua" disabled="disabled" id=""
                    value="<?php echo "$Ketqua" ?>"
                    >
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
