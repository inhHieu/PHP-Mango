<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
    <div id="phpdiv">
        <?php
            $path= 'xulytaptin.txt' ; 
            $fp= @fopen($path,"r");
            if(!$fp)
            {
                echo "mo file khong thanh cong"; 
            }
            else
            {
                echo "mo file thanh cong" ;
                $data = fread($fp,filesize('xulytaptin.txt'));
                echo $data ; 
                

            }
        ?>
    </div>
</body>
</html>