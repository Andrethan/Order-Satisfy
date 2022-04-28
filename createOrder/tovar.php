<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../login.php");
    exit;
}

	require_once "../config.php";

    
    $lol = "Ждет выполнения";
    $category = mysqli_real_escape_string($link, $_REQUEST['category']);
    $subcategory = mysqli_real_escape_string($link, $_REQUEST['subcategory']);
    $nazva = mysqli_real_escape_string($link, $_REQUEST['nazva']);
    $desc = mysqli_real_escape_string($link, $_REQUEST['desc']);
    $city = mysqli_real_escape_string($link, $_REQUEST['city']);
    $district = mysqli_real_escape_string($link, $_REQUEST['district']);
    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
    $deadline = mysqli_real_escape_string($link, $_REQUEST['deadline']);
    $timedeadline = mysqli_real_escape_string($link, $_REQUEST['time']);
    $grn = mysqli_real_escape_string($link, $_REQUEST['grn']);
    $status = mysqli_real_escape_string($link, $lol);

    // Попытка выполнения запроса вставки
    $sql = "INSERT INTO goods (category, subcategory, nazva, description, gorod, district, address, deadline, timedeadline, time, budget, status) VALUES ('$category', '$subcategory', '$nazva', '$desc', '$city', '$district', '$address', '$deadline', '$timedeadline', NOW(), '$grn', '$status')";
    if(mysqli_query($link, $sql)){
        echo "<script>alert('Ваши данные успешно добавлены');</script>";
    }
    else{
        echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
        echo "<script>alert('Ваши данные не добавлены" . mysqli_error($link) . "');</script>";
        }
?>
<html>
    <head>
    <link href="assets/css/spisokTovarov.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        $nameUser = $_SESSION['name'];
        /*if(isset($_GET['del'])){
            $id = $_GET['del'];
            
            $del = mysqli_query($link, "DELETE FROM `goods` WHERE id=$id");
        #echo $del;
        }

        $result = mysqli_query($link, "SELECT * FROM `users`");

        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);*/
            
            ?>
                <br>
                <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
                <div class="container">
                    <div class="row">
                        <!-- Main content -->
                        <div class="col-lg-9 mb-3">
                        <div class="row text-left mb-5">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                            <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50" style="width: 100%;">
                            <select class="form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50" data-toggle="select" tabindex="-98">
                                <option> Categories </option>
                                <option> Learn </option>
                                <option> Share </option>
                                <option> Build </option>
                            </select>
                            </div>
                            </div>
                            <div class="col-lg-6 text-lg-right">
                            <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50" style="width: 100%;">
                                <select class="form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50" data-toggle="select" tabindex="-98">
                                    <option> Filter by </option>
                                    <option> Votes </option>
                                    <option> Replys </option>
                                    <option> Views </option>
                                </select>
                            </div>
                            </div>
                        </div>
  
                        <!--End of post 1 -->
                        
                        <?php $products = mysqli_query($link, "SELECT * FROM `goods`"); ?>
                        <?php if($products) : ?>
                            <?php while($resp = mysqli_fetch_assoc($products) ): ?>
                        <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                            <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-sm-0">
                                <h5>
                                <a href="#" class="text-primary"><?php echo $resp['nazva']; ?></a>
                                </h5>
                                <p class="text-sm"><span class="op-6"><?php echo $resp['description'];?></p>
                                <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Темы заказов для обсуждения</a> <!--<a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a>--> 
                                    <?php echo $resp['budget'].' грн.'; ?> &nbsp;&nbsp;&nbsp;&nbsp; 
                                    <?php if(isset($_SESSION['loggedin']) ) : ?>
                                    <a href="delete.php?id=<?php echo $resp['id'] ?>">Delete</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        

                                <div class="col-md-4 op-7">
                                    <div class="row text-center op-7">
                                        <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm"><?php echo htmlspecialchars($nameUser)?></span> </div>
                                        <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">Reply's</span> </div>
                                        <?php if(isset($_SESSION['loggedin']) ) : ?>
                                            <div class="col px-0"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm"><a href="edit.php?id=<?php echo $resp['id'] ?>">Edit</a></span> </div>
                                        <?php endif; ?>    
                                    </div>
                                </div>
                            </div>
                            </div>
                        <hr style="color:red">
                        <!-- /End of post 1 -->
                        <?php endwhile; ?>      
                        <?php endif; ?>
                        </div>

                        <!-- Sidebar content -->
                        <!--<div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                        <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div><div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;"><div class="sticky-inner">
                            <a class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold" href="#">Ask Question</a>
                            <div class="bg-white mb-3">
                            <h4 class="px-3 py-4 op-5 m-0">
                                Active Topics
                            </h4>
                            <hr class="m-0">
                            <div class="pos-relative px-3 py-3">
                                <h6 class="text-primary text-sm">
                                <a href="#" class="text-primary">Why Bootstrap 4 is so awesome? </a>
                                </h6>
                                <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">39 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                            </div>
                            <hr class="m-0">
                            <div class="pos-relative px-3 py-3">
                                <h6 class="text-primary text-sm">
                                <a href="#" class="text-primary">Custom shortcut or command to launch command in terminal? </a>
                                </h6>
                                <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">58 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                            </div>
                            <hr class="m-0">
                            <div class="pos-relative px-3 py-3">
                                <h6 class="text-primary text-sm">
                                <a href="#" class="text-primary">HELP! My Windows XP machine is down </a>
                                </h6>
                                <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">48 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                            </div>
                            <hr class="m-0">
                            <div class="pos-relative px-3 py-3">
                                <h6 class="text-primary text-sm">
                                <a href="#" class="text-primary">HELP! My Windows XP machine is down </a>
                                </h6>
                                <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">38 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                            </div>
                            <hr class="m-0">
                            </div>
                            <div class="bg-white text-sm">
                            <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                Stats
                            </h4>
                            <hr class="my-0">
                            <div class="row text-center d-flex flex-row op-7 mx-0">
                                <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" href="#">58</a> Topics </div>
                                <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold" href="#">1.856</a> Posts </div>
                            </div>
                            <div class="row d-flex flex-row op-7">
                                <div class="col-sm-6 flex-ew text-center py-3 border-right mx-0"> <a class="d-block lead font-weight-bold" href="#">300</a> Members </div>
                                <div class="col-sm-6 flex-ew text-center py-3 mx-0"> <a class="d-block lead font-weight-bold" href="#">DanielD</a> Newest Member </div>
                            </div>
                            </div>
                        </div></div>
                        </div>-->
                    </div>
                    </div>

                <!--<tr>
                <th colspan="2">Модель</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итого</th>
                </tr>
                <tr>
                <td><img src="https://html5book.ru/wp-content/uploads/2015/04/dress-2.png"></td>
                <td>Платье с цветочным принтом</td>
                <td>3</td>
                <td>1</td>
                <td>2500</td>
                </tr>
                <tr>
                <td><img src="https://html5book.ru/wp-content/uploads/2015/04/dress-3.png"></td>
                <td>Платье с боковыми вставками</td>
                <td>3</td>
                <td>1</td>
                <td>3000</td>
                </tr>-->

            <?php

        mysqli_close($link);
        ?>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>