<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <form action="controller.php" method="get">
        Name: <input type="text" name="name"> <br>
        E-mail: <input type="text" name="email"> <br>
        Product: <select name="product" id="product">
            <optgroup label="Science">
                <option value="SP10"> Physics 10 Book</option>
                <option value="SC12"> Chemistry 12 Book</option>
            </optgroup>
            <optgroup label="Arts">
                <option value="AM"> Music 10 Book</option>
                <option value="AH"> History 9 Book</option>
            </optgroup>
        </select><br>        
        Feedback: <textarea name="feedback" id="fb" cols="30" rows="10"></textarea><br>
        You are:
            <input type="radio" name="person" value="Teacher">Teacher
            <input type="radio" name="person" value="Studen">Studen
            <input type="radio" name="person" value="Other">Other
        <br><input type="submit" id="submit">
    </form>
</body>
</html>