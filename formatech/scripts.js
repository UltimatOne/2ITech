//countries pour insérer dans un select de formulaire
let countries = []
fetch("http://localhost2it/formatech/index.php?page=getcountries")
.then(resp => resp.json())
.then(resp => {
    // alert(JSON.stringify(resp))
    for (let data of resp) {
        countries.push({'country_id' : data.country_id,'country_name': data.country_name})
    }
})
.catch(error => alert("Erreur : " + error))
console.log(countries)