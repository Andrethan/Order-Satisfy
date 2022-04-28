<?php

$connect = mysqli_connect('localhost:3307', 'root', '', 'order/satisfy');

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>