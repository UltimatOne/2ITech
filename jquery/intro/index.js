$(document).ready(function () {
    $("#titre").text("Bonjour de Jquery")
    $("#div1").text("Hello les dwwm en Jquery")
    $("#div2").text("Cour de Jquery")
    $("#div3").append(" 10 personnes")
})

$("#myButton").click(function () {
    alert("Vous avez cliqué sur le bouton")
})

//AJAX

//Effectuer une requete AJAX GET
// $.get("https://www.monurl.com", function(data) {
//Traitement des données

// })

// $.post("api.gouv", {lat: 0.12323, long: 1.235}, function(data){

// })

//exemple requete AJAX
// $(document).ready(function(){
//     $.ajax({
//         //L'URL de la requête
//         url: "url",

//         //La méthode d"envoi (type de requête)
//         methode: "GET",

//         //Le format de réponse attendu
//         dataType: "json"

//     })
//     //Ce code sera exécuté en cas de succès - La réponse du serveur est passée à done()
//     /*On peut par exemple convertir cette réponse en chaine JSON et insérer
//      * cette chaine dans un div id="res"*/
//     .done(function(response){
//         let data = JSON.stringify(response);
//         $("div#res").append(data);
//     })

//     //Ce code sera exécuté en cas d'échec - L'erreur est passée à fail()
//     //On peut afficher les informations relatives à la requête et à l'erreur
//     .fail(function(error){
//         alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
//     })

//     //Ce code sera exécuté que la requête soit un succès ou un échec
//     .always(function(){
//         alert("Requête effectuée");
//     });
// });

//Faire disparaître un élément
$("#hideIt").hide()

//Montrer un élément
$("#hideIt").show()

$("#listeTaches")
    .children("li")
    .click(function () {
        if (!$(this).hasClass("completed")) {
            $(this).addClass("completed")
        } else {
            $(this).removeClass("completed")
        }
    })

// $("#task1").click(function () {
//     if(!$("#task1").hasClass("completed")) {
//         $("#task1").addClass('completed')
//     } else {
//         $("#task1").removeClass('completed')
//     }
// })

// $("#task2").click(function () {
//     if(!$("#task2").hasClass("completed")) {
//         $("#task2").addClass('completed')
//     } else {
//         $("#task2").removeClass('completed')
//     }
// })

// $("#task3").click(function () {
//     if(!$("#task3").hasClass("completed")) {
//         $("#task3").addClass('completed')
//     } else {
//         $("#task3").removeClass('completed')
//     }
// })

//Selectionner un élément par:
//ID
// $('#monElement')

//Class
// $('.maClass')

//element de type <p>
// $("p")

//first element
// $("div:first")

//last element
// $("div:last")

//element pairs
// $("tr:even")

//elemnent impair
// $("tr:odd")

///Manipulation dans le DOM
//Modifier le contenu d'un element
// $("#monElement").text("nouveau text")

//ajouter une class
// $("#monElement").addClass("votre nouvelle class")

//Supprimer une class
// $("#monElement").removeClass("votre class")

//ajouter un element à la fin d'un autre élémént
// $("#monElement").append("<div>Nouvel element</div>")

//supprimer un element
// $("#monElement").remove()

///EVENEMENTS
//click
// $("myButton").click(function () {
//
//double click
// $("myButton").dbclick(function () {

// });
//
//hover
// $("myButton").hover(function () {

// });
//
//submit
// $("myButton").submit(function () {
//empêcher le comportement par défaut
// event.preventDefault()
// });
//
//survol de la souris
// $("li").mouseenter(function () {

// })

// $("li").mouseleave(function () {

// })

//Animer un élément
// $("monElement").animate({width: "200px", height: "200px"})

//soumettre un formulaire

$("form").submit(function (event) {
    event.preventDefault();
    const task = event.target.task.value;
    $("ul").append("<li>" + task + "<button>Terminé</button></li>");

    function reload() {
        $("ul li button:contains('Terminé')").click(function () {
            $(this).parent().addClass("completed");
            $(this).parent().append("<button>Annuler</button><button>Supprimer</button>");
            $(this).remove();
            $("ul li button:contains('Annuler')").click(function () {
                $(this).parent().removeClass("completed");
                $(this).parent().append("<button>Terminé</button>");
                $(this).parent().children("button:contains('Supprimer')").remove();
                $(this).remove();
                reload();
            });
            $("ul li button:contains('Supprimer')").click(function () {
                $(this).parent().remove();
            });
        });};

    reload();
});
