const inputEl = document.getElementById('user-name') as HTMLInputElement | null;
const buttonEl = document.getElementById('user-name') as HTMLInputElement | null;
buttonEl.addEventListener('click', event => {
    event.preventDefault()
    console.log(inputEl?.value)
})

console.log(inputEl === null || inputEl === void 0 ? void 0 : inputEl.value);
