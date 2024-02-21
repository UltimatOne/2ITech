const title = document.querySelector("h1")
title.style.color = "plum"

/* const subtitle = document.querySelector("#subtitle")
console.log(subtitle)

const li = document.querySelector("ul li:nth-child(3)")
console.log(li.textContent)

const img = document.querySelector('img')
console.log(img.src)

const ul = document.querySelector("ul")
const newLi = document.createElement('li')
newLi.textContent = "Nouveau LI !"
ul.appendChild(newLi) */

const shoppingDatas = [
    {
        content: "Lait",
        category: "Diary"
    },
    {
        content: "Fromage",
        category: "Diary"
    },
    {
        content: "Savon",
        category: "Wellness"
    },
    {
        content: "Pommes",
        category: "Fruits"
    },
    {
        content: "Poulet",
        category: "Meat"
    },
]

const container = document.querySelector("ul")

function FillList(list, data){
    data.forEach(dataBlock => {
        const li = document.createElement("li")
        const content = document.createElement("p")
        const category = document.createElement("p")
        content.innerText = dataBlock.content
        category.innerText = dataBlock.category
        li.appendChild(content)
        li.appendChild(category)
        list.appendChild(li)
    }); 
}
FillList(container, shoppingDatas)