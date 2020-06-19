var http = require('http');

var ser = function (request, response) {
    response.writeHead(200, { 'Content-Type' : 'text/plain'});
    response.end('YES');
}
http.createServer(ser).listen(8888);
