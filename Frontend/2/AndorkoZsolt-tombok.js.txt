function evenNumbers(list) {
  let evens = [];

  for (let i = 0; i < list.length; i++) {
    if (list[i] % 2 == 0) {
      evens.push(list[i]);
    }
  }

  return evens;
}

function sumList(list) {
  let sum = 0;

  for (let i = 0; i < list.length; i++) {
    sum += list[i];
  }

  return sum;
}

function secificWordCounter(word, list) {
  let count = 0;

  for (let i = 0; i < list.length; i++) {
    if (word === list[i]) {
      count++;
    }
  }

  return count;
}

function multiTable(number) {
  let multi = [];

  for (let i = 1; i <= 10; i++) {
    multi.push(i * number);
  }

  return multi;
}

function largestNum(list) {
  let largest = 0;

  for (let i = 0; i < list.length; i++) {
    if (list[i] > largest) {
      largest = list[i];
    }
  }

  return largest;
}

function intoIncreasing(list) {
  return list.toSorted((a, b) => a - b);
}

function palindrom(list) {
  let palindroms = [];

  for (let i = 0; i < list.length; i++) {
    let wordR = "";

    for (let y = list[i].length - 1; y > -1; y--) {
      wordR += list[i][y];
    }

    if (wordR == list[i]) {
      palindroms.push(list[i]);
    }
  }

  return palindroms;
}

function lastToFirst(list) {
  list.unshift(list.pop());

  return list;
}

function fib(times) {
  let fibonacci = [0, 1];

  for (let i = 0; i < times - 2; i++) {
    let nextNum = 0;

    nextNum = fibonacci[fibonacci.length - 2] + fibonacci[fibonacci.length - 1];

    fibonacci.push(nextNum);
  }

  return fibonacci;
}

let szamok = [3, 4, 5, 2, 1, 69, 67, 11, 146, 294];
let szavak = [
  "alma",
  "banán",
  "körte",
  "porsche",
  "carreragt",
  "turbos",
  "alma",
  "bab",
];

console.log("1. Feladat " + sumList(evenNumbers(szamok)));
console.log("2. Feladat " + secificWordCounter("alma", szavak));
console.log("3. Feladat " + evenNumbers(szamok));
console.log("4. Feladat " + multiTable(5));
console.log("5. Feladat " + largestNum(szamok));
console.log("6. Feladat " + intoIncreasing(szamok));
console.log("7. Feladat " + palindrom(szavak));
console.log("8. Feladat " + lastToFirst(szamok));
console.log("9. Feladat " + fib(10));
console.log("10. Feladat " + sumList(szamok));
