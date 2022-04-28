<?php
/* Попытка подключения к серверу MySQL. Предполагая, что вы используете MySQL
 сервер с настройкой по умолчанию (пользователь root без пароля) */
$link = mysqli_connect("localhost", "root", "", "order-satisfy", "3307");
 
// Проверьте подключение
if($link === false){
    die("ERROR: Нет подключения. " . mysqli_connect_error());
}
 
//  экранирует специальные символы в строке
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$city = mysqli_real_escape_string($link, $_REQUEST['gorod']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$time = mysqli_real_escape_string($link, $_REQUEST['time']);
// Попытка выполнения запроса вставки
$sql = "INSERT INTO persons (first_name, last_name, email, city, deadline, time) VALUES ('$first_name', '$last_name', '$email', '$city', '$date', '$time')";
if(mysqli_query($link, $sql)){
    echo "Записи успешно добавлены.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}
 
// Закрыть соединение
mysqli_close($link);
?>