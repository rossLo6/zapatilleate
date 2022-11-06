function validarLetras(txt) {
    var regex = /^[a-zA-ZÀ-ÿ ]+$/
    return regex.exec(txt);
}

function validatePassword(newPassword) {
    var minNumberofChars = 6;
    var maxNumberofChars = 16;
    var regularExpression = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if (newPassword.length < minNumberofChars || newPassword.length > maxNumberofChars) {
        return false;
    }
    if (!regularExpression.test(newPassword)) {
        alert("La contraseña no puede tener carácteres especiales ni ser mayor de 15 carácteres.");
        return false;
    }
    return true;
}

function validar(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";

    //Usuario
    var usuario = document.getElementById("user").value;
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
    var password = document.getElementById("pass").value;
    if (!password || password == '') {
        ok = "no";
        msg = msg + "El campo 'Contraseña' no puede estar vacío.\n"
    } else {
        if (!validatePassword(password)) {
            ok = 'no'
            msg = msg + "La contraseña no puede tener menos de 6 carácteres ni carácteres especiales. \n"
        }
    }


    //Nombre
    var nombre = document.getElementById("name").value;
    if (!nombre || nombre == '') {
        ok = "no";
        msg = msg + "El campo 'Nombre' no puede estar vacío.\n"
    } else {
        if (!validarLetras(nombre)) {
            ok = 'no'
            msg = msg + "El nombre no puede contener números. \n"
        }
    }
    //Apellidos
    var apellidos = document.getElementById("apellidos").value;
    if (!apellidos || apellidos == '') {
        ok = "no";
        msg = msg + "El campo 'Apellidos' no puede estar vacío.\n"
    } else {
        if (!validarLetras(apellidos)) {
            ok = 'no'
            msg = msg + "Los apellidos no pueden contener números. \n"
        }
    }
    //email

    var re1 = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (!re1.test(document.getElementById("email").value)) {
        ok = 'no';
        msg = msg + "El email introducido no es correcto.\n";
    }
    //telefono

    var re2 = /^(6|7|8|9)[0-9]{8}$/

    if (!re2.test(document.getElementById("telefono").value)) {
        ok = 'no';
        msg = msg + "El campo de 'Telefono' es erroneo.\n"
    } else {
        valor = document.getElementById("telefono").value
        if (!(/^\d{9}$/.test(valor))) {
            ok = 'no';
            msg = msg + 'El telefono debe tener 9 cifras.\n'
        }
    }

    if (ok === 'no') {
        alert(msg);
        return false;
    }
    //Datos de usuarios
    var usuario = $('#user').val();
    var password = $('#pass').val();
    var nombre = $('#name').val();
    var apellidos = $('#apellidos').val();
    var email = $('#email').val();
    var fnac = $('#fnac').val();
    var telefono = $('#telefono').val();
    var direccion = $('#direccion').val();
    var sexo = $('#sexo').val();

    //Datos del proyecto
    var nombreProyecto = $('#nombreProyecto').val();
    var proyecto = $('#elijeProducto').val();
    var color = $('#personalizado1').prop('checked') ? 1 : 0;
    var logo = $('#personalizado2').prop('checked') ? 1 : 0;
    var tipografia = $('#personalizado3').prop('checked') ? 1 : 0;
    var cantidad = $('#plazo').val();
    var medida = $('#selectPlazo').val();
    var total = $('#total').val().replace(" €", "");
    var motivo = $('#motivo').val();




    $.ajax({
        data: {
            "nombreProyecto": nombreProyecto,
            "usuario": usuario,
            "password": password,
            "nombre": nombre,
            "apellidos": apellidos,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
            "direccion": direccion,
            "sexo": sexo,
            "proyecto": proyecto,
            "color": color,
            "logo": logo,
            "tipografia": tipografia,
            "cantidad": cantidad,
            "medida": medida,
            "total": total,
            "motivo": motivo
        },

        url: "../back/crearUsuario.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/login.php";
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });
    return false;


}