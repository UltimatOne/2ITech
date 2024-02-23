const slider = document.querySelector(".slider")

//Ancienne méthode pour récupérer des données depuis une API
/* function GetCatImg(url, callback) {
    const xhr = new XMLHttpRequest()
    xhr.open("GET", url, true)
    xhr.responseType = "json"
    xhr.addEventListener('load', HandleLoad)
    function HandleLoad(){
        callback(xhr.response)
    }

    xhr.send()
}

GetCatImg("https://api.thecatapi.com/v1/images/search", data =>{
    console.log(data)
    const img = document.createElement("img")
    img.src = data[0].url
    img.alt = "un chat"
    img.classList.add("slide-img")
    slider.appendChild(img)
})
 */

//Nouvelle Méthode avec fetch
function GetCatImg(url){
    fetch(url).then(response => {
        return response.json()
    }).then(data => {
        CreateImg(data)
        console.log("fetch",data);
    })
}

GetCatImg("https://api.thecatapi.com/v1/images/search")

async function CreateImg(data){
    const img = document.createElement("img")
    img.src = data[0].url
    img.alt = "un chat"
    img.classList.add("slide-img")
    slider.appendChild(img)
}
const images = document.querySelectorAll(".slide-img")

console.log(images)


/* const images = document.querySelectorAll(".slide-img")
console.log(images); */
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
