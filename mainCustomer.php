<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: 404.php");
    exit;
}
require_once "config.php";
if($_SESSION['USER_LOGIN_IN'] != 1){
  $Row = mysqli_fetch_assoc(mysqli_query($link, "SELECT `id`, `name`, `surname` FROM `users`"));
  $_SESSION['USER_NAME'] = $Row['name'];
  $_SESSION['USER_ID'] = $Row['id'];
  $_SESSION['USER_LOGIN_IN'] = 1;
}
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="main.php">Order/Satisfy</a></h1>
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

  <?php
    /*function SendNotice($p1,$p2){
      global $link;
      $Row = mysqli_fetch_assoc(mysqli_query($link, "SELECT `id` FROM `users` WHERE `name` = '$p1'"));
      if(!$Row['id']) echo 'Error';
      mysqli_query($link, "INSERT INTO `notice` VALUES ('', $Row[id], 0, NOW(), '$p2')");
    }*/
  ?>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Онлайн-сервис заказа услуг в городе Одесса <span></span></h2>
              <p class="">Сервис поиска частных специалистов для решения любых задач.</p>
              <?php if (isset($_SESSION['loggedin'])) : ?>
              <a href="createOrders.php" class="btn-get-started scrollto">Создать заказ</a>
              <?php endif; ?>
              </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Категории работ</h2>
              <p class="">Проверенные специалисты для выполнения ваших бытовых или бизнес задач.</p>
              <a href="#clients" class="btn-get-started scrollto">Узнать больше</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Как работает Order/Satisfy</h2>
              <p class=""></p>
              <a href="#about" class="btn-get-started scrollto">Узнать больше</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

    <div class="row">

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/icons8-home-64.png" class="img-fluid" alt="">
        <br><span class="cntr">Дом</span>
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/png-transparent-black-box-truck-illustration-van-delivery-truck-car-logistics-delivery-angle-truck-logo-removebg-preview.png" class="img-fluid" alt="">
        <span class="cntr">Доставка</span>
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/icons8-mouse-64.png" class="img-fluid" alt="">
        <span class="cntr">Фриланс</span>
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/icons8-teaching-64.png" class="img-fluid" alt="">
        <span class="cntr">Преподавание</span>
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/icons8-business-64.png" class="img-fluid" alt="">
        <span class="cntr">Бизнес</span>
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/icons8-health-data-64.png" class="img-fluid" alt="">
        <span class="cntr">Все категории</span>
      </div>

    </div>

  </div>
</section><!-- End Clients Section -->

<!--<hr class="hr"/>-->
<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //SendNotice('qwerty', 'Hello');
    if($_SERVER['REQUEST_URI'] == '/'){
      $Page = 'mainCustomer';
      $Module = 'mainCustomer';
    } else {
      $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $URL_Parts = explode('/', trim($URL_Path, ' /'));
      $Page = array_shift($URL_Parts);
    }
    if(!empty($Module)){
      $Param = array();
      for($i = 0; $i < count($URL_Parts); $i++){
        $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
      }
    }

    function MessageSend($p1, $p2, $p3 = ' ', $p4 = 1){
      if($p1 == 1) $ps1='Error';
      else if ($p1 == 2)  $p1 = 'Подсказка';
      else if ($p1 == 3) $p1 = 'Information';
      $_SESSION['message']='<div class="MessageBlock"><b>'. $p2 . '</div>';
      if($p4){
      if($p3) $_SERVER['HTTP_REFERER']= $p3;
      exit(header('Location: '.$_SERVER['HTTP_REFERER']));
      }
    }

    if($_SESSION['USER_LOGIN_IN']){
      if($Page != 'mainCustomer'){
      $Num = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(`id`) FROM `notice` WHERE `status` = 0 AND `uid` = $_SESSION[USER_ID]"));
      if($Num[0]) MessageSend(2, 'У вас есть непрочитанные сообщения. <a href="/notice">Прочитать (<b>'.$Num[0].'</b>) </a>', '', 0);
      }
    }
