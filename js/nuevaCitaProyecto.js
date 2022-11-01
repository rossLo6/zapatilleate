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
        url: "../Back/crearCita.php",
        type: "post",
        success: function (response) {
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

    var color = $('#personalizado1').prop('checked') ? 1 : 0;
    var logo = $('#personalizado2').prop('checked') ? 1 : 0;
    var tipografia = $('#personalizado3').prop('checked') ? 1 : 0;
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
        success: function (response) {
            window.location.reload();
        }
    });
    return true;
};

//show new project
function showNewProject() {
    document.getElementById("nueva-cita").style.display = "none";
    document.getElementById("nuevo-proyecto").style.display = "block";
    document.getElementById("editar-cita").style.display = "none";
}

//show new cita
function showNewCita() {
    document.getElementById("nueva-cita").style.display = "block";
    document.getElementById("nuevo-proyecto").style.display = "none";
    document.getElementById("editar-cita").style.display = "none";
}

//show edit cita
function showEditCita(id, fecha, hora) {
    var fechaCita = new Date(fecha + " " + hora);
    var fechaActual = new Date();
    var diff = fechaCita.getTime() - fechaActual.getTime();
    var diffDays = Math.ceil(diff / (1000 * 3600 * 24));
    if (diffDays < 3) {
        alert("No puedes editar una cita con menos de 72 horas de antelación");
    } else {
        document.getElementById("editDate").value = fecha + "T" + hora;
        document.getElementById("editId").value = id;

        document.getElementById("nueva-cita").style.display = "none";
        document.getElementById("nuevo-proyecto").style.display = "none";
        document.getElementById("editar-cita").style.display = "block";
    }
}

//editar cita
function editarCita(f) {
    var ok;
    var msg;
    msg = '';
    ok = "si";
    var citaId = $('#editId').val();
    var fecha = $('#editDate').val();
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
            "idCita": citaId,
            "fecha": fecha.split("T")[0],
            "hora": fecha.split("T")[1],
        },
        url: "../Back/editarCita.php",
        type: "post",
        success: function (response) {
            window.location.reload();
        }
    });
    return true;
};