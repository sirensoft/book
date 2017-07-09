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
		
	</style>
</head>
<body>
	<div id='map'></div>

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
		},
		{
			"type": "Feature",
			"properties": {
				"stroke":"#DC143C",
				"stroke-width":5
			},
			"geometry": {
				"type": "LineString",
				"coordinates": [
				[99.31640625,17.041029311689186],
				[99.931640625, 16.551961721972525 ], 
				[100.0140380859375, 16.836089974560213 ], 
				[100.3436279296875, 16.93070509876554 ], 
				[100.5084228515625, 16.75720789325807 ] 
				]
			}
		},

		{
			"type": "Feature",
			"properties": {
				"title":"I'm geojson polygon.",
				"stroke":"#fff",
				"stroke-width":4,
				"fill":"blue",
				"fill-opacity":0.5
			},
			"geometry": {
				"type": "Polygon",
				"coordinates": [
				[
				[
				100.0030517578125,
				16.36230951024085
				],
				[
				100.0360107421875,
				15.977172621632809
				],
				[
				100.5413818359375,
				16.06165029151658
				],
				[
				100.4095458984375,
				16.399200837347113
				],
				[
				100.0030517578125,
				16.36230951024085
				]
				]
				]
			}
		}

		];
		myLayer.setGeoJSON(geojsonPoint).addTo(map);


	</script>

</body>
</html>

