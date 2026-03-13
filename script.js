console.log("ЗАВДАННЯ 1")

let integer = 10
let floatNumber = 5.7
let text = "Hello"
let booleanValue = true

console.log(typeof integer)
console.log(typeof floatNumber)
console.log(typeof text)
console.log(typeof booleanValue)

integer = "15";
floatNumber = 20;
text = false;
booleanValue = 1;

console.log(typeof integer)
console.log(typeof floatNumber)
console.log(typeof text);
console.log(typeof booleanValue)

let result = 10 + "5" 
console.log("Конкатенація:", result)

let boolToNumber = Number(true);
console.log("true у число:", boolToNumber)

let person = {
    name: "Ivan",
    age: 20,
    student: true,
    height: 1.75
};

console.log(JSON.stringify(person))

////////////////////////////

console.log("ЗАВДАННЯ 2")

let num1 = Number(prompt("Введіть перше число"))
let num2 = Number(prompt("Введіть друге число"))
let num3 = Number(prompt("Введіть третє число"))

let average = (num1 + num2 + num3) / 3
console.log("Середнє:", average)

console.log("Модуль:", Math.abs(num1));
console.log("Округлення вверх:", Math.ceil(num2))
console.log("Округлення вниз:", Math.floor(num3))
console.log("Степінь:", Math.pow(num1, 2))

console.log("Ділиться на 5:", average % 5 === 0)
console.log("Ділиться на 7:", average % 7 === 0)

if (num1 + num2 > num3 && num1 + num3 > num2 && num2 + num3 > num1) {
    console.log("Трикутник може існувати")
} else {
    console.log("Трикутник НЕ може існувати")
}

///////////////////////////////////////////////////////////

console.log("ЗАВДАННЯ 3")

let a = Number(prompt("Введіть число A"))
let b = Number(prompt("Введіть число B"))
let c = Number(prompt("Введіть число C"))

let max = Math.max(a, b, c)
let min = Math.min(a, b, c)

console.log("Найбільше:", max)
console.log("Найменше:", min)

let evenCheck = (a % 2 === 0) || (b % 2 === 0) || (c % 2 === 0);
console.log("Хоча б одне парне:", evenCheck)

let condition = (a > b) && (b < c)
console.log("Умова:", condition)

let number = Number(prompt("Введіть число для перевірки на просте"))
let isPrime = true

if (number <= 1) {
    isPrime = false
}

for (let i = 2; i < number; i++) {
    if (number % i === 0) {
        isPrime = false;
        break;
    }
}

console.log("Число просте:", isPrime)

///////////////////////////




console.log("ЗАВДАННЯ 4")

let name = prompt("Введіть ім'я") 
let birthYear = Number(prompt("Введіть рік народження"))
let city = prompt("Введіть місто")

let currentYear = 2026;
let age = currentYear - birthYear;

console.log("Вік:", age)

if (age < 12) {
    console.log("Ви дитина")
} 
else if (age < 18) {
    console.log("Ви підліток")
}
else if (age < 60) {
    console.log("Ви дорослий")
}
else {
    console.log("Ви літня людина")
}

let capital = "Київ";

if (city.toLowerCase() === capital.toLowerCase()) {
    console.log("Ви живете у столиці")
} else {
    console.log("Ви живете не у столиці")
}