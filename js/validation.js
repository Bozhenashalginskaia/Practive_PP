document.getElementById("validateForm").addEventListener("submit", function (event) {
    var login = document.getElementsByName("login")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var repeatrass = document.getElementsByName("repeatpassword")[0].value;
    
    var passwordRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

    if (login.length < 4 ) {
        alert("Логин должен содержать минимум 4 символа.");
        event.preventDefault();
    }
    if (password.length < 6) {
        alert("Пароль должен содержать минимум 6 символов.");
        event.preventDefault();
    }
    if (!passwordRegex.test(password)) {
    alert("Неправильный формат пароля.");
    event.preventDefault();
}
if (password !== repeatrass) {
    alert("Пароли не совпадают");
    event.preventDefault();
    
}

});



