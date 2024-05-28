$(document).ready(function () {

    $('.navOpenButton').click(() => {
            $('.mobileLinks').removeClass('hidden')
            $('.navCloseButton').removeClass('hidden')
            $('.navOpenButton').addClass('hidden')
    })

    $('.navCloseButton').click(() => {
        $('.mobileLinks').addClass('hidden')
        $('.navCloseButton').addClass('hidden')
        $('.navOpenButton').removeClass('hidden')
    })

    $('.taskDetailsButton').click((e) => {
        const taskId = e.target.id
        $('#taskDetails-' + taskId ).removeClass('hidden')
    })

    $('.closeDetails').click((e) => {
        const taskId = e.target.id.slice(13, 14)
        $('#taskDetails-' + taskId ).addClass('hidden')
    })

    $('.deleteButton').click((e) => {
        const taskid = e.target.id.slice(13, 14)
        const url = "http://localhost/ECFToDoList/index.php?page=deleteTask"
        const data = {"taskId": taskid}
        $.ajax({
            type: "POST",
            url: url,
            data: data,
        }).then(() => {
            window.location.reload()
        });
    })

    $('.priorityButton').click((e) => {
        const taskId = e.target.id.slice(20, 21)
        const priorityId = e.target.id.slice(31, 32)
        $('#priorityChange-task-' + taskId + '-priority-' + priorityId ).removeClass('hidden')
        $('#priorityDisplay-task-' + taskId + '-priority-' + priorityId ).addClass('hidden')
    })

    $('.statusButton').click((e) => {
        const taskId = e.target.id.slice(18, 19)
        const statusId = e.target.id.slice(27, 28)
        $('#statusChange-task-' + taskId + '-status-' + statusId ).removeClass('hidden')
        $('#statusDisplay-task-' + taskId + '-status-' + statusId ).addClass('hidden')
    })
})