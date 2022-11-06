<?php 
    $a =rand(0,65);
    $b =rand(0,65);
    echo "$a <br>" ; 
    echo "$b <br>" ; 
    while($a==$b)
    {
        $b= rand(0,65);
    }
    $c = rand(0,65);
    while($c==$a||$c==$b)
    {
        $c=rand(0,65);
        
    } 
    echo "$c <br>" ;
    $d = rand(0,65);
    while($d==$a||$d==$b||$d==$c)
    {
        $d=rand(0,65);
        
    } 
    echo "$d <br>" ;
    $e = rand(0,65);
    while($e==$a||$e==$b||$e==$c||$e==$d)
    {
        $e=rand(0,65);
        
    } 
    echo "$e <br>" ;
    
    //file 
    $fp = @fopen('xulytaptin.txt',"a+");
    if(!$fp)
    {
        echo " Mo file khong thanh cong" ;
    }
    else 
    {
        $data1 = $a ;
        $data2 = $b ;
        $data3 = $c ;
        $data4 = $d ;
        $data5 = $e ;
        fwrite($fp,"$data1...");
        fwrite($fp,"$data2...");
        fwrite($fp,"$data3...");
        fwrite($fp,"$data4...");
        fwrite($fp,"$data5...");
        fclose($fp);
    }
?>