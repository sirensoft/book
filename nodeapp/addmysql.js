var express = require('express')
var cors = require('cors')
var morgan = require('morgan')
var mysql = require('mysql');

var app = express()
app.use(cors())
app.use(morgan())


var obj = require('./data/house');

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
		
		
		connection.query("truncate data_json",function(err,result){
			if(err) throw err;
		});
		obj.features.forEach(function(feature){
       			
       		var coords = JSON.stringify(feature.geometry.coordinates);
       		var values  = {title: feature.properties.title,coordinates:coords};
       		

       		connection.query("INSERT into data_json  SET ?",values);

       	}); // end loop
		
	}
});

app.get('/point',function(req,res){

	var data = [];
	connection.query("SELECT id,title,coordinates FROM data_json", function (err, result, fields) {
    if (err) throw err;
   
   		result.forEach(function(feature){
   			data.push({ 
  				"type": "Feature", 
  				"properties": { "title":feature.title,"marker-symbol":"warehouse"}, 
  				"geometry": { "type": "Point", "coordinates": JSON.parse(feature.coordinates) } 
  			})
   		});
   		res.json(data)
  	});

  
  	

  
	

});



/// end
app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})