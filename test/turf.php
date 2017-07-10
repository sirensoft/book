<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>TURF</title>
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
	<script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />

	<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-draw/v0.2.3/leaflet.draw.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-draw/v0.2.3/leaflet.draw.css' rel='stylesheet' />
	

	<style>
		body { margin:0; padding:0; }
		#map { position:absolute; top:0; bottom:0; width:100%; }
		.leaflet-control-draw-measure {
			background-image: url(../icon/measure-control.png);
			#background-size:     cover;                     
			background-repeat:   no-repeat;
			background-position: center center;
		}
	</style>
</head>
<body>
	<script
	src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>  
	<script src="https://unpkg.com/leaflet.measurecontrol@1.0.0"></script>




	<div id='map'></div>
	<script>
		L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
		
		var map = L.mapbox.map('map' );
		L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
			maxZoom: 20,
			subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
		}).addTo(map);
		map.setView([16,100],6);
		
		var hullStyle = {
			fillColor: 'blue',
			color: 'gray',
			weight: 1
		};
		var hullStyleMouse = {
			fillColor: 'yellow',
			color: 'gray',
			weight: 3
		};
		var icon = L.mapbox.marker.icon({
			'marker-size': 'small', 
			'marker-symbol':'h',    
			'marker-color': '#00FF00'
		});

		var pointLayer = L.mapbox.featureLayer().addTo(map);			
		pointLayer.loadURL('../point_data2.geojson');
		
		/*
		pointLayer.on('ready', function() {
			var features = pointLayer.getGeoJSON();
			var hull = turf.convex(features);
			var layerHull = L.mapbox.featureLayer(hull).addTo(map);			
			layerHull.eachLayer(function(layer){
				layer.setStyle(hullStyle);
				layer.on('mouseover',function(e){
					layer.setStyle(hullStyleMouse);
				});
				layer.on('mouseout',function(e){
					layer.setStyle(hullStyle);
				});
			});
			var center = turf.center(features);
			console.log(center);
			var centerLayer=L.mapbox.featureLayer(center).addTo(map);
			console.log(centerLayer.getGeoJSON());
			
		});*/

		pointLayer.on('ready', function() {
			map.fitBounds(pointLayer.getBounds());

			pointLayer.eachLayer(function(layer){

				layer.setIcon(icon);

				var buffered = turf.buffer(layer.feature, 0.33,'kilometers');

				L.mapbox.featureLayer(buffered).setStyle({
					'fillColor':'red','fillOpacity':1
				})	
				.addTo(map);
				//console.log(layer.feature);

				L.circle(layer.getLatLng(),100,{
					color:'lime',			
					fillColor:'lime',
					fillOpacity:0.4
				}).addTo(map);

			});
		});

		L.Control.measureControl().addTo(map);

		
		



	</script>
</body>
</html>