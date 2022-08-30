<?php 
    include "../config/connection.php";

    $msg = 0;
    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
    }

    if(isset($_POST["signup"])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if(mysqli_query($conn, $sql)){
            header("Location: signup.php?msg=1");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Sign-Up</title>
</head>
<body>
    <?php include "../pages/header.php"; ?>
    <div class="wrapper">
        <?php 
            echo  $msg == 1 ? '<div class="alert">
                User Created Successfully!
            </div>' : "";
        ?>
        <div class="login">
            <h2 class="title">Sign Up</h2>
        <form  action="" method="POST">
        <div class="inputs">
            <p class="label">Username</p>
            <input type="text" name="username">
        </div>
        <div class="inputs">
            <p class="label">Email</p>
            <input type="email" name="email">
        </div>
        <div class="inputs">
            <p  class="label">Password</p>
            <input type="password" name="password">
        </div>
        <button class="button" name="signup" type="submit">Create Account</button>
    </form>
    <br>
    <p>Already an account? <a href="../">login</a></p>
    </div>
    </div>
</body>
</html>