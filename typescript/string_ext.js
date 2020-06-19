function c(val) {
    var others = [];
    for (var _i = 1; _i < arguments.length; _i++) {
        others[_i - 1] = arguments[_i];
    }
    console.log(val, others.join(","));
}
console.log("\uD842\uDFB7");
//for (let val of 'foo') {
//    console.log(val);
//}
function log(x, y) {
    if (y === void 0) { y = 'world'; }
    c(x, y, y, x);
}
log('HELLO');
c(log.name);
