<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>set test</title>
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

	<script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />

	<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-draw/v0.2.3/leaflet.draw.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-draw/v0.2.3/leaflet.draw.css' rel='stylesheet' />

	<link rel="stylesheet"  href="../css/style.css" />

</head>
<body>
	<script	src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>  
	<script src="https://unpkg.com/leaflet.measurecontrol@1.0.0"></script>
	<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-hash/v0.2.1/leaflet-hash.js'></script>

	<div id='map'></div>
	<script>
		L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
		
		var map = L.mapbox.map('map' );
		map.setView([15.464,101.129],8);

		var base1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
			maxZoom: 20,
			subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
		}).addTo(map);
		//var hash = L.hash(map);

		var geoJsonPoint;
		var geoJsonPol;

		var pointFeatureLayer = L.mapbox.featureLayer();
		pointFeatureLayer.loadURL('../point_data2.geojson').on('ready',function(){
			geoJsonPoint = pointFeatureLayer.getGeoJSON();
		});
		
		var polFeatureLayer = L.mapbox.featureLayer();
		polFeatureLayer.loadURL('../polygon_data.geojson').on('ready',function(){
			geoJsonPol = pointFeatureLayer.getGeoJSON();
			
			var resGeojson = turf.within(geoJsonPoint, geoJsonPol);
		});;

		




	</script>
</body>
</html>