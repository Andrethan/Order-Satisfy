<?php
require "libs/rb-mysql.php"
::setup( 'mysql:host=localhost;dbname=order/satisfy',
        'root', '' ); //for both mysql or mariaDB
        
        try{
            $db = new PDO('mysql:host=HOSTNAME;dbname=DB_NAME','USERNAME','PASSWORD');
        } catch(PDOException $e){
            echo $e->getmessage();
        }
?>