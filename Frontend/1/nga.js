const lista = document.getElementById("lista");
const szamok = document.getElementById("szamok");

let gyum = ["Alma", "Banááán", "Banááán", "Banááán", "Banááán"];

for (let i = 0; i < gyum.length; i++) {
  let elem = document.createElement("li");
  elem.innerHTML = gyum[i];
  lista.appendChild(elem);
}

//let vanB = false;

// while (vanB === false & x <= gyum.length){
//     if (gyum[x] === "Banááán") {
//         vanB = true
//     }
//     x++
// }

// if (vanB) {
//     parr.innerHTML = "Van banán!"
// } else{
//     parr.innerHTML = "Nincs banáán :c"
// }

function bananolas(array, kerE) {
  let x = 0;

  while (x < array.length && array[x] !== kerE) {
    x++;
  }

  let parr = document.createElement("p");
  if (x < array.length) {
    parr.innerHTML = `Van ${kerE}!`;
  } else {
    parr.innerHTML = `Nincs ${kerE} :c`;
  }
  lista.appendChild(parr);
}

bananolas(gyum, "Banááán");




/**
 * 
 * @param {number} min The possible smallest number generated
 * @param {number} max The possible largest number generated
 * @returns A random number
 */
function randomN(min, max){
  return Math.floor(Math.random() * (max - min + 1) + min)
}

/**
 * 
 * @param {number} db The number of randoms generated
 */
const listaa = (db) => {
  let szamok = new Array(db)
  for (let i = 0; i < szamok.length; i++) {
    szamok[i] = randomN(8, 8000)    
  }

  return szamok;
}

/**
 * 
 * @param {array} lista The list that gets generated in html
 * @param {string} typeshi The type of list
 */
const ulbe = (lista, typeshi) => {
  let olul = document.createElement(typeshi);
  szamok.appendChild(olul)
  for (let i = 0; i < lista.length; i++) {
    let li = document.createElement("li")
    li.innerHTML = lista[i]
    olul.appendChild(li)
  }
}

ulbe(listaa(400), "ul")


/* 
 * map, set
 * query selector
 * inner html v inner text v text content
 * append v appendChild
 */