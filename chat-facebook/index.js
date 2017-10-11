var express = require('express');
var bodyParser = require('body-parser');
var request = require('request');
var app = express();
 
app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());
app.listen((process.env.PORT || 8080)); // Indispensable colocar el puerto 8080 para correr la aplicación en heroku