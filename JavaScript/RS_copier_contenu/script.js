const button = document.querySelector('.card button')


button.addEventListener('click', HandleCopy)


function HandleCopy(e){
    navigator.clipboard.writeText(e.target.previousElementSibling.textContent).then(() => alert("texte copié !"))
}