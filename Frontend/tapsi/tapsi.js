const fullumData = Array.from({ length: 20 }, (_, index) => {
	const value = Math.floor(Math.random() * 10000) + 1;

	return {
		id: index + 1,
		value: value,
		type: value % 2 === 0 ? "Páros" : "Páratlan",
		category:
			value < 3000
				? "szegények pénze"
				: value >= 3000 && value <= 6000
				? "középoszály pénze"
				: "gazdagok pénze",
	};
});

const form = document.querySelector("#filter");

function showFilters() {
	let filters = ["Kategória szűrés:", "Minimum érték:", "Maximum érték:"];

	let formGroup = document.createElement("div");
	formGroup.classList = "input-group";
	form.appendChild(formGroup);

	for (let i = 0; i < filters.length; i++) {
		let katText = document.createElement("lable");
		katText.classList = "input-group-text";
		katText.innerHTML = filters[i];
		formGroup.appendChild(katText);
	}

	const lables = document.querySelectorAll(".input-group-text");

	let type = ["select", "number", "number", "submit"];
    let name = ["kat", "min", "max", ""]
	let text = ["", "Pl. 1000", "Pl. 5000", "Szűrés alkalmazása"];
	let options = [
		"összes",
		"szegények pénze",
		"középoszály pénze",
		"gazdagok pénze",
	];

	for (let i = 0; i < type.length; i++) {
		if (type[i] === "select") {
			let select = document.createElement("select");
			select.classList = "form-select";
            select.setAttribute("name", name[i])

			if (i + 1 < lables.length) {
				lables[i].after(select);
			} else {
				formGroup.appendChild(select);
			}

			for (let y = 0; y < options.length; y++) {
				let option = document.createElement("option");
				option.setAttribute("value", options[y]);
				option.innerHTML = options[y];
				select.appendChild(option);
			}
		} else {
			let input = document.createElement("input");
			input.setAttribute("type", type[i]);

			if (type[i] === "button" || type[i] === "submit") {
				input.classList = "btn btn-primary";
				input.setAttribute("value", text[i]);
				input.setAttribute("id", type[i]);
			} else {
				input.setAttribute("placeholder", text[i]);
                input.setAttribute("name", name[i])
				input.classList.add("form-control");
			}

			if (i + 1 < lables.length) {
				lables[i].after(input);
			} else {
				formGroup.appendChild(input);
			}
		}
	}
}

function fillTable(data) {
	const body = document.getElementById("body");

	for (let i = 0; i < data.length; i++) {
		let tr = document.createElement("tr");
		body.appendChild(tr);
		console.log(data[i]);
		let y = 0;

		for (const fullumValue in data[i]) {
			if (y === 0) {
				let idTh = document.createElement("th");
				idTh.setAttribute("scope", "row");
				idTh.innerHTML = data[i][fullumValue];
				tr.appendChild(idTh);
			} else {
				let td = document.createElement("td");
				td.innerHTML = data[i][fullumValue];
				tr.appendChild(td);
			}

			y++;
		}
	}
}

showFilters();
const formSubmit = document.querySelector("#submit")

formSubmit.addEventListener('click', (e) => {
    e.preventDefault()
    const filters = Object.fromEntries(new FormData(form).entries());
    console.log(filters);
    
})



fillTable(fullumData);
