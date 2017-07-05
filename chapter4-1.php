<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>chapter4-1</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
<style>
body { margin:0; padding:0; }
#map { position:absolute; top:0; bottom:0; width:100%; }
</style>
</head>
<body>
<div id='map'></div>
<script>

L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
var map = L.mapbox.map('map', 'mapbox.streets');
map.setView([16.00,100.00],8);

var point1 = L.point([16.8123,99.5678]);
var point2 = L.point([14.635,100.2347]);
var distance = point1.distanceTo(point2);
console.log(distance*100);


var latlngs = [[point1.x,point1.y],[point2.x,point2.y]];
var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
</script>
</body>
</html>