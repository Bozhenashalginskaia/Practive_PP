document.getElementById("validateForm").addEventListener("submit", function (event) {
    var name = document.getElementsByName("name")[0].value;
    var login = document.getElementsByName("login")[0].value;
    var avatar = document.getElementsByName(".avatar")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var repeatrass = document.getElementsByName("repeatpassword")[0].value;
    
    
    var nameRegex = /^[А-Яа-яЁё\s]+$/;
    if (login.length < 6) {
    alert("Логин должен содержать минимум 6 символа.");
    event.preventDefault();
    }
    if (password.length < 8) {
    alert("Пароль должен содержать минимум 8 символов.");
    event.preventDefault();
    }
    if (!nameRegex.test(name)) {
    alert("Неправильный формат ФИО.");
    event.preventDefault();
    }
    if (password !== repeatrass) {
    alert("Пароли не совпадают");
    event.preventDefault();
    }

   });

   console.log($("#hidden").is(":valid"));


