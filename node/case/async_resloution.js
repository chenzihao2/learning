var fs = require('fs');
var events = require('events');
var eventE = new events.EventEmitter();
var c = function(val) {
    console.log(val);
}

c(1);
function getMime(callback) {
    fs.readFile('mime.json',function(e,data) {
        eventE.emit('mime',data);
        callback(data);
        c(2);
    })
}

//1  3  data 2
//
//
//回掉函数处理异步
var da = getMime(function(result) {
    return result.toString();
});
c(3);

//事件驱动处理异步
eventE.on('mime',function(data) {
    c(data);
})

