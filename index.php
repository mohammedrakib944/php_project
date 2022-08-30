<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Login</title>
</head>

<?php

include "config/connection.php";
include "pages/header.php";
session_start();
$err = 0;
if(isset($_GET["err"])){
    $err = $_GET["err"];
}

if(isset($_GET['login']))
{
$username = $_GET['username'];
$password = $_GET['password'];

$res = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
if($result=mysqli_fetch_array($res))
{
    $_SESSION["user_id"] = $result['id'];
	header("location: pages/home.php?user=$result[id]");
}
else
{
	header("location: index.php?err=1");
}
}
?>

<body>
    <div class="wrapper">
        <?php 
            echo  $err == 1 ? '<div class="alert red">
                Invalid username or password!
            </div>' : "";
        ?>
        <div class="login">
            <h2 class="title">Login</h2>
        <form  action="" method="GET">
        <div class="inputs">
            <p class="label">Username</p>
            <input type="text" name="username">
        </div>
        <div class="inputs">
            <p  class="label">Password</p>
            <input type="password" name="password">
        </div>
        <br>
        <button class="button" name="login" type="submit">Login</button>
    </form>
    <br>
    <p>Don't have account? <a href="pages/signup.php">Sign Up</a></p>
    </div>
    </div>
</body>
</html>