function sum(a:number|string, b:number|string): number|string {
    if (typeof a === 'number' && typeof b === 'number') {
        return a + b;
    }
    return String(a) + String(b);
}

function welcomeText(name: string, lang?: string): string {
    if (!lang || lang == "hu" ) {
        return `Üdv ${name}`;
    }

    return `Welcome ${name}`;
}

type UserId = number | string;

let UserId = 1234;

function user(UserId: UserId): string {
    return `User ID is: ${UserId}`;
}

function lenOrMultiply(value: number | string): number{
    if (typeof(value) === "number") {
        return Number(value * 2);
    }

    return value.length;
}

function multiplyArray(numbers: Array<number>): Array<number> {
    let multNumbers = new Array<number>();

    numbers.forEach(number => {
        multNumbers.push(number * 2);
    })

    return multNumbers;
}

enum StatusCode {
    Success = 400,
    NotFound = 404,
    ServerError = 500
}

function enumError(code: StatusCode) {
    return StatusCode[code];
}

class Rectangle {
    private width: number;
    private height: number;

    constructor(width: number, height: number) {
        this.width = width;
        this.height = height;
    }

    public getArea() {
        return this.width * this.height;
    }

    public getPerimiter() {
        return (this.width + this.height) * 2;
    }
}

// 8. feladat:
function first<T>(items: T[]): T | undefined {
    if (items.length === 0) {
        return undefined;
    } else {
        return items[0];
    }
}

first([1, 2, 3, 4]);
first(["a", "b", "c"]);
first([]);

// 10. feladat

interface Logger {
    log(msg:string):void;
}

class ConsoleLogger implements Logger {
    log(msg:string): void {
        console.log(msg);
    }
}

const logger = new ConsoleLogger();
logger.log("Hello");
