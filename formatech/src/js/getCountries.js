const myAPIKey = "fe2b9f16760e4869a013ee2527251203"

//countries pour insérer dans un select de formulaire
let countries = []
const selectCountry = $("#country")
let selectedCountry = $("#country option:selected").text()
const containerAddress = $(".containerAddress")
const containerSearch = `<div class='containerSearch'><label for='search'>Entrez votre adresse</label><input type='search' name='search' id='search' placeholder='ici...' /></div>`
containerAddress.append("<div class='containerAddressOptions hidden'></div>")
const containerAddressOptions = $(".containerAddressOptions")

const removeAddress = (removeSearch = false) => {
    if (removeSearch == true) $(".containerSearch").remove()
    $("#containerAddress").remove()
    $("#containerZip_code").remove()
    $("#containerCity").remove()
    $("#city_id").remove()
}

const searchAddress = (country) => {
    containerAddress.append(containerSearch)
    const searchInput = $("#search")
    searchInput.on("keydown", () => {
        console.log("searchInput.val()", searchInput.val())
        const searchTerm = searchInput.val()
        if (searchTerm.length < 3) {
            containerAddressOptions.addClass("hidden")
            return
        }
        const geocodingUrl = `https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(searchTerm)}&filter=countrycode:${country}&format=json&lang=fr&apiKey=${myAPIKey}`

        // call Geocoding API - https://www.geoapify.com/geocoding-api/
        fetch(geocodingUrl)
            .then((result) => result.json())
            .then((data) => {
                const options = data.results
                console.log("%c options", "background:green; color:white; padding:2px", options);
                let addressOptions = $(".addressOption")
                if (addressOptions.length > 0) {
                    containerAddressOptions.addClass("hidden")
                    containerAddressOptions.empty()
                }
                containerAddressOptions.removeClass("hidden")
                for (let k = 0; k < options.length; k++) {
                    containerAddressOptions.append(`<p id="${options[k].place_id}" class="addressOption" >${options[k].formatted}</p>`)
                    $("#" + options[k].place_id + "").on("click", () => {
                        containerAddressOptions.addClass("hidden")
                        searchInput.val("")
                        searchInput.attr("placeholder", "vous pouvez modifier ici...")
                        removeAddress()
                        const address =
                            `<div id='containerAddress' class='containerInput'><label for='address'>Adresse</label><input id='address' name='address' disabled='true' type='text' value='${options[k].housenumber ? options[k].housenumber : ""} ${options[k].street.replace('\'', " ")}'/></div>`
                            const zipCode =
                            `<div id='containerZip_code' class='containerInput'><label for='zip_code'>Code postale</label><input id='zip_code' name='zip_code' disabled='true' type='text' value='${options[k].postcode ? options[k].postcode : options[k].city}'/></div>`
                        const city =
                            `<div id='containerCity' class='containerInput'><label for='city'>Ville</label><input id='city' name='city' disabled='true' type='text' value='${options[k].city}'/></div>`
                        const cityId = `<input id='city_id' name='city_id' type='hidden' value='${options[k].city}${options[k].postcode ? options[k].postcode : options[k].country}'/>`
                        containerAddress.append(address, zipCode, city, cityId)
                        console.log("%c options[k].formatted", "background:green; color:white; padding:2px", options[k].formatted)
                    })
                }
            })
            .catch((error) => console.log("%c request failed", "background:red; color:white; padding:2px", error))
    })
}

fetch("http://192.168.1.69/index.php?page=getcountries")
    .then((resp) => resp.json())
    .then((resp) => {
        // alert(JSON.stringify(resp))
        for (let data of resp) {
            countries.push({ country_id: data.country_id, country_name: data.country_name })
        }
        if (selectCountry.length > 0) {
            for (let i = 0; i < countries.length; i++) {
                selectCountry.append("<option value=" + countries[i]["country_id"] + ">" + countries[i]["country_name"] + "</option>")
            }
            //ici commence la gestion pour l'adresse complète
            selectCountry.on("change", () => {
                selectedCountry = $("#country option:selected").text()
                switch (selectedCountry) {
                    case "--------":
                        removeAddress(true)
                        break
                    case "Allemagne":
                        removeAddress(true)
                        searchAddress("de")
                        break
                    case "Andorre":
                        removeAddress(true)
                        searchAddress("ad")
                        break
                    case "Belgique":
                        removeAddress(true)
                        searchAddress("be")
                        break
                    case "Espagne":
                        removeAddress(true)
                        searchAddress("es")
                        break
                    case "France":
                        removeAddress(true)
                        searchAddress("fr")
                        break
                    case "Italie":
                        removeAddress(true)
                        searchAddress("it")
                        break
                    case "Luxembourg":
                        removeAddress(true)
                        searchAddress("lu")
                        break
                    case "Monaco":
                        removeAddress(true)
                        searchAddress("mc")
                        break
                    case "Suisse":
                        removeAddress(true)
                        searchAddress("ch")
                        break
                    default:
                        break
                }
            })
        }
    })
    .catch((error) => alert("Erreur : " + error))
