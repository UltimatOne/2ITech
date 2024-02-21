let circle = document.querySelector('.circle')

document.addEventListener('mousemove',HandleCircle)
console.dir(document);
function HandleCircle(e){
    circle.style.top = `${e.pageY - circle.clientHeight / 2}px`
    circle.style.left = `${e.pageX - circle.clientWidth / 2}px`
}