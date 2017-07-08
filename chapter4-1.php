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
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-geodesy/v0.1.0/leaflet-geodesy.js'></script>
<script>
	L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
	var map = L.mapbox.map('map', 'mapbox.streets');
	map.setView([16.00,100.00],6);
	L.control.scale().addTo(map);
	var point1 = L.point([16.124536,100.6580]);
	var marker1 = L.marker([16.0124,100.14785]).addTo(map);	
	/*var line1 = L.polyline([[16,100],[15,101],[14.9567,99.24358]],{
		color:'#DC143C',
		weight: 5,
		dashArray:5
	}).addTo(map);
	line1.bindPopup("I'm line.");*/
	var latlngs = [[16,100],[15,101],[14.9567,99.24358],[16,100]];
	var options = {
		color:'#FF0000',
		weight:3,
		dashArray:5
	};
	var pol = L.polygon(latlngs,options).addTo(map);
	var area = (LGeo.area(pol) / 1000000).toFixed(2);
	pol.bindPopup("Area ="+area+"km<sup>2</sup>");
</script>

</body>
</html>