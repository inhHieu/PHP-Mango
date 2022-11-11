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
if(isset($_POST['timnam']))
    $namnhohon=$_POST['timnam'];
else
    $namnhohon="";
if(isset($_POST['timyearlon']))
    $namlonhon=$_POST['timyearlon'];
else
    $timyearlon="";
class Nam
{
    protected $namnhohon;
    protected $namlonhon;
    function __construct($namnhohon,$namlonhon)
    {
        $this->namnhohon=$namnhohon;
        $this->namlonhon=$namlonhon;
    }
    function getNamnhohon(){return $this->namnhohon;}
    function getNamlonhon(){return $this->namlonhon;}
}
class NamNhuan extends Nam
{
    function KiemTraNamNhuan($namnhohon)
    {
        if($namnhohon%400==0 || $namnhohon%4==0 && $namnhohon%100!=0)
            return 1;
        else
            return 0;
    }
    function TimNamNhuan($namnhohon)
    {
        $kq=array();
        foreach(range(2000,$namnhohon) as $year)
        {
            if($this->KiemTraNamNhuan($year)==1)
            {
                $kq[]=$year;
            } 
        }
        $len=count($kq);
        for($i=0;$i<$len;$i++)
        {
            if($kq[$i]!="")
            echo $kq[$i]."\t";
        else
             echo $kq[$i]."\t";
        }
    }
}
if(isset($_POST['Search']))
{
    $namnhuan=new NamNhuan($namnhohon,$namlonhon);
    $kq=$namnhuan->TimNamNhuan($namnhohon);
}
?>
    <form action="bt2.php" method="POST">
        <table>
            <th><Label>Tìm Năm Nhuận</Label></th>
            <tr>
                <td>
                    <Label>Năm</Label>
                    <input type="text" name="timnam" id="">
                    <textarea name="ketqua1" id="" cols="30" rows="10">
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="Search" value="Tìm năm nhuận">
                </td>
                <td>
                    <Label>Năm nhập vào lớn hơn 2000</Label>
                </td>
                <td><Label>Năm nhuận</Label>
                <input type="text" name="timyearlon" id="">
                <textarea name="ketqua2" id="" cols="30" rows="10"></textarea>
            </td>

            </tr>
        </table>
    </form>
</body>
</html>
