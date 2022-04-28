<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../login.php");
    exit;
}
require_once "../config.php";

if(isset($_GET['id']) && !empty($_GET['id']) ){
    $current_tovar_id = mysqli_real_escape_string($link, $_GET['id']);
    
    $products = mysqli_query($link, "SELECT * FROM `goods` WHERE id=" . $current_tovar_id);
    $course_data = mysqli_fetch_assoc($products);

    if(empty($course_data)){
        header("Location: 404.php"); 
    }
}

if(isset($_POST['submit']) ){
    $id = mysqli_real_escape_string($link, $_GET['id']);

    $nazva = $_POST['nazva'];
    $desc = $_POST['description'];
    $grn = $_POST['budget'];

    $query = "UPDATE `goods` SET" . " ";
    $query .= "nazva = '{$nazva}', "; 
    $query .= "description = '{$desc}', ";
    $query .= "budget = {$grn}";
    $query .= " ". "WHERE id=" . $id;

    if (mysqli_query($link, $query)){
        header("Location: tovar.php");
    }else{
        die("Error.");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <a href="tovar.php">Вернуться назад</a>
        <h1>Edit order</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo isset($course_data) ? $course_data['id'] : ""; ?>" method="post">
            <input name="nazva" 
                   type="text" 
                   placeholder="Title" 
                   required
                   autocomplete="off"
                   value="<?php echo isset($course_data) ? $course_data['nazva'] : ""; ?>">

            <textarea name="description" placeholder="Description" required><?php echo isset($course_data) ? $course_data['description'] : ""; ?></textarea>

            <input 
                name="budget" 
                type="text" 
                placeholder="Price" 
                required 
                value="<?php echo isset($course_data) ? $course_data['budget'] : ""; ?>">

            <input name="submit" type="submit" value="Edit">
        </form>
    </body>
</html>