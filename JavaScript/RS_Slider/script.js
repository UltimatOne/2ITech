const images = document.querySelectorAll(".slide-img")
const previous = document.querySelector(".previous-btn")
const next = document.querySelector(".next-btn")

previous.addEventListener("click", HandleImg)
next.addEventListener("click", HandleImg)

let i = 0

function HandleImg(e) {
    images[i].classList.remove("active")

    i = i + Number(e.target.getAttribute("data-action"))

    if (i < 0) {
        i = images.length - 1
    } else if (i > images.length - 1) {
        i = 0
    }
    images[i].classList.add("active")
}
