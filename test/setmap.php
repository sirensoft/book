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
		var geoJsonPol= {
			"type": "FeatureCollection",
			"features": [
			{
				"type": "Feature",
				"properties": {},
				"geometry": {
					"type": "Polygon",
					"coordinates": [
					[
					[
					99.832763671875,
					16.58618467276904
					],
					[
					100.36834716796875,
					16.391296140878225
					],
					[
					100.5743408203125,
					16.551961721972525
					],
					[
					100.711669921875,
					16.87814699473217
					],
					[
					100.50018310546875,
					17.17228278169308
					],
					[
					100.10467529296875,
					17.159161602658134
					],
					[
					99.90966796875,
					16.954351461203945
					],
					[
					99.832763671875,
					16.58618467276904
					]
					]
					]
				}
			}
			]};

			var geoJsonTemp= {
				"type": "FeatureCollection",
				"features": []
			};

			L.mapbox.featureLayer(geoJsonPol)
			//.addTo(map);

			var pointFeatureLayer = L.mapbox.featureLayer()
			//.addTo(map);
			pointFeatureLayer.loadURL('../point_data2.geojson').on('ready',function(){
				geoJsonPoint = pointFeatureLayer.getGeoJSON();
				console.log(geoJsonPoint);
				var resGeojson = turf.within(geoJsonPoint, geoJsonPol);
				console.log(resGeojson);

				

				var circleJson = turf.circle([100,17], 60,100, 'kilometers', {});
				geoJsonTemp.features[0]=circleJson;
				L.mapbox.featureLayer(geoJsonTemp)
				.addTo(map);
				
				console.log(geoJsonTemp);
				
				var resGeojson = turf.within(geoJsonPoint,geoJsonTemp);
				console.log(resGeojson);
				var bound = L.mapbox.featureLayer(resGeojson).addTo(map).getBounds();
				map.fitBounds(bound);


			});

			




		</script>
	</body>
	</html>