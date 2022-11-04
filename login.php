<?php # Script 3.4 - index.php
include('controller.php');
?>

<?php
$currentUser == 'null' ? $style = '' : $style = 'style="display:none"';
if (isset($_POST['login'])) {
    $noti = 'noti';
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
    if ($noti == 'login success') {
        $style = 'style="display:none"';
        header("Refresh:0");
        // $currentUser = getUser($username);
        // session_start();
        // $_SESSION['currentUser'] = getUser($username);
        // echo $_SESSION['currentUser'];
    }
}
// logout();


// OPTION DANG XUAT 


?>
<div class="modal-login" <?= $style ?>>
    <div class="login">
        <div class="switch-opt">
            <div class="atv">
                <p>LogIn</p>
            </div>
            <div class="">
                <p>SignUp</p>
            </div>
        </div>
        <form action="" method="POST" class="login-form">
            <div class="userName input">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Email or user ID" required>
            </div>
            <div class="password input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="login-btn input">
                <p><?= @$noti ?></p>
                <input type="submit" value="Login" name="login">
            </div>
        </form>
        <div class="relative">
            <p>Or login with</p>
            <div class="opt-grp">
                <i class="fa fa-google" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>