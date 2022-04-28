<?php require_once("./config.php"); ?>

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
  <link href="assets/css/index.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Order/Satisfy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
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
                    <li><a href="#">Преподаватели ПО предметам</a></li>
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
            <li><a href="login.php"><u>Войти</u></a></li>

          <li><a class="nothing" href="register.php">Стать специалистом</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br><br><br><br>
  
  <div class="posentry">
      <hr class="hrdop">
<?php
echo 'Результаты поиска <br/>';
$search_q = $_POST['search_q'];
$search_q = trim($search_q);
$search_q = strip_tags($search_q);
$q = mysqli_query($link, "SELECT title_value,link FROM `search` WHERE title_value LIKE '%$search_q%'");
$numrows = mysqli_num_rows($q);
echo 'Найдено результатов: ' . $numrows . '<br/>';
while ($itog = mysqli_fetch_assoc($q)) {
    echo '<a href=' . $itog['link'] . '>' . $itog['title_value'] . '</a><br/>';
}

echo '<br>';
echo '<a href="index.html">На главную</a><br/>';
mysqli_free_result($q);
?>
<hr class="hrdop">
<br>
<p class="blacks"> <a href="index.html">Вернуться назад</a>.</p><br>
  </div>

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
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Главная</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">О нас</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Популярные Вопросы</a></li>
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
  </footer>
</html>