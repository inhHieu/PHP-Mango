
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
$nhap=$_POST['nhap'];
else
$nhap="";
if(isset($_POST['socantim']))
$socantim=$_POST['socantim'];
else
$socantim="";
if(isset($_POST['ketquamang']))
    $ketquamang=$_POST['ketquamang'];
else
    $ketquamang="";
if(isset($_POST['ketquatimduoc']))
    $ketquatimduoc=$_POST['ketquatimduoc'];
else
    $ketquatimduoc="";

        $mang=explode(",",$nhap);
    function InMang($mang)
    {
        return $mang;
    }
    function TimMang($socantim,$mang)
    {
            $dem=count($mang);
        if($mang !=0 )
        {
            for($i=0;$i<$dem;$i++)
            {
                if($mang[$i]==$socantim)
                {
                    $vitri=$i+1;
                    $text="Đã tìm thấy số $socantim tại vị trí $vitri";
                    break;
                }           
                else
                {
                    $text="không tìm thấy số $socantim";
                }
            }
            return $text;
        }
    }
    $ketquamang=InMang($mang);
    $ketquatimduoc=TimMang($socantim,$mang);
?>

    <form action="bt6.php" method="POST">
        <table>
            <th><Label>Tìm Kiếm</Label></th>
            <tr>
                <td><Label>Nhập Mảng:</Label></td>
                <td><input type="text" name="nhap"></td>
            </tr>
            <tr>
                <td><Label>Nhập số cần tìm:</Label></td>
                <td>
                    <input type="text" name="socantim" id="">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="search" value="Tìm Kiếm"></td>
            </tr>
            <tr>
                <td>
                    <Label>Mảng:</Label>
                </td>
                <td>
                    <input type="text" name="ketquamang" id=""
                    value="<?php 
                        $dem=count($ketquamang);
                        for($i=0;$i<$dem;$i++)
                            echo $ketquamang[$i]." ";
                    ?>"
                    >
                </td>
            </tr>
            <tr>
                <td><Label>Kết quả tìm kiếm</Label></td>
                <td><input type="text" name="ketquatimduoc" id="" value="<?php 
                echo "$ketquatimduoc" ?>"></td>
            </tr>
        </table>
    </form>
</body>
</html>
