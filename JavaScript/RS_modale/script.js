const modale = document.querySelectorAll('.toggle-modal')

modale[0].addEventListener("click", ToggleModale)
modale[2].addEventListener("click", ToggleModale)

function ToggleModale(){
    modale[1].classList.toggle('active')
}