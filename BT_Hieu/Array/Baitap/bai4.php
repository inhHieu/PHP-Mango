 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bai 4</title>
     <link rel="stylesheet" href="/BT_Hieu/css/main.css">

 </head>

 <?php
    if (isset($_POST['input']) && trim($_POST['input']) != '') {
        $input = $_POST['input'];
        $arr = array();

        $arr = explode(',', $input);
        $output = 0;
        foreach ($arr as $value) {
            $output += $value;
        }
        // $output = implode(',',$arr);
    }else $noti ='Invalid or empty input'

    ?>

 <body>
     <form action="bai4.php" method="POST">
         <table>
             <thead>
                 <th colspan="2">Nhap va tinh tren day so</th>
             </thead>
             <tr>
                <td style="color: red;"><?=@$noti?></td>
             </tr>
             <tr>
                 <td>Nhap day so:</td>
                 <td><input type="text" name="input" value="<?= @$input ?>"></td>
             </tr>
             <tr>
                 <td></td>
                 <td>
                     <input type="submit" value="Tong day so">
                 </td>
             </tr>
             <tr>
                 <td>Tong day so:</td>
                 <td><input type="text" name="output" value="<?= @$output ?>"></td>
             </tr>
         </table>
     </form>
 </body>

 </html>