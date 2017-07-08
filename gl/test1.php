<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<div id='map'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZmFyYWRheTIiLCJhIjoiY2l1c2Q3NWU3MDBkbTJ5cWowczBvbjhsZiJ9.OjMt4z15E_Mhbn1Fwe4bHg';
var map = new mapboxgl.Map({
    style: 'mapbox://styles/faraday2/ciq3sorzs000qb1lxu41eavgf',
    center: [-111.9, 40.7135],
    zoom: 6,
    pitch: 60,
    bearing: 210,
    container: 'map'
});

map.on('load', function() {
  map.addSource('usa_hexes', {
    'type': 'vector',
    'url': 'mapbox://faraday2.usa_hexes'
  });
  
  map.addLayer({
    'id': 'hexes',
    'source': 'usa_hexes',
    'source-layer': 'usa_hexes',
    'type': 'fill',
    'minzoom': 3,
    'paint': {
      'fill-color': {
        'property': 'count',
        'stops': [
          [0, '#8C146D'],
          [100, '#844A55'],
          [500, '#837745'],
          [3000, '#89A539'],
          [10000, '#97DA37'],
          [30000, '#A4FD3C']
        ]
      },
      //'fill-pattern': 'circle-11',
      'fill-extrude-base': 0,
      'fill-extrude-height': {
        'property': 'count',
        'stops': [[0,10],[500,1000],[3000,10000],[35000,1000000]],
        'base': 1
      },
      'fill-opacity': .65
    }
  }, 'admin-2-boundaries');
});

map.addControl(new mapboxgl.NavigationControl());
</script>

</body>
</html>