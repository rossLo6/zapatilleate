function loginForm(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";

    //Usuario
    var usuario = document.getElementById("usuario").value;
    if (!usuario || usuario == '') {
        ok = "no";
        msg = msg + "El campo 'Usuario' no puede estar vacío.\n"
    } else {
        if (!validarLetras(usuario)) {
            ok = 'no'
            msg = msg + "El usuario no puede contener números. \n"
        }
    }
    //Contraseña
    var password = document.getElementById("password").value;
    if (!password || password == '') {
        ok = "no";
        msg = msg + "El campo 'Contraseña' no puede estar vacío.\n"
    } else {
        if (!validatePassword(password)) {
            ok = 'no'
            msg = msg + "La contraseña no puede tener carácteres especiales. \n"
        }
    }

    //Datos de usuarios
    var usuario = $('#usuario').val();
    var password = $('#password').val();

    $.ajax({
        data: {
            "usuario": usuario,
            "password": password
        },

        url: "/zapatilleate/Back/login.php",
        type: "post",
        success: function (response) {
            location.reload();
        },
        error: function (response) {
            alert("usuario o contraseña incorrectos");
        }
    });
    return true;
}

function logoutForm(f) {
    $.ajax({
        data: {},

        url: "/zapatilleate/Back/logout.php",
        type: "post",
        success: function (response) {
            location.reload();
        }
    });
    return true;
}