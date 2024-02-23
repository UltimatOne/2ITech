function compte_a_rebours() {
    const decompte = document.querySelector("h2")
    let actualDate = new Date()
    let evenementDate = new Date(2024, 2, 1)
    let total_secondes = (evenementDate - actualDate) / 1000
    let days = Math.floor(total_secondes / (60 * 60 * 24))
    let hours = Math.floor((total_secondes - days * 60 * 60 * 24) / (60 * 60))
    let minutes = Math.floor((total_secondes - (days * 60 * 60 * 24 + hours * 60 * 60)) / 60)
    let secondes = Math.floor(total_secondes - (days * 60 * 60 * 24 + hours * 60 * 60 + minutes * 60))
    decompte.textContent = days + "j " + hours + "h " + minutes + "m " + secondes + "s"
    // let actualisation = setTimeout("compte_a_rebours();", 1000)
}
setInterval(compte_a_rebours, 1000)


