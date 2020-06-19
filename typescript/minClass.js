"use strict";
var minClass = /** @class */ (function () {
    function minClass() {
        this.list = [];
    }
    minClass.prototype.add = function (num) {
        this.list.push(num);
    };
    minClass.prototype.min = function () {
        var minNum = this.list[0];
        for (var i = 1; i < this.list.length; i++) {
            if (minNum > this.list[i]) {
                minNum = this.list[i];
            }
        }
        return minNum;
    };
    return minClass;
}());
var m = new minClass();
m.add(1);
m.add(10);
m.add(100);
m.add(12);
console.log(m.min());
