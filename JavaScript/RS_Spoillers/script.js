const spoilers = document.querySelectorAll(".js-spoiler")

console.log(spoilers);

spoilers.forEach(spoiler => spoiler.addEventListener("mouseover", HandleSpoiler))
spoilers.forEach(spoiler => spoiler.addEventListener("mouseleave", HandleSpoiler))

function HandleSpoiler(){
    this.classList.toggle("js-spoiler-revealed")
}