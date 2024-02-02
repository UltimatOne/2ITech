export const carousel =  document.createElement("div")
carousel.id = "carousel"
carousel.classList.add("carousel")

export const carouselDisplay = document.createElement("div")
carouselDisplay.id = "carouselDisplay"
carouselDisplay.classList.add ("carouselDisplay")

export let last = document.createElement("button")
last.id = "last"
last.classList.add("last")

const lastArrow = document.createElement("p")
lastArrow.id = "lastArrow"
lastArrow.classList.add("lastArrow")
lastArrow.innerText = "<"
last.appendChild(lastArrow)

export let next = document.createElement("button")
next.id = "next"
next.classList.add("next")

const nextArrow = document.createElement("p")
nextArrow.id = "nextArrow"
nextArrow.classList.add("nextArrow")
nextArrow.innerText = ">"
next.appendChild(nextArrow)

carousel.append(carouselDisplay, last, next)