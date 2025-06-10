const addCenterButton = $("#addCenterButton")
const centersList = $(".centersList")
const form = $(".containerForm")

addCenterButton.on("click", () => {
    centersList.addClass('hidden')
    form.addClass('flex')
})
