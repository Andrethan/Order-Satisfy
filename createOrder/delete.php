<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../login.php");
    exit;
}

if(isset($_GET['id']) && !empty($_GET['id']) ){
    require_once "../config.php";

    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "DELETE FROM `goods` WHERE id=" . $id;

    if(mysqli_query($link, $query)){
        header("Location: tovar.php");
    } else{
        die("Error. Not deleted");
    }
}
?>