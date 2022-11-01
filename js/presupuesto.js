var prices = [];
var amount = 0;

function calculatePrice() {
    amount = 0;
    // Zapatilla
    amount += parseInt(prices[parseInt($("#elijeProducto option:selected")[0].value) - 1].precio);
    // Plazo
    var diasMeses = $("#selectPlazo option:selected")[0].value;
    var multiplicador = diasMeses == "dias" ? 0.1 : 4;
    amount -= (multiplicador * parseFloat($("#plazo")[0].value));
    //Extras
    $('.customcheck:checked').each(
        function () {
            amount += parseFloat($(this).val());
        }
    );
    $("#total").val((amount || 0) + " €");
}
$(document).ready(function () {
    $.getJSON("/zapatilleate/back/obtenerPreoducto.php", function (data) {
        prices = data;
    });
    $("#elijeProducto")
        .change(function () {
            calculatePrice();
        })
    $("#plazo")
        .change(function () {
            calculatePrice();
        });
    // cambiar descuento de dias a meses
    $("#selectPlazo")
        .change(function () {
            if (this.value == "meses") {
                $("#plazo").attr({
                    "max": 4,
                    "min": 1
                });
                $("#plazo").val(1);
            } else {
                $("#plazo").attr({
                    "max": 20,
                    "min": 3
                });
                $("#plazo").val(3);
            }
            calculatePrice();
        });
    $(".customcheck")
        .change(function () {
            calculatePrice();
        });
});