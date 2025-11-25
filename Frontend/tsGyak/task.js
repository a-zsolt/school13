function sum(a, b) {
    if (typeof a === 'number' && typeof b === 'number') {
        return a + b;
    }
    return String(a) + String(b);
}
function welcomeText(name, lang) {
    if (!lang || lang == "hu") {
        return "\u00DCdv ".concat(name);
    }
    return "Welcome ".concat(name);
}
var UserId = 1234;
function user(UserId) {
    return "User ID is: ".concat(UserId);
}
function lenOrMultiply(value) {
    if (typeof (value) === "number") {
        return Number(value * 2);
    }
    return value.length;
}
function multiplyArray(numbers) {
    var multNumbers = new Array();
    numbers.forEach(function (number) {
        multNumbers.push(number * 2);
    });
    return multNumbers;
}
var StatusCode;
(function (StatusCode) {
    StatusCode[StatusCode["Success"] = 400] = "Success";
    StatusCode[StatusCode["NotFound"] = 404] = "NotFound";
    StatusCode[StatusCode["ServerError"] = 500] = "ServerError";
})(StatusCode || (StatusCode = {}));
function enumError(code) {
    return StatusCode[code];
}
var Rectangle = /** @class */ (function () {
    function Rectangle(width, height) {
        this.width = width;
        this.height = height;
    }
    Rectangle.prototype.getArea = function () {
        return this.width * this.height;
    };
    Rectangle.prototype.getPerimiter = function () {
        return (this.width + this.height) * 2;
    };
    return Rectangle;
}());
// 8. feladat:
function first(items) {
    if (items.length === 0) {
        return undefined;
    }
    else {
        return items[0];
    }
}
first([1, 2, 3, 4]);
first(["a", "b", "c"]);
first([]);
var ConsoleLogger = /** @class */ (function () {
    function ConsoleLogger() {
    }
    ConsoleLogger.prototype.log = function (msg) {
        console.log(msg);
    };
    return ConsoleLogger;
}());
var logger = new ConsoleLogger();
logger.log("Hello");
