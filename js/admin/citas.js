function updateCita() {
    //Datos de cita
    var idCita = $('#idCita').val();
    var fecha = $('#fecha').val();
    var motivo = $('#motivo').val();
    $.ajax({
        data: {
            "idCita": idCita,
            "fecha": fecha.split("T")[0],
            "hora": fecha.split("T")[1],
            "motivo": motivo,
        },
        url: "../../back/admin/actualizarCita.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/cita-detalle.php?id=" + idCita;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });
    return false;
}

function crearCita() {
    //Datos de cita
    var fecha = $('#fecha').val();
    var motivo = $('#motivo').val();
    var idUsuario = $('#idUsuario').val();
    var idProyecto = $('#idProyecto').val();
    $.ajax({
        data: {
            "fecha": fecha.split("T")[0],
            "hora": fecha.split("T")[1],
            "idUsuario": idUsuario,
            "motivo": motivo,
            "idProyecto": idProyecto,
        },
        url: "../../back/admin/crearCita.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/usuario-detalle.php?id=" + idUsuario;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });
    return false;
}