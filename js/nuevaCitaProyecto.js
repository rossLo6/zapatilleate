//crear nueva cita

function validarcita(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";
    var proyectoId = $('#citaproyecto').val();
    if (!proyectoId || proyectoId == '') {
        ok = "no";
        msg = msg + "Debes seleccionar un proyecto.\n"
    }
    var fecha = $('#newdate').val();
    if (!fecha || fecha == '') {
        ok = "no";
        msg = msg + "Debes seleccionar una fecha y una hora.\n"
    }

    if (ok === 'no') {
        alert(msg);
        return false;
    }

    $.ajax({
        data: {
            "proyecto": proyectoId,
            "fecha": fecha.split("T")[0],
            "hora": fecha.split("T")[1],
        },
        url: "../back/crearCita.php",
        type: "post",
        success: function(response) {
            window.location.reload();
        }
    });
    return true;
};

//crear nuevo proyecto

function validarproyecto(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";
    var nombreProyecto = $('#nombreProyecto').val();
    if (!nombreProyecto || nombreProyecto == '') {
        ok = "no";
        msg = msg + "Debes ponerle nombre al proyecto.\n"
    }
    var elijeproducto = $('#elijeProducto').val();
    if (!elijeproducto || elijeproducto == '') {
        ok = "no";
        msg = msg + "Debes seleccionar un producto.\n"
    }

    if (ok === 'no') {
        alert(msg);
        return false;
    }
    //Datos de nuevo proyecto

    var color = $('#personalizado1').val();
    var logo = $('#personalizado2').val();
    var tipografia = $('#personalizado3').val();
    var plazo = $('#plazo').val();
    var selectPlazo = $('#selectPlazo').val();
    var total = $('#total').val().replace(" €", "");

    $.ajax({
        data: {
            "proyecto": nombreProyecto,
            "elijeproducto": elijeproducto,
            "plazo": plazo,
            "selectPlazo": selectPlazo,
            "color": color,
            "logo": logo,
            "tipografia": tipografia,
            "total": total,
        },
        url: "../back/crearProyecto.php",
        type: "post",
        success: function(response) {
            window.location.reload();
        }
    });
    return true;
};