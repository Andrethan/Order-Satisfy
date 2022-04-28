<?php

$connect = mysqli_connect('localhost', 'root', '', 'order/satisfy');
	
    if (!$connect) {
        die('Error connect to DataBase');
    }