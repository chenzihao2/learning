//var fs = require('fs');
//var getMime = function (fs, extname) {
//    fs.readFile('./mime.json', function (e, data) {
//        if (e) {
//            console.log(e);
//        }
//        data = JSON.parse(data.toString());
//        //console.log(data[extname]);
//        return data[extname];
//    })
//}
//console.log(d); //这里是undefined 异步处理的原因 function回调里的代码和这里是同时执行的
//修改为同步
var getMime = function(fs, extname) {
    var file = fs.readFileSync('./mime.json');
    file = JSON.parse(file.toString());
    return file[extname];
}
exports.getMime = getMime;
//var d = getMime(fs,'.html');
//console.log(d);
