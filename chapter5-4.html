<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>chapter5-4</title>
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
	<script src='https://code.jquery.com/jquery-1.11.0.min.js'></script>   
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
					layer.bindPopup(layer.feature.properties.name);					
				}
			});
		});
		pointLayer.addTo(map);

		var url = 'https://api.github.com/repos/mapbox/mapbox.js/contents/test/manual/example.geojson';
		function load() {
			$.ajax({
				headers: {
					'Accept': 'application/vnd.github.v3.raw'
				},
				xhrFields: {
					withCredentials: false
				},
				dataType: 'json',
				url: url,
				success: function(geojson) {
					L.mapbox.featureLayer(geojson).addTo(map);
				}
			});
		}
		$(load);
	</script>

</body>
</html>

