var express = require('express')
var cors = require('cors')
var morgan = require('morgan')
var mysql = require('mysql');

var app = express()
app.use(cors())
app.use(morgan())


var jsonFile = require('./data/house');

var connection = mysql.createConnection({
	host: 'localhost',
	port:'3309',
	user: 'root',
	password: '1234',
	database: 'geodata'
});

connection.connect(function(err) {
	if (err) 
		throw err
	else {
		
		
		connection.query("truncate point",function(err,result){
			if(err) throw err;
		});

		jsonFile.features.forEach(function(feature){

			var coords = JSON.stringify(feature.geometry.coordinates);
			var row_insert  = {title: feature.properties.title,coordinates:coords};

			connection.query("INSERT into point  SET ?",row_insert);

       	}); // end loop
		
	}
});

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
				"properties": { "title":row.title+"ok","marker-symbol":"warehouse","marker-color":"#7CFC00","marker-size":"small"}, 
				"geometry": { "type": "Point", "coordinates": JSON.parse(row.coordinates) } 
			})
		});//end Loop
		res.json(FeatureCollection);
	});

});
/// end
app.listen(3000, function () {
	console.log('Example app listening on port 3000!')
})