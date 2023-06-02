var map;

$(document).ready(function () {
    map = new GMaps({
        div: "#gmaps-markers",
        lat: -3.7159854005592345,
        lng: 137.98817586890397,
        zoom: 18
    });

    map.addMarker({
        lat: -3.7159854005592345,
        lng: 137.98817586890397,
        title: "Kantor Bupati Puncak Jaya",
        details: { database_id: 42, author: "DISKOMINFO PUNCAK JAYA" },
        click: function (a) {
            console.log && console.log(a);
            window.open("https://goo.gl/maps/7wrqNeRybQXvVLrq5", "_blank");
        }
    });

    map = new GMaps({
        div: "#gmaps-overlay",
        lat: -12.043333,
        lng: -77.028333
    });
    map.drawOverlay({
        lat: map.getCenter().lat(),
        lng: map.getCenter().lng(),
        content: '<div class="gmaps-overlay">Lima<div class="gmaps-overlay_arrow above"></div></div>',
        verticalAlign: "top",
        horizontalAlign: "center"
    });

    map = GMaps.createPanorama({
        el: "#panorama",
        lat: 42.3455,
        lng: -71.0983
    });

    map = new GMaps({
        div: "#gmaps-types",
        lat: -12.043333,
        lng: -77.028333,
        mapTypeControlOptions: {
            mapTypeIds: ["hybrid", "roadmap", "satellite", "terrain", "osm"]
        },
        zoom: 18
    });
    map.addMapType("osm", {
        getTileUrl: function (a, e) {
            return "https://a.tile.openstreetmap.org/" + e + "/" + a.x + "/" + a.y + ".png"
        },
        tileSize: new google.maps.Size(256, 256),
        name: "OpenStreetMap",
        maxZoom: 18
    });
    map.setMapTypeId("osm");
});
