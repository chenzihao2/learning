var fs = require('fs');
var util = require('util');
var c = function(val) {
    console.log(val);
}
//fs.stat 检测是文件还是目录
fs.stat('../node', function(e, status) {
        if (e) {
            console.log(e);
        }
        //c(util.inspect(status));
        //c(status.isFile());
        //c(status.isDirectory());
    });

/*
fs.mkdir 创建目录
fs.mkdir(path, mode,callback);
path    目录路径
mode    权限 默认0777
*/

//fs.mkdir('../test',0000,function(e) {
//    if (e) {
//        c(e);
//    }
//})





/*
 * fs.writeFile 创建写入文件
 * @params filenmae
 * @params data
 */
fs.writeFile('w.txt', 'hello world',function(){

});

/*
 * fs.appendFile 追加内容
 * @params filenmae
 * @params data
 */

fs.appendFile('w.txt', '追加的', function() {

});

/*
 * fs.readFile 读取文件
 * @params filename
 * 读取出来的是buffer
 */

fs.readFile('w.txt', function(e, data) {
    c(data.toString());

})

/*
 * fs.readdir 读取目录
 * @params path
 * 读取出当前目录下的目录和文件
 */

fs.readdir('../node', function(e, data) {
    c(data);
})

/*
 * fs.rename() 修改文件名 或 剪切
 * @params old_filename
 * @params new_filename
 */

fs.rename('w.txt', '../w.txt', function() {

})

/*
 * fs.rmdir() 删除目录
 * @params path
 */

/*
 * fs.unlink() 删除文件
 * @params filename
 */

fs.unlink('../w.txt', function() {

})

/*
 * fs.createReadStream(); 创建文件流
 * @params 文件名
 */
var str = '';
var readStream = fs.createReadStream('input.txt');
//读到一块内容 就会以data事件返回
readStream.on('data', function (chunk) {
    str += chunk;
})
//读完以后触发end事件
readStream.on('end', function() {
    c(str);
})
//出错后触发error



/*
 * fs.createWriteStream(); 创建写入流
 * @params filename
 */

var writeStream = fs.createWriteStream('input.txt');
for ( var i=0; i<1000; i++) {

writeStream.write('123','utf-8');
}
writeStream.end();//标记写入完成
//finish事件只有在标记写入完成后才会触发

//通过管道pip 将读取流内容写入进写入流
readStream.pip(writeStream);























