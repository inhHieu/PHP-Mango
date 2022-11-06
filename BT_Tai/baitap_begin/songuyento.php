<?php
    function check_prime($n){
        for ($i = 2; $i <= sqrt($n); $i++) 
        {
            if ($n % $i == 0)
            {
                return false;
            }
        }
        return true;
    }
$n = rand(1,100);
if(check_prime($n))
    echo "{$n} là số nguyên tố";
else
    echo "{$n} là hợp số";
?>  