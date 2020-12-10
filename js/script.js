DG.autoload(function() {
    'use strict';

    let myMap = new DG.Map('myMapId');

    myMap.setCenter(new DG.GeoPoint(37.609218, 55.753559), 13);
    myMap.controls.add(new DG.Controls.Zoom());

    let marker = new DG.Markers.Common({geoPoint: new DG.GeoPoint(37.595887,55.74489)});

    myMap.markers.add(marker);
});
