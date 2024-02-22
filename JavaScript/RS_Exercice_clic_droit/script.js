const body = document.querySelector("body")
const customMenu = document.querySelector(".custom-menu")
document.addEventListener("mousedown", HandleMenu)
document.addEventListener("contextmenu", HandleMenu)

const buttons = document.querySelectorAll("div button")

buttons.forEach((button) => button.addEventListener("mousedown", HandleBackground))

// function HandleCloseMenu() {
//     customMenu.style.display = "none"
// }

function HandleMenu(e) {
    console.log(e.which)
    e.preventDefault()
    if (e.which == 1) {
        alert("Je suis le bouton de gauche")
        customMenu.style.display = "none"
    }
    if (e.which == 2){
        alert("Je suis le bouton du milieu")
    }
    if (e.which == 3) {
        alert("Je suis le bouton de droite")
        customMenu.style.display = "block"
        customMenu.style.top = `${e.pageY - customMenu.clientHeight / 2}px`
        customMenu.style.left = `${e.pageX - customMenu.clientWidth / 2}px`
    }
}

function HandleBackground(e) {
    e.stopPropagation()
    body.style.backgroundColor = e.target.dataset.color
}
