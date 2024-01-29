//console.log("window", window);


// window.onload = function () {
//     const x = "Hello";
//     let y = "World!";
//     y = "Ultimat";
//     console.log(x + " " + y);
// };

//Elements
const proChat = document.getElementById("proChat");
let loginBox = document.getElementById("loginBox");
const linkPage1 = document.getElementById("linkPage1");
const linkPage2 = document.getElementById("linkPage2");
const linkPage3 = document.getElementById("linkPage3");
let bonjourContainer = document.getElementById("bonjourContainer");
let page1Container = document.getElementById("page1Container");
let page2Container = document.getElementById("page2Container");
let page3Container = document.getElementById("page3Container");
let bonjour = document.getElementById("bonjour");
let page1 = document.getElementById("page1");
let page2 = document.getElementById("page2");
let page3 = document.getElementById("page3");
const loginButton = document.getElementById("connexion");
const mailInput = document.getElementById("mail");
const pswrdInput = document.getElementById("pswrd");
const phraseContainer = document.getElementById("phraseContainer");
const phrasePrompt = document.getElementById("phrase");
const logOutButton = document.getElementById("logOut");
const boutonBurger = document.getElementById("boutonBurger");
const burger = document.getElementById("burger");
const headerNavContainer = document.getElementById("headerNavContainer");
const closeCross = document.getElementById("closeCross");

bonjourContainer.style.display = "none";
page1Container.style.display = "none";
page2Container.style.display = "none";
page3Container.style.display = "none";
logOutButton.style.display = "none";
phraseContainer.style.display = "none";
closeCross.style.display = "none";
boutonBurger.style.display = "none";

//values
let mail = mailInput.value;
let pswrd = pswrdInput.value;



// console.log("proTchat", proTchat);
// console.log("loginBox", loginBox);
// console.log("loginButton", loginButton);

const logIn = () => {
    mail = mailInput.value;
    pswrd = pswrdInput.value;

    // console.log("mail input: ", mail, mailInput);
    // console.log("pswrd input: ", pswrd, pswrdInput);

    const adminMail = "jj.goddet@icloud.com";
    const adminPswrd = "1234";
    
    if (mail === adminMail && pswrd === adminPswrd) {;
        loginBox.style.display = "none";
        bonjourContainer.style.display = "flex";
        logOutButton.style.display = "block";
        boutonBurger.style.display = "block";
        bonjour.style.fontSize = "5vw";
        bonjour.innerText = ("Bonjour " + mail);
    } else {
        phraseContainer.style.display = "flex";
        phraseContainer.style.justifyContent = "center";
        phrasePrompt.innerText = "Login ou mot de passe incorrect";
    };
};

const logOut = () => {
    logOutButton.style.display = "none";
    bonjourContainer.style.display = "none";
    boutonBurger.style.display = "none";
    bonjour.innerText = "";
    loginBox.style.display = "flex";
}

const openNav = () => {
    if (headerNavContainer.style.display == "block") {
        headerNavContainer.style.display = "none";
        burger.style.display = "block";
        closeCross.style.display = "none";
    } else {
        headerNavContainer.style.display = "block";
        burger.style.display = "none";
        closeCross.style.display = "block";
    };
};

const openBonjour = () => {
    headerNavContainer.style.display = "none";
    burger.style.display = "block";
    closeCross.style.display = "none";
    page1Container.style.display = "none";
    page2Container.style.display = "none";
    page3Container.style.display = "none";
    bonjourContainer.style.display = "flex";
};

const openPage1 = () => {
    headerNavContainer.style.display = "none"
    burger.style.display = "block";
    closeCross.style.display = "none";
    page2Container.style.display = "none";
    page3Container.style.display = "none";
    bonjourContainer.style.display = "none";
    page1.innerText = "Je suis la page 1"
    page1Container.style.display = "flex";
};

const openPage2 = () => {
    burger.style.display = "block";
    closeCross.style.display = "none";
    headerNavContainer.style.display = "none"
    page3Container.style.display = "none";
    bonjourContainer.style.display = "none";
    page1Container.style.display = "none";
    page2.innerText = "Je suis la page 2"
    page2Container.style.display = "flex";
};

const openPage3 = () => {
    headerNavContainer.style.display = "none";
    burger.style.display = "block";
    closeCross.style.display = "none";
    bonjourContainer.style.display = "none";
    page1Container.style.display = "none";
    page2Container.style.display = "none";
    page3.innerText = "Je suis la page 3"
    page3Container.style.display = "flex";
};

const checkerMail = () => {
    mail = mailInput.value;
    if (mail.length  > 0 && pswrd > 0) {
        loginButton.disabled = false;
    } else {
        loginButton.disabled = true;
    };
};

const checkerPswrd = () => {
    pswrd = pswrdInput.value;
    if (mail.length  > 0 && pswrd.length > 0) {
        loginButton.disabled = false;
    } else {
        loginButton.disabled = true;
    };
};


loginButton.addEventListener("click", logIn);
logOutButton.addEventListener("click", logOut);
boutonBurger.addEventListener("click", openNav);
proChat.addEventListener("click", openBonjour);
linkPage1.addEventListener("click", openPage1);
linkPage2.addEventListener("click", openPage2);
linkPage3.addEventListener("click", openPage3);
loginButton.disabled = true;



mailInput.addEventListener("keyup", checkerMail);
pswrdInput.addEventListener("keyup", checkerPswrd);

