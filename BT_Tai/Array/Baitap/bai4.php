 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bai 4</title>
     <link rel="stylesheet" href="/css/main.css">
     <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap');
        *{
            font-family: 'Roboto', sans-serif;
            padding: 0%;
            margin: 0%;
        }
        form{
            margin: auto;
        }
        .classchinh{
            margin: 250px auto;
            width: 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 2rem;
            border-radius: 8px;
            background: linear-gradient(-242deg, rgb(229 92 92 / 80%) 28.1%, rgb(0 173 255) 86%);
        }
        body {
            background: linear-gradient(113deg, #82f3b5, #ff9ba3 50%, #fdffa3 85%, #ffc894);
        }
        input {
            outline: none;
            border: none;
            border-radius: 4px;
            padding: 4px;
            background: #ffffff7a;
        }
     </style>
 </head>

 <?php
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $arr = array();

        $arr = explode(',', $input);
        $output = 0;
        foreach ($arr as $value) {
            $output += $value;
        }
        // $output = implode(',',$arr);
    }

    ?>

 <body>
     <form action="bai4.php" method="POST" class="classchinh">
         <table>
             <thead>
                 <th>Nhap va tinh tren day so</th>
             </thead>
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
                 <td><input type="text" name="output" value="<?= @$output ?>" class="submit"></td>
             </tr>
         </table>
     </form>
 </body>

 </html>