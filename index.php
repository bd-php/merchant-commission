<?php
session_start();
include_once 'connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}

if (isset($_POST['btn-login'])) {

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "select * from mcommission where username='$username'";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetchObject();

    if ($row != null) {
        try {
            if ($row->password == md5($pass)) {
                $_SESSION['user'] = $row->username;
                header("Location: home.php");
            } else {
                ?>
                <script>alert('Incorrect Password');</script>
                <?php
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!");
        }
    } else {
        ?>
        <script>alert('Incorrect Username');</script>
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login & Registration System</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
<center>
    <div id="login-form">
        <form method="post">
            <table align="center" width="30%" border="0">
                <tr>
                    <td><input type="text" name="username" placeholder="User Name" required/></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="Your Password" required/></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="btn-login">Sign In</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</center>

</body>
</html>