?>
<!-- Work Categories -->
<div class="container">
  <hr>
  <div class="row">
    <div class="col"><h2 class="heading">Домашний мастер</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Сантехник</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Электрик</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Муж на час</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Столяр</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Слесарь</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Отделочные работы</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт квартир</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Укладка плитки</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Штукатурные работы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Утепление помещений</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Монтаж отопления</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Клининговые услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уборка квартир</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Генеральная уборка</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уборка после ремонта</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Химчистка</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уборка коттеджей и домов</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Курьерские услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Курьерская доставка</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Доставка продуктов</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Доставка готовой еды</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Доставка лекарств</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Курьер на авто</a></li>
      </ul>
    </div>
    <div class="w-100"></div>
    <div class="col"><h2 class="heading">Строительные работы</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Разнорабочие</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Сварочные работы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Токарные работы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Плотник</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Кладка кирпича</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Ремонт техники</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт крупной бытовой техники</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт мелкой бытовой техники</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Компьютерная помощь</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт цифровой техники</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт мобильных телефонов</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Логистические и складские услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Грузоперевозки</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги грузчиков</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Вывоз строительного мусора</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Перевозка мебели и техники</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Переезд квартиры или офиса</a></li>
      </ul></div>
    <div class="col"><h2 class="heading">Бытовые услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Сад и огород</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Няни</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги сиделки</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги домработницы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги швеи</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col"><h2 class="heading">Мебельные работы</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Изготовление мебели</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Ремонт мебели</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Сборка мебели</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Реставрация мебели</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Перетяжка мебели</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Работа в Интернете</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Копирайтинг</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Сбор, поиск информации</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Наполнение сайтов</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Набор текста</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Рерайтинг</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Дизайн</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Разработка логотипов</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дизайн интерьера</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дизайн сайта</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дизайн полиграфии</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги печати</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Разработка сайтов и приложений</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Создание сайтов</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Доработка сайта</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Создание Landing page</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Продвижение сайтов</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Верстка сайта</a></li>
      </ul>
    </div>
    <div class="w-100"></div>
    <div class="col"><h2 class="heading">Бюро переводов</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Письменные переводы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Редактура перевода</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Перевод документов и нотариальное заверение</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Устные переводы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Технический перевод</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Реклама в Интернете</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Реклама в социальных сетях</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Размещение объявлений</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Настройка контекстной рекламы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">SEO оптимизация сайта</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Размещение постов на форумах</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Фото- и видео- услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Фотограф</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Видеооператор</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Обработка фотографий</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Монтаж видео</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Оцифровка видеокассет</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Организация праздников</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги ведущего</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Музыкальное сопровождение</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги аниматоров</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Организация питания</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Выпечка и десерты</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col"><h2 class="heading">Деловые услуги</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Бухгалтерские услуги</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Юридические услуги</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Риэлтор</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Услуги колл-центра</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Финансовые услуги</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Услуги репетиторов</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Преподаватели по предметам</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Репетиторы иностранных языков</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Написание работ</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Преподаватели музыки</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Автоинструкторы</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Услуги красоты и здоровья</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Массаж</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за ногтями</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Косметология</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за ресницами</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за бровями</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Ремонт авто</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Помощь в дороге</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Техническое обслуживание и диагностика</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Автоэлектрика</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Кузовные работы</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Двигатель</a></li>
      </ul>
    </div>
    <div class="w-100"></div>
    <div class="col"><h2 class="heading">Услуги для животных</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за котами</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за собаками</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Гостиница для животных</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Перевозка животных</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Уход за рыбками</a></li>
      </ul>
    </div>
    <div class="col"><h2 class="heading">Другие категории</h2>
      <ul>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Доставка</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Фриланс</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Преподавание</a></li>
        <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Бизнес</a></li>
      </ul>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
  <hr>
</div>
</div><!-- End Work Categories -->

<!--<div class="container">
<div class="row">
  <div class="col"><div class="col-sm">
    <h2 class="heading">Домашний мастер</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col-sm">
    <h2 class="heading">Отделочные работы</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col-sm">
    <h2 class="heading">Клининговые услуги</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col-sm">
    <h2 class="heading">Курьерские услуги</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
