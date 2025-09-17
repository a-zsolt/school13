// let object = {
//     id: 1,
//     name: "John Doe",
//     age: 25,
//     gender: "male",
//     say: ()=>{
//         console.log("szia");
//     },
//     say2: function (){
//         console.log("Hello")
//     }
// }
// object.isStudent = false;
// console.log(object)
// console.log(object["name"])
// console.log(object.name)
// object.say();
// object.say2();
// for (const objectKey in object) {
//     console.log(objectKey)
// }
// console.log('------------------------------------------------------------------------')
// for (const objectElement of Object.keys(object)) {
//     console.log(objectElement)
// }
// console.log('------------------------------------------------------------------------')
// for (const objectElement of Object.values(object)) {
//     console.log(objectElement)
// }
// console.log('------------------------------------------------------------------------')
// for (const objectElement of Object.entries(object)) {
//     console.log(objectElement)
// }
// Shallow copy vs Deep copy
let form = document.querySelector('form');

let formSubmit = document.querySelector('#submit');

/**
 * Collects the data form the form.
 */
formSubmit.addEventListener('click', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form).entries());
    let container = document.querySelector('.container');
    let keys = ["Keresztnev", 'Vezeteknev', 'Email', 'Jelszo', 'Jelszo2']
    createTable(data, container, keys)
})

/**
 * Calls the table creation functions
 * @param {Object} data Form data
 * @param {*} container Html container name 
 * @param {Array} keys Form kulcsai
 */
const createTable = (data, container, keys) => {
    let table = document.createElement('table');
    table.appendChild(createTableHead(keys))
    table.appendChild(createTBody(data));
    container.appendChild(table);
}
/**
 * Creates the table head and fills it with the keys from the form.
 * @param {Object} data Form data
 * @returns 
 */
const createTableHead = (data) => {
    let tableHead = document.createElement('thead');
    let tr = document.createElement('tr');
    for (let i = 0; i < data.length; i++) {
        tr.appendChild(createTh(data[i]))
    }
    tableHead.appendChild(tr);
    return tableHead;
}
/**
 * Fills in the data for the table headers
 * @param {Object} data Form data
 * @returns 
 */
const createTh = (data) => {
    let th = document.createElement('th');
    th.textContent = data;
    return th;
}

const createTBody = (data) => {
    let tbody = document.createElement('tbody');
    let tr = document.createElement('tr');
    for (let element of Object.values(data)) {
        tr.appendChild(createTd(element))
    }
    tbody.appendChild(tr);
    return tbody;
}

const createTd = (data) => {
    let td = document.createElement('td');
    td.textContent = data;
    return td;
}