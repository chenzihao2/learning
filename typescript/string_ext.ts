function c(val:any, ...others:any[]):void {
    console.log(val, others.join(","));
}
console.log("\uD842\uDFB7");
//for (let val of 'foo') {
//    console.log(val);
//}
function log(x, y = 'world') {
    c(x, y, y, x);
}
log('HELLO');
