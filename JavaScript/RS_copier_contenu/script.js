const button = document.querySelector('.card button')

let runningAnimation = false

button.addEventListener('click', HandleCopy)


function HandleCopy(e){
    navigator.clipboard.writeText(e.target.previousElementSibling.textContent).then(() => alert("texte copié !"))
    
    if (!runningAnimation) {
        runningAnimation = true
        e.target.textContent = "Copié 🎉"
     
        setTimeout(() => {
          e.target.textContent = "Copier 📚"
          runningAnimation = false
        }, 1000)
      }
}