const option = document.querySelector('.range-input')
const smile = document.querySelector('.emoji-value')
const emojis = ["😠","🙁","😐","🙂","😁"]

option.addEventListener("change", HandleSmile)

function HandleSmile(){

    /* if(option.value == 1){
        smile.textContent = emojis[0]
    }
    if(option.value == 2){
        smile.textContent = emojis[1]
    }
    if(option.value == 3){
        smile.textContent = emojis[2]
    }
    if(option.value == 4){
        smile.textContent = emojis[3]
    }
    if(option.value == 5){
        smile.textContent = emojis[4]
    } */
    
    //facon plus rapide en 1 ligne merci Elena
    smile.textContent = emojis[option.value - 1]
}