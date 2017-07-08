<!DOCTYPE html>
<html>
<head>
	<style>
		body { margin:0; padding:0; }
		#map { position:absolute; top:0; bottom:0; width:100%; }
	</style>
</head>
<body>
	<div id="map"></div>
	<script>
		function initMap() {
			var uluru = {lat: 16, lng: 100};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 4,
				center: uluru
			});
			map.data.loadGeoJson('location_petroleum.json');
			map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');
          
			map.data.setStyle(function(feature) {
				var RESINFO = feature.getProperty('RESINFO');
				var color;
				var color_line;
				if(RESINFO == 'gas'){
					color = 'blue';
					color_line = 'blue';
				}else if(RESINFO == 'oil'){
					color = 'red';
					color_line = 'red';
				}else if(RESINFO == 'oil and gas'){
					color = 'blue';
					color_line = 'red';
				}else if(RESINFO == 'no info'){
					color = 'gray';
					color_line = 'gray';
				}
				return {
					fillColor: color,
					strokeColor: color_line,
					strokeOpacity: 1,
					strokeWeight: 2
				};
			});
			

		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbiMiQFGG0YZrDP--XiSr45tPtizB3e84&callback=initMap">
</script>
</body>
</html>