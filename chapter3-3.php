<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>chapter3-3</title>
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

var rectangle = L.rectangle([[15.00,99.00],[16.00,100.00]],{
	color: "#2F4F4F",
	weight: 3,
	dashArray: 3,
	fillColor:'#FF1493',
	fillOpacity:0.4
})
rectangle.bindPopup("Hello I'm rectangle");
rectangle.addTo(map);
rectangle.on('click',function(e){
	console.log(rectangle.getBounds());
});

map.removeLayer();
</script>
</body>
</html>