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
    var apellidos = document.getElementById("apellido1").value;
    if (!apellidos || apellidos == '') {
        ok = "no";
        msg = msg + "El campo 'Primer apellido' no puede estar vacío.\n"
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
    var usuario = $('#usuario').val();
    var password = $('#password').val();
    var nombre = $('#name').val();
    var apellido1 = $('#apellido1').val();
    var apellido2 = $('#apellido2').val();
    var email = $('#email').val();
    var fnac = $('#fnac').val();
    var telefono = $('#telefono').val();

    //Datos del proyecto
    var nombreProyecto = $('#nombreProyecto').val();
    var proyecto = $('#elijeProducto').val();
    var color = $('#personalizado1').val();
    var logo = $('#personalizado2').val();
    var tipografia = $('#personalizado3').val();
    var cantidad = $('#plazo').val();
    var medida = $('#selectPlazo').val();
    var total = $('#total').val().replace(" €", "");




    $.ajax({
        data: {
            "nombreProyecto": nombreProyecto,
            "usuario": usuario,
            "password": password,
            "nombre": nombre,
            "apellido1": apellido1,
            "apellido2": apellido2,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
            "proyecto": proyecto,
            "color": color,
            "logo": logo,
            "tipografia": tipografia,
            "cantidad": cantidad,
            "medida": medida,
            "total": total,
        },

        url: "../back/crearUsuario.php",
        type: "post",
        success: function(response) {
            console.log(response);
        }
    });
    return true;


}