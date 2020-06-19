"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
function demo() {
    var a = 1;
    var b = 2;
    if (a) {
        var c_1 = 3;
    }
    //console.log(c); //let 块区域内有效 error
}
var color;
(function (color) {
    color[color["red"] = 3] = "red";
    color[color["green"] = 4] = "green";
    color[color["yellow"] = 5] = "yellow";
})(color || (color = {}));
;
var c = color.red;
var Animal = /** @class */ (function () {
    function Animal() {
    }
    Animal.eat = function (value) {
        console.log("" + this.names + '吃' + ("" + value));
    };
    return Animal;
}());
function demoT(params) {
    return params;
}
demoT('123');
var Da = /** @class */ (function () {
    function Da() {
    }
    Da.prototype.Add = function (info) {
        return undefined;
    };
    Da.prototype.Delete = function (info) {
        return undefined;
    };
    Da.prototype.Delete = function (info) {
        return undefined;
    };
    return Da;
}());
var UserInfo = /** @class */ (function () {
    function UserInfo() {
    }
    return UserInfo;
}());
var UserData = /** @class */ (function (_super) {
    __extends(UserData, _super);
    function UserData() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    return UserData;
}(Da));
this.Add;
console.log(c);
