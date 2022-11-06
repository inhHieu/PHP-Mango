<?php
$fullname = "";
$email = "";
$text = "";
if(isset($_POST['fullname']) && $_POST['fullname'] != "") {
    $fullname = $_POST['fullname'];
}
if(isset($_POST['email']) && $_POST['email'] != "") {
    $email = $_POST['email'];
}
if(isset($_POST['feedback']) && $_POST['feedback'] != "") {
    $text= $_POST['feedback'];
}
?>
<html>
    <h1>Customer Feedback</h1>
    <p1>Please tell us what you think</p1><br><br>
    <form method='POST' action='<?php echo $_SERVER['PHP_SELF'];?>' >
        <p1>Your name:</p1><br>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>"><br><br>
        <p1>Your email address:</p1><br>
        <input type="text" name="email" value="<?php echo $email;?>"><br><br>
        <p1>Your feedback:</p1><br>
        <textarea rows="5"  cols="50" name="feedback"><?php echo $text;?>  </textarea><br><br>
        <input type="submit" Value="Send Feedback"><br><br>
        <?php
            error_reporting(E_ALL);
            //your rest of PHP code
        ?>
    </form>
</html>