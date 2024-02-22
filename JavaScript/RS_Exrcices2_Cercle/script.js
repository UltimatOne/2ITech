let circle = document.querySelector('.circle')

document.addEventListener('mousemove', HandleCircle)

function HandleCircle(e){
    circle.style.top = `${e.pageY - circle.clientWidth / 2}px`
    circle.style.left = `${e.pageX - circle.clientHeight / 2}px`
}