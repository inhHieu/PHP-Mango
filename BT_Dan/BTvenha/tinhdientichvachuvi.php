<?php
$a = rand (1,4);
$b = rand (10,100);

echo 'a = '. $a. '<br>'. 'b = '. $b. '<br>';
switch ($a){
    case 1:
        echo 'chu vi hình vuông: '. $b *4 . '<br>';
        echo 'diện tích hình vuông: '. $b *$b. '<br>';
        break;
    case 2:
        echo 'chu vi hình tròn: '.round($b * 2 *pi()) . '<br>';
        echo 'diện tích hình tròn: '.round($b *$b * pi() / 4 ) . '<br>';
        break;
    case 3:
        echo 'chu vi hình tam giác đều: '. $b *3 . '<br>';
        echo 'diện tích hình tam giác đều: '.round($b *$b * (sqrt(3)/4)) . '<br>';
        break;
    case 4:
        echo 'chu vi hình chữ nhật: '. ($b + $a) *2 . '<br>';
        echo 'diện tích hình chữ nhật: '. $a *$b . '<br>';
        break;
}
?>