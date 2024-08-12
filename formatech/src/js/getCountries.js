//countries pour insérer dans un select de formulaire
let countries = []
const selectCountry = $("#country")
let selectedCountry = $("#country option:selected").text()
const containerAddress = $(".containerAddress")
containerAddress.append("<div class='containerAddressOptions hidden'></div>")
const containerAddressOptions = $(".containerAddressOptions")

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
                if (selectedCountry == "France") {
                    containerAddress.append("<div class='containerSearch'><label for='search'>Entrez votre adresse</label><input type='search' name='search' id='search' /></div>")
                    const urlApiAdressesfrance = new URL("http://api-adresse.data.gouv.fr/search")
                    const searchInput = $("#search")
                    if (searchInput.length > 0) {
                        searchInput.on("keydown", () => {
                            if (searchInput.val().length >= 5) {
                                params = { q: searchInput.val() }
                                Object.keys(params).forEach((key) => urlApiAdressesfrance.searchParams.append(key, params[key]))
                                fetch(urlApiAdressesfrance)
                                    .then((response) => {
                                        if (response.status >= 200 && response.status < 300) {
                                            return response
                                        } else {
                                            const error = new Error(response.statusText)
                                            error.response = response
                                            throw error
                                        }
                                    })
                                    .then((response) => response.json())
                                    .then((data) => {
                                        let addressOptions = $(".addressOption")
                                        if (addressOptions.length > 0) {
                                            containerAddressOptions.addClass("hidden")
                                            containerAddressOptions.empty()
                                        }
                                        containerAddressOptions.removeClass("hidden")
                                        for (let k = 0; k < data.features.length; k++) {
                                            containerAddressOptions.append("<p id='" + data.features[k].properties.id + "' class='addressOption' >" + data.features[k].properties.label + "</p>")
                                            $("#" + data.features[k].properties.id + "").on("click", () => {
                                                containerAddressOptions.addClass("hidden")
                                                searchInput.val("")
                                                const address =
                                                    "<div class='containerInput'><label for='address'>Adresse</label><input id='address' name='address' disabled='true' type='text' value='" +
                                                    data.features[k].properties.name +
                                                    "'/></div>"
                                                const zipCode =
                                                    "<div class='containerInput'><label for='zip_code'>Code postale</label><input id='zip_code' name='zip_code' disabled='true' type='text' value='" +
                                                    data.features[k].properties.postcode +
                                                    "'/></div>"
                                                const city =
                                                    "<div class='containerInput'><label for='city'>Ville</label><input id='city' name='city' disabled='true' type='text' value='" +
                                                    data.features[k].properties.city +
                                                    "'/></div>"
                                                const cityId = "<input id='city_id' name='city_id' type='hidden' value='" + data.features[k].properties.citycode + "'/>"
                                                containerAddress.append(address, zipCode, city, cityId)
                                                console.log("%c data.features[k].properties.label", "background:green; color:white; padding:2px", data.features[k].properties.label)
                                                console.log("%c addressOption properties", "background:yellow; color:black; padding:2px", data.features[k].properties)
                                            })
                                        }
                                    })
                                    .catch((error) => console.log("%c request failed", "background:red; color:white; padding:2px", error))
                            } else {
                                containerAddressOptions.addClass("hidden")
                            }
                        })
                    }
                }
            })
        }
    })
    .catch((error) => alert("Erreur : " + error))
