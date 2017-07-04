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
	<div id='map'></div>
	<script>
		L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
		var map = L.mapbox.map('map', 'mapbox.streets');
		map.setView([16.00,100.00],6);
		var marker= L.marker([16.012453, 100.136455],{
			draggable:true,
			icon : L.mapbox.marker.icon({
        	'marker-size': 'large',// small,medium,large   
        	'marker-symbol':'h',    // a-z
        	'marker-color': '#00BFFF'// color hex value
        })
		});
	marker.bindPopup("Hello I'm Marker");
	marker.addTo(map); 

	var ic_house = L.icon({
		iconUrl: 'icon/house.png',	
		iconSize: [40,40],	
		popupAnchor: [0, -15],
	});
	var marker2 = L.marker([16.321456,100.214577],{
		icon : ic_house
	}).bindPopup("I'm Marker2.");
	marker2.addTo(map);

	var marker3 = L.marker([16,100],{
		draggable :'true'
	}).addTo(map);
	marker3.on('dragend',function(e){
		alert(marker3.getLatLng());
	});

</script>
</body>
</html>