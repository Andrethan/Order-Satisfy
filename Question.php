<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Order/Satisfy.ua</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="mainCustomer.php">Order/Satisfy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            <form name="f1" method="post" action="search.php" class="vstroky">
            <li><input class="form-control redborder" type="search" name="search_q" placeholder="Кого нужно найти?" aria-label="Search" autocomplete="off">
              <!--<ul>
                <li>Ann</li>
                <li>Boris</li>
                <li>Chris</li>
              </ul>
              </li>-->
              <li><input class="btn btn-outline mr-sm-2 my-2 my-sm-0" style="border-color: red; border-width: 2px; margin-right: 20px;" type="submit" value="Искать"></li>
            </form>
          <li><a href="main.php" class="active">Главная</a></li>
          <li class="dropdown droping"><a><span>Создание заказа</span> <i class="bi bi-chevron-down"></i></a>
              <ul class="list-group">
                <li class="dropdown"><a>Бытовые услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Сад и огород</a></li>
                    <li><a href="#">Няни</a></li>
                    <li><a href="#">Услуги сиделки</a></li>
                    <li><a href="#">Услуги домработницы</a></li>
                    <li><a href="#">Услуги швеи</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Бюро переводов<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Письменные переводы</a></li>
                    <li><a href="#">Редактура перевода</a></li>
                    <li><a href="#">Перевод документов</a></li>
                    <li><a href="#">Устные переводы</a></li>
                    <li><a href="#">Технический перевод</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Деловые услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Бухгалтерские услуги</a></li>
                    <li><a href="#">Юридические услуги</a></li>
                    <li><a href="#">Риэлтор</a></li>
                    <li><a href="#">Услуги колл-центра</a></li>
                    <li><a href="#">Финансовые услуги</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Дизайн<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Разработка логотипов</a></li>
                    <li><a href="#">Дизайн интерьера</a></li>
                    <li><a href="#">Дизайн сайта</a></li>
                    <li><a href="#">Дизайн полиграфии</a></li>
                    <li><a href="#">Услуги печати</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Домашний мастер<i class="bi bi-chevron-right"></i></a>       
                  <ul>
                    <li><a href="#">Сантехник</a></li>
                    <li><a href="#">Электрик</a></li>
                    <li><a href="#">Муж на час</a></li>
                    <li><a href="#">Столяр</a></li>
                    <li><a href="#">Слесарь</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Клининговые услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Уборка квартир</a></li>
                    <li><a href="#">Генеральная уборка</a></li>
                    <li><a href="#">Уборка после ремонта</a></li>
                    <li><a href="#">Химчистка</a></li>
                    <li><a href="#">Уборка коттеджей и домов</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Курьерские услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Курьерская доставка</a></li>
                    <li><a href="#">Доставка продуктов</a></li>
                    <li><a href="#">Доставка готовой еды</a></li>
                    <li><a href="#">Доставка лекарств</a></li>
                    <li><a href="#">Курьер на авто</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Логистические и складские услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Грузоперевозки</a></li>
                    <li><a href="#">Услуги грузчиков</a></li>
                    <li><a href="#">Вывоз строительного мусора</a></li>
                    <li><a href="#">Перевозка мебели и техники</a></li>
                    <li><a href="#">Переезд квартиры или офиса</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Мебельные работы<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Изготовление мебели</a></li>
                    <li><a href="#">Ремонт мебели</a></li>
                    <li><a href="#">Сборка мебели</a></li>
                    <li><a href="#">Реставрация мебели</a></li>
                    <li><a href="#">Перетяжка мебели</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a>Организация праздников<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Услуги ведущего</a></li>
                    <li><a href="#">Музыкальное сопровождение</a></li>
                    <li><a href="#">Услуги аниматоров</a></li>
                    <li><a href="#">Организация питания</a></li>
                    <li><a href="#">Выпечка и десерты</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Отделочные работы<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Ремонт квартир</a></li>
                    <li><a href="#">Укладка плитки</a></li>
                    <li><a href="#">Штукатурные работы</a></li>
                    <li><a href="#">Утепление помещений</a></li>
                    <li><a href="#">Монтаж отопления</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Работа в Интернете<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Копирайтинг</a></li>
                    <li><a href="#">Сбор, поиск информации</a></li>
                    <li><a href="#">Наполнение сайтов</a></li>
                    <li><a href="#">Набор текста</a></li>
                    <li><a href="#">Рерайтинг</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Разработка сайтов<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Создание сайтов</a></li>
                    <li><a href="#">Доработка сайта</a></li>
                    <li><a href="#">Создание целевой страницы</a></li>
                    <li><a href="#">Продвижение сайтов</a></li>
                    <li><a href="#">Верстка сайта</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Реклама и маркетинг<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Реклама в социальных сетях</a></li>
                    <li><a href="#">Размещение объявлений</a></li>
                    <li><a href="#">Настройка контекстной рекламы</a></li>
                    <li><a href="#">SEO оптимизация сайта</a></li>
                    <li><a href="#">Размещение постов на форумах</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Ремонт авто<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Помощь в дороге</a></li>
                    <li><a href="#">Техническое обслуживание</a></li>
                    <li><a href="#">Автоэлектрика</a></li>
                    <li><a href="#">Кузовные работы</a></li>
                    <li><a href="#">Двигатель</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Ремонт техники<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Ремонт крупной бытовой техники</a></li>
                    <li><a href="#">Ремонт мелкой бытовой техники</a></li>
                    <li><a href="#">Компьютерная помощь</a></li>
                    <li><a href="#">Ремонт цифровой техники</a></li>
                    <li><a href="#">Ремонт мобильных телефонов</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Строительные работы<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Разнорабочие</a></li>
                    <li><a href="#">Сварочные работы</a></li>
                    <li><a href="#">Токарные работы</a></li>
                    <li><a href="#">Плотник</a></li>
                    <li><a href="#">Кладка кирпича</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Услуги для животных<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Уход за котами</a></li>
                    <li><a href="#">Уход за собаками</a></li>
                    <li><a href="#">Гостиница для животных</a></li>
                    <li><a href="#">Перевозка животных</a></li>
                    <li><a href="#">Уход за рыбками</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Услуги красоты и здоровья<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Массаж</a></li>
                    <li><a href="#">Уход за ногтями</a></li>
                    <li><a href="#">Косметология</a></li>
                    <li><a href="#">Уход за ресницами</a></li>
                    <li><a href="#">Уход за бровями</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Услуги репетиторов<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Преподаватели по предметам</a></li>
                    <li><a href="#">Репетиторы иностранных языков</a></li>
                    <li><a href="#">Написание работ</a></li>
                    <li><a href="#">Преподаватели музыки</a></li>
                    <li><a href="#">Автоинструкторы</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Услуги тренеров<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Йога и фитнес</a></li>
                    <li><a href="#">Игровые виды спорта</a></li>
                    <li><a href="#">Водные виды спорта</a></li>
                    <li><a href="#">Силовые виды спорта</a></li>
                    <li><a href="#">Боевые искусства</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a >Фото- и видео- услуги<i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Фотограф</a></li>
                    <li><a href="#">Видеооператор</a></li>
                    <li><a href="#">Обработка фотографий</a></li>
                    <li><a href="#">Монтаж видео</a></li>
                    <li><a href="#">Оцифровка видеокассет</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            
          <li><a href="notice.php">Уведомления</a></li>
          <li><a href="https://24navo.com/3/aleksei/15.01.2021.php">Связаться с нами</a></li>

          <li class="dropdown"><span class="getstarted">Профиль</span>
            <ul class="list-group2">
              <!--<li>
                <div class="b-tabs">
                  <input type="radio"  data-value="payment" name="t" id="tab-1" checked />
                  <label for="tab-1"><span>Доставка</span></label>

                  <input type="radio" data-value="delivery" name="t" id="tab-2" />
                  <label for="tab-2"><span>Оплата</span></label>

                  <div id="tab-content-1">

                    b-tab-content 1
                  </div>
                  <div id="tab-content-2">
                    b-tab-content 2
                  </div>
                </div>
              </li>-->
              <li>
                <div class="field">
                &nbsp;&nbsp; <button name="write" class="j-submit-report ChooseRole" onclick="window.location.href='mainCustomer.php'">Заказчик</button>
                <button name="write" class="j-submit-report ChooseRole" onclick="window.location.href='mainSpecialist.php'">Специалист</button>
                </div>
              </li>
              <li><a href="about.html">Мои заказы</a></li>
              <li><a href="testimonials.html">Личные сообщения</a></li>
              <li><a href="testwelcome.php">Настройки профиля</a></li>
              <li><a href="Question.php">Вопросы и ответы</a></li>
              <li><a href="testimonials.html">Баланс</a></li>
              <li><a href="logout.php">Выход</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <br><br>
  
