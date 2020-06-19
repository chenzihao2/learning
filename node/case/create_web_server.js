var http = require('http');
var fs = require('fs');
var path = require('path');
var url = require('url');
var getMime = require('./getMime');
http.createServer(onReq).listen(8888);
const dir = 'static/';
function onReq(req, res) {
    var pathname = req.url;
    if (pathname == '/') {
        pathname = index.html;
    }
    if (pathname != '/favicon.ico') {
        var pathname = url.parse(pathname).pathname;
        var filename = dir + pathname;
        fs.readFile(filename, function(e, data) {
            if (e) {
                res.writeHead(404, {
                    'Content-Type' : 'text/html'
                });
                fs.readFile(dir + '404.html', function (e_404, data_404) {
                    if (e_404) {
                        res.end('404');
                    };
                    res.end(data_404);
                })
            } else {
                var ext = path.extname(filename);
                var mime = getMime.getMime(fs, ext);
                var head = {
                    'Content-Type' :  mime
                };
                //console.log(head);
                //if (ext == '.html') {
                //    res.writeHead(200,{ 'Content-Type' : 'text/html;charset=utf-8' });
                //}
                //if (ext == '.css') {
                //    res.writeHead(200,{ 'Content-Type' : 'text/css;charset=utf-8' });
                //}     
                res.writeHead(200, head)
                res.write(data);
                res.end();//结束
            }
        })
    }
}

