jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});

function updateUser() {
    //Datos de usuario
    var user_id = $('#user_id').val();
    var nombre = $('#nombre').val();
    var apellido1 = $('#apellido_1').val();
    var apellido2 = $('#apellido_2').val();
    var email = $('#email').val();
    var fnac = $('#f_nacimiento').val();
    var telefono = $('#telefono').val();

    $.ajax({
        data: {
            "user_id": user_id,
            "nombre": nombre,
            "apellido1": apellido1,
            "apellido2": apellido2,
            "email": email,
            "telefono": telefono,
            "fnac": fnac,
        },
        url: "../../back/admin/actualizarUsuario.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/usuario-detalle.php?id=" + user_id;
        }
    });

    return true;
}