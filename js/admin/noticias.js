jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});

function updateNoticia() {
    //Datos de noticia
    var noticia_id = $('#noticia_id').val();
    var autor = $('#autor').val();
    var titulo = $('#titulo').val();
    var cuerpo = $('#cuerpo').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "noticia_id": noticia_id,
            "autor": autor,
            "titulo": titulo,
            "cuerpo": cuerpo,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/actualizarNoticia.php",
        type: "post",
        success: function (response) {
            console.log(response);
            window.location.href = "/zapatilleate/views/admin/noticia-detalle.php?id=" + noticia_id;
        }
    });

    return true;
}

function crearNoticia() {
    //Datos de noticia
    var autor = $('#autor').val();
    var titulo = $('#titulo').val();
    var cuerpo = $('#cuerpo').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "autor": autor,
            "titulo": titulo,
            "cuerpo": cuerpo,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/crearNoticia.php",
        type: "post",
        success: function (response) {
            console.log(response);
            window.location.href = "/zapatilleate/views/admin/noticias.php";
        }
    });

    return true;
}

function goToNuevaNoticia() {
    window.location.href = "/zapatilleate/views/admin/crear-noticia.php";
}