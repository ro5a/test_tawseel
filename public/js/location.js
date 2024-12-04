let map;
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 15.348251, lng: 44.20633 },
        zoom: 15,
        scrollwheel: true,
    });
    const uluru = { lat: 15.348251, lng: 44.20633 };
    let marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true,
    });
    google.maps.event.addListener(marker, "position_changed", function () {
        let lat = marker.position.lat();
        let lng = marker.position.lng();
        document.getElementById("lat").value = lat;
        document.getElementById("long").value = lng;
    });
    google.maps.event.addListener(map, "click", function (event) {
        pos = event.latLng;
        marker.setPosition(pos);
    });
}
// initMap();
