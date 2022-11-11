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
if(isset($_POST['giatri']))
$giatri=$_POST['giatri'];
else
$giatri="";
if(isset($_POST['replace']))
$replace=$_POST['replace'];
else
$replace="";
if(isset($_POST['arraycu']))
$arraycu=$_POST['arraycu'];
else
$arraycu="";
if(isset($_POST['arraymoi']))
$arraymoi=$_POST['arraymoi'];
else
$arraymoi="";
$replacearray=array();
$arraycu=explode(",",$nhap);
$arraymoi=array();
function Replace($arraycu,$giatri,$replace,$replacearray){ 
    $count=count($arraycu);
    for($i=0;$i<$count;$i++){
        if($arraycu[$i]==$giatri)
        {
            $arraycu[$i]=$replace;
            break;
        }
    }
    $replacearray=$arraycu;
    return $replacearray;
}
if(isset($_POST['Tinh'])){
    $arraymoi=Replace($arraycu,$giatri,$replace,$replacearray);
}
?>

    <form action="bt7.php" method="POST">
        <table border="1">
            <th><Label>Thay Thế</Label></th>
            <tr>
                <td>
                    <Label>Nhập mảng:</Label>
                </td>
                <td>
                    <input type="text" name="nhap" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Nhập giá trị cần thay thế:</Label>     
                </td>
                <td>
                    <input type="text" name="giatri" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Giá trị thay thế:</Label>               
                </td>
                <td>
                    <input type="text" name="replace" id="">
                </td>
            </tr>
            <tr>
                <th><input type="submit" name="Tinh" value="Tính"></th>
            </tr>
            <tr>
                <td><Label>Mảng cũ:</Label></td>
                <td>
                    <input type="text" name="arraycu" value="<?php $count=count($arraycu); for($i=0;$i<$count;$i++) echo $arraycu[$i]." "; ?>">
                </td>
            </tr>
            <tr>
                <td><Label>Mảng sau khi thay thế:</Label></td>
                <td>
                    <input type="text" name="arraymoi" value="<?php  $count=count($arraymoi); for($i=0;$i<$count;$i++) echo $arraymoi[$i]." " ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>