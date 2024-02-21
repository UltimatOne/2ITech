const box = document.querySelector('.box')

box.addEventListener('click', ToggleAnimation)

function ToggleAnimation(e){
    e.target.classList.toggle('active')
}