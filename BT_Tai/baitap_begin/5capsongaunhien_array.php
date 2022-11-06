<?php
    //$cars = array("Volvo", "BMW", "Toyota");
    //echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
    $so1=rand(0,65);
    $so2=rand(0,65);
    $so3=rand(0,65);
    $so4=rand(0,65);
    $so5=rand(0,65);
    $random =array($so1,$so2,$so3,$so4,$so5) ; 
    for($i = 0 ; $i < count($random) ; $i++)
    {
        if($random[$i+1]==$random[$i])
        {
            $random[$i+1]=rand(0,65); 
        }
        else
        {
            for($i = 0 ; $i < count($random) ; $i++)
            {
                echo "$random[$i] <br>" ;
            }
        }
    }
?>