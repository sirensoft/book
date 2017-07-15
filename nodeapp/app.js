var express = require('express')
var cors = require('cors')
var morgan = require('morgan')
var app = express()
app.use(cors())
app.use(morgan())


var turf = require('@turf/turf');

var obj = require('./data/pol_data');

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
      "properties": {"name":"Point-2","home":"1","marker-color":"#DC143C"},
      "geometry": {
        "type": "Point",
        "coordinates": [100.2557373046875, 16.836089974560213 ]
      }
    },
    {
      "type": "Feature",
      "properties": {"title":"หมุด 3","marker-color":"#0000FF"},
      "geometry": {
        "type": "Point",
        "coordinates": [99.5855712890625, 16.536164463838773 ]
      }
    },
    {
      "type": "Feature",
      "properties": {"marker-color":"#7CFC00"},
      "geometry": {
        "type": "Point",
        "coordinates": [100.2886962890625, 16.50456606887792 ]
      }
    },
    {
      "type": "Feature",
      "properties": {"marker-color":"#DC143C"},
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
  var collection = turf.featureCollection([point])
	res.json(point)
  //res.json(collection)
})

app.get('/file',function(req,res){
	
	res.json(obj)
})


//test

app.get('/test1',function(req,res){
	var json = {"cid":114477,"name":"อุเทน"};
	res.json(json)
});

app.get('/test2',function(req,res){
  
   var circle_feature= turf.circle([100, 16.1984],60,100,'kilometers');
   circle_feature_collection = turf.featureCollection([circle_feature]);
   res.json(circle_feature_collection);
});


app.get('/near',function(req,res){
  var my_point = {  
  "geometry": {
    "type": "Point",
    "coordinates": [100.373486, 16.836126]
  }
};
var against = {
  "type": "FeatureCollection",
  "features": [
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.373486, 16.836126 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.373968, 16.836193 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.374496, 16.835554 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.373921, 16.835665 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.374799, 16.836701 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.372484, 16.83493 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376531, 16.837182 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377478, 16.83733 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377284, 16.837027 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376042, 16.837198 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376407, 16.836483 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376593, 16.83606 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376935, 16.836495 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377012, 16.836095 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377164, 16.835796 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.376795, 16.835664 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377517, 16.836157 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377909, 16.836468 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377913, 16.836631 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377583, 16.836817 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.377467, 16.836374 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.378236, 16.836871 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.378286, 16.83653 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.378271, 16.836308 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.378294, 16.836145 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.378364, 16.83585 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.375696, 16.836786 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.375226, 16.836646 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.37511, 16.836879 ] } },
{ "type": "Feature", "properties": { }, "geometry": { "type": "Point", "coordinates": [ 100.37556, 16.837341 ] } }
]
};
  var nearest_point = turf.nearest(my_point, against);
  against.features.forEach(function(p){
     var d = turf.distance(p, my_point, "kilometers")
     console.log(p.geometry.coordinates+" to "+my_point.geometry.coordinates+" ="+d+"km");
  });
 
});

app.get('/map/:id',function(req,res){
  res.send(req.params.id)  
});

//end test







/// end
app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})