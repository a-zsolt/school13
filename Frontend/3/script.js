// const name = document.getElementById("fullName")
// const email = document.getElementById("email")
// const age = document.getElementById("age")
// const prog = document.getElementById("selectedProg")
const reqirement = document.getElementById("reqirement")
// const submit = document.getElementById("submit")

let form = document.querySelector('form');

let formSubmit = document.querySelector('#submit');

formSubmit.addEventListener('click', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form).entries());
    let container = document.querySelector('#inputs');
    console.log(data)
    checkFill(data, container)
})

function checkFill(data, container) {
    let empty = false;

    let values = Object.values(data);
    
    for (let i = 0; i < values.length; i++) {
        if (values[i].length === 0) {
            empty = true
        }
    }

    if (!reqirement.checked) {
        empty = true
    }

    error(container, empty)

    if (!empty) {
        showData(data, container)
    }
}

function error(container, empty) {
    const error =  document.getElementById('errorDiv');

    console.log(error);

    const isThereDataShown =  document.getElementById('showDataList');

    if (empty) {
        if (error === null) {
            let errorDiv = document.createElement('div');
            errorDiv.setAttribute("id", "errorDiv");
            errorDiv.className = "p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3"
            errorDiv.innerHTML = "Nem lehet üres mező vagy checkbox!"
            container.appendChild(errorDiv);

            if (isThereDataShown != null){
                container.removeChild(isThereDataShown)
            }
        }
    } else{
        if (error != null) {
            container.removeChild(error)
        }
    }
}

function showData(data, container) {
    const isThereDataShown =  document.getElementById('showDataList');
    if (isThereDataShown === null) {
        let list = document.createElement('ul');
        list.setAttribute("id", "showDataList");
        list.className = "p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3"
        container.appendChild(list)
        
        let keys = Object.keys(data);
        let values = Object.values(data);
        console.log(keys);
        console.log(values);
        
        for (let i = 0; i < keys.length; i++) {
            let text = `${keys[i]}: ${values[i]}`
            createLi(text, list)
        }
    }

}

function createLi(text, list){
    let element = document.createElement('li')
    element.innerHTML = text;
    list.appendChild(element)
}