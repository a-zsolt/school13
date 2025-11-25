var userName;
userName = "Erik";
var user1 = "Bela";
//user = {};
var user2 = "Aladar";
function add(a, b) {
    return a + b;
}
var id;
id = 12;
id = "E21";
var hobbies = ['Sportok', 'Fozes'];
//hobbies.push(12)
var users2;
var tuple;
tuple = [1, 1];
//tuple = [2, 1, 43]
var user = {
    id: 1,
    name: "Nigi",
    age: 32,
    role: {
        id: 1,
        desc: "Nigi"
    }
};
var val = "szia";
var data = {};
var Role;
(function (Role) {
    Role[Role["Admin"] = 0] = "Admin";
    Role[Role["Editor"] = 1] = "Editor";
    Role[Role["Guest"] = 2] = "Guest";
})(Role || (Role = {}));
var userRole = Role.Admin;
var literalTuple;
literalTuple = [1, -1];
//literalTuple = [1, 2]
function access(role) {
}
var newUser = {
    id: 1,
    name: "Bela",
    age: 22,
    role: "Editor",
    permission: ['edit']
};
function log(message) { console.log(message); }
function logAndThrow(errorMessage) {
    console.log(errorMessage);
    throw new Error(errorMessage);
}
//logAndThrow('error')
function logJob(cb) {
    cb('szia');
}
logJob(log);
var userData = {
    name: 'Bela',
    age: 22,
    greet: function () {
        return this.name;
    }
};
console.log(userData.greet());
var a;
a = null;
a = "szia";
a;
