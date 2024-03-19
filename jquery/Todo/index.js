$(document).ready(function () {
    $('#add-task-btn').on('click', function (e) {
        e.preventDefault();
        var taskText = $("#new-task-input").val().trim();
        if(taskText !== "") {
            $("#task-list").append("<li>" + taskText + "<button class='delete-btn'>Supprimer</button></li>");
            $("#new-task-input").val(undefined);
        }

    })

    $("#task-list").on("click", "li", function () {
        if(!$(this).hasClass("completed")) {
            $(this).addClass("completed")
        }

    })
    
    $("#task-list").on("click", ".delete-btn", function (e) {
        e.stopPropagation()
        $(this).parent().remove()
    })
    
})
