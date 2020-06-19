var http = require('http');
var url = require('url');
http.createServer(function(req, res) {
    var path = url.parse(req.url).pathname.substr(1);
    res.writeHead(200,{
        'Content-Type' : 'text/html'
    })
    if (path != 'favicon.ico') {
        try{
            app[path](path,res);
        } catch{
            
        }
    }
}).listen(8888);
var app = {
    login:function(req, res) {
        console.log(req);
        res.end();
    },
    
    register:function(req, res) {

        console.log(req);
    }
}
