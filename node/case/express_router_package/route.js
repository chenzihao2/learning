var url = require('url');
var Server=function() {
    var G = this;//全局变量
    this._get = {

    };
    this._post = {

    };
    var app = function(req, res) {
        var pathname = url.parse(req.url).pathname.substr(1);
        var method = req.method.toLowerCase();
        if(G['_' + method][pathname]) {
            if (method == 'post') {
                var postStr = '';
                req.on('data', function(chunk) {
                    postStr += chunk;
                });
                req.on('end', function(e, chunk) {
                    req.body = postStr.toString();
                    G['_' + method][pathname](req, res);
                })
            } else {
                G['_' + method][pathname](req, res);
            }
        }
    }
    app.get = function(action, callback) {
        G._get[action] = callback;
    }
    app.post = function(action, callback) {
        G._post[action] = callback;
    }
    return app;
}

module.exports=Server();
