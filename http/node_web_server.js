const http = require('http');

http.createServer(function (request, response) {
    console.log('request come', request.url)
    response.end('end')
}).listen(8888)

console.log('server start')
