<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>chapter3-1</title>
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
	<script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
	<style>
		body { margin:0; padding:0; }
		#map { position:absolute; top:0; bottom:0; width:100%; }
	</style>
</head>
<body>
	<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script> 
	<div id='map'></div>
	<script>
		L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';

		var map = L.mapbox.map('map', 'mapbox.streets');
		map.setView([16,100],6);


		map.on('click', function(e) {
			L.marker(e.latlng,{
				draggable:true,	
			}).addTo(map);
		});
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

		var pointLayer = L.mapbox.featureLayer();			
		pointLayer.loadURL('point_data.geojson');
		pointLayer.on('ready', function() {
			var hull = turf.convex(pointLayer.getGeoJSON());
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
			
		}).addTo(map);


	</script>
</body>
</html>