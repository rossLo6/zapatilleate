jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});

function updateProyecto() {
    //Datos de proyecto
    var idProyecto = $('#idProyecto').val();
    var idProducto = $('#idProducto').val();
    var nombre = $('#nombre').val();
    var color = $('#color').prop('checked') ? 1 : 0;
    var logo = $('#logo').prop('checked') ? 1 : 0;
    var tipografia = $('#tipografia').prop('checked') ? 1 : 0;
    var entrega = $('#entrega').val();
    var precio = $('#precio').val();

    $.ajax({
        data: {
            "idProyecto": idProyecto,
            "idProducto": idProducto,
            "nombre": nombre,
            "color": color,
            "logo": logo,
            "tipografia": tipografia,
            "entrega": entrega,
            "precio": precio,
        },
        url: "../../back/admin/actualizarProyecto.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/proyecto-detalle.php?id=" + idProyecto;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}