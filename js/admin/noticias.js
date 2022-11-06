jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});

function updateNoticia() {
    //Datos de noticia
    var noticia_id = $('#noticia_id').val();
    var titulo = $('#titulo').val();
    var cuerpo = $('#cuerpo').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "noticia_id": noticia_id,
            "titulo": titulo,
            "cuerpo": cuerpo,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/actualizarNoticia.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/noticia-detalle.php?id=" + noticia_id;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function crearNoticia() {
    //Datos de noticia
    var titulo = $('#titulo').val();
    var cuerpo = $('#cuerpo').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "titulo": titulo,
            "cuerpo": cuerpo,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/crearNoticia.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/noticias.php";
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function deleteNoticia(idNoticia) {
    $.ajax({
        data: {
            "idNoticia": idNoticia,
        },
        url: "../../back/admin/eliminarNoticia.php",
        type: "post",
        success: function (response) {
            console.log(response);
            window.location.href = "/zapatilleate/views/admin/noticias.php";
        },
        error: function (response) {
            console.log(response);
            alert(response.responseText.split("Error: ")[1]);
        }
    });
}

function goToNuevaNoticia() {
    window.location.href = "/zapatilleate/views/admin/crear-noticia.php";
}