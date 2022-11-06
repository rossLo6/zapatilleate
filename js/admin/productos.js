jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});

function updateProducto() {
    //Datos de producto
    var producto_id = $('#producto_id').val();
    var nombre = $('#nombre').val();
    var precio = $('#precio').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "producto_id": producto_id,
            "nombre": nombre,
            "precio": precio,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/actualizarProducto.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/producto-detalle.php?id=" + producto_id;
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function crearProducto() {
    //Datos de producto
    var nombre = $('#nombre').val();
    var precio = $('#precio').val();
    var imagen = $('#imagen').val();
    var categoria = $('#categoria').val();

    $.ajax({
        data: {
            "nombre": nombre,
            "precio": precio,
            "imagen": imagen,
            "categoria": categoria,
        },
        url: "../../back/admin/crearProducto.php",
        type: "post",
        success: function (response) {
            window.location.href = "/zapatilleate/views/admin/productos.php";
        },
        error: function (response) {
            alert(response.responseText.split("Error: ")[1]);
        }
    });

    return false;
}

function goToNuevoProducto() {
    window.location.href = "/zapatilleate/views/admin/crear-producto.php";
}