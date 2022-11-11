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
    if(isset($_POST['tenchuho']))
        $tenchuho= trim($_POST['tenchuho']);
    else {
        
    }

    if(isset($_POST['chisocu']))
        $chisocu= trim($_POST['chisocu']);
    else  $chisocu=0 ;

    if(isset($_POST['chisomoi']))
        $chisomoi= trim($_POST['chisomoi']);
    else  $chisomoi=0 ;

    if(isset($_POST['dongia']))
        $dongia= trim($_POST['dongia']);
    else  $dongia=2000 ;
    
    if(isset($_POST['Tinh']))
        if (is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($dongia))
            $sotienthanhtoan= (($chisocu-$chisomoi)*$dongia);
        else{
            echo "sai ở số ";
            $sotienthanhtoan="";

        }
    else $sotienthanhtoan=0;
    ?>

<form align='center' action="" method="POST">

    <table>
    <thead>
        <h3>Thanh Toán Tiền Điện</h3>
     </thead>
     <tr>
        <td> Tên Chủ Hộ</td>
        <td> <input type="text" name="tenchuho" value="<?php  echo @$tenchuho;?>"> </td>
    </tr>
    <tr>
        <td> Chỉ Số Cũ</td>
        <td> <input type="number" name="chisocu" value="<?php  echo @$chisocu;?>"> </td>
    </tr>
    <tr>
        <td> Chỉ Số Mới</td>
        <td> <input type="number" name="chisomoi" value="<?php  echo @$chisomoi;?>"> </td>
    </tr>
    <tr>
        <td> Đơn Giá</td>
        <td> <input type="number" name="dongia" value="<?php  echo @$dongia;?>"> </td>
    </tr>
    <tr>
        <td> Số Tiền Thanh Toán</td>
        <td> <input type="text" name="sotienthanhtoan" disabled  value="<?php  echo @$sotienthanhtoan;?>"> </td>
    </tr>
    </table>

    <tr>
        <td> <input type="submit" name="Tinh" value="Tính"> </td>
    </tr>
</form>
</body>
</html>