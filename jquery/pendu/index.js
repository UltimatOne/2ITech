$(document).ready(function () {
    // let word = []
    // $.getJSON("https://trouve-mot.fr/api/random", function ( data ) {
    //     $.each( data, function( key, val ) {
    //         word.push(val.name);
    //       });
    //       console.log(word)
    //       for (let i=0 ; i < word[0].length; i++) {
    //             $("#response").append("<p class='border-b'><span>" + word[0][i] + "</span></p>")
    //             $("#response p span").hide()
    //         }
    //     })

    let life = 6;

    //Alphabet
    const alphabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]

    for (let i=0; i<alphabet.length; i++) {
        $("#buttons").append("<button>" + alphabet[i] + "</button>")
    }

    let words = ["telephone","television","maison","voiture","alphabet","trotinette","velociraptor","electronique","developpement","musicien","trompetiste"];
    let wordsLength = words.length
    let randomNum = Math.floor(Math.random()*wordsLength)
    let wordRandom = words[randomNum]
    console.log(wordRandom)
    
    for (let i=0 ; i < wordRandom.length; i++) {
        $("#response").append("<p class='border-b'><span>" + wordRandom[i] + "</span></p>")
        $("#response p span").hide()
    }

    $("#buttons button").on("click", function () {
        if(life > 0 && $("#response p").hasClass("border-b")) {
            
            $("#response p span:contains('" + $(this).text() + "')").show()
            $("#response p span:contains('" + $(this).text() + "')").parent().removeClass("border-b")

            if ($(".border-b").length == 0){
                $("main").append("<p>Vous avez gagné</p><button id='reload'>Recommencer</button>")
            }

            $("#response p span:contains('" + $(this).text() + "'):first").text() == $(this).text() ? $(this).remove() : life-- ;

            if(life == 5) {
                $("#hanged").html("<img src='assets/pendu1.png' alt='pendu'></img>")
            }
            if(life == 4) {
                $("#hanged").html("<img src='assets/pendu2.png' alt='pendu'></img>")
            }
            if(life == 3) {
                $("#hanged").html("<img src='assets/pendu3.png' alt='pendu'></img>")
            }
            if(life == 2) {
                $("#hanged").html("<img src='assets/pendu4.png' alt='pendu'></img>")
            }
            if(life == 1) {
                $("#hanged").html("<img src='assets/pendu5.png' alt='pendu'></img>")
            }
            if(life == 0) {
                $("#hanged").html("<img src='assets/pendu6.png' alt='pendu'></img>")
                $("main").append("<p>Vous avez perdu</p><button id='reload'>Recommencer</button>")
            }
        } else {
            alert("La partie est finie")
        }

        $("#reload").on("click", function (){
            location.reload(true)
        })
    })
})
