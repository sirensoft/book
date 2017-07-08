<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>chapter5-1</title>
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
	<script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
	<style>
		body { margin:0; padding:0; }
		#map { position:absolute; top:0; bottom:0; width:100%; }
		#menu {
			position:absolute;
			background: #fff;
			padding: 10px;
			right: 0;
    		
    		
		}
	</style>
</head>
<body>
<div id='map'></div>
<div id='menu'>
    <input id='mapbox/basic-v9' type='radio' name='rtoggle' value='basic'>
    <label for='basic'>basis</label>
    <input id='gisedegem/ciyldbezy005e2ro2b0xz6u4e' type='radio' name='rtoggle' value='streets' checked='checked'>
    <label for='streets'>stratenplan</label>
    <input id='mapbox/bright-v9' type='radio' name='rtoggle' value='bright'>
    <label for='bright'>helder</label>
    <input id='mapbox/light-v9' type='radio' name='rtoggle' value='light'>
    <label for='light'>licht</label>
    <input id='mapbox/dark-v9' type='radio' name='rtoggle' value='dark'>
    <label for='dark'>donker</label>
    <input id='mapbox/satellite-v9' type='radio' name='rtoggle' value='satellite'>
    <label for='satellite'>satelliet</label>
</div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
var map = L.mapbox.map('map', 'mapbox.streets');
map.setView([16.00,100.00],6);
var myLayer = L.mapbox.featureLayer();
var geojsonPoint =[
	{
		"type": "Feature",
		"properties": {	
			"marker-color":"#FFFF00",
			"marker-size":"large",
			"marker-symbol":"bus",	
			"title":"Hello I'm geojson point.",
			"description":"this is description",			
		},
		"geometry": {
			"type": "Point",
			"coordinates": [100.101928,17.308687]
		}
	},
	{
		"type": "Feature",
		"properties": {				
			"marker-color":"#6495ED",
			"marker-symbol":"warehouse",
		},
		"geometry": {
			"type": "Point",
			"coordinates": [101.101928,16.908687]
		}
	}
];
myLayer.setGeoJSON(geojsonPoint).addTo(map);


var layerList = document.getElementById('menu');
var inputs = layerList.getElementsByTagName('input');

function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/' + layerId);
}

for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
}
</script>

</body>
</html>

