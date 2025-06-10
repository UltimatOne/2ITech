const hamburger = $(".hamburger")
const navlink = $(".nav-link")
const layerWindow = $(".layer-window")

hamburger.on("click", function () {
    hamburger.toggleClass("active")
    if (hamburger.hasClass("active")) {
        layerWindow.css("display", "block")
        navlink.css("height", navlink.prop("scrollHeight") + "px")
    } else {
        layerWindow.css("display", "none")
        navlink.css("height", "0px")
    }
})

layerWindow.on("click", function () {
    hamburger.removeClass("active")
    layerWindow.css("display", "none")
    navlink.css("height", "0px")
})
