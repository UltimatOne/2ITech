const mainTitle = document.querySelector('h1');
mainTitle.style.color = "red"
mainTitle.style.backgroundColor = "black"
mainTitle.style.borderRadius = "25px"
mainTitle.style.textAlign = "center"

const listElem = document.querySelectorAll('ul li')
console.log(listElem);

listElem.forEach((li) => li.textContent = "Hello World!")