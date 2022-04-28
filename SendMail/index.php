<!DOCTYPE HTML>
<html>
<body>
<form action="index.php" method="post" name="f1" class="popup-price__form">
						<div class="popup-price__line">
							<input type="text" autocomplete="off" name="name" placeholder="Имя" class="input" required>
						</div>
							<input type="email" name="email" placeholder="Почта" required>
						<div class="popup-price__line">
							<input type="tel" autocomplete="off" name="number" data-value="+380(___) ___ __ __" class="input _phone _mask" inputmode="text" required>
						</div>
						<div class="popup-price__line">
							<label for="sel" class="popup-price__label">Виды Работ</label>
							<select id="sel" name="tipe" class="form">
								<option selected="selected">Герметизация вводов коммуникаций</option>
								<option option="">Лечение деформационных швов</option>
								<option option="">Лечение ПВХ мембран</option>
								<option option="">Лечение трещин бетона с устранением протечек</option>
								<option option="">Отсечная гидроизоляция кирпичной и бутовой кладки</option>
								<option option="">Остановка напорных течей и аварийных прорывов</option>
								<option option="">Стабилизация и укрепление грунта</option>
								<option option="">Усиление конструкций</option>
							</select>
						</div>
						<input type="submit" value="Отправить" name="sab" class="popup-price__btn">
					</form>
				</div>
			</section>
		</div>
	</div>
</div>
<?php
$urok="Ремгиком";
error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name']))			{$name			= $_POST['name'];		if ($name == '')	{unset($name);}}
if (isset($_POST['email']))			{$email 		=$_POST['email'];		if ($email == '')   {unset($email);}}
if (isset($_POST['number']))		{$number		= $_POST['number'];		if ($number == '')	{unset($number);}}

if (isset($_POST['tipe']))		{$tipe		= $_POST['tipe'];		if ($tipe == '')	{unset($tipe);}}

if (isset($_POST['sab']))			{$sab			= $_POST['sab'];		if ($sab == '')		{unset($sab);}}
//стирание треугольных скобок из полей формы
/* комментарий */
if (isset($name) ) {
$name=stripslashes($name);
$name=htmlspecialchars($name);
}
if (isset($email) ) {
$email=stripslashes($email);
$email=htmlspecialchars($email);
}
if (isset($number) ) {
$number=stripslashes($number);
$number=htmlspecialchars($number);
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
Почта : $email \r\n
Имя : $name \r\n
Номер : $number \r\n
Вид Работы : $tipe \r\n";

if (isset($name)  &&  isset ($sab) ) {
mail($address,$urok,$note_text,"Content-type:text/plain; windows-1251"); 
// сообщение после отправки формы
    
echo "<p style='color:green;'>Уважаемый(ая) <b style='color:red;'>$name</b> Ваше письмо отправленно успешно. <br> Спасибо. <br>Вам скоро ответят на почту <b style='color:red;'> $email</b>.</p>";
}

?>
		<!-- Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/vendors.min.js"></script>
<script src="js/app.min.js"></script>
	</body>
</html>