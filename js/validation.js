document.getElementById("validateForm").addEventListener("submit", function (event) {
    event.preventDefault();
    var name = document.getElementsByName("name")[0].value;
    var login = document.getElementsByName("login")[0].value;
    var avatar = document.getElementsByName(".avatar")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var repeatrass = document.getElementsByName("repeatpassword")[0].value;
    
    
    var nameRegex = /^[А-Яа-яЁё\s]+$/;
    if (!login.test() || login.length < 6 ) {
    alert("Логин должен содержать минимум 6 символа.");
    
    }
    if (password.length < 8) {
    alert("Пароль должен содержать минимум 8 символов.");
    
    }
    if (!nameRegex.test(name)) {
    alert("Неправильный формат ФИО.");
    
    }
    if (password !== repeatrass) {
    alert("Пароли не совпадают");
   
    }

   });

   console.log($("#hidden").is(":valid"));


