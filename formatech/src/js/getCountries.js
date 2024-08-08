//countries pour insérer dans un select de formulaire
let countries = []
const selectCountry = $("#country")

fetch("http://192.168.1.69/index.php?page=getcountries")
.then(resp => resp.json())
.then(resp => {
    // alert(JSON.stringify(resp))
    for (let data of resp) {
        countries.push({'country_id' : data.country_id,'country_name': data.country_name})
    }
    for (let i = 0; i < countries.length; i++) {
        selectCountry.append("<option value=" + countries[i]["country_id"] + ">" + countries[i]["country_name"] + "</option>")
    }
    //ici commence la gestion des selects pour l'adresse complète
    console.log(selectCountry[0].options.selectedIndex)
})
.catch(error => alert("Erreur : " + error))
