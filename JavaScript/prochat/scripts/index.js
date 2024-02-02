import { users } from "./users.js"
import { carousel, carouselDisplay, last, next } from "./carousel.js"

//Elements
let navBar = document.getElementById("navBar")
let loginBox = document.getElementById("loginBox")

const headerNavContainer = document.getElementById("headerNavContainer")
const nav = document.getElementById("nav")
const loginButton = document.getElementById("connexion")
const linksName = ["Profiles", "Chats", "A propos"]
const linksIds = ["profilesBtn", "chatsBtn", "aboutBtn"]

for (let i = 0; i < linksName.length; i++) {
    const link = document.createElement("li")
    link.classList.add("navButton")
    link.id = linksIds[i]
    link.innerText = linksName[i]
    nav.appendChild(link)
}

const buttonLogOut = document.createElement("button")
buttonLogOut.id = "logOut"
buttonLogOut.innerText = "Déconnexion"
nav.appendChild(buttonLogOut)

const mailInput = document.getElementById("email")
const pswrdInput = document.getElementById("pswrd")
const phraseContainer = document.getElementById("phraseContainer")
const phrasePrompt = document.getElementById("phrase")
const logOutButton = document.getElementById("logOut")
const boutonBurger = document.getElementById("boutonBurger")
const burger = document.getElementById("burger")
const closeCross = document.getElementById("closeCross")
const cards = document.getElementsByClassName("card")
const popupCvList = document.getElementsByClassName("popupCv")
const cover = document.createElement("div")
cover.classList.add("cover")
cover.id = "cover"

const popupCv = document.createElement("div")
popupCv.classList.add("popupCv")
popupCv.id = "popupCv"


const navButtons = document.getElementsByClassName("navButton")
const tabs = document.getElementsByClassName("tab")

logOutButton.style.display = "none"
phraseContainer.style.display = "none !important"
closeCross.style.display = "none"
boutonBurger.style.display = "none"

//values
let mail = mailInput.value
let pswrd = pswrdInput.value

//modes
const dicoButtonToTab = {
    welcomeBtn: "welcome",
    profilesBtn: "profiles",
    chatsBtn: "chats",
    aboutBtn: "about",
}
const dicoCardToCV = {
    user1: "user1Cv",
    user2: "user2Cv",
    user3: "user3Cv",
}

for (let j = 0; j < tabs.length; j++) {
    tabs[j].classList.add("invisible")
}

