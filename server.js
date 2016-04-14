var app = require('http').createServer(handler);
var io = require('socket.io').listen(app);
var fs = require('fs');
var bb = require('bonescript');

var htmlPage = 'index.html';

app.listen(8085);

function handler(req, res) {
    fs.readFile(htmlPage, function(err, data) {
        if (err) {
            res.writeHead(500);
            return res.end('Error loading file: ' + htmlPage);
        }
        res.writeHead(200);
        res.end(data);
    });
}