<div class="container">
	  <div class="py-4 text-center">
        <img class="d-block mx-auto mb-4" src="svgs/icons8-вопросительный-знак-96.png" alt="" width="100" height="100">
        <h2>FAQ: часто задаваемые вопросы</h2>
      </div>
	<h3><small>&nbsp;&nbsp;&nbsp;&nbsp;Для заказчиков</small></h3>

	<div id="accordion">
	  <div class="card">
		<div class="card-header" id="headingOne">
		  <h5 class="mb-0">
			<button class="btn btn-danger" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			  Как зарегистрироваться заказчику?
			</button>
		  </h5>
		</div>
 
		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
		  <div class="card-body">
			Регистрация заказчиков осуществляется при нажатии на кнопку создания заказа на первой странице сайта. Для не авторизованных пользователей (при использовании сайта впервые) нужно будет зарегистрироваться на сайте путем заполнения блока контактных данных:<br><br>
			<p style="text-align: center;"><img src="svgs/Screenshot_2.png" align="center" width="1200" height="501" border="3px solid red"></p>
			В этом блоке необходимо указать ваше имя, адрес электронной почты, номер телефона. После выполнения этих действий ваш заказ будет опубликовано, а вы - зарегистрируетесь на сайте в качестве заказчика. 
			Для регистрации на сайте и публикации заказа необходимо заполнить все поля. Указание номера телефона и электронной почты - обязательное условие.
		  </div>
		</div>
	  </div>
	  <div class="card">
		<div class="card-header" id="headingTwo">
		  <h5 class="mb-0">
			<button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			  Какие заказы нельзя размещать на сайте?
			</button>
		  </h5>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
		  <div class="card-body">
			На Order/Satisfy.ua запрещено размещать задания такого плана:<br>
			&mdash; <b>Нарушающие законодательство.</b>
			Сервис выступает за соблюдение законодательства и ждем того же от наших заказчиков и исполнителей.<br>
			&mdash; <b>Содержат услуги интимного характера.</b>
			На этот сервисе много разнообразных категорий, но в них не представлены подобные услуги. Для них существуют другие ресурсы.<br>
			&mdash; <b>Содержат в себе финансовые пирамиды и схемы.</b>
			Нельзя создавать задания, которые требуют от исполнителя вложений и являются частью мошеннических схем.<br>
			&mdash; <b>Направлены на покупку баз пользователей или рассылку информации по чужим базам.</b>
			Данные пользователей — конфиденциальная информация, поэтому такие действия являются неправомерными.<br>
			&mdash; <b>Рекламируют и продвигают товары.</b>
			Order/Satisfy.ua не является доской объявлений, поэтому такие задания запрещены и будут удаляться. Если вы исполнитель на нашем сервисе — вы можете рекламировать свои услуги, благодаря объявлениям. Узнать о них детальнее, вы можете тут.
		  </div>
		</div>
	  </div>
	  <div class="card">
		<div class="card-header" id="headingThree">
		  <h5 class="mb-0">
			<button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			  Как выбрать категорию услуг для заказа?
			</button>
		  </h5>
		</div>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
		  <div class="card-body">
			Чтобы подобрать наиболее подходящую категорию для вашего заказа, вы можете предварительно ознакомиться с доступными на сервисе категориями услуг, использовав кнопку перехода на нужную часть сайта.
			<p style="text-align: center;"><img src="svgs/Screenshot_1.png" align="center" width="1200" height="501" border="3px solid red"></p>
		  </div>
		</div>
	  </div>
	  <div class="card">
		<div class="card-header" id="headingFour">
		  <h5 class="mb-0">
			<button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			  Как заказать услугу?
			</button>
		  </h5>
		</div>
		<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
		  <div class="card-body">
			На Order/Satisfy.ua найдутся мастера для любого вида работы. Для заказа услуги и получения контактов специалистов необходимо создать заказ на сайте. Наши специалисты подпишутся на заявку и предложат свои услуги по почте.
		  </div>
		</div>
	  </div>
	  <div class="card">
		<div class="card-header" id="headingFive">
		  <h5 class="mb-0">
			<button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
			  Что означают статусы заказов?
			</button>
		  </h5>
		</div>
		<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
		  <div class="card-body">
			Текущий статус отображается слева от создателя заказа:
			<p style="text-align: center;"><img src="svgs/Screenshot_3.png" align="center" width="855" height="182" border="3px solid red"></p>
			<p><ins>Всего на сервисе есть 9 статусов:</ins></p><br>
			<b>Ожидает специалиста.</b> К заказу можно добавлять предложения, специалист еще не выбран.<br>
			<b>В процессе.</b> Заказ уже выполняется специалистом.<br>
			<b>Выполнено.</b> Специалист отметил, что выполнил заказ, но заказчик это ещё не подтвердил.<br>
			<b>Просрочено.</b> В этот статус переходят задания, которые в течение суток после наступления конечной даты выполнения находились в статусе "Ожидает специалиста".
		  </div>
		</div>
	  </div>
	</div>
