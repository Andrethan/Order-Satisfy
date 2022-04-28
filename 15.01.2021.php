<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>ib </title>
</head>
<body>
<h2>Форма обратной связи</h2>
	<form action="15.01.2021.php" method="post" target="_blank" name="f1">
	  <input  type="text" placeholder="Ваше имя" name="name1" required>
	  <br>
	  <br>
	  <input  type="email" placeholder="Ваш email" name="email1" required="required">
	  <br>
	  <br>
	  
	  <br>
	  <br>
	  
	  Частное лицо <input type="radio" name="a1" value="Частное лицо">&nbsp;&nbsp;&nbsp;
	  Юридическое <input type="radio" name="a1" value="Юридическое">
	  
	  <br>
	  <br>
	  
	  <textarea   placeholder="Ваш текст" name="text" required="required"></textarea>
	  <br>
	  <br>
	  <input  type="submit" value="Отправить" name="sab">
	</form>
	
	<?php
$urok="Форма обратной связи";
error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name1']))			{$name1			= $_POST['name1'];		if ($name1 == '')	{unset($name1);}}
if (isset($_POST['email1']))		{$email1		= $_POST['email1'];		if ($email1 == '')	{unset($email1);}}

if (isset($_POST['calor1']))		{$calor1		= $_POST['calor1'];		if ($calor1 == '')	{unset($calor1);}}
if (isset($_POST['a1']))			{$a1			= $_POST['a1'];			if ($a1 == '')		{unset($a1);}}

if (isset($_POST['text']))			{$text			= $_POST['text'];		if ($text == '')	{unset($text);}}
if (isset($_POST['sab']))			{$sab			= $_POST['sab'];		if ($sab == '')		{unset($sab);}}
//стирание треугольных скобок из полей формы
/* комментарий */
if (isset($name1) ) {
$name1=stripslashes($name1);
$name1=htmlspecialchars($name1);
}
if (isset($email1) ) {
$email1=stripslashes($email1);
$email1=htmlspecialchars($email1);
}
if (isset($text) ) {
$text=stripslashes($text);
$text=htmlspecialchars($text);
}
/*
if (isset($calor1) ) {
$text=stripslashes($calor1);
$text=htmlspecialchars($calor1);
}*/
// адрес почты куда придет письмо
$address="areyousureaboutit@gmail.com";
// текст письма 
$note_text="
Тема : $urok \r\n
Имя : $name1 \r\n 
Email : $email1 \r\n 

Какое лицо : $a1 \r\n

Дополнительная информация : $text";

if (isset($name1)  &&  isset ($sab) ) {
mail($address,$urok,$note_text,"Content-type:text/plain; windows-1251"); 
// сообщение после отправки формы
    
echo "<p style='color:green;'>Уважаемый(ая) <b style='color:red;'>$name1</b> Ваше письмо отправленно успешно. <br> Спасибо. <br>Вам скоро ответят на почту <b style='color:red;'> $email1</b>.</p>";
}

?>
	

</body>
</html>