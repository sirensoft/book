var express = require('express')
var cors = require('cors')
var app = express()
app.use(cors())


var turf = require('turf');

var obj = require('./pol_data');

var geoJson = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "title":"Point 1","marker-color":"#7CFC00"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [99.9261474609375, 17.387337184561485] 
      }
    },
    {
      "type": "Feature",
      "properties": {"name":"Point-2","home":"1"},
      "geometry": {
        "type": "Point",
        "coordinates": [100.2557373046875, 16.836089974560213 ]
      }
    },
    {
      "type": "Feature",
      "properties": {"title":"หมุด 3","marker-color":"#7CFC00"},
      "geometry": {
        "type": "Point",
        "coordinates": [99.5855712890625, 16.536164463838773 ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [100.2886962890625, 16.50456606887792 ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [99.4976806640625, 17.214264312027566 ]
      }
    }
  ]
};

app.get('/', function (req, res) {
  res.send('Hello World!')
})

app.get('/geo', function (req, res) {
	res.json(geoJson)
})

app.get('/point',function(req,res){
	var point = turf.point([100, 16.1984])
	res.json(point)
})

app.get('/file',function(req,res){
	
	res.json(obj)
})
  


app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})