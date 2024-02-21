/* const age = 18
let string = "Thomas"

console.log(typeof age, age)

const country = {
    name: "Canada"
}

console.log(country)
console.log(country.name)

function add(a,b) {
    return a + b
}

console.log("la somme de a + b est",add(5,5))

const pays = ["France", "Japon", "Mali"]
console.log(pays[1])

//Permet de parcourir tout le tableau pays
pays.forEach(pays => console.log(pays))

let money = 2000

let myAccount = 2500

// ancienne façon de concaténer
console.log("il y a " + myAccount + "Euros dans mon compte")

//nouvelle façon avec les backtits, $ et {}
console.log(`il y a ${myAccount}Euros dans mon compte`)

//fonction fléchée, la => est égal à return
const multiply = (a,b) => a * b

console.log(multiply(4,5))

//JS permet d'appeler une fonction avant qu'elle soit créée
console.log(foo())
function foo(){
    return "hello"
}

//for in
const person = [
    {
    name: "Jean",
    age: 33,
    height: 198,
    weight: 90
    },
    {
    name: "Jhon",
    age: 35,
    height: 180,
    weight: 70
    },
]

for(const key in person){
    const element = person[key]
    console.log(key,element)
}

//for of
const fruits = ["🍇","🍉","🍊","🍋","🍌","🍍","🥭","🍎","🍏","🍐","🍑"]

for(const fruit of fruits){
    console.log(fruit)
} */

/* function weatherNews(temp){
    if (temp <= 10)  console.log(`il fait froid: ${temp}°`)
    if (temp > 10 && temp <= 20) console.log(`il fait doux: ${temp}°`)
    if (temp > 20) console.log(`il fait chaux: ${temp}°`)
}

weatherNews(-14);
weatherNews(40);
weatherNews(6);
weatherNews(19);



const player1={
    name: "Thomas",
    goldenBall: 0,
    worldCup: 1,
    nationalCup: 0
}
const player2={
    name: "Marie",
    goldenBall: 3,
    worldCup: 3,
    nationalCup: 4
}
const player3={
    name: "Adama",
    goldenBall: 1,
    worldCup: 0,
    nationalCup: 1
}
function numberTrophyPlayer(player){
    if (player.worldCup >= 1 && player.goldenBall >= 2 && player.nationalCup >=3) {
        console.log("niveau exceptionnel")
    } else if (player.goldenBall >= 1 && player.nationalCup >= 1){
        console.log("Bon niveau")
    } else {
        console.log("Niveau Médiocre")
    }
}

numberTrophyPlayer(player1)
numberTrophyPlayer(player2)
numberTrophyPlayer(player3)

function weight(personWeight){
    console.log(personWeight > 80 ? "Doit faire un régime" : "Garde encore la ligne")
}

weight(90)
weight(50)

const library = [
    {
        name: "The Picture of Dorian Gray",
        price: 7
    },
    {
        name: "Harry Potter",
        price: 10
    },
    {
        name: "The Old man and sea",
        price: 5
    },
]

for(const book of library){
    book.price ++
}

console.log(library) */

// const athlete = {
//     jump: () => {
//         console.log("Jump")
//     },
//     swim: function () {
//         console.log("Swim")
//     },
//     run () {
//         console.log("Run")
//     },
//     name: "Thomas",
//     age: 20
// }
// athlete.run()
// athlete.jump()
// athlete.swim()
// console.log(athlete.name, athlete.age)

/* const animals = ["Cat","Dog","Elephant","Lion","Peacock"]

for (let i = 0; i < animals.length; i++) {
    console.log("for",animals[i])
}

for(animal of animals) {
    console.log("for of",animal)
}

const numbers = [1,2,3,4,5,6]
console.log(numbers)


numbers.forEach(number => {
    console.log(number * 2)
});

numbers.forEach((el,index) => numbers[index] = numbers[index] * 2)
console.log(numbers)
 */
// const peoples = [
//     {
//         name: "Pedro",
//         age: 25
//     },
//     {
//         name: "Sara",
//         age: 25
//     },
//     {
//         name: "Maria",
//         age: 25
//     },
// ]

// const result = peoples.map(people => people.name)

// console.log(result)

// const marks = [18,5,17,12,20,16,14]

// const result = marks.reduce((accumulator,currentValue) => accumulator + currentValue, 0)

// console.log(result)

// const moyenne = result / marks.length

// console.log(moyenne)

// const letters = ["Z","B","A","D","E"]

// const numbers = [10,55,2,250,500,85]

// letters.sort()
// console.log(letters)
// numbers.sort((a,b) => a - b)
// console.log(numbers)
// numbers.reverse()
// console.log(numbers)

