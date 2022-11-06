jQuery(document).ready(function ($) {
    $(".clickable-row").click(function (event) {
        if (event.target.className != "delete-button") {
            window.location = $(this).data("href");
        }
    });
});

function updateUser() {
    //Datos de usuario
    var user_id = $('#user_id').val();
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var email = $('#email').val();
    var fnac = $('#f_nacimiento').val();
    var telefono = $('#telefono').val();
    var direccion = $('#direccion').val();
    var sexo = $('#sexo').val();
    var rol = $('#rol').val();

    $.ajax({
        data: {
            "user_id": user_id,
            "nombre": nombre,
            "apellidos": apellidos,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
            "direccion": direccion,
            "sexo": sexo,
            "rol": rol,
        },
        url: "../../back/admin/actualizarUsuario.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/usuario-detalle.php?id=" + user_id;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function createUser() {
    //Datos de usuario
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var email = $('#email').val();
    var fnac = $('#f_nacimiento').val();
    var telefono = $('#telefono').val();
    var direccion = $('#direccion').val();
    var sexo = $('#sexo').val();
    var usuario = $('#usuario').val();
    var password = $('#password').val();

    $.ajax({
        data: {
            "nombre": nombre,
            "apellidos": apellidos,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
            "direccion": direccion,
            "sexo": sexo,
            "usuario": usuario,
            "password": password,
        },
        url: "../../back/admin/crearUsuario.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/usuarios.php";
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function deleteUser(idUsuario) {
    $.ajax({
        data: {
            "idUsuario": idUsuario,
        },
        url: "../../back/admin/eliminarUsuario.php",
        type: "post",
        success: function (response) {
            console.log(response);
            window.location.href = "/zapatilleate/views/admin/usuarios.php";
        },
        error: function (response) {
            console.log(response);
            alert(response.responseText.split("Error: ")[1]);
        }
    });
}

function eliminarCita(idCita) {
    $.ajax({
        data: {
            "idCita": idCita,
        },
        url: "../../back/admin/eliminarCita.php",
        type: "post",
        success: function (response) {
            window.location.reload();
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });
    return false;
}

function goToNuevaCita(userId) {
    window.location.href = "/zapatilleate/views/admin/crear-cita.php?id=" + userId;
}

function goToNuevoUsuario() {
    window.location.href = "/zapatilleate/views/admin/crear-usuario.php";
}