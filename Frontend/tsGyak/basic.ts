let userName: string;
userName = "Erik";

let user1 = "Bela"

//user = {};

let user2: string = "Aladar"

function add(a: number, b: number) {
    return a + b;
}

let id: string | number;
id = 12;
id = "E21";

let hobbies = ['Sportok', 'Fozes']
//hobbies.push(12)

let users2: Array<string | number>;

let tuple: [number, number];
tuple = [1, 1]

//tuple = [2, 1, 43]

let user: {
    id: string | number;
    name: string;
    age: number;
    role: {
        id: string | number;
        desc: string;
    }
} = {
    id: 1,
    name: "Nigi",
    age: 32,
    role: {
        id: 1,
        desc: "Nigi"
    }
}

let val: {} = "szia"

let data: Record<string|symbol, string | number | boolean> = {}

enum Role {
    Admin,
    Editor,
    Guest
}

let userRole: Role = Role.Admin;

type RoleType = 'Admin' | 'Editor' | 'Guest' | 'Blocked';
let literalTuple: [1 | -1, 1 | -1]
literalTuple = [1, -1]
//literalTuple = [1, 2]

function access(role: RoleType): void {

}

type User = {
    id: string | number;
    name: string;
    age: number | string;
    role: RoleType;
    permission: string[];
}

let newUser: User = {
    id:1,
    name: "Bela",
    age: 22,
    role: "Editor",
    permission: ['edit']
}

function log(message:string): void { console.log(message); }

function logAndThrow(errorMessage:string): never {
    console.log(errorMessage);
    throw new Error(errorMessage);
}

//logAndThrow('error')

function logJob(cb: (msg: string) => void) {
    cb('szia');
}

logJob(log)

type UserData = {
    name: string;
    age: number;
    greet(): () => string | void;
}

let userData: UserData = {
    name: 'Bela',
    age: 22,
    greet() {
        return this.name;
    }
}

console.log(userData.greet());

let a: null | string | undefined;
a = null;
a = "szia";
a;