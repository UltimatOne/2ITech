$(document).ready(() => {

    //countries pour insérer dans un select de formulaire
    $.getJSON("http://localhost2it/formatech/index.php?page=getcountries",
        function( data ) {
        let countries = [];
        for (let d of data){
            countries.push({
                "country_name" : d["country_name"],
                "country_id": d["country_id"]
            })
        }
        console.log(countries)
    });
    
})