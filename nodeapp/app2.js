var express = require('express')
var cors = require('cors')
var morgan = require('morgan')
var mysql = require('mysql');
var turf = require('@turf/turf');
var md5 = require("./md5.min");


console.log(md5('aaaaa'))

var app = express()
app.use(cors())
//app.use(morgan())

app.use(express.static('html'))

bodyParser = require('body-parser'),
//app.use(bodyParser.urlencoded());


/**bodyParser.json(options)
 * Parses the text as JSON and exposes the resulting object on req.body.
 */
 app.use(bodyParser.json());


 var jsonFile = require('./data/house');

 var connection = mysql.createConnection({
 	host: 'localhost',
 	port:'3309',
 	user: 'root',
 	password: '1234',
 	database: 'geodata'
 });


 connection.query("truncate point",function(err,result){
 	if(err) throw err;
 });

 var row_insert =[];
 jsonFile.features.forEach(function(feature){

 	var coords = JSON.stringify(feature.geometry.coordinates);
	//var row_insert ={title: feature.properties.title,coordinates:coords};
	//connection.query("INSERT into point set  ?",row_insert);
	row_insert.push([feature.properties.title,coords])
	

 }); // end loop
 connection.query("INSERT into point  (title,coordinates) values ?",[row_insert]);


 app.get('/point',function(req,res){

 	var FeatureCollection =  {
 		"type": "FeatureCollection",
 		"name": "house",
 		"features":[]
 	};

 	connection.query("SELECT id,title,coordinates FROM point", function (err, result, fields) {
 		if (err) throw err;
 		result.forEach(function(row){
 			FeatureCollection.features.push({ 
 				"type": "Feature", 
 				"properties": { 
 					"title":row.title,
 					"marker-symbol":"warehouse",
 					"marker-color":"#7CFC00",
 					"marker-size":"small"
 				}, 
 				"geometry": { "type": "Point", "coordinates": JSON.parse(row.coordinates) } 
 			})
		});//end Loop
 		res.json(FeatureCollection);
 	});

 });

 app.post('/',function(req,res){


 	var obj = {"type": "Feature", "geometry": { "type": "Point", "coordinates":[] } };
 	obj.geometry.coordinates[0] = req.body.coords.lng;
 	obj.geometry.coordinates[1] = req.body.coords.lat;

 	res.json(obj);
 });

 app.get('/chart/:id',function(req,res){
 	
 	console.log(req.params.id)
 	var amp = req.params.id;
 	var data;
 	if(amp==9){
	 	data = [{
	 		name: 'DHF',
	 		data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
	 	}, {
	 		name: 'DF',
	 		data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
	 	}, {
	 		name: 'DSS',
	 		data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
	 	}, {
	 		name: 'Zika',
	 		data: [15000, 10000, 7988, 12169, 15112, 22452, 34400, 34227]
	 	}];
	 	
 	}else{
 		data = [{
	 		name: 'DHF',
	 		data: [43934, 52503, 57177, 58, 97031, 119931, 137133, 154175]
	 	}, {
	 		name: 'DF',
	 		data: [24916, 24064, 29, 29851, 32490, 30282, 38121, 40434]
	 	}, {
	 		name: 'DSS',
	 		data: [11744, 17722, null, null, 20185, 24377, 32147, 39387]
	 	}, {
	 		name: 'Zika',
	 		data: [15000, 10000, 7988, 12169, 15112, 22452, 34400, 34227]
	 	}];
 	}

 	res.json(data);

 	
 });

 app.post('/json',function(req,res){
 	var polygon = turf.featureCollection([req.body]);
 	
 	var points =  {
 		"type": "FeatureCollection",
 		"name": "house",
 		"features":[]
 	};

 	connection.query("SELECT id,title,dis,coordinates FROM house", function (err, result, fields) {
 		if (err) throw err;
 		result.forEach(function(row){
 			points.features.push({ 
 				"type": "Feature", 
 				"properties": { 
 					"title":row.title,
 					"marker-symbol":row.dis==1?"disability":"warehouse",
 					"marker-color":row.dis==1?"#B22222":"#7CFC00",
 					"marker-size":row.dis==1?"large":"medium"
 				}, 
 				"geometry": { "type": "Point", "coordinates": JSON.parse(row.coordinates) } 
 			})
		});//end Loop

		var data = turf.within(points, polygon);
		console.log(data.features)

 		res.json(data);
 		
 	});

 	
 })

/// end
app.listen(3000, function () {
	console.log('Example app listening on port 3000!')
})