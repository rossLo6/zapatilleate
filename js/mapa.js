// Si la geolocalización está disponible
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(sucess, error, options);
} else {
    alert("La geolocalización no está disponible");
}

var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};

function sucess(position) {
    let latitude = position.coords.latitude;
    let longitude = position.coords.longitude;

    // Iniciar mapa en las coordenadas del usuario
    let map = L.map('map', {
        center: [latitude, longitude],
        zoom: 14
    });

    // Aplicar capa/tipo de mapa
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18
    }).addTo(map);

    //icono inicio
    var inicio = L.icon({
        iconUrl: '../img/marker.png',
        iconSize: [55, 120],
        iconAnchor: [30, 100],
        popupAnchor: [-3, -76]
    });

    //icono final
    var final = L.icon({
        iconUrl: '../img/marker3.png',
        iconSize: [55, 120],
        iconAnchor: [30, 100],
        popupAnchor: [-3, -76]
    });
    //icono variar ruta
    var track = L.icon({
        iconUrl: '../img/marker3.png',
        iconSize: [55, 120],
        iconAnchor: [30, 100],
        popupAnchor: [-3, -76]
    });
    //RUTA
    var control = L.Routing.control({
        waypoints: [
            L.latLng(latitude, longitude),
            L.latLng(37.3417, -5.9873)
        ],
        language: 'es',
        createMarker: function(i, wp, nWps) {
            switch (i) {
                case 0:
                    return L.marker(wp.latLng, {
                        icon: inicio,
                        draggable: true
                    }).bindTooltip("<b>" + "UD está aquí" + "</b>");
                case nWps - 1:
                    return L.marker(wp.latLng, {
                        icon: final,
                        draggable: true
                    }).bindTooltip("<b>" + "Zapatilleate" + "</b>");
                default:
                    return L.marker(wp.latLng, {
                        icon: track,
                        draggable: true
                    }).bindTooltip("<b>" + "Cambio de ruta" + "</b>");
            }
        }
    }).addTo(map);
}
// Si la geolocalización NO está disponible
function error() {
    let map = L.map('map', {
        center: [37.3417, -5.9873],
        zoom: 16
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let marker = L.marker([37.3417, -5.9873]).bindTooltip("<b>" + "Zapatilleate" + "</b>").addTo(map)
};