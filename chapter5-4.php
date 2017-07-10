<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>chapter5-3</title>
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
		map.setView([16.00,100.00],6);
			
		var pointLayer = L.mapbox.featureLayer();			
		pointLayer.loadURL('point_data.geojson');
		pointLayer.on('ready', function() {			
			pointLayer.eachLayer(function(layer) {				
				if(layer.feature.properties.home==="1"){					
					layer.setIcon(L.mapbox.marker.icon({
						"marker-symbol":"warehouse",
						"marker-color":"#FFA07A"
					}));					
				}
				if(layer.feature.properties.name){
					layer.bindPopup('<iframe width="280" height="215" src="https://www.youtube.com/embed/wWNk3COVNS4" frameborder="0" allowfullscreen></iframe>');
					layer.openPopup();
				}
			});
		});
		pointLayer.addTo(map);
	</script>

</body>
</html>