for (let i = 0; i < navButtons.length; i++) {
    navButtons[i].addEventListener("click", () => {
        for (let j = 0; j < tabs.length; j++) {
            tabs[j].classList.add("invisible")
        }
        const buttonId = navButtons[i].id
        const correspondingTabId = dicoButtonToTab[buttonId]
        const correspondingTab = document.getElementById(correspondingTabId)
        if (buttonId == "profilesBtn" || buttonId == "chatsBtn" || buttonId == "aboutBtn") {
            openNav()
        }
        if (buttonId == "welcomeBtn") {
            if (closeCross.style.display == "block") {
                openNav()
            }
        }
        if (loginBox.style.display == "none") {
            correspondingTab.classList.remove("invisible")
            if (correspondingTab.id == "profiles") {
                const profiles = "<h1>Super Heros</h1>"
                const profilesTabAdd = "<div id='profilesTab' class='profilesTab'></div>"
                correspondingTab.innerHTML = profiles + profilesTabAdd
                const profilesTab = document.getElementById("profilesTab")
                profilesTab.appendChild(carousel)
                let lastCard = users.length;
                let nextCard = 2;
                last.addEventListener("click", () => {
                    if (lastCard > 1) {
                        window.location = "#" + lastCard
                        lastCard = lastCard - 1
                        nextCard == 1 ? (nextCard = users.length) : (nextCard = nextCard -1)

                        console.log("lastcard", lastCard, "nextcard", nextCard )
                    } else {
                        window.location = "#" + lastCard
                        lastCard = users.length
                        nextCard = 2

                        console.log("lastcard", lastCard, "nextcard", nextCard )
                    }
                })
                next.addEventListener("click", () => {
                    if (nextCard < users.length) {
                        window.location = "#" + nextCard
                        nextCard = nextCard + 1
                        nextCard == 3 ? (lastCard = 1) : (lastCard = lastCard + 1)

                        console.log("lastcard", lastCard, "nextcard", nextCard )
                    } else {
                        window.location = "#" + nextCard
                        lastCard = users.length - 1
                        nextCard = 1

                        console.log("lastcard", lastCard, "nextcard", nextCard )
                    }
                })
                for (let k = 0; k < users.length; k++) {
                    //ancres
                    const ancre = document.createElement("span")
                    ancre.id = k + 1

                    //cards
                    const card = document.createElement("div")
                    card.classList.add("card")
                    card.id = users[k].id

                    //image
                    const image = document.createElement("img")
                    image.classList.add("profilePicture")
                    image.src = users[k].pctr
                    image.alt = users[k].heroName

                    //Hero name
                    const nameContainer = document.createElement("p")
                    nameContainer.classList.add("nameContainer")
                    nameContainer.innerText = users[k].heroName
                    carouselDisplay.append(ancre, card)
                    
                    card.append(image, nameContainer)
                    
                    card.addEventListener("click", () => {
                        profilesTab.appendChild(cover)
                        cover.appendChild(popupCv)
                        popupCv.innerHTML = 
                            "<h1>" + users[k].heroName + "</h1><article><img src='" + users[k].pctr + "'/><div><h4>Véritable Nom</h4><p>" + users[k].firstname + " " + users[k].name + "</p><h4>Ville</h4><p>" + users[k].city + "</p></div></article><h3>Son histoire</h3><div><p>" + users[k].resume + "</p></div>"
                    })
                    cover.addEventListener("click", () => {
                        cover.parentNode.removeChild(cover)
                    })
                }
            }
            if (correspondingTab.id == "chats") {
                const chats = "<h1>Chats</h1>"
                correspondingTab.innerHTML = chats
            }
            if (correspondingTab.id == "about") {
                const about = "<h1 class='test' id='test'>A propos</h1>"
                correspondingTab.innerHTML = about
            }
        }
    })
}


const logIn = () => {
    mail = mailInput.value
    pswrd = pswrdInput.value
    const adminMail = "jj.goddet@icloud.com"
    const adminPswrd = "1234"
    if (mail === adminMail && pswrd === adminPswrd) {
        loginBox.style.display = "none"
        tabs[0].classList.remove("invisible")
        logOutButton.style.display = "block"
        boutonBurger.style.display = "block"
        bonjour.style.fontSize = "5vw"
        bonjour.innerText = "Bonjour " + mail
    } else {
        phraseContainer.style.display = "flex"
        phraseContainer.style.justifyContent = "center"
        phrasePrompt.innerText = "Login ou mot de passe incorrect"
    }
}

const logOut = () => {
    openNav()
    loginBox.style.display = "flex"
    for (let k = 0; k < tabs.length; k++) {
        tabs[k].classList.add("invisible")
    }
    logOutButton.style.display = "none"
    boutonBurger.style.display = "none"
    bonjour.innerText = ""
}

const openNav = () => {
    if (headerNavContainer.style.display == "block" && loginBox.style.display == "none") {
        headerNavContainer.style.display = "none"
        navBar.style.justifyContent = ""
        burger.style.display = "block"
        closeCross.style.display = "none"
    } else {
        if (loginBox.style.display == "none") {
            headerNavContainer.style.display = "block"
            navBar.style.justifyContent = "space-between"
            burger.style.display = "none"
            closeCross.style.display = "block"
        }
    }
}

const check = () => {
    mail = mailInput.value
    pswrd = pswrdInput.value
    if (mail.length > 0 && pswrd.length > 0) {
        loginButton.disabled = false
    } else {
        loginButton.disabled = true
    }
}

loginButton.addEventListener("click", logIn)
logOutButton.addEventListener("click", logOut)
boutonBurger.addEventListener("click", openNav)
loginButton.disabled = true
mailInput.addEventListener("keyup", check)
pswrdInput.addEventListener("keyup", check)
