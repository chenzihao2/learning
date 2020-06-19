var http = require('http');
var url = require('url');
http.createServer(function(req, res) {
    var path = url.parse(req.url).pathname.substr(1);
    res.writeHead(200,{
        'Content-Type' : 'text/html'
    })
    if (path != 'favicon.ico') {
        try{
            app(path,res);
        } catch(e){
            console.log(e); 
        }
    }
}).listen(8888);
//var app = {
//    login:function(req, res) {
//        console.log(req);
//        res.end();
//    },
//    
//    register:function(req, res) {
//
//        console.log(req);
//    },
//    get:function(action, function(req, res) {
//
//    })
//
//}
var G = {

};
var app = function(req, res) {
    if (G['login']) {
        G['login'](req, res);
    } else {
        console.log('123');
    }
}

app.get = function(action, callback) {
    G[action] = callback;
}

//app.get('login',function(req, res) {
//    console.log(req);
//})
