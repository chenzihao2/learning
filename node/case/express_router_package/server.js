var http = require('http');
var app =  require('./route');
http.createServer(app).listen(8888);
app.get('login', function(req, res) {
    console.log(req.body);
    res.end();
});
app.post('login', function(req, res) {
    console.log(req.body);
    res.end();
})  
