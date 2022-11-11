<?php
    $mang=array();
    $s = rand(0,56);
    array_push($mang,$s);
    $i = rand(0,56);
    array_push($mang,$i);
    $x = rand(0,56);
    array_push($mang,$x);
    $y = rand(0,56);
    array_push($mang,$y);
    $z = rand(0,56);
    array_push($mang,$z);
    while(array_diff_assoc($mang, array_unique($mang)) != null) 
    //neu co trung thi tra 1 mang co gia tri != null
    // neu ko trung thi tra 1 mang null thi dung while
    {
    for($a = 0; $a < count($mang); $a++){
        for($b=$a+1 ; $b < count($mang) ; $b++){
            if($mang[$a] == $mang[$b]){
                $mang[$a] = rand(0,56);
            }
        }
    }
    }
    print_r($mang);
?>