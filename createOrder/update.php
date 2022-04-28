<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: login.php");
    exit;
}

require_once "../config.php";

$product_id = $_GET['id'];
$product_id = mysqli_query($link, "SELECT * FROM `goods`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update product</title>
</head>
<body>
    <h3>Update product</h3>
    <form action="" method="POST">
        <p>Title</p>
        <input type="text" name="title">
        <p>Description</p>
        <textarea name="description"></textarea>
        <p>Price</p>
        <input type="number" name="price"><br><br>
        <button type="submit">Update product</button>
    </form>
</body>
</html>