</div>

<br><br><br><br>

<div class="container">
	<h3><small>&nbsp;&nbsp;&nbsp;&nbsp;Для специалистов</small></h3>
	
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingSix">
      <h5 class="mb-0">
        <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          Как зарегистрироваться специалисту?
        </button>
      </h5>
    </div>
    <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordion">
      <div class="card-body">
		Для регистрации на сервисе в качестве специалиста, необходимо нажать кнопку "Стать специалистом" и перейти на страницу регистрации.
        <p style="text-align: center;"><img src="svgs/Screenshot_4.png" align="center" width="370" height="601" border="3px solid red"></p>
		После успешного ввода, вы будете зарегистрированы на сервисе в качестве специалиста, но для выполнения заказов потребуется пройти ещё 2 этапа регистрации:<br>
		&mdash; выбор категорий работ;<br>
		&mdash; заполнение анкеты с личными данными.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSeven">
      <h5 class="mb-0">
        <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Какие заказы не стоит брать?
        </button>
      </h5>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
      <div class="card-body">
        Подобран список наиболее частых мошеннических схем. Если вы столкнулись с подобными заданиями, не берите их в работу, а жалуйтесь модераторам с помощью кнопки “Пожаловаться на задание”.<br>
		&mdash; <b>За свои деньги специалисту надо наперед что-то купить или пополнить счет.</b><br>
		&mdash; <b>Регистрация карты в банке.</b> Когда в заказе вас просят пойти в банк, оформить кредитную карту и передать ее заказчику.<br>
		&mdash; <b>Заказы со страховой суммой.</b>  Ситуация, в которой заказчик просит у вас страховую сумму и объясняет тем, что ему нужны гарантии и вы не пропадете.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingEight">
      <h5 class="mb-0">
        <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Как добавить к профилю портфолио и управлять им?
        </button>
      </h5>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
      <div class="card-body">
        У специалиста есть возможность добавить портфолио к своему профилю, чтобы показывать свои работы заказчикам. Это могут быть фотографии или видео. Загрузить и управлять фото и видео можно во вкладке Портфолио.<br>
		<p style="text-align: center;"><img src="svgs/" align="center" width="100" height="100" border="3px solid red"></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingNine">
      <h5 class="mb-0">
        <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
          Как добавить объявление о своих услугах в профиле?
        </button>
      </h5>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
      <div class="card-body">
        Цель объявлений - дополнительный бесплатный способ рекламы своих услуг, с помощью которого заказчики на страницах категорий могут предложить вам задание. Также это удобный способ знакомить заказчиков с прайсом своих услуг. Объявление является мощным инструментом рекламы при качественно описанных услугах в описании.<br>
		Для управления объявлениями о своих услугах необходимо навестись на кнопку профиля и нажать на блок "Мои объявления":<br><br>
		<p style="text-align: center;"><img src="svgs/Screenshot_5.png" align="center" width="1229" height="513" border="3px solid red"></p><br>
		После этого вы попадете на страницу ваших объявлений (если их еще нет - на страницу добавления нового).<br>
		&mdash; Вверху страницы - кнопка "Добавить объявление".<br>
		&mdash; Ниже список объявлений, который можно отсортировать по категориям.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTen">
      <h5 class="mb-0">
        <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
          Почему мое объявление не может пройти модерацию?
        </button>
      </h5>
    </div>
    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
      <div class="card-body">
        Ваше объявление является дополнительным способом рекламы профильных услуг специалиста, поэтому должно содержать полезную, привлекательную и понятную информацию для заказчика. Если ваше объявление отправлено на доработку модератором, оно не достаточно эффективно. Обратите внимание на рекомендации к нему и сможете отправить объявление повторно исправленным.<br><br>
		<i>Удаление объявления</i> может произойти по нескольким причинам:<br>
		&mdash; не является рекламой своих услуг, а заказом для других специалистов;<br>
		&mdash; содержит запрещенную (незаконную) информацию или не нормативную лексику.
      </div>
    </div>
  </div>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>

<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Order/Satisfy</h3>
              <p>
                ул. Барицкого, 12Б <br>
                Одесса 65005, Украина<br><br>
                <strong>Телефон:</strong>+380 99 696 69 69<br>
                <strong>Почта:</strong> OrderSatisfy@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Полезные ссылки</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="main.php">Главная</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about-us.php">О нас</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Популярные вопросы</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Новостная лента</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Связаться с нами</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Как всё работает</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Some page</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Some page</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Some page</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Some page</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Some page</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Наша новостная лента</h4>
            <p>Подпишитесь на рассылку новых уведомлений нашего сервиса</p>
            <form action="" method="post">
              <input type="email" name="email" class="rasilka" autocomplete="off"><input type="submit" value="Подписаться">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Order/Satisfy</span></strong>. Все права защищены.
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
	
  <!-- Special profile tabs -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/ChooseRole.js"></script>
  <script src="js/ЗависимыеСписки.js"></script>
  <script src="js/ЗависимыеСписки2.js"></script>
  <script src="js/TimeMask.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  <script src="js/datetimepicker-master/jquery.js"></script>
  <script src="js/datetimepicker-master/jquery.datetimepicker.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>