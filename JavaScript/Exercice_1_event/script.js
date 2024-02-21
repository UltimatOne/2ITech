const form = document.querySelector('form')

const inputs = document.querySelectorAll("form input")
const firstnameText = document.querySelector('.firstname')
const lastnameText = document.querySelector('.lastname')

form.addEventListener('submit', HandleSubmit)

function HandleSubmit(e){
    e.preventDefault()
    firstnameText.textContent += inputs[0].value
    lastnameText.textContent += inputs[1].value
    form.reset()
}