<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <div id="profile">
        <b id="welcome"><b>Welcome:</b> <i><?php echo isset($_SESSION['login_user'])?  $_SESSION['login_user']: ""; ?></i></b><br><br>
        <b id="logout"><a href="logout.php" name="login">Log Out</a></b>
    </div>
</body>
</html>
