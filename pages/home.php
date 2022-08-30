<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Home</title>
</head>

<?php
  include "../config/connection.php";
  session_start();

  $user = $_SESSION["user_id"];
  $sql = "SELECT * FROM info WHERE user_id=$user"; // for info
  $sql2 = "SELECT * FROM user WHERE id=$user"; // for admin

  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);

  $row = mysqli_fetch_array($result2);
?>

<body>
    <div class="table-wrapper">
        <h2>User <span class="title2"><?php echo $row['username']; ?></span></h2>
        <p class="emaildesign"><?php echo $row['email']; ?></p>
        <br>
        <br>
        <div>
        <a href="add.php?user=<?php echo $user; ?>" class="button">Add Data</a>
        &nbsp;
        <a href="../" class="button2">Logout</a>
        </div>
        <br>
        <br>
    <table>
  <tr>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Address</th>
    <th class="align-center">Delete</th>
  </tr>
  <?php 
     if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
  ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td class="align-center">
            <a  class="btn btn-del" href="delete.php?user_data=<?php echo $row['id'];?>">Delete</a>
        </td>
      </tr>
  <?php
      }
    } else {
      echo "<p class='nodata'>No data found !</p>";
    }

    mysqli_close($conn);
  ?>
</table>
</div>
<?php include "../pages/header.php"; ?>
</body>
</html>