//Register on https://myprojects.geoapify.com/ and create new project to get your API key
const myAPIKey = "fe2b9f16760e4869a013ee2527251203"

let countries = []
const selectCountry = $("#country")
let selectedCountry = $("#country option:selected").text()

const containerAddress = $(".containerAddress")
const containerSearch = `<div class='containerSearch'><label for='search'>Entrez ${
    $("#signUpAddress").length > 0 ? "votre " : "l'"
}adresse <span>*</span></label><input type='search' name='search' id='search' placeholder='ici...' /></div>`
containerAddress.append("<div class='containerAddressOptions hidden'></div>")
const containerAddressOptions = $(".containerAddressOptions")

const removeAddress = (removeSearch = false) => {
    if (removeSearch == true) $(".containerSearch").remove()
    if ($("#signUpAddress").length > 0 && removeSearch == true) {
        $("#signUpAddress").addClass("hidden")
    }
    $("#addressContainer").remove()
    $("#additionalAddressContainer").remove()
    $("#zip_codeContainer").remove()
    $("#cityContainer").remove()
    $("#city_id").remove()
}

const searchAddress = (country) => {
    containerAddress.append(containerSearch)
    if ($("#signUpAddress").length > 0) {
        $("#signUpAddress").removeClass("hidden")
    }
    const searchInput = $("#search")
    searchInput.on("keydown", () => {
        const searchTerm = searchInput.val()
        if (searchTerm.length <= 5) {
            containerAddressOptions.addClass("hidden")
            return
        }
        const geocodingUrl = `https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(searchTerm)}&filter=countrycode:${country}&format=json&lang=fr&apiKey=${myAPIKey}`

        // call Geocoding API - https://www.geoapify.com/geocoding-api/
        fetch(geocodingUrl)
            .then((result) => result.json())
            .then((data) => {
                const options = data.results
                let addressOptions = $(".addressOption")
                if (addressOptions.length > 0) {
                    containerAddressOptions.addClass("hidden")
                    containerAddressOptions.empty()
                }
                if (searchTerm.length >= 6) {
                    containerAddressOptions.removeClass("hidden")
                }
                for (let k = 0; k < options.length; k++) {
                    console.log("%c options", "background:green; color:white; padding:2px", options[k])
                    containerAddressOptions.append(`<p id="${options[k].place_id}" class="addressOption" >${options[k].formatted}</p>`)
                    $("#" + options[k].place_id + "").on("click", () => {
                        containerAddressOptions.addClass("hidden")
                        searchInput.val("")
                        searchInput.attr("placeholder", "vous pouvez modifier ici...")
                        removeAddress()

                        const address = `<div id='addressContainer' class='containerInput'>
                                            <label for='address'>Adresse</label>
                                            <input id='address' name='address' type='text' value='${options[k].housenumber ? options[k].housenumber : ""} ${options[k].street.replace("'", " ")}' disabled/>
                                            <input id='address' name='address' type='hidden' value='${options[k].housenumber ? options[k].housenumber : ""} ${options[k].street.replace("'", " ")}'/>
                                        </div>`

                        const additionalAddress = `<div id='additionalAddressContainer' class='containerInput'>
                                                    <label for='additionalAddress'>Complément d'Adresse</label>
                                                    <input id='additionalAddress' name='additionalAddress' type='text' value=''/>
                                                  </div>`

                        const zipCode = `<div id='zip_codeContainer' class='containerInput'>
                                            <label for='zip_code'>Code postale</label>
                                            <input id='zip_code' name='zip_code' type='text' value='${options[k].postcode ? options[k].postcode : options[k].city}' disabled/>
                                            <input id='zip_code' name='zip_code' type='hidden' value='${options[k].postcode ? options[k].postcode : options[k].city}'/>
                                        </div>`

                        const city = `<div id='cityContainer' class='containerInput'>
                                        <label for='city'>Ville</label>
                                        <input id='city' name='city' type='text' value='${options[k].city}' disabled />
                                        <input id='city' name='city' type='hidden' value='${options[k].city}'/>
                                      </div>`

                        const cityId = `<input id='city_id' name='city_id' type='hidden' value='${options[k].place_id}'/>`

                        containerAddress.append(address, additionalAddress, zipCode, city, cityId)
                    })
                }
            })
            .catch((error) => console.log("%c requête non aboutie : ", "background:red; color:white; padding:2px", error))
    })
}

fetch("http://192.168.1.69/index.php?page=getcountries")
    .then(resp => resp.json())
    .then((datas) => {
        for (let data of datas) {
            countries.push({ country_id: data.country_id, country_name: data.country_name })
        }
        if (selectCountry.length > 0) {
            for (let i = 0; i < countries.length; i++) {
                selectCountry.append("<option id='country_" + countries[i]["country_id"] + "' value=" + countries[i]["country_id"] + ">" + countries[i]["country_name"] + "</option>")
            }
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
    .catch((error) => console.log("%c Erreur : ", "background:red; color:white; padding:2px", error))
