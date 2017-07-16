var express = require('express')
var cors = require('cors')
var morgan = require('morgan')
var mysql = require('mysql');

var app = express()
app.use(cors())
app.use(morgan())

app.use(express.static('html'))

 bodyParser = require('body-parser'),

app.use(bodyParser.urlencoded({
    extended: true
}));

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
/// end
app.listen(3000, function () {
	console.log('Example app listening on port 3000!')
})