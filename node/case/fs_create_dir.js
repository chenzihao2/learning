var fs = require('fs');
var c = function(val) {
    console.log(val);
}

//判断目录是否存在 不存在则创建
fs.stat('upload', function(e, stat) {
    if (e) {
        fs.mkdir('upload', function(er) {
            if (er) {
                c(er);
            } else {
                c('创建成功');
            }
        })
    }
    //如果是文件，删除文件，再创建目录
})


//找出目录下的所有目录 并打印出来

var filesArr = [];
fs.readdir('../../node', function(e, files) {
    if (e) {
        c(e);
    }
    //c(files[0]);return;
    //for(var i =0; i<files.length; i++) {
        //fs.stat(files[i], function(er, stat) {
        //    c(files[i]);
        //})
        //异步 错误
    //}
    (function getFile(i) {
        if (i == files.length) {
            setTimeout(function() {
               c(filesArr);
            }, 0);
             //c(filesArr);
            //c(i);
        } else {
        fs.stat('../' + files[i], function(er, stat) {
            if (er) {
                c(er);
            }
            if (stat.isDirectory()) {
                filesArr.push(files[i]);
            }
        })
        getFile(i+1);
        }
    })(0)
})