/* const cats = ["Poppy","Misty","Luna","Lily","Titi"]

console.log("indexOf",cats.indexOf("Misty"))
console.log("findIndex",cats.findIndex(elem => elem === "Lily"))


console.log(cats.includes("Titi"))
console.log(cats.includes("Toto"))

const mathMarks = [12,15,20]
const englishMarks = [16,10,17]

const marks = mathMarks.concat(englishMarks)

console.log(marks) */

/* const couples = [["Tom","Lea"],["Jack","Sarah"],["Pedro","Maria"]]

for (couple of couples){
    console.log(couple)
    for(person of couple){
        console.log(person)
    }
}
for(let i = 0; i < couples.length; i++){
    for(let j = 0; j < couples[i].length; j++){
        console.log("boucles for classiques",couples[i][j])
    }
} */

/* let string = "abc def jhi jkl"

const result = string.split("")

console.log(result) */

/* const concertRoom = [
    {
        name: "Alexia",
        age: 24
    },
    {
        name: "Adam",
        age: 21
    },
    {
        name: "Victor",
        age: 23
    },
    {
        name: "Johanna",
        age: 22
    },
    {
        name: "Paul",
        age: 19
    }
]
const newPersons = [
    {
        name: "Thomas",
        age: 19
    },
    {
        name: "Clara",
        age: 21
    },
]

const concertRoomUpdate = concertRoom.slice(0,4)
console.log(concertRoomUpdate)

concertRoomUpdate.splice(0,2)
const newConcertRoom = newPersons.concat(concertRoomUpdate)

newConcertRoom.sort((a,b) => a.age - b.age)

//avec for of
for(person of newConcertRoom){
    console.log(`Salut ${person.name}, le concert va bientôt commencer`)
}

//autre façon avec forEach
newConcertRoom.forEach(person => console.log(`Salut ${person.name}, le commence dans 2 heures`)) */


/* const companies = [
    {
       name: "Walmart",
       revenue: 600
    },
    {
       name: "Saudi Aramco",
       revenue: 552
    },
    {
       name: "Amazon",
       revenue: 513
    },
    {
       name: "Sinopec",
       revenue: 480
    },
    {
       name: "PetroChina",
       revenue: 480
    },
    {
       name: "Exxon Mobil",
       revenue: 398
    },
]

const filteredCompanies = companies.filter(a => a.revenue > 500 )
console.log(filteredCompanies)

const values = ["",undefined,"a","a",99,0,true,false,5,5,5]
const truthyValues1 = values.filter(value => value != false)
const truthyValues2 = values.filter(value => value)
console.log(truthyValues1)
console.log(truthyValues2)

const names = ["Adrien","Paul","Victor","Alexandre","Aurélie","Antoine"]
const filteredNames = names.filter(name => (name.length >= 5 && name.includes("A")))
console.log(filteredNames)

let str = "Le chat est un animal carnivore."
console.log(str.replace('chat', 'chien'))

const str2 = "45124573121214578"
console.log(str2.includes("4578"))

const str3 = "Le meilleur compagnon contre l'ennui est un bon livre."
console.log(str3.indexOf("c"))

const str4 = "Hello world !"
console.log(str4.toUpperCase())

const str5 = "CHUUUUUUT"
console.log(str5.toLowerCase()) */

/* const str = "Poésie et musique sont les suprêmes, délices des choses. Elles sont le bouquet de toutes les connaissances."
const regex = new RegExp("bouquet")
console.log(regex.test(str))

const str2 = "La vita è bella amici miei"
const regex2 = /a/g
const result = [...str2.matchAll(regex2)]
console.log(result);

const str3 = "0542485599"
console.log(str3.includes("55" || "555" || "5555"))
console.log(/5{2,4}/.test(str3))
const str4 = "0555585599"
console.log(str4.includes("55" || "555" || "5555"))
console.log(/5{2,4}/.test(str4))
const str5 = "0505050505"
console.log(str5.includes("55" || "555" || "5555"))
console.log(/5{2,4}/.test(str5))

const str6 = "Une4 bonne bala1de dan1245s les bois n478ous permet de q548uitter l'atmosphère anxiogène de la ville."
const regex3 = /[0-9]/g
const result2 = [...str6.matchAll(regex3)]
console.log(result2);
const result4 = str6.replace(regex3, "")
console.log(result4);

const str7 = "zzz wzaza zzz"

const str8 = "Tom Joe Paul Paul Paul Lucie Pedro Gabriella Marie Bastien Sara";
console.log(str8.match(/Sara|Paul|Pedro/g)); */

const date = new Date()
console.log(date);
console.log(date.toLocaleDateString());
console.log(date.toLocaleString());

function daysBetweenDates(firstDate, secondDate){
    return (secondDate - firstDate) / (24 * 60 * 60 * 1000)
    // return secondDate.getDate() - firstDate.getDate()
}

console.log(daysBetweenDates(new Date(2021,0,13), new Date(2021,0,22)))