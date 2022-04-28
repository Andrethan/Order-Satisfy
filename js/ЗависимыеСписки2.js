/*var cities = {
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
    }*/