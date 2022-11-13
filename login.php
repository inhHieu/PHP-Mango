<?php # Script 3.4 - index.php
include('controller.php');
?>
<?php
// $currentUser == 'null' ? $style = '' : $style = 'style="display:none"';
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
}else if (isset($_POST['Signup'])) {
    $noti = 'noti';
    $name = $_POST['name-reg'];
    $sdt = $_POST['SDT-reg'];
    $email = $_POST['email-reg'];
    $username = $_POST['username-reg'];
    $password = $_POST['password-reg'];
    $password_Conf = $_POST['password-reg-conf'];
    if($password == $password_Conf){
        $password_valid = $password;
        signUp($name, $sdt, $email, $username, $password_valid);
    }else $noti = "Password didn't match! Try again. ";
    if ($noti == 'signup success') {
        $style = 'style="display:none"';
        header("Refresh:0");
    }
}
?>
<div class="modal-login" <?= @$style ?>>
    <div class="login">
        <div class="switch-opt">
            <div class="atv login-opt">
                <p>LogIn</p>
            </div>
            <div class=" signup-opt">
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

<div class="modal-signup" <?= @$style ?>>
    <div class="signup">
        <div class="switch-opt">
            <div class=" login-opt">
                <p>LogIn</p>
            </div>
            <div class="atv signup-opt">
                <p>SignUp</p>
            </div>
        </div>
        <form action="" method="POST" class="signup-form">
            <div class="name-reg input">
                <label for="name-reg">Full name:</label>
                <input type="text" name="name-reg" id="name-reg" placeholder="Full name" required>
            </div>
            <div class="SDT-reg input">
                <label for="SDT-reg">SDT:</label>
                <input type="text" name="SDT-reg" id="SDT-reg" placeholder="Phone number" required>
            </div>
            <div class="email-reg input">
                <label for="email-reg">Email:</label>
                <input type="text" name="email-reg" id="email-reg" placeholder="Email address" required>
            </div>
            <div class="userName-reg input">
                <label for="username-reg">Username:</label>
                <input type="text" name="username-reg" id="username-reg" placeholder="Account" required>
            </div>
            <div class="password-reg input">
                <label for="password-reg">Password:</label>
                <input type="password" name="password-reg" id="password-reg" placeholder="Password" required>
            </div>
            <div class="password-reg-conf input">
                <label for="password-reg-conf">Confirm Password:</label>
                <input type="password" name="password-reg-conf" id="password-reg-conf" placeholder="Confirm Password" required>
            </div>
            <div class="signup-btn input">
                <p><?= @$noti ?></p>
                <input type="submit" value="Signup" name="Signup">
            </div>
        </form>
        <div class="relative">
            <p>Or signup with</p>
            <div class="opt-grp">
                <i class="fa fa-google" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
        </div>


    </div>
</div>