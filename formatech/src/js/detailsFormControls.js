const details = $("#details")

const toggleAll = (e, button) => {
    e.stopPropagation();
    e.preventDefault();
    if (button === "picture") {
        $("#change_" + button + "_btn").toggleClass("hidden")
        $("#input_" + button).toggleClass("hidden")

    } else if (button === "address") {
        $("#" + button).toggleClass("hidden")
        $("#change_" + button + "_btn").toggleClass("hidden")
        $("#input_" + button).toggleClass("hidden")
        $("#cancel_change_" + button + "_btn").toggleClass("hidden")
        $("#submit_" + button + "_btn").toggleClass("hidden")
    } else {
        $("#" + button).toggleClass("hidden")
        $("#input_" + button).toggleClass("hidden")
        $("#change_" + button + "_btn").toggleClass("hidden")
        $("#cancel_change_" + button + "_btn").toggleClass("hidden")
        $("#submit_" + button + "_btn").toggleClass("hidden")
    }

}

if (details.length > 0) {
    $("#change_picture_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "picture")
    })
    $("#cancel_change_picture_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "picture")

    })
    $("#change_name_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "name")
    })
    $("#cancel_change_name_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "name")

    })
    $("#change_admin_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "admin")
    })
    $("#cancel_change_admin_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "admin")

    })
    $("#change_email_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "email")
    })
    $("#cancel_change_email_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "email")

    })
    $("#change_phone_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "phone")
    })
    $("#cancel_change_phone_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "phone")

    })
    $("#change_address_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "address")
    })
    $("#cancel_change_address_btn").click((e) => {
        console.log(e.target.id);
        toggleAll(e, "address")

    })
    $("#delete_btn").click((e) => {
        e.stopPropagation();
        e.preventDefault();
        const messageBox = "... ici continu"
        // ici continu
        $("main").append()
    })
    
}