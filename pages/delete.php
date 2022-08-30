<?php
include "../config/connection.php";

if(isset($_GET['user_data'])){
    $ID = $_GET['user_data'];
    echo $ID;
    $query = "DELETE FROM info WHERE id=$ID";
    mysqli_query($conn, $query);
    header("Location: home.php");
}
?>