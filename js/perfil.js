function actualizarUsuario(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";

    //Nombre
    var nombre = document.getElementById("nombre").value;
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
    var apellidos = document.getElementById("apellido_1").value;
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

    //Datos de usuario
    var nombre = $('#nombre').val();
    var apellido1 = $('#apellido_1').val();
    var apellido2 = $('#apellido_2').val();
    var email = $('#email').val();
    var fnac = $('#f_nacimiento').val();
    var telefono = $('#telefono').val();

    $.ajax({
        data: {
            "nombre": nombre,
            "apellido1": apellido1,
            "apellido2": apellido2,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
        },

        url: "../back/actualizarUsuario.php",
        type: "post",
        success: function (response) {
            console.log(response);
        }
    });
    return true;
}