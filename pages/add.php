<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Sign-Up</title>
</head>
<?php 
    include "../config/connection.php";

    $user = $_GET['user'];

    $msg = 0;
    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
    }
    if(isset($_POST["insertdata"])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $sql = "INSERT INTO info (name, mobile, email, address, user_id) VALUES ('$name','$mobile', '$email', '$address', '$user')";
        
        if(mysqli_query($conn, $sql)){
            header("Location: add.php?user=$user&&msg=1");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>
<body>
<?php include "../pages/header.php"; ?>
    <div class="wrapper">
        <div class="login">
        <?php 
            echo  $msg == 1 ? '<div class="alert">
                Data Inserted!
            </div>' : "";
        ?>
            <h2 class="title">Add Data</h2>
            <form  action="" method="POST">
            <div class="inputs">
                <p class="label">Name</p>
                <input type="text" name="name">
            </div>
            <div class="inputs">
                <p class="label">Mobile</p>
                <input type="number" name="mobile">
            </div>
            <div class="inputs">
                <p class="label">email</p>
                <input type="email" name="email">
            </div>
            <div class="inputs">
                <p class="label">Address</p>
                <textarea class="textarea" name="address" id="" cols="30" rows="10"></textarea>
            </div>
            
            <button class="button" name="insertdata" type="submit">Add Info</button>
            </form>
            <br>
            <a href="/assignment/pages/home.php?user=<?php echo $user;?>">Home</a>
        </div>
    </div>
</body>
</html>