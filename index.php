<?php
require_once('recaptchalib.php');
session_start();
$error='';

//captcha and submit form
if (isset($_POST['submit'])) {
    $privatekey = "6Ledrw0UAAAAAAlaqt8J8I2hzx-yFuk4sreMI6KG";
    $resp = recaptcha_check_answer($privatekey,
    $_SERVER["REMOTE_ADDR"],
    $_POST["recaptcha_challenge_field"],
    $_POST["recaptcha_response_field"]);

    if (empty($_POST['username']) || empty($_POST['password'] ) || !$resp->is_valid) {
        echo '<div class="alert alert-danger">' . $error = "Username, password or CAPTCHA are invalid" .'</div>';
    }else {
        $username = $_POST['username'];
        $password = $_POST['username'];
        $_SESSION['login_user'] = $username;

        header("Location:profile.php");
    }
}

?>
<html>
<head>

    <title>Login</title>
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="js/bootstrap/css/bootstrap.css">

    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>

</head>

<body>
<div id="content">
    <form  method="post" action="" >
        <div class="panel panel-primary" style='width: 660px; height:300px; margin-left: 350px; margin-top: 100px;'>
            <div class='panel-heading'>Lgin form<div style='float: left; margin-left: 50px ;'></div></div>

            <div class="form-group" style="margin-top: 50px; width: 300px;;margin-left: 10px; ">
                <input class="form-control" id="name" name="username" placeholder="username" type="text"/><br>
                <input class="form-control" id="password" name="password" placeholder="**********" type="password"/>
            </div>

            <div style="margin-left: 550px; margin-top: 50px;">
                <input  class="btn btn-primary" type="submit" id="submit_contact" name="submit" value="Login" />
            </div>

            <div style="margin-left:330px; margin-top: -200px;">
                <?php
                require_once('recaptchalib.php');
                $publickey = "6Ledrw0UAAAAADgy0j-0F-6el6xfICfTORlK41O_"; // you got this from the signup page
                echo recaptcha_get_html($publickey);
                ?>
            </div>
        </div>
    </form>
</div>
</body>
</html>