</div>
<div class="row">
  <div class="col"><div class="col">
    <h2 class="heading">Строительные работы</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col">
    <h2 class="heading">Ремонт техники</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> Муж н  а час</li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col">
    <h2 class="heading">Логистические и складские работы</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
  <div class="col"><div class="col">
    <h2 class="heading">Строительные работы</h2>
    <ul>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
      <li><i class="ri-check-double-line"></i> <a href="#" class="withoutRed">Дом</a></li>
    </ul>
  </div></div>
</div>
</div>
-->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2><u class="redunderline">Как работает сервис</u></h2>
            <h3><u>Order/Satisfy</u> - это сервис заказа услуг в Интернете. Теперь при помощи нашего сервиса работа в интернете перестанет быть недосягаемым миражом в пустыне, а станет реальным результатом в мире информационных технологий и возможностей.</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p class="shrift">
              Площадка объединяет заказчиков услуг, которым необходимо выполнить какую-либо работу, и компетентных специалистов, ищущих подработку или дополнительный заработок.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Быстрая регистрация, которую можно подтвердить за 5 минут.</li>
              <li><i class="ri-check-double-line"></i> Простой интерфейс позволяет интуитивно быстро искать заказы и исполнителей.</li>
              <li><i class="ri-check-double-line"></i> Разнообразное коливество категорий работ не заставит заскучять специалистам.</li>
            </ul>
            <p class="fst-italic">
              Ниже дан краткий экскурс в понимание как работает и устроен наш сервис как для тех, кто только познакомился с таким видом сервиса, так и для людей, которые хотят попробывать себя в роли исполнителя.
            </p>
          </div>
        </div>
        <hr>
      </div>
    </section><!-- End About Section -->

    <div class="row mb-2 aboutService">
      <div class="col-md-6 blockada">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">Пошаговая инструкция:</strong>
            <h3 class="mb-0">
              <a class="text-dark">Для заказчика</a>
            </h3><br>
            <ul>
              <p class="card-text mb-auto">Указать какой вид работы нужно выполнить и за какой период.</p><br>
              <p class="card-text mb-auto">Выбрать нужного специалиста из списка доступных в конкретной категории.</p><br>
              <p class="card-text mb-auto">Заказ отправлен на выполнение Вашей задачи специалисту.</p><br>
            </ul>
            
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Пошаговая инструкция:</strong>
            <h3 class="mb-0">
              <a class="text-dark">Для исполнителя</a>
            </h3><br>
            <ul>
            <p class="card-text mb-auto">Выбрать интересующее Вас задание при помощи фильтров.</p><br>
            <p class="card-text mb-auto">Получив задание от заказчика, выполните его в поставленные сроки и с учётом всех его потребностей.</p><br>
            <p class="card-text mb-auto">Обязуйте заказчика оставить отзыв о проделанной работе.</p><br>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a>Подобающая зароботная плата</a></h4>
              <p>Каждый самостоятельно выбирает какую работу выполнять и сколько за неё получать. Это дело каждого.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a>Безопасность</a></h4>
              <p>Наш сервис дает вам возможность работать по безопасной сделке. А проверенные специалисты помогут вам в выполнении вашего задания.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4><a>Качество</a></h4>
              <p>Завершив задание, исполнитель должен оценивается за качество выполненной работы по рейтинговой системе.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4><a>Мобильность работы</a></h4>
              <p>Вне зависимости от вида работы, вы можете выбирать далеко ли от вас выполнять задания.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a>Прозрачность и ястность</a></h4>
              <p>У нас нет скрытых платежей, бесплатная публикацтя заказов, и поэтому цена предстоящей работы до ее завершения статична.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a>Свободный график</a></h4>
              <p>Устанавливайте себе график работы лично, работайте в свободное и удобное для вас время над задачами, которые вы выберете сами.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <!--<section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>-->
    <!-- End Portfolio Section -->

  </main><!-- End #main -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">О нас</a></li>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/ChooseRole.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>