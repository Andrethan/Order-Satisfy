<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: 404.php");
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
              <li><a href="testimonials.html">Вопросы и ответы</a></li>
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
<br><br><br>

<div class="container">
      <div class="py-4 text-center">
        <img class="d-block mx-auto mb-4" src="svgs/9551554301579156626-128.png" alt="" width="100" height="100">
        <h2>Форма создания заказа</h2>
      </div>

      <div class="row">
        <!--<div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>-->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Добавление заказа</h4>
          <form action="createOrder/tovar.php" method="post">    <hr class="order mb-4">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Категория заказа</label>
                <select name="category" class="form-control" id="category" required>
                  <option value="nonen" selected>Выбрать категорию...</option>
                  <option value="Бытовыеуслуги">Бытовые услуги</option>
                  <option value="Бюропереводов">Бюро переводов</option>
                  <option value="Деловыеуслуги">Деловые услуги</option>
                  <option value="Дизайн">Дизайн</option>
                  <option value="Домашниймастер">Домашний мастер</option>
                  <option value="Клининговыеуслуги">Клининговые услуги</option>
                  <option value="Курьерскиеуслуги">Курьерские услуги</option>
                  <option value="Логистическиеискладскиеуслуги">Логистические и складские услуги</option>
                  <option value="Мебельныеработы">Мебельные работы</option>
                  <option value="Организацияпраздников">Организация праздников</option>
                  <option value="Отделочныеработы">Отделочные работы</option>
                  <option value="Работавинтернете">Работа в интернете</option>
                  <option value="Разработкасайтов">Разработка сайтов</option>
                  <option value="Рекламаимаркетинг">Реклама и маркетинг</option>
                  <option value="Ремонтавто">Ремонт авто</option>
                  <option value="Ремонттехники">Ремонт техники</option>
                  <option value="Строительныеработы">Строительные работы</option>
                  <option value="Услугидляживотных">Услуги для животных</option>
                  <option value="Услугикрасотыиздоровья">Услуги красоты и здоровья</option>
                  <option value="Услугирепетиторов">Услуги репетиторов</option>
                  <option value="Услугитренеров">Услуги тренеров</option>
                  <option value="Фотоивидеоуслуги">Фото- и видео- услуги</option>
                </select>
                <div class="invalid-feedback">
                  Выберите нужную категорию заказа.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Подкатегория заказа</label>
                <select name="subcategory" class="form-control" id="subcategory" required></select>
                <div class="invalid-feedback">
                  Выберите нужную категорию заказа.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label>Название заказа</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><img src="svgs/12496875031638280183-128.png" width="30" height="30"></span>
                </div>
                <input name="nazva" type="text" class="form-control" id="username" placeholder="Например: Помыть посуду" required autocomplete="off">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label>Детальное описание заказа</label>
              <div class="md-form mb-4 pink-textarea active-red-textarea">
                <textarea name="desc" id="form18" class="md-textarea form-control" rows="3" required></textarea>
              </div>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="country">Город</label>
                
                <select class="form-control" name="city" id="country" required>
                  <option value="none" selected>Выбрать город...</option>
                  <option value="Одесса">Одесса</option>
                </select>

                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Район</label>
                <select name="district" class="form-control" id="city" required></select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="zip">Адресс</label>
                <input name="address" type="text" class="form-control" id="zip" placeholder=" ул.Багрицкого 12Б" autocomplete="off" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <div class="row">

              <div class="form-group col-md-2 mb-3"></div>
              <div class="form-group col-md-4 mb-3">
              <label for="inputDate">До какого дня выполнить:</label>
              <input name="deadline" type="date" class="form-control" required>
              </div>
                  <?php
                  /*if($_SERVER["REQUEST_METHOD"] == "POST"){
                  $name_err='';
                  if(empty(trim($_POST["time"]))){
                    $name_err = "Please enter a name.";
                  } elseif(!preg_match('/^[0-2:0-9]+$/', trim($_POST["time"]))){
                      $name_err = "Name can only contain letters, numbers, and underscores.";
                    }
                  }*/
                  ?>
              <div class="form-group col-md-4 mb-3">
              <label>До которого времени выполнить:</label>
                <input type="time" name="time" class="form-control mask-time" placeholder="12:00" required>
              </div>
              <label for="inputDate">Примерный бюджет:</label>
              <div class="input-group col-md-8 mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">₴</span>
                </div>
                <input name="grn" type="number" class="form-control" autocomplete="off" aria-label="Amount (to the nearest dollar)" required>
                <div class="input-group-append">
                  <span class="input-group-text">грн</span>
                </div>
              </div>
            </div>
            <!--<hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">-->

            <!--<h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>-->
            <hr class="order mb-4">
            <button class="btn btn-danger btn-lg btn-block" type="submit button" data-toggle="modal" data-target="#exampleModalCenter">Разместить заказ</button>

            <!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <p style='color:green;'>Уважаемый(ая) <b style='color:red;'></b> Ваше письмо отправленно успешно. <br> Спасибо. <br>Вам скоро ответят на почту <b style='color:red;'></b>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>-->

          </form>
        </div>
      </div>
</div><br>

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

  <script>
    var cities = {
      none: ["<— Выберите город..."],
      Одесса: ["Киевский","Малиновский", "Приморский", "Суворовский"],
      Киев: ["Голосеевский", "Дарницкий", "Деснянский", "Днепровский ", "Оболонский", "Святошинский", "Соломенский"],
      Харьков: ["Индустриальный", "Киевский", "Московский", "Немышлянский", "Новобаварский", "Основянский", "Слободской", "Холодногорский", "Шевченковский"]
    };
    var country = document.getElementById("country");
    var city = document.querySelector("#city");
    window.onload = selectCountry;
    country.onchange = selectCountry;

    function selectCountry(ev){
      city.innerHTML = "";
      var c = this.value || "none", o;
      for(let i = 0; i < cities[c].length; i++){
        o = new Option(cities[c][i],i,false,false);
        city.add(o);
      };
    }
  </script>

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
  <script src="js/ЗависимыеСписки.js"></script>
  <script src="js/ЗависимыеСписки2.js"></script>
  <script src="js/TimeMask.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  <script src="js/datetimepicker-master/jquery.js"></script>
  <script src="js/datetimepicker-master/jquery.datetimepicker.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>