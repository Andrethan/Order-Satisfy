<?php
    $login = filter_var(trim($_POST['login']));
    $name = filter_var(trim($_POST['name']));
    $pass = filter_var(trim($_POST['pass']));

    if(mb_strlen($login) < 5 || mb_strlen($login) > 50){
        echo "Недопустимая длина логина";
        exit();
    } else if(mb_strlen($name)<3 || mb_strlen($name)>90){
        echo "Недопустимая длина имени";
        exit();
    } /*else if (preg_match('/[^(\w)|(\@)|(\.)|(\-)]/', $email)){
        echo "Недопустимая электронная почта";
        exit();
    }*/ else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 8){
        echo "Недопустимая длина пароля (от 3 до 8 символов)";
        exit();
    } /*else if(mb_strlen($city)<1 || mb_strlen($city) > 4){
        echo "Недопустимая длина города";
    }*/

//$pass = md5($pass."kis2l3;fse?e43");

$mysql = new mysqli('localhost', 'root', '', 'register-bd', "3307");
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");

$mysql->close();

?>