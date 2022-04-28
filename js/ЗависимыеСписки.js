var categories = {
  nonen: ["<— Выберите категорию..."],
  Бытовыеуслуги: ["Сад и огород","Няни", "Услуги сиделки", "Услуги домработницы", "Услуги швеи"],
  Бюропереводов: ["Письменные переводы", "Редактура переводов", "Перевод документов", "Устные переводы", "Технический перевод"],
  Деловыеуслуги: ["Бухгалтерские услуги", "Юридические услуги", "Риэлтор", "Услуги колл-центра", "Финансовые услуги"],
  Дизайн: ["Разработка логотипов", "Дизайн интерьера", "Дизайн сайта", "Дизайн полиграфии", "Услуги печати"],
  Домашниймастер: ["Сантехник", "Электрик", "Муж на час", "Столяр", "Слесарь"],
  Клининговыеуслуги: ["Уборка квартир", "Генеральная уборка", "Уборка после ремонта", "Химчистка", "Уборка коттеджей и домов"],
  Курьерскиеуслуги: ["Курьерская доставка", "Доставка продуктов", "Доставка готовой еды", "Доставка лекарств", "Курьер на авто"],
  Логистическиеискладскиеуслуги: ["Грузоперевозки", "Услуги грузчиков", "Вывоз строительного мусора", "Перевозка мебели", "Переезд квартиры"],
  Мебельныеработы: ["Изготовление мебели", "Ремонт мебели", "Сборка мебели", "Реставрация мебели", "Перетяжка мебели"],
  Организацияпраздников: ["Услуги ведущего", "Музыкальное сопровождение", "Услуги аниматоров", "Организация питания", "Выпечка и десерты"],
  Отделочныеработы: ["Ремонт квартир", "Укладка плитки", "Штукатурные работы", "Утепление помещений", "Монтаж отопления"],
  Работавинтернете: ["Копирайтинг", "Сбор и поиск информации", "Наполнение сайтов", "Набор текста", "Рерайтинг"],
  Разработкасайтов: ["Создание сайтов", "Доработка сайта", "Создание целевой страницы", "Продвижение сайтов", "Верстка сайтов"],
  Рекламаимаркетинг: ["Реклама в социальных сетях", "Размещение объявлений", "Настройка контекстной рекламы", "SEO оптимизация сайта", "Размещение постов на форумах"],
  Ремонтавто: ["Помощь в дороге", "Техническое обслуживание", "Автоэлектрика", "Кузовые работы", "Двигатель"],
  Ремонттехники: ["Ремонт крупной бытовой техники", "Ремонт мелкой бытовой техники", "Компьютерная помощь", "Ремонт цифровой техники", "Ремонт мобильных телефонов"],
  Строительныеработы: ["Разнорабочие", "Сварочные работы", "Токарные работы", "Плотник", "Кладка кирпича"],
  Услугидляживотных: ["Уход за котами", "Уход за собаками", "Гостиница для животных", "Перевозка животных", "Уход за рыбками"],
  Услугикрасотыиздоровья: ["Массаж", "Уход за ногтями", "Косметология", "Уход за ресницами", "Уход за бровями"],
  Услугирепетиторов: ["Преподаватели по предметам", "Репетиторы иностранных языков", "Написание работ", "Преподаватели музыки", "Автоинструкторы"],
  Услугитренеров: ["Йога и фитнес", "Игровые виды спорта", "Водные виды спорта", "Силовые виды спорта", "Боевые искусства"],
  Фотоивидеоуслуги: ["Фотограф", "Видеооператор", "Обработка фотографий", "Монтаж видео", "Оцифровка видеокассет"]
};

var category = document.getElementById("category");
var subcategory = document.querySelector("#subcategory");
window.onload = selectCategory;
category.onchange = selectCategory;

function selectCategory(ev){
  subcategory.innerHTML = "";
  var c = this.value || "nonen", o;
  for(let i = 0; i < categories[c].length; i++){
	o = new Option(categories[c][i],i,false,false);
      subcategory.add(o);
    };
}