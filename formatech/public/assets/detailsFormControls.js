const details = $("#details")

const toggleAll = (e, button) => {
    e.stopPropagation()
    e.preventDefault()
    if (button === "picture") {
        $("#change_" + button + "_btn").toggleClass("hidden")
        $("#input_" + button).toggleClass("hidden")
    } else {
        $("#" + button).toggleClass("hidden")
        $("#input_" + button).toggleClass("hidden")
        $("#change_" + button + "_btn").toggleClass("hidden")
        $("#cancel_change_" + button + "_btn").toggleClass("hidden")
        $("#submit_" + button + "_btn").toggleClass("hidden")
    }
}

if (details.length > 0) {
    const btns = ["picture", "name", "admin", "email", "phone", "address"]

    for (let btn of btns) {
        $("#change_" + btn + "_btn").click((e) => {
            console.log(e.target.id)
            toggleAll(e, btn)
        })
    }

    $("#delete_btn").click((e) => {
        e.stopPropagation()
        e.preventDefault()
        const entity = $("#input_type").attr("name")
        const itemName = $("#input_name").val()
        const inputName = $("#input_id").attr("name")
        const inputId = $("#input_id").val()
        console.log("centerId", entity, itemName, inputName, inputId)
        const boxAlert = $(
            "<div class='boxAlert'>"
                + "<div class='boxAlertBody'>"
                    + "<div class='mx-auto text-center mb-3'>"
                        + "<p>Souhaitez vous supprimer ce centre ?</p>"
                    + "</div>"
                    + "<form action='http://localhost2it/formatech/index.php?page=listCenters' method='POST'>"
                        + "<input type='hidden' name='entity' value='" + entity + "'/>"
                        + "<input type='hidden' name='itemName' value='" + itemName + "'/>"
                        + "<input type='hidden' name='property' value='" + inputName + "' />"
                        + "<input type='hidden' name='value' value='" + inputId + "' />"
                        + "<a class='btn btn-dark w-25' href='' alt='Annuler'>Annuler</a>"
                        + "<button type='submit' class='btn btn-dark w-25'>Confirmer</button>"
                + "</div>"
            + "</div>"
        )
        
        $("body").append(boxAlert)
    })
}
