//Elements
let navBar = document.getElementById("navBar")
let loginBox = document.getElementById("loginBox")

// let bonjour = document.getElementById("bonjour")
// let page1 = document.getElementById("page1")
// let page2 = document.getElementById("page2")
// let page3 = document.getElementById("page3")

const headerNavContainer = document.getElementById("headerNavContainer")
const nav = document.getElementById("nav")
// const linksName = ["Profiles", "Chats", "A propos"]
// const linksIds = ["profilesBtn", "chatsBtn", "aboutBtn"]

// for (let i = 0; i < linksName.length; i++) {
//     const link = document.createElement('li')
//     link.classList.add("navButton")
//     link.id = linksIds[i]
//     link.innerText = linksName[i]
//     nav.appendChild(link)
// }

nav.innerHTML = "<li id='profilesBtn' class='navButton'>Profiles</li><li id='chatsBtn' class='navButton'>Chats</li><li id='aboutBtn' class='navButton'>A propos</li><button id='logOut'>Déconnexion</button>"

const loginButton = document.getElementById("connexion")
const mailInput = document.getElementById("mail")
const pswrdInput = document.getElementById("pswrd")
const phraseContainer = document.getElementById("phraseContainer")
const phrasePrompt = document.getElementById("phrase")
const logOutButton = document.getElementById("logOut")
const boutonBurger = document.getElementById("boutonBurger")
const burger = document.getElementById("burger")
const closeCross = document.getElementById("closeCross")

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
                correspondingTab.innerHTML = "<h1>Profiles</h1>"
            }
            if (correspondingTab.id == "chats") {
                correspondingTab.innerHTML = "<h1>Chats</h1>"
            }
            if (correspondingTab.id == "about") {
                correspondingTab.innerHTML = "<h1>A propos</h1>"
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
